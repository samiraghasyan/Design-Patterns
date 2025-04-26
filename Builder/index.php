<?php


class User{

    public function __construct(
//        private string $name,
//        private string $family,
//        private string $mobile,
//        private string $email
    )
    {

    }

}

//$user = new User('Reza','Aghasian','093****677','Reza@gmail.com');

interface Builder{

    public function reset();
    public function build();
    public function setName($name);
    public function setFamily($family);
    public function setMobile($mobile);
    public function setEmail($email);

}

class UserBuilder implements Builder{

    private $user;

    public function __construct()
    {
        $this->reset();
    }

    public function reset()
    {
        $this->user = new User();
    }

    public function build()
    {
       return new UserBuilder();
    }

    public function setName($name)
    {
        $this->user->name = $name;
        return $this;
    }

    public function setFamily($family)
    {
        $this->user->family = $family;
        return $this;
    }

    public function setMobile($mobile)
    {
       $this->user->mobile = $mobile;
       return $this;
    }

    public function setEmail($email)
    {
        $this->user->email = $email;
        return $this;
    }
}

$user = new UserBuilder();

$user->setName('Samir')
     ->setFamily('Aghasian')
     ->setEmail('example@gmail.com')
     ->setMobile('09**********')
     ->build();

echo '<pre>';
print_r($user);
echo '</pre>';