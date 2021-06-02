# p1 = '         Bang!       '
# p2 = '     Bang!      '

def whos_first(p1, p2):
    # ваше решение
    p1_pos = p1.find('B')
    p2_pos = p2.find('B')
    
    if p1_pos < p2_pos:
        return 'p1'
    elif p2_pos < p1_pos:
        return 'p2'
    else:
        return 'tie'

def solve_hanoi_tower(discs):
    # ваше решение
    return pow(2, discs) - 1

# calc_dice_scores([(1,2),(3,4),(5,6)]) -> 21
# calc_dice_scores([(1,1),(3,4),(5,6)]) -> 0
# calc_dice_scores([(4,5),(4,5),(4,5)]) -> 27
# calc_dice_scores([(1,2),(0,0),(5,6)]) -> 0
def calc_dice_scores(lst):
    # ваше решение
    score = 0
    for x,y in lst:
        if x == y:
            return 0
        score += x
        score +=y
    return score

    # return sum([a+b for a,b in lst]) if not any([a==b for a,b in lst]) else 0 

# any_duplicates([[1,2,3],[4,5,6][7,8,9]]) -> False
# any_duplicates([[1,2,3],[7,9,8][4,6,5]]) -> False
# any_duplicates([[1,1,3],[4,5,6][7,8,9]]) -> True
# any_duplicates([[1,2,3],[4,5,5][7,8,9]]) -> False
def any_duplicates(square):
    # ваше решение
    numbers_set = set()
    for l in square:
        for number in l:
            numbers_set.add(number)
    
    if len(numbers_set) == 9:
        return False
    return True

    # plain = [i for x in square for i in x] for in fro from left to right
    # return sorted(plain) != [1,2,3,4,5,6,7,8,9]


# А теперь первое серьёзное домашнее задание. 
# Вы попробуете разработать игру.

# Предлагаю древнюю китайскую игру в палочки.

# Играют два игрока.  Есть 10 палочек. Игроки по очереди берут от одной до трёх палочек. 
# Играют до тех пор пока не закончатся палочки. Тот кто взял последним - тот проиграл.

# Реализуйте игру таким образом, чтобы могли играть два человека. 
# Изначально есть 10 палочек. На каждом ходу выводите на консоль текущее количество 
# оставшихся палочек и просите ввести количество палочек, которое хочет взять игрок 
# (который делает ход). Не забывайте менять очерёдность игроков и сокращать 
# кол-во палочек. В конце надо вывести кто победил - первый или второй игрок.

# Нюансы реализации могут отличаться. Кто-то может захотет запросить имена у игроков. 
# Кто-то может захотеть реализовать не с 10-ю палочками, а с тем количеством, 
# которое введёт пользователь (может он хочет играть с 20-ю палочками?).

sticks = int(input('Input number of sticks: '))
player_one = str(input('First player name: '))
player_two = str(input('Second player name: '))
players = [player_one, player_two]

def stick_game(players, sticks):
    while sticks > 0:
        player = players.pop(0)
        print(f'{player} player move')

        remove = 0
        while remove <= 0 or remove > 3:
            remove = int(input('How many to remove (1-3): '))
        sticks -= remove

        print(f'{sticks} left')
        players.append(player)
    
    print(f'{player} lost')

stick_game(players, sticks)