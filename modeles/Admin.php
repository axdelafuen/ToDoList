<?php

class Admin{
    private $conn = new Connection($dsn,'root',getenv("ROOT_PASSWORD"));

    public function createTable():bool{
    
        $requete = "CREATE TABLE User(
            id           numeric PRIMARY_KEY,
            email        varchar(100),
            password     varchar(100)
        );";

        return $this->conn->executeQuery($requete);
              
    }
    
    public function testTable(){
        $requete = "INSERT INTO _User(id, email, password) VALUES(:id,:email,:password);";
        $this->conn->executeQuery($requete,array(":id"=>1,
                                                ":email"=>"fred@fred.com",
                                                ":password"=>"1234"));
        $requete2 = "SELECT * FROM _User;";
        $this->conn->executeQuery($requete2);
        $res = $this->conn->getResults();
        echo($res);
    }
}
?>