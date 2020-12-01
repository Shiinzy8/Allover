class MyClass:
    """A simple example class""" # this is also MyClass.__doc__
    i = 12345

    def __init__(self):
    self.data = []

    def f(self): # MyClass.f is and method object
        return 'hello world'

print(MyClass().__doc__)