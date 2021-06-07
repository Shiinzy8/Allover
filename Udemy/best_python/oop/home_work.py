class Name:
    def __init__(self, first_name, last_name):
        self.first_name = first_name[0].upper() + first_name[1:].lower()
        self.last_name = last_name[0].upper() + last_name[1:].lower()
        self.full_name = self.first_name + ' ' + self.last_name
        self.initials = f"{self.first_name[0]}.{self.last_name[0]}"

class Calculator:
    def add(self, a, b):
        return a + b
    def subtract(self, a, b):
        return a - b
    def multiply(self, a, b):
        return a * b
    def divide(self, a, b):
        return a / b

class Employee:
    def __init__(self, first_name, last_name, salary):
        self.first_name = first_name
        self.last_name = last_name
        self.salary = salary
    def from_string(self, string_name):
        parts = string_name.split('-')
        return Employee(parts[0], parts[1], int(parts[2]))

class Pizza:
    order_number = 0
    def __init__(self, ingredients):
        self.order_number = Pizza.order_number + 1
        Pizza.order_number += 1
        self.ingredients = ingredients
    def hawaiian():
        return Pizza(['ham', 'pineapple'])
    def meat_festival():
        return Pizza(['beef', 'meatball', 'bacon'])
    def garden_feast():
        return Pizza(['spinach', 'olives', 'mushroom'])

import math

class Circle:
    def __init__(self, radius):
        self.radius = radius
    def get_area(self):
        return math.pi * pow(self.radius, 2)
    def get_perimeter(self):
        return math.pi * self.radius * 2

prices = {"Strawberries" : 1.5, "Banana" : 0.5, "Mango" : 2.5,
		"Blueberries" : 1, "Raspberries" : 1, "Apple" : 1.75,
		"Pineapple" : 3.5}

class Beverage:
    def __init__(self, ingredients):
        self.ingredients = ingredients
        self.cost = 0
        self.price = 0
    def get_cost(self):
        self.cost = 0
        for i in self.ingredients:
            self.cost += prices[i]
        return "$%0.2f" % self.cost
    def get_price(self):
        self.price = 0
        self.get_cost()
        self.price = self.cost * 2.5
        return "$%0.2f" % self.price
    def get_name(self):
        ing = ' '.join([i.replace('berries', 'berry')  for i in sorted(self.ingredients)])
        if len(self.ingredients) > 1:
            ing += ' Fusion'
        else:
            ing += ' Smoothie'
        return ing
