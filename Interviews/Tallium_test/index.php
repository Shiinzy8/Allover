<?php

require "vendor/autoload.php";

use App\FileReader;
use App\Transaction;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

$content = '';
if (file_exists($argv[1])) {
    $content = file_get_contents($argv[1]);
}

$fileReader = new FileReader($content);
$fileRows = $fileReader->getRows();

$client = new Client();

try {
    $request = $client->request('GET', 'https://api.exchangeratesapi.io/latest');
} catch (GuzzleException $e) {
    die('error!');
}

$result = json_decode($request->getBody(), true);
$rates = $result['rates'] ?? [];

foreach ($fileRows as $fileRow) {
    $transaction = new Transaction($fileRow['bin'], $fileRow['amount'], $fileRow['currency']);
    $transaction->calculateCommission($rates);

    echo $transaction->getRoundCommission(2) . "\n";
}