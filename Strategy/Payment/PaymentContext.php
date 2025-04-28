<?php


class PaymentContext {
    private PaymentStrategy $paymentStrategy;

    public function __construct(PaymentStrategy $paymentStrategy)
    {
        $this->paymentStrategy = $paymentStrategy;
    }

    public function setPaymentStrategy(PaymentStrategy $paymentStrategy): void{
        $this->paymentStrategy = $paymentStrategy;
    }

    public function pay(int $amount): void
    {
        $this->paymentStrategy->pay($amount);
    }

}