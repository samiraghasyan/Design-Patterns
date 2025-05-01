<?php

require_once 'MusicPlayer.php';

$player = new MusicPlayer();

$player->pressPlay();
$player->pressPause();
$player->pressStop();
$player->pressPause();
$player->pressPlay();
$player->pressStop();