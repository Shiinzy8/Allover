fruits = ['orange', 'apple', 'pear', 'banana']
print(fruits.count('pear'))

fruits = ['orange', 'apple', 'pear', 'banana', 'pear']
print(fruits.count('pear'))

print(fruits.index('banana'))

print(fruits.index('pear', 4)) # to start search from 4 index

fruits.reverse()
print(fruits)

fruits.append('grape')
fruits.sort()
print(fruits)

fruits.pop() # remove last item of the list
print(fruits)
