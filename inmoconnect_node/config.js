/**
 * App.js
 *
 * This file handles the configuration of the app,It is required by app.js
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

var config = module.exports = function(app, io){

	/**
	 * Set .html as the default template extension
	 */
	app.set('view engine', 'html');
	app.set("Content-Type", "application/json; charset=utf-8");
	/**
	 * Initialize the ejs template engine
	 */
	app.engine('html', require('ejs').renderFile);
	
};
config.email 			= {};
config.email.host 		= process.env.MAIL_HOST;
config.email.userEmail 	= process.env.MAIL_FROM_ADDRESS;
config.email.password	= process.env.MAIL_PASSWORD;
config.email.userName 	= process.env.MAIL_USERNAME;

config.fcm_key			 = 'AAAAA8OVmKs:APA91bFtnFC4dJXFYk5-n2GparKJexwfMoSZuUIy_BI-3WHmUMbpRc6hLAzeykda4vkeiRp7AGV4GetbjdRg2yi59NBWGeMn-1GWKvoFjnJDPPkcQ-T0PL7bOTgONMef1jMm7IGsn-Y3';



