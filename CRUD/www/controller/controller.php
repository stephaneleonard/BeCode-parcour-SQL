<?php
require_once('model/clientsManager.php');
require_once('model/showsManager.php');
require_once('model/cardsManager.php');
define('CLIENTS', 'clients');
define('ERR', 'getting data from database');
define('LASTNAME', 'lastName');
define('FIRSTNAME', 'firstName');
define('BIRTHDATE', 'birthDate');
define('CARD', 'card');
define('CARDNUM', 'cardNumber');
define('CARDTYPE', 'cardType');
define('TITLE', 'title');
define('PERFORMER', 'performer');
define('DATE', 'date');
define('SHOWTYPE', 'showTypesId');
define('FIRSTGENRE', 'firstGenresId');
define('SECGENRE', 'secondGenreId');
define('DURATION', 'duration');
define('STARTTIME', 'startTime');

function getReadPage()
{
    $clientsManager = new StephaneLeonard\CRUD\Model\ClientsManager();
    $showManager = new StephaneLeonard\CRUD\Model\ShowManager();

    //EX 1  
    $clients = $clientsManager->getDatas(CLIENTS);
    if (!$clients) {
        throw new UnexpectedValueException(ERR);
    }

    //EX2
    $showTypes = $showManager->getDatas('showTypes');
    if (!$showTypes) {
        throw new UnexpectedValueException(ERR);
    }

    //EX3
    $firstClients = $clientsManager->getDatas(CLIENTS, [], [], 'id', 'ASC', 20);
    if (!$firstClients) {
        throw new UnexpectedValueException(ERR);
    }

    //EX4
    $clientsWithCards = $clientsManager->getDatas(CLIENTS, [],  ["card = 1"]);
    if (!$clientsWithCards) {
        throw new UnexpectedValueException(ERR);
    }

    //EX5
    $clientsStartWithM = $clientsManager->getDatas(CLIENTS, [FIRSTNAME, LASTNAME],  ["lastName LIKE 'm%'"]);
    if (!$clientsStartWithM) {
        throw new UnexpectedValueException(ERR);
    }

    //EX6
    $sortedShow = $showManager->getDatas('shows', [TITLE, PERFORMER, 'date', 'startTime'], [], 'title', 'ASC');
    if (!$sortedShow) {
        throw new UnexpectedValueException(ERR);
    }

    //EX7
    $clientsA = $clientsManager->getDatas(CLIENTS);
    if (!$clientsA) {
        throw new UnexpectedValueException(ERR);
    }
    require 'view/readView.php';
}

