<?php


require_once "SingletonLogger.php";

$logger1 = \SingletonLogger\SingletonLogger::getInstance();

$logger1->log("اولین پیام لاگ");


$logger2 = \SingletonLogger\SingletonLogger::getInstance();
$logger2->log("دومین پیام لاگ");



if ($logger1 === $logger2) {
    $logger1->log("هر دو لاگر به یک نمونه اشاره می‌کنند");
}


function processOrder()
{
    $logger = \SingletonLogger\SingletonLogger::getInstance();
    $logger->log("شروع پردازش سفارش");

    $logger->log("پایان پردازش سفارش");

}

processOrder();