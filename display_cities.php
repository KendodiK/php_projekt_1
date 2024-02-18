<?php
require_once("DBCities.php");

if(isset($_POST['selectedCounty'])) {

    $DBCities = new DBCities;
    $abc = $DBCities->getABCbyCounty($selectedCounty);

    $selectedCounty = $_POST['selectedCounty'];
    echo"<tr>
    <td colspan='4'>";
    foreach($abc as $ch) {
        echo $ch;
    }
    echo"</td>
    </tr>";
}