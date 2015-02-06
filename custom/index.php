<?php
include '../config.php';
?>
<head>
<title>
<?
echo $LAN->custompagetitle;
?>
</title>
<meta charset="utf8">
<link rel="stylesheet" href="../tyyli.css">
<script src="../jquery/jquery-1.11.2.js">
</script>
</head>

<?
echo '
<body>
<form name="slideform" action="slide.php" method="get">
<h2>
'.$LAN->restitle.'
</h2>
<label class="label1">
'.$LAN->reswidth.'
</label>
<input type="number" name="width" min="1" max="3840" value="'.$WIDTH.'">
<br>
<label class="label1">
'.$LAN->resheight.'
</label>
<input type="number" name="height" min="1" max="2160" value="'.$HEIGHT.'">
<br><br>
<input type="checkbox" name="fixratio" value="yes">
'.$LAN->reskeepratio.'
<br><br>
<h2>
'.$LAN->timetitle.'
</h2>
<label class="label2">
'.$LAN->timeswitchtime.'
</label>
<input type="number" name="changespeed" min="1" max="10000" value="'.$SWITCHTIME.'">
(ms) - 
'.$LAN->timeswitchinfo.'
<br>
<label class="label2">
'.$LAN->timeshowtime.'
</label>
<input type="number" name="changetime" min="1" max="100000" value="'.$SHOWTIME.'">
(ms) - 
'.$LAN->timeshowinfo.'
<br><br>
<h2>
'.$LAN->switchtitle.'
</h2>
';
?>
<input class="changetype" type="hidden" name="changetype">
<img class="changeimg imgfade" onclick="selectImg('fade')" src="customimg/fade.png">
<img class="changeimg imgslidefromright" onclick="selectImg('slidefromright')" src="customimg/slidefromright.png">
<img class="changeimg imgslidefromleft" onclick="selectImg('slidefromleft')" src="customimg/slidefromleft.png">
<img class="changeimg imgnoeffect" onclick="selectImg('noeffect')" src="customimg/noeffect.png">
<br><br>
<?
echo '<input type="submit" value="';
echo $LAN->readybutton;
echo '" style="height:30px;width:100px;">';
?>
</form>
</body>

<script>
function clearAllImg(){
        $(".imgfade").css({opacity: "0.2"});
        $(".imgslidefromright").css({opacity: "0.2"});
        $(".imgslidefromleft").css({opacity: "0.2"});
	$(".imgnoeffect").css({opacity: "0.2"});
}
function selectImg(value){
	clearAllImg();
	$(".img" + value).css({opacity: "1"});
	$(".changetype").val(value);
}
<?
echo 'selectImg("'.$CHANGETYPE.'");';
?>
</script>
