chattimefile = "time.txt";
chatfile = "chat.txt";
checking_for_new_messages = 3;

 function setup()
 {
	 chattime = localStorage.getItem("chattime");

 if(chattime == undefined)
 {
	 
fetch (chattimefile)
.then(x => x.text())
.then(y => 
			{
				chattime = y;
				localStorage.setItem("chattime", chattime);
			}
			);
 }
 
 //////////////////// TIMECHECK ////////////////////
 chatread();
 timecheck();
timechecker = setInterval(timecheck, checking_for_new_messages*1000);
 }

function timecheck()
{
	console.log(timenow()+ " checking chat..");
	fetch (chattimefile)
.then(x => x.text())
.then(y => 
			{
				x = localStorage.getItem("chattime");
				if(x !== y)
				{
					if(x.substr(0,1) !== "!"){
					//notification();
					console.log("new message");
					notification();
					} else {console.log("own message, no notification sent");}
					chatread();
					localStorage.setItem("chattime", y);
				} else {console.log("ok.");}
			}
			);
}

//////////////////// CHATREAD ////////////////////

function chatread(){
	
let file = chatfile;

fetch (file)
.then(x => x.text())
.then(y => 
			{
				y = y.split("\n");
				y.reverse();
				text = "";
				for (var i = 0; i < y.length; i++)
					{
						if(y[i].length>0)
						{
							try {
							
									decryptit = decryptme(y[i]);
									if(decryptit !== false)
										{
											text = text+"<br>"+decryptit
										}
									}
							catch(err) {text = text+"<br>************"; }
						}
					}
  
  document.getElementById("chat").innerHTML = text;
	
			});
}

//////////////////// decryptme ////////////////////

function decryptme(textinput)
{

try {
		var ke =  localStorage.getItem("pw");
         crypting = alphac(textinput, ke, md5(ke), 0);
		//https://css-tricks.com/snippets/javascript/strip-html-tags-in-javascript/
		string = decodeUnicode(crypting);
		string = string.replace(/(<([^>]+)>)/gi, "<i>[no codes allowed]</i>");
		return(string);
}
 catch(err) {
	// return false
    return("[??:??] **********");
  }
}

//////////////////// encryptme ////////////////////

function encryptme(textinput,pw)
{

try {
		//var ke =  localStorage.getItem("pw");
		ke = pw;
		string = textinput.replace(/(<([^>]+)>)/gi, "<i>[no codes allowed]</i>");
		string = encodeUnicode(string);
        string = alphac(string, ke, md5(ke), 1);
		//https://css-tricks.com/snippets/javascript/strip-html-tags-in-javascript/
		return(string);
}
 catch(err) {
	// return false
    return("[??:??] **********");
    //return(err);
  }
}

//////////////////// Decode Unicode ////////////////////

// thx to https://attacomsian.com/blog/javascript-base64-encode-decode
function encodeUnicode(str) {
  // First we use encodeURIComponent to get percent-encoded UTF-8,
  // then we convert the percent encodings into raw bytes which
  // can be fed into btoa.
  return btoa(
    encodeURIComponent(str).replace(/%([0-9A-F]{2})/g, function toSolidBytes(match, p1) {
      return String.fromCharCode('0x' + p1)
    })
  )
}

function decodeUnicode(str) {
  // Going backward: from byte-stream to percent-encoding, to original string.
  return decodeURIComponent(
    atob(str)
      .split('')
      .map(function (c) {
        return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2)
      })
      .join('')
  )
}	


//////////////////// TIMENOW ////////////////////

function timenow(){
	var today = new Date();
	var h = today.getHours();
	var m = today.getMinutes();
	var s = today.getSeconds();
	 
	//var t = h + ":" + m + ":" + s;
	if(h <10) {h = "0"+h}
	if(m <10 ) {m = "0"+m}
	if(s <10 ) {s = "0"+s}
	//var t = h + ":" + m;
	var t = h + ":" + m+ ":" + s;
	return("["+t+"]");
}

//////////////////// SEND ////////////////////

function sendalt()
{
	x = document.getElementById('input').value;
	y = document.getElementById('key').value;
	localStorage.setItem("pw", y);
	if(y.length>=3){
	if(x.length>1){
	//username = "Yuna";
	username = "Gast";
	/*
	<?php if(isset($_SERVER['REMOTE_USER']))
	{
		echo '
		username = "'.$_SERVER['REMOTE_USER'].'";
		';
	}
	?>
	*/
	username = "<i>"+username+"</i>";
	timenow = "[22:55]";
	
	var today = new Date();
	var h = today.getHours();
	var m = today.getMinutes();
	var s = today.getSeconds();
	 
	//var t = h + ":" + m + ":" + s;
	if(h <10) {h = "0"+h}
	if(m <10 ) {m = "0"+m}
	var t = h + ":" + m;
	timenow = "["+t+"]";
	
	
	
	
	x = timenow+" "+username+": "+x;
	document.getElementById('crypt').value = x;
	encrypt();
	//document.getElementById('inputsend').value = "code: "+y+" "+document.getElementById('crypt').value;
	document.getElementById('inputsend').value = document.getElementById('crypt').value;
	document.sendit.submit();
	} else {alert("Bitte mehr Text eingeben.");}
	} else {alert("Passwortlänge: mindestens 3 Buchstaben.");}
	
}

//////////////////// NOTIFICATION ////////////////////

function notification() 
{
	
	//check focus
	
	//zzfx(...[2.1,,500,.01,.09,.07,1,2.6,,,69,.05,,,144,,.09,.09,.02]); // Random 52
	
	detectFocus();
	
}

//https://learnshareit.com/how-to-detect-if-a-browser-tab-has-focus-using-javascript/
function detectFocus() {
  // Using document.visibilityState
  let state = document.visibilityState;
  if (state === "visible") {
    // if focus -> show check mark on title
    //document.title = " tab is being focused";
	//alert("Fokus");
	console.log("focused, soft notifciation sent");
	zzfx(...[1.55,,6,,.01,.04,1,.2,2.5,3.4,,,,,173,.2,,.64]); // Random 59 - Copy 2
  } else {
    // if does not focus -> show exclamation on title
    //document.title = " tab is not focused";
	//alert("DEFOKUS");
	console.log("defocused, loud notifciation sent");
	zzfx(...[1.66,,373,,.17,.32,2,.53,,,-87,.09,.03,,,,.18,.74,.2,.24]); // Powerup 
  }
}

// When visibility changes, detectFocus is executed
//document.onvisibilitychange = detectFocus;