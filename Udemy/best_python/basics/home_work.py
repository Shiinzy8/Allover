# 1. Клиент покупает кофе в кафе. 
# За каждые 6 чашек, 1 чашка даётся в качестве бонуса.

# Задача: запросить у пользователя кол-во чашек
#  на покупку, вычислить полагающееся кол-во бонусных
#   чашек кофе и вывести это число на консоль.

coffee_cups = input("How many cups of coffee have you already bougth?")
bonus_cups = int(coffee_cups)/6
print(int(bonus_cups))

# 2. Запросить у пользователя координаты x и y двух точек на плоскости.
#  Посчитать расстояние между заданными точками и вывести результат 
#  на консоль с точностью до трёх знаков после запятой (плавающей точки).

import math

first_x = int(input("Input x of the first point"))
first_y = int(input("Input y of the first point"))
second_x = int(input("Input x of the second point"))
second_y = int(input("Input y of the second point"))
distance = math.sqrt(pow((second_x - first_x), 2) + pow((second_y - first_y), 2))
distance2 = ((second_x - first_x)**2 + (second_y - first_y)**2)**0.5

print(round(distance, 3))
print(round(distance2, 3))

# 3. На ферме есть куры, коровы и свиньи. У курицы две ноги, у свиньи
#  - четыре, у коровы - четыре. Запросить у пользователя (фермера) 
#  ввод кол-ва кур, свиней и коров, просуммировать кол-во ног всех 
#  животных и вывести результат на консоль.

chickens = int(input("Input number of chickens"))
cows = int(input("Input number of cows"))
pigs = int(input("Input number of pigs"))

number_of_legs = chickens*2 + cows*4 + pigs*4

print(number_of_legs)