<?php
// The configuration file for JanhoSlide

// Include the right language pack. REQUIRED. Currently available = {'lan/fi.php', 'lan/eng.php' }
require 'lan/eng.php';

// Folder for media
$IMG = 'images';
$VID = 'videos';

// Folder for archive
$ARC = 'archive';


//Default resolution of the window where the slideshow is shown
$WIDTH = 1920;
$HEIGHT = 1080;


/* if $FULLWINDOW is set true, the show will use the
full width and height of the window instead of the dimensions above */
$FULLWINDOW = true;


/* if $FIXRATIO is set true, the media will be forced to
the ratio given below, and if the screen resolution
doesn't match, there will be black bars left to the sides
of the show in order to center the show to the middle of the window. */
$FIXRATIO = true;
$TARGET_RATIO_WIDTH = 16;
$TARGET_RATIO_HEIGHT = 9;


// Default showtime and switchtime values
$SHOWTIME = 15000; //time each slide is shown (in millisecods)
$SWITCHTIME = 1500; //time the switch from slide to slide takes (in millisecods)

// Default slide switching style.
//Currently available = { 'noeffect', 'fade', 'slidefromleft', 'slidefromright' }
$CHANGETYPE = 'fade';

// After how many loops the show will be refreshed
$REFRESHTIMES = 20;

// Option to play the video audio. 1 = on, 0 = off
$VIDEOSOUND = 1;
