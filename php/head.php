<head>
<title>
<?php
echo $LAN->title;
?>
</title>
<meta charset="utf8">
<link rel="shortcut icon" href="../../assets/janhoicon.png">
<link rel="stylesheet" href="../../css/style.css">
<script src="../../js/jquery-1.11.2.js">
</script>
</head>


<?php
//some functions used in a lot of places
function myScandir($path){
	$files = scandir($path);
	for($i = 0; $i < count($files); $i++){
		if($files[$i] == '.' || $files[$i] == '..'){
			unset($files[$i]);
		}
	}
	$files = array_values($files);
	return $files;
}

