#!/bin/bash

# Check if gedit is running
# -x flag only match processes whose name (or command line if -f is
# specified) exactly match the pattern. 

sudo kill -9 `cat /var/www/html/setopbox3/assets/py/train_pid`

echo "Stopped1"

