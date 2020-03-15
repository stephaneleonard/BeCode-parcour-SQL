<?php

require_once('model/hikingModel.php');


function getReadPage()
{
    $hikingManager = new StephaneLeonard\hiking\Model\HikingManager();
    $content = $hikingManager->getHikingData();
    if (!$content) {
        throw new UnexpectedValueException('getting data from database');
    }
    require 'view/read.php';
}

function getCreatePage()
{
    $hikingManager = new StephaneLeonard\hiking\Model\HikingManager();
    if (isset($_POST['name'])) {
        //sanatize data
        $name = $_POST['name'];
        $difficulty = $_POST['difficulty'];
        $distance = $_POST['distance'];
        $duration = $_POST['duration'];
        $height_difference = $_POST['height_difference'];
        //validate data
        //push to database
        $res = $hikingManager->setHikingData($name, $difficulty, $distance, $duration, $height_difference);
        if (!$res) {
            throw new UnexpectedValueException('error in inserting to database');
        }
    }
    require 'view/create.php';
}

function getUpdatePage()
{
    $hikingManager = new StephaneLeonard\hiking\Model\HikingManager();
    require 'view/update.php';
}
