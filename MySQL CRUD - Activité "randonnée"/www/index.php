<?php
try {
    require_once './controller/controller.php';
    if (isset($_GET['Page'])) {
        if (htmlspecialchars($_GET['Page']) == 'lire') {
            $name = 'liste randonnée';
            getReadPage();
        } elseif (htmlspecialchars($_GET['Page']) == 'ajouter') {
            $name = 'ajouter une  randonnée';
            getCreatePage();
        } elseif (htmlspecialchars($_GET['Page']) == 'maj') {
            $name = 'mettre à jour une  randonnée';
            getUpdatePage();
        } elseif (htmlspecialchars($_GET['Page']) == 'supprimer') {
            $name = 'supprimer une  randonnée';
            echo 'supprmier';
        }
    } else {
        $name = 'liste randonnée';
        getReadPage();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
