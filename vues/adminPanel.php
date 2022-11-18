 <!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Accueil | ToDo List</title>
    <base href="https://codefirst.iut.uca.fr/containers/todo_list-axelde_la_fuente/">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/main.css">
    <link rel="icon" type="image/x-icon" href="ressources/images/favicon.png" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<body>

<div class="todo-header">
    <div>
        <h1 class="title">
            <span class="material-symbols-outlined">format_list_bulleted</span>ToDo List
        </h1>
    </div>
    <form method="post">
        <input class="disconnect-button" type="submit" value="Se déconnecter">
        <input type="hidden" name="action" value="déconnexion">
    </form>
</div>

<div>
    <h3>Pannel administrateur</h3>

    <form method="post">
        <input class="changePage" type="submit" value="Lancer le script de base de données">

        <input type="hidden" name="action" value="scriptTable">      
      </form>

      <?php
        global $dsn, $username, $passwordBD;
        if (isset($res)) {
          foreach ($res as $value){
            echo $value['id']." : ".$value['email']."<br>";
          }}
      ?>

     <form method="post">
        <input class="changePage" type="submit" value="Rénitialiser les tables">

        <input type="hidden" name="action" value="dropTableUser">      
      </form>

    <?= phpinfo()?>

</div>

</body>
</html>