var config 				= require('./config');
var nodemailer 			= require('nodemailer');
var transporter 		= nodemailer.createTransport('smtps://'+config.email.userEmail+':'+config.email.password+'@'+config.email.host);
var connection = require('./connection')();
var timezonearr	=	{
	"GMT" 		: "0",
	"GMT+1:00" 	: "3600000",
	"GMT+2:00" 	: "7200000",
	"GMT+3:00" 	: "10800000",
	"GMT+3:30" 	: "12600000",
	"GMT+4:00" 	: "14400000",
	"GMT+5:00" 	: "18000000",
	"GMT+5:30" 	: "19800000",
	"GMT+6:00" 	: "21600000",
	"GMT+7:00" 	: "25200000",
	"GMT+8:00" 	: "28800000",
	"GMT+9:00" 	: "32400000",
	"GMT+9:30" 	: "34200000",
	"GMT+10:00" : "36000000",
	"GMT+11:00" : "39600000",
	"GMT+12:00" : "43200000",
	"GMT-11:00" : "39600000",
	"GMT-10:00" : "36000000",
	"GMT-9:00" 	: "32400000",
	"GMT-8:00" 	: "28800000",
	"GMT-7:00" 	: "25200000",
	"GMT-6:00" 	: "21600000",
	"GMT-5:00" 	: "18000000",
	"GMT-4:00" 	: "14400000",
	"GMT-3:30" 	: "12600000",
	"GMT-3:00" 	: "10800000",
	"GMT-1:00" 	: "3600000"
};
var timeZoneSignArr	=	{
	"GMT" 		: "+",
	"GMT+1:00" 	: "+",
	"GMT+2:00" 	: "+",
	"GMT+3:00" 	: "+",
	"GMT+3:30" 	: "+",
	"GMT+4:00" 	: "+",
	"GMT+5:00" 	: "+",
	"GMT+5:30" 	: "+",
	"GMT+6:00" 	: "+",
	"GMT+7:00" 	: "+",
	"GMT+8:00" 	: "+",
	"GMT+9:00" 	: "+",
	"GMT+9:30" 	: "+",
	"GMT+10:00" : "+",
	"GMT+11:00" : "+",
	"GMT+12:00" : "+",
	"GMT-11:00" : "-",
	"GMT-10:00" : "-",
	"GMT-9:00" 	: "-",
	"GMT-8:00" 	: "-",
	"GMT-7:00" 	: "-",
	"GMT-6:00" 	: "-",
	"GMT-5:00" 	: "-",
	"GMT-4:00" 	: "-",
	"GMT-3:30" 	: "-",
	"GMT-3:00" 	: "-",
	"GMT-1:00" 	: "-",
};

