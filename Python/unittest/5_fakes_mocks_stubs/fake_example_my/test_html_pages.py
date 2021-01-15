
import unittest
import os
import tempfile
import io

from html_pages import HtmlPagesConverter

class HtmlPagesTest(unittest.TestCase):
    def test_inserts_br_tags_for_linebreaks(self):
        converter = HtmlPagesConverter(FakeFileWrapper("plain text\n"))
        new_text = converter.get_html_page()
        self.assertEqual("plain text<br />", new_text)

    def test_set_default_end_page(self):
        converter = HtmlPagesConverter(FakeFileWrapper("test"))
        self.assertEqual(converter.page_end, 4) 

    def test_set_wrong_end_page(self):
        converter = HtmlPagesConverter(FakeFileWrapper("second test"))
        with self.assertRaises(IndexError):
            converter.set_page_start(1)

    def test_set_end_page(self):
        converter = HtmlPagesConverter(FakeFileWrapper("page one\nPAGE_BREAK\npage two"))
        converter.set_page_start(1)
        self.assertEqual(converter.page_end, 28)
        
    def test_quotes_escaped(self):
        converter = HtmlPagesConverter(FakeFileWrapper("text with 'quotes'"))
        new_text = converter.get_html_page()
        self.assertEqual("text with &#x27;quotes&#x27;<br />", new_text)

    def test_random_access_pages(self):
        converter = HtmlPagesConverter(FakeFileWrapper("page one\nPAGE_BREAK\npage two\nPAGE_BREAK\npage three"))
        converter.set_page_start(1)
        page_two = converter.get_html_page()
        self.assertEqual("page two<br />", page_two)
         
        
class FakeFileWrapper:
    def __init__(self, text):
        self.text = text
        
    def open(self):
        return io.StringIO(self.text)
