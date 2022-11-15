<?php

class Admin{
    static public function createTable():bool{
        global $dsn;
        Debug::log("createTable -> entré");
        
        try {
            $conn = new Connection($dsn,'root',getenv("MARIADB_ROOT_PASSWORD")); 
        } catch (Exception $e) {
            echo "ERREUR:<br/>".$e->getMessage();
        }
        
        Debug::log("createTable -> connection créé");
        $requete = "CREATE TABLE User(
            id           numeric PRIMARY_KEY,
            email        varchar(100),
            password     varchar(100)
        );";
        Debug::log("createTable -> requete créé");

        $res = $conn->executeQuery($requete);

        Debug::log("createTable -> requete exécuté");
        
        return $res;
    }
    
    static public function testTable(){
        global $dsn;
        $conn = new Connection($dsn,'root',getenv("MARIADB_ROOT_PASSWORD"));         
        $requete = "INSERT INTO _User(id, email, password) VALUES(:id,:email,:password);";
        $conn->executeQuery($requete,array(":id"=>1,
                                           ":email"=>"fred@fred.com",
                                           ":password"=>"1234"));
        $requete2 = "SELECT * FROM _User;";
        $conn->executeQuery($requete2);
        $res = $conn->getResults();
        echo($res);
    }
}
?>