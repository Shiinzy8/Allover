<?php

require_once('cart.class.php');
require_once('cookie.class.php');
require_once('db.class.php');

$db_host = '46.101.16.227';
$db_user = 'dv_sri9n4gu9muge';
$db_password = 'r01ox87s4j9ta1qdm0uv';
$db_name = 'dv_sri9n4gu9muge';

$cart = new Cart();

$db = new DB($db_host, $db_user, $db_password, $db_name);

$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($action == 'add') {
    $id = $_GET['id'];
    $cart->addProduct($id);
    header('Location: index.php');
} elseif ($action == 'delete') {
    $id = $_GET['id'];
    $cart->deleteProduct($id);
    header('Location: cart.php');
} elseif ($action == 'clear') {
    $cart->clear();
    header('Location: cart.php');
} else {
    if ($cart->isEmpty()) {
        echo "Cart is empty";
    } else {
        $id_sql = $cart->getProducts(true);
        $sql = "SELECT * FROM books WHERE id IN ({$id_sql})";

        $books = $db->query($sql);

        echo "My cart: <br>";
        foreach ($books as $book) {
            echo "<b>{$book['title']}</b>  <a href='cart.php?action=delete&id={$book['id']}'>Delete from cart</a> <br>";
        }
    }

}

?>
<br/>
<a href="cart.php?action=clear">Clear cart</a>
<br/>
<a href="index.php">Main page</a>