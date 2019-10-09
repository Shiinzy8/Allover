<?php
    /**
     * Created by PhpStorm.
     * User: ADAM
     * Date: 19.06.2016
     * Time: 17:26
     */
    $name = "Иннокентий";
    $age = 60;
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Задача №25</title>
    </head>
    <body>
    <div>
        Задача №25
        Расширьте конструкцию if из задач 22, 23, 24, выводя фразу: "Неизвестный возраст" при условии,
        что значение переменной age является отрицательным числом, или вовсе числом не является
    </div>
    <div>
        <?php
            if (18 <= $age && $age <= 59) {
                echo "Вам еще работать и работать";
            }
            else if ($age > 59) {
                echo "Вам пора на пенсию";
            }
            else if ($age < 18) {
                echo "Вам еще рано работать";
            }
            else {
                echo "Неизвестный возраст";
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