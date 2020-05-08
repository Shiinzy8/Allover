<?php
include_once("../../TimeMemoryMeter.php");

// Complete the repeatedString function below.
function repeatedString($s, $n) {
    if ($s === 'a') {
        return $n;
    }

    $length = strlen($s);
    // echo $length . PHP_EOL;
    // echo intval($n / $length) . PHP_EOL;
    // echo substr_count($s, 'a') . PHP_EOL;
    $countA = intval($n / $length) * substr_count($s, 'a');
    // echo $countA . PHP_EOL;
    // echo $n % $length . PHP_EOL;
    // echo substr($s, 0, ($n % $length)) . PHP_EOL;
    // echo substr_count(substr($s, 0, ($n % $length)), 'a') . PHP_EOL;
    $countA += substr_count(substr($s, 0, ($n % $length)), 'a');
    // echo $countA . PHP_EOL;

    return $countA;
}

$stdin = fopen("RepeatedString.txt", "r");

$s = '';
fscanf($stdin, "%[^\n]", $s);

fscanf($stdin, "%ld\n", $n);

timeMemoryMeterStart();

$result = repeatedString($s, $n);

echo timeMemoryMeterFinish()  . PHP_EOL;
echo $result . PHP_EOL;