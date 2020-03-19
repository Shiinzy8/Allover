<?php

/**
 * Queue
 *
 * A first-in, first-out data structure
 */
class Queue
{

    /**
     * Queue items
     * @var array
     */
    protected $items = [];

    /**
     * Add an item to the end of the queue
     *
     * @param mixed $item The item
     */
    public function push($item): void
    {
        $this->items[] = $item;
    }

    /**
     * Take an item off the head of the queue
     *
     * @return mixed The item
     */
    public function pop()
    {
        // return array_pop($this->items); // it is a bag, we need to return first item
        return array_shift($this->items);
    }

    /**
     * Get the total number of items in the queue
     *
     * @return integer The number of items
     */
    public function getCount(): int
    {
        return count($this->items);
    }

    /**
     * Clear the array
     */
    public function clear(): void 
    {
        $this->items = [];
    }
}
