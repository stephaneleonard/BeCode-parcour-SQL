<?php
require_once('model/clientsManager.php');


function getReadPage()
{
    $clientsManager = new StephaneLeonard\CRUD\Model\ClientsManager();
    $content = $clientsManager->getClientsDatas();
    require 'view/readView.php';
}

function getWritePage()
{
    echo 'write';
    require 'view/template.php';
}
