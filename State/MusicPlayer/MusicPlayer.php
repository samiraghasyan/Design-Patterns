<?php

require_once 'StoppedState.php';
require_once 'PlayingState.php';
require_once 'PausedState.php';


class MusicPlayer {

    private PlayerState $stoppedState;
    private PlayerState $playingState;
    private PlayerState $pausedState;

    private PlayerState $currentState;

    public function __construct(){
        $this->stoppedState = new StoppedState($this);
        $this->playingState = new PlayingState($this);
        $this->pausedState = new PausedState($this);
        $this->currentState = $this->stoppedState;
    }

    public function setState(PlayerState $state): void
    {
        $this->currentState = $state;
    }

    public function getStoppedState(): PlayerState {
        return $this->stoppedState;
    }

    public function getPlayingState(): PlayerState {
        return $this->playingState;
    }

    public function getPausedState(): PlayerState {
        return $this->pausedState;
    }

    // دکمه‌های کاربر
    public function pressPlay(): void {
        $this->currentState->pressPlay();
    }

    public function pressPause(): void {
        $this->currentState->pressPause();
    }

    public function pressStop(): void {
        $this->currentState->pressStop();
    }
}