<?php

// 4
// 127 64
// 123 121
// 103 100
// 471 470

// $stdin = fopen("BitwiseAND.txt", "r");
$stdin = fopen("https://hr-testcases-us-east-1.s3.amazonaws.com/19061/input02.txt?AWSAccessKeyId=AKIAJ4WZFDFQTZRGO3QA&Expires=1541092286&Signature=IDDNbtcwPXRJi1EJhsigPRCvuBA%3D&response-content-type=text%2Fplain", "r");
$stdout = fopen("https://hr-testcases-us-east-1.s3.amazonaws.com/19061/output02.txt?AWSAccessKeyId=AKIAJ4WZFDFQTZRGO3QA&Expires=1541092368&Signature=hZza%2FUc%2B3lIwW4lvLaoyqUGlFP8%3D&response-content-type=text%2Fplain", "r");
fscanf($stdin, "%d\n", $t);

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    fscanf($stdin, "%[^\n]", $nk_temp);
    fscanf($stdout, "%d[^\n]", $out);
    $nk = explode(' ', $nk_temp);

    $n = intval($nk[0]);
    $k = intval($nk[1]);
    $max = 0;

    for($j = 0; $j <= $n; $j++) {
        for($i = $j+1; $i <= $n; $i++) {
            $bit = ($i & $j);
            if ($bit >= $k) continue;
            if ($bit < $max) continue;
            // echo $j . "=j i=" . $i . " " . $n . " k=" . $k . " bit=" . $bit . " max=" . $max . " o=62" . PHP_EOL;
            $max = $bit;
        }
    }

    if ($max - $out) echo $n . " " . $k . " m=" . $max . " o=" . $out . PHP_EOL;
    // if ($max - 63) echo $n . " " . $k . " m=" . $max . " o=" . 63 . PHP_EOL;
    // echo $max . PHP_EOL;
}

fclose($stdin);