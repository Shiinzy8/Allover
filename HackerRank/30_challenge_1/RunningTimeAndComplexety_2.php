<?php
include_once("../TimeMemoryMeter.php");;

$header = fopen("RunningTimeAndComplexety_2.txt", "r");


$T=intval(fgets($header));
timeMemoryMeterStart();
while($T-->0){
    $data=intval(fgets($header));
    $prime = true;

    isPrimeBest($data);
    // $max=$data/2;
    // for ($i = 2; $i <= $max; $i++) {
    //     if ($data % $i == 0) {
    //         $prime = false;
    //         break;
    //     }
    // }
    
    // if ($data == 2) {
    //     echo 'Prime' . PHP_EOL; continue;
    // }

    // if ($data == 3) {
    //     echo 'Prime' . PHP_EOL; continue;
    // }

    // if ($data % 2 == 0) {
    //     echo 'Not prime ' . PHP_EOL; continue;
    // }
    // if ($data % 3 == 0) {
    //     echo 'Not prime ' . PHP_EOL; continue;
    // }

    // $i = 5;
    // $w = 2;

    // while ($i * $i <= $data) {
    //     if ($data % $i == 0) {
    //         $prime = false;
    //     }

    //     $i += $w;
    //     $w = 6 - $w;
    // }
    
    // echo $data > 1 && $prime ? 'Prime' : 'Not prime';
    // echo PHP_EOL;
}

echo timeMemoryMeterFinish()  . PHP_EOL;

function printStats($count, $n, $isPrime) {
    $functionName = debug_backtrace()[1]['function'];
    echo "{$functionName} performed {$count} checks, determined {$n} ";
    echo $isPrime ? " is PRIME." : " is NOT PRIME.";
    echo PHP_EOL;
}

/**
*   Worst: O(n) algorithm
*       Checks if n is divisible by any number from 4 to n.
*
*   @param n An integer to be checked for primality.
*   @return true if n is prime, false if n is not prime.
**/
function isPrimeWorst($n) {
    $count = 0;
        // 1 is not prime
        if( $n == 1 ){
            printStats(++$count, $n, false);
            return false;
        }
        
        // return false n is divisible by any i from 2 to n
        $i = 1;
        while( $i++ < n - 1 ){
            $count++;
            if( n % i == 0 ){
                printStats(++$count, $n, false);
                return false;
            }
        }

        // n is prime
        printStats(++$count, $n, true);
        return true;
}
    
/**
*   Better: O(n) algorithm
*       Checks if n is divisible by any number from 2 to n/2,
*       but is asymptotically the same as isPrimeWorst
*
*   @param n An integer to be checked for primality.
*   @return true if n is prime, false if n is not prime.
**/
function isPrimeLessWorst($n){
    $count = 0;
    // 1 is not prime
    if( $n == 1 ){
        printStats(++$count, $n, false);
        return false;
    }

    // return false n is divisible by any i from 2 to n
    $i = 1;
    while( $i++ < $n/2 ){
        $count++;
        if( $n % i == 0 ){
            printStats(++$count, $n, false);
            return false;
        }
    }

    // n is prime
    printStats(++$count, $n, true);
    return true;
}
    
/**
*   O(n^(1/2)) Algorithm
*        Checks if n is divisible by any number from 2 to sqrt(n).
*
*   @param n An integer to be checked for primality.
*   @return true if n is prime, false if n is not prime.
**/
function isPrimeGood($n){
    $count = 0;
    // 1 is not prime
    if( $n == 1 ){
        printStats(++$count, $n, false);
        return false;
    }
    else if( $n == 2 ){
        printStats(++$count, $n, true);
        return true;
    }

    // return false n is divisible by any i from 2 to n
    $i = 1;
    while( $i++ < sqrt($n) ){
        $count++;
        if( $n % $i == 0 ){
            printStats(++$count, $n, false);
            return false;
        }
    }

    // n is prime
    printStats(++$count, $n, true);
    return true;
}

/**
*   Improved O( n^(1/2)) ) Algorithm
*       Checks if n is divisible by 2 or any odd number from 3 to sqrt(n).
*       The only way to improve on this is to check if n is divisible by 
*   all KNOWN PRIMES from 2 to sqrt(n).
*
*   @param n An integer to be checked for primality.
*   @return true if n is prime, false if n is not prime.
**/
function isPrimeBest($n){
    $count = 0;
    // check lower boundaries on primality
    if( $n == 2 ){ 
        printStats(++$count, $n, true);
        return true;
    } // 1 is not prime, even numbers > 2 are not prime
    else if( $n == 1 || ($n & 1) == 0){
        printStats(++$count, $n, false);
        return false;
    }
    // Check for primality using odd numbers from 3 to sqrt(n)
    for($i = 3; $i <= sqrt($n); $i += 2){
        $count++;
        // n is not prime if it is evenly divisible by some 'i' in this range
        if( $n % $i == 0 ){ 
            printStats(++$count, $n, false);
            return false;
        }
    }
    // n is prime
    printStats(++$count, $n, true);
    return true;
}