<?php

require_once 'PaymentStrategy.php';

class CreditCardPayment implements PaymentStrategy{

    public function pay(int $amount): void
    {
        echo "Paid $amount تومان with Credit Card.<br>";
    }
}