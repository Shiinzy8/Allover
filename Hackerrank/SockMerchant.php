<?php
function sockMerchant($n, $ar) {
    $result = 0;

    sort($ar);
    $temp = 0;
    foreach($ar as $value) {
        if ($temp == $value) {
            $result++;
            $temp = 0;
            continue;
        }
        $temp = $value;
    }
    return $result;
}

echo sockMerchant(9, [10,20,20,10,10,30,50,10,20,]) . PHP_EOL; // 3