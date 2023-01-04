-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 04 2023 г., 13:19
-- Версия сервера: 5.7.39
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test_yii`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `parent` varchar(64) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `parent`) VALUES
(1, 'post_category1', '0'),
(2, 'post_category2', '0'),
(3, 'post_catecory3', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `imageFile` text,
  `description` text,
  `category_id` varchar(64) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `name`, `imageFile`, `description`, `category_id`, `created_at`) VALUES
(1, 'dbdgerger', '1672752846pexels-thirdman-7652188-removebg-preview (1) 1.png', 'dfbdfpiytrsd', '2', '2023-01-17 09:01:50'),
(11, 'post123', '1672821757pexels-expect-best-323705-removebg-preview 2.png', 'erer', '1', '2023-01-01 09:02:03'),
(13, 'post_456', '1671026916pexels-thirdman-7652188-removebg-preview (1) 1 (1).png', 'dsvsdv', '3', '1999-01-02 09:02:10'),
(14, 'dbhdeb', '1671023936shutterstock_1493445557.jpg', 'sdvgsdbvsdv', '1', '2006-12-20 09:02:34'),
(15, 'post_89521', '1671025081stock-photo-the-work-of-the-photographer-photo-retouching-photographic-equipment-hat-wallet-female-hands-1079375696-removebg-preview 1.png', 'teast', '3', '2009-12-22 21:00:00'),
(16, 'post_41515', '1671025159Rectangle 7_auto_x2 (1) 1.jpg', 'tresd', '3', '2015-01-04 09:10:41'),
(17, 'post_2558', '1671025214pexels-pixabay-461064-removebg-preview 2 (1).png', 'erqwqwrq', '2', '2019-01-09 09:03:57'),
(18, 'test_category', '1671027625pexels-thirdman-7652188-removebg-preview (1) 1 (1).jpg', 'test_category', '2', '2014-12-02 09:04:08'),
(19, 'rheerher', '1672819515stock-photo-the-work-of-the-photographer-photo-retouching-photographic-equipment-hat-wallet-female-hands-1079375696-removebg-preview-1-transformed.png', 'rtyujtyjtyj', '3', NULL),
(20, 'testtime', '1672819856Rectangle 58 (1).jpg', 'dfdfsdf', '1', '2023-01-04 08:10:56');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
