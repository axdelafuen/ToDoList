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

require_once('modeles/ToDoList.php');
require_once('modeles/Task.php');
require_once('modeles/User.php');

$usr1=new User(1,'Catherine@php.com','4321');
$usr2=new User(1,'fred@fred.com','1234');

$tsk1=new Task( 1,1,false,'Faire cuire des pates');
$tsk2 = new Task(2,2,true,'Manger du pain');
$ar1 = array(0=>$tsk1,1=>$tsk2);

$tsk3=new Task( 3,1,false,'Boire');
$tsk4 = new Task(4,2,false,'Dormir');
$ar2 = array(0=>$tsk3,1=>$tsk4);

$todo1=new ToDoList("ToDo1",$ar1,$usr1,true);
$todo2=new ToDoList("ToDo2",$ar2,$usr2,true);

$todo = array(0=>$todo1,1=>$todo2);

?>