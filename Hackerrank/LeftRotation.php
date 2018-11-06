<?php

$a = [1,2,3,4,5];
$b = [1,2,3,4,5];

function rotLeft($a, $d) {
    // не сработало на большом количестве данных
    // for($i = $d; $i > 0; $i--) {
    //     $element = array_shift($a);
    //     array_push($a, $element);
    // }

    for($i = 0; $i < $d; $i++) {
        $a[] = $a[$i];
        unset($a[$i]);
    }

    return $a;
}

print_r(rotLeft($a, 4)); // [4,5,1,2,3]
print_r(rotLeft($b, 5)); // [5,1,2,3,4]