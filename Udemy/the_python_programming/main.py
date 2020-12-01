# Introduction to the Python programming language
# Types:
# int
# float
# complex
    # x = int(input('Please input number: '))
    # if x < 0:
    #     x = 0
    #     print('Negative changed to zero')
    # elif x == 0:
    #     print('Zero')
    # elif x == 1:
    #     print('Single')
    # else:
    #     print('More')
# -------------------------------------------------------------------------------------
# words = ['cat', 'window', 'defenstrate']
# for w in words:
#     print(w, len(w))
# -------------------------------------------------------------------------------------
# for i in range(0,10,3):
#     print(i)

# print(sum(range(3))) # 3 is not included
# -------------------------------------------------------------------------------------
# for n in range(2, 10):
#     for x in range(2, n):
#         if n % x == 0:
#             print(n, 'equals', x, '*', n//x)
#             break
#     else:
#         print(n, 'is a prime number')

# if len(words):
#     pass # dummy word
# -------------------------------------------------------------------------------------
# i = 1
# while i < 3:
#     print(i)
#     i += 1
# else:
#     print('i is no more less then 3')
# -------------------------------------------------------------------------------------
# # wounders of the python:
# #
# print(11 > 0 is True) # False
#     # False because python interpreting this as (11 > 0) and (0 is True). Chained comparisons.
#     # https://docs.python.org/3/reference/expressions.html#comparisons
# print((11 > 0) is True) # True
# #
# def test():
#     a = 257
#     b = 257
#     print(a is b)
# test()
# import dis # library to see internal calls in python
# dis.dis(test)
# #
# class C:
#     a = lambda self: self.b()
#     def __init__(self):
#         self.b = lambda self: None
# c = C()
# c.a() # we will have error because b is not a method it is a simple function
#       # but lambda in this function needs 1 parameter and we didn't pass it
# -------------------------------------------------------------------------------------
# def create_multipliers():
#     return [lambda x : i * x for i in range(5)]
# for multiplier in create_multipliers():
#     print(multiplier(2))
# # multiplier will execute with parameter 2, but i in internal function already calculated
# # because create_multiliers in alredy finished its work, i = 4
# # -------------------------------------------------------------------------------------       