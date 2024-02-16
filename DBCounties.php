<?php 
require_once 'DB.php';

class DBCounties extends DB
{
    public function createTableCounties()
    {
        $query = 'CREATE TABLE IF NOT EXISTS counties(county varchar(35), capital varchar(35), population int, crest varchar(35), flag varchar(35))';
        return $this->mysqli->query($query);
    }


    public function fillCounties(array $data)
    {
        $this->createTableCounties();
        $result = $this->mysqli->query("SELECT * FROM counties");
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
                if ($county[0] != ""){
                    $init = $this->mysqli->query("SELECT county FROM counties WHERE county = '$county[0]'");
                    if(!$init->num_rows)
                    {
                        
                        $insert = $this->mysqli->query("INSERT INTO counties (county) VALUES ('$county[0]')");
                        if(!$insert) {
                            $errors[] = $county[0];
                        }
                        echo"$county[0]\n";
                    }
                }  
            }
        }
        return $errors;
    }

    public function fillCountiesWithCountyData(array $data) 
    {
        $this->createTableCounties();
        $result = $this->mysqli->query("SELECT capital FROM counties");
        $row = $result->fetch_array(MYSQLI_NUM);
        $errors = [];
        $isFirst = true;
        if(is_null($row[0])) {
            foreach($data as $county){
                if($isFirst)
                {
                    $isFirst = false;
                    continue;
                }
                if (isset($county[0]) && isset($county[1]) && isset($county[2]) && isset($county[3]) && isset($county[4])) {
                $insert = $this->mysqli->query("UPDATE counties SET capital = '$county[2]', population = '$county[1]', crest = '$county[3]', flag = '$county[4]' WHERE county = '$county[0]'");
                if(!$insert) {
                    $errors[] = $county[2];
                }
                echo"$county[2]\n";
                }                    
            }
        }
        
        return $errors;
    }

    public function get(string $county): array
    {
        $query = "SELECT * FROM counties WHERE county = $county";

        return $this->mysqli->query($query)->fetch_assoc();
    }

    public function getAll()
    {
        $query = "SELECT * FROM counties";

        return $this->mysqli->query($query)->fetch_all(MYSQLI_ASSOC);

    }

    public function displayTable()
    {
        $data = $this->getAll();
        
        echo "<form id='table_id'>
        <table>
        <tbody>";
        foreach($data as $sor)
        {
            echo "
            <tr>
                <td>{$sor['county']}</td>
                <td>{$sor['capital']}</td>
                <td>{$sor['population']} <img src='./cimerek/Bacs-kiskun_C.svg' alt='kaka'> <button id='lenyit'>Adatok</button> </td>
            </tr>";
        }
        echo "</table>
        </tbody'>
        </form>";
    }
}