-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 19 2017 г., 23:19
-- Версия сервера: 5.7.13-log
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `uniweb_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `ident` varchar(32) NOT NULL,
  `value` varchar(255) NOT NULL,
  `version` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `data`
--

INSERT INTO `data` (`ident`, `value`, `version`) VALUES
('first', 'some 1 value', 1),
('second', 'some 2 value', 1),
('ident3', 'some 3 value', 1),
('ident4', 'some 4 value', 1),
('ident5', 'some 5 value', 1),
('6', 'some 6 value', 1),
('ident7', 'some 7 value', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `data`
--
ALTER TABLE `data`
  ADD UNIQUE KEY `ident` (`ident`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
