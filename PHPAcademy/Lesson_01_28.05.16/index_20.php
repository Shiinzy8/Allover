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
    <title>Задача №20</title>
</head>
<body>
<div>
    Задача №20
    Выведите с помощью echo фразу "Меня зовут: %ваше_имя%", например: "Меня зовут: Иннокентий".
</div>
<div>
    <?php
        echo "Меня зовут: {$name}";
    ?>
</div>
</body>
</html>
