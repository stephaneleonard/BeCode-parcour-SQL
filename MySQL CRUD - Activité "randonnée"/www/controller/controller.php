<?php
define("ID",     "id");
define("NAME",     "name");
define("DIFFICULTY",     "difficulty");
define("DISTANCE",     "distance");
define("DURATION",     "duration");
define("HEIGHT_DIFF",     "height_difference");
define("AVAILABLE",     "available");
define("LOCALHOST",     "Location: http://localhost");
define('PASSWORD', 'password');

require_once('model/hikingModel.php');
require_once('model/userModel.php');


function sanatizeHikingForm()
{
    $options = [
        ID => FILTER_SANITIZE_NUMBER_INT,
        NAME => FILTER_SANITIZE_STRING,
        DISTANCE => FILTER_SANITIZE_NUMBER_FLOAT,
        DIFFICULTY => FILTER_SANITIZE_STRING,
        DURATION => FILTER_SANITIZE_STRING,
        HEIGHT_DIFF => FILTER_SANITIZE_NUMBER_FLOAT,
        AVAILABLE => FILTER_SANITIZE_NUMBER_INT

    ];
    $result = filter_input_array(INPUT_POST, $options);
    foreach ($result as $key) {
        $result[$key] = trim($result[$key]);
    }
    return $result;
}

function sanatizeConnectForm()
{
    $options = [

        NAME => FILTER_SANITIZE_STRING,
        PASSWORD => FILTER_SANITIZE_STRING,
    ];
    $result = filter_input_array(INPUT_POST, $options);
    foreach ($result as $key) {
        $result[$key] = trim($result[$key]);
    }
    return $result;
}

function createSession($name, $password)
{
    $userManager = new StephaneLeonard\hiking\Model\UserManager();
    $userList = $userManager->getUserData($name);
    $res = $userList->fetch();
    if ($password == $res[PASSWORD]) {
        $_SESSION['login'] = $name;
        $_SESSION['pwd'] = $password;
    } else {
        throw new UnexpectedValueException('error in connecting user');
    }
}

function endSession()
{
    session_unset();

    // On détruit notre session
    session_destroy();
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
        $res = $hikingManager->setHikingDatas($result[NAME], $result[DIFFICULTY], $result[DISTANCE], $result[DURATION], $result[HEIGHT_DIFF], $result[AVAILABLE]);
        if (!$res) {
            throw new UnexpectedValueException('error in inserting to database');
        }
        header(LOCALHOST);
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
        $res = $hikingManager->updateHikingData($id, $result[NAME], $result[DIFFICULTY], $result[DISTANCE], $result[DURATION], $result[HEIGHT_DIFF], $result[AVAILABLE]);
        if (!$res) {
            throw new UnexpectedValueException('error in updating to database');
        }
        header(LOCALHOST);
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

function getConnectPage()
{
    if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
        endSession();
        header(LOCALHOST);
    }
    if (isset($_POST['name'])) {
        $res = sanatizeConnectForm();
        createSession($res['name'], $res[PASSWORD]);
        header(LOCALHOST);
    } else {
        require 'view/connect.php';
    }
}
