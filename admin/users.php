<?php

use Couchbase\User;
require_once 'Model.php';
class Users extends Model {
    public function select_special($per,$page)
    {
        $startAt=$per*($page-1);
        return $this->conn->query('SELECT * FROM `users` LIMIT '.$startAt.','.$per);
    }
    public function select_count(){
        return $this->conn->query('SELECT Count(*) as total FROM `users`')->fetch();
    }

}