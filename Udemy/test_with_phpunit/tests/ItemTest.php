<?php

use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testDescriptionnIsNotEmpty()
    {
        $item = new Item;

        $this->assertNotEmpty($item->getDescription());
    }

    public function testIDIsAnInteger()
    {
        // $item = new Item;
        $item = new ItemChild;

        $this->assertIsInt($item->getID());
    }

    public function testTokenIsAString()
    {
        $item = new ItemChild;
        // private methods can't be rewrited
        // and in general private methods shouldn't be tested

        $this->assertIsString($item->getToken());
    }
}