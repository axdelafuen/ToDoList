<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Accueil | ToDo List</title>
    <!-- <base href="https://codefirst.iut.uca.fr/containers/todo_list-axelde_la_fuente/"> -->
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
        <span>Logged as : <u><?=$_SESSION['login']?></u></span>
    </div>
    <div class="form-account">
     <form method="post">
        <input class="disconnect-button" type="submit" value="Disconnect">
        <input type="hidden" name="action" value="déconnexion">
    </form>
    <?php
        if($_SESSION['login']!="Anonymous"){
            echo '<form method="post">
                <input class="disconnect-button" type="submit" value="Edit your account">
                <input type="hidden" name="action" value="editAccount">
            </form>';
        }
    ?>
    </div>
   </div>

<div class="todo-container">
    <div class="todo">
        <?php
            // global var
            global $todo;
            global $selectedToDo;
            //script display all ToDo
            echo ('<div class="todo-sidebar">');
            foreach ($todo as $value) {// all todo
                echo('<form class="login-form" method="post">');
                echo ('<input class="todo-title" type="submit" value='.$value->name.'> <input type="hidden" name="id" value='.$value->id.'> <input type="hidden" name="action" value="DispToDo">');
                echo('</form>');
            }
            echo ('</div>');
            echo ('<div class="todo-content"><h2 contenteditable="true">'.$todo[$selectedToDo]->name.'</h2>');
            foreach($todo[$selectedToDo]->tasks['tsk'] as $taskP){// alltasks in the todo selected
                echo('<div class="line">');
                echo('<input type="checkbox">');
                echo('<p id="tess" contenteditable="true">'.$taskP->description.'</p>');
                echo('</div>');
            }
            echo ('</p></div>');
        ?>
    </div>
    
</div>
    <div class="todo-container-footer">
        <span class="todo-new">+</span>
    </div>

    <div class="todo-container-footer">
        <span class="todo-save"><span class="material-symbols-outlined">task_alt</span></span>
    </div>

    <div class="todo-container-footer">
        <span class="todo-delete"><span class="material-symbols-outlined">delete</span></span>
    </div>
</body>
</html>