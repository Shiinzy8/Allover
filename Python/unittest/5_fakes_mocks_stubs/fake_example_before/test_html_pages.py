import unittest
import os
import tempfile # fake file acks like a real one, but stores in memory
import io

from html_pages import HtmlPagesConverter

class HtmlPagesTest(unittest.TestCase):
    def test_inserts_br_tags_for_linebreaks(self):
        filename = os.path.join(tempfile.gettempdir(), "afile.txt")
        f = open(filename, "w", encoding="UTF-8")
        f.write("plain text")
        f.close()
        converter = HtmlPagesConverter(filename)
        new_text = converter.get_html_page(0)
        self.assertEqual("plain text<br />", new_text)