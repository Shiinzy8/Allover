# This is a sample Python script.

# Press Shift+F10 to execute it or replace it with your code.
# Press Double Shift to search everywhere for classes, files, tool windows, actions, and settings.


def print_hi(name):
    # Use a breakpoint in the code line below to debug your script.
    print(f'Hi, {name}')  # Press Ctrl+F8 to toggle the breakpoint.


# Press the green button in the gutter to run the script.
if __name__ == '__main__':
    print_hi('PyCharm')

# See PyCharm help at https://www.jetbrains.com/help/pycharm/

print("Hello world!")

def split_string(function):
    def wrapper():
        func = function()
        splitted_string = func.split()
        return splitted_string

    return wrapper

def upper_string(function):
    def wrapper():
        func = function()
        uppered_string = func.upper() # только у массивом есть втсоенная функция upper, то есть перед этим не разбить строку то второй декоратор работать не будет
        return uppered_string

    return wrapper

def say_hi():
    return 'hello world'

decorate = split_string(say_hi)
print(decorate())

# очень большое значение имеет последовательность декораторов
@split_string
@upper_string
def say_hi_dec():
    return 'hello world'

print(say_hi_dec())