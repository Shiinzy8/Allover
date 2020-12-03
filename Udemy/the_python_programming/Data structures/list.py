squares1 = []
for x in range(10):
    squares1.append(x**2)
print(squares1)

squares2 = list(map(lambda x: x**2, range(10)))
print(squares2)

squares3 = [x**2 for x in range(10)]
print(squares3)

squares4 = [(x,y) for x in [1,2,3] for y in [3,1,4] if x != y]
print(squares4)

squares5 = []
for x in [1,2,3]:
    for y in [3,1,4]:
        if x != y:
            squares5.append((x,y)) 
print(squares5)

squares6 = [1,1,66.25,333,333,1234.5]
print(squares6)
# del squares6 # delete all list
del squares6[0]
print(squares6)
del squares6[2:4] # index 4 not include
print(squares6)
del squares6[:]
print(squares6) # to clear all the list