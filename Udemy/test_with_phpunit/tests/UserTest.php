<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase 
{
    public function testReturnsFullName() 
    {
        require 'User.php';

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
}