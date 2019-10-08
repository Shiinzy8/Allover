<?php
/**
 * Created by PhpStorm.
 * User: ADAM
 * Date: 28.09.2016
 * Time: 13:31
 */
session_start();
require_once 'session.php';

if (Sessions::has('user')) {
    echo 'Hello, ' . Sessions::get('user');
} else {
    echo 'Register area! Get out!';
}