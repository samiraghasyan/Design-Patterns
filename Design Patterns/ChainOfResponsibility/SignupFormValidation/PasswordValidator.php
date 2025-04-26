<?php


class PasswordValidator extends Handler{

    protected function validate(array $data): ?string
    {
        if (strlen($data['password']) < 6) {
            return "Password must be at least 6 characters.";
        }

        return null;
    }
}