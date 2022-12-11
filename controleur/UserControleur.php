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
		foreach($todo[$_SESSION['selectedToDo']]->tasks as $val){ // récuperer les valeurs des checkbox
			if(isset($_POST['isDone'.$val->id])){
				$taskMdl->updateDoneTask($val->id,true);
			}
			else{
				$taskMdl->updateDoneTask($val->id,false);
			}
		}
		$todoMdl->updateTitle($_SESSION['selectedToDo'],$_POST['title'.$_SESSION['selectedToDo']]);
		foreach($todo[$_SESSION['selectedToDo']]->tasks as $val){ // récuperer les valeurs des checkbox
			$taskMdl->updateContentTask($val->id,$_POST['desc'.$val->id]);
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
}//fin class
?>
