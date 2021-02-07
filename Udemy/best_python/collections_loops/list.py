int_list = [1,2,3]
ixed_list = [1, 2.0, 'string']

print(len(int_list))
print(int_list[0])
print(int_list[-1])
print(int_list[1:])

names_1 = ['John', 'Bob', 'Alice']
names_2 = ['Tracy', 'Elijah', 'Mason']

names_3 = names_1 + names_2
print(names_3)

names_1[0] = 'Liam'
names_1.append('James')
print(names_1)

popped = names_1.pop()
print(popped, names_1)

popped_0 = names_1.pop(0) # by default this index is -1
print(popped_0, names_1)

letters = ['ac', 'ab', 'aa']
letters.sort()
print(letters)

letters = ['abc', 'a', 'ab']
letters.sort() # use team sort algorithm
print(letters) # ['abc', 'ab', 'a']
letters.sort(key=len)
print(letters) # ['a', 'ab', 'abc']
letters.reverse()
letters.sort(reverse=True)

letters.insert(1, 'abcd')
print(letters)
print(letters.index('abc'))
print(letters.count('a'))

letters_copy = letters.copy()
letters.clear()
print(letters)
print(letters_copy)