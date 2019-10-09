<?php

/**
 * вычисляем сумму всех чилсел перемноженную на их вес
 * потом эту сумму делем на сумму весов
 * название средневзешенное занчение
 */
function weightMean(array $arrElements,array $arrWeights) {
    $result = 0;
    $weightSumm = 0;

    foreach($arrElements as $key=>$element) {
        $result += $element * $arrWeights[$key];
        $weightSumm += $arrWeights[$key]; 
    }

    echo number_format ($result/$weightSumm, 1) . PHP_EOL;
}

// $stdin = fopen("php://stdin", "r");
$stdin = fopen("WeightMean.txt", "r");

fscanf($stdin, "%d\n", $count);
fscanf($stdin, "%[^\n]", $arrElements);
fscanf($stdin, "%[^\n]", $arrWeights);

$arrElements = explode(' ', $arrElements);
$arrWeights = explode(' ', $arrWeights);

weightMean($arrElements, $arrWeights);

fclose($stdin);