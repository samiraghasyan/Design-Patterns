<?php

require_once 'InventorySystem.php';
require_once 'PaymentSystem.php';
require_once 'ShippingSystem.php';

class OrderFacade
{
    private $inventory;
    private $payment;
    private $shipping;

    public function __construct()
    {
        $this->inventory = new InventorySystem();
        $this->payment = new PaymentSystem();
        $this->shipping = new ShippingSystem();
    }

    public function placeOrder(array $products, string $paymentMethod, string $shippingAddress): array
    {
        foreach ($products as $productId => $quantity) {
            if (!$this->inventory->checkStock($productId, $quantity)) {
                throw new Exception("Product {$productId} is out of stock");
            }
        }

        // 2. پرداخت
        $totalAmount = $this->calculateTotal($products);
        $paymentResult = $this->payment->processPayment($totalAmount, $paymentMethod);

        if (!$paymentResult) {
            throw new Exception("Payment failed");
        }

        // 3. به‌روزرسانی موجودی
        foreach ($products as $productId => $quantity) {
            $this->inventory->updateStock($productId, $quantity);
        }

        // 4. زمان‌بندی ارسال
        $trackingNumber = $this->shipping->scheduleDelivery($shippingAddress, $products);

        return [
            'success' => true,
            'total_amount' => $totalAmount,
            'tracking_number' => $trackingNumber
        ];

    }

    private function calculateTotal(array $products): float
    {
        // محاسبه ساده جمع کل
        return count($products) * 10; // فرضی: هر محصول 10 واحد قیمت دارد
    }

}