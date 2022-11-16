<?php 

// Repertoire :

$rep=__DIR__.'/../';

// Variables base de données :

//$dsn='mariadb:host=localhost;dbname='.$dbname;

$host="https://codefirst.iut.uca.fr/containers/mariadb-axelde_la_fuente";
$dsn='mysql:host=https://codefirst.iut.uca.fr/containers/mariadb-axelde_la_fuente;port=3306;dbname='.getenv("MARIADB_DATABASE");
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

// variables de test :

require_once('modeles/ToDoList.php');
require_once('modeles/Task.php');
require_once('modeles/User.php');

$todo = array(new TodoList('MyBigToDo',array(new Task(1,1,false,'Faire cuire des pates'),new Task(2,2,true,'Manger du pain')),new User(1,'fred@fred.com','1234'),false) , new TodoList('MyBigToDo2',array(new Task(1,1,false,'Faire cuire du riz'),new Task(2,2,true,'Acheter des chaussettes')),new User(1,'fred@fred.com','1234'),true));

?>