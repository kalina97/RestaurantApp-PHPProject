-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2019 at 12:51 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoransajt`
--

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

CREATE TABLE `anketa` (
  `id` int(11) NOT NULL,
  `pitanje` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`id`, `pitanje`) VALUES
(1, 'Rate our site'),
(4, 'Favourite part of our menu');

-- --------------------------------------------------------

--
-- Table structure for table `anketa_korisnik`
--

CREATE TABLE `anketa_korisnik` (
  `idAnKo` int(11) NOT NULL,
  `idKorisnik` int(11) NOT NULL,
  `idOdgovor` int(11) NOT NULL,
  `odgovoreno` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `anketa_korisnik`
--

INSERT INTO `anketa_korisnik` (`idAnKo`, `idKorisnik`, `idOdgovor`, `odgovoreno`) VALUES
(24, 1275, 1, 1),
(25, 1275, 6, 1),
(47, 1507, 2, 1),
(48, 1507, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cena_deserta`
--

CREATE TABLE `cena_deserta` (
  `idCenaDes` int(11) NOT NULL,
  `vrednost` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cena_deserta`
--

INSERT INTO `cena_deserta` (`idCenaDes`, `vrednost`) VALUES
(1, 5),
(2, 6),
(3, 8),
(4, 3),
(5, 9),
(6, 10),
(7, 4),
(8, 15),
(9, 12),
(10, 7);

-- --------------------------------------------------------

--
-- Table structure for table `cena_jela`
--

CREATE TABLE `cena_jela` (
  `idCenaJela` int(11) NOT NULL,
  `vrednost` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cena_jela`
--

INSERT INTO `cena_jela` (`idCenaJela`, `vrednost`) VALUES
(1, 29),
(2, 30),
(3, 24),
(4, 19),
(5, 32),
(6, 21),
(7, 12),
(8, 16),
(9, 18),
(10, 24);

-- --------------------------------------------------------

--
-- Table structure for table `cena_pica`
--

CREATE TABLE `cena_pica` (
  `idCenaPica` int(11) NOT NULL,
  `vrednost` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cena_pica`
--

INSERT INTO `cena_pica` (`idCenaPica`, `vrednost`) VALUES
(1, 5),
(2, 10),
(3, 15),
(4, 20),
(5, 25),
(6, 30),
(7, 35),
(8, 13),
(9, 16),
(10, 24),
(12, 15);

-- --------------------------------------------------------

--
-- Table structure for table `desert`
--

CREATE TABLE `desert` (
  `idDesert` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idObrok` int(11) NOT NULL,
  `idCenaDes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `desert`
--

INSERT INTO `desert` (`idDesert`, `naziv`, `slika`, `idObrok`, `idCenaDes`) VALUES
(1, 'Fruit Cake', 'images/dessert-1.jpg', 2, 3),
(2, 'Strawberry Pancakes', 'images/dessert-2.jpg', 2, 2),
(3, 'Raspberry Cake', 'images/dessert-3.jpg', 2, 1),
(4, 'Cherry Cake', 'images/dessert-5.jpg', 2, 5),
(5, 'Banana Split', 'images/dessert-6.jpg', 2, 4),
(6, 'Cream Puffs', 'images/dessert-8.jpg', 2, 8),
(7, 'Choco Cake', 'images/dessert-9.jpg', 2, 7),
(8, 'Fruit Cake 2', 'images/dessert-10.jpg', 2, 6),
(9, 'Cream Cake', 'images/dessert-7.jpg', 2, 9),
(10, 'Fruit Mix', 'images/dessert-4.jpg', 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `desert_sastojci`
--

CREATE TABLE `desert_sastojci` (
  `idDesSas` int(11) NOT NULL,
  `idDesert` int(11) NOT NULL,
  `IdSasDe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `desert_sastojci`
--

INSERT INTO `desert_sastojci` (`idDesSas`, `idDesert`, `IdSasDe`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 7),
(8, 8, 8),
(9, 9, 9),
(10, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `drzava`
--

CREATE TABLE `drzava` (
  `idDrzava` int(11) NOT NULL,
  `imeDrzave` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `drzava`
--

INSERT INTO `drzava` (`idDrzava`, `imeDrzave`) VALUES
(1, 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `gosti`
--

CREATE TABLE `gosti` (
  `idGost` int(11) NOT NULL,
  `brojGostiju` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idRestoran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gosti`
--

INSERT INTO `gosti` (`idGost`, `brojGostiju`, `idRestoran`) VALUES
(1, '1 ', 1),
(2, '2 ', 1),
(3, '3 ', 1),
(4, '4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

CREATE TABLE `grad` (
  `idGrad` int(11) NOT NULL,
  `imeGrada` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idDrzava` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grad`
--

INSERT INTO `grad` (`idGrad`, `imeGrada`, `idDrzava`) VALUES
(1, 'New York', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jelo`
--

CREATE TABLE `jelo` (
  `idJelo` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idObrok` int(11) NOT NULL,
  `idCenaJela` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jelo`
--

INSERT INTO `jelo` (`idJelo`, `naziv`, `slika`, `idObrok`, `idCenaJela`) VALUES
(1, 'Grilled Beef With Potatoes', 'images/image_7.jpg', 1, 2),
(2, 'Savory Watercress Chinese Pancakes', 'images/img1.jpg', 1, 3),
(3, 'Beef Ribs Steak', 'images/dish-4.jpg', 1, 5),
(4, 'Soup With Vegetables', 'images/dish-12.jpg', 1, 4),
(5, 'Asian Hoisin Pork', 'images/img2.jpg', 1, 1),
(6, 'Udon Noodles With Vegetables', 'images/img3.jpeg', 1, 7),
(7, 'Spicy Fried Rice And Bacon', 'images/img4.jpg', 1, 6),
(8, 'Baked Lobster With Garnish', 'images/img5.jpg', 1, 9),
(9, 'Roast Chicken', 'images/dish-7.jpg', 1, 8),
(10, 'Octopus With Vegetables', 'images/img6.jpg', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `jelo_sastojci`
--

CREATE TABLE `jelo_sastojci` (
  `idJeSa` int(11) NOT NULL,
  `idJelo` int(11) NOT NULL,
  `idSastojak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jelo_sastojci`
--

INSERT INTO `jelo_sastojci` (`idJeSa`, `idJelo`, `idSastojak`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 7),
(8, 8, 8),
(9, 9, 9),
(10, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE `komentari` (
  `idKomentar` int(11) NOT NULL,
  `imeKorisnika` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `komentar` text COLLATE utf8_unicode_ci NOT NULL,
  `datumKom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idVest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`idKomentar`, `imeKorisnika`, `komentar`, `datumKom`, `idVest`) VALUES
(175, 'Nevena', 'Dobar kuvar...', '2019-02-20', 1),
(176, 'Nevena', 'Bas lepo...', '2019-02-25', 3),
(178, 'Nikola', 'Veoma lepo...', '2019-02-07', 1),
(179, 'Nikola', 'Novi dodat komentar...', '2019-02-08', 3),
(255, 'Nikola', 'Novost', '2019-02-17', 3),
(271, 'Nikola', 'Koktel', '2019-02-15', 10),
(274, 'Nikola', 'Sefe', '2019-02-24', 1),
(275, 'Nikola', 'Rostilj mmm...', '2019-02-14', 2),
(276, 'Kalina', 'Specijalitet', '2019-03-03', 3),
(278, 'Kalina', 'Konobar', '2019-03-02', 6),
(309, 'Kalina', 'Bice super...', '2019-02-24', 1),
(310, 'Nikola', 'Sjajan covek', '2019-03-13', 1),
(311, 'Nevena', 'Bas osvezavajuce...', '2019-02-14', 10),
(312, 'Nikola', 'Sretenje', '2019-02-15', 3),
(313, 'Nikola', 'Dan Drzavnosti', '2019-02-15', 1),
(314, 'Nikola', 'Veoma ukusno', '2019-02-15', 2),
(315, 'Nikola', 'Izvrsna aroma', '2019-02-15', 2),
(316, 'Nikola', 'Sretenje', '2019-02-15', 5);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `aktivan` bit(1) NOT NULL,
  `datum_registracije` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uloga_id` int(3) UNSIGNED NOT NULL,
  `korisnicko_ime` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `email`, `lozinka`, `aktivan`, `datum_registracije`, `uloga_id`, `korisnicko_ime`, `token`) VALUES
(1275, 'Nikola', 'Kalincevic', 'kalincevicnikola8@gmail.com', '79d4b4306b05ae785e12817466ef806a', b'1', '2018-06-10 20:53:06', 1, 'kalina', '2e24b3fcbdb4e92d6ee93a3bfb4ec5b5eca0dce9'),
(1507, 'Nevena', 'Kalincevic', 'nevenakalincevic999@gmail.com', '123c7e4c29168e506375555b6de8ca8d', b'1', '2019-02-06 18:46:01', 2, 'nevena', 'ad5edc1fb3029ae0f28f529459f74a46bee1dc27'),
(1508, 'Kalina', 'Kalinic', 'nikola.kalincevic.40.16@ict.edu.rs', '9a923c29046531b1fb11c2db98662c97', b'1', '2019-02-14 23:17:50', 2, 'kalinari', '80349438956f00ba4d5f2ae7fdafdda93d17367d');

-- --------------------------------------------------------

--
-- Table structure for table `linkovi`
--

CREATE TABLE `linkovi` (
  `idLink` int(10) NOT NULL,
  `imeLinka` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `putanja` text COLLATE utf8_unicode_ci NOT NULL,
  `roditelj` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `linkovi`
--

INSERT INTO `linkovi` (`idLink`, `imeLinka`, `putanja`, `roditelj`) VALUES
(1, 'Home', 'index.php?page=home', 0),
(2, 'Menu', 'index.php?page=menu', 0),
(3, 'Specialities', 'index.php?page=specialities', 0),
(4, 'Reservations', 'index.php?page=reservations', 0),
(5, 'Blog', 'index.php?page=blog', 0),
(6, 'About', 'index.php?page=about', 0),
(7, 'Register', 'index.php?page=register', 0),
(8, 'Contact', 'index.php?page=contact', 0),
(10, 'Dodatlink', 'index.php', 0);

-- --------------------------------------------------------

--
-- Table structure for table `obrok`
--

CREATE TABLE `obrok` (
  `idObrok` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `obrok`
--

INSERT INTO `obrok` (`idObrok`, `naziv`) VALUES
(1, 'Breakfast'),
(2, 'Dessert'),
(3, 'Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `odgovor`
--

CREATE TABLE `odgovor` (
  `id` int(11) NOT NULL,
  `odgovor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idAnkete` int(11) NOT NULL,
  `brGlasova` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `odgovor`
--

INSERT INTO `odgovor` (`id`, `odgovor`, `idAnkete`, `brGlasova`) VALUES
(1, 'Awesome', 1, 1),
(2, 'Good', 1, 1),
(3, 'Not bad', 1, 0),
(4, 'Horrifying', 1, 0),
(5, 'Breakfast', 4, 1),
(6, 'Dessert', 4, 1),
(7, 'Drinks', 4, 0),
(8, 'None of the above', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `osoblje`
--

CREATE TABLE `osoblje` (
  `idOsoblje` int(11) NOT NULL,
  `slika` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tekst` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `naslov` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idRestoran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `osoblje`
--

INSERT INTO `osoblje` (`idOsoblje`, `slika`, `tekst`, `naslov`, `idRestoran`) VALUES
(1, 'images/chef-1.jpg', 'Head Chef', 'Thomas Smith', 1),
(2, 'images/chef-2.jpg', 'Assistant Chef', 'Francis Gibson', 1),
(3, 'images/chef-3.jpg', 'Assistant Chef', 'Angelo Maestro', 1),
(4, 'images/person_3.jpg', 'Director of the Tasty Restaurant', 'Mark Thompson', 1),
(5, 'images/person_2.jpg', 'Restaurant Manager', 'Johnny Williams', 1),
(6, 'images/per.jpg', 'Waiter', 'Jason Cole', 1),
(14, 'images/1549384281image_1.jpg', 'Chef', 'Bill McCartney', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pice`
--

CREATE TABLE `pice` (
  `idPice` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idCenaPica` int(11) NOT NULL,
  `idObrok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pice`
--

INSERT INTO `pice` (`idPice`, `naziv`, `slika`, `idCenaPica`, `idObrok`) VALUES
(1, 'Lemon Juice', 'images/drink-5.jpg', 4, 3),
(2, 'Beer', 'images/drink-4.jpg', 5, 3),
(3, 'Guava Juice', 'images/drink-8.jpg', 3, 3),
(4, 'Mango Juice', 'images/drink-7.jpg', 2, 3),
(5, 'Cocktail', 'images/drink-3.jpg', 1, 3),
(6, 'Apple Juice', 'images/drink-55.jpg', 7, 3),
(7, 'Coca Cola', 'images/drink-44.jpg', 6, 3),
(8, 'Orange Juice', 'images/drink-1.jpg', 10, 3),
(9, 'Wine', 'images/drink-2.jpg', 9, 3),
(10, 'Strawberry Juice', 'images/drink-6.jpg', 8, 3),
(12, 'Novo pice', 'images/1550227012Tulips.jpg', 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pice_sastojci`
--

CREATE TABLE `pice_sastojci` (
  `idPiSa` int(11) NOT NULL,
  `idPice` int(11) NOT NULL,
  `idSasPice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pice_sastojci`
--

INSERT INTO `pice_sastojci` (`idPiSa`, `idPice`, `idSasPice`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 7),
(8, 8, 8),
(9, 9, 9),
(10, 10, 10),
(12, 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `restoran`
--

CREATE TABLE `restoran` (
  `idRestoran` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idGrad` int(11) NOT NULL,
  `radnoVreme` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `restoran`
--

INSERT INTO `restoran` (`idRestoran`, `naziv`, `adresa`, `idGrad`, `radnoVreme`) VALUES
(1, 'Tasty Restaurant', '198 West 21th Street, Suite 721 ', 1, '12:00 AM - 11:30 PM');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija_stola`
--

CREATE TABLE `rezervacija_stola` (
  `idRez` int(11) NOT NULL,
  `ime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datum` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vreme` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brGostiju` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rezervacija_stola`
--

INSERT INTO `rezervacija_stola` (`idRez`, `ime`, `email`, `datum`, `vreme`, `brGostiju`) VALUES
(244, 'Nikola', 'kalincevicnikola8@gmail.com', '2/13/2019', '1:00am', '2'),
(245, 'Nevena', 'nevenakalincevic999@gmail.com', '2/22/2019', '12:30am', '4'),
(246, 'Nikola', 'kalincevicnikola8@gmail.com', '2/20/2019', '1:00am', '4');

-- --------------------------------------------------------

--
-- Table structure for table `sastojci_za_desert`
--

CREATE TABLE `sastojci_za_desert` (
  `idSasDe` int(11) NOT NULL,
  `nazivSD` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sastojci_za_desert`
--

INSERT INTO `sastojci_za_desert` (`idSasDe`, `nazivSD`) VALUES
(1, 'Fruit,Milk,Sugar'),
(2, 'Flour,Milk,Strawberries'),
(3, 'Milk,Sugar,Raspberries'),
(4, 'Cherries,Sugar,Milk'),
(5, 'Bananas,Cream,Sugar'),
(6, 'Cream,Milk,Flour,Sugar'),
(7, 'Chocolate,Sugar,Milk'),
(8, 'Fruit,Sugar,Milk,Cream'),
(9, 'Cream,Milk,Sugar'),
(10, 'Fruit,Sugar,Cream');

-- --------------------------------------------------------

--
-- Table structure for table `sastojci_za_jelo`
--

CREATE TABLE `sastojci_za_jelo` (
  `idSastojak` int(11) NOT NULL,
  `nazivSa` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sastojci_za_jelo`
--

INSERT INTO `sastojci_za_jelo` (`idSastojak`, `nazivSa`) VALUES
(1, 'Steak,Oil,Potatoes,Salt,Pepper'),
(2, 'Oil,Watercress,Shallot,Salt'),
(3, 'Steak,Oil,Salt'),
(4, 'Vegetables,Meat,Water,Salt'),
(5, 'Pork,Water,Salt,Pepper'),
(6, 'Oil,Water,Salt,Noodles'),
(7, 'Oil,Rice,Bacon,Salt'),
(8, 'Lobster,Salt,Pepper,Oil'),
(9, 'Salt,Chicken,Oil,Pepper'),
(10, 'Octopus,Vegetables,Water,Salt');

-- --------------------------------------------------------

--
-- Table structure for table `sastojci_za_pice`
--

CREATE TABLE `sastojci_za_pice` (
  `idSasPice` int(11) NOT NULL,
  `nazivS` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sastojci_za_pice`
--

INSERT INTO `sastojci_za_pice` (`idSasPice`, `nazivS`) VALUES
(1, 'Lemon,Sugar,Water'),
(2, 'Hops,Water'),
(3, 'Guavas,Water,Sugar'),
(4, 'Mango,Sugar,Water'),
(5, 'Fruits,Sugar,Water'),
(6, 'Apples,Sugar,Water'),
(7, 'Water,Sugar,Caramel'),
(8, 'Orange,Sugar,Water'),
(9, 'Grapes,Sugar,Water'),
(10, 'Strawberries,Sugar'),
(12, 'Sok');

-- --------------------------------------------------------

--
-- Table structure for table `specijaliteti`
--

CREATE TABLE `specijaliteti` (
  `idSpec` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cena` int(255) NOT NULL,
  `idRestoran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `specijaliteti`
--

INSERT INTO `specijaliteti` (`idSpec`, `naziv`, `opis`, `slika`, `cena`, `idRestoran`) VALUES
(1, 'Beef Steak', 'A beef steak is a flat cut of beef, with parallel faces spaced to a thickness of 1 to 5 cm, with a raw mass in common restaurant service ranging from 4 to 20 ounces. Beef steaks are usually grilled, pan-fried, or broiled. ', 'images/image_7.jpg', 12, 1),
(2, 'Chop suey', 'Chop suey is a dish in American Chinese cuisine and other forms of overseas Chinese cuisine, consisting of meat and eggs, cooked quickly with vegetables such as bean sprouts, cabbage, and celery and bound in a starch-thickened sauce. It is typically serves with rice.', 'images/dish-5.jpg', 7, 1),
(3, 'Beef Ribs Steak', 'A rib steak is a beef steak sliced from the rib primal of a beef animal, with rib bone attached.The rib eye or \"ribeye\" was originally, as the name implies, the center portion of the rib steak, without the bone.', 'images/dish-4.jpg', 8, 1),
(4, 'Roast Chicken', 'Roast chicken is chicken prepared as food by roasting whether in a home kitchen, over a fire, or with a professional rotisserie (rotary spit). Generally, the chicken is roasted with its own fat and juices by circulating the meat during roasting.Roast chicken is a dish that appears in a wide variety of cuisines worldwide.', 'images/dish-6.jpg', 6, 1),
(5, 'Whole roasted chicken', 'This is a whole roasted chicken. It is prone to strong fire. This chicken is very\r\ndelicious an crispy.This meal is being prepared all over the world.', 'images/dish-7.jpg', 9, 1),
(6, 'Vegetable Salad', 'This is a salad of vegetables. A salad is a dish consisting of a mixture of small pieces of food, usually vegetables. However, different varieties of salad may contain virtually any type of ready-to-eat food. Salads are typically served at room temperature or chilled.', 'images/dish-9.jpg', 14, 1),
(7, 'Lobster meat', 'Lobsters comprise a family of large marine crustaceans. Lobsters have long bodies with muscular tails, and live in crevices or burrows on the sea floor. This dish is very useful for people who want to live healthy life.', 'images/dish-8.jpg', 16, 1),
(8, 'Roast Fish', 'Fish has been an important source of protein and other nutrients for humans from time immemorial.In culinary and fishery contexts, fish may include shellfish, such as molluscs, crustaceans and echinoderms. English does not distinguish between fish as an animal and the food prepared from it, as it does with pig vs. pork or cow vs. beef.', 'images/dish-10.jpg', 22, 1),
(9, 'Pasta', 'Pasta is a staple food of traditional Italian cuisine, with the first reference dating to 1154 in Sicily.Also commonly used to refer to the variety of dishes made with it, pasta is typically made from an unleavened dough of a durum wheat flour mixed with water or eggs, and formed into sheets or various shapes, then cooked by boiling or baking. Some pastas can be made using rice flour in place of wheat flour to yield a different taste.', 'images/dish-11.jpg', 11, 1),
(10, 'Soup', 'Soup is a primarily liquid food, generally served warm or hot (but may be cool or cold), that is made by combining ingredients of meat or vegetables with stock, juice, water, or another liquid. Hot soups are additionally characterized by boiling solid ingredients in liquids in a pot until the flavors are extracted, forming a broth. In traditional French cuisine, soups are classified into two main groups: clear soups and thick soups. ', 'images/dish-12.jpg', 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `id` int(2) UNSIGNED NOT NULL,
  `naziv` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`id`, `naziv`) VALUES
(1, 'admin'),
(2, 'korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `vesti`
--

CREATE TABLE `vesti` (
  `idVest` int(11) NOT NULL,
  `slikaVest` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datum` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `naslovVest` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tekst` text COLLATE utf8_unicode_ci NOT NULL,
  `idRestoran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vesti`
--

INSERT INTO `vesti` (`idVest`, `slikaVest`, `datum`, `naslovVest`, `tekst`, `idRestoran`) VALUES
(1, 'images/image_1.jpg', '2019-01-28', 'New Assistant Chef ', 'He is Bill McCartney and he wil become our new assistant chef for a few days... ', 1),
(2, 'images/image_4.jpg', '2019-01-31', 'New dish soon', 'This is a delicious grill and our new dish soon. Big surprise for all our customers.', 1),
(3, 'images/image_6.jpg', '2019-02-05', 'New Specialty', 'On our Exclusive menu will be able this tasty dish soon. You surely will enjoy! ', 1),
(5, 'images/image_13.jpg', '2019-02-08', 'New Cocktail Man', 'We were looking for cocktail man for a long time. We finally found him. \r\nWe hope that he will justify the expectations.', 1),
(6, 'images/res.jpg', '2019-02-06', 'We need a waiter', 'Due to the development of the restaurant, we need a new experienced waiter. \r\nGet interested in the ad!', 1),
(10, 'images/image_22.jpg', '2019-02-11', 'New Cocktail ', 'Another great drink on out menu. Order this cocktail and enjoy it.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketa`
--
ALTER TABLE `anketa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anketa_korisnik`
--
ALTER TABLE `anketa_korisnik`
  ADD PRIMARY KEY (`idAnKo`),
  ADD KEY `idKorisnik` (`idKorisnik`),
  ADD KEY `idOdgovor` (`idOdgovor`);

--
-- Indexes for table `cena_deserta`
--
ALTER TABLE `cena_deserta`
  ADD PRIMARY KEY (`idCenaDes`);

--
-- Indexes for table `cena_jela`
--
ALTER TABLE `cena_jela`
  ADD PRIMARY KEY (`idCenaJela`);

--
-- Indexes for table `cena_pica`
--
ALTER TABLE `cena_pica`
  ADD PRIMARY KEY (`idCenaPica`);

--
-- Indexes for table `desert`
--
ALTER TABLE `desert`
  ADD PRIMARY KEY (`idDesert`),
  ADD KEY `idObrok` (`idObrok`),
  ADD KEY `idCenaDeserta` (`idCenaDes`);

--
-- Indexes for table `desert_sastojci`
--
ALTER TABLE `desert_sastojci`
  ADD PRIMARY KEY (`idDesSas`),
  ADD KEY `idDesert` (`idDesert`),
  ADD KEY `IdSasDe` (`IdSasDe`);

--
-- Indexes for table `drzava`
--
ALTER TABLE `drzava`
  ADD PRIMARY KEY (`idDrzava`);

--
-- Indexes for table `gosti`
--
ALTER TABLE `gosti`
  ADD PRIMARY KEY (`idGost`),
  ADD KEY `idRestoran` (`idRestoran`);

--
-- Indexes for table `grad`
--
ALTER TABLE `grad`
  ADD PRIMARY KEY (`idGrad`),
  ADD KEY `idDrzava` (`idDrzava`);

--
-- Indexes for table `jelo`
--
ALTER TABLE `jelo`
  ADD PRIMARY KEY (`idJelo`),
  ADD KEY `idObrok` (`idObrok`),
  ADD KEY `idCenaJela` (`idCenaJela`),
  ADD KEY `idCenaJela_2` (`idCenaJela`);

--
-- Indexes for table `jelo_sastojci`
--
ALTER TABLE `jelo_sastojci`
  ADD PRIMARY KEY (`idJeSa`),
  ADD KEY `idJelo` (`idJelo`),
  ADD KEY `idSastojak` (`idSastojak`);

--
-- Indexes for table `komentari`
--
ALTER TABLE `komentari`
  ADD PRIMARY KEY (`idKomentar`),
  ADD KEY `idVest` (`idVest`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`),
  ADD KEY `uloga_id` (`uloga_id`);

--
-- Indexes for table `linkovi`
--
ALTER TABLE `linkovi`
  ADD PRIMARY KEY (`idLink`);

--
-- Indexes for table `obrok`
--
ALTER TABLE `obrok`
  ADD PRIMARY KEY (`idObrok`);

--
-- Indexes for table `odgovor`
--
ALTER TABLE `odgovor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAnkete` (`idAnkete`);

--
-- Indexes for table `osoblje`
--
ALTER TABLE `osoblje`
  ADD PRIMARY KEY (`idOsoblje`),
  ADD KEY `idHotel` (`idRestoran`);

--
-- Indexes for table `pice`
--
ALTER TABLE `pice`
  ADD PRIMARY KEY (`idPice`),
  ADD KEY `idCenaPice` (`idCenaPica`),
  ADD KEY `idObrok` (`idObrok`);

--
-- Indexes for table `pice_sastojci`
--
ALTER TABLE `pice_sastojci`
  ADD PRIMARY KEY (`idPiSa`),
  ADD KEY `idPice` (`idPice`),
  ADD KEY `idSasPice` (`idSasPice`),
  ADD KEY `idPice_2` (`idPice`),
  ADD KEY `idSasPice_2` (`idSasPice`),
  ADD KEY `idPice_3` (`idPice`),
  ADD KEY `idSasPice_3` (`idSasPice`);

--
-- Indexes for table `restoran`
--
ALTER TABLE `restoran`
  ADD PRIMARY KEY (`idRestoran`),
  ADD KEY `idGrad` (`idGrad`);

--
-- Indexes for table `rezervacija_stola`
--
ALTER TABLE `rezervacija_stola`
  ADD PRIMARY KEY (`idRez`);

--
-- Indexes for table `sastojci_za_desert`
--
ALTER TABLE `sastojci_za_desert`
  ADD PRIMARY KEY (`idSasDe`);

--
-- Indexes for table `sastojci_za_jelo`
--
ALTER TABLE `sastojci_za_jelo`
  ADD PRIMARY KEY (`idSastojak`);

--
-- Indexes for table `sastojci_za_pice`
--
ALTER TABLE `sastojci_za_pice`
  ADD PRIMARY KEY (`idSasPice`);

--
-- Indexes for table `specijaliteti`
--
ALTER TABLE `specijaliteti`
  ADD PRIMARY KEY (`idSpec`),
  ADD KEY `idRestoran` (`idRestoran`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `naziv` (`naziv`);

--
-- Indexes for table `vesti`
--
ALTER TABLE `vesti`
  ADD PRIMARY KEY (`idVest`),
  ADD KEY `idHotel` (`idRestoran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anketa`
--
ALTER TABLE `anketa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `anketa_korisnik`
--
ALTER TABLE `anketa_korisnik`
  MODIFY `idAnKo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `cena_deserta`
--
ALTER TABLE `cena_deserta`
  MODIFY `idCenaDes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cena_jela`
--
ALTER TABLE `cena_jela`
  MODIFY `idCenaJela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cena_pica`
--
ALTER TABLE `cena_pica`
  MODIFY `idCenaPica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `desert`
--
ALTER TABLE `desert`
  MODIFY `idDesert` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `desert_sastojci`
--
ALTER TABLE `desert_sastojci`
  MODIFY `idDesSas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `drzava`
--
ALTER TABLE `drzava`
  MODIFY `idDrzava` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gosti`
--
ALTER TABLE `gosti`
  MODIFY `idGost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `grad`
--
ALTER TABLE `grad`
  MODIFY `idGrad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jelo`
--
ALTER TABLE `jelo`
  MODIFY `idJelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jelo_sastojci`
--
ALTER TABLE `jelo_sastojci`
  MODIFY `idJeSa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `komentari`
--
ALTER TABLE `komentari`
  MODIFY `idKomentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1509;

--
-- AUTO_INCREMENT for table `linkovi`
--
ALTER TABLE `linkovi`
  MODIFY `idLink` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `obrok`
--
ALTER TABLE `obrok`
  MODIFY `idObrok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `odgovor`
--
ALTER TABLE `odgovor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `osoblje`
--
ALTER TABLE `osoblje`
  MODIFY `idOsoblje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pice`
--
ALTER TABLE `pice`
  MODIFY `idPice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pice_sastojci`
--
ALTER TABLE `pice_sastojci`
  MODIFY `idPiSa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `restoran`
--
ALTER TABLE `restoran`
  MODIFY `idRestoran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rezervacija_stola`
--
ALTER TABLE `rezervacija_stola`
  MODIFY `idRez` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `sastojci_za_desert`
--
ALTER TABLE `sastojci_za_desert`
  MODIFY `idSasDe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sastojci_za_jelo`
--
ALTER TABLE `sastojci_za_jelo`
  MODIFY `idSastojak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sastojci_za_pice`
--
ALTER TABLE `sastojci_za_pice`
  MODIFY `idSasPice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `specijaliteti`
--
ALTER TABLE `specijaliteti`
  MODIFY `idSpec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vesti`
--
ALTER TABLE `vesti`
  MODIFY `idVest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anketa_korisnik`
--
ALTER TABLE `anketa_korisnik`
  ADD CONSTRAINT `anketa_korisnik_ibfk_1` FOREIGN KEY (`idOdgovor`) REFERENCES `odgovor` (`id`),
  ADD CONSTRAINT `anketa_korisnik_ibfk_2` FOREIGN KEY (`idKorisnik`) REFERENCES `korisnik` (`id`);

--
-- Constraints for table `desert`
--
ALTER TABLE `desert`
  ADD CONSTRAINT `desert_ibfk_1` FOREIGN KEY (`idObrok`) REFERENCES `obrok` (`idObrok`),
  ADD CONSTRAINT `desert_ibfk_2` FOREIGN KEY (`idCenaDes`) REFERENCES `cena_deserta` (`idCenaDes`);

--
-- Constraints for table `desert_sastojci`
--
ALTER TABLE `desert_sastojci`
  ADD CONSTRAINT `desert_sastojci_ibfk_1` FOREIGN KEY (`IdSasDe`) REFERENCES `sastojci_za_desert` (`idSasDe`),
  ADD CONSTRAINT `desert_sastojci_ibfk_2` FOREIGN KEY (`idDesert`) REFERENCES `desert` (`idDesert`);

--
-- Constraints for table `gosti`
--
ALTER TABLE `gosti`
  ADD CONSTRAINT `gosti_ibfk_1` FOREIGN KEY (`idRestoran`) REFERENCES `restoran` (`idRestoran`);

--
-- Constraints for table `grad`
--
ALTER TABLE `grad`
  ADD CONSTRAINT `grad_ibfk_1` FOREIGN KEY (`idDrzava`) REFERENCES `drzava` (`idDrzava`);

--
-- Constraints for table `jelo_sastojci`
--
ALTER TABLE `jelo_sastojci`
  ADD CONSTRAINT `jelo_sastojci_ibfk_1` FOREIGN KEY (`idJelo`) REFERENCES `jelo` (`idJelo`),
  ADD CONSTRAINT `jelo_sastojci_ibfk_2` FOREIGN KEY (`idSastojak`) REFERENCES `sastojci_za_jelo` (`idSastojak`);

--
-- Constraints for table `komentari`
--
ALTER TABLE `komentari`
  ADD CONSTRAINT `komentari_ibfk_1` FOREIGN KEY (`idVest`) REFERENCES `vesti` (`idVest`);

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`uloga_id`) REFERENCES `uloga` (`id`);

--
-- Constraints for table `odgovor`
--
ALTER TABLE `odgovor`
  ADD CONSTRAINT `odgovor_ibfk_1` FOREIGN KEY (`idAnkete`) REFERENCES `anketa` (`id`);

--
-- Constraints for table `osoblje`
--
ALTER TABLE `osoblje`
  ADD CONSTRAINT `osoblje_ibfk_1` FOREIGN KEY (`idRestoran`) REFERENCES `restoran` (`idRestoran`);

--
-- Constraints for table `pice`
--
ALTER TABLE `pice`
  ADD CONSTRAINT `pice_ibfk_1` FOREIGN KEY (`idObrok`) REFERENCES `obrok` (`idObrok`),
  ADD CONSTRAINT `pice_ibfk_2` FOREIGN KEY (`idCenaPica`) REFERENCES `cena_pica` (`idCenaPica`);

--
-- Constraints for table `pice_sastojci`
--
ALTER TABLE `pice_sastojci`
  ADD CONSTRAINT `pice_sastojci_ibfk_1` FOREIGN KEY (`idSasPice`) REFERENCES `sastojci_za_pice` (`idSasPice`),
  ADD CONSTRAINT `pice_sastojci_ibfk_2` FOREIGN KEY (`idPice`) REFERENCES `pice` (`idPice`);

--
-- Constraints for table `restoran`
--
ALTER TABLE `restoran`
  ADD CONSTRAINT `restoran_ibfk_1` FOREIGN KEY (`idGrad`) REFERENCES `grad` (`idGrad`);

--
-- Constraints for table `specijaliteti`
--
ALTER TABLE `specijaliteti`
  ADD CONSTRAINT `specijaliteti_ibfk_1` FOREIGN KEY (`idRestoran`) REFERENCES `restoran` (`idRestoran`);

--
-- Constraints for table `vesti`
--
ALTER TABLE `vesti`
  ADD CONSTRAINT `vesti_ibfk_1` FOREIGN KEY (`idRestoran`) REFERENCES `restoran` (`idRestoran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
