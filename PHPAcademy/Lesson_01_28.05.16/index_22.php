<?php
    /**
     * Created by PhpStorm.
     * User: ADAM
     * Date: 19.06.2016
     * Time: 17:26
     */
    $name = "Иннокентий";
    $age = 20;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Задача №22</title>
</head>
<body>
<div>
    Задача №22
    Напишите конструкцию if, которая выводит фразу: "Вам еще работать и работать" при условии, что значение
    переменной age попадает в диапазон чисел от 18 до 59 (включительно).
</div>
<div>
    <?php
        if (18 <= $age && $age <= 59) {
            echo "Вам еще работать и работать";
        }
    ?>
</div>
</body>
</html>
