<?php

class Router {

    public function init() {
        if (empty($_POST) && empty($_GET)) {
            include '../controller/home.php';
        }
        if (isset($_GET['home'])) {
            include '../controller/home.php';
        }
        if (isset($_GET['viewprofile'])) {
            include '../controller/profile_view.php';
        }

        if (isset($_GET['dateslist'])) {
            include '../controller/dates_list.php';
        }
        if (isset($_GET['register'])) {
            include '../controller/register.php';
        }
        if (isset($_GET['login'])) {
            include '../controller/login.php';
        }
        if (isset($_GET['other_view'])) {
            include '../controller/other_view.php';
        }
        if (isset($_GET['dateme'])) {
            include '../controller/dateme.php';
        }
        if (isset($_GET['logout'])) {
            session_start();
            session_destroy();
            include '../controller/home.php';
        }
    }

}
