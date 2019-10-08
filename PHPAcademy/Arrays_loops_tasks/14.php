<?php
    $n = array(4,2,5,19,13,0,10);
    $e = array(2,3,4);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>№14</title>
</head>
<body>
<p>14. Дан массив с элементами 4, 2, 5, 19, 13, 0, 10. С помощью цикла foreach и оператора if
    проверьте есть ли в массиве элемент со значением $e, равном 2, 3 или 4. Если есть —
    выведите на экран 'Есть!', иначе выведите 'Нет!'.</p>
<<?php
    foreach ($n as $number) {
        $count = 0;
        foreach ($e as $element) {
            if ($element === $number) $count++;
        }
        if ($count == 0) {
            echo "Нет такого элемента<br>";
        }
        else {
            echo "Такой элемент есть <br>";
        }
    }
?>
</body>
</html>
