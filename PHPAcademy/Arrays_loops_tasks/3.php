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
    <title>№3</title>
</head>
<body>
<p>3. Дан массив с элементами 26, 17, 136, 12, 79, 15. С помощью цикла foreach найдите сумму квадратов элементов этого массива. Результат запишите переменную $result.</p>
<?php
    foreach ($array as $item) {
        $result += pow($item,2);
    }
    echo "Результат равен = " . $result;
?>
</body>
</html>
