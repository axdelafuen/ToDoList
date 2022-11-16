<?php 

// Repertoire :

$rep=__DIR__.'/../';

// Variables base de données :
/*
//$dsn='mariadb:host=localhost;dbname='.$dbname;
$host="https://codefirst.iut.uca.fr/mariadb-axelde_la_fuente";
$dsn='mysql:host='.$host.';dbname='.getenv("MARIADB_DATABASE");
$username=getenv("MARIADB_USER");
$password=getenv("MARIADB_PASSWORD");
*/

$host="localhost";
$dsn='mysql:host='.$host.';dbname=phPull';
$username='axlr';
$passwordBD='1234';

// Vues :

$vues['erreur']='vues/erreur.php';
$vues['login']='vues/login.php';
$vues['test']='vues/test.php';
$vues['main']='vues/main.php';
$vues['register']='vues/register.php';
$vues['admin']='vues/adminPanel.php';

// variables de test :

require_once('modeles/TodoList.php');
require_once('modeles/Task.php');
require_once('modeles/User.php');

$todo = array(new TodoList('MyBigToDo',array(new Task(1,1,false,'Faire cuire des pates'),new Task(2,2,true,'Manger du pain')),new User(1,'fred@fred.com','1234'),false) , new TodoList('MyBigToDo2',array(new Task(1,1,false,'Faire cuire du riz'),new Task(2,2,true,'Acheter des chaussettes')),new User(1,'fred@fred.com','1234'),true));


?>