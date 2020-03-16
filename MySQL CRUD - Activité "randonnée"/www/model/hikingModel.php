<?php

namespace StephaneLeonard\hiking\Model;

require_once("model/Manager.php");

class HikingManager extends Manager
{

    public function getHikingData($id)
    {
        $db = $this->dbConnect();
        return $db->query("SELECT * FROM hiking WHERE id = $id");
    }

    public function getHikingDatas()
    {
        $db = $this->dbConnect();
        return $db->query('SELECT * FROM hiking');
    }

    public function setHikingDatas($name, $difficulty, $distance, $duration, $height_difference)
    {
        $sql = "INSERT INTO `hiking` (`name`, `difficulty`, `distance`, `duration`, `height_difference`) VALUES ('$name' , '$difficulty' , $distance , '$duration' , $height_difference)";
        $db = $this->dbConnect();
        $statement = $db->prepare($sql);
        return  $statement->execute();
    }

    public function updateHikingData($id, $name, $difficulty, $distance, $duration, $height_difference)
    {
        $sql = "UPDATE `hiking` SET `name`='$name',`difficulty`='$difficulty',`distance`=$distance,`duration`='$duration',`height_difference`=$height_difference WHERE `id`=$id";
        $db = $this->dbConnect();
        $statement = $db->prepare($sql);
        return  $statement->execute();
    }
}
