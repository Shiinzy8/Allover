d1 = {}
d1['a'] = 'A'
d1['b'] = 'B'
d1['c'] = 'C'

d2 = {}
d2['c'] = 'C'
d2['a'] = 'A'
d2['b'] = 'B'

d3 = {}
d3['a'] = 'A'
d3['c'] = 'C'
d3['b'] = 'B'

print(d1 == d2) # True
print(d1 == d3) # True

for key, value in d1.items():
    print(key + ' ' + value)

from collections import OrderedDict

d1 = OrderedDict()
d1['a'] = 'A'
d1['b'] = 'B'
d1['c'] = 'C'

d2 = OrderedDict()
d2['c'] = 'C'
d2['a'] = 'A'
d2['b'] = 'B'

d3 = OrderedDict()
d3['a'] = 'A'
d3['c'] = 'C'
d3['b'] = 'B'

print(d1 == d2) # False
print(d1 == d3) # False
