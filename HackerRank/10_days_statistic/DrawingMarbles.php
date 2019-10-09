<?php
// A bag contains 3 red marbles and 4 blue marbles. Then, 2 marbles are drawn from the bag, 
// at random, without replacement. If the first marble drawn is red, what is the probability that the second marble is blue?

$countRed = 4;
$coundBlue = 3;
$countAll = $countRed + $coundBlue;

// = P(C|CC) = 1 * P(CC) / P(C) = 1 * P(C n C) / 1/7 = 1*1/7*1/6 / 1/6
$probabilityCCaC = (1 * (1/$countAll) * (1/($countAll-1))) / (1/$countAll);
echo "two marbles same color $probabilityCCaC" . PHP_EOL; 

// P(R n B) = P(R) * P(B) = 1 * 4/6 = 2/3 
$probabilityRB = 2/3;
echo "blue marble after red $probabilityRB" . PHP_EOL; 