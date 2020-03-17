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
    $firstClients = $clientsManager->getDatas(CLIENTS,[], [], 'id', 'ASC', 20);
    if (!$firstClients) {
        throw new UnexpectedValueException(ERR);
    }

    //EX4
    $clientsWithCards = $clientsManager->getDatas(CLIENTS,[] ,  ["card = 1"]);
    if (!$clientsWithCards) {
        throw new UnexpectedValueException(ERR);
    }

    //EX5
    $clientsStartWithM = $clientsManager->getDatas(CLIENTS,['firstName' , 'lastName'] ,  ["lastName LIKE 'm%'"]);
    if (!$clientsStartWithM) {
        throw new UnexpectedValueException(ERR);
    }
    require 'view/readView.php';
}

function getWritePage()
{
    require 'view/template.php';
}
