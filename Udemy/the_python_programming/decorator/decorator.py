# Decorator
# 
# Everything in python is an object
# That means function can be used as objects
# So we can do some really cool things
# A decorator takes in a function, adds some cuntionlaity and return it.
# ------------------------------------------
# # Basic decorator
# # In this example we will change the execution order

# def test_decorator(func):
#     print('before')
#     func()
#     print('after')

# @test_decorator
# def do_stuff():
#     print('DOING STUFF')
# ------------------------------------------
# # Real decorator
# # In this example we will change the functionality

# # @makeBold = f=makeBold(printName)
# # f()
# def makeBold(func):
#     def inner():
#         print("inner begin\n<b>")
#         func()
#         print("</b>\ninner finish")

#     return inner # Return the inner function

# @makeBold
# def printName():
#     print('Andrii')

# printName()
# ------------------------------------------
# # Real decorator with parameter
# # Notice this has a defined number of parameters

# def numCheck(func):
#     def checkInt(o):
#         if isinstance(o, int):
#             if o == 0:
#                 print('Can\'t divide by zero')
#             return True
#         print('This isn\'t a number')
#         return False
    
#     def inner(x,y): # same amount of parameter as in divide
#         if not checkInt(x) or not checkInt(y):
#             return
#         return func(x,y)
#     return inner

# @numCheck
# def divide(a,b):
#     print(a/b)

# divide(100, 3)
# divide(100, 'cat') # mistake due to type string
# ------------------------------------------
# Decorator with unknown number of paraemeters
# We want a decorator that can pass params and handle anything
# We also want to chain them together
# *args, **kwargs to the rescue

def outline(func):
    def inner(*args, **kwargs):
        print('~'*20)
        func(*args, **kwargs)
        print('~'*30)
    return inner
def list_item(func):
    def inner(*args, **kwargs):
        func(*args, **kwargs)
        print(f"args = {args}")
        print(f"kwargs = {kwargs}")
        for x in args:
            print(f"arg={x}")
        for k,v in kwargs.items():
            print(f"key={k} and value={v}")
    return inner
@outline
@list_item
def display(msg):
    print(msg)

# display("Hello world!")

@outline
@list_item
def birthday(name='Andrii', age=35):
    print(f"Happy birthday {name} now you are {age} years old")

birthday('Dmitro', 18)
birthday(name='Andrii', age=35)