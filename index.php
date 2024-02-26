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
        $zip = $_POST["btn-del"];
        $cityMaker->delete($zip);
    }
    if (isset($_POST["btn-mod"])) {
        $id = $_POST["btn-mod"];
        $cityMaker->update($id, $ujnev);
    }
    ?>



    <?php
    if (isset($_POST["btn-new"])) {
        echo "gatya";
        $name = $_POST["newCityName"];
        $code = $_POST["newCityPostalCode"];
        $county = $_POST["chosenCounty"];
        $cityMaker->add($name, $code, $county);
    }
    ?>
    <div class='hatter'>
        <div class='hozzaad'>
            <h2>Város hozzáadása</h2>
            <form>
                <p><a>Város neve:</a>
                    <input type="text" id="newCityName">
                </p>
                <p><a>Város irányítószáma:</a>
                    <input type="number" id="newCityPostalCode">
                </p>
                <p><a>Megye:</a>
                    <select name="counties" id="chosenCounty">
                        <?php
                        $counties = $countyMaker->getAll();
                        foreach ($counties as $county) {
                            echo "<option value='{$county['id']}'>{$county['county']}</option>";
                        }
                        ?>
                    </select>
                </p>
                <input id='btn-new' type="submit" value="Város felvétele"></p>
            </form>
        </div>

        <div class='kereses'>
            <h2>Város keresése</h2>
            <input id="cityForSearch" type="text">
            <input type="button" id="btn-search" value="keresés" onclick="search()">
            <label for="lb-search"><p id="lb-search"></p></label>
        </div>

        <label for="modify"><div id="modify">
        </div></label>
    </div>

    
    
</body>

</html>