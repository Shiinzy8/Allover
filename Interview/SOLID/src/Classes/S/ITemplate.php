<?php

namespace App\S;

/**
 * Interface Template
 * @package App\S
 */
interface ITemplate
{
    /**
     * @param $data
     * @return mixed
     */
    function render($data);
}