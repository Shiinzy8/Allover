<?php

include_once("../../TimeMemoryMeter.php");

// Complete the checkMagazine function below.
function checkMagazine($magazine, $note) {
    if (count($note)>count($magazine)) {
        return 'No';
    }

    $result = 'Yes';
    foreach($note as $key => $value) {
        $magazineKey = array_search($value, $magazine);

        if ($magazineKey !== false) {
            unset($magazine[$magazineKey]);
        } else {
            $result = 'No';
        }
    }

    return $result;
}

// $stdin = fopen("HasheTable.txt", "r");
$stdin = fopen("https://hr-testcases-us-east-1.s3.amazonaws.com/24432/input16.txt?AWSAccessKeyId=AKIAJ4WZFDFQTZRGO3QA&Expires=1541588872&Signature=k0%2BjaSkcWL03lfjzE6kQ5%2FDRQKA%3D&response-content-type=text%2Fplain", "r");

fscanf($stdin, "%[^\n]", $mn_temp);
$mn = explode(' ', $mn_temp);

$m = intval($mn[0]);

$n = intval($mn[1]);

fscanf($stdin, "%[^\n]", $magazine_temp);

$magazine = preg_split('/ /', $magazine_temp, -1, PREG_SPLIT_NO_EMPTY);

fscanf($stdin, "%[^\n]", $note_temp);

$note = preg_split('/ /', $note_temp, -1, PREG_SPLIT_NO_EMPTY);

timeMemoryMeterStart();

$result = checkMagazine($magazine, $note);

echo timeMemoryMeterFinish()  . PHP_EOL;
echo $result . PHP_EOL;

fclose($stdin);