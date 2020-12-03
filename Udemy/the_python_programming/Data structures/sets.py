# unordered collection without duplication
# it is unorder

basket = {'apple', 'orange', 'apple', 'pear', 'orange', 'banana'}
print(basket)
print('orange' in basket)
print('wine' in basket)

a = set('abracadaaba')
b = set('alacaza')

print(a)
print(b)
print(a - b) # what element from 'a' are not in 'b'
print(a | b) # elements from both
print(a & b) # elements are in 'a' and 'b'
print(a ^ b) # elements are in 'a' or 'b' but not in both

a = {x for x in 'abracadaabra' if x not in 'abc'}
print(a)
