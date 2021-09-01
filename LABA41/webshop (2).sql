-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 07 2020 г., 06:25
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

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
-- Структура таблицы `pricelist`
--

CREATE TABLE `pricelist` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `col` int(11) NOT NULL,
  `class_t` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pricelist`
--

INSERT INTO `pricelist` (`id`, `name`, `price`, `col`, `class_t`, `info`, `image`) VALUES
(16, 'sad', 56, 13, 'Шуроповерты', 'info/sad.txt', 'images/sad.jpg'),
(17, 'asd', 34, 12, 'Дрели', 'info/asd.txt', 'images/asd.jpg'),
(18, 'hjk', 78, 1, 'Перфораторы', 'info/hjk.txt', 'images/hjk.jpg'),
(19, 'dfg', 456, 9, 'Аккумуляторы', 'info/dfg.txt', 'images/dfg.jpg'),
(20, 'vcx', 67, 3, 'Дрели', 'info/vcx.txt', 'images/vcx.jpg'),
(21, 'dfr', 12, 12, 'Дрели', 'info/dfr.txt', 'images/dfr.jpg'),
(22, 'jlk', 456, 56, 'Аккумуляторы', 'info/jlk.txt', 'images/jlk.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `pricelist`
--
ALTER TABLE `pricelist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `pricelist`
--
ALTER TABLE `pricelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
