import fizz_buzz
import unittest

class FizzBuzzTest(unittest.TestCase):
    def test_fizz(self):
        number = 6
        result = fizz_buzz.get_replay(number)
        self.assertEqual(result, 'Fizz')
    def test_buzz(self):
        number = 20
        result = fizz_buzz.get_replay(number)
        self.assertEqual(result, 'Buzz')
    def test_fizz_buzz(self):
        number = 15
        result = fizz_buzz.get_replay(number)
        self.assertEqual(result, 'FizzBuzz')

if __name__ == 'main':
    unittest.main()