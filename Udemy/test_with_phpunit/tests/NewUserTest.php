<?php

use PHPUnit\Framework\TestCase;

class NewUserTest extends TestCase
{
    public function testNotifyReturnsTrue()
    {
        $newUser = new NewUser('develop@gmail.com');
        // $mailer = new NewMailer;
        $mailer = $this->createMock(NewMailer::class);
        $newUser->setMailer($mailer);
        
        $this->assertTrue($newUser->notify('Wow'));
    }
}