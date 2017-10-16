#!/usr/bin/python

# train.py
import cv2, sys, numpy, os
from picamera.array import PiRGBArray
from picamera import PiCamera
import time

size = 1 #Scaling

# initialize the camera and grab a reference to the raw camera capture
camera = PiCamera()
camera.resolution = (960, 720)
camera.framerate = 20
rawCapture = PiRGBArray(camera, size=(960, 720))

camera.vflip = True


fn_haar = 'haarcascade_frontalface_default.xml'
fn_dir = 'att_faces' #nama folder yang nanti berisi sub-folder
try:
    fn_name = sys.argv[1]
except:
    print("Masukan sebuah nama")
    #Nama akan dibuat sebagai nama sub-folder yang berisi sample2 wajah
    sys.exit(0)
path = os.path.join(fn_dir, fn_name)
if not os.path.isdir(path):
    os.mkdir(path)
(im_width, im_height) = (120, 90)
haar_cascade = cv2.CascadeClassifier(fn_haar)

# Memberi nama pada file database training, int dari 1 to 20
pin=sorted([int(n[:n.find('.')]) for n in os.listdir(path)
     if n[0]!='.' ]+[0])[-1] + 1

# Pesan awal
print("\n\033[94mProgram ini menyimpan 20 samples. \
Tampilkan beberapa bagiian wajah selagi running.\033[0m\n")

# program nge-loop sampai 20 sample gambar terpenuhi
count = 0
pause = 0
count_max = 20
while count < count_max:

    # capture frames from the camera
    for image in camera.capture_continuous(rawCapture, format="bgr", use_video_port=True):
            frame = image.array

            # Mendapatkan ukuran gambar
            height, width, channels = frame.shape

            # Flip frame
            #frame = cv2.flip(frame, 1, 0)

            # Mengkonversi ke Grayscale
            gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)

            # Resize ukuran frame
            mini = cv2.resize(gray, (int(gray.shape[1] / size), int(gray.shape[0] / size)))

            # Mendeteksi wajah
            faces = haar_cascade.detectMultiScale(mini)

            # We only consider largest face
            faces = sorted(faces, key=lambda x: x[3])
            if faces:
                face_i = faces[0]
                (x, y, w, h) = [v * size for v in face_i]

                face = gray[y:y + h, x:x + w]
                face_resize = cv2.resize(face, (im_height, im_width))

                # Menggambar persegi
                cv2.rectangle(frame, (x, y), (x + w, y + h), (0, 255, 0), 3)
                cv2.putText(frame, fn_name, (x - 10, y - 10), cv2.FONT_HERSHEY_PLAIN,
                    1,(0, 255, 0))

                # Remove false positives
                if(w * 6 < width or h * 6 < height):
                    print("Gambar wajah terlalu kecil")
                else:

                    # To create diversity, only save every fith detected image
                    if(pause == 0):

                        print("Sedang Menyimpan Gambar training "+str(count+1)+"/"+str(count_max))

                        # Save image file
                        cv2.imwrite('%s/%s.png' % (path, pin), face_resize)

                        pin += 1
                        count += 1

                        pause = 1

            if(pause > 0):
                pause = (pause + 1) % 5
            cv2.imshow('OpenCV', frame)
            key = cv2.waitKey(10)
            if key == 27:
                break

            # clear the stream in preparation for the next frame
            rawCapture.truncate(0)
