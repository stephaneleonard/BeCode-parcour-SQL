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

    public function getClientsDatas($condition  = [] , $orderBy = null , $asc = null , $limit = null)
    {
        $firstPart = "SELECT * FROM clients";
        $order = $orderBy ? " ORDER BY $orderBy " : "";
        $sort = $asc ? $asc : "";
        $lim = $limit ? " LIMIT $limit" : "";
        $sql = $firstPart . $order . $sort . $lim;
        $db = $this->dbConnect();
        return $db->query($sql);
    }
}
