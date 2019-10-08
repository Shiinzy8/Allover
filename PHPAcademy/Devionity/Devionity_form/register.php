<?php
/**
 * Created by PhpStorm.
 * User: ADAM
 * Date: 20.09.2016
 * Time: 17:55
 */

require_once ('forms/registration_form.php');
require_once ('db.php');
require_once ('password.php');

$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'login';

$msg = '';

$db = new DB($db_host,$db_user,$db_password,$db_name);
$form = new RegistrationForm($_POST);

if ($_POST) {
    if ($form->validate()) {
        $email = $db->escape($form->getEmail());
        $username = $db->escape($form->getUsername());
        $password = new Password($db->escape($form->getPassword()));

        $res = $db->query("SELECT * FROM users WHERE username = '{$username}'");
        //var_dump($res);
        if ($res) {
            $msg = 'Such user already exists!';
        } else {
            $db->query("INSERT INTO users (username, email, password) VALUES ('{$username}','{$email}','{$password}')");
            header ('location: index.php?msg=You have been registered');
        }
    } else {
        $msg = $form->passwordsMatch() ? 'Please fill in fields' : 'Passwords don\'t match';
    }
}

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
<h1>Register new user</h1>
<b><?= $msg ;?></b>
<br/>
<form action="" method="post">
<!--    Email: <input type="email" name="email" /><br/><br/>-->
<!--    Username: <input type="text" name="username"/><br/><br/>-->
    Email: <input type="email" name="email" value="<?=$form->getEmail();?>"/><br/><br/>
    Username: <input type="text" name="username" value="<?=$form->getUserName();?>"/><br/><br/>
    Password: <input type="password" name="password"/><br/><br/>
    Confirm password: <input type="password" name="passwordConfirm"/><br/><br/>
    <input type="submit"/>
</form>
</body>
</html>