function getWritePage()
{
    //SET DATA


    $cardsManager = new StephaneLeonard\CRUD\Model\CardsManager();
    $clientsManager = new StephaneLeonard\CRUD\Model\ClientsManager();
    $showManager = new StephaneLeonard\CRUD\Model\ShowManager();

    //SET DATA
    $genres = $showManager->getDatas('genres', ['genre', 'id']);
    $genres = $genres->fetchAll();
    if (!$genres) {
        throw new UnexpectedValueException(ERR);
    }
    //HANDLE FORMS
    //EX 1
    if (isset($_POST['Send1'])) {
        $options = [

            LASTNAME => FILTER_SANITIZE_STRING,
            FIRSTNAME => FILTER_SANITIZE_STRING,
            BIRTHDATE => FILTER_SANITIZE_STRING,
            CARD => FILTER_SANITIZE_NUMBER_INT,
            CARDNUM => FILTER_SANITIZE_NUMBER_INT,
        ];
        $result = filter_input_array(INPUT_POST, $options);
        foreach ($result as $key) {
            $result[$key] = trim($result[$key]);
        }
        $res = $clientsManager->setDatas(CLIENTS, [LASTNAME, FIRSTNAME, BIRTHDATE, CARD, CARDNUM], [$result[FIRSTNAME], $result[LASTNAME], $result[BIRTHDATE], $result[CARD] ? 1 : 0, $result[CARDNUM] ? $result[CARDNUM] : null]);
        if (!$res) {
            throw new UnexpectedValueException(ERR);
        }
    }

    //EX 2
    if (isset($_POST['Send2'])) {
        $options = [

            LASTNAME => FILTER_SANITIZE_STRING,
            FIRSTNAME => FILTER_SANITIZE_STRING,
            BIRTHDATE => FILTER_SANITIZE_STRING,
            CARD => FILTER_SANITIZE_NUMBER_INT,
            CARDNUM => FILTER_SANITIZE_NUMBER_INT,
            CARDTYPE => FILTER_SANITIZE_NUMBER_INT,
        ];
        $result = filter_input_array(INPUT_POST, $options);
        foreach ($result as $key) {
            $result[$key] = trim($result[$key]);
        }

        // Insert client then insert card info
        $res = $clientsManager->setDatas(CLIENTS, [LASTNAME, FIRSTNAME, BIRTHDATE, CARD, CARDNUM], [$result[FIRSTNAME], $result[LASTNAME], $result[BIRTHDATE], $result[CARD] ? 1 : 0, $result[CARDNUM] ? $result[CARDNUM] : null]);
        if (!$res) {
            throw new UnexpectedValueException(ERR);
        }
        if ($result[CARD]) {
            $res = $cardsManager->setDatas('cards', [CARDNUM, 'cardTypesId'], [(int) $result[CARDNUM], (int) $result[CARDTYPE]]);
            if (!$res) {
                throw new UnexpectedValueException(ERR);
            }
        }
    }

    //EX 3
    if (isset($_POST['Send3'])) {
        //sanatize
        $options = [

            TITLE => FILTER_SANITIZE_STRING,
            PERFORMER => FILTER_SANITIZE_STRING,
            DATE => FILTER_SANITIZE_STRING,
            SHOWTYPE => FILTER_SANITIZE_NUMBER_INT,
            FIRSTGENRE => FILTER_SANITIZE_NUMBER_INT,
            SECGENRE => FILTER_SANITIZE_NUMBER_INT,
            DURATION => FILTER_SANITIZE_STRING,
            STARTTIME => FILTER_SANITIZE_STRING
        ];
        $result = filter_input_array(INPUT_POST, $options);
        foreach ($result as $key) {
            $result[$key] = trim($result[$key]);
        }
        //Validate

        // Insert show
        $res = $clientsManager->setDatas('shows', [TITLE, PERFORMER, DATE, SHOWTYPE, FIRSTGENRE, SECGENRE, DURATION, STARTTIME], [$result[TITLE], $result[PERFORMER], $result[DATE], $result[SHOWTYPE], $result[FIRSTGENRE], $result[SECGENRE], $result[DURATION], $result[STARTTIME]]);
        if (!$res) {
            throw new UnexpectedValueException(ERR);
        }
    }

    //EX4
    if (isset($_POST['Send4'])) {
        $options = [

            LASTNAME => FILTER_SANITIZE_STRING,
            FIRSTNAME => FILTER_SANITIZE_STRING,
            BIRTHDATE => FILTER_SANITIZE_STRING,
            CARD => FILTER_SANITIZE_NUMBER_INT,
            CARDNUM => FILTER_SANITIZE_NUMBER_INT,
        ];
        $result = filter_input_array(INPUT_POST, $options);
        foreach ($result as $key) {
            $result[$key] = trim($result[$key]);
        }
        $res = $clientsManager->updateDatas(CLIENTS, [LASTNAME, FIRSTNAME, BIRTHDATE, CARD, CARDNUM], [$result[FIRSTNAME], $result[LASTNAME], $result[BIRTHDATE], $result[CARD] ? 1 : 0, $result[CARDNUM] ? $result[CARDNUM] : null]);
        if (!$res) {
            throw new UnexpectedValueException(ERR);
        }
    }
    require 'view/writeView.php';
}
