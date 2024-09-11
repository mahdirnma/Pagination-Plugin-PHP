<?php
class connection {
    public $dbserver = "localhost";
    public $dbname = "php_users";
    public $username = "root";
    public $password = "";
    function connected()
    {
        $pdo=new PDO("mysql:host=$this->dbserver;dbname=$this->dbname", $this->username, $this->password);
        $pdo->exec("set names utf8mb4");
        return $pdo;
    }
}
