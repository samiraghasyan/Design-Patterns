<?php

class ShoppingCart implements SplSubject {
    private array $observers = [];
    private array $items = [];
    private array $lastItem = [];

    public function attach(SplObserver $observer): void {
        $this->observers[] = $observer;
    }

    public function detach(SplObserver $observer): void {
        $this->observers = array_filter($this->observers, fn($obs) => $obs !== $observer);
    }

    public function notify(): void {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function addItem(array $item): void {
        $this->items[] = $item;
        $this->lastItem = $item;
        $this->notify();
    }

    public function getLastItem(): array {
        return $this->lastItem;
    }

    public function getItems(): array {
        return $this->items;
    }
}
