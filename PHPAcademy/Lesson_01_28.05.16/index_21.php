<?php
    /**
     * Created by PhpStorm.
     * User: ADAM
     * Date: 19.06.2016
     * Time: 17:26
     */
    $name = "Иннокентий";
    $age = 20;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Задача №21</title>
</head>
<body>
<div>
    Задача №21
    Выведите фразу "Мне %ваш_возраст% лет", например: "Мне 20 лет"
</div>
<div>
    <?php
        echo "Мне {$age} лет";
    ?>
</div>
</body>
</html>
