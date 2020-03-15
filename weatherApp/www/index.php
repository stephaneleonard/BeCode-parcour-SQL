<?php
try {
    require_once './controllers/controller.php';
    getPage();
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
