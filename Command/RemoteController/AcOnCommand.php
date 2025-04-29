<?php

require_once 'Command.php';

class AcOnCommand implements Command{
    private Ac $ac;

    public function __construct(Ac $ac)
    {
        $this->ac = $ac;
    }

    public function execute(): void
    {
        $this->ac->on();
    }
}