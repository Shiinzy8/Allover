# pip3 install progressbar
from progressbar import ProgressBar
import time

bar = ProgressBar(maxval=10)
bar.start()

for i in range(1, 10):
    bar.update(i)
    time.sleep(1)

bar.finish()