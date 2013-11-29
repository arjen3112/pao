-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 29 nov 2013 om 07:34
-- Serverversie: 5.5.24-log
-- PHP-versie: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `pao`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `password` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `profiel` int(1) DEFAULT NULL,
  `adres` varchar(50) DEFAULT NULL,
  `huisnummer` varchar(7) DEFAULT NULL,
  `postcode` varchar(7) DEFAULT NULL,
  `telefoon` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `accounts`
--

INSERT INTO `accounts` (`id`, `account`, `password`, `email`, `profiel`, `adres`, `huisnummer`, `postcode`, `telefoon`) VALUES
(1, 'Administrator', 'admin1', 'admin1@admin.com', 1, 'Localhost', '1', '1234 AB', '0123-123456');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `pagina` text NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `content`
--

INSERT INTO `content` (`id`, `content`, `pagina`, `type`) VALUES
(1, 'hallo123', 'homepage', 'text'),
(2, 'images/homepage/afbeelding1/admins_riding_me.png', 'homepage', 'image'),
(3, 'images/homepage/afbeelding2/firstpenta.png', 'homepage', 'image');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `itemswebshop`
--

CREATE TABLE IF NOT EXISTS `itemswebshop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` text NOT NULL,
  `waarde` int(11) NOT NULL,
  `plaatje` text NOT NULL,
  `menuitem` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `itemswebshop`
--

INSERT INTO `itemswebshop` (`id`, `naam`, `waarde`, `plaatje`, `menuitem`) VALUES
(1, 'test123', 150, 'images/webshop/brood.jpg', 'taarten'),
(2, 'test2345', 10, 'images/webshop/taart.jpg', 'taarten');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menuitemswebshop`
--

CREATE TABLE IF NOT EXISTS `menuitemswebshop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` text NOT NULL,
  `href` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `menuitemswebshop`
--

INSERT INTO `menuitemswebshop` (`id`, `item`, `href`) VALUES
(1, 'taarten', '?menuoptie=webshop&webshop=taarten'),
(2, 'cake', '?menuoptie=webshop&webshop=cake');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
