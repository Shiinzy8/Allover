<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>№20</title>
</head>
<body>
<p>20.Нарисуйте пирамиду, как показано на рисунке, только у вашей пирамиды должно быть 20
    рядов, а не 5.<br><br>
    x<br>
    xx<br>
    xxx<br>
    xxxx<br>
    xxxxx</p>
<?php
    $x = "X";
    for ($i = 0; $i < 20; $i++) {
        echo $x . "<br>";
        $x .= "X";
    }
?>
</body>
</html>
