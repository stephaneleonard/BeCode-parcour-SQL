<?php
session_start();
define('LOGIN', 'login');
define('PWD', 'pwd');
try {
    require_once './controller/controller.php';
    if (isset($_GET['Page'])) {
        if (htmlspecialchars($_GET['Page']) == 'lire') {
            $name = 'liste randonnée';
            getReadPage();
        } elseif (htmlspecialchars($_GET['Page']) == 'ajouter') {
            if (isset($_SESSION[LOGIN]) && isset($_SESSION[PWD])) {
                $name = 'ajouter une  randonnée';
                getCreatePage();
            } else {
                getConnectPage();
            }
        } elseif (htmlspecialchars($_GET['Page']) == 'maj') {
            if (isset($_SESSION[LOGIN]) && isset($_SESSION[PWD])) {
                $name = 'mettre à jour une  randonnée';
                if (isset($_GET['id'])) {
                    getUpdatePage();
                } else {
                    throw new UnexpectedValueException('error getting value from database');
                }
            } else {
                getConnectPage();
            }
        } elseif (htmlspecialchars($_GET['Page']) == 'supprimer') {
            if (isset($_SESSION[LOGIN]) && isset($_SESSION[PWD])) {
                $name = 'supprimer une  randonnée';
                if (isset($_GET['id'])) {
                    getdeletePage();
                } else {
                    throw new UnexpectedValueException('error getting value from database');
                }
            } else {
                getConnectPage();
            }
        } elseif (htmlspecialchars($_GET['Page']) == 'connect') {
            getConnectPage();
        }
    } else {
        $name = 'liste randonnée';
        getReadPage();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
