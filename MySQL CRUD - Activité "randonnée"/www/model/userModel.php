<?php

namespace StephaneLeonard\hiking\Model;

require_once("model/Manager.php");

class UserManager extends Manager
{
    public function getUserData($name)
    {
        $db = $this->dbConnect();
        return $db->query("SELECT * FROM user WHERE name = '$name'");
    }

    public function getUserDatas()
    {
        $db = $this->dbConnect();
        return $db->query("SELECT * FROM user");
    }
}
