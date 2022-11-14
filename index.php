<?php

// Chargement de la config :

require_once(__DIR__.'/config/config.php');

// Autoload :

require_once(__DIR__.'/config/Autoload.php');
Autoload::charger();

// Chargement de la vue : 

$cont = new Controleur();

?>