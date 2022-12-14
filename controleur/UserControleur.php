<?php

class UserControleur {

	function __construct($action) {
		global $rep,$vues; // nécessaire pour utiliser variables globales
		

		//on initialise un tableau d'erreur
		$dVueEreur = array ();
		$dVueAnnonce = array ();

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
					
			case "validationLogin":
				$this->ValidationFormulaireLogin($dVueEreur);
				break;
			
			case "validationRegister":
				$this->ValidationFormulaireRegister($dVueEreur, $dVueAnnonce);
				break;
			
			case "goRegister":
				require($rep.$vues['register']);
				break;				
			
			case "goLogin":
				require($rep.$vues['login']);
				break;
								
			case "logAno":
				$this->LogAno();
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
		$this->reinitView();
	}
	function NewTodo(){
		$userMdl = new UserMdl();
		$user = $userMdl->getUserByEmail($_SESSION['login']);
		$todoMdl = new ToDoMdl();
		$todoMdl->addToDo(new ToDoList(0,'{New ToDoList}', array(),$user,false));
		$_SESSION['selectedToDo'] = $todoMdl->getLastToDo($user['id']);
		$this->reinitView();
	}
	function saveToDo(){
		$todoMdl = new ToDoMdl();
		$todo = $todoMdl->getAllToDoEmail($_SESSION['login']);
		$todoMdl->updateTitle($_SESSION['selectedToDo'],$_POST['title'.$_SESSION['selectedToDo']]);
		$this->reinitView();
}

	function taskChangeState(){
		$taskMdl = new TaskMdl();
		if(isset($_POST['idTask'])){
			if(isset($_POST['isDone'])){
				$taskMdl->updateDoneTask($_POST['idTask'],true);
			}
			else{
				$taskMdl->updateDoneTask($_POST['idTask'],false);
			}
		}
		$this->reinitView();
	}

		function ValidationFormulaireRegister(array $dVueEreur, array $dVueAnnonce){
		global $rep,$vues;

		//si exception, ca remonte !!!
		if(!isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['passwordConfirm'])){
			$dVueEreur['email'] = 'Bad form value !';
			require($rep.$vues['login']);
		}
		$email=$_POST['email']; 
		$password=$_POST['password'];
		$passwordConfirm=$_POST['passwordConfirm'];
		Validation::val_formReg($email, $password, $passwordConfirm ,$dVueEreur);
		
		if(isset($dVueEreur['password']) || isset($dVueEreur['email'])){
			require($rep.$vues['register']);
		}
		else{
			Validation::val_userRegister($email,$password, $dVueEreur);
			if(isset($dVueEreur['password']) || isset($dVueEreur['email'])){
				require ($rep.$vues['register']);
			}
			else{
				$dVueAnnonce[] = 'You\'re now register, you can login !';
				require ($rep.$vues['login']);
			}
		}
	}
	
	// CLASS MODEL
	function ValidationFormulaireLogin(array $dVueEreur) {
		global $rep,$vues, $dsn, $username, $passwordBD;

		if(!isset($_POST['email']) || !isset($_POST['password'])){
			$dVueEreur['email'] = 'Bad form value !';
			require($rep.$vues['login']);
		}
		//si exception, ca remonte !!!
		$email=$_POST['email']; 
		$password=$_POST['password'];
		Validation::val_formLog($email, $password, $dVueEreur);//nettoyage var
		
		if(isset($dVueEreur['password']) || isset($dVueEreur['email'])){
			require($rep.$vues['login']);// si tab err non nul affichage err
		}
		else{
			Validation::val_user($email,$password,$dVueEreur);//verif existence user

			if(isset($dVueEreur['password']) || isset($dVueEreur['email'])){
				require($rep.$vues['login']);
			}
			else{
				if(Validation::isAdmin($email)){ //verif user est un admin
					$_SESSION['role'] = 'admin';
					$_SESSION['login']=$email;
					require($rep.$vues['admin']);
				}
				else{
					$_SESSION['role'] = 'user';
					$_SESSION['login']=$email;
					$userMdl = new UserMdl();
					$userid = $userMdl->getUserByEmail($email)['id'];
					$todoMdl = new ToDoMdl();
					$_SESSION['selectedToDo']=$todoMdl->getFirstToDo($userid);
					$this->reinitView();
				}
			}
		}
	}
			
	function logAno(){
		$_SESSION['role'] = 'ano';
		$_SESSION['login']="Anonymous";
		$_SESSION['selectedToDo']=-1;		
		$this->reinitView();
	}


	
	function deleteToDo(){
		if($_SESSION['selectedToDo']==-1){
			require($rep.$vues['main']);
			return;
		}
		$todoMdl = new ToDoMdl();
		$todoMdl->deleteToDo($_SESSION['selectedToDo']);
		$userMdl = new UserMdl();
		$_SESSION['selectedToDo']=$todoMdl->getFirstToDo($userMdl->getUserByEmail($_SESSION['login'])['id']);
		$this->reinitView();
	}


	function addTask(){
		if($_SESSION['selectedToDo']==-1){
			require($rep.$vues['main']);
			return;
		}
		$taskMdl = new TaskMdl();
		$taskMdl->addTask($_SESSION['selectedToDo']);
		$this->reinitView();
	}

	function deleteTask(){
		$taskMdl = new TaskMdl();
		if(isset($_POST['idTask'])){
			$taskMdl->deleteTaskById($_POST['idTask']);
		}
		$this->reinitView();
	}

	function saveContentTask(){
		$taskMdl = new TaskMdl();
		if(isset($_POST['idTask'])){
			$taskMdl->updateContentTask($_POST['idTask'],$_POST['desc'.$_POST['idTask']]);
		}
		$this->reinitView();
	}

	function changePrivacy(){
		$todoMdl = new ToDoMdl();
		if(isset($_POST['idToDo'])){ 
			if(isset($_POST['isPrivate'])){
				$todoMdl->changePrivacy($_POST['idToDo'],false);
			}
			else{
				$todoMdl->changePrivacy($_POST['idToDo'],true);
			}
		}
		$this->reinitView();
	}

	function reinitView(){
		global $rep, $vues;
		$userMdl = new UserMdl();
        $todoMdl = new ToDoMdl();
        
		$todoPrivee = $todoMdl->getAllToDo($userMdl->getUserByEmail($_SESSION['login'])['id']);
		$todoPublic = $todoMdl->getOtherToDoPublic($_SESSION['login']);
		$todo = $todoMdl->getEveryToDo();

        $selectedToDo=$_SESSION['selectedToDo'];

		require($rep.$vues['main']);
	}
}//fin class
?>
