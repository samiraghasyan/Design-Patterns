<?php

include_once 'UsersResponsitory.php';
include_once 'Email.php';
include_once 'User.php';

$userRepositoty = UsersResponsitory::getInstance();
$emailSender = new Email();

$userRepositoty->attach($emailSender);

$user = new User('Samir','example@gmail.com');
$userRepositoty->createUser($user);