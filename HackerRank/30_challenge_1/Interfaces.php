<?php
interface AdvancedArithmetic{
    public function divisorSum($n);
}

/*
 * Write your code here
 */
class Calculator implements AdvancedArithmetic {
    function divisorSum($n) {
        $sum = 1;

        for($i = 2; $i < $n; $i++) {
            $sum = $n % $i ? $sum : $sum + $i;
        }

        return $n == 1 ? $sum : $sum + $n;
    }
}

$n=intval(fgets(fopen("Interfaces.txt", "r")));
$myCalculator=new Calculator();
if($myCalculator instanceof AdvancedArithmetic)//checking if Calculator has implemented AdvancedArithemtic
{
    $sum=$myCalculator->divisorSum($n);
    echo "I implemented: AdvancedArithmetic\n".$sum;
}
else
{
    echo "Wrong answer";// You will get this output if you dont implement
}
echo PHP_EOL;