<?php

function fibonacci($n) {
    return ($n <= 1) ? $n : Fibonacci($n-1) + Fibonacci($n-2);
}

function rowFibonacci($x) {
    for ($i = 0; $i < $x ; $i++) {
        echo Fibonacci($i)." ";
    }
}

echo rowFibonacci(4);