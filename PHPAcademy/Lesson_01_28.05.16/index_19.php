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
    <title>Задача №19</title>
</head>
<body>
<div>
    Задача №19
    Создайте переменную age и присвойте ей значение, содержащее ваш возраст, например 20.
</div>
<div>
    <?php
        echo $name . " " . "{$age}";
    ?>
</div>
</body>
</html>
