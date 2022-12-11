<html>
<head><title>Erreur</title></head>

<body>

<h1>ERREUR !</h1>
<style>
body{
    overflow:auto;
}
</style>
<?php
if (isset($dVueEreur))
{
    foreach ($dVueEreur as $value)
    {
        echo $value;
    }
    
    
    // echo phpinfo();
}
if(isset($e)){
    echo $e;
}
if(isset($e2)){
    echo $e2;
}

?>
