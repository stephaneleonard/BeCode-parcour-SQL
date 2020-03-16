<?php
define("ID",     "id");
define("NAME",     "name");
define("DIFFICULTY",     "difficulty");
define("DISTANCE",     "distance");
define("DURATION",     "duration");
define("HEIGHT_DIFF",     "height_difference");

require_once('model/hikingModel.php');


function sanatizeHikingForm()
{
    $options = [
        ID => FILTER_SANITIZE_NUMBER_INT,
        NAME => FILTER_SANITIZE_STRING,
        DISTANCE => FILTER_SANITIZE_NUMBER_FLOAT,
        DIFFICULTY => FILTER_SANITIZE_STRING,
        DURATION => FILTER_SANITIZE_STRING,
        HEIGHT_DIFF => FILTER_SANITIZE_NUMBER_FLOAT
    ];
    $result = filter_input_array(INPUT_POST, $options);
    foreach ($result as $key => $value) {
        $result[$key] = trim($result[$key]);
    }
    return $result;
}

function getReadPage()
{
    $hikingManager = new StephaneLeonard\hiking\Model\HikingManager();
    $content = $hikingManager->getHikingDatas();
    if (!$content) {
        throw new UnexpectedValueException('getting data from database');
    }
    require 'view/read.php';
}

function getCreatePage()
{
    $hikingManager = new StephaneLeonard\hiking\Model\HikingManager();
    if (isset($_POST[NAME])) {
        //sanatize data
        $result = sanatizeHikingForm();
        //validate data
        //push to database
        $res = $hikingManager->setHikingDatas($result[NAME], $result[DIFFICULTY], $result[DISTANCE], $result[DURATION], $result[HEIGHT_DIFF]);
        if (!$res) {
            throw new UnexpectedValueException('error in inserting to database');
        }
    }
    require 'view/create.php';
}

function getUpdatePage()
{
    $hikingManager = new StephaneLeonard\hiking\Model\HikingManager();
    $id = htmlspecialchars($_GET[ID]);
    if (isset($_POST[NAME])) {
        //sanatize data
        $result = sanatizeHikingForm();
        //validate data
        //push to database 
        $res = $hikingManager->updateHikingData($id, $result[NAME], $result[DIFFICULTY], $result[DISTANCE], $result[DURATION], $result[HEIGHT_DIFF]);
        if (!$res) {
            throw new UnexpectedValueException('error in updating to database');
        }
    }
    $data = $hikingManager->getHikingData($id);
    $content = $data->fetch();
    if (!$content) {
        throw new UnexpectedValueException('error getting value from database');
    }

    require 'view/update.php';
}

function getdeletePage()
{
    $hikingManager = new StephaneLeonard\hiking\Model\HikingManager();
    $res = $hikingManager->deleteHikingData(htmlspecialchars($_GET[ID]));
    if (!$res) {
        throw new UnexpectedValueException('error in updating to database');
    }
    require 'view/delete.php';
}
