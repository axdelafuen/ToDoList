<?php 

// Repertoire :

$rep=__DIR__.'/../';

// Variables base de données :

//$dsn='mariadb:host=localhost;dbname='.$dbname;
$host="https://codefirst.iut.uca.fr/containers/mariadb-axelde_la_fuente";
$dsn='mysql:host='.$host.';dbname='.getenv("MARIADB_DATABASE");
$username=getenv("MARIADB_USER");
$password=getenv("MARIADB_PASSWORD");

// Vues :

$vues['erreur']='vues/erreur.php';
$vues['login']='vues/login.php';
$vues['test']='vues/test.php';
$vues['main']='vues/main.php';
$vues['register']='vues/register.php';
$vues['admin']='vues/adminPanel.php';

?>