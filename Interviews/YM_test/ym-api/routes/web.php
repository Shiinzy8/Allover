<?php

use Laravel\Lumen\Routing\Router;

/** @var Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/user'], function() use ($router) {
    $router->post('register', 'UserController@register');
    $router->post('sign-in', 'UserController@signIn');
    $router->post('recovery-password', 'UserController@recoveryPassword');
    $router->patch('recovery-password', 'UserController@resetPassword');

    $router->group(['middleware' => 'auth'], function() use ($router) {
        $router->get('companies', 'UserController@companiesShow');
        $router->post('companies', 'UserController@companiesAdd');
    });
});


