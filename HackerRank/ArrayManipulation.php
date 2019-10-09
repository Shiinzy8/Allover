<?php

function arrayManipulation($n, $queries) {
    // $arr = array_fill(1, $n, 0);
    $countOperation = count($queries);
    $result = 0;

    // for($i = 0; $i < $countOperation; $i++) {
    //     for($j = $queries[$i][0]; $j <= $queries[$i][1]; $j++) {
    //         $arr[$j] = $arr[$j] + $queries[$i][2];
    //     }
    // }

    for($i = 0; $i < $countOperation; $i++) {
        $arr[$queries[$i][0]] = ($arr[$queries[$i][0]] ?? 0) + $queries[$i][2];
        $arr[$queries[$i][1]+1] = ($arr[$queries[$i][1]+1] ?? 0) - $queries[$i][2];
    }

    ksort($arr);
    
    $sum = 0;
    foreach($arr as $value) {
        $sum += $value;
        if ($sum > $result) $result = $sum;
    }

    return $result;
}

echo arrayManipulation(5, [[1,2,100],[2,5,100],[3,4,100]]) . PHP_EOL; //200
echo arrayManipulation(10, [[2,6,8],[3,5,7],[1,8,1],[5,9,15]]) . PHP_EOL; //31
echo arrayManipulation(10000000, [[1400906,9889280,90378],[3,5,7],[1,8,1],[5,9,15]]) . PHP_EOL; //90378