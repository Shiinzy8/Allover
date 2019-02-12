<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>№13</title>
</head>
<body>
<p>13. Вывести таблицу умножения</p>
<?php
    for ($i = 1; $i < 10; $i++) {
        echo "Таблица умножения для {$i} <br>";
        for ($j = 1; $j < 10; $j++) {
            echo $i . " * " . $j . " = " . ($i * $j) . "<br>";
        }
    }
?>
</body>
</html>
