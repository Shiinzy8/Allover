<?php
/**
 * Created by PhpStorm.
 * User: ADAM
 * Date: 25.06.2017
 * Time: 23:42
 */

namespace book;

interface iBook
{
    public function getName(); //Получаем название книги
    public function setName($name); //Получаем название книги
    public function getId(); //Получаем название книги
    public function getType(); //Получаем название книги
    public function getAuthor(); //Получаем название книги
    public function getYear(); //Получаем название книги
    public function getPage(); //Получаем название книги
    public function getCondition(); //Получаем название книги
    public function reduceCondtion(); //Получаем название книги
}