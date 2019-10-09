<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Задача №70</title>
</head>
<body>
<div>
    Задача №70
    Вам нужно создать массив и заполнить его случайными числами от 1 до 100 (ф­я rand).
    Далее, вычислить произведение тех элементов, которые больше ноля и у которых парные индексы.
    После вывести на экран элементы, которые больше ноля и у которых не парный индекс
</div>
<div>
    <?php
        $rand_array = array();

        for ($i = 0; $i < 10; $i++) {
            $rand_number = rand (-10, 10);
            array_push($rand_array,$rand_number);
        }

        $result = 0;

        foreach ($rand_array as $key=>$value) {
            if ($value > 0 && ($key%2 == 0)) {
                $result = ($result == 0) ? $value : $result * $value;
            }
        }
        var_dump($rand_array);
        echo "<br> result = {$result} <br>";
        foreach ($rand_array as $key=>$value) {
            if ($value > 0 && ($key%2 != 0)) {
                echo "[{$key}] = {$value}<br>";
            }
        }
    ?>
</div>
</body>
</html>


