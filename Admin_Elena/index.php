<?php

// получение динамичной части шаблона #content
$view = empty($_GET['view']) ? 'pages' : $_GET['view'];

switch($view){
    case('pages'):
        // страницы
    break;
    
    case('informers'):
        // информеры
    break;
    
    default:
    // если из адресной строки получено имя несуществующего вида
    $view = 'pages';
}

// HEADER
include 'templates/header.php';

// LEFTBAR
include 'templates/leftbar.php';

// CONTENT
include 'templates/'.$view.'.php';

?>