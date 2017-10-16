import subprocess
import os

x = "/var/www/html/setopbox3/assets/py/log/facerec_pid"
if os.path.isfile(x):
    #print "asdasd"
    #subprocess.Popen(['sudo', '/usr/bin/python', '/var/www/html/setopbox3/assets/py/api/facerec.py'], stdout=subprocess.PIPE)
    subprocess.Popen(['bash', '/var/www/html/setopbox3/assets/py/api/facerec.sh'], stdout=subprocess.PIPE)
    #return "activated"
else:
	subprocess.Popen(['sudo', 'service', 'motion', 'start'], stdout=subprocess.PIPE).communicate()[0]
	subprocess.Popen(['sudo', 'motion'], stdout=subprocess.PIPE).communicate()[0]
                
#    subprocess.Popen(['/usr/bin/python', '/var/www/html/setopbox3/assets/py/api/controller.py', '>', '/var/www/html/setopbox3/assets/py/api/controller.log', '2>&1'], stdout=subprocess.PIPE)
    #return "deactivated"
