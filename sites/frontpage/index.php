<?php
$PHPPath = '../../php/';
require $PHPPath . 'config.php';
require $PHPPath . 'head.php';
?>


<body>
<h1>
<?php
echo $LAN->frontpagetitle;
?>
</h1>

<a href="../default/" id="frontpagedefaultlink" class="frontpagelink">
<?php
echo $LAN->frontpagedefaultlink;
?>
</a>

<a href="../custom/" id="frontpagecustomlink" class="frontpagelink">
<?php
echo $LAN->frontpagecustomlink;
?>
</a>

<a href="../data/" id="frontpagedatalink" class="frontpagelink">
<?php
echo $LAN->frontpagedatalink;
?>
</a>

<div id="frontpageversioninfo">
Version 1.0
Last modified 6.2.2015
</div>
</body>
