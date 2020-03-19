<?php

use PHPUnit\Framework\TestCase;

/** 
 * Class ExampleTest
 * 
 * @category Test
 * @package  Test
 * @author   Andrii Arkhyliuk <shiinzy8@gmail.com>
 */
class ExampleTest extends TestCase
{
    public function testSuccess() 
    {
        $this->assertEquals(4, 2+2);
    }

    public function testFailure()
    {
        $this->assertEquals(5, 2+2);
    }
}