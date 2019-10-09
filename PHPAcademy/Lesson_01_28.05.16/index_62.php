<?php
    //Задача №62
    //Составьте массив дней недели. С помощью цикла foreach выведите все дни недели,
    //выходные дни следует вывести жирным

    $day_array = array(
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday",
        "Sunday",
    );
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Задача №62</title>
    <link rel="stylesheet" href="index_62.css">
</head>
<body>
<?php
    foreach ($day_array as $day) {
        $span = ($day == "Saturday" || $day == "Sunday")?"current":"not_current";
        echo "<div><span class='{$span}'>{$day}</span></div>";
    }
?>
</body>
</html>
