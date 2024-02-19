<?php 
require_once 'DB.php';

class DBCities extends DB
{
    public function createTableCities()
    {
        $query = 'CREATE TABLE IF NOT EXISTS cities(county varchar(35), zip_code int, city varchar(35))';
        return $this->mysqli->query($query);
    }


    public function fillCities(array $data)
    {
        $this->createTableCities();
        $result = $this->mysqli->query("SELECT * FROM cities");
        $row = $result->fetch_array(MYSQLI_NUM);
        $errors = [];
        $isFirst = true;
        if(empty($row)) {
            foreach($data as $city){
                if($isFirst)
                {
                    $isFirst = false;
                    continue;
                }
                if(isset($city[0]) && isset($city[1]) && isset($city[2])){
                $insert = $this->mysqli->query("INSERT INTO cities VALUES ('$city[0]', '$city[1]', '$city[2]')");
                if(!$insert) {
                    $errors[] = $city[0];
                }
                //csak feltöltésnél
                echo"$city[0]\n";
                }
                    
            }
        }
        return $errors;
    }

    public function getCityByCounty($county) {
        $query = "SELECT * FROM cities WHERE county = '$county'";
        return $this->mysqli->$query->fetch_all(MYSQLI_ASSOC);
    }

    public function getABCbyCounty($county) {
        $resoult = $this->mysqli->query("SELECT * FROM cities WHERE county = '$county'");
        $cities = $resoult->fetch_all(MYSQLI_ASSOC);
        $abc = [];
        foreach($cities as $city){
            $ch = strtoupper($city['city'][0]);
            if (!in_array($ch, $abc)) {
                $abc[] = $ch;
            }
        }

        return $abc;
    }

}