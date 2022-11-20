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
        <span>Logged as : <u><?= $email?></u></span>
    </div>
    <form method="post">
        <input class="disconnect-button" type="submit" value="Se déconnecter">
        <input type="hidden" name="action" value="déconnexion">
    </form>
</div>

<div class="todo-container">
    <div class="todo">
        <?php
            // global var
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

            $todo1=new ToDoList("ToDo1",$ar1,$usrAr,true);
            $todo2=new ToDoList("ToDo2",$ar2,$usrAr,true);

            $todo = array();
            $todo[]=$todo1;
            $todo[]=$todo2;

            //script display all ToDo
            // add the form
            echo ('<div class="todo-sidebar">');
            foreach ($todo as $value) {
                echo ('<span>'.$value->name.'</span>');
            }
            echo ('</div>');
            $selectedToDo=$todo[0];
            echo ('<div class="todo-content"><h2 contenteditable="true">'.$selectedToDo->name.'</h2> <p contenteditable="true">');
            foreach($selectedToDo->tasks['tsk'] as $taskP){
                echo ('<p contenteditable="true">'.$taskP->description.'</p>');
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