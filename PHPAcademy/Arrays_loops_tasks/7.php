<?php
    $arr = array(
        2,
        5,
        9,
        15,
        0,
        4,
    );
    $result = 0;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>№7</title>
</head>
<body>
<p>7. Дан массив с элементами 2, 5, 9, 15, 0, 4. С помощью цикла foreach и оператора if выведите на экран столбец тех элементов массива, которые больше 3­х, но меньше 10.</p>
<?php
    echo "Столбей ключей<br>";
    foreach ($arr as $value) {
        if ($value > 3 && $value < 10) {
            echo "Корректное значение " . $value . "<br>";
        }
    }
?>
</body>
</html>
