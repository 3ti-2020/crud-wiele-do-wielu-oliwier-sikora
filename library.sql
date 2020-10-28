-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Czas generowania: 27 Paź 2020, 10:53
-- Wersja serwera: 8.0.18
-- Wersja PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `library`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `autorzy`
--

DROP TABLE IF EXISTS `autorzy`;
CREATE TABLE IF NOT EXISTS `autorzy` (
  `id_autor` int(11) NOT NULL AUTO_INCREMENT,
  `imie` varchar(30) NOT NULL,
  `nazwisko` varchar(30) NOT NULL,
  PRIMARY KEY (`id_autor`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `autorzy`
--

INSERT INTO `autorzy` (`id_autor`, `imie`, `nazwisko`) VALUES
(1, 'Arthur', 'Doyle'),
(2, 'Agatha', 'Christie'),
(3, 'Andrzej', 'Sapkowski'),
(4, 'Naoki', 'Urasawa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id_book` int(11) NOT NULL AUTO_INCREMENT,
  `id_tytul` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  PRIMARY KEY (`id_book`),
  KEY `obcy_tytul` (`id_tytul`),
  KEY `obcy_autor` (`id_autor`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `books`
--

INSERT INTO `books` (`id_book`, `id_tytul`, `id_autor`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 4, 3),
(5, 5, 4),
(9, 6, 4);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `pozycje`
-- (Zobacz poniżej rzeczywisty widok)
--
DROP VIEW IF EXISTS `pozycje`;
CREATE TABLE IF NOT EXISTS `pozycje` (
`id_book` int(11)
,`nazwisko` varchar(30)
,`tytul` varchar(30)
);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tytuly`
--

DROP TABLE IF EXISTS `tytuly`;
CREATE TABLE IF NOT EXISTS `tytuly` (
  `id_tytul` int(11) NOT NULL AUTO_INCREMENT,
  `tytul` varchar(30) NOT NULL,
  `ISBN` int(11) NOT NULL,
  PRIMARY KEY (`id_tytul`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `tytuly`
--

INSERT INTO `tytuly` (`id_tytul`, `tytul`, `ISBN`) VALUES
(1, 'Studium w szkarłacie', 699),
(2, 'Znak czterech', 702),
(3, 'Morderstwo w Orient Expressie', 727),
(4, 'Sezon burz', 405),
(5, 'Monster', 445),
(6, '20th Century Boys', 686);

-- --------------------------------------------------------

--
-- Struktura widoku `pozycje`
--
DROP TABLE IF EXISTS `pozycje`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pozycje`  AS  select `books`.`id_book` AS `id_book`,`autorzy`.`nazwisko` AS `nazwisko`,`tytuly`.`tytul` AS `tytul` from ((`books` join `tytuly`) join `autorzy`) where ((`tytuly`.`id_tytul` = `books`.`id_tytul`) and (`autorzy`.`id_autor` = `books`.`id_autor`)) ;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `obcy_autor` FOREIGN KEY (`id_autor`) REFERENCES `autorzy` (`id_autor`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `obcy_tytul` FOREIGN KEY (`id_tytul`) REFERENCES `tytuly` (`id_tytul`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
