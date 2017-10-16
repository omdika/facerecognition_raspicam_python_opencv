from flask import Flask
from flask_restful import reqparse, abort, Api, Resource
import subprocess
import time
import os
app = Flask(__name__)
api = Api(app)
class Test(Resource):
    def get(self, nama , key):
    	if key == "123":
            cap = subprocess.Popen(['python', '/var/www/html/setopbox3/assets/py/api/train6.py', nama], stdout=subprocess.PIPE).communicate()[0]
            print "camera status " +cap[0:4]+" ahir"
            time.sleep(1)
            while cap[0:4] == 'fail':
                cap = subprocess.Popen(['python', '/var/www/html/setopbox3/assets/py/api/train6.py', nama], stdout=subprocess.PIPE).communicate()[0]
                print "kamera mati "+cap[0:5]+" ahir"
                time.sleep(1)
            subprocess.Popen(['sudo', 'rm', '/var/www/html/setopbox3/assets/py/log/train_pid'], stdout=subprocess.PIPE)
            return "success"
            	
    	else:
            return "not authorized"

api.add_resource(Test, '/test/<nama>/<key>')


if __name__ == '__main__':
    #app.run(debug=True)
    app.run(host='192.168.1.189', port=8181, debug=True)
