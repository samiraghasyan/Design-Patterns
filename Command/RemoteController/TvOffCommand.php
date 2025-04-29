<?php

require_once 'Command.php';

class TvOffCommand implements Command{
    private Tv $tv;

    public function __construct(Tv $tv)
    {
        $this->tv = $tv;
    }

    public function execute(): void
    {
        $this->tv->off();
    }
}