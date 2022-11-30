<?php

class AdminControleur {

	function __construct() {
		global $rep,$vues; // nécessaire pour utiliser variables globales

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
		
			case "back":
				//require($rep.$vues['main']);
				break;
				
			// action admin 
				
			case "scriptTable":
				$this->adminPanel();
				break;
				
			case "dropTableUser":
				$this->adminDrop();
				break;
				
			case "CreateTableUser":
				$this->adminCreate();
				break;
							
			//mauvaise action
			default:
				$dVueEreur[] =	"Erreur d'appel php";
				require ($rep.$vues['admin']);
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
	
	function adminPanel(){
		global $rep, $vues;
		try{
			$res = array();
			Admin::getAllUsers($res);
        }catch(Exception $e){
          		$dVueEreur[] = "ERREUR:<br/>".$e->getMessage();
           		require($rep.$vues['erreur']);
		}
		require($rep.$vues['admin']);
	}
	
	function adminDrop(){
		global $rep, $vues;
		try{
			Admin::dropUserTable();
		}catch(Exception $e){
			$dVueEreur[] = "ERREUR:<br/>".$e->getMessage();
           	require($rep.$vues['erreur']);
		}
		require($rep.$vues['admin']);
	}
	
	function adminCreate(){
		global $rep, $vues;
		try{
			Admin::createTable();
		}catch(Exception $e){
			$dVueEreur[] = "ERREUR:<br/>".$e->getMessage();
           	require($rep.$vues['erreur']);
		}
		require($rep.$vues['admin']);
	}
	
	function Deconnexion(){
		global $rep,$vues;
		$email="";
		$password="";
		require($rep.$vues['login']);	
	}

}//fin class

?>
