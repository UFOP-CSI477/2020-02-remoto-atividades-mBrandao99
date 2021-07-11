<?php

namespace App\Database;

use PDO;

class AdapterSQLite implements AdapterInterface {

    private $pdo;

    public function open() {
        $dbfile = "db/database.sqlite";
        $dbuser = "";
        $dbpassword = "";
        $dbhost = "";

        $strConnection = "sqlite:" . $dbfile;

        $this->pdo = new PDO($strConnection, $dbuser, $dbpassword);
    }

    public function close() {
        $this->pdo = null;

        return true;
    }

    public function get() {
        return $this->pdo;
    }
    
}