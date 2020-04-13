<?php

use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase 
{
    public function tearDown(): void 
    {
        Mockery::close();
    }

    public function testOrderIsProcessed()
    {
        // $gateway = new PaymentGateway(); // PaymentGateway doesn't exist

        // $gateway = $this->createMock('PaymentGateway'); // we cann't creat Mock from class which is not exist
        $gateway = $this->getMockBuilder('PaymentGateway')
            ->setMethods(['charge']) // this method by default will return null
            ->getMock();

        // this line rewrite return statment of the 'charge' method
        $gateway->expects($this->once())
            ->method('charge')
            ->with($this->equalTo(200))
            ->willReturn(true);

        $order = new Order($gateway);
        $order->amount = 200;

        $this->assertTrue($order->process());
    }

    public function testOrderIsProcessedUsingMockery() 
    {
        $gateway = Mockery::mock('PaymentGateway');

        $gateway->shouldReceive('charge')
            ->once() // calles once
            ->with(200) // with argument 200 
            ->andReturn(true); // and return true

        $order = new Order($gateway);
        $order->amount = 200;

        $this->assertTrue($order->process());
    }
}