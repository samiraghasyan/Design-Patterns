<?php

require_once 'WalletPayment.php';
require_once 'PaymentContext.php';
require_once 'CreditCardPayment.php';


$userChoice = 'creditcard';

match ($userChoice){
    'creditcard' => $paymentMethod = new CreditCardPayment(),
    'wallet' => $paymentMethod = new WalletPayment(),
    default => throw new Exception('Invalid payment method.')
};


$amount = 500000;

$paymentMethod = new PaymentContext($paymentMethod);
$paymentMethod->pay($amount);
