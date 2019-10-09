<?php


namespace App\I\Good_example;


/**
 * Class Order
 * @package App\I\Good_example
 */
class Order implements IOrder, IPayment, IShipment, IDiscount
{

    /**
     * @return int|mixed
     */
    function getDiscount()
    {
        return 15;
    }

    /**
     * @return mixed|string
     */
    function getClientInfo()
    {
        return "Good order client info";
    }

    /**
     * @return int|mixed
     */
    function getTotalPrice()
    {
        return 50;
    }

    /**
     * @return mixed|string
     */
    function getPayment()
    {
        return "Good order payment";
    }

    /**
     * @return mixed|string
     */
    function getShipment()
    {
        return "Good order shipment";
    }
}