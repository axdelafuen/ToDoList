<?php

class Admin{
    static public function createTable(){
        global $dsn, $username,$passwordBD;
        $conn = new Connection($dsn,$username, $passwordBD);
       
        $requete = "CREATE TABLE User(
            id           INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
            email        varchar(100),
            password     varchar(100),
            isadmin      boolean
            );";
        
        $res = $conn->query($requete);
       
        return $res;
    }
 
    static public function getAllUsers(&$res){
        global $dsn,$username,$passwordBD;
        $conn = new Connection($dsn,$username, $passwordBD);
        $requete2 = "SELECT * FROM User;";
        $conn->executeQuery($requete2);
        $res = $conn->getResults();
        /*
        foreach($res as $val){
            echo $val['id']." : ".$val['email']."<br>";
        }
        */
    }
    
    static public function dropUserTable(){
        global $dsn, $username, $passwordBD;
        $conn = new Connection($dsn,$username,$passwordBD);
        $requete = "DROP TABLE User;";
        $conn->executeQuery($requete);
    }
}
?>