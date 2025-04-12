<?php

class ConnectDB
{
    private static $instance = null;

    private function __construct()
    {

    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new ConnectDB();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        //connect by PDO method
    }

}

$connect = ConnectDB::getInstance();





