with open("new.txt",'r') as f:
    for data in f.readlines():
        data = data.replace(',','::')
        f1.write(data)

