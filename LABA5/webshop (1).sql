-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 24 2020 г., 11:56
-- Версия сервера: 10.2.7-MariaDB
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `webshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `id_class` text NOT NULL,
  `class_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `class`
--

INSERT INTO `class` (`id`, `id_class`, `class_name`) VALUES
(1, '1', 'Шуруповерты'),
(2, '2', 'Дрели'),
(3, '3', 'Перфараторы'),
(4, '4', 'Аккумуляторы');

-- --------------------------------------------------------

--
-- Структура таблицы `pod_category`
--

CREATE TABLE `pod_category` (
  `id` int(11) NOT NULL,
  `pod_cat_id` int(11) NOT NULL,
  `pod_cat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pod_category`
--

INSERT INTO `pod_category` (`id`, `pod_cat_id`, `pod_cat`) VALUES
(1, 1, 'Дешевые'),
(2, 2, 'Средние'),
(3, 3, 'Дорогие');

-- --------------------------------------------------------

--
-- Структура таблицы `pricelist`
--

CREATE TABLE `pricelist` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `col` int(11) NOT NULL,
  `class_t` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pod_cat_mat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pricelist`
--

INSERT INTO `pricelist` (`id`, `name`, `price`, `col`, `class_t`, `info`, `image`, `pod_cat_mat`) VALUES
(16, 'sad', 56, 13, '2', 'Что-то', 'images/sad.jpg', 1),
(17, 'asd', 34, 12, '1', 'Что-то', 'images/asd.jpg', 2),
(18, 'hjk', 78, 1, '4', 'Что-то', 'images/hjk.jpg', 3),
(19, 'dfg', 456, 9, '3', 'Что-то', 'images/dfg.jpg', 1),
(20, 'vcx', 67, 3, '2', 'Что-то', 'images/vcx.jpg', 2),
(21, 'dfr', 12, 12, '2', 'Что-то', 'images/dfr.jpg', 3),
(22, 'jlk', 456, 56, '1', 'Что-то', 'images/jlk.jpg', 1),
(32, 'lkj', 49, 3, '3', 'Что-то', 'images/lkj.jpg', 2),
(33, 'ggg', 30, 30, '2', 'dx d fd df df f', 'images/ggg.jpg', 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pod_category`
--
ALTER TABLE `pod_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pricelist`
--
ALTER TABLE `pricelist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `pod_category`
--
ALTER TABLE `pod_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `pricelist`
--
ALTER TABLE `pricelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
