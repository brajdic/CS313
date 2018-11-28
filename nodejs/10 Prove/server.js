var express = require('express');
var app = express();
const path = require('path');
var mysql = require('mysql');
var http = require('http').createServer(app);
var socketIO = require('socket.io').listen(http);
const PORT = process.env.PORT || 4444;
connections = [];

http.listen(PORT);
var mysql = mysql.createConnection(
{
	host: 'localhost',
	user: 'root',
	password: 'pizza',
	database: 'cs313'
});


//handles database 
mysql.connect(function(error) {
	if(error)
		console.log('Error connecting to DB');
	 else 
		console.log('Connected to DB');
});

//handles socket
socketIO.sockets.on('connection', function(socket) { 
	connections.push(socket);
	socket.on('message', function(data) {
	socketIO.sockets.emit('new message', {msg: data});
	});
});

//handles app 
app.get('/', function(req, res) {	
	res.sendFile(__dirname + '/views/index.html');
}).use(express.static(__dirname + '/views/'));