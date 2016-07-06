<?php
$ROOTPath = '../../';
$PHPPath = $ROOTPath . 'php/';
require $PHPPath . 'config.php';
require $PHPPath . 'head.php';
?>

<body style="overflow:hidden;">

<?php
$width = $_GET['width'];
$height = $_GET['height'];

$switchtime = $_GET['changespeed'];
$showtime = $_GET['changetime'];
$changetype = $_GET['changetype'];

if($_GET['fixratio'] == "yes"){
	$fixratio = true;
} else {
	$fixratio = false;
}
$ratiowidth = $_GET['ratiowidth'];
$ratioheight = $_GET['ratioheight'];


if($_GET['fullwindow'] == "yes"){
	$fullwindow = true;
} else {
	$fullwindow = false;
}

$imgfolder = $ROOTPath . $IMG;
$videofolder = $ROOTPath . $VID;
$archivefolder = $ROOTPath . $ARC;

include $PHPPath . 'archiving.php';
require $PHPPath . 'code.php';
?>
</body>
