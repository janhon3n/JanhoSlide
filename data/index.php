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
        if(isset($_POST['setlastshowdate'])){
                $newfilename = ':'.$_POST['lastshowdate'].':'.$_FILES['newfile']['name'];
        } else {
                $newfilename = $_FILES['newfile']['name'];
        }
        move_uploaded_file($_FILES['newfile']['tmp_name'], $path.'/'.$newfilename) or die("ERROR UPL$
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
<div id="datapagereturn">
<?
echo '<a id="datapagereturnlink" href="../">'.$LAN->datapagereturnheader.'</a>';
?>
</div>

<div id="datapagesendnew">
<?
echo '<h2>'.$LAN->datapagesendnewheader.'</h2>';
?>
<form method="post" action="index.php" enctype="multipart/form-data">
<?
echo $LAN->datapagesendnewfile.'<input class="datapagesendnewinput" type="file" name="newfile" accep$
<input type="checkbox" id="datapagesendnewcheckbox" name="setlastshowdate" value="1">'.$LAN->datapag$
<div  id="datapagesendnewsetlastdate" style="opacity:0.5;">
'.$LAN->datapagesendnewdate.'<input disabled="true" value="2015-01-01" id="datapagesendnewsetlastdat$

?>
</div>
<input class="datapagesendnewinput" style="width:100px;height:25px;" type="submit">
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
        <img title="'.$LAN->datapageelementoptionsshowfull.'" class="datapageelementoptionsimage" sr$
        </a>
        <a href="?del='.$images[$i].'&delf='.$IMG.'">
        <img title="'.$LAN->datapageelementoptionsdelete.'" class="datapageelementoptionsimage" src=$
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
        <img title="'.$LAN->datapageelementoptionsshowfull.'" class="datapageelementoptionsimage" sr$
        </a>
        <a href="?del='.$videos[$i].'&delf='.$VID.'">
        <img title="'.$LAN->datapageelementoptionsdelete.'" class="datapageelementoptionsimage" src=$
        </a>
        </div>
        </div>';
}
?>
</div>

<script>
$("#datapagesendnewcheckbox").change(function(){
        if(this.checked){
                $("#datapagesendnewsetlastdate").css({opacity: 1});
                $("#datapagesendnewsetlastdateinput").prop('disabled', false);
        } else {
                $("#datapagesendnewsetlastdate").css({opacity: 0.5});
                $("#datapagesendnewsetlastdateinput").prop('disabled', true);
        }
});
</script>

</body>
