<?php

use PHPUnit\Framework\TestCase;

class NewMailerTest extends TestCase
{
    public function testSendMessageReturnTrue()
    {
        $this->assertTrue(NewMailer::send('developer@gmail.com', 'Hello'));
    }

    public function testInvalidArgumentExceptionIfEmailIsEmpty()
    {

        $this->expectException(InvalidArgumentException::class);
        NewMailer::send('', '');
    }
}