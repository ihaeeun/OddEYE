import os

def search(dirname):
<<<<<<< HEAD
	filenames=os.listdir(dirname)
	for filename in filenames:
		full_filename=os.path.join(dirname, filename)
		ext=os.path.splitext(full_filename)[-1]
		if ext == '.jpg':
			print(full_filename)

search("/var/www/html/OddEYE/images")
print("wait 5sec");
=======
    filenames=os.listdir(dirname)
    for filename in filenames:
        full_filename=os.path.join(dirname, filename)
        ext=os.path.splitext(full_filename)[-1]
        if ext == '.jpg':
            print(full_filename)

search("/var/www/html/OddEYE/images")
print("wait 5sec"); 
>>>>>>> e5b1c9ddd40eeaf853041b1ef521e01b5918e4de
