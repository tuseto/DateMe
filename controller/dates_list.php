<?php

include '../view/dates_list_v.php';
include '../model/db_singleton.php';

class DatesList {

    public $instance;

    public function __construct() {
        $this->instance = DbSingleton::getInstance();
    }

    public function get_sended_dates() {
        $data = $this->instance->get_send_dates($_SESSION['id']);
        return $data;
    }

    public function get_received_dates() {
        $data = $this->instance->get_received_dates($_SESSION['id']);
        return $data;
    }

    public function init() {
        if (isset($_SESSION['id']))
        {
            $data = $this->get_sended_dates();
            $data_received = $this->get_received_dates();
            $dateslistview = new DatesListView();
            $dateslistview->init($data);
            $dateslistview->init_received($data_received);
            $this->set_date_status();
        }
        else
        {
            $datesview = new DatesListView();
            $datesview->warning();
        }
    }

    public function set_date_status() {
        if (isset($_GET['dateslist']) && ($_GET['dateslist'] == 'approve') && (isset($_GET['id'])))
        {

            $this->instance->update_date_field($_GET['id'], 'answer_status', 1);
            header('Location:index.php?dateslist');
        }
        elseif (isset($_GET['dateslist']) && ($_GET['dateslist'] == 'reject') && (isset($_GET['dateslist'])))
        {
            $this->instance->update_date_field($_GET['id'], 'answer_status', 2);
            header('Location:index.php?dateslist');
        }
    }

}

$datelist = new DatesList();
$datelist->init();
