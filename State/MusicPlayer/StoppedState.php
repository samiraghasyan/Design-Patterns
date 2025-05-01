<?php
require_once 'PlayerState.php';
require_once 'MusicPlayer.php';

class StoppedState implements PlayerState{
    private MusicPlayer $player;

    public function __construct(MusicPlayer $player)
    {
        $this->player = $player;
    }

    public function pressPlay(): void
    {
        echo "▶️ Music started playing.<br>";
        $this->player->setState($this->player->getPlayingState());
    }

    public function pressPause(): void
    {
        echo "❌ Can't pause. Music is not playing.<br>";
    }

    public function pressStop(): void
    {
        echo "⏹️ Music is already stopped.<br>";
    }
}





