<?php

class ShippingSystem
{
    public function scheduleDelivery(string $address, array $products): string {
        echo "Scheduling delivery to {$address}\n";
        return "SHIP-" . uniqid(); // شماره پیگیری حمل و نقل
    }
}