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
                $insert = $this->mysqli->query("INSERT INTO counties (capital, population, crest, flag) VALUES ('$county[2]','$county[1]','$county[3]','$county[4]')");
                if(!$insert) {
                    $errors[] = $county[0];
                }
                echo"$county[0]\n";                    
            }
        }
        
        return $errors;
    }

    public function get(string $county): array
    {
        $query = "SELECT * FROM counties WHERE county = $county";

        return $this->mysqli->query($query)->fetch_assoc();
    }

    public function getAll(array $county)
    {
        $query = "SELECT * FROM counties";

        return $this->mysqli->query($query)->fetch_assoc();
    }

    public function displayTable(array $csv)
    {
        $data = $this->getAll($csv);
        echo "<tbody>";
        foreach($data as $sor)
        {
            echo "
            <tr>
                <td>{$sor[0]}</td>
                <td>{$sor[1]}</td>
                <td>{$sor[2]}</td>
            </tr>";
        }
        echo "</tbody'>";
    }
}