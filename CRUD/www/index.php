<?php
try {
    require_once './controller/controller.php';
    if (isset($_GET['Page'])) {
        if (htmlspecialchars($_GET['Page']) == 'read') {
            getReadPage();
        } else {
            getWritePage();
        }
    } else {
        $name = 'liste randonnée';
        getReadPage();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
