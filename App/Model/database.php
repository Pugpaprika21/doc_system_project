<?php

namespace App\DataBase;

use PDO;
use PDOException;

class DB
{
    private $server;
    private $username;
    private $password;
    private $dbname;

    public function __construct()
    {
        $this->server = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "db_doc";
    }

    public function connect(): PDO
    {
        try {
            $conn = new PDO("mysql:host={$this->server};dbname={$this->dbname}", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
