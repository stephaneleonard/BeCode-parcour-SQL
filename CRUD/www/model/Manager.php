<?php

namespace StephaneLeonard\CRUD\Model;

class Manager
{
    protected function dbConnect()
    {
        return new \PDO('mysql:host=db:3306;dbname=colyseum;charset=utf8', 'root', 'password');
    }
    public function getDatas($table, $variable = [], $condition  = [], $orderBy = null, $asc = null, $limit = null)
    {
        if (empty($variable)) {
            $var = "*";
        } else {
            $var = "";
            foreach ($variable as $key => $value) {
                if ($key == count($variable)-1) {
                    $var = $var . $value;
                } else {
                    $var = $var . $value . ", ";
                }
            }
        }
        $firstPart = "SELECT $var";
        $table = " FROM $table";
        $cond = "";
        if (!empty($condition)) {
            $cond = $cond . " WHERE ";
        }
        foreach ($condition as $value) {
            $cond = $cond . $value;
        }
        $order = $orderBy ? " ORDER BY $orderBy " : "";
        $sort = $asc ? $asc : "";
        $lim = $limit ? " LIMIT $limit" : "";
        $sql = $firstPart . $table . $cond . $order . $sort . $lim;
        var_dump($sql);
        $db = $this->dbConnect();
        return $db->query($sql);
    }
}
