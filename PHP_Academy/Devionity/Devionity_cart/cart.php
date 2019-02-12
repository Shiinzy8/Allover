<?php
ob_start() ;
require_once('cart.class.php');
require_once('cookie.class.php');
require_once('db.class.php');

$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'symfony-09';

$cart = new Cart();

$db = new DB($db_host, $db_user, $db_password, $db_name);

$action = isset($_GET['action']) ? $_GET['action'] : 'list';
if ($action == 'add') {
    $id = $_GET['id'];
    $cart->addProduct($id);
    header('Location: index.php');
}
 elseif ($action == 'delete') {
    $id = $_GET['id'];
    $cart->deleteProduct($id);
    header('Location: cart.php');
}
 elseif ($action == 'clear') {
    $cart->clear();
    header('Location: cart.php');
}
 else {
    if ($cart->isEmpty()) {
        echo "Cart is empty";
    }
     else {
        $id_sql = $cart->getProducts(true);
        $sql = "SELECT * FROM item WHERE id IN ({$id_sql})";

        $books = $db->query($sql);

        echo "My cart: <br>";
        foreach ($books as $book) {
            echo "<b>{$book['name']}</b>  <a href='cart.php?action=delete&id={$book['id']}'>Delete from cart</a> <br>";
        }
    }
}
echo '<br/>';
echo '<a href="cart.php?action=clear">Clear cart</a>';
echo '<br/>';
echo '<a href="index.php">Main page</a>';