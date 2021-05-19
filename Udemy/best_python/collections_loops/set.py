my_set = set()
print(my_set)
print(type(my_set))

# set has only unique elements

my_set.add(1)
print(my_set)

my_set.add(2)
print(my_set)

my_set.add(2)
print(my_set)

print(len(my_set))
print(2 in my_set)

# all elements are not sorted

set1 = {1,2,3,4}
set2 = {1,2,3,4,5}

print(set1.issubset(set2))
print(set2.issubset(set1))
print(set2.issuperset(set1))
print(set1.isdisjoint(set2))
print(set1.union(set2))

set1.update({5,6,7})
set1.remove(1)
set1.remove(42)  # error if 42 doesn't exist
set1.discard(2)
set1.discard(42)  # tries remove without error

set1.pop()  # remove random element and return it
set1.clear()  # clear all set element
