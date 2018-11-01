<?php

$stdin = fopen("RegexPatterns.txt", "r");

fscanf($stdin, "%d\n", $N);

$firstNames = [];
for ($N_itr = 0; $N_itr < $N; $N_itr++) {
    fscanf($stdin, "%[^\n]", $firstNameEmailID_temp);
    $firstNameEmailID = explode(' ', $firstNameEmailID_temp);

    $firstName = $firstNameEmailID[0];
    $emailID = $firstNameEmailID[1];
    
    if(preg_match('$[^@`]+@gmail.com?$', $emailID)) {
        $firstNames[] = $firstName;
    }
}
sort($firstNames);

array_walk($firstNames, function(&$value, $key) {echo $value . PHP_EOL;});


fclose($stdin);