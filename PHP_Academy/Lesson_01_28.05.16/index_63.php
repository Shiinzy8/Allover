<?php
    //Задача №63
    ////Составьте массив дней недели. С помощью цикла foreach выведите все дни недели, а текущий день выведите курсивом.
    // Текущий день должен храниться в переменной $day

    $day_array = array(
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday",
        "Sunday",
    );
    $day = "Tuesday";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Задача №63</title>
    <link rel="stylesheet" href="index_62.css">
</head>
<body>
<?php
    foreach ($day_array as $days) {
        $span = ($days == $day)?"current":"not_current";
        echo "<div><span class='{$span}'>{$days}</span></div>";
    }
?>
</body>
</html>
