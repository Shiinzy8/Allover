class Shape():
    def __init__(self) -> None:
        print('Create shape')
    def draw(self) -> None:
        print('Draw shape')
    def area(self) -> None:
        print('Shape area')
    def perimeter(self) -> None:
        print('Shape perimeter')

shape = Shape()

class Rectanlge(Shape):
    def __init__(self, width, length) -> None:
        super().__init__(self)

        self.width = width
        self.length = length

        super.area(self)

    def area(self):
        return self.width * self.length
    def perimeter(self):
        return 2*(self.width + self.length)
    def draw(self):
        print('Draw a rectangle')

import math
class Triangle(Shape):
    def __init__(self, a, b, c) -> None:
        super().__init__()

        self.a = a
        self.b = b
        self.c = c
        
        print('Triangle created')

    def draw(self):
        print('Drawind a triangle')
    def area(self):
        s = (self.a + self.b + self.c)/2
        return math.sqrt(s*(s-self.a)*(s-self.b)*(s-self.c))
    def perimeter(self) -> None:
        return self.a + self.b + self.c

t = Triangle(5,4,6)

t.draw()
print(t.area())
print(t.perimeter())

# for polimorfizm in python we should have same method name
# and same singature and we can run it
