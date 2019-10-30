-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 30 2019 г., 16:05
-- Версия сервера: 5.7.20
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php-shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(45) NOT NULL,
  `browser_name` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `cat_name`, `browser_name`) VALUES
(1, 'sets', 'Сеты'),
(2, 'sushi', 'Суши'),
(3, 'rolls', 'Роллы');

-- --------------------------------------------------------

--
-- Структура таблицы `good`
--

CREATE TABLE `good` (
  `id` int(11) NOT NULL,
  `category` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `composition` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `descr` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `link_name` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='	';

--
-- Дамп данных таблицы `good`
--

INSERT INTO `good` (`id`, `category`, `name`, `composition`, `price`, `descr`, `img`, `link_name`) VALUES
(1, 'sets', 'Сет Запеченный', 'запеченные роллы', 800, 'lorem', 'baked.jpg', 'baked_set'),
(2, 'sets', 'Сет Филамикс', 'три разных ролла Филадельфия', 950, 'lorem', 'philaset.jpg', 'phila_set'),
(3, 'rolls', 'Ролл Филадельфия', 'лосось, сливочный сыр', 300, 'lorem', 'phila.jpg', 'phila'),
(4, 'rolls', 'Ролл Калифорния', 'краб, огурец, масаго', 200, 'lorem', 'california.jpg', 'california'),
(5, 'sushi', 'Суши Лосось', 'лосось, рис', 100, 'lorem', 'salmon.jpg', 'salmon'),
(6, 'sushi', 'Суши Угорь', 'угорь, рис', 110, 'lorem', 'eel.jpg', 'eel');

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sum` int(11) NOT NULL,
  `status` enum('Новый','Завершен') NOT NULL DEFAULT 'Новый'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `order_good`
--

CREATE TABLE `order_good` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sum` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
