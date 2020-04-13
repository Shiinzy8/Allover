<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase 
{
    /** @var Queue */
    protected $queue;

    /**
     * PHPUnit runs it before each method
     */
    protected function setUp(): void
    {
        $this->queue = new Queue; // this is fixture
    }

    /** 
     * PHPUnit runs it after each method
     */
    protected function tearDown(): void
    {
        unset($this->queue);
    }

    /**
     * Method is runs once before first test of the class
     */
    public static function setUpBeforeClass(): void
    {
        static::$queue = new Queue();   
    }

    /**
     * Methos is runs once after last test of the class
     */
    public static function tearDownAfterClass(): void
    {
        static::$queue = null;
    }

    public function testNewQueueIsEmpty(): Queue
    {
        // comment both after we created setUp method
        // $queue = new Queue;
        // $this->assertEquals(0, queue->getCount());

        $this->assertEquals(0, $this->queue->getCount());

        return $this->queue; // we added return to use @depends annotation in other functions
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
        // commnt after we creaetd setUp method
        // $queue = new Queue;

        $this->queue->push('green');
        $this->queue->push('yellow');
        $this->queue->push('blue');

        $this->assertEquals(3, $this->queue->getCount());
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

    public function testAnItemIsRemovedFromTheFrontOfTheQueue() 
    {
        $this->queue->push('first');
        $this->queue->push('second');

        $this->assertEquals('first', $this->queue->pop());
    }
}