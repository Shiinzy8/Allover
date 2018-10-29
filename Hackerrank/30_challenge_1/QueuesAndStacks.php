<?php

class Solution {

    private $queue = [];
    private $stack = [];

    // push to the stack
    public function pushCharacter(string $symbol) {
        array_unshift($this->stack, $symbol);
    }

    // add to the queue
    public function enqueueCharacter(string $symbol) {
        $this->queue[] = $symbol;
    }

    // get from the stack
    public function popCharacter() {
        return array_shift($this->stack);
    }

    // get from the queue
    public function dequeueCharacter() {
        return array_shift($this->queue);
    }

    public function printBoth() {
        print_r($this->queue);
        print_r($this->stack);
    }
}

// read the string s
$s = fgets(fopen("QueuesAndStacks.txt", "r"));
// create the Solution class object p
$obj = new Solution();

$len = strlen($s);
$isPalindrome = true;

// push/enqueue all the characters of string s to stack
for ($i = 0; $i < $len; $i++) {
    $obj->pushCharacter($s{$i});
    $obj->enqueueCharacter($s{$i});
}

/*
pop the top character from stack
dequeue the first character from queue
compare both the characters
*/
for ($i = 0; $i < $len / 2; $i++) {
    if($obj->popCharacter() != $obj->dequeueCharacter()){
        $isPalindrome = false;
    	
        break;
    }
}

//finally print whether string s is palindrome or not.
if ($isPalindrome)
    echo "The word, ".$s.", is a palindrome." . PHP_EOL;
else
    echo "The word, ".$s.", is not a palindrome." . PHP_EOL;