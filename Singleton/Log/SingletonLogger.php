<?php

namespace SingletonLogger;

class SingletonLogger
{
    private static $instance = null;
    private $logfile;

    private function __construct()
    {
        $this->logfile = fopen('log.log', 'a');
    }

    /**
     * @return mixed
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function log($message)
    {
        $timestamp = date('Y-m-d H:i:s');
        fwrite($this->logfile, "[$timestamp] $message" . PHP_EOL);
    }

    private function __clone() {}


    public function __wakeup()
    {
        throw new Exception("Cannot unserialize a singleton.");
    }

}