import pathlib

print(pathlib.Path().absolute())

new_file = open('sample.txt', 'w')
new_file.write('Name|Phone\n')
new_file.write('John;1234\n')
new_file.write('Bob;5678\n')
new_file.write('Alice;9432\n')
new_file.close()

file = open('sample.txt')

data = file.read()

print(type(data))
print(data)
file.close()

file = open('sample.txt')
print(file.read())
file.close()

file = open('sample.txt')
lines = file.readlines()
print(type(lines))
print(lines)
file.close()

sample_file = open('/home/user/LEARN/Allover/Udemy/best_python/basics/sample.txt', 'r')
print(sample_file.read())
sample_file.close()

with open('sample.txt', mode='r+') as sample_file:
    sample_file.seek(0, 2) # cursor in the end of the file
    sample_file.write('Toub;5627\n')
    sample_file.seek(0) # go to the beginning of the file
    print(sample_file.read())