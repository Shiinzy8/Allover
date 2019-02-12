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
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>№18</title>
</head>
<body>
<p>18. Составьте массив дней недели. С помощью цикла foreach выведите все дни недели,
    выходные дни следует вывести жирным.</p>
<?php
    foreach ($day_array as $day) {
        echo "<div><span" . (($day == "Saturday" || $day == "Sunday")?" style=\"font-weight:bold\">":">") . "{$day}</span></div>";
    }
?>
</body>
</html>
