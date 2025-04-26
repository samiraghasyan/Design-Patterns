<?php


class EmailNotification implements Notification {
    public function send(string $message) {
        echo "📧 Email sent with message: $message<br>";
    }
}

class SMSNotification implements Notification {
    public function send(string $message) {
        echo "📱 SMS sent with message: $message<br>";
    }
}

class PushNotification implements Notification {
    public function send(string $message) {
        echo "🔔 Push notification sent with message: $message<br>";
    }
}
