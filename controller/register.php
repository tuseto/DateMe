<?php

include '../model/validation.php';
include '../model/user.php';
include '../model/upload_picture.php';
include '../model/create_thumb.php';
include '../model/db_singleton.php';
include '../view/register_v.php';

class Register {

    private $instance;

    public function __construct() {
        $this->instance = DbSingleton::getInstance();
    }

    //Create object user with parameters
    public function create_user($username, $password, $email, $phone, $bdate, $information, $interests, $city, $image) {
        $user = new User();
        try {
            $user->set_username(Validation::username($username));
        } catch (Exception $ex) {
            echo 'Failed: ', $ex->getMessage();
            exit();
        }
        try {
            $user->set_password(Validation::password($password));
        } catch (Exception $ex) {
            echo 'Failed: ', $ex->getMessage();
            exit();
        }
        try {
            $user->set_email(Validation::email($email));
        } catch (Exception $ex) {
            echo 'Failed: ', $ex->getMessage();
            exit();
        }
        try {
            $user->set_phone(Validation::phone($phone));
        } catch (Exception $ex) {
            echo 'Failed: ', $ex->getMessage();
            exit();
        }
        try {
            $user->set_bdate(Validation::bdate($bdate));
        } catch (Exception $ex) {
            echo 'Failed: ', $ex->getMessage();
            exit();
        }
        try {
            $user->set_information(Validation::information($information));
        } catch (Exception $ex) {
            echo 'Failed: ', $ex->getMessage();
            exit();
        }
        try {
            $user->set_interests(Validation::interests($interests));
        } catch (Exception $ex) {
            echo 'Failed: ', $ex->getMessage();
            exit();
        }
        try {
            $user->set_city(Validation::city($city));
        } catch (Exception $ex) {
            echo 'Failed: ', $ex->getMessage();
            exit();
        }
        try {
            $user->set_image(Validation::image($image));
        } catch (Exception $ex) {
            echo 'Failed: ', $ex->getMessage();
            exit();
        }

        return $user;
    }

    //Register user in db
    public function register($user) {
        $this->instance->insert_user($user->registration_arr['username'], $user->registration_arr['password'], $user->registration_arr['email'], $user->registration_arr['phone'], $user->registration_arr['bdate'], $user->registration_arr['information'], $user->registration_arr['interests'], $user->registration_arr['city']);
        $_SESSION['username'] = $_POST['username'];
    }

    public function data_processing() {
        $user = $this->create_user($_POST['username'], $_POST['password'], $_POST['email'], $_POST['phone'], $_POST['bdate'], $_POST['information'], $_POST['interests'], $_POST['city'], $_FILES['image']);
        $this->register($user);
        return $user;
    }

    public function get_user_id($user) {
        $id = $this->instance->get_user_field('id', $_SESSION['username']);
        $user->set_id($id);
        $_SESSION['id'] = $id;
    }

    public function image_processing($user) {
        $this->instance->update_user_field($user->get_username(), 'picture', $user->get_image_name());
        $image = $user->get_image();
        new UploadPicture($image, $user->get_id());
        new CrateThumbnail('./user_pics/' . $user->get_image_name(), './user_pics/user_thumbnails/' . $user->get_image_name(), 100);
        header('Location: index.php?home');
    }

    public function init() {
        session_start();
        $registerView = new RegisterView();
        if (!isset($_SESSION['username'])) {
            $registerView->initView();
        }
        else {
            header('Location: http://date.me/index.php?home');
            exit();
        }
        if (isset($_POST['submit'])) {
            $user = $this->data_processing();
            $this->get_user_id($user);
            $this->image_processing($user);
        }
    }

}

$register = new Register;
$register->init();





