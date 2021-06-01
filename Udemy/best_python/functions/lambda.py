def square(*args):
    return [x*x for x in args]

print(square(1,2,3,4,5))

def square_one(number):
    return number*number

print(list(map(square_one, [1,2,3,4,5]))) # map is lazy load

def is_adult(age):
    return age >= 18

print(list(filter(is_adult, [14,16,18,0,22]))) # filter is lazy load

# now we trying to do the same with lambda functions

is_adult_lambda = lambda age: age>=18
print(list(filter(is_adult_lambda, [14,16,18,0,22])))
print(list(filter(lambda age: age>=18, [14,16,18,0,22])))

multiplayer = lambda x,y: x*y
multiplayer(2,22)