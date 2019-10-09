<?php
    class Difference{
    private $elements=[];
    public $maximumDifference;

    public function __construct($elements) {
        $this->elements = $elements;
    }

    public function ComputeDifference() {
        $this->maximumDifference = abs(max($this->elements) - min($this->elements));
    }

} //End of Difference class  
     
$handler = fopen("Scope.txt", "r");
$N=intval(fgets($handler));
$a =array_map('intval', explode(' ', fgets($handler)));
$d=new Difference($a);
$d->ComputeDifference();
print ($d->maximumDifference . "\n");