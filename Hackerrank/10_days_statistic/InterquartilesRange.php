<?php

function interQuartlies($count, $arrElementsX, $arrElementsY) {
    $arrElements = [];
    foreach($arrElementsX as $key => $value) {
        $tempArr = array_fill(0, $arrElementsY[$key], $value);
        $arrElements = array_merge($arrElements, $tempArr);
    }
    sort($arrElements);
    $arrElements = array_values($arrElements);
    $count = count($arrElements);

    // print_r($arrElements);
    if($count%2) {
        $firstHalf = array_slice($arrElements, 0, $count/2);
        $secondHalf = array_slice($arrElements, $count/2 + 1);
    } else {
        $firstHalf = array_slice($arrElements, 0, $count/2);
        $secondHalf = array_slice($arrElements, $count/2);
    }

    $firstHalf = median(count($firstHalf), $firstHalf);
    $secondHalf = median(count($secondHalf), $secondHalf);

    echo number_format($secondHalf - $firstHalf, 1, '.', '') . PHP_EOL;
    
    return;
}

function median($count, $arrElements) {
    // print_r($arrElements);
    if ($count%2) {
        $result = $arrElements[intdiv($count, 2)];
    } else {
        $result =  $arrElements[$count/2] + $arrElements[$count/2 - 1];
        $result = round($result/2, 1);
    }
    return $result;
}
// $stdin = fopen("php://stdin", "r");
$stdin = fopen("InterquartilesRange.txt", "r");

fscanf($stdin, "%d\n", $count);
fscanf($stdin, "%[^\n]", $stringX);
fscanf($stdin, "%[^\n]", $stringY);

$arrElementsX = explode(' ', $stringX);
$arrElementsY = explode(' ', $stringY);

interQuartlies($count, $arrElementsX, $arrElementsY);

fclose($stdin);