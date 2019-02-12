<?php
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
    <title>№17</title>
</head>
<body>
<p>17.Сосктавьте массив месяцев. С помощью цикла foreach выведите все месяцы, а текущий
    месяц выведите жирным. Текущий месяц должен храниться в переменной $month.</p>
<?php
    foreach ($month_array as $month) {
        echo "<div><span" . (($month == $month_current)?" style=\"font-weight:bold\">":">") . "{$month}</span></div>";
    }
?>
</body>
</html>
