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
        <?php
        if($_SESSION['login']!="Anonymous"){
            echo '<form method="post">
                <input class="disconnect-button" type="submit" value="Edit your account">
                <input type="hidden" name="action" value="editAccount">
            </form>';
        }
        ?>
        <form method="post">
            <input class="disconnect-button" type="submit" value="Disconnect">
            <input type="hidden" name="action" value="déconnexion">
        </form>
    </div>
   </div>

<div class="todo-container">
    <div class="todo">
        <?php
            global $dsn,$username,$passwordBD;

            $userMdl = new UserMdl();
            $todoMdl = new ToDoMdl();
            $todo = $todoMdl->getAllToDo($userMdl->getUserByEmail($_SESSION['login'])['id']);

            $selectedToDo=$_SESSION['selectedToDo'];
            //script display all ToDo
            if($_SESSION['selectedToDo']!=-1){
            echo ('<div class="todo-sidebar">');
            foreach ($todo as $value) {// all todo
                echo('<form method="post">');
                echo ('<input class="todo-title" type="submit" value="'.$value->name.'"> <input type="hidden" name="id" value='.$value->id.'> <input type="hidden" name="action" value="DispToDo">');
                echo('</form>');
            }
            echo ('</div>');
            echo('<form method="post">');
            
            echo ('<div class="todo-content"><input class="todo-titleh2" type="text" name="title'.$todo[$selectedToDo]->id.'" value="'.$todo[$selectedToDo]->name.'" contenteditable="true"/>');

            foreach($todo[$selectedToDo]->tasks as $taskP){// alltasks in the todo selected
                echo('<div class="line">');
                echo('<input type="checkbox" name="isDone'.$taskP->id.'" value="true" ');
                if($taskP->done){
                    echo('checked');
                }
                echo('>');
                if($taskP->done){
                    echo('<input class="task-content done-task" name="desc'.$taskP->id.'" id="tess" value="'.$taskP->description.'"/>');
                }
                else{
                    echo('<input class="task-content" name="desc'.$taskP->id.'" id="tess" value="'.$taskP->description.'"/>');
                }
                echo('</div>');
            }
            echo ('</p></div>');
            }
            ?>


            <input type="hidden" name="idToDo" value=<?=$selectedToDo?>>
            <input class="todo-save material-symbols-outlined" type="submit" value="task_alt">
            <input type="hidden" name="action" value="saveTodo"> 
        </form>
        <form>
            <input type="hidden" name="idToDo" value=<?=$selectedToDo?>>
            <input class="todo-new" type="submit" value="+">
            <input type="hidden" name="action" value="addNewTodo"> 
        </form>
        <form>
            <input type="hidden" name="idToDo" value=<?=$selectedToDo?>>
            <input class="todo-delete material-symbols-outlined" type="submit" value="delete">
            <input type="hidden" name="action" value="deleteTodo"> 
        </form>
 
    </div>
 </div>
<?php
if(isset($todo)){
    echo "
            <form>
                <input type='hidden' name='idToDo' value=$selectedToDo>
                <input class='task-add' type='submit' value='+'>
                <input type='hidden' name='action' value='addTask'> 
            </form> 
        ";
}
?>
</body>
</html>