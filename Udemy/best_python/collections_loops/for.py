numbers = [1,2,3,4,5] # set

for x in numbers:
    print(x)

range_numbers = range(1,6)  # return range type

for x in range_numbers:
    print(x)
for x in range(1,5):
    pass

for i in range(1,6):
    if i % 2 == 0:
        print(f'{i} is even')
    else:
        print(f'{i} is odd')

for i, item in enumerate(numbers):
    numbers[i] *=2

print(numbers)

for _ in range(1,3):
    print('Wow')

persons = [('john', 22), ('bob', 32)]  # tuple
for (name, age) in persons:
    print(f'{name} is {age} years old')

players = dict(Carlsen=2842, Caruana=2945, Made=3455)
for item in players.items():
    print(item)
for name, age in players.items():
    print(f'{name} with score = {age}')

# find all pairs sum of which equals 0
list1 = [2,3,-5,6,7,-2]
list2 = [2,-6,8,3,5,-2]

pairs = []
for x in list1:
    for y in list2:
        if x + y == 0:
            pairs.append((x,y))
print(pairs)