function userDefinedFunction(){
	this.sendMail = function(to,repArray,action) {
            connection.query('SELECT * FROM email_templates WHERE action= "' + action + '"', function(err, result) {
				var emailTemplateResult = result[0];
				connection.query('SELECT * FROM email_actions WHERE action= "' + action + '"', function(emailErr, emailResult) {
					var actionData 		= emailResult[0];
					var actionOptions 	= actionData.options.toString().split(",");
					var body			= emailTemplateResult.body;
					var subject			= emailTemplateResult.subject;
					actionOptions.forEach(function(value,key) {
						body = body.replace('{'+value+'}',repArray[key]);
					});
					
					var mailOptions = {
						from	: '"'+config.email.userName+'" <'+config.email.userEmail+'>',
						to		: to,
						subject	: subject,
						html	: body
					};
					transporter.sendMail(mailOptions, function(error, info){
						if(error){
							return console.log(error);
						}
					});
				});
			});
	}//end sendMail();
	this.getDateCreated = function(timestamp) {
		var now = new Date(timestamp);
		now.setTime(now.getTime() -330*60*1000);
		year 	= "" + now.getFullYear();
		month 	= "" + (now.getMonth() + 1); if (month.length == 1) { month = "0" + month; }
		day 	= "" + now.getDate(); if (day.length == 1) { day = "0" + day; }
		hour 	= "" + now.getHours(); if (hour.length == 1) { hour = "0" + hour; }
		minute 	= "" + now.getMinutes(); if (minute.length == 1) { minute = "0" + minute; }
		second 	= "" + now.getSeconds(); if (second.length == 1) { second = "0" + second; }
		return year + "-" + month + "-" + day + " " + hour + ":" + minute + ":" + second;
	}//end sendMail();
	
	this.convertedTimeForReceiver = async function(timestamp,user_id) {
		return new Promise(async (resolve) => {
			connection.query("SELECT time_zone FROM users WHERE id="+user_id, async function(err, senderResult) {
				var timezone 		= senderResult[0].time_zone;
				
				var newTime 		= timezonearr[timezone];
				var nownew 		= new Date(timestamp);
				nownew.setTime(nownew.getTime() -330*60*1000);
				console.log(timezone);
				if(timeZoneSignArr[timezone] == '+'){
					nownew.setTime(nownew.getTime() + parseInt(newTime));
				}else{
					nownew.setTime(nownew.getTime() - parseInt(newTime));
				}
				
				year 	= "" + nownew.getFullYear();
				month 	= "" + (nownew.getMonth() + 1); if (month.length == 1) { month = "0" + month; }
				day 	= "" + nownew.getDate(); if (day.length == 1) { day = "0" + day; }
				hour 	= "" + nownew.getHours(); if (hour.length == 1) { hour = "0" + hour; }
				minute 	= "" + nownew.getMinutes(); if (minute.length == 1) { minute = "0" + minute; }
				second 	= "" + nownew.getSeconds(); if (second.length == 1) { second = "0" + second; }
				
				resolve(year + "-" + month + "-" + day + " " + hour + ":" + minute + ":" + second)
				
			});
		});
		
	}//end convertedTimeForReceiver();
	
	this.convertedTimeForSender = async function(timestamp,user_id) {
		return new Promise(async (resolve) => {
			connection.query("SELECT time_zone FROM users WHERE id="+user_id, async function(err, senderResult) {
				var timezone 		= senderResult[0].time_zone;
				var newTime 		= timezonearr[timezone];
				var nowSend 			= new Date(timestamp);
				nowSend.setTime(nowSend.getTime() -330*60*1000);
				if(timeZoneSignArr[timezone] == '+'){
					nowSend.setTime(nowSend.getTime() + parseInt(newTime));
				}else{
					nowSend.setTime(nowSend.getTime() - parseInt(newTime));
				}
				year 	= "" + nowSend.getFullYear();
				month 	= "" + (nowSend.getMonth() + 1); if (month.length == 1) { month = "0" + month; }
				day 	= "" + nowSend.getDate(); if (day.length == 1) { day = "0" + day; }
				hour 	= "" + nowSend.getHours(); if (hour.length == 1) { hour = "0" + hour; }
				minute 	= "" + nowSend.getMinutes(); if (minute.length == 1) { minute = "0" + minute; }
				second 	= "" + nowSend.getSeconds(); if (second.length == 1) { second = "0" + second; }
				resolve(year + "-" + month + "-" + day + " " + hour + ":" + minute + ":" + second)
			});
		});
	}//end convertedTimeForSender();
	this.databaseFormat = function() {
		var now = new Date();
		var now = new Date(now.getTime());
		
		year 	= "" + now.getFullYear();
		month 	= "" + (now.getMonth() + 1); if (month.length == 1) { month = "0" + month; }
		day 	= "" + now.getDate(); if (day.length == 1) { day = "0" + day; }
		hour 	= "" + now.getHours(); if (hour.length == 1) { hour = "0" + hour; }
		minute 	= "" + now.getMinutes(); if (minute.length == 1) { minute = "0" + minute; }
		second 	= "" + now.getSeconds(); if (second.length == 1) { second = "0" + second; }
		return year + "-" + month + "-" + day + " " + hour + ":" + minute + ":" + second;
	} 
	
}
module.exports = new userDefinedFunction();
