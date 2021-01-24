print(2>1)

result = 2>3
print(type(result))

print(2 > 2)
print(2 >= 2)
print(3 >= 2)
print(2 <= 3)
print(2 == 2)
print(2 != 2)
print(2 != 3)

print("string" == "string")
print("string" == "String")
print("string" == "another string")

first = "string"
second = "string"
print(first.lower() == second.lower()) # to ignore register

print(1 < 2 < 3) # True
print(1 < 2 and 2 < 3) # True
print(1 > 2 and 2 < 3) # False
print(1 > 2 or 2 < 3) # True