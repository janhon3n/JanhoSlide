
<?php
//scripti joka siirtää kuvat toiseen kansioon jos niiden päivämäärä on ylitetty. Päivämäärät merkitaan tiedostonimeen ;vvvv-kk-pp;
$kuvatkansio = myScandir($imgfolder);
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
$videokansio = myScandir($videofolder);
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