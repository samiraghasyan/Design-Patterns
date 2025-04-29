<?php

require_once 'Ac.php';
require_once 'AcOnCommand.php';
require_once 'AcOffCommand.php';
require_once 'Tv.php';
require_once 'TvOnCommand.php';
require_once 'TvOffCommand.php';
require_once 'RemoteController.php';

$ac = new Ac();
$tv = new Tv();


$onAc = new AcOnCommand($ac);
$offAc = new TvOffCommand($tv);


$remote = new RemoteController();

$remote->setCommand($onAc);
$remote->pressButton();

$remote->setCommand($offAc);
$remote->pressButton();
