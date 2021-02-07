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