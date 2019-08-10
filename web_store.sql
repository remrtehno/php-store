-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 10 2019 г., 11:19
-- Версия сервера: 5.6.22-log
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `web_store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`) VALUES
(1, 'cat 12', ''),
(2, 'cat 2', ''),
(3, 'Cras bibendum auctor3', ''),
(4, 'Donec sodales bibendum', ''),
(5, 'Etiam in tellus', ''),
(6, 'Product', ''),
(7, 'bla bal', ''),
(8, '!!!', '');

-- --------------------------------------------------------

--
-- Структура таблицы `commetns`
--

CREATE TABLE IF NOT EXISTS `commetns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `img_slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `commetns`
--

INSERT INTO `commetns` (`id`, `prod_id`, `author`, `text`, `img_slug`) VALUES
(1, 1, '321', '\r\n323\r\n\r\n', ''),
(2, 1, 'test', '  3224', ''),
(3, 1, '14', '14', ''),
(4, 1, '4234', '  wrerw', '');

-- --------------------------------------------------------

--
-- Структура таблицы `footer_cat`
--

CREATE TABLE IF NOT EXISTS `footer_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `footer_cat`
--

INSERT INTO `footer_cat` (`id`, `name`, `slug`) VALUES
(1, 'cat 1', 'cat1'),
(2, 'cat 2', 'cat2');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_item`
--

CREATE TABLE IF NOT EXISTS `menu_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `menu_item`
--

INSERT INTO `menu_item` (`id`, `text`, `slug`) VALUES
(1, 'Home', '/'),
(2, 'Products', 'products.php'),
(3, 'About', 'about.php'),
(4, 'FAQs', 'faq.php'),
(5, 'Checkout', 'checkout.php'),
(6, 'Contact', 'contact.php');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_id_second` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `user_id_second`, `name`, `msg`) VALUES
(22, 22, 23, 'Armin', '324234'),
(23, 23, 22, 'Armin 2', '1231231'),
(24, 23, 22, 'Armin 2', 'eqweq'),
(25, 24, 22, 'User', '123123123123'),
(26, 24, 22, 'User', 'qweqwe');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `orders_submitted`
--

CREATE TABLE IF NOT EXISTS `orders_submitted` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `orders_submitted`
--

INSERT INTO `orders_submitted` (`id`, `user_id`, `item_id`, `quantity`, `status`) VALUES
(10, 15, 1, 1, 'submitted/waiting'),
(11, 15, 2, 1, 'submitted/waiting'),
(12, 15, 6, 55, 'submitted/waiting'),
(13, 15, 1, 8, 'submitted/waiting'),
(14, 22, 2, 5, 'submitted/waiting');

-- --------------------------------------------------------

--
-- Структура таблицы `product_items`
--

CREATE TABLE IF NOT EXISTS `product_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `img_slug` varchar(255) NOT NULL,
  `in_stock` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `brand` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `product_items`
--

INSERT INTO `product_items` (`id`, `cat_id`, `slug`, `name`, `price`, `img_slug`, `in_stock`, `model`, `description`, `brand`) VALUES
(1, 1, 'lamp/', 'lamp', 1204, 'images/product/01.jpg', 'in stock', '104R', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper quam sit amet turpis rhoncus id venenatis tellus sollicitudin. Fusce ullamcorper, dolor non mollis pulvinar, turpis tortor commodo nisl, et semper lectus augue blandit tellus. Quisque id bibendum libero.', 'APPLE'),
(2, 2, 'measurement/', 'measurement', 4899, 'images/product/02.jpg', 'in stock', 'MR 222', 'descritition descritition descritition descritition descritition descritition descritition 23432423', 'SONY'),
(3, 2, 'cooler/', 'cooler', 500, 'images/product/03.jpg', 'in stock', 'STQ-230', 'descritition descritition descritition descritition r ur320 umrm b23u0ru23', 'SAMSUNG'),
(4, 3, 'boots/', 'boots', 220, 'images/product/04.jpg', 'not available', 'NT6', 'r23r23r23r', 'NOKIA'),
(5, 1, 'boots', 'test  5', 250, 'images/product/05.jpg', 'not available', 'NNN#', '343 34 rt34', 'LG'),
(13, 1, '', 'User', 987, '../uploads/img/2.png.jpg', 'in_stock', 'r505', '', 'apl'),
(14, 1, '', 'Product', 560, '../uploads/img/2b5f44609cdb.jpg.jpg', 'in_stock', '', '', ''),
(15, 1, '', 'Products of image', 560, '../uploads/img/5d39e92a13502bc1a9a8a3cb93c5e65c.jpg.jpg', 'in_stock', '27827', '5727', '278272');

-- --------------------------------------------------------

--
-- Структура таблицы `product_slider`
--

CREATE TABLE IF NOT EXISTS `product_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_slug` varchar(255) NOT NULL,
  `prod_slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `product_slider`
--

INSERT INTO `product_slider` (`id`, `img_slug`, `prod_slug`) VALUES
(3, 'images/gallery/01.jpg', 'images/gallery/01.jpg'),
(4, 'images/gallery/02.jpg', 'images/gallery/02.jpg'),
(6, 'images/gallery/03.jpg', 'images/gallery/03.jpg'),
(7, 'images/gallery/04.jpg', 'images/gallery/04.jpg'),
(8, 'images/gallery/06.jpg', 'images/gallery/06.jpg'),
(9, 'images/gallery/01.jpg', 'images/gallery/01.jpg'),
(10, 'images/gallery/01.jpg', 'images/gallery/01.jpg'),
(11, 'images/gallery/01.jpg', 'images/gallery/01.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `pass`) VALUES
(22, 'Name 1', 'Armin', '1'),
(23, 'Name 2', 'Armin 2', '12'),
(24, 'NEW', '23123', '4444');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
