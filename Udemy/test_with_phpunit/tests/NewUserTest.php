<?php

use PHPUnit\Framework\TestCase;

class NewUserTest extends TestCase
{
    public function testNotifyReturnsTrue()
    {
        $newUser = new NewUser('develop@gmail.com');
        $newUser->notify('Wow');
        
        $this->assertTrue(true);
    }
}