<?php

include '../model/db_singleton.php';
include '../model/validation.php';
include '../view/login_v.php';

class Login {

    public $username, $password, $instance;

    public function __construct($username, $password) {
        $this->instance = DbSingleton::getInstance();

        $this->username = $username;
        $this->password = $password;
    }

    public function data_processing() {
        try
        {
            Validation::username($this->username);
        }
        catch (Exception $ex)
        {
            echo 'Failed: ', $ex->getMessage();
            exit();
        }
        try
        {
            Validation::password($this->password);
        }
        catch (Exception $ex)
        {
            echo 'Failed: ', $ex->getMessage();
            exit();
        }

        $login_result = $this->instance->login($this->username, $this->password);
        $result = $login_result->fetch_assoc();
        if ($result !== NULL)
        {
            $_SESSION['mas'] = 1;
            $_SESSION['username'] = $result['username'];
            $_SESSION['id'] = $result['id'];
            header('Location: index.php?home');
        }
        else
        {
            throw new Exception('Please enter your correct username and password!');
        }
    }

    public static function init() {
        $login_view = new LoginView;
        $login_view->init_view();
        if (isset($_POST['username']))
        {
            $login = new Login($_POST['username'], $_POST['password']);
            try
            {
                $login->data_processing();
            }
            catch (Exception $ex)
            {
                echo 'Failed: ', $ex->getMessage();
            }
        }
    }

}

Login::init();

