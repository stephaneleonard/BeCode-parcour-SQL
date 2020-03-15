<?php

namespace StephaneLeonard\hiking\Model;

require_once("model/Manager.php");

class HikingManager extends Manager
{
    public function getHikingData()
    {
        $db = $this->dbConnect();
        return $db->query('SELECT * FROM hiking');
    }

    public function setHikingData($name, $difficulty, $distance, $duration, $height_difference)
    {
        $sql = "INSERT INTO `hiking` (`name`, `difficulty`, `distance`, `duration`, `height_difference`) VALUES ('$name' , '$difficulty' , $distance , '$duration' , $height_difference)";
        $db = $this->dbConnect();
        $statement = $db->prepare($sql);
        return  $statement->execute();
    }
}
