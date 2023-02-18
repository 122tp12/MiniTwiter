-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Лют 17 2023 р., 19:07
-- Версія сервера: 8.0.30
-- Версія PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `twitter`
--

-- --------------------------------------------------------

--
-- Структура таблиці `twit`
--

CREATE TABLE IF NOT EXISTS `twit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `text` varchar(200) NOT NULL,
  `datePublish` datetime NOT NULL,
  `userId` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `twit`
--

INSERT INTO `twit` (`id`, `title`, `text`, `datePublish`, `userId`) VALUES
(44, 'Twit1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec nunc ornare, congue turpis ut, accumsan velit. Donec quis justo tortor. Ut blandit enim eget.', '2023-02-16 18:00:59', 17),
(45, 'Twit2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque consequat, leo ac mollis lobortis, arcu dolor vulputate turpis, id blandit diam tortor sit amet libero.', '2023-02-16 19:00:59', 17),
(46, 'Twit3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam in lacinia risus. Duis maximus nunc at turpis facilisis, vitae interdum ante rutrum. Aliquam vulputate lacus.', '2023-02-16 20:00:59', 18),
(47, 'Twit4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet odio velit. Nam est velit, vehicula a tristique eget, consequat quis sapien. Class aptent.', '2023-02-16 20:30:59', 17),
(48, 'Twit5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In dapibus pretium venenatis. Suspendisse dignissim, metus at iaculis fringilla, nunc quam hendrerit ipsum, in bibendum erat.', '2023-02-16 21:00:59', 18),
(49, 'Twit6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at dolor sit amet mauris sagittis porttitor sit amet a erat. Nulla malesuada turpis at ligula.', '2023-02-16 21:30:59', 17),
(50, 'Twit7', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at dolor sit amet mauris sagittis porttitor sit amet a erat. Nulla malesuada turpis at ligula.', '2023-02-16 22:00:59', 18),
(51, 'Twit8', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac auctor sem, at congue magna. Vivamus imperdiet ut purus ultricies aliquet. Pellentesque dignissim mauris a.', '2023-02-16 23:00:59', 17),
(52, 'Twit9', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed ornare libero, nec pharetra enim. In eu magna fermentum, imperdiet nulla id, hendrerit erat. Curabitur.', '2023-02-16 23:30:59', 18),
(53, 'Twit10', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In purus tortor, pharetra sed sem id, efficitur hendrerit nisl. Etiam sodales pellentesque viverra. Orci varius natoque.', '2023-02-17 13:00:59', 17),
(54, 'Twit11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus porta posuere interdum. Vestibulum in efficitur nunc, ac ultrices orci. Ut sodales, neque ut scelerisque fermentum.', '2023-02-17 15:00:59', 18);

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `name`, `login`, `password`) VALUES
(17, 'Name1', 'Login1', '$2y$10$Yssmqwog22pIa2tsr8poK.6t6CMAFpO/CXHXLsqC3Y/l0IprHCssy'),/*hashed Password1*/
(18, 'Name2', 'Login2', '$2y$10$g0PW41OQKkANM9gWZ9jX0edWeoPYoreZZS9kuOIPC0RYxpXvHtc1S');/*hashed Password2*/

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `twit`
--
ALTER TABLE `twit`
  ADD CONSTRAINT `twit_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
