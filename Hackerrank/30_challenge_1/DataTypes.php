<?php
$handle = fopen ("DataTypes.txt","r");
$i = 4;
$d = 4.0;
$s = "HackerRank ";

$ar_temp = [];
while($line = fgets($handle)) {
    $ar_temp[] = $line;
}

// Declare second integer, double, and String variables.
$a = (int)$ar_temp[0];
$b = (float)$ar_temp[1];
$c = (string)$ar_temp[2];
// Read and save an integer, double, and String to your variables.

// Print the sum of both integer variables on a new line.

// Print the sum of the double variables on a new line.

// Concatenate and print the String variables on a new line
// The 's' variable above should be printed first.
echo intval($i + $a) . PHP_EOL;
echo number_format($d + $b, 1) . PHP_EOL;
echo $s . $c . PHP_EOL;

fclose($handle);