<?php
$stdin = fopen("DictionariesAndMaps.txt", "r");

$n = (int)fgets($stdin);
$i = 1;
$clients = [];
while($i <= $n) {
    $client = explode(' ', trim(fgets($stdin)));
    $clients[$client[0]] = empty($client[1]) ? '' : $client[1];
    $i++;
}

while($name = trim(fgets($stdin))) {
    echo empty($clients[$name]) ? 'Not found' : $name . '=' . $clients[$name];
    echo PHP_EOL;
}

fclose($stdin);