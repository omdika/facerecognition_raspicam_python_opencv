#!/bin/bash

# Check if gedit is running
# -x flag only match processes whose name (or command line if -f is
# specified) exactly match the pattern. 

x=`pgrep -x "motion"`
#echo $x
if [ $x >/dev/null ] 
then
    #echo "Running0"
    sudo kill -9 $x
    while [ $x >/dev/null ]
	do
	#	echo "Running1"
		x=`pgrep -x "motion"`
		
	done
		echo "Stopped0"
else
echo "Stopped1"
fi
#echo "Stopped2"

