"""
This script sets up a simple HTTP server using Python's built-in http.server module.
It defines a custom request handler, CustomHandler, which overrides the default error handling to serve
a custom index.html page when a 404 error occurs. The server is configured to run on host '0.0.0.0' and port 8000
by default. The server serves files from the directory where the script is located.
To start the server, execute this script, and it will serve files indefinitely until stopped.
"""

import os
from http.server import HTTPServer, SimpleHTTPRequestHandler


class CustomHandler(SimpleHTTPRequestHandler):
    def send_error(self, code, message=None, explain=None):
        # Override 404 errors to serve index.html
        if code == 404:
            self.path = '/index.html'
            return self.do_GET()
        else:
            super().send_error(code, message, explain)

    def log_message(self, format, *args):
        # Optional: Custom logging or suppress default logging
        print(f"{self.client_address[0]} - - {format % args}")


def run(server_class=HTTPServer, handler_class=CustomHandler, host='0.0.0.0', port=8000):
    # Set the working directory to the directory of this script
    script_dir = os.path.dirname(os.path.abspath(__file__))
    os.chdir(script_dir)

    server_address = (host, port)
    httpd = server_class(server_address, handler_class)
    print(f"Serving on http://{host}:{port}")
    httpd.serve_forever()


if __name__ == "__main__":
    run()
