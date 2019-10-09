<?php

namespace App\S;

/**
 * Class HtmlTemplate
 * @package App\S
 */
class HtmlTemplate implements ITemplate
{
    /**
     * @param $data
     * @return mixed|void
     */
    function render($data)
    {
        echo '<h1>' . $data . '</h1>';
        echo PHP_EOL;
    }
}