from flask import Flask
from flask_restful import reqparse, abort, Api, Resource
import subprocess
import time
import os
app = Flask(__name__)
api = Api(app)

class Switchfacerec(Resource):
    def get(self, key):
        if key == "123":
            #x = subprocess.Popen(['cat', '/var/www/html/setopbox3/assets/py/facerec_pid'], stdout=subprocess.PIPE).communicate()[0]
            x = "/var/www/html/setopbox3/assets/py/facerec_pid"
            #if x:    
            if os.path.isfile(x):
                #subprocess.Popen(['sudo', 'kill', '-9', x], stdout=subprocess.PIPE).communicate()[0]
                subprocess.Popen(['sudo', 'rm', '/var/www/html/setopbox3/assets/py/facerec_pid'], stdout=subprocess.PIPE).communicate()[0]
                return "deactivated"
            else:
                subprocess.Popen(['sudo', 'touch', '/var/www/html/setopbox3/assets/py/facerec_pid'], stdout=subprocess.PIPE).communicate()[0]
                return "activated"
        else:
            return "not authorized"

class Cekfacerec(Resource):
    def get(self, key):
        if key == "123":
            x = subprocess.Popen(['cat', '/var/www/html/setopbox3/assets/py/facerec_pid'], stdout=subprocess.PIPE).communicate()[0]
            if x:    
                return "activated"
            else:
                return "deactivatd"
        else:
            return "not authorized"

api.add_resource(Switchfacerec, '/switchfc/<key>')
api.add_resource(Cekfacerec, '/cekfc/<key>')

if __name__ == '__main__':
    #app.run(debug=True)
    app.run(host='192.168.2.189', port=8184, debug=True)
