<?php
/**
 * Created by PhpStorm.
 * User: ADAM
 * Date: 27.09.2016
 * Time: 19:49
 */
session_start();
require_once 'forms/login_form.php';
require_once 'db.php';
require_once 'password.php';
require_once 'session.php';

$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'login';

$msg = '';

$db = new DB($db_host, $db_user, $db_password, $db_name);
$form = new LoginForm($_POST);

if ($_POST) {
    //var_dump($_SESSION);
    if ($form->validate()) {
        $username = $db->escape($form->getUsername());
        $password = new Password($db->escape($form->getPassword()));
        
        $res = $db->query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' LIMIT 1");
        if (!$res) {
            $msg = 'NO such user found';
        } else {
            $user = $res[0]['username'];
            Sessions::set('user',$user);
            header('Location: index.php?msg=You have been logged in');
        }
    } else {
        $msg = 'Please fill in fields';
    }
}
//var_dump($_POST);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<h1>Login</h1>
<b><?=$msg; ?></b>
<br/>
<form method="post">
    Username: <input type="text" name="username" value=""> <br/><br/>
    Password: <input type="password" name="password"> <br/><br/>
    <input type="Submit"/>
</form>
</body>
</html>

