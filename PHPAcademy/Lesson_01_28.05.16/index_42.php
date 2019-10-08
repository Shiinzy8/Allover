<?php
    /**
     * Created by PhpStorm.
     * User: ADAM
     * Date: 19.06.2016
     * Time: 17:26
     */
    $a = "String";
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Задача №42</title>
    </head>
    <body>
    <div>
        Задача №42
        Приведите пример, чем отличается < ?php от < ?=
    </div>
    <div>
        <?php
            //Короткие теги (третий пример) доступны,
            //только когда они включены с помощью директивы short_open_tag в конфигурационном файле php.ini,
            // //либо если PHP был скомпилирован с опцией --enable-short-tags .
            $a = 5;
        ?>
        <?= $a = 6?>
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