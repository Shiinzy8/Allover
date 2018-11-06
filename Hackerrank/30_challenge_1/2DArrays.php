<?php
include_once("../TimeMemoryMeter.php");
$stdin = fopen("2DArrays.txt", "r");

$arr = [];

for ($i = 0; $i < 6; $i++) {
    fscanf($stdin, "%[^\n]", $arr_temp);
    $arr[] = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
}

fclose($stdin);

timeMemoryMeterStart();


$result = [];
$maxI = count($arr) - 3;
$maxJ = count($arr[1]) - 3;

for ($i = 0; $i <= $maxI; $i++) {
    for ($j = 0; $j <= $maxJ; $j++) {
        $first = $arr[$i][$j] + $arr[$i][$j + 1] + $arr[$i][$j + 2];
        $second = $arr[$i + 1][$j + 1];
        $third = $arr[$i + 2][$j] + $arr[$i + 2][$j + 1] + $arr[$i + 2][$j + 2];
        $result[] = $first + $second + $third;
    }
}

echo max($result) . PHP_EOL;

echo timeMemoryMeterFinish()  . PHP_EOL;
