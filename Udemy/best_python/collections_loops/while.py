x = 0

while x<3:
    print(f'x = {x}')
    x+=1

x = 0

while x<3:
    print(f'x = {x}')
    x+=1
else:
    print('Condition is not met')

vals = range(1,10)

sum = 0
for v in vals:
    if v % 2 == 0:
        continue
    else:
        sum += v
    if sum > 10:
        break

print(sum)

for v in vals:
    pass  # this is nothing, whiout it there will be an error