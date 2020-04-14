<?php

/**
 * Order
 * 
 * An example order class
 */
class OrderSpy
{
    /**
     * Quantity
     * @var int
     */
    public $quantity;

    /**
     * Unit price
     * @var float
     */
    public $unit_price;

    /**
     * Total amount
     * @var float
     */
    public $amount;

    /**
     * Constructor
     * 
     * @param int $quantity Quantity
     * @param float $unit_price Unit price
     * 
     * @return void
     */
    public function __construct(int $quantity, float $unit_price)
    {
        $this->quantity = $quantity;
        $this->unit_price = $unit_price;

        $this->amount = $this->quantity * $this->unit_price;
    }

    /**
     * Charge the total amount
     * 
     * @param PaymentGateway $gateway Payment gateway object
     */
    public function process(PaymentGateway $gateway)
    {
        $gateway->charge($this->amount);
    }
}