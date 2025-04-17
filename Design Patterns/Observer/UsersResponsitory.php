<?php

class UsersResponsitory implements SplSubject
{
    private  \SplObjectStorage $observes;
    private static $instance = null;
    private array $users = [];

    private function __construct()
    {
        $this->observes = new \SplObjectStorage();
    }

    private function __clone() {}

    public function createUser(User $user)
    {
        $this->users[] = $user;
        $this->notify();
    }

    /**
     * @return null
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function attach(SplObserver $observer): void
    {
        $this->observes->attach($observer);
    }

    public function detach(SplObserver $observer): void
    {
        $this->observes->detach($observer);
    }

    public function notify(): void
    {
        foreach ($this->observes as $observe){
            $observe->update($this);
        }
    }
}