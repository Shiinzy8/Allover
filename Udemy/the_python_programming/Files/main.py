
# open() # 1 parameter - file name, 2 - mood of openint this file
# readline()
# read()
# write()

address = "Udemy/the_python_programming/Files" 
f = open(f"{address}/demo.txt", "a") # a = append, creates if it doesn't exist
f.write("Now you can see new content")
f.close() # close more than once is allowed

f = open(f"{address}/demo.txt", "r") # read mode
print(f.read())

f = open(f"{address}/demo.txt", "w") # creates a file if it doesn't exist
f.write("----- A new content -----") # overwrite all file content
f.close()

f = open(f"{address}/demo.txt", "r")
print(f.read())

f = open(f"{address}/demoW.txt", "w") # will create new file
f = open(f"{address}/demoX.txt", "x") # will create new file

