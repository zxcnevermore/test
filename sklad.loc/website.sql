-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 10 2021 г., 13:36
-- Версия сервера: 10.4.18-MariaDB
-- Версия PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `website`
--

-- --------------------------------------------------------

--
-- Структура таблицы `polzovateli`
--

CREATE TABLE `polzovateli` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(25) NOT NULL,
  `login` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `polzovateli`
--

INSERT INTO `polzovateli` (`id`, `name`, `login`, `password`) VALUES
(17, 'Юрий', 'rjkzy03', '4324fab8f870e0f187328300268a8dfb'),
(14, 'Валерий', 'admin', '6eb94c52f8eafba90877d8fced85f9f2');

-- --------------------------------------------------------

--
-- Структура таблицы `prodaji`
--

CREATE TABLE `prodaji` (
  `id` int(11) NOT NULL,
  `Tovarid` int(11) NOT NULL,
  `TovarName` varchar(100) NOT NULL,
  `Kolichestvo` int(11) NOT NULL,
  `Klient` varchar(100) NOT NULL,
  `Gruppa` varchar(100) NOT NULL,
  `Edizmer` varchar(100) NOT NULL,
  `Price` decimal(9,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `prodaji`
--

INSERT INTO `prodaji` (`id`, `Tovarid`, `TovarName`, `Kolichestvo`, `Klient`, `Gruppa`, `Edizmer`, `Price`) VALUES
(1, 10, 'Соль', 10, 'ООО Продукты', 'Продукты', 'Кг', '499.00');

-- --------------------------------------------------------

--
-- Структура таблицы `sklad`
--

CREATE TABLE `sklad` (
  `id` int(11) NOT NULL,
  `TovarName` varchar(25) NOT NULL,
  `kolichestvo` int(11) NOT NULL,
  `Klient` int(11) NOT NULL,
  `Gruppa` varchar(25) NOT NULL,
  `Edizmer` varchar(25) NOT NULL,
  `Price` decimal(9,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sklad`
--

INSERT INTO `sklad` (`id`, `TovarName`, `kolichestvo`, `Klient`, `Gruppa`, `Edizmer`, `Price`) VALUES
(25, 'Мука', 10, 0, 'Продукты', 'Киллограм', '500.00'),
(26, 'Велосипед', 32, 0, 'материал', 'Кг', '500.00'),
(27, 'Велосипед', 2, 0, 'материал', 'Кг', '500.00'),
(29, 'Мука', 2, 0, 'материал', 'Кг', '499.00'),
(30, 'dsa', 2, 0, 'материал', 'Кг', '31000.00'),
(31, 'Велосипед', 32, 0, 'Транспорт ', 'шт', '400.00');

-- --------------------------------------------------------

--
-- Структура таблицы `zakupki`
--

CREATE TABLE `zakupki` (
  `id` int(11) NOT NULL,
  `Tovarid` int(11) NOT NULL,
  `TovarName` varchar(100) NOT NULL,
  `kolichestvo` int(11) NOT NULL,
  `Postavshik` varchar(100) NOT NULL,
  `Gruppa` varchar(100) NOT NULL,
  `Edizmer` varchar(100) NOT NULL,
  `Price` decimal(9,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zakupki`
--

INSERT INTO `zakupki` (`id`, `Tovarid`, `TovarName`, `kolichestvo`, `Postavshik`, `Gruppa`, `Edizmer`, `Price`) VALUES
(1, 0, 'Известь', 20, 'ООО Известь', 'Строй Материал', 'Кг', '499.00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `polzovateli`
--
ALTER TABLE `polzovateli`
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Индексы таблицы `prodaji`
--
ALTER TABLE `prodaji`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sklad`
--
ALTER TABLE `sklad`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `zakupki`
--
ALTER TABLE `zakupki`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `polzovateli`
--
ALTER TABLE `polzovateli`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `prodaji`
--
ALTER TABLE `prodaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `sklad`
--
ALTER TABLE `sklad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `zakupki`
--
ALTER TABLE `zakupki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
