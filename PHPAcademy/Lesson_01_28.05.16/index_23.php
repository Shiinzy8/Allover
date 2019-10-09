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
        <title>Задача №23</title>
    </head>
    <body>
    <div>
        Задача №23
        Расширьте конструкцию if из задачи 22, выводя фразу: "Вам пора на пенсию" при условии, что значение переменной age больше 59
    </div>
    <div>
        <?php
            if (18 <= $age && $age <= 59) {
                echo "Вам еще работать и работать";
            }
            else if ($age > 59) {
                echo "Вам пора на пенсию";
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