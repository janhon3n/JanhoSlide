<?php
$ROOTPath = '../../';
$PHPPath = $ROOTPath . 'php/';
require $PHPPath . 'config.php';
require $PHPPath . 'head.php';
?>


<body style="overflow:hidden;">

<?php
if($_GET['fixratio'] == "yes"){
        if($_GET['width'] * 9 <= $_GET['height'] * 16){
                $width = $_GET['width'];
                $height = ($width * 9) / 16;
                $heightfix = ($_GET['height'] - $height) / 2;
                echo '<style>
                .aelement{
                        top:'.$heightfix.';
                }
                </style>';
        } else if($_GET['width'] * 9 > $_GET['height'] * 16){
                $height = $_GET['height'];
                $width = ($height * 16) / 9;
                $widthfix = ($_GET['width'] - $width) / 2;
                echo '<style>
                .aelement{
                        left:'.$widthfix.';
                }
                </style>';
        }
//jos ei
} else {
        $width = $_GET['width'];
        $height = $_GET['height'];
}
$switchtime = $_GET['changespeed'];
$showtime = $_GET['changetime'];

$changetype = $_GET['changetype'];

$imgfolder = $ROOTPath . $IMG;
$videofolder = $ROOTPath . $VID;
$archivefolder = $ROOTPath . $ARC;

require $PHPPath . 'code.php';
?>
</body>
