<?php

interface Button
{
    public function render();
}

class WindowsButton implements Button
{

    public function render()
    {
        echo "Rendering a Windows Button.<br>";
    }
}

class MacButton implements Button
{
    public function render()
    {
        echo "Rendering a Mac Button.<br>";
    }
}

abstract class Dialog
{
    abstract protected function createButton(): Button;

    public function renderWindow()
    {
        $button = $this->createButton();
        $button->render();
    }
}


class WindowsDialog extends Dialog{

    protected function createButton(): Button
    {
        return new WindowsButton();
    }
}

class MacDialog extends Dialog{

    protected function createButton(): Button
    {
        return new MacButton();
    }
}


function initializeOS(string $osType){
    match ($osType){
        "Windows" => $dialog = new WindowsDialog(),
        "Mac" => $dialog = new MacDialog()
    };

    $dialog->renderWindow();
}


initializeOS('Windows');
initializeOS('Mac');