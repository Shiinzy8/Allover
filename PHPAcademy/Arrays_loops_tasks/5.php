<?php
    $arr = array(
        'Коля'=>'200',
        'Вася'=>'300',
        'Петя'=>'400',
    );
    $result = 0;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>№5</title>
</head>
<body>
<p>5. Дан массив $arr с ключами 'Коля', 'Вася', 'Петя' с элементами '200', '300', '400'.
    С помощью цикла foreach выведите на экран столбец строк такого формата: 'Коля — зарплата 200 долларов.'.</p>
<?php
    echo "Столбей ключей<br>";
    foreach ($arr as $key => $value) {
        echo $key . " - зарплата {$value} долларов <br>";
    }
?>
</body>
</html>
