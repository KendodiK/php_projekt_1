<?php
require_once 'DBCities.php';

if(isset($_POST['city'])) {

    $city = $_POST['city'];
    $dbCities = new DBCities();

    if (isset($city)){
        $return = $dbCities->get($city);
        if(!empty($return)){
            foreach($return as $resoult){
                echo"<p>{$resoult["zip_code"]},{$resoult["city"]},{$resoult["county"]}</p>";
            }
        }
        else {
            echo"<p>Nincs ilyen nevű város az adatbázisban.</p>"
        }
    }
}
else {
    echo"semmi nem jó";
}
