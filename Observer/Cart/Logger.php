<?php

class Logger implements SplObserver {
    public function update(SplSubject $subject): void {
        $item = $subject->getLastItem();
        echo "📝 Log: Added {$item['quantity']} x {$item['name']} to cart.\n";
    }
}
