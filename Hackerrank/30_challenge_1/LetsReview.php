<?php
$handle = fopen("LetsReview.txt", "r");

$T = fgets($handle);
while($line = trim(fgets($handle))) {
    $S = [0 => '',1 => '',];
    for($i = 0; $i < strlen($line); $i++) {
        $S[$i%2] = $S[$i%2] . $line[$i];
    }
    echo implode(" ", $S) . PHP_EOL;
}


