<?php

namespace StephaneLeonard\CRUD\Model;

require_once 'Manager.php';


class ClientsManager extends Manager
{
    public function getClientData($id)
    {
        $db = $this->dbConnect();
        return $db->query("SELECT * FROM user WHERE id = '$id'");
    }

}
