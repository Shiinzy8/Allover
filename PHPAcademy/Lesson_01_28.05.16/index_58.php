<?php
    /**
     * Created by PhpStorm.
     * User: ADAM
     * Date: 19.06.2016
     * Time: 17:26
     */
    $n = array(4,2,5,19,13,0,10);
    $e = array(2,3,4)
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Задача №58</title>
    </head>
    <body>
    <div>
        Задача №58
        Дан массив с элементами 4, 2, 5, 19, 13, 0, 10.
        С помощью цикла foreach и оператора if проверьте есть ли в массиве элемент со значением $e,
        равном 2, 3 или 4. Если есть — выведите на экран 'Есть!', иначе выведите 'Нет!'
    </div>
    <div>
        <?php
            foreach ($n as $number) {
                $count = 0;
                foreach ($e as $element) {
                    if ($element === $number) $count++;
                }
                if ($count == 0) {
                    echo "Нет такого элемента<br>";
                }
                else {
                    echo "Такой элемент есть <br>";
                }
            }
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