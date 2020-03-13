<?php

namespace StephaneLeonard\WeatherApp\Model;

class Manager
{
    protected function dbConnect()
    {
        return new \PDO('mysql:host=db:3306;dbname=weatherApp;charset=utf8', 'docker', 'docker');
    }
}
