<?php
    /**
     * Created by PhpStorm.
     * User: ADAM
     * Date: 19.06.2016
     * Time: 17:26
     */
    $n = 1000;
    $num = 0;
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Задача №56</title>
    </head>
    <body>
    <div>
        Задача №56
        Дано число $n = 1000. Делите его на 2 столько раз, пока результат деления не станет меньше 50.
        Какое число получится? Посчитайте количество итераций, необходимых для этого
        (итерации — это количество проходов цикла), и запишите его в переменную $num
    </div>
    <div>
        <?php
            while ($n >= 50) {
                $n = $n/2;
                $num++;
            }
            echo $n . " " . "itteretions = " . $num;
        ?>
    </div>
    </body>
    </html>
<?php
/**
 * Created by PhpStorm.
 * User: ADAM
 * Date: 19.06.2016
 * Time: 17:33
 */