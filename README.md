# JanhoSlide

JanhoSlide is web program that creates a slideshow in your web browser from the images and videos of your choosing.

## Features
With JanhoSlide you can easily create a simple slideshow in your web browser. A example use for JanhoSlide would be looping through advertisements in a monitor at a store.

JanhoSlide features in its current version:
- Simple web interface.
- A Default show or a Custom show where you can quickly modify the show for your liking.
- Easy ways to create a good way to edit slideshow media.
- Way to set the last date a image will be shown.
- Html5 image and video usage. All formats that the browser supports should work.
- English and Finnish language support.
- The slideshow refreshes itself from time to time. No manual refrehes needed.

The media files need to be located in two folders, one for images, one for videos. These folders can be changed but defaults are "/Janhoslide/images" and "/Janhoslide/videos". You can determine when these media files are moved to archive folder. You can do this by setting the last show date to the mediafiles filename with syntax: ":yyyy-mm-dd:". For example a file named "Flowers:2015-05-16:.png" would be moved to archive on 16.05.2015.

## Requirements
In order to get JanhoSlide working, you need to have:
- A web server (Apache2)
- Php installed on that server


## Installation
JanhoSlide is coded in Php and can be installed simply by copying the folder into your web server.

1. Download the zip file.
2. Unpack it and move it to your website. (/var/www/JanhoSlide in linux forexample)
3. Configure the config.php file.
4. Move the images and videos you want to show into the right folders. (Janhoslide/images, Janhoslide/videos)
5. Test your JanhoSlide with a web browser.

An easy way to make your media folders accessible would be to install a Samba server on that server and create symbolic links from the share to JanhoSlides media folders. Just a suggestion.

