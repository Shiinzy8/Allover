# Test class

class Person:
    # Weak private, you can access out from class
    _name = "No name"

    def setName(self, name):
        self._name = name
        print(f"Name set to {self._name}")

    # Strong private
    def __think(self):
        print("Thanking to my self")
    def work(self):
        self.__think()

    # BEfore and After
    def __init__(self):
        print('Constructro')
    def __call__(self):
        print('Call someone')

class Child(Person):
    def testDoudle(self):
        self.__think(self)