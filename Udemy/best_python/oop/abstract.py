from abc import ABC, abstractmethod

# we can't create instance of ABC
class Shape(ABC):
    def __init__(self):
        super().__init__()

    @abstractmethod
    def draw(self):
        pass
    @abstractmethod
    def area(self):
        pass
    @abstractmethod
    def perimeter(self):
        print('calc perimeter')
    
    def drag(self):
        print('Basic dragging functionality')

class Triangle(Shape):
    def __init__(self, a, b, c) -> None:
        self.a = a
        self.b = b
        self.c = c
    def draw(self):
        print('Draw')
    def area(self):
        print('Area')
    def perimeter(self):
        print('Perimeter')
    def __str__(self):
        return f'Triangle {self.a} {self.b} {self.c}'

t = Triangle(5,5,10)
print(t)