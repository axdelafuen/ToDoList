<?php

class FrontControleur {
	function __construct() {
		global $rep,$vues, $actionAdmin, $actionUser; // nécessaire pour utiliser variables globales
		// on démarre ou reprend la session si necessaire (préférez utiliser un modèle pour gérer vos session ou cookies)
		session_start();

		//debut

		//on initialise les tableaux d'erreur et d'annonce
		$dVueEreur = array ();
		
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
	
}//fin class

	
?>
