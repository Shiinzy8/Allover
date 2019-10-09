<?php
// Suppose a family has 2 children, one of which is a boy. What is the probability that both children are boys?

// По сути здесь может быть четыре задачи 
// в каждой семье по 1 ребенку и в 1 точно родился мальчик, какова вероятность что во второй родится мальчик
// в каждой семье по 1 ребенку, вероятность что во 2 семье родится мальчик если в первой родится мальчик
// в каждой семье по 2 ребенка по одному из которых мальчик, какова вероятность что в каждой будет по 2 мальчика
// в каждой семье по 2 ребенка в каждой уже по 1 мальчику, какова вероятность что в каждой будет по 2 мальчика

$possibilities = ['G', 'B'];

$allPossibilities = [];
foreach ($possibilities as $possFisrt) {
    foreach($possibilities as $possSecond) {
        $allPossibilities[] = $possFisrt . $possSecond;
    }
}

$countAllPossibilities = count($allPossibilities);
$countPossibilitiesWithBoy = 0;
foreach($allPossibilities as $possibility) {
    if(strpos('B', $possibility) !== false) {
        $countPossibilitiesWithBoy++;
    }
}

// Для первого варианта
$boyFirstChance = 1; // то есть мы точно значем что это уже произошло
$boySecondChance = 1 / count($possibilities);

$twoBoys = $boyFirstChance * $boySecondChance;
echo "first variant = $twoBoys" . PHP_EOL;

// Для второго варианта
// P(BB|B) = P(B|BB) * P(BB) / P(B)
// P(B) - вероятность что родится хотя бы 1 мальчик
// P(B) = всего 4 варианта {{B,B},{B,G},{G,B},{G,G}} / нас устроят 3 {{B,B}{B,G}{G,B}} = 3 / 4
//      = P(G n B) + P(B n G) + P(B n B)
//      = P(G) * P(B) + P(B) * P(G) + P(B) * P(B)
//      = 1/2 * 1/2 + 1/2 * 1/2 + 1/2 * 1/2
// P(BB|B) - вероятность что родится второй мальчик после того как родился первый
// P(B|BB) - вероятность что будет мальчик после того как родится два мальчика = 1
// P(BB) - вероятность что родятся 2 мальчика
// P(BB) = всего 4 варианта {{B,B},{B,G},{G,B},{G,G}} / нас устроят 1 {{B,B}} = 1 / 4
//       = P(B n B)
//       = P(B) * P(B)
//       = 1/2 * 1/2

$twoBoys = (1 * 1 / count($possibilities) * 1 / count($possibilities)) / (1 / count($possibilities) * 1 / count($possibilities) * 3);
echo "second variant = $twoBoys" . PHP_EOL;

// Для третьего варианта
// P(BBBB|BB) = P(BB|BBBB) * P(BBBB) / P(BB)
// P(BB) - вероятность что родится в каждой семье 1 мальчик
// P(BB) = всего 4 варианта {{B,B},{B,G},{G,B},{G,G}} / нас устроят 1 {{B,B}} = 1 / 4
//      = P(B n B)
//      = P(B) * P(B)
//      = 1/2 * 1/2
// P(BBBB|BB) - вероятность что родится по второму мальчику после того как родились первые
// P(BB|BBBB) - вероятность что будет два мальчика после того как родится четыре мальчика = 1
// P(BBBB) - вероятность что родятся 4 мальчика
// P(BBВВ) = P(BB n BB)
//       = P(BB) * P(BB)
//       = P(B n B) * P(B n B)
//       = P(B) * P(B) * P(B) * P(B)
//       = 1/2 * 1/2 * 1/2 * 1/2 = 1/16
$fourBoys = (1 * 1 / 16) / (1/4);
echo "third variant = $fourBoys" . PHP_EOL;

// Для четвертого варианта
// P(BBBB) = P(BB n BB);
//         = P(BB) * P(BB)
//         = P(BB | B) * P(BB | B)
//         = pow(P(B|BB) * P(BB) / P(B))
//         = pow(1 * 1 / 4 / (3 / 4))
//         = pow(1/3) = 1/9
// P(BB) - вероятность что в каждей семье родится 2 мальчика = 1 / 4
$fourBoys = pow(((1 * 1 / 4) / (3/4)), 2);
echo "fourth variant = $fourBoys" . PHP_EOL;



