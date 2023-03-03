<?php

class JsonConnection{

    private $rutaFile;

    public function __construct($rutaFile){
        $this->rutaFile = $rutaFile;
    }

    public function getJson(){
        $data = file_get_contents($this->rutaFile);
        return json_decode($data, true);
    }
    
}
