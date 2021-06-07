# class CrossZero:
#     def __init__(self):
#         self.marks = {1:'X', 2:'O'}
#         self.fields = {1:' ', 2:' ', 3:' ', 4:' ', 5:' ', 6:' ', 7:' ', 8:' ', 9:' ',}
#         self.winner = False
#         self.player = 1
#         self.round = 0
#     def play(self):
#         while self.winner is False:
#             self.draw_field()
#             self.make_move()
#             self.check_winner()
#             if (self.round >= 5 and self.winner) or self.round >= 9:
#                 break
#             self.change_player()
#         if self.winner:
#             print(f'{self.player}-{self.marks[self.player]} wins')
#         else:
#             print('draw')
#     def change_player(self):
#         self.player = 2 if self.player == 1 else 1
#     def draw_field(self):
#         print(' |1|2|3| ')
#         print(f' |{self.fields[1]}|{self.fields[2]}|{self.fields[3]}| ')
#         print(f'4|{self.fields[4]}|{self.fields[5]}|{self.fields[6]}|6')
#         print(f' |{self.fields[7]}|{self.fields[8]}|{self.fields[9]}| ')
#         print(' |7|8|9| ')
#     def make_move(self):
#         self.round += 1
#         print(f'{self.player}-{self.marks[self.player]} player move, please insert number from 1 to 9')
#         position = int(input())
#         if self.fields[position] != ' ':
#             print('You choose occupaied field')
#             self.make_move()
#         self.fields[position] = self.marks[self.player]
#         return 
#     def check_winner(self):
#         if (
#             self.marks[self.player] == self.fields[1] == self.fields[2] == self.fields[3]
#             or 
#             self.marks[self.player] == self.fields[4] == self.fields[5] == self.fields[6]
#             or
#             self.marks[self.player] == self.fields[7] == self.fields[8] == self.fields[9]
#             or
#             self.marks[self.player] == self.fields[1] == self.fields[4] == self.fields[7]
#             or
#             self.marks[self.player] == self.fields[2] == self.fields[5] == self.fields[8]
#             or
#             self.marks[self.player] == self.fields[3] == self.fields[6] == self.fields[9]
#             or
#             self.marks[self.player] == self.fields[1] == self.fields[5] == self.fields[9]
#             or
#             self.marks[self.player] == self.fields[3] == self.fields[5] == self.fields[7]
#         ):
#             self.winner = True

# game = CrossZero()
# game.play()

# secodn variant
board = [' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ']
winning_combination = [(0,1,2),(3,4,5),(6,7,8),(0,3,5),(1,4,7),(2,5,8),(0,4,8),(2,4,6)]

def print_state(state):
    for i, c in enumerate(state):
        if (i+1)%3 == 0:
            print(f'{c}') # this is last element so we move the carret
        else:
            print(f'{c}|', end='')
def get_winner(state, combinations):
    for (x,y,z) in combinations:
        if (state[x]=='X' or state[y]=='O') and state[x] == state[y] == state[z]:
            return state[x]
    return ''
def play_game(board):
    current_sign = 'X'
    while(get_winner(board, winning_combination)==''):
        index = int(input(f'Where you want to draw {current_sign}?'))
        board[index] = current_sign

        print_state(board)

        winner_sign = get_winner(board, winning_combination)
        if winner_sign != '':
            print(f'We have a winner:{winner_sign}')
        current_sign = 'X' if current_sign == 'O' else 'O'

play_game(board)