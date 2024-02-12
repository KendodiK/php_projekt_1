<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vármegyék</title>
</head>
<body>
    <h1>Magyarország vármegyéi</h1>
    <?php
    require_once("DBCounties.php");
    require_once("DBCities.php");
    require_once('CsvTools.php');

    $countyMaker = new DBCounties();
    $cityMaker = new DBCities();

    $fileName = 'zip_codes.csv';
    $csvData = getCsvData($fileName);

    $countyMaker->fillCounties($csvData);
    $fileName = 'county_data.csv';
    $csvData = getCsvData($fileName);
    $countyMaker->fillCountiesWithCountyData($csvData);
    $cityMaker->fillCities($csvData);
    echo"
        <table>
        <tbody>
    ";

    echo"
        </tbody>
        </table>
    ";
    ?>
</body>
</html>