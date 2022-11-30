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

// variables de test :

require_once('metiers/ToDoList.php');
require_once('metiers/Task.php');
require_once('metiers/User.php');
// global var
$user;
$selectedToDo=0;
// variables de test :
$usr1=new User(1,'Catherine@php.com','4321');
$usr2=new User(1,'fred@fred.com','1234');
$usrAr= array(0=>$usr1,1=>$usr2);

$tsk1=new Task( 1,1,false,'Faire cuire des pates');
$tsk2 = new Task(2,2,true,'Manger du pain');
$tsk5 = new Task(2,2,true,'Manger du pain');
$ar1 = array();
$ar1[]=$tsk1;
$ar1[]=$tsk2;
$ar1[]=$tsk5;

$tsk3=new Task( 3,1,false,'Boire');
$tsk4 = new Task(4,2,false,'Dormir');
$ar2 = array($tsk3,$tsk4);

$todo1=new ToDoList(0,"ToDo1",$ar1,$usrAr,true);
$todo2=new ToDoList(1,"ToDo2",$ar2,$usrAr,true);

$todo = array();
$todo[]=$todo1;
$todo[]=$todo2;
?>