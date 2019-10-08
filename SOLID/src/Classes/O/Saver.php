<?php


namespace App\O;


/**
 * Interface Saver
 * @package App\O
 */
interface Saver
{
    /**
     * @param $data
     * @return mixed
     */
    public function save($data);
}