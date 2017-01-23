<?php
//Создать страничку, на которой будет запуск php функции,
// которая віведет на єкран модернизированную шахматную доску 8х8.
//У функции должно быть 3 входных параметра, количество ячеек по горизонтали,
// значение ячеек по вертикали и значение цвета в формате как (#cc0055) так и (rgb(255,255,255)))
//В итоге должна получится шахматная доска из 3 цветов: черный белый и третий цвет,
// сохраняя смещение цветов на одну ячейку в сторону на каждом из рядов
$hor = 11;
$ver = 20;
$color = "rgb(255,105,253)";

function moderChess($hor,$ver,$col) {
    echo "<table style='border-collapse: collapse; border:1px solid black;'>";

    $biasVer = 0;
    for ($i = 0; $i < $ver; $i++) {

        $biasGor = $biasVer;
        $color = ["black","white",$col];

        echo "<tr>";
        for ($j = 0; $j < $hor; $j++) {
            echo "<td style='width:50px; height: 50px; background-color:".$color[$biasGor]."'>";
            echo "</td>";
            $biasGor = ($biasGor >= 2) ? 0 : $biasGor+1;
        }
        echo "</tr>";
        $biasVer = ($biasVer >= 2) ? 0 : $biasVer+1;
    }
    echo "</table>";
}

moderChess($hor,$ver,$color);