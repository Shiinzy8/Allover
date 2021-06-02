class Character():
    MAX_SPEED = 100 # constant
    def __init__(self, race, damage = 10) -> None:
        self.damage = damage
        self.__race = race # private attribute
        self._health = 100 # protected attribute

    def hit(self, damage):
        self._health -= damage

    @property
    def health(self):
        return self._health

    @property
    def race(self):
        return self.__race

c = Character('elf')
# c.__race # this will be a mistake
# c._Character__race = 'ork'
# print(c._Character__race)
# c._health

class StaticTest():
    x = 1

s1 = StaticTest()
print(f'Via instance {s1.x}')
print(f'Via class {StaticTest.x}')

s1.x = 2
print(f'Via instance {s1.x}')
print(f'Via class {StaticTest.x}')

StaticTest.x = 3
print(f'Via instance {s1.x}')
print(f'Via class {StaticTest.x}')

class Date:
    def __init__(self, month, day, year) -> None:
        self.month = month
        self.year = year
        self.day = day
    
    def display(self):
        return f'{self.month}-{self.day}-{self.year}'

    @classmethod
    def millenium_c(cls, month, day):
        return cls(month, day, 2000)

    @staticmethod
    def millenium_s(month, day):
        return Date(month, day, 2000)

d1 = Date.millenium_c(6,9)
d2 = Date.millenium_s(6,9)

print(d1.display())
print(d2.display())

class DateTime(Date):
    def display(self):
        return f'{self.month}-{self.day}-{self.year} - 00:00:00pm'

dt1 = DateTime(10, 10, 1990)
dt2 = DateTime.millenium_s(10, 10) # doesn't know about Date
dt3 = DateTime.millenium_c(10, 10)

print(isinstance(dt1, DateTime))
print(isinstance(dt2, DateTime))
print(isinstance(dt3, DateTime))
print(dt1.display())
print(dt2.display())
print(dt3.display())
