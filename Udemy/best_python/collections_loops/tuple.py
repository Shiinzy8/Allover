strings = ('str1', 'str2', 'str3')
person = ('Jhon', 'Silver', '22')

# you can't assign data by index

type(person)
print(person[0])
print(person[-1])

# namedtuple, he is also unchangeable

players = [('Carlson', 1980, 2042), ('Carlson', 1992, 2004)]

print(players[0])

from collections import namedtuple

Player = namedtuple('Player', 'name age ratings')
players_named = [Player('Carlson', 19990, 2842), Player('Caruana', 1994, 2833)]
players_named[0].name
