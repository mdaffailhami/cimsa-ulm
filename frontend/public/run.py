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
    server_address = (host, port)
    httpd = server_class(server_address, handler_class)
    print(f"Serving on http://{host}:{port}")
    httpd.serve_forever()


if __name__ == "__main__":
    run()
