<?php

class User {

    public $registration_arr = [];

    public function set_id($id) {
        $this->registration_arr['id'] = $id;
    }

    public function set_username($username) {
        $this->registration_arr['username'] = $username;
    }

    public function set_password($password) {
        $this->registration_arr['password'] = $password;
    }

    public function set_email($email) {
        $this->registration_arr['email'] = $email;
    }

    public function set_phone($phone) {
        $this->registration_arr['phone'] = $phone;
    }

    public function set_bdate($bdate) {
        $this->registration_arr['bdate'] = $bdate;
    }

    public function set_information($information) {
        $this->registration_arr['information'] = $information;
    }

    public function set_interests($interests) {
        $this->registration_arr['interests'] = $interests;
    }

    public function set_city($city) {
        $this->registration_arr['city'] = $city;
    }

    public function set_image($image) {

        $this->registration_arr['image'] = $image;
    }

    public function get_image() {
        return $this->registration_arr['image'];
    }

    public function get_image_name() {

        $image_name = $this->registration_arr['id'] . '_' . $this->registration_arr['image']['name'];
        return $image_name;
    }
    public function get_username(){
        return $this->registration_arr['username'];
    }
    public function get_id(){
        return $this->registration_arr['id'];
    }

}
