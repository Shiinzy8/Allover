<?php
//Enter your code here
class Calculator {
    function power(int $n, int $p) {
        if ($n < 0 || $p < 0) {
            throw new Exception("n and p should be non-negative");
        }
        return pow($n, $p);
    }
}

$myCalculator=new Calculator();

$hendler = fopen("MoreExceptions.txt", "r");
$T=intval(fgets($hendler));
while($T-->0){
    list($n, $p)  = explode(" ", trim(fgets($hendler)));
    try{
        $ans=$myCalculator->power($n,$p);
        echo $ans."\n";
    }
    catch(Exception $e){
        echo $e->getMessage()."\n";
    }
}