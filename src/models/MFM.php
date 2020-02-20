<?php

namespace MAZE\MFM\Models;


class MFM {

    protected $path;

    public function __construct($path)
    {
        if (file_exists($path)) {
            $this->path = $path;
        }else {
            abort(422, "'$path' is not a valid file/directory");
        }
    }

    public function getContents(){
        return scandir($this->path);
    }

    public function getContentsSpecific($path){
        return scandir($path);
    }

    public function getPath(){
        return $this->path;
    }
}
