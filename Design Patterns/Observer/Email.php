<?php

class Email implements \SplObserver {

    public function update(SplSubject $subject): void
    {
        echo 'Email class has been notified!';
    }
}