<?php

use PHPUnit\Framework\TestCase;

class QueueStaticTest extends TestCase 
{
    /** @var Queue */
    protected static$queue;

    protected function setUp(): void 
    { 
        static::$queue->clear();
    }
    protected function tearDown(): void { }

    /**
     * Method runs once before all other methods
     */
    public static function setUpBeforeClass(): void
    {
        static::$queue = new Queue;
    }

    /**
     * Method runs once after all other methods
     */
    public static function tearDownAfterClass(): void
    {
        static::$queue = null;   
    }

    public function testNewQueueIsEmpty(): Queue
    {
        $this->assertEquals(0, static::$queue->getCount());

        return static::$queue; // we added return to use @depends annotation in other functions
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

        static::$queue->push('green');
        static::$queue->push('yellow');
        static::$queue->push('blue');

        $this->assertEquals(3, static::$queue->getCount());
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
        static::$queue->push('first');
        static::$queue->push('second');

        $this->assertEquals('first', static::$queue->pop());
    }

    public function testMaxNumberOfItemsCanBeAdded() 
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            static::$queue->push($i);
        }

        $this->expectException(QueueException::class);

        static::$queue->push(6);
        
        $this->assertEquals(Queue::MAX_ITEMS, static::$queue->getCount());
    }
}