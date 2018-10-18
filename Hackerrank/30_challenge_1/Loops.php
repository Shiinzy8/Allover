<?php
$stdin = fopen("Loops.txt", "r");

fscanf($stdin, "%d\n", $n);

fclose($stdin);

for($i = 1; $i <= 10; $i++) {
    echo "$n x $i = " . $n * $i . PHP_EOL;
}