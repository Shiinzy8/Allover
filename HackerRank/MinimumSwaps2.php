<?php
$stdin = fopen("https://hr-testcases-us-east-1.s3.amazonaws.com/70816/input08.txt?AWSAccessKeyId=AKIAJ4WZFDFQTZRGO3QA&Expires=1539091445&Signature=9cyaep7bl335kgneubP75dGfqrE%3D&response-content-type=text%2Fplain", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $arr_temp);

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

fclose($stdin);

// если числовой ряд будет состоять из 
// непоследовательных чисел то такое решение не сработает
function minimumSwapsOld($arr) {
    $length = count($arr);
    $countSwaps = 0;

    for($i = 0; $i < $length; $i++) {
        if ($arr[$i] == $i + 1) continue;
        $tempValue = $arr[$i];
        $arr[$i] = $arr[$tempValue - 1];
        $arr[$tempValue - 1] = $tempValue;
        $i--;
        $countSwaps++;
    }

    return $countSwaps;
}

// для того что б сработало на ряде любых возростающих чисел
function minimumSwaps($arr) {
    $length = count($arr);
    $countSwaps = 0;
    $sortArr = $arr;
    sort($sortArr);

    for($i = 0; $i < $length; $i++) {
        if ($arr[$i] == $sortArr[$i]) continue;
        for ($j = $arr[$i] - 1; $j < $length; $j++) {
            if ($arr[$i] == $sortArr[$j]) {
                $tempValue = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $tempValue;
                $i--;
                $countSwaps++;
                break;
            }
        }
    }

    return $countSwaps;
}

echo minimumSwaps([4, 3, 1, 2,]) . PHP_EOL; // 3
echo minimumSwaps([1, 2, 5, 3, 4,]) . PHP_EOL; // 2
echo minimumSwaps([2, 1, 5, 3, 4,]) . PHP_EOL; // 3
echo minimumSwaps([1, 2, 4, 5, 3, 8, 7, 6,]) . PHP_EOL; // 3
echo minimumSwaps([1, 2, 5, 3, 4,]) . PHP_EOL; // 2
echo minimumSwaps([1, 2, 3, 4, 5,]) . PHP_EOL; // 0
echo minimumSwaps([5, 1, 2, 3, 4,]) . PHP_EOL; // 4
echo minimumSwaps($arr); // 49990
