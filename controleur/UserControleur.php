<?php

class UserControleur {

	function __construct() {
		global $rep,$vues; // nécessaire pour utiliser variables globales
		
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

			case "déconnexion":
				$this->Deconnexion();
				break;
			
			case "editAccount":
				require($rep.$vues['editAccount']);
				break;
				
			case "back":
				//require($rep.$vues['main']);
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
		require($rep.$vues['login']);	
    }
	
}//fin class

?>
