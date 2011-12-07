import xmlrpclib

s = xmlrpclib.ServerProxy('http://localhost:8000')
print s.add2()  # Returns 5

