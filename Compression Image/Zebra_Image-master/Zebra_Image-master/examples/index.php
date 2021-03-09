<?php

// load the image manipulation class
require 'path/to/Zebra_Image.php';

// create a new instance of the class
$image = new Zebra_Image();

// if you handle image uploads from users and you have enabled exif-support with --enable-exif
// (or, on a Windows machine you have enabled php_mbstring.dll and php_exif.dll in php.ini)
// set this property to TRUE in order to fix rotation so you always see images in correct position
$image->auto_handle_exif_orientation = false;

// indicate a source image (a GIF, PNG, JPEG or WEBP file)
$image->source_path = 'path/to/image.png';

// indicate a target image
// note that there's no extra property to set in order to specify the target
// image's type -simply by writing '.jpg' as extension will instruct the script
// to create a 'jpg' file
$image->target_path = 'path/to/image.jpg';

// since in this example we're going to have a jpeg file, let's set the output
// image's quality
$image->jpeg_quality = 720;

// some additional properties that can be set
// read about them in the documentation
$image->preserve_aspect_ratio = true;
$image->enlarge_smaller_images = true;
$image->preserve_time = true;
$image->handle_exif_orientation_tag = true;

// resize the image to exactly 100x100 pixels by using the "crop from center" method
// (read more in the overview section or in the documentation)
//  and if there is an error, check what the error is about
if (!$image->resize('', 720, ZEBRA_IMAGE_CROP_CENTER)) {

    // if there was an error, let's see what the error is about
    switch ($image->error) {

        case 1:
            return 'Source file could not be found!';
            break;
        case 2:
            return 'Source file is not readable!';
            break;
        case 3:
            return 'Could not write target file!';
            break;
        case 4:
            return 'Unsupported source file format!';
            break;
        case 5:
            return 'Unsupported target file format!';
            break;
        case 6:
            return 'GD library version does not support target file format!';
            break;
        case 7:
            return 'GD library is not installed!';
            break;
        case 8:
            return '"chmod" command is disabled via configuration!';
            break;
        case 9:
            return '"exif_read_data" function is not available';
            break;

    }

// if no errors
} else return 'Success!';