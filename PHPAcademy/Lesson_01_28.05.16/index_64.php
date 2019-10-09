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
        <title>Задача №64</title>
    </head>
    <body>
    <div>
        Задача №64
        Нарисуйте пирамиду, как показано ниже, только у вашей пирамиды должно быть 20 рядов, а не 5


        x

        xx

        xxx

        xxxx

        xxxxx
    </div>
    <div>
        <?php
            $x = "X";
            for ($i = 0; $i < 20; $i++) {
                echo $x . "<br>";
                $x .= "X";
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