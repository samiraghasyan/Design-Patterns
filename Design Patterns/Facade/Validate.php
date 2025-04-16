<?php

class Validate
{


    public function checkValue(): bool
    {
        return true;
    }


}


class User
{
    public function create(): void
    {

    }
}


class Mail
{
    public function send(): void
    {

    }
}

// Users should use this without Facade design pattern

$validate = new Validate();
$user = new User();
$mail = new Mail();

if ($validate->checkValue()) {
    $user->create(['name' => 'samir', 'email' => 'example@gmail.com' , 'password' => '123']);
    $mail->send();
}


class UserFacade
{
    private Validate $validate;
    private User $user;
    private Mail $mail;

    public function __construct()
    {
        $this->validate = new Validate();
        $this->user = new User();
        $this->mail = new  Mail();
    }

    public function registerUser($name, $email, $password): bool
    {
        if ($this->validate->checkValue()) {
            $this->user->create(['name' => $name, 'email' => $email, 'password' => $password]);
            $this->mail->send();
            return true;
        }
    }

}

// Users should use this with Facade design pattern


$register = new UserFacade();
$register->registerUser(name: 'Samir', email: 'example@gmail.com', password: '123');
