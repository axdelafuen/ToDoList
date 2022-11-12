<?php

class Validation {

    static function val_action($action) {
        if (!isset($action)) {
            throw new Exception('pas d\'action');
        }
    }

    static function val_form(string &$email, string &$password, array &$dVueEreur) {

        if (!isset($email)||$email=="") {
            $dVueEreur['email'] = "email non renseigné";
            $email="";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $dVueEreur['email'] = "email invalide ";
            $email="";
        }

        if (!isset($password)||$password=="") {
            $dVueEreur['password'] = "veuillez renseigner un mot de passe ";
            $password="";
        }
        
        if (!filter_var($password, FILTER_SANITIZE_STRING)){
            $dVueEreur['password'] = "mot de passe invalide";
            $password="";
        }

    }

}
?>
