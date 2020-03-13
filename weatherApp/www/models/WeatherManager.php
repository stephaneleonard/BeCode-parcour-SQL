<?php

namespace StephaneLeonard\WeatherApp\Model;

require_once("models/Manager.php");

class WeatherManager extends Manager
{
    public function getWeatherData()
    {
        $db = $this->dbConnect();
        return $db->query('SELECT * FROM Météo');
    }

    public function setWeatherData($city, $high, $low)
    {
        $sql = "INSERT INTO `Météo` (`ville`, `haut` , `bas`) VALUES ('$city', $high, $low)";
        $db = $this->dbConnect();
        $statement = $db->prepare($sql);
        return  $statement->execute();
    }

    public function deleteWeatherData($city)
    {
        $sql = "DELETE FROM Météo WHERE ville = '$city'";
        $db = $this->dbConnect();
        $statement = $db->prepare($sql);

        return $statement->execute();
    }
}
