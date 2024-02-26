<?php
require_once 'DBCities.php';

if (isset($_POST['selectedCh']) && isset($_POST['selectedCounty'])) {

    $selectedCh = $_POST['selectedCh'];
    $selectedCounty = $_POST['selectedCounty'];
    $dbCities = new DBCities();

    if (isset($selectedCh)) {
        $cities = $dbCities->getAbcCities($selectedCh, $selectedCounty);
        $result = "<td colspan='5'>";
        foreach ($cities as $sor) {
            $result .= "
                    {$sor['county']}
                    {$sor['zip_code']}
                    {$sor['city']} 
                    <form class='sorba' method='post'> 
                        <button type='submit' id='btn-mod' name='btn-mod' value='{$sor['zip_code']}'>Módosítás</button>
                    </form> 
                    <form class='sorba' method='post'>
                        <button type='submit' id='btn-del' name='btn-del' value='{$sor['zip_code']}'>Törlés</button>
                    </form>
                    <br>
                ";
        }
        $result .= "</td>";
        echo $result;
    }
} else {
    echo "semmi nem jó";
}
