#!/usr/bin/env python
# -*- coding: windows-1250
import socket
import sys
import urllib

# Create a UDP socket
sock = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)

server_address = ('......', 8899)
message = 'AT+CELCIUS\r'
# message = 'AT+PRESSURE\r'


try:

    # Send data
#    print >>sys.stderr, 'Wysyłam "%s"' % message
    sent = sock.sendto(message, server_address)

    # Receive response
#    print >>sys.stderr, 'Czekam na odpowiedź'
    data, server = sock.recvfrom(4096)
#    print >>sys.stderr, 'Otrzymałem "%s"' % data[0:len(data)-2]

finally:
#    print >>sys.stderr, 'Zamykam połączenie'
    sock.close()



url = "http://meteo.wachcio.pl/API/..........."+data[0:len(data)-2]

response = urllib.urlopen(url).read()

#print response
