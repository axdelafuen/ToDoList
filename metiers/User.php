<?php

class User{
    public int $id;
    public string $email;
    public string $password;
    public bool $isAdmin;
    
    function __construct($id, $email, $password, $isAdmin){
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->isAdmin = $isAdmin;  
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function getPassword(){
        return $this->password;
    }
    
    public function isAdmin(){
        return $this->isAdmin;
    }
}

?>