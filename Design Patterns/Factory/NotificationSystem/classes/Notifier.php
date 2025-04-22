<?php
abstract class Notifier {
    abstract protected function createNotification(): Notification;

    public function notify(string $message) {
        $notification = $this->createNotification();
        $notification->send($message);
    }
}
