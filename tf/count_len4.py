import os    

path = '/tmp/test/'
name_list = os.listdir(path)
full_list = [os.path.join(path,i) for i in name_list]
time_sorted_list = sorted(full_list, key=os.path.getmtime)

new_list = list(reversed(time_sorted_list))

print (new_list)

print(new_list[0])




#최신순으로 나열한 배열 list에서 index가 0인 것만 출력하도록 함
#count_len3.py에서 역순으로 나열한 배열을 new_list로 지정
#성공!