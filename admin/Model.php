<?php
require_once '../connection.php';
abstract class Model extends connection{
    public $tableName;
    public $conn;
    public function __construct($tableName)
    {
        $this->tableName = $tableName;
        $this->conn=$this->connected();
    }
    public function select()
    {
        return $this->conn->query("SELECT * FROM $this->tableName");
    }
}