<?php

class TotalCalculator implements SplObserver {
    private float $total = 0;

    public function update(SplSubject $subject): void {
        $item = $subject->getLastItem();
        $this->total += $item['price'] * $item['quantity'];
        echo "💰 Total updated: $this->total \n";
    }
}
