<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase 
{
    /**
     * this method now is a felure becase we add autoloading for composer
     * and move file User.php
     */
    public function testReturnsFullName() 
    {
        // require 'User.php'; // we commet this file because we added autoload in composer

        $user = new User;
        
        $user->first_name = "Andrii";
        $user->surname = "Mirniy";

        $this->assertEquals("Andrii Mirniy", $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault() 
    {
        $user = new User;

        $this->assertEquals("", $user->getFullName());
    }

    public function userHasFirstName() 
    {
        $user = new User;

        $user->first_name = "First";

        $this->assertEquals("First", $user->getFullName());
    }

    /**
     * @test
     */
    public function user_has_first_name() 
    {
        $user = new User;

        $user->first_name = "First";

        $this->assertEquals("First", $user->getFullName());
    }

    public function testNotificationIsSent() 
    {
        $user = new User();

        $user->email = 'develop@unit.com';
        $user->setMailer(new Mailer());

        $result = $user->notify('Hello');

        // $this->assertEquals($result, true);
        $this->assertTrue($user->notify('Hello'));
    }

    public function testNotificationIsSentMock() 
    {
        $user = new User();

        // $mock = $this->createMock(Mailer::class);
        // $mock->method('sendMessage')->willReturn(true);

        // $mock = $this->createMock(User::class);

        // $mock->method('nofity')->willReturn(true);

        // $user->setMailer(new Mailer());
        $user->email = 'develop@unit.com';

        $mockMailer = $this->createMock(Mailer::class);
        $mockMailer->method('sendMessage')->willReturn(true);

        $user->setMailer($mockMailer);

        $this->assertTrue($user->notify('Hello'));
    }
}