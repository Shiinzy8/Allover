<?php


namespace App\I\Bad_example;


use Exception;


/**
 * Class QuickOrder
 * @package App\I\Bad_example
 */
class QuickOrder implements IOrderable
{
    /**
     * @return mixed|void
     * @throws Exception
     */
    function getPaymentMethod()
    {
        throw new Exception("Error payment");
    }

    /**
     * @return mixed|void
     * @throws Exception
     */
    function getShipmentMethod()
    {
        throw new Exception("Error method");
    }

    /**
     * @return mixed|void
     * @throws Exception
     */
    function getDiscount()
    {
        throw new Exception("Error dicount");
    }

    /**
     * @return int|mixed
     */
    function getTotalPrice()
    {
        return 150;
    }

    /**
     * @return mixed|string
     */
    function getClientInfo()
    {
        return "Phone";
    }

    /**
     * @return mixed|void
     * @throws Exception
     */
    function getComment()
    {
        throw new Exception("Error comment");
    }
}