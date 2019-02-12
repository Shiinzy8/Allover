<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>№21</title>
</head>
<body>
<p>21. Нарисуйте пирамиду, как показано на рисунке, только у вашей пирамиды должно быть 9
    рядов, а не 5.<br><br>
    1<br>
    22<br>
    333<br>
    4444<br>
    55555</p>
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
</body>
</html>
