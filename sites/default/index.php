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
$switchtime = $SWITCHTIME;
$showtime = $SHOWTIME;
$changetype = $CHANGETYPE;

$imgfolder = $ROOTPath . $IMG;
$videofolder = $ROOTPath . $VID;
$archivefolder = $ROOTPath . $ARC;

require $PHPPath . 'code.php';
?>

</body>
