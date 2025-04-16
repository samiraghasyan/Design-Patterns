<?php


require_once "OrderFacade.php";

// استفاده از Facade
$orderFacade = new OrderFacade();

try {
    $products = [
        'P1001' => 2,
        'P1002' => 1
    ];

    $result = $orderFacade->placeOrder(
        $products,
        'CreditCard',
        '123 Main St, Tehran, Iran'
    );

    echo '<br>';
    echo "Order placed successfully!\n";
    echo '<br>';
    echo "Tracking number: " . $result['tracking_number'] . "\n";
    echo '<br>';
    echo "Total amount: $" . $result['total_amount'] . "\n";


} catch (Exception $e) {
    echo "Order failed: " . $e->getMessage() . "\n";
}