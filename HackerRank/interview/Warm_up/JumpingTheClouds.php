<?php
include_once("../../TimeMemoryMeter.php");

// Complete the jumpingOnClouds function below.
function jumpingOnClouds($c) {
    $jumps = $start = $finish = 0;
    $length = count($c);

    for($i = 1; $i < $length;) {
        if (!$c[$i]) {
            // echo "flat $i $jumps" . PHP_EOL;
            $finish = $i;
            $i++;
            continue;
        }
        // echo "rock $i $jumps"  . PHP_EOL;
        // echo intval(($finish - $start)/2 , 0) . " " . $finish % 2 . " ". $finish . " " . $start . PHP_EOL;
        $diff = $finish - $start;
        $jumps = $start < $finish ? $jumps + intval($diff / 2) + $diff % 2  : $jumps;
        $finish = $start = $i + 1;
        $jumps++;
        $i++;
        // echo $jumps . PHP_EOL;
    }
    $jumps = $start < $finish ? $jumps + intval(($finish - $start) / 2) + ($finish - $start) % 2  : $jumps;
    
    return $jumps;
}

$stdin = fopen("JumpingTheClouds.txt", "r");

fscanf($stdin, "%d\n", $n);
fscanf($stdin, "%[^\n]", $c_temp);

$c = array_map('intval', preg_split('/ /', $c_temp, -1, PREG_SPLIT_NO_EMPTY));

timeMemoryMeterStart();

$result = jumpingOnClouds($c);

echo timeMemoryMeterFinish()  . PHP_EOL;
echo $result . PHP_EOL;