#!/usr/bin/python

import pymysql.cursors
import os
conn = pymysql.connect(host='localhost',
        user='root',
        password='gmdmd1516!@#',
        db='ODDEYE',
        charset='utf8')
os.chdir('/var/www/html/OddEYE/images')
file_name = os.listdir('/var/www/html/OddEYE/images')

def search(dirname):
<<<<<<< HEAD
	filenames=os.listdir(dirname)
	for filename in filenames:
		full_filename=os.path.join(dirname, filename)
		ext=os.path.splitext(full_filename)[-1]
		if ext == '.jpg':
			print full_filename
			return full_filename
			
full_filename=search("/var/www/html/OddEYE/images")
#print full_filename
	
split_filename=full_filename.split('/var/www/html/OddEYE/images/')
real_filename=split_filename[1]
#print real_filename			
=======
    filenames=os.listdir(dirname)
    for filename in filenames:
        full_filename=os.path.join(dirname, filename)
        ext=os.path.splitext(full_filename)[-1]
        if ext == '.jpg':
            print full_filename
            return full_filename
            
full_filename=search("/var/www/html/OddEYE/images")
#print full_filename
    
split_filename=full_filename.split('/var/www/html/OddEYE/images/')
real_filename=split_filename[1]
#print real_filename            
>>>>>>> e5b1c9ddd40eeaf853041b1ef521e01b5918e4de

split2_filename=split_filename[1].split('_')
filename=split2_filename[0]
date=split2_filename[1]
print(date)
carnum2=split2_filename[2]
print(filename)
print(date)

split3_filename=split2_filename[2].split('.jpg')
carnum=split3_filename[0]
print(carnum)


try:
        with conn.cursor() as cursor:
                for i in range(0, len(file_name)):
<<<<<<< HEAD
                        sql = 'INSERT INTO IMAGE (FILE_NAME, DATE, CAR_NUM, FILE_ROUTE, REQ) VALUES (%s, %s, %s, %s, %s)'
                        cursor.execute(sql, (real_filename, date, filename, 'images/', 0))
=======
                        sql = 'INSERT INTO IMAGE (FILE_NAME, DATE, CAR_NUM, FILE_ROUTE, MODEL) VALUES (%s, %s, %s, %s, %s)'
                        cursor.execute(sql, (real_filename, date, filename, 'images/', 'NULL'))
>>>>>>> e5b1c9ddd40eeaf853041b1ef521e01b5918e4de
                        conn.commit()
                        #print(cursor.lastrowid)
                # 1 (last insert id)

finally:

        conn.close()
<<<<<<< HEAD

=======
>>>>>>> e5b1c9ddd40eeaf853041b1ef521e01b5918e4de
