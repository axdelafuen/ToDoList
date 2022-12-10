<?php
class ToDoGateway
{
	// Attributs
	private $conn;

	// Constructeur
	public function __construct($conn)
	{
		$this->conn = $conn;
	}

	public function getToDoById($id){
        
		$todos=array();
		$requete = "SELECT * FROM ToDo WHERE :id=id;";
		if(!$this->conn->executeQuery($requete,array(":id"=>array($id,PDO::PARAM_INT)))){
			return $todos;
		}
			
		$res=$this->conn->getResults();
		foreach($res as $data){
            $todos[]=$data;
		}
		return $todos;
		
	}
	
	public function addToDo($todo):bool{
        /*
		$requete = "INSERT INTO User(email, password, isadmin) VALUES(:email,:password, :admin);";
		return $this->conn->executeQuery($requete,array(":email"=>(array($email,PDO::PARAM_STR)),
														":password"=>(array($password,PDO::PARAM_STR)),
														":admin"=>(array(false,PDO::PARAM_BOOL))));
		*/
        return false;
	}

    public function updateToDoById($id){
        
    }
	
	public function deleteToDoById($id){
        /*
		$requete = "DELETE * FROM User;";
		return $this->conn->executeQuery($requete);
        */
	}
}
?>
