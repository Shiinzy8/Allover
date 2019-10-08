<?php
    /**
     * Created by PhpStorm.
     * User: ADAM
     * Date: 19.06.2016
     * Time: 17:26
     */
    $a = 0;
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Задача №55</title>
    </head>
    <body>
    <div>
        Задача №55
        Выведите столбец четных чисел в промежутке от нуля до 100
    </div>
    <div>
        <?php
            for ($i = 0; $i <= 100; $i+=2) {
                echo $i . "<br>";
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