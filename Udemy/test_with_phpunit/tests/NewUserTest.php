<?php

use PHPUnit\Framework\TestCase;

class NewUserTest extends TestCase
{
    public function testNotifyReturnsTrue()
    {
        // $newUser = new NewUser('develop@gmail.com');
        // // $mailer = new NewMailer;
        // $mailer = $this->createMock(NewMailer::class);

        // // once will add aditional assertion
        // $mailer->expects($this->once())->method('sendNoStatic')->willReturn(true);
        // $newUser->setMailer($mailer);
        
        // $this->assertTrue($newUser->notify('Wow'));

        // test with callable
        $newUser = new NewUser('develop@gmail.com');

        // this give us the opportunity to inject any callable which we want
        // $newUser->setNewMailerCallable([NewMailer::class, 'send']);
        // another way to do the same but now we see text from echo not from NewMailer class
        $newUser->setNewMailerCallable(function(){
            echo "mocked";
            return true;
        });

        $this->assertTrue($newUser->notify('Hello'));
    }
}