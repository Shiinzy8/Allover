<?php

/**
 * вычисляет сумму всех элементов и делим на их количество
 */
function mean($count, $arrElements) {
    echo round(array_sum($arrElements)/$count, 1) . PHP_EOL;
}

/**
 * сортируем по возрастанию и выбирает значение по середине списка
 * если четное количество то вычисляем среднее от суммы двух элементов
 */
function median($count, $arrElements) {
    if ($count%2) {
        $result = $arrElements[intdiv($count, 2)];
    } else {
        $result =  $arrElements[$count/2] + $arrElements[$count/2 - 1];
        $result = round($result/2, 1);
    }

    echo $result . PHP_EOL;
}

/**
 * находим самое популярное число, сортируем по возрастанию
 * и смотрим какое число повторяется чаще всего
 * при одинаковом количестве повторений выбираем наименьшее
 */
function mode($count, $arrElements) {
    $arrElements = array_count_values($arrElements);
    arsort($arrElements);
    
    $max = 0;
    $resultArray = [];
    foreach ($arrElements as $key => $value) {
        $max = $value > $max ? $value : $max;
        if ($value == $max) {
            $resultArray[] = $key;
        } else {
            break;
        }
    }

    echo min($resultArray) . PHP_EOL;
}

// $stdin = fopen("MeanMedianMode.txt", "r");
$stdin = fopen("https://hr-testcases-us-east-1.s3.amazonaws.com/21180/input04.txt?AWSAccessKeyId=AKIAJ4WZFDFQTZRGO3QA&Expires=1541595121&Signature=AQ%2BlDrBDiGWCjXsGaOZgdGL%2FwHc%3D&response-content-type=text%2Fplain", "r");

fscanf($stdin, "%d\n", $count);
fscanf($stdin, "%[^\n]", $string);

$arrElements = explode(' ', $string);
sort($arrElements);

mean($count, $arrElements);
median($count, $arrElements);
mode($count, $arrElements);

fclose($stdin);