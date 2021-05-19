import sys

limit = int(input()) # получили ввод числа от пользователя, например 10

# ниже ваше решение:
limit += 1
arg_list = [n for n in range(0, limit) if n % 3 == 0 or n % 5 == 0]
print(sum(arg_list))

first_lst = [1,2,3,4,5]
second_lst = [6,7,8,9,10]

# ваше решение ниже:
joined_list = [n for n in first_lst + second_lst if (n in first_lst and n % 2 == 1) or (n in second_lst and n % 2 == 0)]

current_hand = [2, 3, 4, 10, 'Q', 5] # например, [2, 3, 4, 10, 'Q', 5]

# ваше решение ниже:
zero = (7,8,9)
first = (2,3,4,5,6)
minus = (10, 'J', 'Q', 'K', 'A')

cards_sum = 0
for card in current_hand:
    if card in first:
        cards_sum += 1
    elif card in minus:
        cards_sum -= 1
    else:
        continue

table_cards = ["A_S", "J_H", "7_D", "8_D", "10_D"]
hand_cards = ["J_D", "3_D"]

# ниже ваша реализация:
d_sum = 0
s_sum = 0
h_sum = 0
c_sum = 0

for card in table_cards + hand_cards:
    if 'S' in card:
        s_sum += 1
    elif 'H' in card:
        h_sum += 1
    elif 'D' in card:
        d_sum += 1
    elif 'C' in card:
        c_sum += 1
    else:
        break

if s_sum > 3 or c_sum > 3 or d_sum > 3 or h_sum > 3:
    print('Flush!')
else:
    print('No Flush!')

flush = [sum([card[-1] for card in table_cards + hand_cards]) >= 3 for suit in 'CHSD']

number = 121

# ниже ваше решение
reverse_number = 0
copy_number = number
while copy_number > 0:
    reverse_number *= 10
    reverse_number = reverse_number + copy_number % 10
    copy_number = copy_number// 10

if reverse_number == number:
    print('Palindrome')
else:
    print('No Palindrome')
