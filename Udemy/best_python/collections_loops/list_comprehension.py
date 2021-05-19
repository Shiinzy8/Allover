greetings = 'hello, world'
chars = []
for l in greetings:
    chars.append(l)
print(chars)

chars = [l for l in greetings]
print(chars)

chars = [l for l in 'blablas']

numbers = [n for n in range(0,11)]
print(numbers)

sq_numbers = [n*n for n in range(0,3)]
print(sq_numbers)

sq_numbers = [n*n for n in range(0,3) if n%2 != 0]
print(sq_numbers)

list1 = [2,4,5,6,-6,-2]
list2 = [-2,7,8,6,2]

pairs = [(x,y) for x in list1 for y in list2 if x+y == 0]
print(pairs)