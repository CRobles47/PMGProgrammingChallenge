# My Solution To CSV Combiner

```
$ php csv-combiner.php ./fixtures/accessories.csv/ ./fixtures/clothing.csv > combined.csv
```

Script will take csv files as arguments and combine them into a new file called "combined.csv". 

Initially, script will 
* confirm that atleast 2 arguments are provided
* ensure the arguments are indeed csv files
* headers of each file match. 

If any of these requirements are not met, the script will stop running and output the appropriate message. If all requirements are met, script will then check if "combined.csv" already exists in directory, if it does then it will be removed. The script will then loop through each csv file line by line, adding it to the combined.csv. 
If you see,
```
> combined.csv 
```
in output, then the script has run successfully and you can open the newly created file to see the result.
