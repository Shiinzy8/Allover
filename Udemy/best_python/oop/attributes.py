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