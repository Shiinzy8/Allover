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
        <title>Задача №24</title>
    </head>
    <body>
    <div>
        Задача №24
        Расширьте конструкцию if из задач 22, 23, выводя фразу: "Вам еще рано работать" при условии,
        что значение переменной age попадает в диапазон чисел от 0 до 17 (включительно)
    </div>
    <div>
        Some text
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