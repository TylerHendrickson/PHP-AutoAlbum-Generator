<?php

/*
 * PHP AutoAlbum Generator created by Tyler Hendrickson
 * Email hendrickson (dot) tsh (at) gmail (dot) com
 * See README and read comments for help with configuration.
 */


class Album {

    var $name;  //Album folder name
    var $contents;  //Album contents
    var $galContext; //Signifies Homepage album or Gallery album
    var $numContents;

    function __construct($albumName, $albumContext) {
        $this->setName($albumName);
        $this->setContext($albumContext);
        $this->loadContents();
    }

    //Set Name
    function setName($albumName) {
        $this->name = $albumName;
    }

    //Get Name
    function getName() {
        return $this->name;
    }

    //Set context
    function setContext($albumContext) {
        $this->galContext = $albumContext;
    }

    //Get context
    function getContext() {
        return $this->galContext;
    }

    //Create list of album contents
    function getContents() {
        $thumbList;
        if ($this->numContents != 0) {
            //The $srcAttr variable specifies the path to the image.
            foreach ($this->contents as $srcAttr) {

                switch ($this->galContext) {
                    /*
                     * Specify its unique markup or any alternate formats for the image list.
                     * Example: Maybe you want a list with markup for images at native size (default), 
                     * but you also want markup sized for 100x100 thumbnails.
                     */
                    case 'default':  //Native size
                        $imageList .= "<img src=\"$srcAttr\" />\n";
                        break;
                    case 'thumbnails': //100x100 thumbnails
                        $imageList .= "<img src=\"$srcAttr\" alt=\"Sample alt text\" width=\"100\" height=\"100\" />\n";
                }
            }
        }
        return $imageList;
    }

    //Load list of album contents
    function loadContents() {

        /*
         * Set $imageExt to desired image extension
         * Set $parentDir to directory where /album_name/image1.jpg resides
         */
        $imageExt = ".jpg";
        $parentDir = '../images/';

        //Load directory contents
        $albumDir =  $parentDir . $this->name . '/';
        $photoNum = 0;
        $opener = openDir($albumDir);
        while ($file = readdir($opener)) { //Begin reading directory contents
            if (eregi("\\".$imageExt, $file)) {  //File is JPEG
                $photo = new Photo($albumDir, $file);
                $this->contents[$photoNum] = $photo->getLocation();
                $photoNum++;
            }
        }
        $this->numContents = $photoNum;
        closedir($opener);
    }

}

?>
