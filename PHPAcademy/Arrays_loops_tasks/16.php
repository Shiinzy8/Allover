<?php
    $arr = array(1, 2, 3, 4, 5, 6, 7, 8, 9,);
    $count = 0;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>№16</title>
</head>
<body>
<p>16. Дан массив с элементами 1, 2, 3, 4, 5, 6, 7, 8, 9. С помощью цикла foreach и оператора if
    выведите на экран столбец элементов массива, как показано на картинке.
    1, 2, 3
    4, 5, 6
    7, 8, 9</p>
<?php
    foreach ($arr as $number) {
        $count++;
        echo (($count % 3 == 0)?"{$number}<br>":"{$number}, ");
    }
?>
</body>
</html>
