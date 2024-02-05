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
            foreach($data as $county){
                if($isFirst)
                {
                    $isFirst = false;
                    continue;
                }
                $insert = $this->mysqli->query("INSERT INTO cities VALUES ('$county[0]', '$county[1]', '$county[2]')");
                if(!$insert) {
                    $errors[] = $county[0];
                }
                echo"$county[0]\n";
                
                    
            }
        }
        return $errors;
    }

}