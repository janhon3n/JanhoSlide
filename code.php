
<?php
//scripti joka siirtää kuvat toiseen kansioon jos niiden päivämäärä on ylitetty. Päivämäärät merkitaan tiedostonimeen ;vvvv-kk-pp;
$kuvatkansio = scandir($imgfolder);
$o = 2;
while(isset($kuvatkansio[$o])) {
        list($turha, $parasta_ennen, $turha2) = explode(":", $kuvatkansio[$o]);

        $tanaan = date("Y-m-d", time());

        $parasta_ennen_timestamp = strtotime($parasta_ennen);
        $tanaan_timestamp = strtotime($tanaan);

        //jos vanhentumispäivämäärä on ylitetty
        if(!empty($parasta_ennen_timestamp) && $tanaan_timestamp > $parasta_ennen_timestamp) {
                //siirrä kuva pois kuvatkansiosta
                rename($imgfolder . '/' . $kuvatkansio[$o], $archivefolder . '/' . $kuvatkansio[$o]);
        }
        ++$o;
}

// sama homma videoille
$videokansio = scandir($videofolder);
$o = 2;
while(isset($videokansio[$o])) {
        list($turha, $parasta_ennen, $turha2) = explode(":", $videokansio[$o]);

        $tanaan = date("Y-m-d", time());

        $parasta_ennen_timestamp = strtotime($parasta_ennen);
        $tanaan_timestamp = strtotime($tanaan);

        //jos vanhentumispäivämäärä on ylitetty
        if(!empty($parasta_ennen_timestamp) && $tanaan_timestamp > $parasta_ennen_timestamp) {
                //siirrä kuva pois kuvatkansiosta
                rename($videofolder . '/' . $videokansio[$o], $archivefolder . '/' . $videokansio[$o]);
        }
        ++$o;
}



//========================================
//=== Varsinaisen loopin luonti alkaa! ===
//========================================

//Looppi jossa luodaan kuvat kansiossa oleville kuville omat .a luokat eli diat.
$kuvatkansio = scandir($imgfolder); //scandir palauttaa taulukon joissa [0] = . ja [1] = .. joten aloitetaan loopit aina arvolla 2.
$i = 2;

while(isset($kuvatkansio[$i])) {
	echo '<img class="a'.$i.' aelement" style="position:absolute;display:none;" src="'.$imgfolder.'/'.$kuvatkansio[$i].'" width="'.$width.'" height="'.$height.'">';
	++$i;
}

//Looppi jossa luodaan videot kansiossa oleville videoille omat .a luokat eli diat.
$videotkansio = scandir($videofolder);
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



?>
<script>
var textnums = [];
var mhrintervals = [];
var mhrcount = 0;
</script>
</body>



<script>
<?php
//kierron vaihtojen ja viiveiden ajat
echo 'var vaihto='.$switchtime.'
';
echo 'var viive='.$showtime.'
';
?>

// === JAVASCRIPT FUNCTIOITA ===
//dian vaihtamis functio
function changeSlide(from, to){
<?
	echo '
	if(from == ".a1"){
		from = ".a'.($i-1).'";
	}
	';
	//Switch Vaihtotyypin valitsemiseksi
	switch($changetype){
		case "fade":
			echo '
			$(from).fadeOut(vaihto);
			$(to).fadeIn(vaihto);
			';
			break;
		case "noeffect":
			echo '
			$(from).hide();
			$(to).show();
			';
			break;
		case "slidefromright":
			echo '
			$(from).animate({ left: "-='.$width.'" }, vaihto, "linear", function(){
				$(from).hide();
			});
			$(to).css({ left: "'.$width.'" });
			$(to).show();
			$(to).animate({ left: "-='.$width.'" }, vaihto, "linear");
			';
			break;
		case "slidefromleft":
			echo '
                        $(from).animate({ left: "+='.$width.'" }, vaihto, "linear", function(){
                                $(from).hide();
                        });
                        $(to).css({ left: "-'.$width.'" });
                        $(to).show();
                        $(to).animate({ left: "+='.$width.'" }, vaihto, "linear");
			';
			break;
	}

	?>
}

//Luodaan functio kierto diojen vaihtamista varten.
function kierto(){
<?php


//Looppi jossa luodaan oikea määrä kerroksia functioon kierto();
$y = $i - 2;
$t = 2;

$videolaskuri = 1;
while($y > 0) {
	echo '
	changeSlide(".a'.($t-1).'", ".a'.$t.'");';

        if($t >= $ekavideo) {
                echo "\n";
                echo 'document.getElementById("video'.$videolaskuri.'").play();';
                echo "\n";
                ++$videolaskuri;
                }

	echo '

	setTimeout(function(){
';
	if($t >= $ekavideo){
		echo "\n";
		//echo 'document.getElementById("video'.($videolaskuri - 1).'").pause();';
		echo "\n";
		//echo 'document.getElementById("video'.($videolaskuri - 1).'").currentTime = 0;';
		echo "\n";
	}

	++$t;
	--$y;
}

	//kutsutaan funktio itse, jotta kierto jatkuisi loputtomiin
	echo "kierto();
";

	//Looppi jossa luodaan oikea määrä function sulkevia kerroksia
	$y = $i - 2;
	$t = 2;
	$videolaskuri = $i - $ekavideo;
	while($y > 0) {


	        if($t > $i - $ekavideo + 1) {
	                echo '},viive);';
	                echo "\n";
	                }

	        if($t <= $i - $ekavideo + 1) {
	                list($aikaa, $millit) = explode(".", $videopituus[$videolaskuri]);
	                list($h, $m, $s) = explode(":", $aikaa);
	                $millisekunnit = ($h * 60 * 60 * 1000) + ($m * 60 * 1000) + ($s * 1000) + ($millit * 10) - 1000;
	                echo '},' .($millisekunnit - $switchtime). ');';
			echo "\n";
	                --$videolaskuri;
	                }

	        ++$t;
	        --$y;
        }


?>
}



//Tiedoston ladattua kutsutaan diojenvaihtofunctio kierto();
$(document).ready(function(){
        kierto();
});

</script>
</html>





<?php
//php functiota ym.
function file_get_contents_utf8($fn) {
     $content = file_get_contents($fn);
      return mb_convert_encoding($content, 'UTF-8',
          mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true));
}

