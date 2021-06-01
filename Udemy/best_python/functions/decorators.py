def hello_world():
    print("Hello, world 1!")

hello_world()
hello_world

hello2 = hello_world
hello2()

def hello_world3():
    def internal():
        print("Hello, world 3!")
    return internal

hello2 = hello_world3()
hello2()

def say_something(func):
    func()

def hello_world4():
    print("Hello, world 4!")

say_something(hello_world4)

def log_decorator(func):
    def wrap():
        print(f'Calling func {func}')
        func()
        print(f'Func {func} finished its work')
    return wrap

def hello_world5():
    print("Hello, wrold 5!")

wrapped_by_logger = log_decorator(hello_world5)
wrapped_by_logger()

@log_decorator
def hello_world6():
    print("Hello, world 6!")

hello_world6()

from timeit import default_timer as timer
import math
import time

def measure_time(func):
    def wrap(*args, **kwargs):
        start = timer()
        time.sleep(2)
        func(*args, **kwargs)

        finish = timer()

        print(f'Function {func.__name__} took {finish-start} for execution')
    return wrap

@measure_time
@log_decorator
def hello_world7():
    print("Hello, world 7!")

hello_world7()

from functools import wraps

def measure_time_with_wrap(func):
    @wraps(func) # with this decorator help will show annotation of a func not a decoratot
    def wrap(*args, **kwargs):
        start = timer()
        time.sleep(2)
        func(*args, **kwargs)

        finish = timer()

        print(f'Function {func.__name__} took {finish-start} for execution')
    return wrap

@measure_time_with_wrap
def hello_world8():
    print("Hello, world 8!")

help(hello_world8)