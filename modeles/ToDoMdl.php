<?php

class ToDoMdl{

    private $conn;
    private $ToDoGw;

    function __construct(){
        global $dsn, $username, $passwordBD;
        $this->conn = new Connection($dsn,$username,$passwordBD);
        $this->ToDoGw = new ToDoGateway($this->conn);
    }

    function getAllToDo($userid){
        return $this->ToDoGw->getAllToDoFromUser($userid);    
    }

    function getAllToDoEmail($email){
        return $this->ToDoGw->getAllToDoEmailUser($email);    
    }

    function getFirstToDo($userid){
        if($todo = $this->ToDoGw->getAllToDoFromUser($userid)){
            foreach($todo as $res){
                return $res->id;
            }
        }
        return -1;
    }

     function getLastToDo($userid){
        if($todo = $this->ToDoGw->getAllToDoFromUser($userid)){
            foreach($todo as $res){
                $id =$res->id;
            }
            return $id;
        }
        return -1;
    }

    function addToDo($todo){
        $this->ToDoGw->addToDo($todo);
    }

    function deleteToDo($id){
        $taskMdl = new TaskMdl();
        $taskMdl->deleteTaskFromToDo($id);
        $this->ToDoGw->deleteToDoById($id);
    }

    function updateTitle($id,$title){
        $this->ToDoGw->updateTitle($id,$title);
    }
}

?>