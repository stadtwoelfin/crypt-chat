<!DOCTYPE html>
<html>
<title>Chat</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script>
 z = localStorage.getItem("pw");
 if(z == undefined)
 {
	  window.location.href = "index.php";
 }
 
</script>
<link rel="stylesheet" href="data/w3.css">
<link rel="stylesheet" href="data/style.css">
<script type="text/javascript" src="data/ZzFXMicro.min.js"></script>

<body>

<?php //include("splash.php")?>
<div class="w3-container">

<div class="w3-container" id="chatfenster" style="height:50vh;">
<iframe src="read.php" id="read"></iframe>
 <?php //include("read2.php"); ?>
</div>
<iframe src="input.php" id="inputchat"></iframe>
</div>
<script>



</script>