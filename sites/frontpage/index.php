<?php
$PHPPath = '../../php/';
require $PHPPath . 'config.php';
require $PHPPath . 'head.php';
?>

<body>
<?php
require $PHPPath . 'header.php';
?>

<div id="fplinkcontainter">
<div class="f1">
<a href="../default/">
<?php
echo $LAN->frontpagedefaultlink;
?>
</a>
</div>

<div class="f1">
<a href="../custom/">
<?php
echo $LAN->frontpagecustomlink;
?>
</a>
</div>

<div class="f2">
<a href="../data/">
<?php
echo $LAN->frontpagedatalink;
?>
</a>
</div>
</div>


<div id="frontpageversioninfo">
Version 1.0
Last modified 6.2.2015
</div>
</body>
