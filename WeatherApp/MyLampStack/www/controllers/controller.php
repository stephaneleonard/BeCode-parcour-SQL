<?php

require_once('models/WeatherManager.php');


function getPage()
{
    if (isset($_POST['city'])) {
        $weatherManager = new \StephaneLeonard\WeatherApp\Model\WeatherManager();
        //sanatize data
        $city = $_POST['city'];
        $high = $_POST['high'];
        $low = $_POST['low'];
        //validate data
        //push to database
        $res = $weatherManager->setWeatherData($city, $high, $low);
        if (!$res) {
            throw new UnexpectedValueException('error in inserting to database');
        }
    }
    if (isset($_POST['submit'])) {
        $weatherManager = new \StephaneLeonard\WeatherApp\Model\WeatherManager();
        $res = $weatherManager->deleteWeatherData($_POST['submit']);
        if (!$res) {
            throw new UnexpectedValueException('error in inserting to database');
        }
    }
    $weatherManager = new \StephaneLeonard\WeatherApp\Model\WeatherManager();
    $weatherData = $weatherManager->getWeatherData();
    if (!$weatherData) {
        throw new UnexpectedValueException('getting data from database');
    }
    require 'Views/weatherView.php';
}
