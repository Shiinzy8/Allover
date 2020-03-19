<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase 
{
    public function testNewQueueIsEmpty()
    {
        $queue = new Queue;

        $this->assertEquals(0, $queue->getCount());
    }

    public function testCountIsWorkingProperly() 
    {
        $queue = new Queue;

        $queue->push('green');
        $queue->push('yellow');
        $queue->push('blue');

        $this->assertEquals(3, $queue->getCount());
    }

    public function testAnItemIsAddedToTheQueue() 
    {
        $first = 1;
        $queue = new Queue;

        $queue->push($first);

        $this->assertEquals($first, $queue->pop());

        $second = 'green';
        $queue->push($second);

        $this->assertEquals($second, $queue->pop());
    }
}