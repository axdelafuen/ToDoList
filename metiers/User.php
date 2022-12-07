<?php

class User{
    private int $id;
    private string $email;
    private string $password;
    private bool $isAdmin;
    
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