<?php

// Complete the factorial function below.
function factorial($n) {
    return ($n <= 1) ? $n : $n * factorial($n - 1);
}

$stdin = fopen("Factorial.txt", "r");

fscanf($stdin, "%d\n", $n);

echo $result = factorial($n) . PHP_EOL;