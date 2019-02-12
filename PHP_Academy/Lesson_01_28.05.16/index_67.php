<?php
    /**
     * Created by PhpStorm.
     * User: ADAM
     * Date: 19.06.2016
     * Time: 17:26
     */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Задача №67</title>
</head>
<body>
<div>
    Задача №67
    Вам нужно разработать программу, которая считала бы сумму цифр числа введенного пользователем.
    Например: есть число 123, то программа должна вычислить сумму цифр 1, 2, 3, т. е. 6.
</div>
<div>
    <?php
        $number = 1232135;
        $sum = 0;
        while ($number > 0) {
            $sum += $number % 10;
            $number = (int)($number/10);
        }
        echo $sum;
    ?>
</div>
</body>
</html>