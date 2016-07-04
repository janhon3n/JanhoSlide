<?php
$ROOTPath = '../../';
$PHPPath = $ROOTPath . 'php/';
$ASSETSPath = $ROOTPath . 'assets/';
require $PHPPath . 'config.php';
require $PHPPath . 'head.php';


if(isset($_GET['del'])){
        if(!file_exists($ROOTPath . $ARC)){
                mkdir($ROOTPATH . $ARC);
        }
        rename($ROOTPath . $_GET['delf'] . '/' . $_GET['del'], $ROOTPath . $ARC . '/' . $_GET['del']);
}

if(isset($_FILES['newfile'])){
        $filetype = substr($_FILES['newfile']['type'], 0, 5);
        switch($filetype){
                case 'image':
                  $path = $ROOTPath . $IMG;
                  break;
                case 'video':
                  $path = $ROOTPath . $VID;
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
        move_uploaded_file($_FILES['newfile']['tmp_name'], $path.'/'.$newfilename) or die("ERROR UPLOADING FILE");
}
?>

<body>
<div id="datapagereturn">
<?php
echo '<a id="datapagereturnlink" href="../frontpage/">'.$LAN->datapagereturnheader.'</a>';
?>
</div>

<div id="datapagesendnew">
<?php
echo '<h2>'.$LAN->datapagesendnewheader.'</h2>';
?>
<form method="post" action="index.php" enctype="multipart/form-data">
<?php
echo $LAN->datapagesendnewfile.'<input class="datapagesendnewinput" type="file" name="newfile" accept="image/*,video/*"><br><br>
<input type="checkbox" id="datapagesendnewcheckbox" name="setlastshowdate" value="1">'.$LAN->datapagesendnewcheckbox.'<br>
<div  id="datapagesendnewsetlastdate" style="opacity:0.5;">
'.$LAN->datapagesendnewdate.'<input disabled="true" value="2015-01-01" id="datapagesendnewsetlastdateinput" class="datapagesendnewinput" type="date" name="lastshowdate"><br>';
?>
</div>
<input class="datapagesendnewinput" style="width:100px;height:25px;" type="submit">
</form>
</div>

<div id="datapageimages">
<?php
echo '<h2>'.$LAN->datapageimagesheader.'</h2>';

$images = scandir($ROOTPath . $IMG);
for($i = 2; $i < count($images); $i++){
        echo '<div class="datapageimageelement">

        <img class="datapageimage" src="' . $ROOTPath . $IMG . '/' . $images[$i].'">

        <div class="datapageelementoptions">
        <a href="' . $ROOTPath . $IMG . '/' . $images[$i].'">
        <img title="'.$LAN->datapageelementoptionsshowfull.'" class="datapageelementoptionsimage" src="' . $ASSETSPath . 'dataimg/showfull.png">
        </a>
        <a href="?del='.$images[$i].'&delf='.$IMG.'">
        <img title="'.$LAN->datapageelementoptionsdelete.'" class="datapageelementoptionsimage" src="' . $ASSETSPath . 'dataimg/delete.png">
        </a>
        </div>
        </div>';

}
?>
</div>
<div id="datapagevideos">
<?php
echo '<h2>'.$LAN->datapagevideosheader.'</h2>';

$videos = scandir($ROOTPath . $VID);
for($i = 2; $i < count($videos); $i++){
        echo '<div class="datapagevideoelement">

        <video class="datapagevideo" height="200" controls>
          <source src="' . $ROOTPath . $VID . '/' . $videos[$i].'">
        </video>

        <div class="datapageelementoptions">
        <a href="' . $ROOTPath . $VID . '/'.$videos[$i].'">
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
