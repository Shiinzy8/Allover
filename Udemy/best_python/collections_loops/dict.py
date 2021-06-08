# очень быстро взятие по ключу
# нельзя иметь два елемента с одинаковым ключем

players = {
    'Carlsen': 2842,
    'Caruana': 2822,
    'Mamedyarov': 2801,
    'Ding': 2792,
    'Giri': 2780,
}

print(players)

top = players['Carlsen']
print(f'Top check player\'s rating is {top}')

print(players.get('Carlsen '))

players['So'] = 2780
players['So'] = 2781
del players['So'] # delete

keys = players.keys()
print(type(keys))

l = list(players.keys())
print(type(l))

list_sorted = sorted(players.keys())
print(list_sorted)

print('Carlsen' in players)
print('Kramnik' in players)

v = players.values()
print(type(v))

for player, score in players.items():
    print(player + " score: " + str(score))

players.popitem()
len(players)

players.setdefault('Karjakin') # check if there is no item
    # then set it with value None

# in 3.5 python version dictionaries are randomized data structures

# Python dictionaries iteration

a_dict = {'color': 'blue', 'fruit': 'apple', 'pet': 'dog'}
print(a_dict)
for key in a_dict:
    print(key)
    print(key, '->', a_dict[key])
print(a_dict.items()) # new view in tuples
for item in a_dict.items():
    print(item)
for key, value in a_dict.items(): # tupel unpacking
    print(key, '->', value)
print(a_dict.keys())
for key in a_dict.keys():
    print(key, '->', a_dict[key])
print(a_dict.values())
for value in a_dict.values():
    print(value)
if 'pet' in a_dict.keys():
    print('Pet in a_dict keys')
if 'dog' in a_dict.values():
    print('Dog in a_dict values')

# to remove key
for key in list(a_dict.keys()): 
    # you can't simply a_dict.keys() because it yields one key at a time
    if key == 'pet':
        del a_dict[key]

# you can change value and key places but values must be of a hashable data type
a_dict['pet'] = 'dog'

b_dict = {value: key for key, value in a_dict.items()}
print(b_dict)

c_dict = {k:v for k,v in a_dict.items() if v != 'dog'}
print(c_dict)

a_incomes = {'apple': 5600.00, 'orange': 3500.00, 'banana': 5000.00}
total_income_1 = sum([value for value in a_incomes.values()])
total_income_2 = sum(value for value in a_incomes.values()) # this code yields value on demand
print(a_incomes)
b_incomes = {k: a_incomes[k] for k in a_incomes.keys() - {'orange'}}
print(b_incomes)
c_incomes = {k: a_incomes[k] for k in sorted(a_incomes)}
print(c_incomes)

# sort by values
def by_value(item):
    return item[1]
for k,v in sorted(a_incomes.items(), key=by_value):
    print(k, '->', v)
for v in sorted(a_incomes.values()):
    print(v)

# pop one item of a dictionary -> .popitem()

# map applies function to each dictionary element
prices = {'apple': 0.40, 'orange': 0.35, 'banana': 0.25}
def discount(current_price):
    return (current_price[0], round(current_price[1] * 0.95, 2))
new_prices = dict(map(discount, prices.items()))
print(new_prices)

# filter return element on which fuction returns True
prices = {'apple': 0.40, 'orange': 0.35, 'banana': 0.25}
def has_low_price(price):
    return prices[price] < 0.4
low_price = list(filter(has_low_price, prices.keys()))
print(low_price)

# chain map
from collections import ChainMap
fruit_prices = {'apple': 0.40, 'orange': 0.35}
vegetable_prices = {'pepper': 0.20, 'onion': 0.55}
chained_dict = ChainMap(fruit_prices, vegetable_prices)
print(chained_dict)
for key in chained_dict: # also can use values(), items(), keys()
    print(key, '->', chained_dict[key])

# cyclic
from itertools import cycle
prices = {'apple': 0.40, 'orange': 0.35, 'banana': 0.25}
times = 3  # Define how many times you need to iterate through prices
total_items = times * len(prices)
for item in cycle(prices.items()):
    if not total_items:
        break
    total_items -= 1
    print(item)

# chain
from itertools import chain
fruit_prices = {'apple': 0.40, 'orange': 0.35, 'banana': 0.25}
vegetable_prices = {'pepper': 0.20, 'onion': 0.55, 'tomato': 0.42}
for item in chain(fruit_prices.items(), vegetable_prices.items()):
    print(item)

# unpacking operator (**) only from python 3.5
fruit_prices = {'apple': 0.40, 'orange': 0.35}
vegetable_prices = {'pepper': 0.20, 'onion': 0.55}
# You can use this feature to iterate through multiple dictionaries
for k, v in {**vegetable_prices, **fruit_prices}.items():
   print(k, '->', v)
