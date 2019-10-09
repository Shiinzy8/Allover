<?php

include_once("../../TimeMemoryMeter.php");

// Complete the twoStrings function below.
function twoStrings($s1, $s2) {
    $arrS1 = str_split($s1);
    $arrS2 = str_split($s2);

    //более быстрый вариант
    if (empty(array_intersect($arrS1, $arrS2))) {
        return 'NO';
    }
    return 'YES';

    if (count($arrS1) > count($arrS2)) {
        $short = $arrS2;
        $long = $arrS1;
    } else {
        $short = $arrS1;
        $long = $arrS2;
    }

    
    foreach ($short as $key => $value) {
        if (!in_array($value, $long)) continue;
        return 'YES';

    }

    return 'NO';
}
$stdin = fopen("TwoStrings.txt", "r");

fscanf($stdin, "%d\n", $q);

timeMemoryMeterStart();
for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $s1 = '';
    fscanf($stdin, "%[^\n]", $s1);

    $s2 = '';
    fscanf($stdin, "%[^\n]", $s2);

    $result = twoStrings($s1, $s2);
    echo $result . PHP_EOL;
}
echo timeMemoryMeterFinish()  . PHP_EOL;

fclose($stdin);