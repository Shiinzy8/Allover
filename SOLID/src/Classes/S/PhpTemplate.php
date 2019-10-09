<?php

namespace App\S;

/**
 * Class PhpTemplate
 * @package App\S
 */
class PhpTemplate implements ITemplate
{
    /**
     * @param $data
     * @return mixed|void
     */
    function render($data)
    {
        echo '<h2>' . $data . '</h2>';
        echo PHP_EOL;
    }
}