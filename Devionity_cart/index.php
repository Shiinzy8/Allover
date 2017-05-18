<?php
echo'<!DOCTYPE html>';
echo'<html>';
echo'<head>';
    echo'<title>Это ваш новый проект</title>';
    echo'<meta charset="utf-8">';
    echo '<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>';
    echo '<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>';
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
//        echo "<b>{$book['name']}</b>  <a href='cart.php?action=add&id={$book['id']}'>Add to cart</a> <br>";
        echo "<b>{$book['name']}</b>  <a href='#' id='add-{$book['id']}'>Add to cart</a> <br>";
    }

} catch (Exception $e) {
    echo $e->getMessage() . ':(';
}
?>
<br/>
<br/>
<a href="cart.php">Show cart</a>
<script>
    $("a[id|='add']").on('click', function() {
        id = $(this).attr('id').split('-');
        id = id[1];
        $.get('cart.php?action=add&id=' + id, alert('Product ' + id + ' added'));
    });
</script>

</body>
</html>