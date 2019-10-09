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

	function removeDuplicates($head){
        $start = $head;
        while ($start->next != null) {
            if ($start->data == $start->next->data) {
                $start->next = $start->next->next != null ? $start->next->next : null;
            } else {
                $start = $start->next;
            }
        }
        return $head;
    }

    function insert($head,$data){
       $p=new Node($data);
       if($head==null){
            $head=$p;
       }  
       else if($head->next==null){
            $head->next=$p;
       } 
       else{
            $start=$head;
            while($start->next!=null){
                    $start=$start->next;
            }
            $start->next=$p;
       } 
       return $head;
    }

    function display($head){
        $start=$head;
        while($start){
           echo $start->data,' ';
           $start=$start->next;
        }
    }
}
$header = fopen("MoreLinkedLists.txt", "r");
$T=intval(fgets($header));
$head=null;
$mylist=new Solution();
while($T-->0){
    $data=intval(fgets($header));
    $head=$mylist->insert($head,$data);
}
$head=$mylist->removeDuplicates($head);
$mylist->display($head);