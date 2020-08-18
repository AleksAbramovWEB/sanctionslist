-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 18 2020 г., 12:04
-- Версия сервера: 5.7.29
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `reference_books`
--

-- --------------------------------------------------------

--
-- Структура таблицы `sdn_comments`
--

CREATE TABLE `sdn_comments` (
  `ent_num` int(5) UNSIGNED DEFAULT NULL,
  `comment` varchar(596) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sdn_comments`
--

INSERT INTO `sdn_comments` (`ent_num`, `comment`) VALUES
(12300, 'Z S.A.S.; Linked To: RED MUNDIAL INMOBILIARIA, S.A. DE C.V.; Linked To: FUNDACION PARA EL BIENESTAR Y EL PORVENIR; Linked To: C.I. METALURGIA EXTRACTIVA DE COLOMBIA S.A.S.; Linked To: GRUPO MUNDO MARINO, S.A.; Linked To: C.I. DISERCOM S.A.S.; Linked To: C.I. OKCOFFEE COLOMBIA S.A.S.; Linked To: C.I. OKCOFFEE INTERNATIONAL S.A.S.; Linked To: FUNDACION OKCOFFEE COLOMBIA; Linked To: CUBICAFE S.A.S.; Linked To: HOTELES Y BIENES S.A.; Linked To: FUNDACION SALVA LA SELVA; Linked To: LINEA AEREA PUEBLOS AMAZONICOS S.A.S.; Linked To: DESARROLLO MINERO RESPONSABLE C.I. S.A.S.; Linked To: R D I S.A.'),
(15599, 'MI FEL, S. DE R.L. DE C.V.; Linked To: SERVICIO Y OPERADORA SANTA ANA, S.A. DE C.V.; Linked To: TAXI AEREO NACIONAL DE CULIACAN, S.A.; Linked To: VILLAS DEL COLLI S.A. DE C.V.'),
(15600, 'ONDON, S. DE R.L. DE C.V.; Linked To: PETRO MAS, S. DE R.L. DE C.V.; Linked To: PROMI FEL, S. DE R.L. DE C.V.; Linked To: TAXI AEREO NACIONAL DE CULIACAN, S.A.; Linked To: VILLAS DEL COLLI S.A. DE C.V.'),
(28263, 'hn\'; Linked To: LAZARUS GROUP.'),
(28264, 'hone Number 8613314257947; alt. Phone Number 8618004121000; Transactions Prohibited For Persons Owned or Controlled By U.S. Financial Institutions: North Korea Sanctions Regulations section 510.214; Identification Number 210302198701102136 (China); a.k.a. \'blackjack1987\'; a.k.a. \'khaleesi\'; Linked To: LAZARUS GROUP.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `sdn_comments`
--
ALTER TABLE `sdn_comments`
  ADD KEY `ent_num` (`ent_num`);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `sdn_comments`
--
ALTER TABLE `sdn_comments`
  ADD CONSTRAINT `sdn_comments_ibfk_1` FOREIGN KEY (`ent_num`) REFERENCES `sdn` (`ent_num`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
