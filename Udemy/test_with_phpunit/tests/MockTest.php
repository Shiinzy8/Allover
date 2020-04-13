<?php

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase 
{
    public function testMock() 
    {
        // $mailer = new Mailer;

        // this mock object has same methods as Mailer but they all return null
        $mock =  $this->createMock(Mailer::class);

        // this rewrite the result of the sendMessage method
        $mock->method('sendMessage')->willReturn(true);

        $result = $mock->sendMessage('develop@unit.com', 'Hello');

        // var_dump($result);

        $this->assertEquals(true, $result);
    }
}