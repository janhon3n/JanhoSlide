<?php
include '../config.php';
?>
<head>
<title>
<?
echo $LAN->defaultpagetitle;
?>
</title>
<meta charset="utf8">
<link rel="stylesheet" href="../tyyli.css">
<script src="../jquery/jquery-1.11.2.js">
</script>
</head>

<body style="overflow:hidden;">

<?
$width = $WIDTH;
$height = $HEIGHT;
$switchtime = $SWITCHTIME;
$showtime = $SHOWTIME;
$changetype = $CHANGETYPE;

$imgfolder = '../' . $IMG;
$videofolder = '../' . $VID;
$archivefolder = '../' . $ARC;

include '../code.php';
?>
</body>
