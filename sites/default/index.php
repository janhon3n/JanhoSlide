<?php
$ROOTPath = '../../';
$PHPPath = $ROOTPath . 'php/';

require $PHPPath . 'config.php';
require $PHPPath . 'head.php';
?>

<body style="overflow:hidden;">

<?php
$width = $WIDTH;
$height = $HEIGHT;
$heightfix = 0;
$widthfix = 0;

$switchtime = $SWITCHTIME;
$showtime = $SHOWTIME;
$changetype = $CHANGETYPE;

$imgfolder = $ROOTPath . $IMG;
$videofolder = $ROOTPath . $VID;
$archivefolder = $ROOTPath . $ARC;

require $PHPPath . 'code.php';
?>

</body>
