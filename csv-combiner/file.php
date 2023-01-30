<?php

class File {
    public $path;
    public $name;
    public $read;

    function __construct($path) {
        $this->path = $path;
        $this->read = fopen($path, "r");
        $this->name = basename($path);
    }

    function readLine() {
        return fgetcsv($this->read);
    }

    function closeFile() {
        fclose($this->read);
    }

}

?>
