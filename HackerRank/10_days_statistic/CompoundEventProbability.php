<?php
// There are 3 urns labeled X, Y, and Z. 
// Urn X contains 4 red balls and 3 black balls.
// Urn Y contains 5 red balls and 4 black balls.
// Urn Z contains 4 red balls and 4 black balls. 
// One ball is drawn from each of the 3 urns. What is the probability that, of the 3 balls drawn, 2 are red and 1 is black?

// Какова вероятность достать 2 красных шара и 1 черный за раз
// Возможно три вариант событий {r,r,b} or  {r,b,r} or  {b,r,r}
// если записать это форумлой то это вроятность через u 
// P(XYZ) = P(X n Y n Z) + P(X n Y n Z) + P(X n Y n Z);
// P(XYZ) = (Px(Red) * Py(Red) * Pz(Black)) + ((Px(Red) * Py(Black) * Pz(Red)) + (Px(Black) * Py(Red) * Pz(Red));

$X = [4,3];
$countX = $X[0] + $X[1];
$X = [$X[0]/$countX , $X[1]/$countX];
$Y = [5,4];
$countY = $Y[0] + $Y[1];
$Y = [$Y[0]/$countY , $Y[1]/$countY];
$Z = [4,4];
$countZ = $Z[0] + $Z[1];
$Z = [$Z[0]/$countZ , $Z[1]/$countZ];

$P = $X[0] * $Y[0] * $Z[1] + $X[0] * $Y[1] * $Z[0] + $X[1] * $Y[0] * $Z[0];
echo $P . PHP_EOL;