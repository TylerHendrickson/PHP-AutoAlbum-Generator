<?php

/*
 * PHP AutoAlbum Generator created by Tyler Hendrickson
 * Email hendrickson (dot) tsh (at) gmail (dot) com
 * See README and read comments for help with configuration.
 */

/*
 * Name the album.
 * -Must be name of the directory where the album's images are located (the images' immediate parent directory)
 */
$albumChoice = 'demo';
/*
 * Choose album list format
 * -Can be left at 'default' or set to a custom value that must be defined in the Album model
 * -'default' output: "<img src=\"$srcAttr\" />\n"
 */
$albumListFormat = 'default';
//$albumListFormat = 'thumbnails';


//Include paths to model classes (probably don't need to be edited)
include '../album_generator/models/album.php';
include '../album_generator/models/photo.php';

//No editing needed below this line
$useAlbum = new Album($albumChoice, $albumContext);
$albumGen = $useAlbum->getContents();

?>