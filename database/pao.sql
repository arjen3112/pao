-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 20 dec 2013 om 08:28
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Gegevens worden uitgevoerd voor tabel `accounts`
--

INSERT INTO `accounts` (`id`, `account`, `password`, `email`, `profiel`, `adres`, `huisnummer`, `postcode`, `telefoon`) VALUES
(1, 'Administrator', 'admin', 'admin1@admin.com', 1, 'Localhost', '2', '1234 AB', '0123-123456'),
(2, 'arjen1killer', 'lol1', 'lol@lol.nl', 2, 'Lollol', '12', '1234 AB', '1234-123435'),
(3, 'soep', 'Soep1', 'wiiiiiiieep@mitchellton.com', 2, 'Yolowoop', '34', '9384 AB', '0321-859865'),
(4, 'Jaap', 'Iets5', 'jaap@jaapie.com', 2, 'Jaapstraat', '19', '8912 BC', '4567-789123'),
(5, 'Henk', 'Geen4', 'henk@henkie.com', 2, 'Henkstraat', '21', '7891 KS', '4567-658313'),
(6, 'Jan', 'Jan1', 'jan@jan.com', 2, 'janstraat', '12', '7634 KG', '7831-465314'),
(7, 'Klaas', 'Klaas1', 'Klaas@klaas.com', 2, 'Klaasstraat', '5', '5644 KB', '7653-456123'),
(8, 'Piet', 'Piet1', 'piet@piet.com', 2, 'pietstraat', '57', '7464 JD', '1234-765434'),
(9, 'Julie', 'Julie1', 'julie@julie', 2, 'juliestraat', '8', '3456 OA', '6432-145323');

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
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eget ligula turpis. Donec eget mauris quis leo feugiat elementum. Donec commodo pulvinar euismod. Aliquam erat volutpat. Mauris ullamcorper augue eros, at luctus est mattis a. Cras et sodales nulla. Praesent tempor sem eget nisi laoreet congue. Nunc massa leo, consequat et facilisis et, ullamcorper et lacus. Nulla ut dolor id sapien elementum iaculis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\r\n\r\nSed in interdum urna, sit amet iaculis tellus. Praesent quis nulla ut mi vestibulum interdum. Aliquam ultricies eros nulla, ac tristique arcu interdum ac. Pellentesque sed libero eu orci scelerisque consequat. Integer ac ipsum urna. Suspendisse gravida risus sit amet dolor rutrum, sit amet sagittis nisl dictum. Vivamus a lacus blandit, gravida diam sed, condimentum tortor. Nulla neque mauris, tempor nec metus in, sodales lobortis justo. Donec ut risus sit amet sapien iaculis ultricies. Duis vehicula, lorem at molestie dapibus, risus dui rutrum ipsum, quis commodo leo nibh non lorem.', 'homepage', 'text'),
(2, 'images/homepage/afbeelding1/taart.jpg', 'homepage', 'image'),
(3, 'images/homepage/afbeelding2/hja.JPG', 'homepage', 'image'),
(4, 'Nunc rhoncus, justo ut suscipit placerat,\r\nsem purus interdum ligula, in consec', 'informatie', 'text'),
(5, 'images/informatie/info.jpg', 'informatie', 'image'),
(6, 'Nunc rhoncus, justo ut suscipit placerat, sem purus interdum ligula, in consectetur tortor erat at nulla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam porta lacus a volutpat hendrerit. Ut sed blandit felis. Fusce eget consequat enim. Nunc lacinia tristique mauris id cursus. Nunc sed pretium justo. Nullam lacinia mattis porttitor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras adipiscing massa vitae eros adipiscing, vitae volutpat leo mattis.\r\n\r\nNam id risus eu nulla mattis pulvinar vitae non velit. Vivamus nec imperdiet eros, ac consectetur tortor. Morbi scelerisque mollis augue quis elementum. Pellentesque eu ullamcorper odio, nec ornare leo. Donec semper eros ut metus elementum, sit amet pretium purus malesuada. Phasellus lobortis ligula at blandit tempus. Pellentesque a lacinia ligula, eu placerat lectus. Nullam fermentum non lorem nec blandit. Suspendisse tortor odio, vestibulum vel sapien sit amet, tincidunt egestas nulla. In vel condimentum ipsum. Nulla facilisi. Cras tincidunt venenatis ipsum, sed molestie felis aliquam id. Praesent tempus eu turpis a ornare. Nullam sagittis porttitor ornare. Morbi sed dui commodo, porta lacus at, euismod lectus.', 'informatie', 'text');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Gegevens worden uitgevoerd voor tabel `itemswebshop`
--

