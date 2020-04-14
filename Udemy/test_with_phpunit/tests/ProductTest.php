<?php

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testIDIsAnInteger()
    {
        $product = new Product;

        $reflectior = new ReflectionClass(Product::class);
        $property = $reflectior->getProperty('product_id');
        $property->setAccessible('public');

        $result = $property->getValue($product);

        $this->assertIsInt($result);
    }
}