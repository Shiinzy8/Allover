s = 'hello'

enc_ascii = s.encode('ascii')
enc_utf8 = s.encode('utf8')
enc_utf16 = s.encode('utf16')

print(type(enc_ascii))
print(enc_ascii)
print(enc_utf8)
print(enc_utf16)

print(len(enc_ascii))
print(len(enc_utf8))
print(len(enc_utf16))

ba = bytearray(b'hello') # same as bytes but mutable
ba[0] = 87 # this W

print(ba)

jpeg = [120, 3, 255, 0 , 100]
with open('bytes_sample.bin', 'w+b') as file: # without b will read as text
    file.write(bytes(jpeg))

with open('bytes_sample.bin', 'rb') as file: # withou b will read as text
    data = file.read()
    for b in data:
        print(int(b))