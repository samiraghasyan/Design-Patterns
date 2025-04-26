<?php


require_once 'Handler.php';
require_once 'UsernameValidator.php';
require_once 'PasswordValidator.php';
require_once 'EmailValidator.php';

$username = new UsernameValidator();
$pass = new PasswordValidator();
$email = new EmailValidator();

$username->setNext($pass)->setNext($email);

$formData = [
    'username' => 'sad',
    'password' => 'asd456',
    'email'    => 'example@gmail.com'
];

$error = $username->handle($formData);

if ($error) {
    echo $error;
} else {
    echo "Registration Successful!";
}
