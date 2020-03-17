<?php
require_once('model/clientsManager.php');
require_once('model/showsManager.php');
define('CLIENTS', 'clients');
define('ERR', 'getting data from database');


function getReadPage()
{
    //EX 1
    $clientsManager = new StephaneLeonard\CRUD\Model\ClientsManager();
    $clients = $clientsManager->getDatas(CLIENTS);
    if (!$clients) {
        throw new UnexpectedValueException(ERR);
    }

    //EX2
    $showManager = new StephaneLeonard\CRUD\Model\ShowManager();
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
    $clientsStartWithM = $clientsManager->getDatas(CLIENTS, ['firstName', 'lastName'],  ["lastName LIKE 'm%'"]);
    if (!$clientsStartWithM) {
        throw new UnexpectedValueException(ERR);
    }

    //EX6
    $sortedShow = $showManager->getDatas('shows', ['title', 'performer', 'date', 'startTime'], [], 'title', 'ASC');
    if (!$sortedShow) {
        throw new UnexpectedValueException(ERR);
    }


    //EX7
    $clientsA = $clientsManager->getDatas('clients');
    if (!$clientsA) {
        throw new UnexpectedValueException(ERR);
    }
    require 'view/readView.php';
}

function getWritePage()
{
    //EX 1
    if(isset($_POST['Send1'])){
        $options = [

            'lastName' => FILTER_SANITIZE_STRING,
            'firstName' => FILTER_SANITIZE_STRING,
            'birthDate' => FILTER_SANITIZE_STRING,
            'card' => FILTER_SANITIZE_NUMBER_INT,
            'cardNum' => FILTER_SANITIZE_NUMBER_INT,
        ];
        $result = filter_input_array(INPUT_POST, $options);
        foreach ($result as $key) {
            $result[$key] = trim($result[$key]);
        }
        $res = $clientManager->setClientDatas($result['lastName'], $result['firstName'], $result['birthDate'], $result['card'], $result['cardNum']);
        if (!$res) {
            throw new UnexpectedValueException('error in inserting to database');
        }
    }
    require 'view/writeView.php';
}
