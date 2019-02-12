<?php
    $arr = array(
        'green'=>'зеленый',
        'red'=>'красный',
        'blue'=>'голубой',
        );
    $result = 0;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>№4</title>
</head>
<body>
<p>4. Дан массив $arr. С помощью первого цикла foreach выведите на экран столбец ключей, с помощью второго — столбец элементов.</p>
<?php
    echo "Столбей ключей<br>";
    foreach ($arr as $key => $value) {
        echo $key . "<br>";
    }
    echo "Столбей элементов<br>";
    foreach ($arr as $value) {
        echo $value . "<br>";
    }
?>
</body>
</html>
