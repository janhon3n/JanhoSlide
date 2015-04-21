# JanhoSlide

JanhoSlide is a web program that creates a slide show in your web browser from your images and videos.

## Features
With JanhoSlide you can easily create a simple slide show in your web browser. An example use for JanhoSlide would be looping through advertisements in a monitor at a store.

JanhoSlide features in its current version:
- Simple web interface.
- A Default show and a Custom show where you can quickly modify the show for your liking.
- Easy way to add/remove images and videos to/from your show.
- Way to set the last date an image/video will be shown.
- Html5 image and video usage. All formats that the clients browser supports should work.
- English and Finnish language support.
- The slide show refreshes itself from time to time. No manual refreshes needed.

The media files need to be located in two folders, one for images and one for videos. These folders are "/images" and "/videos" by default but they can be changed. You can determine when a file is moved to the archive folder. You can do this by setting the last show date to a filename with syntax: ":yyyy-mm-dd:". For example a file named "Flowers:2015-05-16:.png" would be moved to the archive on 16.05.2015.

Janhoslide demo: http://janho.dy.fi/demot/janhoslide/

## Requirements
In order to get JanhoSlide working, you need to have:
- A web server (for example Apache2)
- Php installed and configured correctly on that server


## Installation
JanhoSlide is coded in Php and can be installed simply by copying the folder into your web server.

1. Download the zip file.
2. Unpack it and move it to your website. (/var/www/JanhoSlide in Linux for example)
3. Configure the config.php file.
4. Move the images and videos you want to show into the right folders. (/images, /videos)
5. Test your JanhoSlide with a web browser.
