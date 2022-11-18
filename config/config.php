<?php 

// Repertoire :

$rep=__DIR__.'/../';

// Variables base de données :

//$dsn='mariadb:host=localhost;dbname='.$dbname;

//$dsn='mysql:host=10.9.0.63;port=3306;dbname='.getenv("MARIADB_DATABASE");
//$dsn='mysql:host=codefirst.iut.uca.fr;port=3306;dbname='.getenv("MARIADB_DATABASE");
//$dsn='https://codefirst.iut.uca.fr:3306/containers/mariadb-axelde_la_fuente';
$dsn='10.9.0.62:3306';
$dbname=getenv("MARIADB_DATABASE");
$username=getenv("MARIADB_USER");
$passwordBD=getenv("MARIADB_PASSWORD");

//$username="root";
//$passwordBD=getenv("MARIADB_ROOT_PASSWORD");

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

require_once('metiers/ToDoList.php');
require_once('metiers/Task.php');
require_once('metiers/User.php');

$todo = array(new TodoList('MyBigToDo',array(new Task(1,1,false,'Faire cuire des pates'),new Task(2,2,true,'Manger du pain')),new User(1,'fred@fred.com','1234'),false) , new TodoList('MyBigToDo2',array(new Task(1,1,false,'Faire cuire du riz'),new Task(2,2,true,'Acheter des chaussettes')),new User(1,'fred@fred.com','1234'),true));

?>