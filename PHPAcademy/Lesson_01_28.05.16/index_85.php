<?php
    //Задача №85
    //Разработать web-страницу, на которой будет возможность выбора изображения на локальном компьютере
    // и подальшая загрузка их на сервер. Также, должно быть отображение загруженных изображений в виде портфолио.
    //
    //Требования:
    //Размер изображения не должен превышать 3Мб.
    //Изображения могут быть, только, форматов: jpg, png, gif.
    //Изображения на сервере должны сохранятся в директории uploads.
    //Имя загруженного на сервер изображения должно формироваться на серверной стороне.
    //В портфолио можно загрузить максимум 7 изображений.
    //При просмотре порфолио, при наведении на изображение, поверх самого изображения,
    // должна отображаться дата загрузки и оригинальное имя этого же изображения.
    //Для придания стилей используйте bootstrap CSS framework.
    //Для сохранения оригинального имени, даты загрузки и модифицированного имени изображения используйте файл,
    // в который вы будете записывать сериализованный массив данных.
    //PHP скрипт и HTML код должен быть в разных файлах, в HTML выводите только данные (переменные, циклы).

    $colors = array('red','yellow','blue','gray','maroon','brown','green');
    $row = 10;
    $col = 30;

    function return_data($colors) {
        $number = rand (0,10000);
        $color = $colors[rand(0,count($colors)-1)];
        return "<span class='{$color}'>{$number}</span>";
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Задача №71</title>
    <link rel="stylesheet" href="index_71.css">
</head>
<body>
<?php
    echo "<table>";
    for ($i = 0; $i < $row; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $col; $j++) {
            echo "<td>" . return_data($colors) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
?>
</body>
</html>
