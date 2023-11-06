<?php

namespace App\Core;

use \PDO;

abstract class DAO
{
    protected $connection;

    public function __construct()
    {
        $dsn = "mysql:host=" . $_ENV['db']['host'] . ";dbname=" . $_ENV['db']['database'];

        $this->connection = new PDO($dsn, $_ENV['db']['user'], $_ENV['db']['pass']);
    }
}