INSERT INTO `itemswebshop` (`id`, `naam`, `waarde`, `plaatje`, `menuitem`) VALUES
(2, 'Bananentaart', 16, 'images/webshop/ban.jpg', 'taarten'),
(4, 'Appeltaart', 12, 'images/webshop/app.jpg', 'taarten'),
(6, 'Rainbow cake', 19, 'images/webshop/aa.jpg', 'cake'),
(7, 'Choco koekje', 5, 'images/webshop/salted-chocolate-pb-cookies-1-525.jpg', 'koekjes'),
(8, 'Slagroomtaart', 15, 'images/webshop/a.jpg', 'taarten'),
(9, 'Chocoladetaart', 21, 'images/webshop/a.jpg', 'taarten'),
(10, 'Aardbeientaart', 14, 'images/webshop/b.jpg', 'taarten'),
(11, 'Kwarktaart', 17, 'images/webshop/c.jpg', 'taarten'),
(12, 'Vanille vlaai', 23, 'images/webshop/d.png', 'taarten'),
(13, 'Choco cake', 14, 'images/webshop/ab.jpg', 'cake'),
(14, 'fruit cake', 21, 'images/webshop/ac.jpg', 'cake'),
(15, 'Cupcakes', 3, 'images/webshop/ad.jpg', 'cake'),
(16, 'Mokka cake', 16, 'images/webshop/ae.jpg', 'cake'),
(17, 'Pinda koek', 7, 'images/webshop/das.jpg', 'koekjes'),
(18, 'Stroopwafel', 2, 'images/webshop/db.jpg', 'koekjes'),
(19, 'Roze koek', 4, 'images/webshop/da.jpg', 'koekjes'),
(20, 'Gevulde koek', 3, 'images/webshop/ge.jpg', 'koekjes'),
(21, 'Kano''s', 6, 'images/webshop/kano.jpg', 'koekjes'),
(22, 'Kersenbonbon', 1, 'images/webshop/kers.jpg', 'bonbons'),
(23, 'Caramelbonbon', 2, 'images/webshop/car.jpg', 'bonbons'),
(24, 'Choco bonbon', 1, 'images/webshop/cho.jpg', 'bonbons'),
(25, 'Aardbeien', 1, 'images/webshop/aard.jpg', 'bonbons'),
(26, 'Chocomouse', 2, 'images/webshop/choc.jpg', 'bonbons'),
(27, 'Volkoren', 4, 'images/webshop/fvol.jpg', 'brood'),
(28, 'Fijn volkoren', 6, 'images/webshop/volk4.jpg', 'brood'),
(29, 'Wit brood', 5, 'images/webshop/wit.jpg', 'brood'),
(30, 'Sesam brood', 4, 'images/webshop/ses.jpg', 'brood'),
(31, 'Mais brood', 6, 'images/webshop/mais.jpg', 'brood'),
(32, 'Naanbrood', 5, 'images/webshop/Naan.jpg', 'brood');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menuitemswebshop`
--

CREATE TABLE IF NOT EXISTS `menuitemswebshop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` text NOT NULL,
  `href` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Gegevens worden uitgevoerd voor tabel `menuitemswebshop`
--

INSERT INTO `menuitemswebshop` (`id`, `item`, `href`) VALUES
(1, 'Taarten', '?menuoptie=webshop&webshop=taarten'),
(2, 'Cake', '?menuoptie=webshop&webshop=cake'),
(3, 'Koekjes', '?menuoptie=webshop&webshop=koekjes'),
(4, 'Bonbons', '?menuoptie=webshop&webshop=bonbons'),
(5, 'Brood', '?menuoptie=webshop&webshop=brood');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
