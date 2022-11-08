<!DOCTYPE html>
<html>
<title>Chat</title>
<meta name="viewport" content="width=device-width, initial-scale=1">	

<link rel="stylesheet" href="data/w3.css">
<link rel="stylesheet" href="data/style.css">



<div class="w3-container" style="height:100%;background-color:rgba(255,255,255,0.7);border-radius:15px;">
<?php include_once("conf.php"); 
if(!is_file($file)){file_put_contents($file,"");}
if(!is_file($timefile)){file_put_contents($timefile,filemtime($file));}
?>

<script type="text/javascript" src="data/alphacrypt2/alphac.js"></script>
<script type="text/javascript" src="data/alphacrypt2/md5.js"></script>
<script type="text/javascript" src="data/alphacrypt2/timer.js"></script>
<script type="text/javascript" src="data/ZzFXMicro.min.js"></script>
<script type="text/javascript" src="data/functions.js"></script>

<div id="chat">
</div>
 
<script>
setup();


 
	
</script>