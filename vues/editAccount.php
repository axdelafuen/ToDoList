 <!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Accueil | ToDo List</title>
    <!--<base href="https://codefirst.iut.uca.fr/containers/todo_list-axelde_la_fuente/">-->
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/main.css">
    <link rel="stylesheet" type="text/css" href="styles/editAccount.css">
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
    <div class="form-account">
     <form method="post">
        <input class="disconnect-button" type="submit" value="Disconnect">
        <input type="hidden" name="action" value="déconnexion">
    </form>
    <form method="post">
        <input class="disconnect-button" type="submit" value="< Back">
        <input type="hidden" name="action" value="back">
    </form>
    </div>
</div>

<div>
    <h3>Edit your account <?= $_SESSION['login'] ?> </h3>
    <div class="edit-menu">
        <form method="post">
            <div class="edit-form">
                <span class="material-symbols-outlined">warning</span>
                <input class="editAccount" type="submit" value="Change password">
            </div>
            <input type="hidden" name="action" value="ChangePassword">      
        </form>

        <form method="post">
            <div class="edit-form">
                <span class="material-symbols-outlined">warning</span>
                <input class="editAccount" type="submit" value="Delete your account">
            </div>
            <input type="hidden" name="action" value="DeleteAccount">      
        </form>
    </div>
</div>

</body>
</html>

<!--
foreach
    echo
    <input type="submit" value=$nomToDo >
    <input type="hidden" name="idToDo" value=$idToDo >
    <input type="hidden" name="action" value="DispToDo" >
}
-->