#!/bin/bash

# Check if gedit is running
# -x flag only match processes whose name (or command line if -f is
# specified) exactly match the pattern. 

x=`pgrep -x "motion"`
#echo $x
if [ $x >/dev/null ] 
then
    echo "Running0"
else
sudo service motion restart
    while [ "${x:-null}" = null ]
	do
		#echo "Stopped1"
		x=`pgrep -x "motion"`
		
	done
	       
		echo "Running1"
fi
#echo "Running2"



