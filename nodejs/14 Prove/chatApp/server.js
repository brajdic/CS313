var express = require('express');
var app = express();
const path = require('path');
var empty = require('is-empty');
var http = require('http').createServer(app);
var phpExpress = require('php-express')({
  binPath: 'php'
});
var connectionDB = require('./model/js.js');
var socketIO = require('socket.io').listen(http);
const PORT = process.env.PORT || 4444;
connections = [];
http.listen(PORT);
var bodyParser = require('body-parser');
var session = require('express-session');
var login;

//handles socket
socketIO.sockets.on('connection', function(socket) { 
	connections.push(socket);
	socket.on('message', function(data) {
	socketIO.sockets.emit('new message', {msg: data});
	});
});

//handles app 
app
	.use(express.static(__dirname + '/views/'))
	.use(session({secret: 'logininfo'}))
	.use(bodyParser.json())
	.use(bodyParser.urlencoded({extended: true}))
	.set('view engine', 'ejs')
	.engine('html', require('ejs').renderFile)
	//login page
	.get('/login', (req, res) => res.render('login'))
	//check the user input
	.post('/check',function(req,res){
	req.session.username = req.body.username;
	req.session.passwd = req.body.passwd;
	//check if user is logged in currently
	if(empty(req.session.username) || empty(req.session.passwd)) 
		login = false;
	else 
		login = true;
	res.end('ok');
	})
	//the chat application
	.get('/', function(req, res) {	
	if(!login) {
		res.writeHead(302, {
		'Location': 'login'
		});
		res.end();
		//console.log("Got here.");
	}
	 else {
		 res.sendFile(__dirname + '/views/chat.html');
		}
	});
	
	
	
	

