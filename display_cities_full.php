<?php
require_once 'DBCities.php';

if(isset($_POST['selectedCh']) && isset($_POST['selectedCounty'])) {

    $selectedCh = $_POST['selectedCh'];
    $selectedCounty = $_POST['selectedCounty'];
    $dbCities = new DBCities();

    if (isset($selectedCh)){
        $cities = $dbCities->getAbcCities($selectedCh, $selectedCounty);
        $result = "<td colspan='5'>";
        foreach($cities as $sor)
        {
            $result .= "
                    {$sor['county']}
                    {$sor['zip_code']}
                    {$sor['city']} 
                    <form> 
                        <button id='btn-mod'>Módosítás</button> 
                    </form> 
                    <form> 
                        <button id='btn-del'>Törlés</button>
                    </form>
                    <br>
                ";
        }
        $result .= "</td>";
        echo $result;
    }
}
else {
    echo"semmi nem jó";
}
