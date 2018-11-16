<?php

/**
 * находим сначала median в отсортированной последовательности
 * если по середине 2 числа то mean между ними
 * потом находим median двух половин и получаем 4 отрезка
 */
function quartlies($count, $arrElements, $finish = false) {
    print_r($arrElements);
    $arrElements = array_values($arrElements);

    if($count%2) {
        $median = $arrElements[$count/2];
        echo "нечетное " . $median . PHP_EOL;
        $firstHalf = array_slice($arrElements, 0, $count/2);
        $secondHalf = array_slice($arrElements, $count/2 + 1);
    } else {
        $median = ($arrElements[$count/2] + $arrElements[$count/2 - 1]) / 2;
        echo "четное " . $median . PHP_EOL;
        $firstHalf = array_slice($arrElements, 0, $count/2);
        $secondHalf = array_slice($arrElements, $count/2);
    }
    
    if (!$finish) quartlies(count($firstHalf), $firstHalf, true);
    echo $median . PHP_EOL;
    if (!$finish) quartlies(count($secondHalf), $secondHalf, true);
    
    return;
}
// $stdin = fopen("php://stdin", "r");
$stdin = fopen("Quartiles.txt", "r");

fscanf($stdin, "%d\n", $count);
fscanf($stdin, "%[^\n]", $string);

$arrElements = explode(' ', $string);
sort($arrElements);

quartlies($count, $arrElements);

fclose($stdin);