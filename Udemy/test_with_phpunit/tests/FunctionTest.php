<?php

use PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase
{
    public function testOperationOfAddReturnCorrectSumSucces() 
    {
        require 'functions.php';

        $this->assertEquals(4, add(2, 2));
        $this->assertEquals(8, add(4, 4));
        $this->assertEquals(9, add(3, 6));
    }
}