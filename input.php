<?php
$chatfile = "chat.txt";
$chattimefile = "time.txt";
$max = 10;
?>
<!DOCTYPE html>
<html>
<title>Chat</title>
<meta name="viewport" content="width=device-width, initial-scale=1">	

<link rel="stylesheet" href="data/w3.css">
<link rel="stylesheet" href="data/style.css">

<script type="text/javascript" src="data/alphacrypt2/alphac.js"></script>
<script type="text/javascript" src="data/alphacrypt2/md5.js"></script>
<script type="text/javascript" src="data/alphacrypt2/timer.js"></script>
<script type="text/javascript" src="data/ZzFXMicro.min.js"></script>
<script type="text/javascript" src="data/functions.js"></script>

<div class="w3-container" style="font-size:1.5em;display:none;" id="emojis"><?php include("emojis.php");?></div>

 <?php
 if(isset($_GET['clearall']))
 {
	 file_put_contents($chatfile, "");
 }
if(isset($_POST['crypted']))
{
	if(!empty($_POST['crypted']))
	{
		$text = trim($_POST['crypted']);
		$content = file($chatfile);
		$content[] = $text;
		$content = array_slice($content,-$max);
		for($a=0;$a<count($content);$a++)
		{
			$content[$a] = trim($content[$a]);
		}
		$content = implode("\n",$content);
		file_put_contents($chatfile, $content);
		$microtime = microtime(true);
		file_put_contents($chattimefile, $microtime);
		echo '<script>localStorage.setItem("chattime", "!"+'.$microtime.');
		//alert(localStorage.getItem("chattime"));
		</script>';
	}
}
?>


<textarea id="input" placeholder="Chattext"></textarea>
<button onclick="send()">absenden</button>
<button  onclick="openemojis();" class="emojibutton">&#128512</button>

<hr>
<form action="?" method="POST" name="sendit">
<input type="text" id="pw" placeholder="pw"></textarea>
<textarea id="crypted" name="crypted" placeholder="crypted text" style="display:none;"></textarea>
</form>


<script>
 z = localStorage.getItem("pw");
 if(z == undefined)
 {
	  window.location.href = "index.php";
 } else 
 {
	 document.getElementById("pw").value = z;
 }
 
 //////////////////// SEND ////////////////////
 function send()
 {
	 y = document.getElementById("input").value;
	 if(y.length>2){
	 pw = document.getElementById("pw").value;
	 localStorage.setItem("pw", pw);
	 
	 <?php if(isset($_SERVER['REMOTE_USER']))	{
		 
		 if($_SERVER['REMOTE_USER'] == "Testname1"){$username = "🐺 "; }
		 elseif($_SERVER['REMOTE_USER'] == "Testname2"){$username = "🐰 "; }
		 else {$username = $_SERVER['REMOTE_USER'].": ";}
		 echo 'username = "'.$username.'";';
		 } else {?>
	username = "GAST: ";<?php } ?>
	 y = timenow().substr(0,6)+"] "+username+y;
	 document.getElementById("crypted").innerHTML = encryptme(y,pw);
	 
	 document.sendit.submit();
	 } else {alert("Bitte mehr Text eingeben");}
 }
</script>