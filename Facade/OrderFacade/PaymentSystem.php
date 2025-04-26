<?php

class PaymentSystem
{
    public function processPayment(float $amount, string $paymentMethod): bool
    {
        echo "Processing payment of {$amount} via {$paymentMethod}\n";
        return true; // فرض می‌کنیم پرداخت موفق است
    }
}