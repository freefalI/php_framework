import os
path = input("input path")
for i , filename in enumerate(os.listdir(path)):
    os.chdir(path)
    os.rename(filename,'{0}.jpg'.format(i+1))