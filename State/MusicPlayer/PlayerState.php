<?php

interface PlayerState
{

    public function pressPlay(): void;

    public function pressPause(): void;

    public function pressStop(): void;

}


