<?php

function f($i, $cur = 3, $fir = 0, $sec = 1) 
{
    return $i <= 2 ? $i - 1 : ($i == $cur++ ? $fir + $sec : f($i, $cur, $sec, ($fir + $sec)));
}

echo "\n Number:" . f(20);