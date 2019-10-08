<?php
    $day_array = array(
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday",
        "Sunday",
    );
    $current_day = "Tuesday";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>№19</title>
</head>
<body>
<p>19. Составьте массив дней недели. С помощью цикла foreach выведите все дни недели, а
    текущий день выведите курсивом. Текущий день должен храниться в переменной $day.</p>
<?php
    foreach ($day_array as $day) {
        echo "<div><span" . (($day == $current_day)?" style=\"font-weight:bold\">":">") . "{$day}</span></div>";
    }

?>
</body>
</html>
