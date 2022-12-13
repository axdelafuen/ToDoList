<?php
class TaskGateway
{
	// Attributs
	private $conn;

	// Constructeur
	public function __construct($conn)
	{
		$this->conn = $conn;
	}

	public function getAllTaskFromToDo($todoId){
		$task = array();
		$requete = "SELECT * FROM Task WHERE :todoId=todo";
		if(!$this->conn->executeQuery($requete, array(":todoId"=>array($todoId,PDO::PARAM_INT)))){
			return array();
		}
		$res = $this->conn->getResults();
		foreach($res as $data){
			$task[$data['id']] = new Task($data['id'],$data['priorities'],$data['done'],$data['description']);
		}
		return $task;
	}
	
	public function addTask($task, $todoId):bool{
        
		$requete = "INSERT INTO Task(priorities,done,description,todo) VALUES(:priorities,:done,:description,:todo);";
		return $this->conn->executeQuery($requete,array(":priorities"=>(array($task->priorities,PDO::PARAM_INT)),
														":done"=>(array($task->done,PDO::PARAM_BOOL)),
														":description"=>(array($task->description,PDO::PARAM_STR)),
                                                        ":todo"=>(array($todoId,PDO::PARAM_INT))));
		
        return false;
	}

    public function updateDoneTaskById($id, $done){
        $requete = "UPDATE Task SET done=:done WHERE :id=id";
		$this->conn->executeQuery($requete,array(":done"=>array($done,PDO::PARAM_BOOL),
												 ":id"=>array($id,PDO::PARAM_INT)));
    }
	
	public function updateContentTask($id, $desc){
        $requete = "UPDATE Task SET description=:desc WHERE :id=id";
		$this->conn->executeQuery($requete,array(":desc"=>array($desc,PDO::PARAM_STR),
												 ":id"=>array($id,PDO::PARAM_INT)));
    }
	
	public function deleteTaskFromToDo($todoId){
		$requete = "DELETE FROM Task WHERE :todoId=todo;";
		return $this->conn->executeQuery($requete,array(":todoId"=>array($todoId,PDO::PARAM_INT)));
    }
	
	
	public function deleteTaskById($id){
    	$requete = "DELETE FROM Task WHERE :id=id;";
		return $this->conn->executeQuery($requete,array(":id"=>array($id,PDO::PARAM_INT)));
    }
}
?>