<?php
/*
$start = 2000;
$anzahl = 8000;
for($a = $start;$a<$start+$anzahl;$a++)
{
	
	echo "#".$a.": &#".$a.";<br>";
}
*/


//     ;\r\n&#
//    ;','&#

$emojis = array('&#128512;','&#128513;','&#128514;','&#128515;','&#128516;','&#128517;','&#128518;','&#128519;','&#128520;','&#128521;','&#128522;','&#128523;','&#128524;','&#128525;','&#128526;','&#128527;','&#128528;','&#128529;','&#128530;','&#128531;','&#128532;','&#128533;','&#128534;','&#128535;','&#128536;','&#128537;','&#128538;','&#128539;','&#128540;','&#128541;','&#128542;','&#128543;','&#128544;','&#128545;','&#128546;','&#128547;','&#128548;','&#128549;','&#128550;','&#128551;','&#128552;','&#128553;','&#128554;','&#128555;','&#128556;','&#128557;','&#128558;','&#128559;','&#128560;','&#128561;','&#128562;','&#128563;','&#128564;','&#128565;','&#128566;','&#128567;','&#128568;','&#128569;','&#128570;','&#128571;','&#128572;','&#128573;','&#128574;','&#128575;','&#128576;','&#128577;','&#128578;','&#128579;','&#128580;','&#128581;','&#128582;','&#128583;','&#128584;','&#128585;','&#128586;','&#128587;','&#128588;','&#128589;','&#128590;','&#128591;');

foreach($emojis as $emoji)
{
	echo '<span onclick="insert(this);">',$emoji.'</span>';
}
?>	
<script>
function insert(emoji)
{
	daselement = document.getElementById('input');
	dertext = daselement.value;
	document.getElementById('input').value = dertext+" "+emoji.innerHTML+" ";
	document.getElementById('emojis').style.display="none";
	document.getElementById('input').focus();
}

function openemojis(){
	document.getElementById('emojis').style.display="block";
}
</script>

