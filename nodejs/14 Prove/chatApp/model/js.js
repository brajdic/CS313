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

exports.getUser = function (username) {
connection.query("SELECT * FROM users WHERE userName =" + username, function(error, rows) {
	if(error)
		console.log("Error in SQL " + username);
	else
		console.log(rows);
		
	}	
)}