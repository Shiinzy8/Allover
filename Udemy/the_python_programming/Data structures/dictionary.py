# Dictionarties are unordered, changeable and indexed
# {key: value}

dic = {'Jack': 4098, 'sape': 4139}
print(dic)
dic['guido'] = 4127
print(dic)

# print(dic['jack']) # error
print(dic['Jack'])

del dic['sape']
print(dic)

print(sorted(dic))
print('guide' in dic)
print('guido' in dic)
print('guide' not in dic)

dic2 = {x: x**2 for x in (2,4,6)}
print(dic2)

dic3 = dict(first=1, second=2, third=3)
print(dic3)