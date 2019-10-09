<?php


namespace App\I\Bad_example;


/**
 * Interface IOrderable
 * @package App\I\Bad_example
 */
interface IOrderable
{
    /**
     * @return mixed
     */
    function getPaymentMethod();

    /**
     * @return mixed
     */
    function getShipmentMethod();

    /**
     * @return mixed
     */
    function getDiscount();

    /**
     * @return mixed
     */
    function getTotalPrice();

    /**
     * @return mixed
     */
    function getClientInfo();

    /**
     * @return mixed
     */
    function getComment();
}