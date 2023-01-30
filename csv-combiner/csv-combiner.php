<?php
require 'argumentHandler.php';
require 'File.php';

$argHandler = new ArgumentHandler();

# Confirm there are atleast 2 arguments, if there is then store argument count
$numOfArguments = $argHandler->doMultipleArgumentsExist($argc);
$arguments = $argv;

# Confirm argument files exist, are csv's, and headers match
$argHandler->validateArguments($arguments, $numOfArguments);

# Delete previous combined csv, if it exists
removePreviousCombinedCSV();
$combine = fopen("combined.csv", "a");

# Loop through each csv file and add to combined csv
for($i=1; $i<$numOfArguments; $i++){

    $csvFile = new File($arguments[$i]);

    # Add intial headers, skip headers for following files
    if($i==1) {
        $line = $csvFile->readLine();
        array_push($line, "filename");
        fputcsv($combine, $line);
    } else {
        $csvFile->readLine();
    }

    # Add csv data line by line until end of file
    while(!feof($csvFile->read)) {
        $line = $csvFile->readLine();
        if($line!=null){
            # Remove slashes from any elements on each line
            foreach($line as &$value) {
                $value = stripslashes($value);
            }
            array_push($line, $csvFile->name);
            fputcsv($combine, $line);
        }
    }
    $csvFile->closeFile();
}
# If successful, output combined.csv
fwrite(STDOUT, "> combined.csv \n");
fclose($combine);

function removePreviousCombinedCSV() {
    if (file_exists("combined.csv")==1) {
        unlink("combined.csv");
    }
}

?>