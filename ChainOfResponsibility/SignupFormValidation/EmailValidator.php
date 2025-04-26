<?php


class EmailValidator extends Handler{

    protected function validate(array $data): ?string
    {
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return "Invalid email address.";
        }
        return null;
    }
}