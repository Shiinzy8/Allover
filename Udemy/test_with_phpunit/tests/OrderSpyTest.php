<?php

use PHPUnit\Framework\TestCase;

class OrderSpyTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testOrderIsProcessedUsingAMock()
    {
        $order = new OrderSpy(3, 1.99);

        $this->assertEquals(5.97, $order->amount);

        $gateway_mock = Mockery::mock('PaymentGateway');

        $gateway_mock->shouldReceive('charge')
                     ->once() // called once
                     ->with(5.97); // returned value
        
        $order->process($gateway_mock);
    }

    public function testorderIsProcessedUsingASpy() 
    {
        $order = new OrderSpy(3, 1.99);

        $this->assertEquals(5.97, $order->amount);

        $gateway_mock = Mockery::spy('PaymentGateway');

        $order->process($gateway_mock); // we run method process before we add all to the mock

        $gateway_mock->shouldHaveReceived('charge')
                     ->once()
                     ->with(5.97); // we specify everything after
    }
}