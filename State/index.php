<?php

interface DoorState{
    public function insertPin(): void;
    public function openDoor(): void;
    public function lock(): void;
}

class LockedState implements DoorState{

    private SmartDoor $door;

    public function __construct(SmartDoor $door) {
        $this->door = $door;
    }

    public function insertPin(): void {
        echo "Correct PIN. Door is now Unlocked.<br>";
        $this->door->setState($this->door->getUnlockedState());
    }

    public function openDoor(): void {
        echo "Door is locked. Enter PIN first.<br>";
    }

    public function lock(): void {
        echo "Door is already locked.<br>";
    }
}

class UnlockedState implements DoorState{

    private SmartDoor $door;

    public function __construct(SmartDoor $door) {
        $this->door = $door;
    }

    public function insertPin(): void {
        echo "Door already unlocked.<br>";
    }

    public function openDoor(): void {
        echo "Door opened. Welcome!<br>";
    }

    public function lock(): void {
        echo "Door is now locked.<br>";
        $this->door->setState($this->door->getLockedState());
    }
}

class SmartDoor {
    private DoorState $lockedState;
    private DoorState $unlockedState;

    private DoorState $currentState;

    public function __construct() {
        $this->lockedState = new LockedState($this);
        $this->unlockedState = new UnlockedState($this);
        $this->currentState = $this->lockedState;
    }

    public function setState(DoorState $state): void {
        $this->currentState = $state;
    }

    public function getLockedState(): DoorState {
        return $this->lockedState;
    }

    public function getUnlockedState(): DoorState {
        return $this->unlockedState;
    }

    // دستورات خارجی
    public function insertPin(): void {
        $this->currentState->insertPin();
    }

    public function openDoor(): void {
        $this->currentState->openDoor();
    }

    public function lock(): void {
        $this->currentState->lock();
    }
}



$door = new SmartDoor();

$door->openDoor();
$door->insertPin();
$door->openDoor();
$door->lock();
$door->insertPin();
