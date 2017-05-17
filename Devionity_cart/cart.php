<?php

require_once('cart.class.php');
require_once('cookie.class.php');

$cart = new Cart();

$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($action == 'add') {
    $id = $_GET['id'];
    $cart->addProduct($id);
    header('Location: index.php');
}