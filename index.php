<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once("DBCounties.php");
    require_once("DBCities.php");
    require_once('CsvTools.php');

    $countyMaker = new DBCounties();
    $cityMaker = new DBCities();

    $fileName = 'zip_codes.csv';
    $csvData = getCsvData($fileName);

    $countyMaker->fillCounties($csvData);
    $cityMaker->fillCities($csvData);
    ?>
</body>
</html>