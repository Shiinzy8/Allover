<?php


namespace App\I\Bad_example;


/**
 * Class Order
 * @package App\I\Bad_example
 */
class Order implements IOrderable
{
    /**
     * @return string
     */
    function getPaymentMethod()
    {
        return "Webmony";
    }

    /**
     * @return string
     */
    function getShipmentMethod()
    {
        return "Post";
    }

    /**
     * @return int
     */
    function getDiscount()
    {
        return 50;
    }

    /**
     * @return int
     */
    function getTotalPrice()
    {
        return 100;
    }

    /**
     * @return string
     */
    function getClientInfo()
    {
        return "Email, Phone";
    }

    /**
     * @return string
     */
    function getComment()
    {
        return "Order comment";
    }
}