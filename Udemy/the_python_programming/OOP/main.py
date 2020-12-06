class FirstClass:
    a = 10
    def __init__(self, name, age):
        self.name = name
        self.age = age
    def firstfunc(self):
        print("Hi, my nae is: " + self.name)


obj1 = FirstClass('Andrii', 35)

print(obj1.a)
print(obj1)
obj1.firstfunc()
obj1.age = 34
obj1.name = 'Ros'
obj1.firstfunc()

del obj1.name # delete attribute
del obj1.firstfunc # delete method
obj1.firstfunc()
del obj1 # delete whole object
