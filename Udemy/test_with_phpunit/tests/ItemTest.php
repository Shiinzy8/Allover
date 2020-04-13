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
        // $item = new ItemChild;
        // // private methods can't be rewrited
        // // and in general private methods shouldn't be tested

        // $this->assertIsString($item->getToken());

        // test private method with reflection
        $item = new Item;

        $reflectior = new ReflectionClass(Item::class);

        $method = $reflectior->getMethod('getToken');
        $method->setAccessible('public');

        $result = $method->invoke($item);

        $this->assertIsString($result);
    }

    public function testPrefixTokenStartsWithPrefix()
    {
        $item = new Item;

        $reflection = new ReflectionClass(Item::class);

        $method = $reflection->getMethod('getToken');
        $method->setAccessible('public');

        $token = $method->invoke($item);

        $method = $reflection->getMethod('getPrefixedToken');
        $method->setAccessible('public');
        
        $result = $method->invokeArgs($item, [$token]);

        // $result = $method->invoke($item);

        $this->assertIsString($result);
        $this->assertStringStartsWith($token, $result);
    }
}