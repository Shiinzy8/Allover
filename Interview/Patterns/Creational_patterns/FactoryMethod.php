<?php

interface InterfaceButton
{
    public function render(): void;

    public function click(): void;
}

class CloseButton implements InterfaceButton
{
    public function render(): void
    {
        echo "close this tab";
    }

    public function click(): void
    {
        echo "click on close button";
    }
}

class MoveButton implements InterfaceButton
{
    public function render(): void
    {
        echo 'move this tab';
    }

    public function click(): void
    {
        echo 'click on move button';
    }
}

abstract class Program
{
    public InterfaceButton $button;

    abstract public function factoryMethod(): InterfaceButton;

    public function work(): void {
        $this->button = $this->factoryMethod();

        $this->button->render();
        $this->button->click();
    }
}

class ProgramCloseButton extends Program
{

    public function factoryMethod(): CloseButton
    {
        return new CloseButton();
    }
}

class ProgramMoveButton extends Program
{
    public function factoryMethod(): MoveButton
    {
        return new MoveButton();
    }
}

class Application
{
    public function runApplication(string $type): void
    {
        if ($type == 'close') {
            $program = new ProgramCloseButton();
        } else {
            $program = new ProgramMoveButton();
        }

        $program->work();
    }
}

(new Application())->runApplication('move');
