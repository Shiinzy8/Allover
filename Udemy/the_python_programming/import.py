# Import maddness

# __init__
# what is it, why do we need it

# make a sub folder
# add thi files/code

# imports

# import sub.test as code
# code.doTest()

from sub import *
from sub import test as code

# call the code
def main():
    print("This is the main functiion")
    doTest()
    code.doTest()

if __name__ == "__main__":
    main()