<?php

$arr = [
    [1,1,1,0,0,0],
    [0,1,0,0,0,0],
    [1,1,1,0,0,0],
    [0,0,2,4,4,0],
    [0,0,0,2,0,0],
    [0,0,1,2,4,0],
];

$arr2 = [
    [-9,-9,-9, 1,1,1],
    [ 0,-9, 0, 4,3,2],
    [-9,-9,-9, 1,2,3],
    [ 0, 0, 8, 6,6,0],
    [ 0, 0, 0,-2,0,0],
    [ 0, 0, 1, 2,4,0],
];

$arr3 = [
    [-1,-1, 0,-9,-2,-2],
    [-2,-1,-6,-8,-2,-5],
    [-1,-1,-1,-2,-3,-4],
    [-1,-9,-2,-4,-4,-5],
    [-7,-3,-3,-2,-9,-9],
    [-1,-3,-1,-2,-4,-5],
];

$arr4 = [
    [ 0,-4,-6, 0,-7,-6],
    [-1,-2,-6,-8,-3,-1],
    [-8,-4,-2,-8,-8,-6],
    [-3,-1,-2,-5,-7,-4],
    [-3,-5,-3,-6,-6,-6],
    [-3,-6, 0,-8,-6,-7],
];

function hourglassSum($arr) {
    $maxX = count($arr[0]) - 2;
    $maxY = count($arr) - 2;

    $x = 0;
    $y = 0;

    $resultArray = [];
    $result = false;
    for($i = 1; $i <= $maxY; $i++) {
        for ($j = 1; $j <= $maxX; $j++) {
            // echo $arr[$i-1][$j-1] . " " . $arr[$i-1][$j] . " " . $arr[$i-1][$j+1] . PHP_EOL;
            // echo $arr[$i][$j] . PHP_EOL;
            // echo $arr[$i+1][$j-1] . " " . $arr[$i+1][$j] . " " . $arr[$i+1][$j+1] . PHP_EOL;
            $summ = 0;
            $summ += $arr[$i-1][$j-1] + $arr[$i-1][$j] + $arr[$i-1][$j+1];
            $summ +=  $arr[$i][$j];
            $summ += $arr[$i+1][$j-1] + $arr[$i+1][$j] + $arr[$i+1][$j+1];

            $resultArray[$i][$j] = $summ;
            $result = $result === false || $summ > $result ? $summ : $result;
        }
    }

    return $result;
}

echo hourglassSum($arr) . PHP_EOL; // 19
echo hourglassSum($arr2) . PHP_EOL; // 28
echo hourglassSum($arr3) . PHP_EOL; // -6
echo hourglassSum($arr4) . PHP_EOL; // -19