<?php

class FrontControleur {
	function __construct() {
		global $rep,$vues, $actionAdmin, $actionUser; // nécessaire pour utiliser variables globales
		// on démarre ou reprend la session si necessaire (préférez utiliser un modèle pour gérer vos session ou cookies)
		session_start();

		//debut

		//on initialise les tableaux d'erreur et d'annonce
		$dVueEreur = array ();
		$dVueAnnonce = array ();
		
		try{
			if(isset($_REQUEST['action'])){
				$action=$_REQUEST['action'];
			}
			else{
				$action=NULL;
			}
			if(in_array($action,$actionAdmin)){
				new AdminControleur($action);
			}
			else if(in_array($action, $actionUser)){
				new UserControleur($action);
			}
			else{

				switch($action) {

					//pas d'action, on r�initialise 1er appel
					case NULL:
						$this->Reinit();
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
				
					//mauvaise action
					default:
						$dVueEreur[] =	"Erreur d'appel php";
						require ($rep.$vues['login']);
						break;
				}
			}
		}
		catch (PDOException $e){
			//si erreur BD, pas le cas ici
			$dVueEreur[] =	"Erreur inattendue!!! ";
			require ($rep.$vues['erreur']);
		}
		catch (Exception $e2){
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
	
	// CLASS MODEL
	function ValidationFormulaireRegister(array $dVueEreur, array $dVueAnnonce){
		global $rep,$vues;

		//si exception, ca remonte !!!
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
					require ($rep.$vues['main']);
				}
			}
		}
	}
			
	function logAno(){
		global $rep, $vues,$user;
		$_SESSION['role'] = 'ano';
		$_SESSION['login']="Anonymous";
		$_SESSION['selectedToDo']=-1;		
		require($rep.$vues['main']);
	}

}//fin class

	
?>
