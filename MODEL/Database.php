<?php

class Database{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:dbhost=localhost;dbname=APP_BREUKH", "root", "bachir05");
    }
    public function getPDO()
    {
        return $this->pdo;
    }
}