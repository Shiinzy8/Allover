# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/lumen-framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/lumen-framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/lumen)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Contributing

Thank you for considering contributing to Lumen! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Test task

Stack:
Lumen
PostgreSQL


Task:
Create RESTFull API.


Description:
Create the API to share the company's information for the logged users.
Please use the Repository-Service pattern in your task.


Details:
Create DB migrations for the tables: users, companies, etc.
Suggest the DB structure. Fill the DB with the test data.


Endpoints:
- https://domain.com/api/user/register
— method POST
— fields: first_name [string], last_name [string], email [string], password [string], phone [string]


- https://domain.com/api/user/sign-in
— method POST
— fields: email [string], password [string]


- https://domain.com/api/user/recover-password
— method POST/PATCH
— fields: email [string] // allow to update the password via email token


- https://domain.com/api/user/companies
— method GET
— fields: title [string], phone [string], description [string]
— show the companies, associated with the user (by the relation)


- https://domain.com/api/user/companies
— method POST
— fields: title [string], phone [string], description [string]
— add the companies, associated with the user (by the relation)


Unit tests are optional.

copy .env.example to .env

docker-composer:  
>docker-composer up -d

run composer install:    
>docker-compose run composer install  

run seeds:  
> docker-compose run artisan db:seed  

run test:  
>docker-compose exec lumen /bin/bash  
>./vendor/bin/phpunit  
