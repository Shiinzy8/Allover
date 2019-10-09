<?php


namespace App\I\Good_example;


class QuickOrder implements IOrder
{

    function getClientInfo()
    {
        return "Good quick client info";
    }

    function getTotalPrice()
    {
        return 100;
    }
}