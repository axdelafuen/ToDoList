<?php

class Validation {

    static function val_action($action) {
        if (!isset($action)) {
            throw new Exception('pas d\'action');
        }
    }

    static function val_formReg(string &$email, string &$password, string &$passwordConfirm ,array &$dVueEreur) {

        if (!isset($email)||$email=="") {
            $dVueEreur['email'] = "email non renseigné";
            $email="";
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $dVueEreur['email'] = "email invalide ";
            $email="";
            return;
        }

        if (!isset($password)||$password=="") {
            $dVueEreur['password'] = "veuillez renseigner un mot de passe ";
            $password="";
            $passwordConfirm="";
            return;
        }
        
        if ($password!=htmlspecialchars($password)){
            $dVueEreur['password'] = "mot de passe invalide";
            $password="";
            $passwordConfirm="";
            return;
        }
        if ($password!=$passwordConfirm){
            $dVueEreur['password'] = "mot de passe non identique";
            $password="";
            $passwordConfirm="";
            return;
        }

    }

    static function val_formLog(string &$email, string &$password, array &$dVueEreur) {

        if (!isset($email)||$email=="") {
            $dVueEreur['email'] = "email non renseigné";
            $email="";
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $dVueEreur['email'] = "email invalide ";
            $email="";
            return;
        }

        if (!isset($password)||$password=="") {
            $dVueEreur['password'] = "veuillez renseigner un mot de passe ";
            $password="";
            return;
        }
        
        if ($password!=htmlspecialchars($password)){
            $dVueEreur['password'] = "mot de passe invalide";
            $password="";
            return;
        }

    }
    
    static function val_user(string &$email, string &$password, array &$dVueEreur){
        global $dsn, $username, $passwordBD;
                
        $conn = new Connection($dsn, $username, $passwordBD);
        $getUser = new UserGateway($conn);

        if($email != $getUser->getUserByEmail($email)['email']){
            $dVueEreur['email'] = "email non trouvé";
            $dVueEreur['password'] = "";
            $email="";
            return;
        }
        if($password != $getUser->getUserByEmail($email)['password']){
            $dVueEreur['password'] = "mot de passe incorrect";
            $dVueEreur['email'] ="";
            $password="";        }
            return;
    }
    
    static function val_userRegister(string &$email, string &$password, array &$dVueEreur){
        global $dsn,$username,$passwordBD, $rep, $vues;
        $conn = new Connection($dsn,$username,$passwordBD);
        $getUser = new UserGateway($conn);
        if($email===$getUser->getUserByEmail($email)['email']){
            $dVueEreur['email'] = "email deja existante";
            $dVueEreur['password'] = "";
            $email = "";
            $password = "";
            return;
        }
        try{
            $getUser->addUser($email,$password);
            //$getUser->addAdmin($email,$password);
        }catch(Exception $e){
            $dVueEreur[] = "ERREUR:<br/>".$e->getMessage();
            require($rep.$vues['erreur']);
        }

    }
    static function isAdmin(string $email){
        global $dsn,$username, $passwordBD;
        
        $conn = new Connection($dsn, $username, $passwordBD);
        $getUser = new UserGateway($conn);
        return $getUser->getUserByEmail($email)['isAdmin'];
        return false;
    }
}
?>
