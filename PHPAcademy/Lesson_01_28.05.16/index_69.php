<?php
    /**
     * Created by PhpStorm.
     * User: ADAM
     * Date: 19.06.2016
     * Time: 17:26
     */
    $rand_array = array();

    function change_place ($array) {
        $max = 0;
        $min = 0;
        for ($i = 0; $i < count($array); $i++) {
            $max = ($array[$i] > $array[$max])? $i : $max;
            $min = ($array[$i] < $array[$min])? $i : $min;
        }
        echo "Max item[{$max}] = " . $array[$max] . " ,Min item[{$min}] = " .$array[$min] . "<br>";
        $array[$max] += $array[$min];
        $array[$min] = $array[$max] - $array[$min];
        $array[$max] -= $array[$min];
        echo "Max item[{$max}] = " . $array[$max] . " ,Min item[{$min}] = " .$array[$min] . "<br>";
        return $array;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Задача №69</title>
</head>
<body>
<div>
    Задача №69
    Ваше задание создать массив, наполнить это случайными значениями (функция rand),
    найти максимальное и минимальное значение и поменять их местами
</div>
<div>
    <?php
        for ($i = 0; $i < 10; $i++) {
            $rand_number = rand (-100, 100);
            array_push($rand_array,$rand_number);
        }
        var_dump($rand_array);
        echo "<br>";
        var_dump(change_place($rand_array));
    ?>
</div>
</body>
</html>


