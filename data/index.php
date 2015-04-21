<?
require '../config.php';

if(isset($_GET['del'])){
	if(!file_exists('../'.$ARC)){
		mkdir('../'.$ARC);
	}
	rename('../'.$_GET['delf'].'/'.$_GET['del'], '../'.$ARC.'/'.$_GET['del']);
}

if(isset($_FILES['newfile'])){
	$filetype = substr($_FILES['newfile']['type'], 0, 5);
	switch($filetype){
		case 'image':
		  $path = '../'.$IMG;
		  break;
		case 'video':
		  $path = '../'.$VID;
		  break;
		default:
		  die("ERROR UPLOADING FILE");
		  break;
	}
	if(!file_exists($path)){
		mkdir($path);
	}
	move_uploaded_file($_FILES['newfile']['tmp_name'], $path.'/'.$_FILES['newfile']['name']) or die("ERROR UPLOADING FILE");
}
?>
<head>
<title>
<?
echo $LAN->datapagetitle;
?>
</title>
<meta charset="utf8">
<link rel="shortcut icon" href="../janhoicon.png">
<link rel="stylesheet" href="../tyyli.css">
<script src="../jquery/jquery-1.11.2.js">
</script>
</head>

<body>

<div id="datapagesendnew">
<?
echo '<h2>'.$LAN->datapagesendnewheader.'</h2>';
?>
<form method="post" action="index.php" enctype="multipart/form-data">
  <input type="file" name="newfile" accept="image/*,video/*">
  <input type="hidden" name="check" value="1">
  <input size="40" type="submit">
</form>
</div>

<div id="datapageimages">
<?
echo '<h2>'.$LAN->datapageimagesheader.'</h2>';

$images = scandir('../'.$IMG);
for($i = 2; $i < count($images); $i++){
	echo '<div class="datapageimageelement">

	<img class="datapageimage" src="../'.$IMG.'/'.$images[$i].'">

	<div class="datapageelementoptions">
	<a href="../'.$IMG.'/'.$images[$i].'">
	<img title="'.$LAN->datapageelementoptionsshowfull.'" class="datapageelementoptionsimage" src="dataimg/showfull.png">
	</a>
	<a href="?del='.$images[$i].'&delf='.$IMG.'">
	<img title="'.$LAN->datapageelementoptionsdelete.'" class="datapageelementoptionsimage" src="dataimg/delete.png">
	</a>
	</div>
	</div>';
}
?>
</div>

<div id="datapagevideos">
<?
echo '<h2>'.$LAN->datapagevideosheader.'</h2>';

$videos = scandir('../'.$VID);
for($i = 2; $i < count($videos); $i++){
        echo '<div class="datapagevideoelement">

	<video class="datapagevideo" height="200" controls>
	  <source src="../'.$VID.'/'.$videos[$i].'">
	</video>

        <div class="datapageelementoptions">
        <a href="../'.$VID.'/'.$videos[$i].'">
	<img title="'.$LAN->datapageelementoptionsshowfull.'" class="datapageelementoptionsimage" src="dataimg/showfull.png">
	</a>
        <a href="?del='.$videos[$i].'&delf='.$VID.'">
        <img title="'.$LAN->datapageelementoptionsdelete.'" class="datapageelementoptionsimage" src="dataimg/delete.png">
	</a>
        </div>
        </div>';
}
?>
</div>


<script>
</script>

</body>
