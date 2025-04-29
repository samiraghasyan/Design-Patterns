<?php

interface command{
    public function execute(): void;
}

class Light{
    public function on(): void{
       echo "Light is ON";
    }

    public function off(): void
    {
        echo "Light is Off";
    }
}

class LightOnCommand implements command{
    private Light $light;

    public function __construct(Light $light)
    {
        $this->light = $light;
    }

    public function execute(): void
    {
        $this->light->on();
    }
}

class LightOffCommand implements command{
    private Light $light;

    public function __construct(Light $light)
    {
        $this->light = $light;
    }

    public function execute(): void
    {
        $this->light->off();
    }
}

class RemoteControl {

    private command $command;

    public function setCommand(command $command): void
    {
        $this->command = $command;
    }

    public function pressButton(): void
    {
        $this->command->execute();
    }
}

$light = new Light();

$onCommand = new LightOnCommand($light);
$offCommand = new LightOffCommand($light);

$remote = new RemoteControl();

$remote->setCommand($onCommand);
$remote->pressButton();

$remote->setCommand($offCommand);
$remote->pressButton();

