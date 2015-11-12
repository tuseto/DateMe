<?php

include '../view/dateme_v.php';
include '../model/db_singleton.php';
include '../model/validation.php';

class Date {

    public $instance;

    public function __construct() {
        $this->instance = DbSingleton::getInstance();
    }

    public function validate($place, $reason) {
        try
        {
            Validation::information($place);
        }
        catch (Exception $ex)
        {
            echo 'Failed: ' . $ex->getMessage();
            exit();
        }
        try
        {
            Validation::information($reason);
        }
        catch (Exception $ex)
        {
            echo 'Failed: ' . $ex->getMessage();
            exit();
        }
    }

    public function insert_date($place, $reason, $own_id, $target_id) {
        $this->instance->insert_date($place, $reason, $own_id, $target_id);
    }

    public function init() {
        $dateview = new DateView();
        $dateview->init_view();
        if (isset($_POST['submit']))
        {
            $this->validate($_POST['place'], $_POST['reason']);
            $this->insert_date($_POST['place'], $_POST['reason'], $_SESSION['id'], $_GET['dateme']);
            header('Location:index.php?dateslist');
        }
    }

}

$date = new Date;
$date->init();
