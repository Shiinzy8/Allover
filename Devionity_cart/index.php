<!DOCTYPE html>
<html>
<head>
    <title>Это ваш новый проект</title>
    <meta charset='utf-8'>
</head>
<body>
Hello World!
<br/>
<br/>

<?php

/*
 * Тестовая база данных, используемая в примере, пересоздается каждый час.
 * Вы можете заменить параметры подключения к базе на свои собственные.
 * Создать новую базу данных вы можете в разделе Онлайн IDE:
 * https://devionity.com/ru/projects
 */

$db_host = '46.101.16.227';
$db_user = 'dv_sri9n4gu9muge';
$db_password = 'r01ox87s4j9ta1qdm0uv';
$db_name = 'dv_sri9n4gu9muge';

include_once('db.class.php');

try {

    $db = new DB($db_host, $db_user, $db_password, $db_name);


    echo "<b>Books list: </b><br/><hr/>";

    $books = $db->query("SELECT * FROM books");
    foreach ($books as $book) {
        echo "<b>{$book['title']}</b>  <a href='cart.php?action=add&id={$book['id']}'>Add to cart</a> <br>";
    }

} catch (Exception $e) {
    echo $e->getMessage() . ':(';
}

?>

<br/>
<br/>
<a href='cart.php'>Show cart</a>

</body>
</html>