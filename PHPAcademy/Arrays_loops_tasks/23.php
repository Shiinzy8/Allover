<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>№23</title>
</head>
<body>
<p>23. Вам нужно разработать программу, которая считала бы сумму цифр числа введенного
    пользователем. Например: есть число 123, то программа должна вычислить сумму цифр 1,
    2, 3, т. е. 6.</p>
<?php
    $number = 1232135;
    $sum = 0;
    while ($number > 0) {
        $sum += $number % 10;
        $number = (int)($number/10);
    }
    echo $sum;
?>
</body>
</html>
