<?php

function timeMemoryMeterStart() {
    $GLOBALS['timeMemomyMeterStartTime'] = microtime(true);
    $GLOBALS['timeMemoryMeterStartMemory'] = memory_get_usage();
}

function timeMemoryMeterFinish() {
    $time = microtime(true) - $GLOBALS['timeMemomyMeterStartTime'];
    $time = round($time, 10);
    $memory = round((memory_get_usage() - $GLOBALS['timeMemoryMeterStartMemory']) / 1024 / 1024, 10);

    return "Time: $time sec, Memory: $memory MB";
}