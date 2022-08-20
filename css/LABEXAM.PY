from math import ceil
def columnarEncrypt(message, key):
    print('your message is ', message)
  
    message = message.replace(' ', '')
    matrix_size = len(key)
    rows = len(message)/len(key)
    message = message.ljust(ceil(rows)*len(key), 'X')
    print('message after padding', message)
    message = list(message)
    box = []
    i = 0
    for row in range(ceil(rows)):
        box.append(message[i:i+len(key)])
        i += len(key)
    print(box) 
    priority_list = [ord(val) for val in list(key)]
    box_encrypted = []
    for r in box:
        row_tuples = []
        for c in range(len(r)):
            row_tuples.append((r[c], priority_list[c]))
        row_tuples.sort(key=lambda x: x[1])
        encrypted_row = [v[0] for v in row_tuples]
        box_encrypted.append(encrypted_row)
    print(box_encrypted)
    encrypted_text = []
    for line in box_encrypted:
        encrypted_text.extend(line)
    print("Your cipher text is ", ''.join(encrypted_text))

def columnarDecrypt(ciphertext, key):
    print('your Cipher Text is ', ciphertext)
    # message = list(message.replace(' ', ''))
    ciphertext = ciphertext.replace(' ', '')
    matrix_size = len(key)
    rows = len(ciphertext)/len(key)
    ciphertext = list(ciphertext)
    box = []
    i = 0
    for row in range(ceil(rows)):
        box.append(ciphertext[i:i+len(key)])
        i += len(key)
    print(box)
    key_list = list(key)
    sortedkey_list = key_list  
    sortedkey_list = sorted(key_list)

    sortedMessage = []
    for r in box:
        for k in key_list:
            sortedMessage.append(r[sortedkey_list.index(k)])


    print('Your Decrypted Message is ', ''.join(sortedMessage))


columnarEncrypt('defend the east wall of the castle', 'READY')

columnarDecrypt('feednhetdetwsaaoflltcaehseXltX', 'READY')