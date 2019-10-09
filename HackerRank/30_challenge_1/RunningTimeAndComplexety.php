<?php
include_once("../TimeMemoryMeter.php");;

$header = fopen("RunningTimeAndComplexety.txt", "r");
$T=intval(fgets($header));
timeMemoryMeterStart();
while($T-->0){
    $data=intval(fgets($header));
    $prime = true;
    // $max=$data/2;
    // for ($i = 2; $i <= $max; $i++) {
    //     if ($data % $i == 0) {
    //         $prime = false;
    //         break;
    //     }
    // }
    
    if ($data == 2) {
        echo 'Prime' . PHP_EOL; continue;
    }

    if ($data == 3) {
        echo 'Prime' . PHP_EOL; continue;
    }

    if ($data % 2 == 0) {
        echo 'Not prime ' . PHP_EOL; continue;
    }
    if ($data % 3 == 0) {
        echo 'Not prime ' . PHP_EOL; continue;
    }

    $i = 5;
    $w = 2;

    while ($i * $i <= $data) {
        if ($data % $i == 0) {
            $prime = false;
        }

        $i += $w;
        $w = 6 - $w;
    }
    
    echo $data > 1 && $prime ? 'Prime' : 'Not prime';
    echo PHP_EOL;
}

echo timeMemoryMeterFinish()  . PHP_EOL;