# x = "Hello, my name is Elias"

# # string are immutable

# print(len(x))
# print(x[len(x)-1])
# print(x.count('l')) # will counts l in the x string

# print(x.capitalize()) # first is capital all others are lowers case
# upper_case = x.upper() # upper all string 
# lower_case = x.lower()

# print(upper_case.isupper())
# print(lower_case.islower())
# print(x.isupper())
# print(x.islower())

# print(x.find('l'))
# print(x.find('l', 5))
# print(x.find('l', 5, 10))
# print(x.find('m', 8, 15))

# print(x.find('my'))

# print('123abc'.isalnum())
# print('123abc!'.isalnum())

# print('123abc'.isalpha())
# print('abc'.isalpha())

# print("   ".isspace())
# print("".isspace())

# h = "hello"
# print(h.split('l'))
# print(h.split('e'))

# print("My name is {} and I'm {}".format("Andrii", 34))
# print("My name is {0} and I'm {1}".format("Andrii", 34))
# print("My name is {1} and I'm {0}".format("Andrii", 34))

# # names argument for placeholders
# pi = 3.1415
# print("Pi equals {pi:1.2f}".format(pi=pi))