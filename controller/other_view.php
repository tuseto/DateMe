<?php

include '../model/db_singleton.php';
include '../view/other_view_v.php';
include '../model/user.php';

class ProfileView {

    private $instance;

    public function __construct() {
        $this->instance = DbSingleton::getInstance();
    }

    public function get_profile_by_id($id) {

        $user_profile = $this->instance->get_user_by_id($id);
        foreach ($user_profile as $profile)
        {
            return $profile;
        }
    }

    public function profile_view($id) {
        if (isset($_SESSION['username']))
        {
            $profile_data = $this->get_profile_by_id($id);
            return $profile_data;
        }
    }
    public function init(){
        $data = $this->profile_view($_GET['other_view']);
        return $data;
        
    }

}

$profile = new ProfileView();
$data = $profile->init();

$otherview=new OtherView();
$otherview->init($data);
