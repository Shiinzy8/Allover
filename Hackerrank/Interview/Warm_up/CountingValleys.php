<?php

// Complete the countingValleys function below.
function countingValleys($n, $s) {
    $arr = str_split($s);
    $valley = 0;
    $countValley = 0;

    foreach ($arr as $step) {
        // echo $step . " w" . $valley . PHP_EOL;
        if ($step == 'D') $valley--;
        if ($step == 'U') $valley++;
        if ($valley == 0 && $step == 'U') $countValley++;
    }

    return $countValley;
}

$stdin = fopen("CountingValleys.txt", "r");

fscanf($stdin, "%d\n", $n);

$s = '';
fscanf($stdin, "%[^\n]", $s);

$result = countingValleys($n, $s);

echo $result . PHP_EOL;