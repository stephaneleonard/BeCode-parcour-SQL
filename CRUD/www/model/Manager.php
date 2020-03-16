<?php

namespace StephaneLeonard\CRUD\Model;

class Manager
{
    protected function dbConnect()
    {
        return new \PDO('mysql:host=db:3306;dbname=colyseum;charset=utf8', 'root', 'tiger');
    }
}
