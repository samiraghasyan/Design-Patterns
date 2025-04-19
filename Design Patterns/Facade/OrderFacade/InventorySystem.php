<?php

class InventorySystem
{
    public function checkStock(string $productId,int $quantity): bool
    {
        // در واقعیت اینجا با دیتابیس موجودی چک می‌شود
        echo "Checking stock for product {$productId}, quantity: {$quantity}\n";
        
        return true;
    }

    public function updateStock(string $productId,int $quantity): void
    {
        echo "Updating stock for product {$productId}, quantity: -{$quantity}\n";
    }
}