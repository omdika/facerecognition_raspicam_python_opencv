# train.py
import cv2, sys, numpy, os
import subprocess
import time
size = 4
fn_haar = '/var/www/html/setopbox3/assets/py/haarcascade_frontalface_default.xml'
fn_dir = '/var/www/html/setopbox3/assets/py/att_faces'
	
def xx():
	try:
		fn_name = sys.argv[1]
	except:
		print("You must provide a name")
		sys.exit(0)
	path = os.path.join(fn_dir, fn_name)
	if not os.path.isdir(path):
		os.mkdir(path)
		os.chmod(path, 0o777)
	(im_width, im_height) = (112, 92)
	haar_cascade = cv2.CascadeClassifier(fn_haar)
	#try:
		#print "x0"
	webcam = cv2.VideoCapture('http://192.168.1.189:8081/frame.mjpg')
        #print("hell")
	time.sleep(3)
	if not webcam.isOpened():
		print "failx"
		sys.exit(1)
		#print "x1" +webcam
	#except:
	#return "failx"
	#	sys.exit(1)
	# Generate name for image file
	pin=sorted([int(n[:n.find('.')]) for n in os.listdir(path)
		 if n[0]!='.' ]+[0])[-1] + 1

	count = 0
	pause = 0
	count_max = 20
	time.sleep(0.1)
    #    print("nooo")
	while count < count_max:

		rval = False
		try:
			(rval, frame) = webcam.read()       
                        #print("yeah")
			height, width, channels = frame.shape
			frame = cv2.flip(frame, 1, 0)
			gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
			mini = cv2.resize(gray, (int(gray.shape[1] / size), int(gray.shape[0] / size)))
			faces = haar_cascade.detectMultiScale(mini)
			faces = sorted(faces, key=lambda x: x[3])
			if faces:
				face_i = faces[0]
				(x, y, w, h) = [v * size for v in face_i]
				face = gray[y:y + h, x:x + w]
				face_adp = cv2.adaptiveThreshold(face,255,cv2.ADAPTIVE_THRESH_MEAN_C, cv2.THRESH_BINARY,11,2)
				face_resize = cv2.resize(face_adp, (im_width, im_height))
				cv2.rectangle(frame, (x, y), (x + w, y + h), (0, 255, 0), 3)
				cv2.putText(frame, fn_name, (x - 10, y - 10), cv2.FONT_HERSHEY_PLAIN,
					1,(0, 255, 0))
				if(w * 6 < width or h * 6 < height):
					print("Face too small")
				else:
					if(pause == 0):
						print("Saving training sample "+str(count+1)+"/"+str(count_max))
						cv2.imwrite('%s/%s.png' % (path, pin), face_resize)
						pin += 1
						count += 1
						pause = 1
			if(pause > 0):
				pause = (pause + 1) % 5
			#cv2.imshow('OpenCV', frame)
			#print("ow maan")
                        key = cv2.waitKey(10)
			if key == 27:
				break
		
		except:
			print("fail")
			#return "fail"
			sys.exit(0)
	
#sys.exit(0)
#pl = subprocess.Popen(['bash', 'startmotion.sh' ], stdout=subprocess.PIPE).communicate()[0]
#print pl
def writePidFile():
    pid = str(os.getpid())
    f = open('/var/www/html/setopbox3/assets/py/log/train_pid', 'w')
    f.write(pid)
    f.close()

z = writePidFile()
y = xx()
print y
            

