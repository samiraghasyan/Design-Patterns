<?php

require_once 'ShoppingCart.php';
require_once 'TotalCalculator.php';
require_once 'StockUpdater.php';
require_once 'Logger.php';
require_once 'ConfirmationMessage.php';

$cart = new ShoppingCart();

// Attach Observers
$cart->attach(new TotalCalculator());
$cart->attach(new StockUpdater());
$cart->attach(new Logger());
$cart->attach(new ConfirmationMessage());

// Add Items
$cart->addItem([
    'name' => 'Gaming Keyboard',
    'price' => 75.00,
    'quantity' => 1
]);

$cart->addItem([
    'name' => 'USB-C Charger',
    'price' => 80.00,
    'quantity' => 2
]);
