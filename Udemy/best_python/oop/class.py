# class can have more than one constructor

class Character():
    def __init__(self, race):
        self.race = race

    pass

unit = Character(race='elf')
print(type(unit))

class Char():
    max_speed = 100
    dead_health = 0

    def __init__(self, race, damage=10, armor=20):
        self.race = race
        self.damage = damage
        self.armor = armor
        self.health = 100
    def hit(self, damage):
        self.health -= damage
    def is_dead(self):
        return self.health == Char.dead_health

un = Char('ork')