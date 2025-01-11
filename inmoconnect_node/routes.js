/**
 * Routes.js
 *
 * This file is required by app.js. It sets up event listeners
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

/**
 * Use the gravatar module, to turn email addresses into avatar images:
 */
var userDefinedFunction	= require('./user_defined_function');

var FCM 				= require('fcm-push');
var config 				= require('./config');
var apns 				= require("apns"), notification, options, connection;;

/**
 * Export a function, so that we can pass the app,io and connection instances from app.js
 *
 * @param app As Express Object
 * @param io As Socket Io Object
 * @param connection as Mysql Object
 *
 * @return void.
 */
console.log(3444)
module.exports = function(app,io,connection){

	/**
	 * Function is called when user hit root url of server
	 *
	 * @param data as Data
	 *
	 * @return void.
	 */
	app.get('/', function(req, res){
		res.end('Your server is running');
	});

	var chat = io.on('connection', function (socket) {
		/**
		 * Function is called when any user login to site
		 *
		 * @param data as Data
		 *
		 * @return void.
		 */
		socket.on('user_logout', function(data) {
			socket.leave(data.id);
			connection.query("UPDATE users SET is_online = 0 WHERE id = "+data.id, function(err, rows) {});
			var is_online = 0;
			io.sockets.emit('is_user_online', {is_online: is_online,user_id:data.id});
			//console.log(socket.rooms)
		});// end login

		/**
		 * Function is called when any user login to site
		 *
		 * @param data as Data
		 *
		 * @return void.
		 */
		socket.on('broadcast_online_user', function(data) {
			socket.room 	= data.id;
			socket.join(data.id);
			var currentTimeStamp = Date.now();
			connection.query("UPDATE users SET is_online = 1 WHERE id = "+data.id, function(err, rows) {});
			var is_online = 1;
			io.sockets.emit('is_user_online', {is_online: is_online,user_id:data.id});

		});// end login

		/**
		 * Function is called when any user login to site
		 *
		 * @param data as Data
		 *
		 * @return void.
		 */
		socket.on('login', function(data) {
			console.log(data)
			socket.receiver_id 	= data.receiver_id;
			socket.room 		= data.id;
			socket.sender_id	= data.sender_id;
			// Add the client to the room
			socket.join(data.id);
			console.log("logged in");
			/*connection.query("UPDATE users SET is_online = 1 WHERE id = "+data.id, function(err, rows) {});

			connection.query("SELECT * From users WHERE id = '"+other_person_id+"'", function(err, rows, fields) {

				if(!err){
					//console.log(rows);
					socket.emit('user_data', {userid:data.id,messageData:rows});
				}else{
					console.log('error in query : '+err);
				}

				try{
					var is_online = 0;
					if(rows && rows !="" && rows !=null && rows !="undefined" && rows[0] !="undefined" && rows[0].is_online !="undefined"){
						is_online = rows[0].is_online;
					}


				}catch(e){
					console.log('Socket ERROR\n');
					console.log(e);
				}
			});*/
		});// end login

		/**
		 * Function is called when any user disconnect with socket
		 *
		 * @param data as Data
		 *
		 * @return void.
		 */
		socket.on('disconnect', function(data) {
			//console.log(socket);
			socket.disconnect(socket.room);
			console.log("disconnected");
		});// end disconnect


		/**
		 * Function is called when any sender send new message
		 *
		 * @param data as Data
		 *
		 * @return void.
		 */
		socket.on('msg', async function(data){
			console.log(data);
			var attachment 		= '';
			var attachment_url 	= '';
			var profileImage 	= '';
			if(typeof data.profile_image !== 'undefined' && typeof data.profile_image !== 'null' && data.profile_image !=''){
				profileImage 			= data.profile_image;
			}
			if(typeof data.attachment !== 'undefined'){
				attachment 			= data.attachment;
				attachment_url 		= data.attachment_url;
				//attachmentType 	= (data.attachment_type != '') ? data.attachment_type : 0;
			}
			var currentDate = userDefinedFunction.databaseFormat();

			data.msg 			= convertQuotes(data.msg);
			if((typeof data.msg !== 'undefined' && data.msg != '') || (typeof data.attachment !== 'undefined' && data.attachment != '')){
				if(typeof data.attachment !== 'undefined' && data.attachment != ''){
					connection.query("INSERT INTO messages SET sender_id = "+data.userid+",receiver_id = "+data.chatfriend_id+",message = '"+data.msg+"',message_type = '"+data.message_type+"',is_upload = '"+data.is_upload+"',created_at = '"+currentDate+"',updated_at = '"+currentDate+"'", function(err, rows) {

						socket.emit('updateUserMessage', {
							record_id: rows.insertId,
							msg: data.msg,
							attachment: attachment,
							attachment_url: attachment_url,
							chatfriendid: data.chatfriend_id,
							chatuserid: data.userid,
							message_type: data.message_type,
							custom_title: data.custom_title,
							id :data.roomid,
							is_upload:data.is_upload,
							timestamp:currentDate
						});

						io.in(data.chatfriend_id).emit('receiveMessage', {
							record_id: rows.insertId,
							msg: data.msg,
							attachment: attachment,
							attachment_url: attachment_url,
							chatfriendid: data.chatfriend_id,
							chatuserid: data.userid,
							message_type: data.message_type,
							custom_title: data.custom_title,
							id :data.roomid,
							timestamp:currentDate,
						});

						connection.query("INSERT INTO chat_uploads SET message_id = '"+rows.insertId+"',document_id = '"+data.attachment+"',created_at = '"+currentDate+"',updated_at = '"+currentDate+"'", function(err, rows2) {

						});
					});
				}else{
					const decodedMsg = decodeURIComponent(data.msg);
					msg = decodedMsg.replace(/[']+/g, "\\'");
					msg = msg.replace("\\'https","\'https");
					console.log("msg");
					console.log(msg);
					/*console.log("INSERT INTO messages SET sender_id = "+data.userid+",receiver_id = "+data.chatfriend_id+",message = '"+msg+"',message_type = '"+data.message_type+"',created_at = '"+currentDate+"',updated_at = '"+currentDate+"'")*/
					connection.query("INSERT INTO messages SET sender_id = "+data.userid+",receiver_id = "+data.chatfriend_id+",message = '"+msg+"',message_type = '"+data.message_type+"',custom_title = '"+data.custom_title+"',is_upload = "+data.is_upload+",created_at = '"+currentDate+"',updated_at = '"+currentDate+"'", function(err, rows) {


						socket.emit('updateUserMessage', {
							record_id: rows.insertId,
							msg: data.msg,
							attachment: attachment,
							attachment_url: attachment_url,
							chatfriendid: data.chatfriend_id,
							chatuserid: data.userid,
							message_type: data.message_type,
							custom_title: data.custom_title,
							id :data.roomid,
							is_upload:data.is_upload,
							timestamp:currentDate
						});

						io.in(data.chatfriend_id).emit('receiveMessage', {
							record_id: rows.insertId,
							msg: data.msg,
							is_upload:data.is_upload,
							attachment: attachment,
							attachment_url: attachment_url,
							chatfriendid: data.chatfriend_id,
							chatuserid: data.userid,
							message_type: data.message_type,
							custom_title: data.custom_title,
							id :data.roomid,
							timestamp:currentDate,
						});

					});
				}

			}

		});//end msg

		socket.on('read_message', function(data){
			var record_id = data.record_id;
			connection.query("UPDATE messages SET is_read = 1 WHERE id = "+record_id, function(err, rows) {

			});
		});

		/**
		 * Function is called when Sender is typing
		 *
		 * @param data as Data
		 *
		 * @return void.
		 */
		socket.on('show_is_typing', function(data){
			console.log("show_is_typing")
			console.log(data)
			try{
				io.in(data.receiver_id).emit('chat_typing', {id: data.roomid,user:data.userName, chatfriendid: data.sender_id,status:data.status});
				console.log("Typing");
			}catch(e){
				console.log('Socket ERROR\n');
				console.log(e);
			}
		});// end show_is_typing

		// socket.on('show_is_typing', function(data){
		// 	try{
		// 		io.in(data.chatfriend_id).emit('chat_typing', {id: data.roomid,user:data.user,user_role_id: data.user_role_id, chatfriendid: data.userid,status:data.status});

		// 	}catch(e){
		// 		console.log('Socket ERROR\n');
		// 		console.log(e);
		// 	}
		// });// end show_is_typing



		/**
		 * Function for get chat list
		 *
		 * @param data as Data
		 *
		 * @return void.
		 */
		 /*
		socket.on('get_chat_list', function(data) {
			if(typeof data.login_user_id !== 'undefined' && data.login_user_id != ''){
				 connection.query("select `users`.`full_name` as `username`, `users`.`image`, `users`.`id`, `users`.`time_zone` from `workspace_users` left join `users` on `users`.`id` = `workspace_users`.`user_id` where `workspace_id` = "+data.workspace_id+" and `users`.`id` != "+data.login_user_id+" and `users`.`is_active` = 1 and `users`.`deleted_at` = NULL and `users`.`is_verified` = 1", function(userErr, userRows) {
					if(!userErr){
						console.log(userRows);
					}else{
						console.log(userErr);
					}
				});
			}
		});// end disconnect */
		/**/
		socket.on('group_connect', function(data) {
			console.log(data);
			socket.room1 	= 'group_chat_'+data.group_id;
			socket.authId	= data.id;

			socket.join('group_chat_'+data.group_id);
		});// end login

		socket.on('group_leave', function(data) {
			socket.leave('group_chat_'+data.group_id);
		});// end login

		/*USER's SEPERATE ROOM STARTS*/
			socket.on('user_group_connect', function(data) {
				socket.room 	= 	'user_group_'+data.id;
				socket.authId	= 	data.id;
				socket.user		= 	data.user;
				// make user's seperate room
				socket.join('user_group_'+data.id);
				/*connection.query("UPDATE users SET is_online = 1 WHERE id = "+data.id, function(err, rows) {});
				var is_online = 1;
				io.sockets.emit('is_user_online_group', {is_online: is_online,user_id:data.id});*/
			});// end login

			socket.on('user_group_leave', function(data) {
				socket.leave('user_group_'+data.id);
				/*connection.query("UPDATE users SET is_online = 0 WHERE id = "+data.id, function(err, rows) {});
				var is_online = 0;
				io.sockets.emit('is_user_online_group', {is_online: is_online,user_id:data.id});*/
			});// end login
		/*USER's SEPERATE ROOM ENDS*/

		/**
		 * Function is called when Sender is typing
		 *
		 * @param data as Data
		 *
		 * @return void.
		 */
		socket.on('show_is_typing_group', function(data){
			try{
				io.in(socket.room1).emit('chat_typing_group', {
					user: data.user,
					user_id: data.sender_id,
					id :socket.room1,
					status:data.status
				});
				console.log(socket.room1)
				console.log("Typing in Group");
			}catch(e){
				console.log('Socket ERROR\n');
				console.log(e);
			}
		});// end show_is_typing

		// socket.on('show_is_typing_group', function(data){
		// 	try{
		// 		io.in(socket.room).emit('chat_typing_group', {
		// 			user: data.user,
		// 			user_role_id: data.user_role_id,
		// 			user_id: data.userid,
		// 			id :socket.room,
		// 			status:data.status
		// 		});

		// 	}catch(e){
		// 		console.log('Socket ERROR\n');
		// 		console.log(e);
		// 	}
		// });// end show_is_typing

		/**
		 * Function is called when Sender is typing
		 *
		 * @param data as Data
		 *
		 * @return void.
		 */
		socket.on('removed_from_group', function(data){
			try{
				io.in('group_chat_'+data.group_id).emit('user_removed', {
					removed_user: data.user_id
				});

			}catch(e){
				console.log('Socket ERROR\n');
				console.log(e);
			}
		});// end show_is_typing
		/**
		 * Function is called when any sender send new message
		 *
		 * @param data as Data
		 *
		 * @return void.
		 */
		socket.on('group_messaging', async function(data){
			console.log(data);

			var attachment 		= '';
			var attachment_url 	= '';
			if(typeof data.attachment !== 'undefined'){
				attachment 			= data.attachment;
				attachment_url 		= data.attachment_url;
				//attachmentType 	= (data.attachment_type != '') ? data.attachment_type : 0;
			}
			var currentDate = userDefinedFunction.databaseFormat();

			var full_name = '';
			if(typeof data.full_name !== 'undefined'){
				full_name = data.full_name;
			}


			data.msg 			= convertQuotes(data.msg);
			if((typeof data.msg !== 'undefined' && data.msg != '') || (typeof data.attachment !== 'undefined' && data.attachment != '')){
				// console.log('debug 1')
				if(typeof data.attachment !== 'undefined' && data.attachment != ''){
					// console.log('debug 2')
					connection.query("select user_id FROM group_participants WHERE group_id="+data.group_id+" AND deleted_at is NULL", function(errGroup, resultGroup) {
						if(!errGroup){
							// console.log('debug 3')
							// console.log(resultGroup)
							resultGroup.forEach(element => {
								//if(data.userid != element.user_id){

									connection.query("INSERT INTO messages SET sender_id = "+data.userid+",receiver_id = "+element.user_id+",group_id = "+data.group_id+",message = '"+data.msg+"',message_type = '"+data.message_type+"',is_upload = "+data.is_upload+",created_at = '"+currentDate+"',updated_at = '"+currentDate+"'", function(err, rows) {
										if(!err){
											if(data.userid == element.user_id){
												io.in(socket.room).emit('receiveGroupMessage', {
													record_id:rows.insertId,
													msg: data.msg,
													attachment: attachment,
													attachment_url: attachment_url,
													user: data.user,
													chatuserid: data.userid,
													id :socket.room,
													timestamp:currentDate,
													full_name: full_name,
													message_type: data.message_type,
													group_id: data.group_id,
													is_upload:data.is_upload
												});
											}else{
												/* Send push notification to all other users in group */
												io.in('user_group_'+element.user_id).emit('user_group_message_receive', {
													record_id:rows.insertId,
													msg: data.msg,
													attachment: attachment,
													attachment_url: attachment_url,
													group_id: data.group_id,
													receiver_id: element.user_id,
													message_type: data.message_type,
													room :socket.room,
													// receiver_name: result1.name
												});
											}

											connection.query("INSERT INTO chat_uploads SET message_id = '"+rows.insertId+"',document_id = '"+data.attachment+"',created_at = '"+currentDate+"',updated_at = '"+currentDate+"'", function(err1, rows1) {


											});
										}

									});
								//}

							});

						}
					});
				}else{
					// console.log('debug 4')
					connection.query("select user_id FROM group_participants WHERE group_id="+data.group_id+" AND deleted_at is NULL", function(errGroup, resultGroup) {
						if(!errGroup){
							// console.log('debug 5')

							// console.log(resultGroup)
							resultGroup.forEach(element => {
									msg = data.msg.replace(/[']+/g, "\\'");
									msg = msg.replace("\\'https","\'https");
									connection.query("INSERT INTO messages SET sender_id = "+data.userid+",receiver_id = "+element.user_id+",group_id = "+data.group_id+",message = '"+msg+"',message_type = '"+data.message_type+"',is_upload = "+data.is_upload+",created_at = '"+currentDate+"',updated_at = '"+currentDate+"'", function(err, rows) {

										if(!err){
											if(data.userid == element.user_id){
												io.in(socket.room).emit('receiveGroupMessage', {
													record_id:rows.insertId,
													msg: data.msg,
													attachment: attachment,
													attachment_url: attachment_url,
													user: data.user,
													chatuserid: data.userid,
													id :socket.room,
													timestamp:currentDate,
													full_name: full_name,
													message_type: data.message_type,
													group_id: data.group_id,
													is_upload:data.is_upload
												});
											}else{

												/*send messages to all users of the group for WEBSITE only Starts*/
												io.in('user_group_'+element.user_id).emit('user_group_message_receive', {
													record_id:rows.insertId,
													receiver_name: data.user,
													msg: data.msg,
													attachment: attachment,
													attachment_url: attachment_url,
													group_id: data.group_id,
													receiver_id: element.user_id,
													room :socket.room,
													message_type: data.message_type,
													is_upload:data.is_upload

												});
											}
										}

									});


							});

						}
					});

				}

			}

		});//end msg

		/*****
			***Task group chat
		*/

		socket.on('task_group_connect', function(data) {
			console.log(data);
			socket.username = data.user;
			socket.room 	= 'task_group_chat_'+data.task_id;
			socket.authId	= data.id;

			// Add the client to the room
			socket.join('task_group_chat_'+data.task_id);
			var currentTimeStamp = Date.now();
			connection.query("UPDATE users SET is_online = 1 WHERE id = "+data.id, function(err, rows) {});
			var is_online = 1;
			io.sockets.emit('is_user_online_task_group', {is_online: is_online,user_id:data.id});
		});// end login

		socket.on('task_group_leave', function(data) {
			socket.leave('task_group_chat_'+data.task_id);
			connection.query("UPDATE users SET is_online = 0 WHERE id = "+data.id, function(err, rows) {});
			var is_online = 0;
			io.sockets.emit('is_user_online_task_group', {is_online: is_online,user_id:data.id});
			//console.log(socket.rooms)
		});// end login

		/**
		 * Function is called when Sender is typing
		 *
		 * @param data as Data
		 *
		 * @return void.
		 */
		socket.on('show_is_typing_task_group', function(data){
			try{
				io.in(socket.room).emit('chat_typing_task_group', {
					user: data.user,
					user_role_id: data.user_role_id,
					user_id: data.userid,
					id :socket.room,
					status:data.status
				});

			}catch(e){
				console.log('Socket ERROR\n');
				console.log(e);
			}
		});// end show_is_typing

		/**
		 * Function is called when Sender is typing
		 *
		 * @param data as Data
		 *
		 * @return void.
		 */
		socket.on('removed_from_task_group', function(data){
			try{
				io.in('task_group_chat_'+data.task_id).emit('user_removed', {
					removed_user: data.user_id
				});

			}catch(e){
				console.log('Socket ERROR\n');
				console.log(e);
			}
		});// end show_is_typing
		/**
		 * Function is called when any sender send new message
		 *
		 * @param data as Data
		 *
		 * @return void.
		 */
		socket.on('task_group_messaging', async function(data){

			var attachment 		= '';
			var attachment_url 	= '';
			if(typeof data.attachment !== 'undefined'){
				console.log('awa');
				attachment 			= data.attachment;
				attachment_url 		= data.attachment_url;
				//attachmentType 	= (data.attachment_type != '') ? data.attachment_type : 0;
			}
			var full_name = '';
			if(typeof data.full_name !== 'undefined'){
				full_name = data.full_name;
			}
			var currentTimeStamp = Date.now();
			var currentDate = userDefinedFunction.getDateCreated(currentTimeStamp);
			var currentDateForReceiver 	= currentDate;
			var currentDateForSender 	= await userDefinedFunction.convertedTimeForSender(currentTimeStamp,data.userid);

			console.log(data);


			io.in(socket.room).emit('receiveTaskGroupMessage', {
				msg: data.msg,
				attachment: attachment,
				attachment_url: attachment_url,
				user: data.user,
				user_role_id: data.user_role_id,
				chatuserid: data.userid,
				id :socket.room,
				//message_id :data.message_id,
				timestamp:currentDateForSender,
				senderTimeStamp:currentDateForSender,
				created:currentDate,
				profile_image: data.profile_image,
				full_name: full_name
			});
			data.msg 			= convertQuotes(data.msg);
			if((typeof data.msg !== 'undefined' && data.msg != '') || (typeof data.attachment !== 'undefined' && data.attachment != '')){
				if(typeof data.attachment !== 'undefined' && data.attachment != ''){
					connection.query("select user_id FROM task_assignees WHERE task_id="+data.task_id+" AND deleted_at is NULL", function(errGroup, resultGroup) {
					console.log(resultGroup);
						if(!errGroup){
							resultGroup.forEach(element => {
								connection.query("INSERT INTO task_chat_messages SET sender_id = "+data.userid+",receiver_id = "+element.user_id+",task_id = "+data.task_id+",message = '"+data.msg+"',created_at = '"+currentDate+"',updated_at = '"+currentDate+"'", function(err, rows) {
									if(!err){
										connection.query("INSERT INTO task_chat_uploads SET message_id = '"+rows.insertId+"',document_id = '"+data.attachment+"',created_at = '"+currentDate+"',updated_at = '"+currentDate+"'", function(err1, rows1) {
											/* if(data.userid != element.user_id){
												if(!err1){
													connection.query("select is_online,email,full_name,device_id,device_type,(SELECT full_name FROM users WHERE id="+data.userid+") as sender_name FROM users WHERE id="+element.user_id, function(err2, result1) {
														if(!err2 && result1 !=''){
															var message = {
																to : result1[0].device_id,
																msg:data.msg,
																device:result1[0].device_type,
																sender_id:data.userid,
																receiver_id:element.user_id,
																message_type:"attachment",
																chat_type:"group",
																message_id:rows.insertId
															}
															var request = require("request")
															var URL	=	"http://unicorndev.stage02.obdemo.com/send-push-notification-node";
															request.post({
																url:    URL,
																json: true,
																body: message
															}, function(error, response, body){
																console.log(body);
															});
														}else{
														}
													});
												}else{

												}
											}*/
										});
									}
								});
							});
						}
					});
				}else{
					connection.query("select user_id FROM task_assignees WHERE task_id="+data.task_id+" AND deleted_at is NULL", function(errGroup, resultGroup) {

						if(!errGroup){
							resultGroup.forEach(element => {

									connection.query("INSERT INTO task_chat_messages SET sender_id = "+data.userid+",receiver_id = "+element.user_id+",task_id = "+data.task_id+",message = '"+data.msg+"',created_at = '"+currentDate+"',updated_at = '"+currentDate+"'", function(err, rows) {

										if(!err){
											/*
											if(data.userid != element.user_id){
												console.log('user_id = '+element.user_id);
												connection.query("select is_online,email,full_name,device_id,device_type,(SELECT full_name FROM users WHERE id="+data.userid+") as sender_name FROM users WHERE id="+element.user_id, function(err2, result1) {

													if(!err2 && result1 !=''){
														var message = {
																to : result1[0].device_id,
																msg:data.msg,
																device:result1[0].device_type,
																sender_id:data.userid,
																receiver_id:element.user_id,
																message_type:"message",
																chat_type:"group",
																message_id:rows.insertId
															}
															var request = require("request")
															var URL	=	"http://unicorndev.stage02.obdemo.com/send-push-notification-node";
															request.post({
																url:    URL,
																json: true,
																body: message
															}, function(error, response, body){
																console.log(body);
															});


													}else{
													}
												});
											} */
										}

									});


							});

						}
					});

				}

			}

		});//end msg




	});// end connection
};

/**
 * Function to get connected users list
 *
 * @param io 		As Socket IO Instance
 * @param roomId 	As Room Id
 * @param namespace As Namespace
 *
 * @return void.
 */
function findClientsSocket(io,roomId, namespace) {
	var res = [],
		ns = io.of(namespace ||"/");    // the default namespace is "/"
	if (ns) {
		for (var id in ns.connected) {
			if(roomId) {
				var index = ns.connected[id].rooms.indexOf(roomId) ;
				if(index !== -1) {
					res.push(ns.connected[id]);
				}
			}
			else {
				res.push(ns.connected[id]);
			}
		}
	}
	return res;
}// end findClientsSocket()

/**
 * Function to convert quotes
 *
 * @param string	As String
 *
 * @return string.
 */
function convertQuotes(string) {
	string = stripHtml(string);
	string = string.replace("'","\\'").replace('"','\\"');
	return string;
}// end convertQuotes()

/**
 * Function to Remove Unwanted tags from string
 *
 * @param html	As Html Code
 *
 * @return html.
 */
function stripHtml(html) {
    var unwantedTags= [/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,/<iframe\b[^<]*(?:(?!<\/iframe>)<[^<]*)*<\/iframe>/gi];
    for(var j = 0;j < unwantedTags.length;j++){
		html = html.replace(unwantedTags[j],'');
	}
    return html;
}//end stripHtml();
