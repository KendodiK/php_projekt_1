<?php
require_once 'DBCities.php';

if(isset($_POST['city'])) {

    $city = $_POST['city'];
    $dbCities = new DBCities();
    
    if (isset($city)){
        $result = "";
        $return = $dbCities->get($city);
        if(!empty($return)){
            foreach($return as $resoult){
                $result .= "<p>{$resoult['zip_code']},{$resoult['city']},{$resoult['county']}</p>";
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
