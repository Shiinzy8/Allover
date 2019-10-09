<?php
    /**
     * Created by PhpStorm.
     * User: ADAM
     * Date: 19.06.2016
     * Time: 17:26
     */
    $choice = 5;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Задача №68</title>
</head>
<body>
<div>
    Задача №68
    Вам нужно разработать программу, которая считала бы количество вхождений какой­нибуть выбранной вами цифры
    в выбранном вами числе. Например: цифра 5 в числе 442158755745 встречается 4 раза
</div>
<div>
    <?php
        $number = (float)152556856343556;
        $count = 0;
        while ($number > 0) {
            $count = ($choice == (int)($number % 10)) ? ($count + 1) : $count ;
            $number = (float)($number/10);
        }
        echo $count;
    ?>
</div>
</body>
</html>

