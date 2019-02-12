<?php

/**
 * Created by PhpStorm.
 * User: ADAM
 * Date: 15.05.2017
 * Time: 23:05
 */
class Button
{
    public $page;
    public $text;
    public $isActive;

    public function __construct($page, $isActive = true, $text = null)
    {
        $this->page = $page;
        $this->text = $text ?? $page;
        $this->isActive = $isActive;
    }
}
