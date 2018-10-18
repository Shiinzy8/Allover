<?php
$a = 'xacxzaa';
$b = 'fxaazxacaaxzoecazxaxaz'; //4
// $a = 'abc';
// $b = 'fabcbaf'; //3

$lengthA = strlen($a);
$lengthB = strlen($b);
$count = 0;

$arr = str_split($a);
$outArr = [];
$inArr = [];

for ($i = 0; $i < $lengthB; $i++) {
    // echo $b[$i] . PHP_EOL;
    // проверяем есть ли символ в строке
    if (strpos($a, $b[$i]) === false) {
        // символа нет в а, делаем чистый массив из а
        // echo 'символа нет получаем чистый массив' . PHP_EOL;
        $arr = str_split($a);
        continue;
    } 
    
    // символ есть в строке а
    // echo 'символ есть, продолжаем проверку на вхождение в arr, arr до' . PHP_EOL;
    // если массив arr пустой значит у нас возможно новое совпадение с этим символом 
    // надо проверить равен ли он тому что вышле из-за дилны строки а
    if (empty($arr)) {
        $inArr[] = $b[$i];
        sort($inArr);
        $outArr[] = $b[$i - $lengthA];
        sort($outArr);
        // echo 'arr in' . PHP_EOL;
        // print_r($inArr);
        // echo 'arr out' . PHP_EOL;
        // print_r($outArr);
    }

    // проверяем нахождение в массиве arr
    // print_r($arr);
    if (($key = array_search($b[$i], $arr)) !== false) {
        // есть такой в массиве - символ удалаем
        // echo 'в массиве arr значение есть ключ ' . $k = array_search($b[$i], $arr) . ', убираем его arr сейчас ' . $key . PHP_EOL;
        unset($arr[$key]);
        // print_r($arr);
    }

    // делам проверку пусой массив arr или нет
    // TODO проверку усложнить что б проверять in and out arrays
    if (empty($arr) && $inArr == $outArr) {
        // echo 'пустой массив arr' . PHP_EOL;
        $inArr = $outArr = [];
        $count++;
    }
}

echo $count . PHP_EOL;