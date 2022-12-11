<?php

class UserMdl{

    private $conn;
    private $userGw;

    function __construct(){
        global $dsn, $username, $passwordBD;
        $this->conn = new Connection($dsn,$username,$passwordBD);
        $this->userGw = new UserGateway($this->conn);
    }

    function getUserByEmail($email){
        return $this->userGw->getUserByEmail($email);
    }
    
}

?>