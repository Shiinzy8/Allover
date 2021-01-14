
class Phonebook:
    def __init__(self):
        self.entries = {} # dict
    
    def add(self, name, number):
        self.entries[name] = number
    
    def lookup(self, name):
        return self.entries[name]
        
    def is_consistent(self):

        # for duplicates in numbers
        rev_dict = {}
        for key, value in self.entries.items():
            rev_dict.setdefault(value, set()).add(key)

        result = [key for key, values in rev_dict.items() if len(values)>1] # generate list
        if len(result)>0:
            return False

        # for empty numbers
        result = [key for key, values in self.entries.items() if bool(value) is False]
        if len(result)>0:
            return False

        # for number is prefix of another number
        for key, value in self.entries.items():
            for key_1, value_1 in self.entries.items():
                if key == key_1:
                    continue
                if value_1[:(len(value))] == value:
                    return False

        return True
