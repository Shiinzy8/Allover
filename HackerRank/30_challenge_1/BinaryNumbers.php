<?php

$stdin = fopen("BinaryNumbers.txt", "r");

fscanf($stdin, "%d\n", $n);

function getSum($str, $length, $value = 1, $arr = [], $position = 0, $arrIndex = 0) {
    if ($position <= $length - 1) {
        if ($str[$position] == $value) {
            $arr[$arrIndex] = empty($arr[$arrIndex]) ? 1 : $arr[$arrIndex] + 1;
            return getSum($str, $length, $value, $arr, $position + 1, $arrIndex);
        } else {
            return getSum($str, $length, $value, $arr, $position + 1, $arrIndex + 1);
        }
    } else {
        return max($arr);
    }
}

echo getSum(decbin($n), strlen(decbin($n))) . PHP_EOL;

fclose($stdin);