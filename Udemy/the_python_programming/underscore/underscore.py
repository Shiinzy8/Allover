# The underscore
# Often ignored, multiple uses
# _Single
# __Doble
# __Before
# After__
# __Both

# Skipping
for _ in range(3):
    print("Hello")

# Test class
from person import *

# Before (Single)
# Internal use only, called a weak private
p = Person()
p.setName('Brian')
p._name = 'Peter'
print(f"Weak private {p._name}")
p._name = 'Oleg'
print(f"Weak private {p._name}")

# Before (Double)
# Internal use only, avoid conflict in subclass
# and tells python to rewrite the name (Mangling)
p = Person()
p.work()
# p.__think()
c = Child()
# c.testDoudle()

# After (Any)
# class = Person() # class is reserved name
class_ = Person() # this will not have conflicts
print(class_)

# BEfore and After
# Considered special to python, like the init and main function
p = Person()
p.__call__() 

