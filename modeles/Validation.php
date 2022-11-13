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
        
        if (!filter_var($password, FILTER_SANITIZE_STRING)){
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
        
        if (!filter_var($password, FILTER_SANITIZE_STRING)){
            $dVueEreur['password'] = "mot de passe invalide";
            $password="";
            return;
        }

    }
    
    static function val_user(string &$email, string &$password, array &$dVueEreur){
        global $admin;
        if($email != "admin@admin.com"){
            $dVueEreur['email'] = "email non trouvé";
            $email="";
            return;
        }
        if($password != "1234"){
            $dVueEreur['password'] = "mot de passe incorrect";
            $password="";        }
            return;
    }
}
?>
