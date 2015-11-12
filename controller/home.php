<?php

include '../model/db_singleton.php';
include '../view/home_v.php';

class Home {

    public $instance;

    public function __construct() {
        $this->instance = DbSingleton::getInstance();
    }

    public function get_users() {
        $users = $this->instance->get_users();
        return $users;
    }

    public function init() {
        $users = $this->get_users();
        $home_view = new HomeView();
        $home_view->init_view($users);
    }

}

$home = new Home();
$home->init();



