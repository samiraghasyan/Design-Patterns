<?php


class AcOffCommand implements command{
    private Ac $ac;

    public function __construct(Ac $ac)
    {
        $this->ac = $ac;
    }

    public function execute(): void
    {
        $this->ac->off();
    }
}