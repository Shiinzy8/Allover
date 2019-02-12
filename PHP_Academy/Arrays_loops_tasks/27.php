<?php
    $colors = array(
        "background-color: red",
        "background-color: yellow",
        "background-color: blue",
        "background-color: grey",
        "background-color: maroon",
        "background-color: brown",
        "background-color: green",
    );
    $row = 10;
    $col = 30;

    function return_data($colors) {
        $number = rand (0,10000);
        $color = $colors[rand(0,count($colors)-1)];
        return "<td style='{$color}'>{$number}</td>";
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>№27</title>
</head>
<body>
<p>27. Создать генератор случайных таблиц. Есть переменные: $row - кол-во строк в таблице, $cols - кол-во столбцов в таблице.
    Есть список цветов, в массиве: $colors = array('red','yellow','blue','gray','maroon','brown','green').
    Необходимо создать скрипт, который по заданным условиям выведет таблицу размера $rows на $cols, в которой все ячейки будут иметь цвета,
    выбранные случайным образом из массива $colors. В каждой ячейке должно находиться случайное число. <br><br>
    Пример результата:<br>
<table>
    <tr><td style='background-color:blue'>2033</td>
        <td style='background-color:brown'>11696</td>
        <td style='background-color:green'>712</td>
        <td style='background-color:yellow'>32583</td
        ><td style='background-color:red'>157</td></tr>
    <tr><td style='background-color:gray'>25694</td>
        <td style='background-color:red'>19724</td>
        <td style='background-color:brown'>18487</td>
        <td style='background-color:brown'>8462</td>
        <td style='background-color:red'>4412</td></tr>
    <tr><td style='background-color:gray'>4673</td>
        <td style='background-color:gray'>14450</td>
        <td style='background-color:maroon'>16748</td>
        <td style='background-color:gray'>3505</td>
        <td style='background-color:maroon'>5299</td></tr>
    <tr><td style='background-color:red'>16873</td>
        <td style='background-color:gray'>21370</td>
        <td style='background-color:green'>22482</td>
        <td style='background-color:red'>28576</td>
        <td style='background-color:blue'>26060</td></tr>
    <tr><td style='background-color:yellow'>28955</td>
        <td style='background-color:gray'>8804</td>
        <td style='background-color:gray'>26825</td>
        <td style='background-color:red'>31471</td>
        <td style='background-color:blue'>22283</td></tr>
</table>

</p>
<?php
    echo "<table>";
    for ($i = 0; $i < $row; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $col; $j++) {
            echo return_data($colors);
        }
        echo "</tr>";
    }
    echo "</table>";
?>
</body>
</html>
