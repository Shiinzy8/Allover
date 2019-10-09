<?php
    $choice = 5;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>№24</title>
</head>
<body>
<p>24. Вам нужно разработать программу, которая считала бы количество вхождений
    какой­нибуть выбранной вами цифры в выбранном вами числе. Например: цифра 5 в числе
    442158755745 встречается 4 раза.</p>
<?php
    $number = (float)152565856343;
    $count = 0;
    while ($number > 0) {
        $count = ($choice == (int)($number % 10)) ? ($count + 1) : $count ;
        $number = (float)($number/10);
    }
    echo $count;
?>
</body>
</html>
