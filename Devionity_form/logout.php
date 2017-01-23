<?php
/**
 * Created by PhpStorm.
 * User: ADAM
 * Date: 28.09.2016
 * Time: 13:30
 */
session_start();
require_once 'session.php';

Sessions::destroy();
header('Location: index.php?msg=You have been logged out');