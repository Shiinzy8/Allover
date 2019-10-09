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
        <title>Задача №65</title>
    </head>
    <body>
    <div>
        Задача №65
        Нарисуйте пирамиду, как показано на рисунке, только у вашей пирамиды должно быть 9 рядов, а не 5

        1

        22

        333

        4444

        55555
    </div>
    <div>
        <?php
            $x = 1;
            for ($i = 0; $i < 9; $i++) {
                $out = "";
                for ($j = 0; $j < $x; $j++) {
                    $out .= $x;
                }
                echo $out . "<br>";
                $x++;
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