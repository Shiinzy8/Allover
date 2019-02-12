<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>№22</title>
</head>
<body>
<p>22. Нарисуйте пирамиду, как показано на рисунке, воспользовавшись циклом for или while.<br><br>
    xx<br>
    xxxx<br>
    xxxxxx<br>
    xxxxxxxx<br>
    xxxxxxxxxx</p>
<?php
    $count = 0;
    $string = "";
    while ($count < 5) {
        $count++;
        $string .= "xx";
        echo $string . "<br>";
    }
?>
</body>
</html>
