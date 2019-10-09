<?php
// In a single toss of 2 fair (evenly-weighted) six-sided dice, find the probability that their sum will be at most 9.
// Кидая один раз 2 одинаковых 6-гранных кубика, найти вероятность того что сумма будет в меньше или равна 9
$firstDiceSides = 6;
$secondDiceSides = 6;
$max = 9;

$allCombinationsCount = $firstDiceSides * $secondDiceSides;
$allCombinations = [
    [1,1],
    [1,2],
    [1,3],
    [1,4],
    [1,5],
    [1,6],
    [2,1],
    [2,2],
    [2,3],
    [2,4],
    [2,5],
    [2,6],
    [3,1],
    [3,2],
    [3,3],
    [3,4],
    [3,5],
    [3,6],
    [4,1],
    [4,2],
    [4,3],
    [4,4],
    [4,5],
    [4,6],
    [5,1],
    [5,2],
    [5,3],
    [5,4],
    [5,5],
    [6,6],
    [6,1],
    [6,2],
    [6,3],
    [6,4],
    [6,5],
    [6,6],
];

$unsuitableCOmbinationsCount = 0;
$unsuitableCOmbinations = [];

foreach($allCombinations as $key => $combination) {
    if ($combination[0] + $combination[1] > $max) {
        $unsuitableCOmbinations[] = $combination;
    }
}

$unsuitableCOmbinationsCount = count($unsuitableCOmbinations);
$suitabelCombinationsCount = $allCombinationsCount - $unsuitableCOmbinationsCount;

echo("allCombinationsCount: $allCombinationsCount") . PHP_EOL;
echo("suitabelCombinationsCount: $suitabelCombinationsCount") . PHP_EOL;
echo("unsuitableCOmbinationsCount: $unsuitableCOmbinationsCount") . PHP_EOL;

$result = $suitabelCombinationsCount / $allCombinationsCount;

echo("result: $result, $suitabelCombinationsCount / $allCombinationsCount") . PHP_EOL;