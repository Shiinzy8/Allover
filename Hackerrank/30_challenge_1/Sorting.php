<?php

$handle = fopen("Sorting.txt", "r");
fscanf($handle, "%d",$n);
$a_temp = fgets($handle);
$a = explode(" ",$a_temp);
$a = array_map('intval', $a);
// Write Your Code Here

$numSwaps = 0;

do {
    $unsort = false;
    for ($i = 0; $i < $n - 1; $i++) {
        if ($a[$i] > $a[$i + 1]) {
            $unsort = $unsort ? $unsort : true;
            $a[$i] = $a[$i] + $a[$i + 1];
            $a[$i + 1] = $a[$i] - $a[$i + 1];
            $a[$i] = $a[$i] - $a[$i + 1];
            $numSwaps++;
        }
    }
} while ($unsort);

echo "Array is sorted in {$numSwaps} swaps.\n";
echo "First Element: {$a[0]}\n";
echo "Last Element: {$a[$n - 1]}\n";