
import html as html_converter

class FileAccessWrapper:
    def __init__(self, filename):
        self.filename = filename
        
    def open(self):
        return open(self.filename, "r", encoding="UTF-8")

class HtmlPagesConverter:

    def __init__(self, file_access):
        """Read the file and note the positions of the page breaks so we can access them quickly"""
        self.file_access = file_access
        self.breaks = [0]
        self.page_start = self.breaks[0]
        self.page_end = self.breaks[0]
        with self.file_access.open() as f:
            while True:
                line = f.readline()
                if not line:
                    break
                line = line.rstrip()
                if "PAGE_BREAK" in line:
                    page_break_position = f.tell()
                    self.breaks.append(f.tell())
            self.breaks.append(f.tell())
            if self.page_end == self.breaks[0]:
                self.page_end = self.breaks[1]

    def set_page_start(self, page):
        self.page_start = self.breaks[page]
        self.page_end = self.breaks[page+1]

    def get_html_page(self):
        """Return html page with the given number (zero indexed)"""
        html = ""
        with self.file_access.open() as f:
            f.seek(self.page_start)
            while f.tell() != self.page_end:
                line = f.readline()
                line = line.rstrip()
                if "PAGE_BREAK" in line:
                    continue
                html += html_converter.escape(line, quote=True)
                html += "<br />"
        return html

