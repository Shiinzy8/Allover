<?php

interface TemplateFactory
{
    public function createTitleTemplate(): TitleTemplate;

    public function getRenderer(): TemplateRenderer;
}

class TwigTemplateFactory implements TemplateFactory
{
    public function createTitleTemplate(): TitleTemplate
    {
        return new TwigTitleTemplate();
    }

    public function getRenderer(): TemplateRenderer
    {
        return new TwigRenderer();
    }
}

class PHPTemplateFactory implements TemplateFactory
{
    public function createTitleTemplate(): TitleTemplate
    {
        return new PHPTemplateTitleTemplate();
    }

    public function getRenderer(): TemplateRenderer
    {
        return new PHPTemplateRenderer();
    }
}


interface TitleTemplate
{
    public function getTemplateString(): string;
}

class TwigTitleTemplate implements TitleTemplate
{
    public function getTemplateString(): string
    {
        return '<h1>{{ title }}</h1>';
    }
}

class PHPTemplateTitleTemplate implements TitleTemplate
{
    public function getTemplateString(): string
    {
        return "<h1><?= \$title; ?></h1>";
    }
}


interface TemplateRenderer
{
    public function render(string $templateString): void;
}

class TwigRenderer implements TemplateRenderer
{
    public function render(string $templateString): void
    {
        echo 'twig ' . $templateString;
    }
}

class PHPTemplateRenderer implements TemplateRenderer
{
    public function render(string $templateString): void
    {
        echo 'php ' . $templateString;
    }
}

class Application
{
    public $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function work(TemplateFactory $factory): void
    {
        $renderer = $factory->getRenderer();

        $renderer->render($factory->createTitleTemplate()->getTemplateString());
    }
}

(new Application('Sample page'))->work(new TwigTemplateFactory());