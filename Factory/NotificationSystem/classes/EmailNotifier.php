<?php
class EmailNotifier extends Notifier {
    protected function createNotification(): Notification {
        return new EmailNotification();
    }
}

class SMSNotifier extends Notifier {
    protected function createNotification(): Notification {
        return new SMSNotification();
    }
}

class PushNotifier extends Notifier {
    protected function createNotification(): Notification {
        return new PushNotification();
    }
}
