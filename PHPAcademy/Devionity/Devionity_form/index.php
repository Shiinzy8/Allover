<?php
/**
 * Created by PhpStorm.
 * User: ADAM
 * Date: 20.09.2016
 * Time: 17:55
 */
session_start();
require_once 'session.php';
?>
<h1><a href="register.php">Register</a></h1>

<?php if (Sessions::has('user')) : ?>
    <h1><a href="logout.php">Logout (<?= Sessions::get('user'); ?>)</a></h1>
<?php else : ?>
    <h1><a href="login.php">Login</a></h1>
<?php endif; ?>

<h1><a href="admin.php">Go to admin page</a></h1>

<br/>
<?=isset($_GET['msg'])? $_GET['msg'] : '';
//var_dump($_SESSION)?>
