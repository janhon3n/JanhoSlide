<?php
$ROOTPath = '../../';
$PHPPath = $ROOTPath . 'php/';
$ASSETSPath = $ROOTPath . 'assets/';
require $PHPPath . 'config.php';
require $PHPPath . 'head.php';
?>

<body>

<?php
require $PHPPath . 'header.php';

echo '
<div class="centered_content">

<form id="customform" action="slide.php" method="get">


<div class="part_container">
<h2>
'.$LAN->restitle.'
</h2>
';

if($FULLWINDOW){
	echo '
	<div class="inputline" disabl="disabl">
	<label class="label1">
	'.$LAN->reswidth.'
	</label>
	<input type="number" name="width" min="1" max="3840" value="'.$WIDTH.'" disabled>
	</div>
	<div class="inputline" disabl="disabl">
	<label class="label1">
	'.$LAN->resheight.'
	</label>
	<input type="number" name="height" min="1" max="2160" value="'.$HEIGHT.'" disabled>
	</div>
	';
} else {
	echo '
	<div class="inputline">
	<label class="label1">
	'.$LAN->reswidth.'
	</label>
	<input type="number" name="width" min="1" max="3840" value="'.$WIDTH.'" >
	</div>
	<div class="inputline">
	<label class="label1">
	'.$LAN->resheight.'
	</label>
	<input type="number" name="height" min="1" max="2160" value="'.$HEIGHT.'">
	</div>
	';
}

echo '
<div class="inputline">
<input type="checkbox" name="fullwindow" value="yes" ';
if($FULLWINDOW){
	echo 'checked';
}
echo '>
'.$LAN->resusefullwindow.'
</div>

<br>
<div class="inputline">
<input type="checkbox" name="fixratio" value="yes" ';
if($FIXRATIO){
	echo 'checked';
}
echo '>
'.$LAN->reskeepratio.'
</div>
';

if($FIXRATIO){
	echo '<div class="inputline">
	'.$LAN->reschooseratio.'
	<input type="number" name="ratiowidth" min="1" max="2000" value="'.$TARGET_RATIO_WIDTH.'"> x 
	<input type="number" name="ratioheight" min="1" max="2000" value="'.$TARGET_RATIO_HEIGHT.'">
	</div>';
} else {
	echo '<div class="inputline" disabl="disabl">
	'.$LAN->reschooseratio.'
	<input type="number" name="ratiowidth" min="1" max="2000" value="'.$TARGET_RATIO_WIDTH.'" disabled> x 
	<input type="number" name="ratioheight" min="1" max="2000" value="'.$TARGET_RATIO_HEIGHT.'" disabled>
	</div>';
}

echo '
</div>

<div class="part_container">
<h2>
'.$LAN->timetitle.'
</h2>

<div class="inputline">
<label class="label2">
'.$LAN->timeswitchtime.'
</label>
<input type="number" name="changespeed" min="1" max="10000" value="'.$SWITCHTIME.'">
(ms) -
'.$LAN->timeswitchinfo.'
</div>

<div class="inputline">
<label class="label2">
'.$LAN->timeshowtime.'
</label>
<input type="number" name="changetime" min="1" max="100000" value="'.$SHOWTIME.'">
(ms) -
'.$LAN->timeshowinfo.'
</div>
</div>

<div class="part_container">
<h2>
'.$LAN->switchtitle.'
</h2>
';

$changeTypes = array('fade', 'slidefromright', 'slidefromleft', 'noeffect');

echo '
<input type="hidden" id="changetype" name="changetype" value="'.$CHANGETYPE.'">
';

foreach($changeTypes as $ct){
	echo '<img class="changeimg" ';
	if($ct == $CHANGETYPE){
		echo 'chosenone="chosenone"';
	} else {
		echo 'chosenone="no"';
	}
	echo 'changetype="'.$ct.'" src="' . $ASSETSPath . 'customimg/' . $ct . '.png">';
}

echo '
</div>
';

echo '<input type="submit" value="';
echo $LAN->readybutton;
echo '">';
?>
</form>
</div>
</body>


<?php
echo '
<script src="' . $ROOTPath . 'js/customformjs.js">
</script>
';

