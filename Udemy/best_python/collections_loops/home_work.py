# 1. Вывести лесенкой символ звёздочки по кол-ву строк, 
# заданных пользователем:
# запросить ввод у пользователя кол-ва строк,
# вывести звёздочки лесенкой.

count = input()

x = 1
while x <= int(count):
    print('*'*x)
    x+=1 

# 2. Запросить у пользователя ввод числа. 
# Построить цикл от 0 до введённого числа (включительно) 
# и для чётных чисел вывести то, что они чётные, 
# а для нечётных, что они нечётные. Пример вывода:

number = int(input())
for n in range(0, number+1):
    if n % 2 == 0:
        print(f'{n} number is even')
    else:
        print(f'{n} number is odd')

# 3. Камень ножницы бумага
import random

should_continue = True
while should_continue:
    player_choice = input('Put choice here:')

    if player_choice not in ['r', 's', 'p']:
        print('Incorrect input: Please use r or s or p')
        continue

    gen = {1:'r', 2:'s', 3:'p'}
    comp_choise = gen[random.choice([1,2,3])]

    print(f'Compor choice = {comp_choise}')

    winning_combinations = [{'p','r'}, {'r', 's'}, {'s', 'p'}]

    if player_choice == comp_choise:
        print('A draw')
    elif (player_choice in winning_combinations):
        print('You win')
    else:
        print('Comp win')
    
    should_continue = input('Want to proceed? [y/n]').lower() == 'y'