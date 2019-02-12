<?php
    $arr = array(
        1,
        2,
        3,
        4,
        5,
        6,
        7,
        8,
        9,
    );
    $result = "-";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>№8</title>
</head>
<body>
<p>8. Дан массив с элементами 1, 2, 3, 4, 5, 6, 7, 8, 9. С помощью цикла foreach создайте строку '­1­2­3­4­5­6­7­8­9­'.</p>
<?php
    foreach ($arr as $value) {
            $result .= ($value."-");
    }
    echo $result;
?>
</body>
</html>
