numbers = [1,2,3]

# help(numbers.append) # help will print information about the funtion

# число по модулю
print(abs(-1))
print(max(1,2,3,4,5))
print(min(1,2,3,4,5))
# возвести в степень
print(pow(2,8))
print(round(3.374565, 4))
print(sum([1,2,3,4,5]))
h = hex(42) # 16
o = oct(42) # 8
b = bin(42) # 2

print(all([True, True, True])) # check if all True
print(all([True, False, True]))
print(any([True, True, False])) # check if at least one is True
print(any([False, False, False]))

letters = 'abcd'
numbers = (10, 20, 30)
zipped = zip(letters, numbers)
print(type(zipped))
print(zipped)

zipped_list = list(zipped)
print(zipped_list) # [('a', 10),('b', 20),('30', 30)]

reply = input()

code = ord('a') # get code of a symbol
c = chr(code) # get char from code