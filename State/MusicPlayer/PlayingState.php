<?php

require_once 'PlayerState.php';
require_once 'MusicPlayer.php';

class PlayingState implements PlayerState{
    private MusicPlayer $player;

    public function __construct(MusicPlayer $player)
    {
        $this->player = $player;
    }

    public function pressPlay(): void
    {
        echo "🔁 Already playing.<br>";
    }

    public function pressPause(): void
    {
        echo "⏸️ Music paused.<br>";
        $this->player->setState($this->player->getPausedState());
    }

    public function pressStop(): void
    {
        echo "⏹️ Music stopped.<br>";
        $this->player->setState($this->player->getStoppedState());
    }
}