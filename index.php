<!DOCTYPE html>
<html lang="de">
<title>Chat</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="data/w3.css">
<body>

<!--<div class="w3-center w3-padding-64 w3-light-grey">-->
<div class="w3-display-container" style="height:100vh;">
	<div class="w3-display-middle">
		<p><input type="text" id="pw" placeholder="Chat-Passwort"></p>
		<p><button onclick="setpw();" class="">zum Chat</button></p>
	</div>
</div>

<script>
function setpw()
{
	x = document.getElementById("pw").value;
	if(x.length>0){
	  localStorage.setItem("pw", x);
window.location.href = "chat.php";	  
	}
	
}
</script>