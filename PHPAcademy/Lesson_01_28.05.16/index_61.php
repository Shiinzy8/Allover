<?php
    //Задача №61
    //Составьте массив месяцев. С помощью цикла foreach выведите все месяцы, а текущий месяц выведите жирным.
    //Текущий месяц должен храниться в переменной $month
    
    $month_current = "June";
    $month_array = array(
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
        );
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Задача №61</title>
    <link rel="stylesheet" href="index_61.css">
</head>
<body>
    <?php
        foreach ($month_array as $month) {
            $span = ($month == $month_current)?"current":"not_current";
            echo "<div><span class='{$span}'>{$month}</span></div>";
        }
    ?>
</body>
</html>
