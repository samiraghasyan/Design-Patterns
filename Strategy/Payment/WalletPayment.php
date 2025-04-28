<?php

require_once 'PaymentStrategy.php';

class WalletPayment implements PaymentStrategy{

    public function pay(int $amount): void
    {
        echo "Paid $amount تومان from Wallet Balance.<br>";
    }
}