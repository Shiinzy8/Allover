<?php
$stdin = fopen("https://hr-testcases-us-east-1.s3.amazonaws.com/70816/input08.txt?AWSAccessKeyId=AKIAJ4WZFDFQTZRGO3QA&Expires=1539091445&Signature=9cyaep7bl335kgneubP75dGfqrE%3D&response-content-type=text%2Fplain", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $arr_temp);

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

fclose($stdin);

function minimumSwaps($arr) {
    $length = count($arr);
    $countSwaps = 0;

    for($i = 0; $i < $length; $i++) {
        $swapElementValue = $arr[$i];
        $swapElementPosition = $i;
        $j = $swapElementPosition + 1;

        for ($j; $j < $length; $j++) {
            if ($arr[$j] < $swapElementValue) {
                $swapElementValue  = $arr[$j];
                $swapElementPosition = $j;
            }

            if ($i != 0 &&  $swapElementValue == ($arr[$i - 1] + 1)) {
                break;
            }
        }

        if ($swapElementPosition != $i) {
            $arr[$swapElementPosition] = $arr[$i];
            $arr[$i] = $swapElementValue;
            $countSwaps++;
            echo $countSwaps . PHP_EOL;
        }
    }

    return $countSwaps;
}

echo minimumSwaps([1, 2, 5, 3, 4,]) . PHP_EOL; // 2
echo minimumSwaps([2, 1, 5, 3, 4,]) . PHP_EOL; // 3
echo minimumSwaps([1, 2, 4, 5, 3, 8, 7, 6,]) . PHP_EOL; // 3
echo minimumSwaps([1, 2, 5, 3, 4,]) . PHP_EOL; // 2
echo minimumSwaps([1, 2, 3, 4, 5,]) . PHP_EOL; // 0
echo minimumSwaps([5, 1, 2, 3, 4,]) . PHP_EOL; // 4
echo minimumSwaps($arr); // 49990
