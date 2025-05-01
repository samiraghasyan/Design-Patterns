<?php
require_once 'PlayerState.php';
require_once 'MusicPlayer.php';

class PausedState implements PlayerState{
    private MusicPlayer $player;

    public function __construct(MusicPlayer $player) {
        $this->player = $player;
    }

    public function pressPlay(): void
    {
        echo "▶️ Resuming music...<br>";
        $this->player->setState($this->player->getPlayingState());
    }

    public function pressPause(): void
    {
        echo "⏸️ Already paused.<br>";
    }

    public function pressStop(): void
    {
        echo "⏹️ Music stopped from pause.<br>";
    }
}