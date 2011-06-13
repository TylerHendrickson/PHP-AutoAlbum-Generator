<?php

/*
 * PHP AutoAlbum Generator created by Tyler Hendrickson
 * Email hendrickson (dot) tsh (at) gmail (dot) com
 * See README and read comments for help with configuration.
 */

class Photo {
    var $photoPath;
    
    public function __construct($fileDir, $fileName) {
        $this->photoPath = $fileDir.$fileName;
    }
    
    function setLocation($fileDir, $fileName) {
        $this->photoPath = $fileDir.$fileName;
    }
    
    function getLocation() {
        return $this->photoPath;
    }
}

?>
