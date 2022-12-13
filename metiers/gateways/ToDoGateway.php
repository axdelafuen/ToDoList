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

	public function getEveryToDo(){
        $taskMdl = new TaskMdl();
		$todo = array();
		$requete = "SELECT * FROM ToDo";
		if(!$this->conn->executeQuery($requete)){
			return array();
		}
		$res = $this->conn->getResults();
		foreach($res as $data){
			$todo[$data['id']] = new TodoList($data['id'],$data['name'],$taskMdl->getAllTask($data['id']),$data['user'],$data['visibility']);
		}
		return $todo;
	}


	public function getAllToDoFromUser($userId){
        $taskMdl = new TaskMdl();
		$todo = array();
		$requete = "SELECT * FROM ToDo WHERE :userid=user";
		if(!$this->conn->executeQuery($requete, array(":userid"=>array($userId,PDO::PARAM_INT)))){
			return array();
		}
		$res = $this->conn->getResults();
		foreach($res as $data){
			$todo[$data['id']] = new TodoList($data['id'],$data['name'],$taskMdl->getAllTask($data['id']),$data['user'],$data['visibility']);
		}
		return $todo;
	}

	public function getAllToDoEmailUser($email){
        $taskMdl = new TaskMdl();
		$todo = array();
		$requete = "SELECT t.* FROM ToDo AS t INNER JOIN User AS u ON t.user=u.id AND :email=u.email";
		if(!$this->conn->executeQuery($requete, array(":email"=>array($email,PDO::PARAM_STR)))){
			return array();
		}
		$res = $this->conn->getResults();
		foreach($res as $data){
			$todo[$data['id']] = new TodoList($data['id'],$data['name'],$taskMdl->getAllTask($data['id']),$data['user'],$data['visibility']);
		}
		return $todo;
	}
	
	public function getOtherToDoPublic($email){
        $taskMdl = new TaskMdl();
		$todo = array();
		$requete = "SELECT t.* FROM ToDo AS t INNER JOIN User AS u ON t.user=u.id AND :email!=u.email AND t.visibility=true";
		if(!$this->conn->executeQuery($requete, array(":email"=>array($email,PDO::PARAM_STR)))){
			return array();
		}
		$res = $this->conn->getResults();
		foreach($res as $data){
			$todo[$data['id']] = new TodoList($data['id'],$data['name'],$taskMdl->getAllTask($data['id']),$data['user'],$data['visibility']);
		}
		return $todo;
	}

	public function getToDoById($id){
        $taskMdl = new TaskMdl();
		$todos=array();
		$requete = "SELECT * FROM ToDo WHERE :id=id;";
		if(!$this->conn->executeQuery($requete,array(":id"=>array($id,PDO::PARAM_INT)))){
			return $todos;
		}
			
		$res=$this->conn->getResults();
		foreach($res as $data){
			$todo[$data['id']] = new TodoList($data['id'],$data['name'],$taskMdl->getAllTask($data['id']) ,$data['user'],$data['visibility']);
		}
		return $todos;
		
	}
	
	public function addToDo($todo):bool{
        
		$requete = "INSERT INTO ToDo(name, visibility, user) VALUES(:name ,:visibility,:user);";
		if(!$this->conn->executeQuery($requete,array(":name"=>(array($todo->name,PDO::PARAM_STR)),
														":visibility"=>(array($todo->visibility,PDO::PARAM_BOOL)),
														":user"=>(array($todo->user['id'],PDO::PARAM_INT))))
		){return false;}
        return true;
	}

    public function updateTitle($id,$title){
		$requete = "UPDATE ToDo SET name=:title WHERE id=:id";
		$this->conn->executeQuery($requete,array(":id"=>array($id,PDO::PARAM_INT),
												 ":title"=>array($title,PDO::PARAM_STR)));        
    }

	public function changePrivacy($id,$visibility){
		$requete = "UPDATE ToDo SET visibility=:visibility WHERE id=:id";
		$this->conn->executeQuery($requete,array(":id"=>array($id,PDO::PARAM_INT),
												 ":visibility"=>array($visibility,PDO::PARAM_BOOL)));        
    }
	
	public function deleteToDoById($id){
        
		$requete = "DELETE FROM ToDo WHERE :id=id;";
		return $this->conn->executeQuery($requete,array(":id"=>array($id,PDO::PARAM_INT)));
        
	}
}
?>
