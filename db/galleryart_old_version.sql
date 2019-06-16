-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 28 2019 г., 21:47
-- Версия сервера: 5.6.41
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
-- База данных: `galleryart`
--

-- --------------------------------------------------------

--
-- Структура таблицы `img`
--

CREATE TABLE `img` (
  `ImgID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `LinkImg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `img`
--

INSERT INTO `img` (`ImgID`, `UserID`, `LinkImg`) VALUES
(1, 1, 'https://images.unsplash.com/flagged/photo-1554935897-1bb0d260620a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'),
(2, 1, 'https://images.unsplash.com/photo-1516638129451-1a136c7bd25b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80'),
(3, 2, 'https://images.unsplash.com/photo-1502759683299-cdcd6974244f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80'),
(4, 3, 'https://images.unsplash.com/photo-1554400541-5995a563b425?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1267&q=80'),
(5, 4, 'https://images.unsplash.com/photo-1526259552382-d6819a277cfb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1457&q=80'),
(6, 5, 'https://images.unsplash.com/photo-1538255351853-9163d93265b0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1886&q=80'),
(7, 5, 'https://images.unsplash.com/photo-1538249101370-1aa8a3cd3133?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1649&q=80'),
(8, 5, 'https://images.unsplash.com/photo-1538248693193-261993237235?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1351&q=80'),
(9, 5, 'https://images.unsplash.com/photo-1538229121019-39a762c54c45?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80'),
(10, 5, 'https://images.unsplash.com/photo-1538228585993-961ccc1704b1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1716&q=80'),
(11, 5, 'https://images.unsplash.com/photo-1537210249814-b9a10a161ae4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1489&q=80'),
(12, 5, 'https://images.unsplash.com/photo-1532631891352-5bb716114dc1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1823&q=80'),
(13, 5, 'https://images.unsplash.com/photo-1532631501912-da845d838f18?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1790&q=80'),
(14, 5, 'https://images.unsplash.com/photo-1532631339877-cde4c59ca71b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80'),
(15, 5, 'https://images.unsplash.com/photo-1532630878505-e11bbd6eedc9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1693&q=80'),
(16, 5, 'https://images.unsplash.com/photo-1530822273753-f8e59a2b32a6?ixlib=rb-1.2.1&auto=format&fit=crop&w=1847&q=80'),
(17, 5, 'https://images.unsplash.com/photo-1530634693970-4f30bb329de4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1765&q=80'),
(18, 5, 'https://images.unsplash.com/photo-1528484786961-e60128675768?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1651&q=80'),
(19, 6, 'https://images.unsplash.com/photo-1528799319079-c756e5218c8c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1434&q=80'),
(20, 6, 'https://images.unsplash.com/photo-1528799372938-a8f8955fdf8c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1378&q=80'),
(21, 6, 'https://images.unsplash.com/photo-1528798219910-dca50969c505?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1489&q=80'),
(22, 6, 'https://images.unsplash.com/photo-1528797297413-b1f89d66ddb1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1489&q=80'),
(23, 6, 'https://images.unsplash.com/photo-1528418070076-59ce313f46ad?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80'),
(24, 6, 'https://images.unsplash.com/photo-1528417609890-fe35f5173cf3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80'),
(25, 7, 'https://images.unsplash.com/photo-1417577097439-425fb7dec05e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1489&q=80'),
(26, 7, 'https://images.unsplash.com/photo-1417572520505-e55f870004ad?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1489&q=80'),
(27, 7, 'https://images.unsplash.com/photo-1507475119437-d0c72d8e9a18?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=663&q=80'),
(28, 5, 'https://images.unsplash.com/photo-1547401372-0ac4589c4d3e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=663&q=80'),
(29, 5, 'https://images.unsplash.com/photo-1541626454066-44f3786cbb22?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=700&q=80'),
(30, 5, 'https://images.unsplash.com/photo-1541625860792-7251076c4674?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=699&q=80'),
(31, 5, 'https://images.unsplash.com/photo-1541624468236-601b7c83b16d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=733&q=80'),
(32, 5, 'https://images.unsplash.com/photo-1541623754647-3891d414145a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=744&q=80'),
(33, 5, 'https://images.unsplash.com/photo-1538255278235-7d13c9dfa5d4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=779&q=80'),
(34, 5, 'https://images.unsplash.com/photo-1538254960941-75bf110264a6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=688&q=80'),
(35, 5, 'https://images.unsplash.com/photo-1538255107892-b53e90a842c0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=820&q=80'),
(36, 5, 'https://images.unsplash.com/photo-1538254335838-53c6b40b26c7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80'),
(37, 5, 'https://images.unsplash.com/photo-1538254134849-b9e89636b398?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80'),
(38, 5, 'https://images.unsplash.com/photo-1538250058026-3ec724fc1ff0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=691&q=80'),
(39, 5, 'https://images.unsplash.com/photo-1538249787369-65811be6906e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=711&q=80'),
(40, 5, 'https://images.unsplash.com/photo-1538249953228-296b28db7d46?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=733&q=80'),
(41, 3, 'https://images.unsplash.com/photo-1554400400-9d569dbcebbc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1267&q=80'),
(42, 3, 'https://images.unsplash.com/photo-1553968328-79381ad78ff4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80'),
(43, 3, 'https://images.unsplash.com/photo-1553627092-8f6ce13b85f3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1267&q=80'),
(44, 3, 'https://images.unsplash.com/photo-1553495280-37259d1e6ebc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=827&q=80'),
(45, 3, 'https://images.unsplash.com/photo-1553627092-20b656250e17?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1267&q=80'),
(46, 3, 'https://images.unsplash.com/photo-1553218106-e1363fa922c4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1267&q=80'),
(47, 3, 'https://images.unsplash.com/photo-1553218105-2ed74df53e02?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=666&q=80'),
(48, 3, 'https://images.unsplash.com/photo-1553218106-57e21e842e44?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1267&q=80'),
(49, 3, 'https://images.unsplash.com/photo-1552980870-139c7b393f0c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1268&q=80'),
(50, 3, 'https://images.unsplash.com/photo-1552980870-b398e0f6ee04?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1268&q=80'),
(51, 3, 'https://images.unsplash.com/photo-1552980870-a8d254fe2936?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1268&q=80'),
(52, 3, 'https://images.unsplash.com/photo-1552980869-91209b24116b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1248&q=80'),
(53, 3, 'https://images.unsplash.com/photo-1552882242-d4f02cffecf7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1402&q=80'),
(54, 6, 'https://images.unsplash.com/photo-1529165135152-a4f0fd319d8a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80'),
(55, 6, 'https://images.unsplash.com/photo-1528811544443-1913d0de989d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80'),
(56, 6, 'https://images.unsplash.com/photo-1528799415853-9c67fb077fd5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80'),
(57, 6, 'https://images.unsplash.com/photo-1528798797239-4c3641900b63?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80'),
(58, 6, 'https://images.unsplash.com/photo-1528798575903-a4718246c937?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=80'),
(59, 6, 'https://images.unsplash.com/photo-1528797531057-1fca229e697d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80'),
(60, 6, 'https://images.unsplash.com/photo-1528418650557-03b35731fd59?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80'),
(61, 6, 'https://images.unsplash.com/photo-1528417254876-ecebd447eaef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80'),
(62, 6, 'https://images.unsplash.com/photo-1528417168099-b77eaef6e55e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80'),
(63, 8, 'https://images.unsplash.com/photo-1555400647-e75a275044b9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1490&q=80'),
(64, 8, 'https://images.unsplash.com/photo-1553702446-4a0cfb5781f8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1351&q=80'),
(65, 8, 'https://images.unsplash.com/photo-1553702446-42d470a24270?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1351&q=80'),
(66, 8, 'https://images.unsplash.com/photo-1553702446-a39d6fbee6cb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1351&q=80'),
(67, 9, 'https://images.unsplash.com/photo-1555439258-f36296419e7a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80'),
(68, 9, 'https://images.unsplash.com/photo-1555439486-42002be02e42?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1267&q=80'),
(69, 9, 'https://images.unsplash.com/photo-1555439486-6782f53923c9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=675&q=80'),
(70, 9, 'https://images.unsplash.com/photo-1555439258-2b8a28db70df?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80'),
(71, 9, 'https://images.unsplash.com/photo-1555439486-75d2d7a3b9fd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=675&q=80'),
(72, 9, 'https://images.unsplash.com/photo-1555439258-acee106e453b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80'),
(73, 9, 'https://images.unsplash.com/photo-1555439486-873f1e3233b0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=675&q=80'),
(74, 9, 'https://images.unsplash.com/photo-1555439258-75607ee0c01f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80'),
(75, 9, 'https://images.unsplash.com/photo-1555438500-095ccde9245c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=675&q=80'),
(76, 9, 'https://images.unsplash.com/photo-1555438468-aafd1ab4234d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1267&q=80'),
(77, 9, 'https://images.unsplash.com/photo-1554486851-c71d1a512f05?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80'),
(78, 9, 'https://images.unsplash.com/photo-1554486851-5ed46f44350b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80'),
(79, 9, 'https://images.unsplash.com/photo-1554486840-cf14dc36d0fd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80'),
(80, 9, 'https://images.unsplash.com/photo-1554486839-fafc33f4eec4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80'),
(81, 1, 'https://images.unsplash.com/photo-1555430860-abe10ed51acf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80'),
(82, 1, 'https://images.unsplash.com/photo-1516737976105-136883458db7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=664&q=80'),
(83, 9, 'https://images.unsplash.com/photo-1554019179-59246bbd4058?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80'),
(84, 9, 'https://images.unsplash.com/photo-1554019180-80a5d4c3df91?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80'),
(85, 9, 'https://images.unsplash.com/photo-1554019181-990b0ef6a44f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80'),
(86, 9, 'https://images.unsplash.com/photo-1554019152-6c3301f8eb55?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80'),
(87, 9, 'https://images.unsplash.com/photo-1553844078-e7a04f8480c4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=675&q=80'),
(88, 9, 'https://images.unsplash.com/photo-1553844077-a1b494a4dea0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=675&q=80'),
(89, 9, 'https://images.unsplash.com/photo-1553842302-48141de917c0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=676&q=80'),
(90, 9, 'https://images.unsplash.com/photo-1553763502-c4aca528d672?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80'),
(91, 9, 'https://images.unsplash.com/photo-1553255704-cad8ffc3d258?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1267&q=80'),
(92, 9, 'https://images.unsplash.com/photo-1553255703-e8aa3b757463?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=675&q=80'),
(93, 9, 'https://images.unsplash.com/photo-1553248443-ee8ecde34fb2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=676&q=80'),
(94, 9, 'https://images.unsplash.com/photo-1553248443-ffaac83acf44?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=675&q=80'),
(95, 9, 'https://images.unsplash.com/photo-1553248443-95922348250a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=656&q=80'),
(96, 9, 'https://images.unsplash.com/photo-1553148006-04f59fb67e7f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1267&q=80'),
(97, 10, 'https://images.unsplash.com/photo-1555435509-c1e95c453525?ixlib=rb-1.2.1&auto=format&fit=crop&w=658&q=80'),
(98, 10, 'https://images.unsplash.com/photo-1555434992-f1670f5e8fce?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80'),
(99, 10, 'https://images.unsplash.com/photo-1555375771-14b2a63968a9?ixlib=rb-1.2.1&auto=format&fit=crop&w=658&q=80'),
(100, 10, 'https://images.unsplash.com/photo-1555372675-80ce03053670?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'),
(101, 10, 'https://images.unsplash.com/photo-1555181937-efe4e074a301?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80'),
(102, 10, 'https://images.unsplash.com/photo-1555344945-a8de57648a78?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80'),
(103, 10, 'https://images.unsplash.com/photo-1554755229-ca4470e07232?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80'),
(104, 10, 'https://images.unsplash.com/photo-1554231316-b49572f1eca1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80'),
(105, 10, 'https://images.unsplash.com/photo-1554230128-779fef06f505?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1798&q=80'),
(106, 10, 'https://images.unsplash.com/photo-1554230123-c6a9c328ceb0?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(60) NOT NULL,
  `ProfileImg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`UserID`, `UserName`, `ProfileImg`) VALUES
(1, 'Гаррет Патц', 'https://images.unsplash.com/profile-1516738331002-6b78855aa59f?dpr=1&auto=format&fit=crop&w=150&h=150&q=60&crop=faces&bg=fff'),
(2, 'Прометей Санчес Носков', 'https://images.unsplash.com/profile-fb-1502759093-feb6b028c687.jpg?dpr=1&auto=format&fit=crop&w=150&h=150&q=60&crop=faces&bg=fff'),
(3, 'Берти Бенбанасте', 'https://images.unsplash.com/profile-1552879202500-e78bba936165?dpr=1&auto=format&fit=crop&w=150&h=150&q=60&crop=faces&bg=fff'),
(4, 'Джонатан Алегрия', 'https://images.unsplash.com/profile-1526259892310-6be09a6313c6?dpr=1&auto=format&fit=crop&w=150&h=150&q=60&crop=faces&bg=fff'),
(5, 'Феликс Миттермайер', 'https://images.unsplash.com/profile-1526921379241-061fb1a2bdbb?dpr=1&auto=format&fit=crop&w=150&h=150&q=60&crop=faces&bg=fff'),
(6, 'Чан Хой', 'https://images.unsplash.com/profile-1511409183479-dc3a39640787?dpr=1&auto=format&fit=crop&w=150&h=150&q=60&crop=faces&bg=fff'),
(7, 'Джу Ву', 'https://images.unsplash.com/profile-1500100584591-1853fcf670e5?dpr=1&auto=format&fit=crop&w=150&h=150&q=60&crop=faces&bg=fff'),
(8, 'Висар Незири', 'https://images.unsplash.com/profile-1555319409297-e914e5593dd9?dpr=1&auto=format&fit=crop&w=150&h=150&q=60&crop=faces&bg=fff'),
(9, 'Энни Спратт', 'https://images.unsplash.com/profile-1508107410047-a34950174b6b?dpr=1&auto=format&fit=crop&w=150&h=150&q=60&crop=faces&bg=fff'),
(10, 'Уэсли Тингей', 'https://images.unsplash.com/profile-1553820026068-d1d8985981c0?dpr=1&auto=format&fit=crop&w=150&h=150&q=60&crop=faces&bg=fff');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`ImgID`),
  ADD KEY `UserID` (`UserID`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `img`
--
ALTER TABLE `img`
  MODIFY `ImgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `img`
--
ALTER TABLE `img`
  ADD CONSTRAINT `img_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
