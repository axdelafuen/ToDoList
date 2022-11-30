<?php

class FrontControleur {

	function __construct() {
		global $rep,$vues; // nécessaire pour utiliser variables globales
		// on démarre ou reprend la session si necessaire (préférez utiliser un modèle pour gérer vos session ou cookies)
		session_start();

		//debut

		//on initialise un tableau d'erreur
		$dVueEreur = array ();

		try{
			if(isset($_REQUEST['action'])){
				$action=$_REQUEST['action'];
			}
			else{
				$action=NULL;
			}

			switch($action) {

			//pas d'action, on r�initialise 1er appel
			case NULL:
				$this->Reinit();
				break;

			case "validationLogin":
				$this->ValidationFormulaireLogin($dVueEreur);
				break;
			
			case "validationRegister":
				$this->ValidationFormulaireRegister($dVueEreur);
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

		}catch (PDOException $e)
		{
			//si erreur BD, pas le cas ici
			$dVueEreur[] =	"Erreur PDO inattendue!!! ";
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

	function ValidationFormulaireRegister(array $dVueEreur) {
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
				require ($rep.$vues['registerValide']);
			}
		}
	}
	
	function ValidationFormulaireLogin(array $dVueEreur) {
		global $rep,$vues;

		//si exception, ca remonte !!!
		$email=$_POST['email']; 
		$password=$_POST['password'];
		Validation::val_formLog($email, $password, $dVueEreur);
		
		if(isset($dVueEreur['password']) || isset($dVueEreur['email'])){
			require($rep.$vues['login']);
		}
		else{
			Validation::val_user($email,$password,$dVueEreur);

			if(isset($dVueEreur['password']) || isset($dVueEreur['email'])){
				if($dVueEreur['email']==="admin" || $dVueEreur['password']==='admin'){
					$control = new AdminControleur();
					require($rep.$vues['admin']);
				}
				else{
					require($rep.$vues['login']);
				}
			}
			else{
				$control = new AdminControleur();
				require ($rep.$vues['main']);
			}
		}
	}
	
	function logAno(){
		global $rep, $vues;
		$email='Anonymous';
		require($rep.$vues['main']);
	}

}//fin class

?>
