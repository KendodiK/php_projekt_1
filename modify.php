<?php
require_once 'DBCities.php';

if (isset($_POST['zipId'])) {

    $zipId = $_POST['zipId'];
    $dbCities = new DBCities();

    if (isset($zipId)) {
        $city = $dbCities->getCityByZip($zipId);
        
        echo"<h2>Város módosítása</h2>
            <form method='POST'>
                <input type='text' value='{$sor['city']}' id='newNameFromMod'></input>
                <input type='text' value='{$sor['county']}' id='newCountyFromMod'></input>
                <input type='text' value='{$sor['zip_code']}' id='newZipCodeFromMod'></input>
                <button type='submit' id='btn-modify' name='btn-modify'></button>
            </form>";
    }
} else {
    echo "semmi nem jó";
}
