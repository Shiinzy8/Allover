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
        $item = new Item;

        $this->assertIsInt($item->getID());
    }
}