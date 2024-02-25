<?php
require_once 'DBCities.php';

if(isset($_POST['city'])) {

    $city = $_POST['city'];
    $dbCities = new DBCities();
    
    if (isset($city)){
        $result = "";
        $return = $dbCities->get($city);
        if(!empty($return)){
            for($i = 0;$i < count($return)/3;$i++){
                $result .= "<p>{$return['zip_code']}, {$return['city']} {$return['county']} megye</p>";
            }
        }
        else {
            $result .= "<p>Nincs ilyen nevű város az adatbázisban.</p>";
        }

        echo $result;
    }

}
else {
    echo"semmi nem jó";
}
