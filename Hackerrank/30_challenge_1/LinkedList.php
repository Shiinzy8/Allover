<?php
class Node{
    public $data;
    public $next;
    function __construct($d)
    {
        $this->data = $d;
        $this->next = NULL;
    }
}

class Solution{

    function insert($head, $data){
        if (!$head) {
            $head = new Node($data);
            return $head;
        }
        
        $start = $head;
        while($start->next){
            $start = $start->next;
        }

        $start->next = new Node($data);

        return $head;
    }
    
    function display($head){
        $start = $head;
        while($start){
            echo $start->data,' ';
            $start = $start->next;
        }
    }
}

$header = fopen("LinkedList.txt", "r");
$T=intval(fgets($header));
$head=null;
$mylist=new Solution();
while($T-->0){
    $data=intval(fgets($header));
    // echo $data . PHP_EOL;
    $head=$mylist->insert($head,$data);
}
$mylist->display($head);
