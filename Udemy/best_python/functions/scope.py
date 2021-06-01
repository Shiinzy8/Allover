greeting = "Hello from the global scope"

def greet():
    global greeting # this statement uses global scope variable
    greeting = "Hello from enclosing scope"

    def nested():
        greeting = "Hello from local scope"
        print(greeting)

    nested()

greet()
print(greeting)