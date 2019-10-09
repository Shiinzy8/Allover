<?php


namespace App\O;


/**
 * Interface Saver
 * @package App\O
 */
interface ISaver
{
    /**
     * @param $data
     * @return mixed
     */
    public function save($data);
}