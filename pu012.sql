-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 07 2022 г., 08:32
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pu012`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `date_create` datetime NOT NULL,
  `description` varchar(4000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Список продуктів';

--
-- Дамп данных таблицы `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `name`, `image`, `price`, `date_create`, `description`) VALUES
(1, 'Беспроводная игровая клавиатура и мышь UKC HK-8100', 'keybord.jpg', '480', '2022-12-07 09:25:09', 'Стильний зручний комплект HK-8100, що складається з бездротової клавіатури і миші. Комплект бездротової клавіатури з мишею HK-8100 поєднує в собі зручність бездротової технології з надійністю провідний. Набір має рівну глянсову поверхню, такий набір стане яскравим акцентом на будь-якому робочому столі.'),
(3, 'Green Cell® Car Power Inverter Converter 12V to 230V 300W/600W Pure sine', '12_230_3000x600_pureSine.jpg', '4502', '2022-12-07 09:31:06', 'nverter is a device which changes a direct current voltage from the car accumulator or car ligter into an alternating current ~230V. Exactly the same signal is in every power plug (Type F) in Europe. Inverter is an excelent choice for everyone who travels by car, camper or a truck. It will be perfect in places without direct access to power plugs.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
