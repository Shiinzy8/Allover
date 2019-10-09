<?php
    //Задача №71
    //Создать генератор случайных таблиц. Есть переменные:
    // $row - кол-во строк в таблице,
    // $cols - кол-во столбцов в таблице.
    // Есть список цветов, в массиве:
    // $colors = array('red','yellow','blue','gray','maroon','brown','green').
    // Необходимо создать скрипт, который по заданным условиям выведет таблицу размера $rows на $cols,
    // в которой все ячейки будут иметь цвета, выбранные случайным образом из массива $colors.
    // В каждой ячейке должно находиться случайное число.

    $colors = array('red','yellow','blue','gray','maroon','brown','green');
    $row = 10;
    $col = 30;

    function return_data($colors) {
        $number = rand (0,10000);
        $color = $colors[rand(0,count($colors)-1)];
        return "<span class='{$color}'>{$number}</span>";
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Задача №71</title>
    <link rel="stylesheet" href="index_71.css">
</head>
<body>
<?php
    echo "<table>";
    for ($i = 0; $i < $row; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $col; $j++) {
            echo "<td>" . return_data($colors) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
?>
</body>
</html>
