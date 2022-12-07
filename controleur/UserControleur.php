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
			case "changeDone":
				$this->ChangeExecutedTask();
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
	function ChangeExecutedTask(){
		$id=$_POST['idTask']; 
		global $rep,$vues,$user,$test;
		$test = $id;
		require($rep.$vues['main']);
	}
	function NewTodo(){
		global $rep,$vues,$user;
		// appel gw -> create empty todo
		require($rep.$vues['main']);
	}
	function saveToDo(){
		$id=$_POST['idToDo']; 
		global $rep,$vues,$user;
		// appel gw -> save
		require($rep.$vues['main']);
	}
	function deleteToDo(){
		$id=$_POST['idToDo']; 
		global $rep,$vues,$user;
		// appel gw -> delete
		require($rep.$vues['main']);
	}
}//fin class
?>
