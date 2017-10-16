#!/usr/bin/python

import MySQLdb

# Open database connection
db = MySQLdb.connect("localhost","root","root","ci_sample" )

# prepare a cursor object using cursor() method
cursor = db.cursor()

sql = "SELECT * FROM users where name = 'dika' "
cursor.execute(sql)
# Fetch all the rows in a list of lists.
results = cursor.fetchall()
for row in results:
   idusers = row[0]
   name = row[1]
   gender = row[2]
   age = row[3]
   print "idusers=%s,name=%s,gender=%s,age=%i" % \
   (idusers, name, gender, age )
"""
try:
   # Execute the SQL command
   cursor.execute(sql)
   # Fetch all the rows in a list of lists.
   results = cursor.fetchall()
   for row in results:
      idusers = row[0]
      name = row[1]
      gender = row[2]
      age = row[3]
      print "idusers=%s,name=%s,gender=%d,age=%s" % \
             (idusers, name, gender, age )
except:
   print "Error: unable to fecth data"
"""
# disconnect from server
db.close()
