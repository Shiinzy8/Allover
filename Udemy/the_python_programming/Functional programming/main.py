def fib(n): # write Fibonacce series up to n
    """ Print a Fibonacci series up to n """
    a, b = 0, 1
    while a < n:
        print(a, end=' ')
        a, b = b, a+b
    print()
# Now call the function we just defined:
# fib(2000)
# print(fib)
# f = fib
# f(100)
# print(f(0))

def fib2(n):
    a, b = 0, 1
    result = []
    while a < n:
        result.append(a)
        a, b = b, a+b
    return result

# f100 = fib2(100)
# print(f100)

i = 5
def f(arg=1):
    print(arg)
i = 6
# f() # here i will be 5

def f2(a, L=None):
    if L is None:
        L = []
    L.append(a)
    return L
# print(f(1))
# print(f(2))
# print(f(3))

def parrot(voltage, state='a stiff', action='voom', type='Norwegian Blue'):
    print("-- This parrot wouldn't", action, end=' ')
    print("if you put", voltage, "volts Thrught it.")
    print("-- Lovely plumage, the", type)
    print("-- It's", state, "!")

# parrot(1000) # right
# parrot(voltage=1000) # right
# parrot(voltage=1000, action='ACTION') # right
# parrot(action='ACTION', voltage=1000) # right
# parrot('a million', 'bereft of life', 'jump') # right
# parrot('a thousand', state='pushing up the daisies') # right

# parrot() # wrong
# parrot(volatage=5.0, 'dead') # wrong
# parrot(110, voltage=220) # wrong
# parrot(actor='John') # wrong

# Anonimous function, name from: lambda
# they can have only one expretion bun many arguments

def make_incrementor(n):
    return lambda x: x + n
f = make_incrementor(42)
# print(f(1)) # result is 43, here 1 is an X in lambda funtion

def make_incrementor2(n):
    return lambda x,y: x+y+n
f = make_incrementor2(1)
# print(f(2,3))
