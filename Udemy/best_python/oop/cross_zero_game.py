class CrossZero:
    def __init__(self):
        self.marks = {1:'X', 2:'O'}
        self.fields = {1:' ', 2:' ', 3:' ', 4:' ', 5:' ', 6:' ', 7:' ', 8:' ', 9:' ',}
        self.winner = False
        self.player = 1
        self.round = 0
    def play(self):
        while self.winner is False:
            self.draw_field()
            self.make_move()
            self.check_winner()
            if (self.round >= 5 and self.winner) or self.round >= 9:
                break
            self.change_player()
        if self.winner:
            print(f'{self.player}-{self.marks[self.player]} wins')
        else:
            print('draw')
    def change_player(self):
        self.player = 2 if self.player == 1 else 1
    def draw_field(self):
        print(' |1|2|3| ')
        print(f' |{self.fields[1]}|{self.fields[2]}|{self.fields[3]}| ')
        print(f'4|{self.fields[4]}|{self.fields[5]}|{self.fields[6]}|6')
        print(f' |{self.fields[7]}|{self.fields[8]}|{self.fields[9]}| ')
        print(' |7|8|9| ')
    def make_move(self):
        self.round += 1
        print(f'{self.player}-{self.marks[self.player]} player move, please insert number from 1 to 9')
        position = int(input())
        if self.fields[position] != ' ':
            print('You choose occupaied field')
            self.make_move()
        self.fields[position] = self.marks[self.player]
        return 
    def check_winner(self):
        if (
            self.marks[self.player] == self.fields[1] == self.fields[2] == self.fields[3]
            or 
            self.marks[self.player] == self.fields[4] == self.fields[5] == self.fields[6]
            or
            self.marks[self.player] == self.fields[7] == self.fields[8] == self.fields[9]
            or
            self.marks[self.player] == self.fields[1] == self.fields[4] == self.fields[7]
            or
            self.marks[self.player] == self.fields[2] == self.fields[5] == self.fields[8]
            or
            self.marks[self.player] == self.fields[3] == self.fields[6] == self.fields[9]
            or
            self.marks[self.player] == self.fields[1] == self.fields[5] == self.fields[9]
            or
            self.marks[self.player] == self.fields[3] == self.fields[5] == self.fields[7]
        ):
            self.winner = True

game = CrossZero()
game.play()