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
    /**
     * names of methods must begins from "test"
     */
    public function testAddingTwoPlusTwoResultsInFourSuccess() 
    {
        $this->assertEquals(4, 2+2);
    }

    public function testAddingTwoPlusTwoResultsInFourFailure()
    {
        $this->assertEquals(5, 2+2);
    }

    public function testAddingTwoPlusTwoResultsInFiveSuccess() 
    {
        $this->assertNotEquals(5, 2+2);
    }
}