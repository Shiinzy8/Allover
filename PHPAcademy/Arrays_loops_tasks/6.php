<?php
    $arr = array(
        'green'=>'зеленый',
        'red'=>'красный',
        'blue'=>'голубой',
        );
    $en = array();
    $ru = array();
    $result = 0;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>№6</title>
</head>
<body>
<p>6. Дан массив $arr. С помощью цикла foreach запишите английские названия в массив $en, а
    русские — в массив $ru.
    $arr = array('green'=>'зеленый', 'red'=>'красный','blue'=>'голубой');
    $en = array('green', 'red','blue');
    $ru = array('зеленый', 'красный', 'голубой');</p>
<?php
    echo "Столбей ключей<br>";
    foreach ($arr as $key => $value) {
        array_push($en, $key);
        array_push($ru, $value);
    }
    var_dump($en);
    echo "<br>";
    var_dump($ru);
?>
</body>
</html>
