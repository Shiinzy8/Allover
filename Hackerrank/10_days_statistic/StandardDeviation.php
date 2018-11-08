<?php

/**
 * что вычислить надо взять модуль разници каждого числа и расстояния до середины списка
 * и поделить на количество элементов в списке
 * 
 * второй способ можно возвести в квадрат каждую разницу между числом и среднего значения
 * вычислить сумму всех таких значений и поделить их на количество элементов в списке
 * а потом из результата извелчь квадратный корень
 */
function strandardDeviation(int $count, array $arrElements) {
    $average = number_format(array_sum($arrElements)/$count, 1, '.', '');
    $result = 0;

    foreach($arrElements as $key=>$element) {
        // echo $element . ' ' . $average . PHP_EOL;
        $result += pow($element - $average, 2);
    }

    echo number_format(sqrt($result/$count), 1, '.', '') . PHP_EOL;
}

// $stdin = fopen("php://stdin", "r");
$stdin = fopen("StandardDeviation.txt", "r");

fscanf($stdin, "%d\n", $count);
fscanf($stdin, "%[^\n]", $arrElements);

$arrElements = explode(' ', $arrElements);

strandardDeviation($count, $arrElements);

fclose($stdin);