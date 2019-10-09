<?php
// You draw 2 cards from a standard 52-card deck without replacing them. 
// What is the probability that both cards are of the same suit?
// Вытянуть подряд 2 карты одной масти из 52 картной колоды

// Два варианта решения
// Через condition probability
// P(CC|C) = P(C|CC) * P(CC) / P(C)
// P(CC|C) - вероятность что выпадет 2 карта такой же матси что и первая
// P(C|CC) - вероятность что из 2 карт одной масти 1 такой же матси = 1
// P(C) - вероятность что выпадет карта нужной масти = 1 масть / 4 масти 1/4
// P(CC) - веротяность чты выпадет две карты одинаковой масти
// P(CC) = P(C n C) = P(C) * P(C) = 1/4 * 12/51
// 12/51 = поскольку мы уже вытащили карту одной масти и нам надо что б второая была такой то, колчичество карт уменьшится на 1
// так же уменьшится на 1 количество вариантов которые нас устроят

// P(CC|C) = (1 * 1/4 * 12/51) / 1/4 = 12/51

// Второй вариант решения через последовательности и комбинации
// Вероятность равна нужное количество вариантов решения / общее количество вариантов решения
// P = |E| / |S|
// E = (1/4 - один шанс из 4 что вытащим какую либо масть) * (2/13 - последовательность карт которые не повторяются одной масти)
// S = (2/52 - последовательность карт из колоды, порядок не важен)

// E = 4! / (1! * (4 - 1)!)  * 13! / (2! * (13 - 2)!) = 4 * (13 * 12 / 2) = 4 * 78 = 312
// S = 52! / 2! * (52 - 2)! = 52 * 51 / 2 = 1326

// P = 312 / 1326 = 12/51 = 4/17