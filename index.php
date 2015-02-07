<?
require 'config.php';
?>
<head>
<title>
<?
echo $LAN->frontpagetitle;
?>
</title>
<meta charset="utf8">
<link rel="shortcut icon" href="janhoicon.png">
<link rel="stylesheet" href="tyyli.css">
<script src="jquery/jquery-1.11.2.js">
</script>
</head>

<body>
<h1>
<?
echo $LAN->frontpagetitle;
?>
</h1>

<a href="default" id="frontpagedefaultlink" class="frontpagelink">
<?
echo $LAN->frontpagedefaultlink;
?>
</a>

<a href="custom" id="frontpagecustomlink" class="frontpagelink">
<?
echo $LAN->frontpagecustomlink;
?>
</a>

<div id="frontpageversioninfo">
Version 1.0
Last modified 6.2.2015
</div>
</body>
