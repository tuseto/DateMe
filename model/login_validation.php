<?php

class LoginValidation {

    private function __construct() {
        
    }

    public static function LoginValidation($db_result) {
        if ($db_result->num_rows > 0)
        {
            $_SESSION['isLogged'] = true;
            return $err='Welcome again';
        }
        else
        {
            return $err='Wrong login data';
        }
    }

}
