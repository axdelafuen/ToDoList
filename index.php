<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Log In | ToDoList</title>
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/login.css">
  <link rel="icon" type="image/x-icon" href="ressources/images/favicon.png" >
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<body>
  <div class="login-page">
    <h1 class="title">
      <span class="material-symbols-outlined">format_list_bulleted</span>ToDo List
    </h1>
    <div class="login-container">
    <h1 class="subtitle">Sign In</h1>
    <form class="login-form" action="vues/main.php" method="post">
      <div>
        <span class="form-item material-symbols-outlined">mail</span>
        <input class="form-placeholder" type="text" placeholder="Enter your e-mail" name="email" required autofocus> 
      </div>
      <div>
        <span class="form-item material-symbols-outlined">lock</span>
        <input class="form-placeholder" type="password" placeholder="Enter your password" name="password" required autofocus> 
      </div>
      <div class="footer-login">
        <input class="form-submit" type="submit" value="Sign In">
        <a href="#">Don't have already an account ?</a>
      </div>
      </form>
    </div>
  </div>
</body>
</html>