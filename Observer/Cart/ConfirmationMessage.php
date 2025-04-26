<?php

class ConfirmationMessage implements SplObserver {
    public function update(SplSubject $subject): void {
        $item = $subject->getLastItem();
        echo "✅ Confirmation: {$item['name']} added to cart successfully!\n";
    }
}
