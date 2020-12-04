import mymodule
import mymodule as mym

import platform


mymodule.greeting('Andrii')
a = mymodule.person1["name"]
print(a)
b = mym.person1["name"]
print(a)

x = dir(platform) # all about the platform
print(x)
y = platform.system() # current system information
print(y)
print(help('modules')) # all modules in system