def greeting():
    '''
    DOSTRING: Information about the function
    INPUT: no input
    OUTPUT: hello
    '''
    print('hello')

greeting()

print(greeting)
# help(greeting)

def print_name(name='First'):
    print(name)
    return name

print_name()

def is_palindrome(text):
    return text == text[::-1]

print(is_palindrome('doroorod'))