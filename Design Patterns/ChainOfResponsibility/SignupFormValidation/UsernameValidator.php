<?php


class UsernameValidator extends Handler{

    protected function validate(array $data): ?string
    {
       if(empty($data['username'])){
           return "Username cannot be empty";
       }
       return null;
    }
}