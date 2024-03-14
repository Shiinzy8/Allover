<?php
$arr = [[-5.0, 8.66], [5.0, 8.66], [-10.0, 0.0], [-5.0, -8.66], [5.0, -8.66], [10.0, 0.0]];
$countArr = count($arr);

$res = [];
$equilateral = true;
$sideLength = 0;

for ($i = 0; $i < $countArr; $i++) {
    if ($i == 0) {
        array_push($res, $arr[$i]);
        array_splice($arr, $i, 1); // remove element from array
        continue;
    }
    
    $len = 0;
    $next = 0;
    for ($j = 0; $j < count($arr); $j++) {
        $lenx = $res[$i-1][0] - $arr[$j][0];
        $leny = $res[$i-1][1] - $arr[$j][1];
        // $lenT = round(sqrt(pow($lenx, 2) + pow($leny, 2)), 0); // rounding will make it equilateral
        $lenT = sqrt(pow($lenx, 2) + pow($leny, 2));
        if ($len == 0 || $lenT < $len) {
            $len = $lenT;
            $next = $j;
        }
    }
    
    $sideLength = $sideLength == 0 ? $len : $sideLength;
    $equilateral = $equilateral ? $len === $sideLength : $equilateral;

    array_push($res, $arr[$next]);
    array_splice($arr, $next, 1);
}

if ($equilateral) {
    $lenx = $res[0][0] - $res[count($res) - 1][0];
    $leny = $res[0][1] - $res[count($res) - 1][1];
// $lenT = round(sqrt(pow($lenx, 2) + pow($leny, 2)), 0); // rounding will make it equilateral
    $lenT = sqrt(pow($lenx, 2) + pow($leny, 2));
    $equilateral = $equilateral ? $lenT == $sideLength : $equilateral;
}

echo "\nHexagon " . ($equilateral ? "is" : "isn't") . " equilateral.";
echo "\nSo if we use rounding to a whole then hexagon is equilateral.";
for ($i = 0; $i < count($res); $i++) {
    echo "\nX: " . $res[$i][0] . ' Y: ' . $res[$i][1];
}
?>