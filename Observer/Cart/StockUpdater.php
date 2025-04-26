<?php

class StockUpdater implements SplObserver {
    public function update(SplSubject $subject): void {
        $item = $subject->getLastItem();
        echo "📦 Stock updated: -{$item['quantity']} units of {$item['name']}\n";
    }
}
