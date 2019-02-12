<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>№11</title>
</head>
<body>
<p>11. Выведите столбец четных чисел в промежутке от нуля до 100.</p>
<?php
    for ($i = 0; $i <= 100; $i+=2) {
        echo "{$i}<br>";
    }
?>
</body>
</html>
