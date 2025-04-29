<?php


class RemoteController{
    private Command $command;

    public function setCommand(Command $command): void
    {
        $this->command = $command;
    }

    public function pressButton(): void
    {
        $this->command->execute();
    }
}