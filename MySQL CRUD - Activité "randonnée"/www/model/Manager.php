<?php

namespace StephaneLeonard\hiking\Model;

class Manager
{
    protected function dbConnect()
    {
        return new \PDO('mysql:host=db:3306;dbname=docker;charset=utf8', 'docker', 'docker');
    }
}
