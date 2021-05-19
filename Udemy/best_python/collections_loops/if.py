if True:
    print('Indeed, true.')

if 3 > 2:
    print('3 is greater than 2')

if 3 < 2:
    print('3 is less than 2')

is_admin = True
if is_admin:
    print('Now look at this')

selected_charater = input()  # returns the input of the user

if selected_charater == 'Protos':
    print('Protos is the most powerful race')
elif selected_charater == 'Zerg':
    print('Zerg is the most weak race')
elif selected_charater == 'Terrain':
    print('You input Terrain')
else:
    print('Hmm... is seems we have a new race')