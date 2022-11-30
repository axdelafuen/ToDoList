<?php 

// Repertoire :

$rep=__DIR__.'/../';

// Variables base de données :

$dsn='mysql:host='.getenv("DB_SERVER").';dbname='.getenv("MARIADB_DATABASE");
$dbname=getenv("MARIADB_DATABASE");
$username=getenv("MARIADB_USER");
$passwordBD=getenv("MARIADB_PASSWORD");


/*
$host="localhost";
$dsn='mysql:host='.$host.';dbname=phPull';
$username='axlr';
$passwordBD='1234';
*/
// Vues :

$vues['erreur']='vues/erreur.php';
$vues['login']='vues/login.php';
$vues['test']='vues/test.php';
$vues['main']='vues/main.php';
$vues['register']='vues/register.php';
$vues['admin']='vues/adminPanel.php';
$vues['editAccount']='vues/editAccount.php';
$vues['registerValide']='vues/registerValide.php';


require_once('metiers/ToDoList.php');
require_once('metiers/Task.php');
require_once('metiers/User.php');

?>