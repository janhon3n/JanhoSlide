<?php
$heightfix = 0;
$widthfix = 0;
//calculating the margins for the initial show
//if $fullwindow and $fixratio margins will be 
//calculated constantly in javascript
if($fixratio){
	//Viewport size too high => Black space above and under
        if($width * $ratioheight <= $height * $ratiowidth){
                $newheight = ($width * $ratioheight) / $ratiowidth;
                $heightfix = ($height - $newheight) / 2;
				$height = $newheight;
	//Viewport size too high => Black space above and under
        } else if($width * $ratioheight > $height * $ratiowidth){
                $newwidth = ($height * $ratiowidth) / $ratioheight;
                $widthfix = ($width - $newwidth) / 2;
				$width = $newwidth;
        }
}



echo '<div id="slide_container" showtime="'.$showtime.'" switchtime="'.$switchtime.'" ratiowidth="'.$ratiowidth.'" ratioheight="'.$ratioheight.'" ';

if($fullwindow){
	echo 'style="width:100%;height:100%;margin-left:'.$widthfix.';margin-top:'.$heightfix.';">';
} else {
	echo 'style="width:'.$width.';height:'.$height.';margin-left:'.$widthfix.';margin-top:'.$heightfix.';">';
}


//Looppi jossa luodaan kuvat kansiossa oleville kuville omat elementit.
$kuvatkansio = myScandir($imgfolder); //scandir palauttaa taulukon joissa [0] = . ja [1] = .. joten aloitetaan loopit aina arvolla 2.

foreach($kuvatkansio as $kuva){
	echo '<img class="slide imgslide" src="'.$imgfolder.'/'.$kuva.'">';
}



//Looppi jossa luodaan videot kansiossa oleville videoille omat .a luokat eli diat.
/*
$videotkansio = myScandir($videofolder);
$u = 2;
$ekavideo = $i;
$videonumero = 1;
$videopituus = array(1);


while(isset($videotkansio[$u])) {

        list($turha3, $formaatti) = explode(".", $videotkansio[$u]);
        $id = "video$videonumero";
        echo '<video width="'.$width.'" height="'.$height.'" style="position:absolute;display:none;" class="a'.$i.' aelement" id="'.$id.'"';
	// Jos videoihin ei haluta ääntä niin muteta ne
	if(!$VIDEOSOUND){
		echo 'muted';
	}
	echo '> <source src="' . $videofolder . '/' . $videotkansio[$u] . '" <type="video/'.$formaatti.'"> </video>';
        echo "\n";

        //Käyetään ffmpeg:tä videoiden pituuksien hakemiseen ja tallennetaan ne muuttujiin
        $polku = $videofolder . '/' . $videotkansio[$u];
        $cmd = shell_exec("ffmpeg -i \"{$polku}\" 2>&1");
        $haku='/Duration: (.*?),/';
        preg_match($haku, $cmd, $tulos);

        $videopituus[] = $tulos[1];

        ++$u;
        ++$i;
        ++$videonumero;
}
*/

echo '</div>';

switch($changetype){
	case 'fade':
		echo '<script src="../../js/switches/fadeSwitch.js"></script>';
		break;
	case 'slidefromleft':
		echo '<script src="../../js/switches/slideFromLeftSwitch.js"></script>';
		break;
	case 'slidefromright':
		echo '<script src="../../js/switches/slideFromRightSwitch.js"></script>';
		break;
	case 'noeffect':
		echo '<script src="../../js/switches/noEffectSwitch.js"></script>';
		break;	
}

echo '<script src="../../js/slide.js"></script>';
if($fullwindow && $fixratio){
	echo '<script src="../../js/updatemarginfix.js"></script>';
}

//php functiota ym.
function file_get_contents_utf8($fn) {
     $content = file_get_contents($fn);
      return mb_convert_encoding($content, 'UTF-8',
          mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true));
}

