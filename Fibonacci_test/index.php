<?php
/**
 * Created by PhpStorm.
 * User: ADAM
 * Date: 25.01.2017
 * Time: 9:29
 * Создать ряд фибоначчи рекурсией
 */
function Fibonacci($n) {
    return ($n <= 1)? $n : Fibonacci($n-1) + Fibonacci($n-2);
}

function RowFibonacci($x) {
    for ($i = 0; $i < $x ; $i++) {
        echo Fibonacci($i)." ";
    }
}

echo RowFibonacci(4);