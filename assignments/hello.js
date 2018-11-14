var http = require('http');
var url = require('url');
http.createServer(onRequest).listen(1337);

function onRequest(request, response) {
	var path = request.url;
	if(path == '/home') {
		response.writeHead(200,{'Content-Type':'text/html'});
		response.write('<h1>Hello World</h1>');
		response.end();
	} else if(path == '/getData') {
		response.writeHead(200, {"Content-Type": "application/json"});
		response.write('{"name":"Ty Brajdic","class":"cs313"}');
		response.end();
	} else {
		response.write('<h1>404 Error Page Not Found</h1>'); //response.writeHead(404); instead
		response.write('<p>The page ' + path + ' was not found on this server.</p>');
		response.end();
	}
}