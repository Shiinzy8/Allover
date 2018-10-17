<?php
$handle = fopen("LetsReview.txt", "r");

$T = fgets($handle);
while($line = fgets($handle)) {
    $S = [
        0 => '',
        1 => '',
    ];
    $line = trim($line);
    for($i = 0; $i < strlen($line); $i++) {
        $S[$i%2] = $S[$i%2] . $line[$i];
    }
    echo implode(" ", $S) . PHP_EOL;
}


