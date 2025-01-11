/**
 * App.js
 *
 * This is the main file of our chat app. It initializes a new express.js instance, requires the config and routes files and listens on a port. Start the application by running 'node app.js' in your terminal
 *
 * NODE.Js (http://nodejs.org)
 * Copyright Linux Foundation Collaborative (http://collabprojects.linuxfoundation.org/)
 *
 * @copyright     Linux Foundation Collaborative (http://collabprojects.linuxfoundation.org/)
 * @link          http://nodejs.org NODE.JS
 * @package       routes.js
 * @since         NODE.JS v 4.4.0
 * @license       http://collabprojects.linuxfoundation.org Linux Foundation Collaborative
 */
const dotenv = require('dotenv');
dotenv.config({ path: '../.env' });
var express = require('express'),
	app = express();

/**
 *  Listen to port 3003
 */
var port = process.env.SOCKET_PORT;

/**
 *  Initialize a new socket.io object. It is bound to the express app, which allows them to coexist.
 */
var io = require('socket.io').listen(app.listen(port));

/**
 *  Function to hand disconnection
 * 
 *  @params Null
 * 
 *  Return null
 */
function handleDisconnect() {
	/**
	 *  Create connection with database
	 */
	var connection = require('./connection')();
	
	/**
	 * Connect to database in every 30 seconds
	 */
	setInterval(function(){
		connection.query("SELECT 1", function(err, rows) {});
	},30000);
	
	/**
	 * Connect with database
	 */
	connection.connect(function(err) {              
		if(err) {                                   
			console.log('error when connecting to db:', err);
			setTimeout(handleDisconnect, 2000); 
		}                                     
	});//end connect
	
	/**
	 * Handling Error
	 */
	connection.on('error', function(err) {
		if(err.code === 'PROTOCOL_CONNECTION_LOST' || err.code === 'PROTOCOL_ENQUEUE_AFTER_FATAL_ERROR' ) {
			handleDisconnect();
		}else{
			throw err;
		}
	});//end error
	
}// end handleDisconnect()

handleDisconnect();
 
require('./config')(app, io);
require('./routes')(app, io,connection);

console.log('Your application is running on ' + port);
