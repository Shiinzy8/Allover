<?php
echo'<!DOCTYPE html>';
echo'<html>';
echo'<head>';
    echo'<title>Это ваш новый проект</title>';
    echo'<meta charset="utf-8">';
echo'</head>';
echo'<body>';
echo'Hello World!';
echo'<br/>';
echo'<br/>';

/*
 * Тестовая база данных, используемая в примере, пересоздается каждый час.
 * Вы можете заменить параметры подключения к базе на свои собственные.
 * Создать новую базу данных вы можете в разделе Онлайн IDE:
 * https://devionity.com/ru/projects
 */

$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'symfony-09';

include_once('db.class.php');

try {

    $db = new DB($db_host, $db_user, $db_password, $db_name);


    echo "<b>Books list: </b><br/><hr/>";

    $books = $db->query("SELECT * FROM item");
    foreach ($books as $book) {
        echo "<b>{$book['name']}</b>  <a href='cart.php?action=add&id={$book['id']}'>Add to cart</a> <br>";
    }

} catch (Exception $e) {
    echo $e->getMessage() . ':(';
}
echo'<br/>';
echo'<br/>';
echo'<a href="cart.php">Show cart</a>';

echo'</body>';
echo'</html>';