
from SimpleXMLRPCServer import SimpleXMLRPCServer
from SimpleXMLRPCServer import SimpleXMLRPCRequestHandler

# Restrict to a particular path.
class RequestHandler(SimpleXMLRPCRequestHandler):
    rpc_paths = ('/RPC2',)

# Create server
server = SimpleXMLRPCServer(("localhost", 8000),
                            requestHandler=RequestHandler)
server.register_introspection_functions()

# Register pow() function; this will use the value of
# pow.__name__ as the name, which is just 'pow'.
server.register_function(pow)

# Register a function under a different name
def adder_function(x,y):
    return x + y
server.register_function(adder_function, 'add')

def adder_function2():
    print "in my add func"
    return 2+2
server.register_function(adder_function2, 'add2')

def subtract_function(x,y):
   return (x-y)
server.register_function(subtract_function,'subtract')



def divide_function(x,y):
   return (float(x)/float(y))
server.register_function(divide_function,'divide')

def multiply_function(x,y):
   return (x*y)
server.register_function(multiply_function,'multiply')


# Run the server's main loop
server.serve_forever()
