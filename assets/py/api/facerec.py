#!/usr/bin/python
# facerec.py

import cv2, sys, numpy, os
import time, json, datetime, random
import paho.mqtt.publish as publish

import logging
import MySQLdb

# create pid file
pid = str(os.getpid())
f = open('/var/www/html/setopbox3/assets/py/log/facerec_pid', 'w+')
f.write(pid)
f.close()

#get data user
# Open database connection
db = MySQLdb.connect("localhost","root","root","ci_sample" )

# prepare a cursor object using cursor() method
cursor = db.cursor()

sql = "SELECT * FROM users "
cursor.execute(sql)
# Fetch all the rows in a list of lists.
results = cursor.fetchall()

LOG_FILENAME = '/var/www/html/setopbox3/assets/py/log/push.log.out'
logging.basicConfig(filename=LOG_FILENAME,
                    level=logging.DEBUG,
                    )

#logging.debug('This message should go to the log file')

size = 2
fn_haar = '/var/www/html/setopbox3/assets/py/haarcascade_frontalface_default.xml'
fn_dir = '/var/www/html/setopbox3/assets/py/att_faces'

# Part 1: Create fisherRecognizer
print('Training...')


# Create a list of images and a list of corresponding names
#(images, lables, names, id) = ([], [], {}, 0)
(images, lables, names, id, idusers, name, gender, age) = ([], [], {}, 0, [], [], [], [])
# Get the folders containing the training data
for (subdirs, dirs, files) in os.walk(fn_dir):

    # Loop through each folder named after the subject in the photos
    for subdir in dirs:
        names[id] = subdir
        subjectpath = os.path.join(fn_dir, subdir)

        # Loop through each photo in the folder
        for filename in os.listdir(subjectpath):

            # Skip non-image formates
            f_name, f_extension = os.path.splitext(filename)
            if(f_extension.lower() not in
                    ['.png','.jpg','.jpeg','.gif','.pgm']):
                print("Skipping "+filename+", wrong file type")
                continue
            path = subjectpath + '/' + filename
            lable = id
           
            # Add to training data
            images.append(cv2.imread(path, 0))
            lables.append(int(lable))
        id += 1
(im_width, im_height) = (112, 92)

# Create a Numpy array from the two lists above
(images, lables) = [numpy.array(lis) for lis in [images, lables]]

# OpenCV trains a model from the images
# NOTE FOR OpenCV2: remove '.face'
model = cv2.createFisherFaceRecognizer()
model.train(images, lables)




# Part 2: Use fisherRecognizer on camera stream
haar_cascade = cv2.CascadeClassifier(fn_haar)
webcam = cv2.VideoCapture('http://192.168.1.189:8081/frame.mjpg')
global framecount
global framerate
framecount = 0
framerate = 30

while True:
    # Loop until the camera is working
    rval = False
    while(not rval):# Check if this is the frame closest to 5 seconds
        if framecount == round((framerate * 5),0):
            framecount = 0
            # Flip the image (optional)
            frame=cv2.flip(frame,1,0)

            # Convert to grayscalel
            gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)

            # Resize to speed up detection (optinal, change size above)
            mini = cv2.resize(gray, (int(gray.shape[1] / size), int(gray.shape[0] / size)))

            # Detect faces and loop through each one
            faces = haar_cascade.detectMultiScale(mini)
            for i in range(len(faces)):
                face_i = faces[i]
                #print i        
                # Coordinates of face after scaling back by `size`
                (x, y, w, h) = [v * size for v in face_i]
                face = gray[y:y + h, x:x + w]
                #face_adp = cv2.adaptiveThreshold(face,255,cv2.ADAPTIVE_THRESH_MEAN_C, cv2.THRESH_BINARY,11,2)
                face_gauss = cv2.adaptiveThreshold(face,255,cv2.ADAPTIVE_THRESH_GAUSSIAN_C, cv2.THRESH_BINARY,11,2)
                face_resize = cv2.resize(face_gauss, (im_width, im_height))

                # Try to recognize the face
                prediction = model.predict(face_resize)
                cv2.rectangle(frame, (x, y), (x + w, y + h), (0, 255, 0), 3)

                # [1]
                # Write the name of recognized face
                # cv2.putText(frame, '%s' % (names[prediction]), (x-10, y-10), cv2.FONT_HERSHEY_PLAIN,1,(0, 0, 255))
        
                # if prediction[1] < 1000:
                #     cv2.putText(frame, '%s - %.0f' % ("null",prediction[1]), (x-10, y-10), cv2.FONT_HERSHEY_PLAIN,1,(0, 255, 0))

                # else:
        
                detect_name = names[prediction[0]]
                ts = time.time()
                st = datetime.datetime.fromtimestamp(ts).strftime('%H:%M')
                for row in results:
                    idusers = row[0]
                    name = row[1]
                    gender = row[2]
                    age = row[3]
                    #print "idusers=%s,name=%s,gender=%s,age=%i" % \
                    #(idusers, name, gender, age )
                    if name == detect_name:
                        #print st
                        send_data = {"userid_i":idusers,"channel_s":"7","age_i":age, "gender_s":gender,"name_s":name,"event_s":st}
                        json_data = json.dumps(send_data)
                        print json_data
                        logging.debug(json_data)
                        try:
                            publish.single(topic="demomars02", payload=json_data, hostname="192.168.1.10")
                        except:
							logging.debug("error publishing to server at "+st)	
                        #cv2.putText(frame, '%s - %.0f' % (names[prediction[0]],prediction[1]), (x-10, y-10), cv2.FONT_HERSHEY_PLAIN,1,(0, 255, 0))
                # print(prediction[1])
            # Show the image and check for ESC being pressed
            #cv2.imshow('OpenCV', frame)
            key = cv2.waitKey(10)
            if key == 27:
                break

        # Put the image from the webcam into 'frame'
        (rval, frame) = webcam.read()
        framecount += 1
        #print framecount
        
        if(not rval):
            print("Failed to open webcam. Trying again...")
        
