<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vármegyék</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="script.js"></script>
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
    $cityMaker->fillCities($csvData);

    $countyMaker->fillCounties($csvData);
    $fileName = 'county_data.csv';
    $csvData = getCsvData($fileName);
    $countyMaker->fillCountiesWithCountyData($csvData);
    $cityMaker->fillCities($csvData);
    $out = $countyMaker->displayTable();
    echo $out;
    if (isset($_POST["btn-del"])) {
        $id = $_POST["btn-del"];
        $cityMaker->delete($id);
    }
    if (isset($_POST["btn-mod"])) {
        $id = $_POST["btn-mod"];
        $cityMaker->update($id, $ujnev);
    }
    // if (isset($_POST["btn-new"])) {
    //     $id = $_POST["btn-mod"];
    //     $cityMaker->update($id, $ujnev);
    // }
    ?>

    
</body>
</html>