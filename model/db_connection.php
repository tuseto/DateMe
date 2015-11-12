<?php

//Клас за връзката с базата който не може да се създава от вън
class DbConnection extends mysqli {

    //Протектед конструктор. Обектът може да се създава само от db_singleton.php клас:DbSingleton.
    protected function __construct($host, $user, $password, $database, $port, $socket) {
        parent::__construct($host, $user, $password, $database, $port, $socket);
        $this->query("SET NAMES utf8");
    }

    //Метод за регистриране на нов потребител
    public function insert_user($username, $password, $email, $phone, $bdate, $information, $interests, $city) {
        $this->query("INSERT INTO users (username,password,email,phone,bdate,information,interests,city)
                VALUES ('$username','$password','$email','$phone','$bdate','$information','$interests','$city')");
        return;
    }

    //Login
    public function login($username, $password) {
        $login = $this->query("SELECT id,username FROM users WHERE username='$username' AND password='$password'");
        return $login;
    }

    public function get_user($username) {
        $user = $this->query("SELECT * FROM users WHERE username='$username'");
        return $user;
    }

    public function get_user_by_id($id) {
        $user = $this->query("SELECT * FROM users WHERE id='$id'");
        return $user;
    }

    public function update_user_field($username, $field, $data) {
        $this->query("UPDATE users SET " . $field . "='$data' WHERE username='$username'");
    }

    public function get_user_field($field, $username) {
        $id = $this->query("SELECT " . $field . " FROM users WHERE username='$username'");
        foreach ($id as $i)
        {
            foreach ($i as $d)
            {
                return $d;
            }
        }
    }

    public function get_users() {
        $users = $this->query('SELECT id,username,picture FROM users ORDER BY id DESC LIMIT 10');
        return $users;
    }

    public function insert_date($place, $reason, $own_id, $target_id) {
        $this->query("INSERT INTO dates (sender_id,receiver_id,reason,place) VALUES('$own_id','$target_id','$reason','$place')");
    }

    public function get_send_dates($id) {
        $data = $this->query("SELECT users.username,users.picture,dates.place,dates.reason,dates.answer_status FROM users INNER JOIN dates ON users.id=dates.receiver_id WHERE dates.sender_id='$id' ORDER BY dates.id DESC");
        return $data;
    }

    public function get_received_dates($id) {
        $data = $this->query("SELECT users.username,users.picture,dates.place,dates.reason,dates.answer_status,dates.id FROM users INNER JOIN dates ON users.id=dates.sender_id WHERE dates.receiver_id='$id' ORDER BY dates.id DESC");
        return $data;
    }
    public function update_date_field($id, $field, $data) {
        $this->query("UPDATE dates SET " . $field . "='$data' WHERE id='$id'");
    }

}
