<?php
require_once 'interfaces/Notification.php';
require_once 'classes/EmailNotification.php';

require_once 'classes/Notifier.php';
require_once 'classes/EmailNotifier.php' ;

// انتخاب نوع نوتیفیکیشن بر اساس یک شرط ساده
function getNotifier(string $type): Notifier {
    switch ($type) {
        case "email":
            return new EmailNotifier();
        case "sms":
            return new SMSNotifier();
        case "push":
            return new PushNotifier();
        default:
            throw new Exception("Unknown notification type.");
    }
}

// اجرا
$type = "email"; // می‌تونی اینو تغییر بدی به sms یا push
$notifier = getNotifier($type);
$notifier->notify("Hello! You've got a new message.");
