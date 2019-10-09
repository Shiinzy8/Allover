<?php
function minimumBribes($q) {
    $minimumBribes = 0;

    foreach ($q as $key => $value) {
        if ($value > $key && $key < ($value - 3)) {
                echo 'Too chaotic' . PHP_EOL;
                return;
        }
    }

    $arrayNotCorrect = true;
    $maxValue = count($q) - 2;

    do {
        $arrayNotCorrect = false;

        foreach ($q as $key => $value) {
            if ($key <= $maxValue && $value > $q[$key + 1]) {
                $q[$key] = $q[$key + 1];
                $q[$key + 1] = $value;
                $minimumBribes++;
                $arrayNotCorrect = true;
            }
        }
    } while ($arrayNotCorrect);
    
    echo (string)$minimumBribes . PHP_EOL;
    return;
}

minimumBribes([1, 2, 5, 3, 4,]); // 2
minimumBribes([2, 1, 5, 3, 4,]); // 3
minimumBribes([1, 2, 4, 5, 3, 8, 7, 6,]); // 5
minimumBribes([1, 2, 5, 3, 4,]); // 2
minimumBribes([1, 2, 3, 4, 5,]); // 0
minimumBribes([5, 1, 2, 3, 4,]); // Too chaotic