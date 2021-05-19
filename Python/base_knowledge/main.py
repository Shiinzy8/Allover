# This is a sample Python script.

# Press Shift+F10 to execute it or replace it with your code.
# Press Double Shift to search everywhere for classes, files, tool windows, actions, and settings.


def print_hi(name):
    # Use a breakpoint in the code line below to debug your script.
    print(f'Hi, {name}')  # Press Ctrl+F8 to toggle the breakpoint.

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

def test_print():
    decorate = split_string(say_hi)
    print(decorate())

    # очень большое значение имеет последовательность декораторов
    @split_string
    @upper_string
    def say_hi_dec():
        return 'hello world'

    print(say_hi_dec())

    test = 'Тестовая строка'
    test2 = 2

    print(test + str(test2))
    print(int('2' + '4'))
    print(float("210" * int("2")))

def tuple_what():
    print('run tuple_what')
    # a_tuple = (1, 2)
    # a_tuple[0] += 1  # obvious error, tuple immutable

    # # x += y
    # result = x.__iadd(y)
    # x = result

    # # x[0] += y
    # result = x[0].__iadd(y)  # calls __getitem__
    # x[0] = result  # calls _-setitem__

    # # x.val += y
    # result = x.val.__iadd(y)  # calls __getattr__
    # x.val = result  # calls __setattr__

    x = 1
    print(id(x))
    x += 1
    print(id(x))
    y = 2
    print(id(y))

def loop():
    test = True

    while test:
        print('privet')
        test = False

def test_list():
    test = [1,2,3,4,5]
    print(test[0])
    test_2 = [1,2,3,4,5,[6,7,8,9]]
    print(test_2[5][0])

def main():
    # tuple_what()
    # print_hi('PyCharm')
    # loop()
    test_list()

# Press the green button in the gutter to run the script.
if __name__ == '__main__':
    main()
