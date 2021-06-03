class Animal():
    def die(self):
        print('bye-bye')
        self.health=0

class Carnivour:
    def hunt(self):
        print('eating')
        self.satiety=100

class Dog(Animal, Carnivour):
    def bark(self):
        print('woof-woof')

dog = Dog()
dog.bark()
dog.hunt()
dog.die()

class Animal2:
    def set_health(self, health):
        print('set in animal')

class Carnivour2(Animal2):
    def set_heatlh(self, health):
        print('set in carnivour')

class Mammal2(Animal2):
    def set_health(self, health):
        print('set in mammal')

class Dog2(Mammal2, Carnivour2):
    pass

dog2 = Dog2()
dog2.set_health(10)

# super from bottom and left to top and right