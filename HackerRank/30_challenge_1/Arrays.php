<?php
$stdin = fopen("Arrays.txt", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%[^\n]", $arr_temp);

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

while($arr) {
    echo array_pop($arr) . ' ';
}
echo PHP_EOL;

fclose($stdin);