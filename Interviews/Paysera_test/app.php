<?php

require_once 'vendor/autoload.php';

use App\CommissionCalculator;

$commissions = (new CommissionCalculator())->calculateCommissionsFromFile($argv[1] ?? null);

foreach ($commissions as $commission) {
    echo $commission . "\n";
}
