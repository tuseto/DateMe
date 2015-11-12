<?php

require_once '../model/db_connection.php';
require_once '../model/db_credentials.php';

//Клас обвивка на класа за връзка с базата за да може да се създава само една инстанция на връзката към базата
//От този клас се създава обект за връзка с базата данни
class DbSingleton extends DbConnection {

    private static $dbInstance;

    public static function getInstance() {
        if (self::$dbInstance)
        {
            return self::$dbInstance;
        }
        else
        {
            self::$dbInstance = new DbConnection(
                    Credentials::$host, Credentials::$user, Credentials::$password, Credentials::$database, Credentials::$port, Credentials::$socket
            );
            return self::$dbInstance;
        }
    }

}
