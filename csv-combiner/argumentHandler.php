<?php

class ArgumentHandler {

    function doMultipleArgumentsExist($count) {
        if($count===1) {
            exit("No arguments provided. \n");
        } else if($count===2) {
            exit("Only 1 argument provided, please provide 2 or more arguments. \n");
        } else {
            return $count;
        }
    }

    function validateArguments($arguments, $count) {
        for($i=1; $i<$count; $i++) {
            $file = $arguments[$i];
            if(file_exists($file)==1) {
                $this->isCSV($file);
            } else {
                exit($file . " not found. \n");
            }
        }
        $this->headersMatch($arguments, $count);
    }

    function isCSV($filename) {
        $filenameArray = explode(".", $filename);
        $ext = end($filenameArray);
        if ($ext!="csv") {
            exit($filename . " is not a csv file. \n");
        }
    }

    function headersMatch($arguments, $count) {
        $initHeaders = fgets(fopen($arguments[1], "r"));
        for($i=2; $i<$count; $i++) {
            $nextHeaders = fgets(fopen($arguments[$i], "r"));
            if($initHeaders!=$nextHeaders) {
                exit("Header columns do not match. \n");
            }
        }
    }

}

?>