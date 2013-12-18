-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 18 dec 2013 om 08:28
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `accounts`
--

INSERT INTO `accounts` (`id`, `account`, `password`, `email`, `profiel`, `adres`, `huisnummer`, `postcode`, `telefoon`) VALUES
(1, 'Administrator', 'admin1', 'admin1@admin.com', 1, 'Localhost', '2', '1234 AB', '0123-123456'),
(2, 'arjen1killer', 'lol1', 'lol@lol.nl', 2, 'Lollol', '12', '1234 AB', '1234-123435'),
(3, 'soep', 'Soep1', 'wiiiiiiieep@mitchellton.com', 2, 'Yolowoop', '34', '9384 AB', '0321-859865');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestellingen`
--

CREATE TABLE IF NOT EXISTS `bestellingen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(15) DEFAULT NULL,
  `itemid` int(11) NOT NULL,
  `itemnaam` text NOT NULL,
  `waarde` int(11) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Gegevens worden uitgevoerd voor tabel `bestellingen`
--

INSERT INTO `bestellingen` (`id`, `account`, `itemid`, `itemnaam`, `waarde`, `status`) VALUES
(1, 'Administrator', 1, 'test123', 150, 'wordt verwerkt'),
(2, 'Administrator', 2, 'test2345', 10, 'wordt verwerkt'),
(3, 'Administrator', 4, 'testtoevoegen', 1234, 'wordt verwerkt'),
(4, 'Administrator', 5, 'alskjgakljghaekjgnkarjvejvakejnkajnbvk', 2147483647, 'wordt verwerkt'),
(5, 'soep', 2, 'test2345', 10, 'wordt verwerkt'),
(6, 'soep', 4, 'testtoevoegen', 1234, 'wordt verwerkt');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Gegevens worden uitgevoerd voor tabel `content`
--

INSERT INTO `content` (`id`, `content`, `pagina`, `type`) VALUES
(1, 'dfhjdghm', 'homepage', 'text'),
(2, 'images/homepage/afbeelding1/epicadmins.png', 'homepage', 'image'),
(3, 'images/homepage/afbeelding2/firstpenta.png', 'homepage', 'image'),
(4, 'sjlsfjl', 'informatie', 'text'),
(5, 'images/informatie/firstpenta.png', 'informatie', 'image'),
(6, 'gfdjdghgghdgdhdhgjd', 'informatie', 'text');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Gegevens worden uitgevoerd voor tabel `itemswebshop`
--

INSERT INTO `itemswebshop` (`id`, `naam`, `waarde`, `plaatje`, `menuitem`) VALUES
(2, 'fgh', 145654, 'images/webshop/epicadmins.png', 'taarten'),
(4, 'testtoevoegen', 1234, 'images/webshop/firstpenta.png', 'taarten'),
(6, 'sdfhs', 1324, 'images/webshop/epicadmins.png', 'cake');

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
