var mysql = require('mysql');
var connection = mysql.createConnection(
{
	host: 'localhost',
	user: 'root',
	password: 'pizza',
	database: 'cs313'
})

connection.connect(function(error) {
	if(error)
		console.log('Error connecting to DB');
	 else 
		console.log('Connected to DB');
});


exports.getUserBio = function (userName) {
connection.query("SELECT userBio FROM users WHERE userName =" + userName, function(error, rows) {
	if(error)
		console.log('Error in sql');
	else
		console.log(rows);
		
	}	
)}


exports.getUser = function (username, passwd) {
connection.query("SELECT * FROM users WHERE username =" + username + "AND password = " + passwd, function(error, rows) {
	if(error)
		console.log('Error in sql');
	else
		console.log(rows);
		
	}	
)}