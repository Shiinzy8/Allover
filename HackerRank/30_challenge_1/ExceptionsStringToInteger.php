<?php

$handle = fopen ("ExceptionsStringToInteger.txt","r");
fscanf($handle,"%s",$S);

function foo(int $data) :string {
    return $data;
}

try {
    $S = foo($S);
    echo $S . PHP_EOL;
} catch (TypeError $e) {
    echo "Bad String" . PHP_EOL;
}