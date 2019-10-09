<?php
    $array = array (
        1,
        20,
        15,
        17,
        24,
        35,
    );
    $result = 0;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>№2</title>
</head>
<body>
<p>2. Дан массив с элементами 1, 20, 15, 17, 24, 35. С помощью цикла foreach найдите сумму элементов этого массива. Запишите ее в переменную $result. </p>
<?php
    foreach ($array as $item) {
        $result += $item;
    }
    echo "Результат равен = " . $result;
?>
</body>
</html>
