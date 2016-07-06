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

$fixratio = $FIXRATIO;
$ratiowidth = $TARGET_RATIO_WIDTH;
$ratioheight = $TARGET_RATIO_HEIGHT;
$fullwindow = $FULLWINDOW;

$imgfolder = $ROOTPath . $IMG;
$videofolder = $ROOTPath . $VID;
$archivefolder = $ROOTPath . $ARC;

include $PHPPath . 'archiving.php';
require $PHPPath . 'code.php';
?>

</body>
