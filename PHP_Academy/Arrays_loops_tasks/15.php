<?php
    $arr = array(4,2,5,19,13,0,10);
    $count = 0;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>№15</title>
</head>
<body>
<p>15. Дан массив $arr. С помощью цикла foreach и переменной $count подсчитайте количество
    элементов этого массива. Проверьте работу скрипта на примере массива с элементами 4, 2,
    5, 19, 13, 0, 10.</p>
<?php
    foreach ($arr as $number) {
       $count++;
    }
    echo $count;
?>
</body>
</html>
