# similar to the list
# we can't change elements in touple

tuple1 = 1234, 54321, 'hello'
print(tuple1)
tuple2 = (1234, 54321, 'hello')
print(tuple2)
tuple3 = tuple1, tuple2
print(tuple3)
tuple4 = ([1,2,3],[4,5,6]) # touple of two list, touple is immutable but list are not
print(tuple4)
tuple5 = ()
print(tuple5)
print(type(tuple5))
tuple6 = 'hello', 
print(tuple6)
print(type(tuple6))

print(len(tuple5))
print(len(tuple6))

x, y, z = tuple1 # appropriety enoug
print(x, y, z)

