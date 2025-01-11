/**
 * App.js
 *
 * This file handles the Database configuration
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

var mysql      = require('mysql2');
const dotenv = require('dotenv');
dotenv.config({ path: '../.env' });

module.exports = function(){
	/**
	 *  Database configuration
	 */
	
	
	var db_config = {
		host: process.env.DB_HOST,
		user: process.env.DB_USERNAME,
		password: process.env.DB_PASSWORD,
		database: process.env.DB_DATABASE
	};
	
	/**
	 *  Create connection with database
	 */
	connection = mysql.createConnection(db_config);
	return connection;
}
