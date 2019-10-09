<?php


namespace App\I\Good_example;


/**
 * Interface IOrder
 * @package App\I\Good_example
 */
interface IOrder
{
    /**
     * @return mixed
     */
    function getClientInfo();

    /**
     * @return mixed
     */
    function getTotalPrice();
}