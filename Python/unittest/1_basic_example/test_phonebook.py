
import unittest
from phonebook import Phonebook

class PhoneBookTest(unittest.TestCase):

    def setUp(self):
        self.phonebook = Phonebook()

    def tearDown(self):
        del self.phonebook

    def test_lookup_entry_by_name(self):
        self.phonebook.add("Bob", "12345")
        self.assertEqual("12345", self.phonebook.lookup("Bob"))
        self.assertNotEqual("1234", self.phonebook.lookup("Bob"))

    def test_missing_entry_raises_KeyError(self):
        with self.assertRaises(KeyError):
            self.phonebook.lookup("missing")

    def test_empty_phonebook_is_consistent(self):
        self.assertTrue(self.phonebook.is_consistent())

    @unittest.skip("bad way to write test, if one is wrong others will skipped")
    def test_is_consistent(self):
        self.assertTrue(self.phonebook.is_consistent())
        self.phonebook.add("Bob", "12345")
        self.assertTrue(self.phonebook.is_consistent())
        self.phonebook.add("Mary", "012345")
        self.assertTrue(self.phonebook.is_consistent())
        self.phonebook.add("Sue", "12345") # identical to Bob
        self.assertTrue(self.phonebook.is_consistent())
        self.phonebook.add("Sue", "123") # prefix of Bob

    def test_phonebook_with_normal_entries_is_consisten(self):
        self.phonebook.add("Bob", "12345")
        self.phonebook.add("Marry", "012345")
        self.assertTrue(self.phonebook.is_consistent())

    def test_phonebook_with_duplicate_entries_is_inconsistent(self):
        self.phonebook.add("Bob", "12345")
        self.phonebook.add("Marry", "12345")
        self.assertFalse(self.phonebook.is_consistent())

    def test_phonebook_with_empty_number_is_inconsistent(self):
        self.phonebook.add("Bob", "12345")
        self.phonebook.add("Marry", "")
        self.assertFalse(self.phonebook.is_consistent())

    def test_phonebook_with_numbers_that_prefix_one_another_is_inconsistent(self):
        self.phonebook.add("Bob", "12345")
        self.phonebook.add("Marry", "123")
        self.assertFalse(self.phonebook.is_consistent())
    