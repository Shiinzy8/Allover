class Vehicle:
    def __init__(self, position) -> None:
        self.position = position
    def calculate_route(self, source, to):
        return 0
    def move_along(self, route):
        print('moving')
    def travel(self, destination):
        route = self.calculate_route(source=self.position, to = destination)
        self.move_along(route)

class RadioMixin:
    def __init__(self) -> None:
        self.radio = Radio()
    
    def turn_on(self, station):
        self.radio.set_station(station)
        self.radio.play()

class Radio:
    def set_station(self, station):
        self.station = station
    def play(self):
        print(f"Playing {self.station}")

class Car(Vehicle, RadioMixin):
    def __init__(self) -> None:
        Vehicle.__init__(self, (10,20))
        RadioMixin.__init__(self)

car = Car()
car.turn_on('Kyiv radio')