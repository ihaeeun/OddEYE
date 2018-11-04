#!/usr/bin/python

import pymysql.cursors
import os
conn = pymysql.connect(host='localhost',
        user='root',
        password='gmdmd1516!@#',
        db='ODDEYE',
        charset='utf8')

cursor=conn.cursor()
sql = "select FILE_NAME from IMAGE where REQ=1;"
cursor.execute(sql)

result=cursor.fetchone()[0]
#print result
		#ex. result=29A333_22222_22222.jpg

image_path="/var/www/html/OddEYE/images/"+result
#print image_path

#command="sshpass -pmypasswd scp -o StrictHostKeyChecking=no "+image_path+" heung@211.106.28.226:/tmp/test"
#os.system(command)

#test
command="sshpass -pgmdmd1516!@# scp -o StrictHostKeyChecking=no "+image_path+" heung@211.106.28.226:/tmp/test"
print command
os.system(command)

#db query modify
#cursor=conn.cursor()
#sql2="UPDATE IMAGE SET REQ=0 WHERE FILE_NAME='"+result+"';"
sql2="UPDATE IMAGE SET REQ=0 WHERE REQ=1;"
cursor.execute(sql2)
print sql2
