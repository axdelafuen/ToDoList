<?php

class Admin{
    static public function createTable():bool{
        global $dsn, $username,$passwordBD;
        $conn = new Connection($dsn,$username, $passwordBD);
       
        $requete = "CREATE TABLE User(
            id           numeric,
            email        varchar(100),
            password     varchar(100)
            );";
        
        $res = $conn->query($requete);
       
        return $res;
    }
    
    static public function testTable(){
        global $conn;
        $requete = "INSERT INTO User(id, email, password) VALUES(:id,:email,:password);";
        $conn->executeQuery($requete,array(":id"=>array(1,PDO::PARAM_INT),
                                           ":email"=>array("fred@fred.com",PDO::PARAM_STR),
                                           ":password"=>array("1234",PDO::PARAM_STR)));
        $requete2 = "SELECT * FROM User;";
        $conn->executeQuery($requete2);
        $res = $conn->getResults();
        foreach($res as $val){
            echo $val['email'];
        }
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
}
?>