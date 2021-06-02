# Any code that create an error, stops programm
def divide(a, b):
    try:
        return a/b
    except ZeroDivisionError as ex:
        print(f'An error occured: {ex}')

divide(4,0)

def get_int():
    while True:
        try:
            reply = int(input('Input int'))
            return reply
        except:
            print('Not a int')
            continue

class InvalidTriangleError(Exception):
    ''' Raised when a triangle invalid side '''