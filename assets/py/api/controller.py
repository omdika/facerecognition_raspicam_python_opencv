from flask import Flask
from flask_restful import reqparse, abort, Api, Resource
import subprocess
import time
import os
import picamera
app = Flask(__name__)
api = Api(app)
from picamera.array import PiRGBArray

class Killtrain(Resource):
    def get(self, key):
        if key == "123":
            #print "killlme"
            x = subprocess.Popen(['cat', '/var/www/html/setopbox3/assets/py/log/train_pid'], stdout=subprocess.PIPE).communicate()[0]
            # print "kill"+x
            if x:    
                subprocess.Popen(['sudo', 'kill', '-9', x], stdout=subprocess.PIPE).communicate()[0]
                subprocess.Popen(['sudo', 'rm', '/var/www/html/setopbox3/assets/py/log/train_pid'], stdout=subprocess.PIPE).communicate()[0]
                
                return "success"
            else:
                return "unsuccess"
        else:
            return "not authorized"
            
class Switchfacerec(Resource):
    def get(self, key):
        if key == "123":
            x = subprocess.Popen(['cat', '/var/www/html/setopbox3/assets/py/log/facerec_pid'], stdout=subprocess.PIPE).communicate()[0]
            #x = "/var/www/html/setopbox3/assets/py/api/facerec_pid"
            if x:    
            #if os.path.isfile(x):
                subprocess.Popen(['sudo', 'kill', '-9', x], stdout=subprocess.PIPE).communicate()[0]
                subprocess.Popen(['sudo', 'rm', '/var/www/html/setopbox3/assets/py/log/facerec_pid'], stdout=subprocess.PIPE).communicate()[0]
                subprocess.Popen(['sudo', 'service', 'motion', 'start'], stdout=subprocess.PIPE).communicate()[0]
                subprocess.Popen(['sudo', 'motion'], stdout=subprocess.PIPE).communicate()[0]
                return "deactivated"
            else:
				# initialize the camera and grab a reference to the raw camera capture
                subprocess.Popen(['sudo', 'service', 'motion', 'stop'], stdout=subprocess.PIPE).communicate()[0]
                cap = subprocess.Popen(['python', '/var/www/html/setopbox3/assets/py/api/cekpicam.py'], stdout=subprocess.PIPE).communicate()[0]
                print "camera status " +cap[0:4]+" ahir"
                time.sleep(1)
                while cap[0:4] == 'fail':
                    cap = subprocess.Popen(['python', '/var/www/html/setopbox3/assets/py/api/cekpicam.py'], stdout=subprocess.PIPE).communicate()[0]
                    print "camera status " +cap[0:4]+" ahir"
                    print("fail cuk")
                    time.sleep(1)
                print "sinih0"
                #subprocess.Popen(['sudo', 'touch', '/var/www/html/setopbox3/assets/py/log/facerec_pid'], stdout=subprocess.PIPE).communicate()[0]
                #subprocess.Popen(['bash', '/var/www/html/setopbox3/assets/py/motion/stopmotion.sh'], stdout=subprocess.PIPE).communicate()[0]
                #time.sleep(10)
                #subprocess.Popen(['python', '/var/www/html/setopbox3/assets/py/api/facerec_test.py', '&'], stdout=subprocess.PIPE)#.communicate()[0]
                subprocess.Popen(['bash', '/var/www/html/setopbox3/assets/py/api/facerec.sh'], stdout=subprocess.PIPE)
                print "sinih"
                return "activated"
                
        else:
            return "not authorized"

class Cekfacerec(Resource):
    def get(self, key):
        if key == "123":
            x = subprocess.Popen(['cat', '/var/www/html/setopbox3/assets/py/log/facerec_pid'], stdout=subprocess.PIPE).communicate()[0]
            if x:    
                return "activated"
            else:
                return "deactivatd"
        else:
            return "not authorized"
            
api.add_resource(Killtrain, '/kill/<key>')
api.add_resource(Switchfacerec, '/switchfc/<key>')
api.add_resource(Cekfacerec, '/cekfc/<key>')



if __name__ == '__main__':
    #app.run(debug=True)
    app.run(host='192.168.1.189', port=8182, debug=True)
