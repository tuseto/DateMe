<?php

include '../model/db_singleton.php';
include '../model/validation.php';
include '../model/upload_picture.php';
include '../model/create_thumb.php';
include '../model/user.php';
include '../view/profile_view_v.php';

class ProfileView {

    public $instance;

    public function __construct() {
        $this->instance = DbSingleton::getInstance();
    }

    public function get_profile() {
        if (isset($_SESSION['username'])) {
            $profile_data = $this->instance->get_user($_SESSION['username']);
            foreach ($profile_data as $profile) {
                return $profile;
            }
        }
    }

    public function change_profile_data() {
        if ($_GET['viewprofile'] != 'image') {

            $field = $_GET['viewprofile'];

            $data = $_POST[$field];
            try {
                Validation::$field($data);
            } catch (Exception $ex) {
                echo 'Failed: ' . $ex->getMessage();
                exit();
            }
            $this->instance->update_user_field($_SESSION['username'], $field, $data);
            if (isset($_POST['username'])) {
                $_SESSION['username'] = $data;
            }
        }
    }

    public function change_profile_picture() {
        if ($_GET['viewprofile'] == 'image') {
            $field = $_GET['viewprofile'];
            $data = $_FILES['image']['name'];
            $image = $_FILES['image'];
            $user = new User;
            $user->set_image($image);

            try {
                Validation::$field($image);
            } catch (Exception $ex) {
                echo 'Failed: ' . $ex->getMessage();
                exit();
            }

            $id = $this->instance->get_user_field('id', $_SESSION['username']);
            $user->set_id($id);
            $this->instance->update_user_field($_SESSION['username'], 'picture', $user->get_image_name());
            $image_upload = new UploadPicture($image, $id);
            $thumb = new CrateThumbnail('./user_pics/' . $user->get_image_name(), './user_pics/user_thumbnails/' . $user->get_image_name(), 100);
        }
    }

    public function init() {
        $data = $this->get_profile();

        if ($_POST) {
            if ($_GET['viewprofile'] != 'image') {
                $this->change_profile_data();
            }
            elseif ($_GET['viewprofile'] == 'image') {
                $this->change_profile_picture();
            }
            header('Location: index.php?viewprofile');
        }
        return $data;
    }

}

$profileview = new ProfileView;
$data = $profileview->init();

$profileviewview = new ProfileViewView();
$profileviewview->init($data);



