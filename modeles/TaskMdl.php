<?php

class TaskMdl{

    private $conn;
    private $TaskGw;

    function __construct(){
        global $dsn, $username, $passwordBD;
        $this->conn = new Connection($dsn,$username,$passwordBD);
        $this->TaskGw = new TaskGateway($this->conn);
    }

    function addTask($todoId){
        $this->TaskGw->addTask(new Task(0,0,false,'{New task}') ,$todoId);
    }

    function getAllTask($todoid){
        return $this->TaskGw->getAllTaskFromToDo($todoid);    
    }

    function deleteTaskFromToDo($id){
        $this->TaskGw->deleteTaskFromToDo($id);
    }
    function deleteTaskById($id){
        $this->TaskGw->deleteTaskById($id);
    }
    function updateDoneTask($id,$done){
        $this->TaskGw->updateDoneTaskById($id,$done);
    }
    function updateContentTask($id, $desc){
        $this->TaskGw->updateContentTask($id,$desc);
    }
}
?>