<?php

class UserControleur {

	function __construct($action) {
		global $rep,$vues; // nécessaire pour utiliser variables globales
		

		//on initialise un tableau d'erreur
		$dVueEreur = array ();

		try{
			if(!isset($action)){
				$action=NULL;
			}
			switch($action) {

			//pas d'action, on r�initialise 1er appel
			case NULL:
				$this->Reinit();
				break;

			case "déconnexion":
				$this->Deconnexion();
				break;
			
			case "editAccount":
				require($rep.$vues['editAccount']);
				break;
				
			case "back":
				require($rep.$vues['main']);
				break;
				
			case "DispToDo":
				$this->displayToDoSelected();
				break;
			case "addNewTodo":
				$this->NewTodo();
				break;
			case "saveTodo":
				$this->saveToDo();
				break;				
			case "deleteTodo":
				$this->deleteToDo();
				break;
			case "addTask":
				$this->addTask();
				break;
			case "deleteTask":
				$this->deleteTask();
				break;
			case "saveContentTask":
				$this->saveContentTask();
				break;
			case "taskChangeState":
				$this->taskChangeState();
				break;
			case "changePrivacy":
				$this->changePrivacy();
				break;
			//mauvaise action
			default:
				$dVueEreur[] =	"Erreur d'appel php";
				require ($rep.$vues['main']);
				break;
			}

		}catch (PDOException $e)
		{
			//si erreur BD, pas le cas ici
			$dVueEreur[] =	"Erreur inattendue!!! ";
			require ($rep.$vues['erreur']);
		}
		catch (Exception $e2)
		{
			$dVueEreur[] =	"Erreur inattendue!!! ";
			require ($rep.$vues['erreur']);
		}

		//fin
		exit(0);
	}//fin constructeur


	function Reinit() {
		global $rep,$vues; // nécessaire pour utiliser variables globales
		require ($rep.$vues['login']);
	}
		function Deconnexion(){
		global $rep,$vues;
		$email="";
		$password="";
		session_unset();
		session_destroy();
		require($rep.$vues['login']);	
    }
	
	function displayToDoSelected(){
		$id=$_POST['id']; 
		global $rep,$vues,$user;
		$_SESSION['selectedToDo'] = $id;
		require($rep.$vues['main']);
	}
	function NewTodo(){
		global $rep,$vues;
		$userMdl = new UserMdl();
		$user = $userMdl->getUserByEmail($_SESSION['login']);
		$todoMdl = new ToDoMdl();
		$todoMdl->addToDo(new ToDoList(0,'{New ToDoList}', array(),$user,false));
		$_SESSION['selectedToDo'] = $todoMdl->getLastToDo($user['id']);
		require($rep.$vues['main']);
	}
	function saveToDo(){
		global $rep,$vues;
		$taskMdl = new TaskMdl();
		$todoMdl = new ToDoMdl();
		$todo = $todoMdl->getAllToDoEmail($_SESSION['login']);

		$todoMdl->updateTitle($_SESSION['selectedToDo'],$_POST['title'.$_SESSION['selectedToDo']]);

		require($rep.$vues['main']);
	}

	function taskChangeState(){
		global $rep, $vues;
		$taskMdl = new TaskMdl();
		if(isset($_POST['idTask'])){
			if(isset($_POST['isDone'])){
				$taskMdl->updateDoneTask($_POST['idTask'],true);
			}
			else{
				$taskMdl->updateDoneTask($_POST['idTask'],false);
			}
		}
		require($rep.$vues['main']);
	}

	function deleteToDo(){
		global $rep,$vues;
		if($_SESSION['selectedToDo']==-1){
			require($rep.$vues['main']);
			return;
		}
		$todoMdl = new ToDoMdl();
		$todoMdl->deleteToDo($_SESSION['selectedToDo']);
		$userMdl = new UserMdl();
		$_SESSION['selectedToDo']=$todoMdl->getFirstToDo($userMdl->getUserByEmail($_SESSION['login'])['id']);
		require($rep.$vues['main']);
	}


	function addTask(){
		global $rep,$vues;
		if($_SESSION['selectedToDo']==-1){
			require($rep.$vues['main']);
			return;
		}
		$taskMdl = new TaskMdl();
		$taskMdl->addTask($_SESSION['selectedToDo']);
		require($rep.$vues['main']);
	}

	function deleteTask(){
		global $rep, $vues;
		$taskMdl = new TaskMdl();
		if(isset($_POST['idTask'])){
			$taskMdl->deleteTaskById($_POST['idTask']);
		}
		require($rep.$vues['main']);
	}

	function saveContentTask(){
		global $rep, $vues;
		$taskMdl = new TaskMdl();
		if(isset($_POST['idTask'])){
			$taskMdl->updateContentTask($_POST['idTask'],$_POST['desc'.$_POST['idTask']]);
		}
		require($rep.$vues['main']);
	}

	function changePrivacy(){
		global $rep, $vues;
		$todoMdl = new ToDoMdl();
		if(isset($_POST['idToDo'])){ 
			if(isset($_POST['isPrivate'])){
				$todoMdl->changePrivacy($_POST['idToDo'],false);
			}
			else{
				$todoMdl->changePrivacy($_POST['idToDo'],true);
			}
		}
		require($rep.$vues['main']);
	}

}//fin class
?>
