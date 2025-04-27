<?php


interface DiscountStrategy {
    public function calculateDiscount(float $amount): float;
}


class PercentageDiscount implements DiscountStrategy{

    private float $percent;

    public function __construct(float $percent)
    {
        $this->percent = $percent;
    }

    public function calculateDiscount(float $amount): float
    {
        return $amount - ($amount * $this->percent / 100);
    }
}


class FixedDiscount implements DiscountStrategy{

    private float $fixAmount;

    public function __construct(float $fixAmount)
    {
        $this->fixAmount = $fixAmount;
    }

    public function calculateDiscount(float $amount): float
    {
        return max(0, $amount - $this->fixAmount);
    }
}


class ShoppingCart {

    private DiscountStrategy $discountStrategy;

    public function __construct(DiscountStrategy $discountStrategy)
    {
        $this->discountStrategy = $discountStrategy;
    }

    public function checkout(float $amount)
    {
        $finalAmount = $this->discountStrategy->calculateDiscount($amount);
        echo "Final Amount after discount : $finalAmount";
    }

}


$cart1 = new ShoppingCart(new PercentageDiscount(10));
$cart1->checkout(500);

$cart2 = new ShoppingCart(new FixedDiscount(50));
$cart2->checkout(500);

