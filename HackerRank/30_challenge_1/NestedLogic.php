<?php
include_once("../TimeMemoryMeter.php");;

$header = fopen("NestedLogic.txt", "r");

$firstDate = DateTime::createFromFormat(' d m Y', trim(fgets($header)));
$secondDate = DateTime::createFromFormat('d m Y', trim(fgets($header)));

function calculateHackos($firstDate, $secondDate) {
    $dateDiff = date_diff($firstDate, $secondDate);

    print_r($dateDiff);
    echo (int)$secondDate->format('Y') . PHP_EOL;
    echo (int)$firstDate->format('Y') . PHP_EOL;
    if($firstDate < $secondDate) {
        return 0;
    }

    if ((int)$firstDate->format('Y') - (int)$secondDate->format('Y') >= 1) {
        return 10000;
    }

    if ($dateDiff->format('%m') >= 1) {
        return 500 * (int)$dateDiff->format('%m');
    }

    if ($dateDiff->format('%a') >= 1) {
        return 15 * (int)$dateDiff->format('%a');
    }
}

timeMemoryMeterStart();

echo calculateHackos($firstDate, $secondDate) . PHP_EOL;

echo timeMemoryMeterFinish()  . PHP_EOL;