<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase 
{
    public function testNewQueueIsEmpty()
    {
        $queue = new Queue;

        $this->assertEquals(0, $queue->getCount());

        return $queue; // we added return to use @depends annotation in other functions
    }

    /**
     * @depends testNewQueueIsEmpty
     */
    public function testAnItemIsAddedToTheQueueDepended(Queue $queue) 
    {
        $first = 1;
        $queue->push($first);

        $this->assertEquals($first, $queue->pop());

        $second = 'green';
        $queue->push($second);

        $this->assertEquals($second, $queue->pop());
    }

    /**
     * @depends testNewQueueIsEmpty
     */
    public function testCountIsWorkingProperlyDepended(Queue $queue) 
    {
        $queue->push('green');
        $queue->push('yellow');
        $queue->push('blue');

        $this->assertEquals(3, $queue->getCount());
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