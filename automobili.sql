-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2019 at 06:26 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `automobili`
--

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

CREATE TABLE `anketa` (
  `idAnketa` int(11) NOT NULL,
  `idMarka` int(11) NOT NULL,
  `idKorisnik` int(11) NOT NULL,
  `glasao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`idAnketa`, `idMarka`, `idKorisnik`, `glasao`) VALUES
(3, 3, 38, 1),
(8, 2, 27, 1);

-- --------------------------------------------------------

--
-- Table structure for table `auto`
--

CREATE TABLE `auto` (
  `idAuto` int(255) NOT NULL,
  `idModel` int(30) NOT NULL,
  `slika` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `datum` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Anaslov` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auto`
--

INSERT INTO `auto` (`idAuto`, `idModel`, `slika`, `opis`, `datum`, `Anaslov`) VALUES
(1, 1, 'img/audia3.jpg', 'Prvi put se pojavio 1996. godine na salonu automobila u Frankfurtu. Model A3 je označio ulazak nemačkog premijum brenda u kategoriju kompaktnih hečbek automobila.', '2019-03-04 12:58:35', 'Brz, kompaktan i inovativan.'),
(2, 3, 'img/mercedesA.jpeg', 'A-klasa je najmanji i prvi Mercedesov automobil sa prednjim pogonom. Prve dve generacije su pripadale klasi malih automobila, međutim, s obzirom da su bili nešto viši u odnosu na male automobile, mogli su pripadati i kategoriji minivenova.', '2019-03-04 13:01:52', 'Za prave ljubitelje automobila.'),
(3, 2, 'img/bmw1.jpg', 'BMW serije 1 je automobil kompaktne klase. On je najmanji i najjeftiniji BMW. Jedini je automobil u svojoj klasi sa zadnjim pogonom i uzdužno smeštenim motorom. Zamena je za Compact model serije 3 tipa E43, ukinut početkom 2004.', '2019-03-04 13:06:38', 'Novi bmw 1'),
(5, 5, 'img/1552823069bmw3.jpg', 'BMW serije 3 je automobil iz srednje klase nemačke marke BMW i proizvodi se od 1975. godine. Trenutno je u proizvodnji peta generacija. Trojka je najprodavaniji BMW-ov model te nosi oko 40% ukupne BMW-ove proizvodnje te ujedno jedan od najpopularnijh automobila u svetu.Prva generacija, model E21, se proizvodio od 1975. - 1983. godine. Proizvodio se u samo dve karoserijske grupe - kao coupe i cabrio. Isprva je zamena za model 2002.', '0000-00-00 00:00:00', 'Optimalni sedan bmw-a.'),
(6, 7, 'img/1552833518bmwi8.jpg', 'Budućnost poprima oblik – u formi novog modela BMW i8 Coupé. Pun elana, fascinantan i spreman da iznova definiše mobilnost. Za bezuslovno zadovoljstvo u vožnji, dokle god se put prostire. Puki pogled na ovaj prepoznatljiv dizajn podiže nivoe adrenalina. Brzinomer jednako brzo stremi uvis: inovativni plug-in hibridni motor generiše 374 ks i 570 Nm. Osim toga, ubrzava novi BMW i8 Coupé od 0 do 100 km za samo 4,4 sekunde. Najbrži put do novog doba.\r\n', '2019-03-17 15:38:39', 'Pravi sporstski auto.'),
(7, 6, 'img/1552833709bmw7.jpg', 'Ovladajte svakom performansom, uživajte u svakom trenutku. BMW Serije 7 Sedan donosi samopouzdanu pojavu, izuzetne performanse i maksimalni komfor. Kao BMW 750Li koji pokreće najnoviji BMW TwinPower Turbo 8-cilindarski benzinski motor i ima xDrive kao standardnu opremu, on je sasvim jednostavno stvoren za zauzimanje vodeće pozicije. Emotivni jezik elegantnog dizajna zajedno sa specijalnom atmosferom prijatnosti u enterijeru ', '2019-03-17 15:41:49', 'Biznis vozilo.'),
(8, 8, 'img/1552833978cKlasa.jpg', 'Bez obzira da li se nalazite u saobraćajnoj gužvi, na dugoj noćnoj vožnji ili na nepoznatom putu, Vaša Vas nova Mercedes-Benz C-Klasa Limuzina osetno rasterećuje upravo u stresnim situacijama. Iza toga stoji koncept koji svaku vožnju u Mercedes-Benzu čini sigurnom i jedinstvenom: Mercedes-Benz Intelligent Drive. Jer je vreme koje provodite iza upravljača Vaše vreme. Vreme za opuštanje. Vreme za punjenje baterija. Kako biste na svoje odredište stigli pre svega sigurno, ali svakako i opušteni.', '2019-03-17 15:46:18', 'Mercedesov sedan poslednje generacje.'),
(9, 9, 'img/1552834789jaguarepace.jpg', 'Sa predivno izvajanom haubom i muskularnim zadnjim delovima, E‑PACE je dinamičan, agilan sportski terenac sa linijama kupea. Za neverovatne performanse na drumu, E‑PACE koristi LED farove i potpisna LED zadnja svetla. Kako biste unapredili bezbednost, a ujedno i dodali još stila, opredelite se za Matrix LED farove sa potpisnim dnevnim svetlima i animiranim pokazivačima pravca.', '2019-03-17 15:59:49', 'Pravi SUV.'),
(11, 12, 'img/1552836429cruze.jpg', 'Chevrolet je preuzimanjem Daewooa odlučio stvoriti svoj ogranak koji će se u proizvodnji automobila odrediti na način da se poštuju želje, ukusi i potrebe evropskih i azijskih kupaca. U početku su modeli koje su naslijedili poboljšavani, dorađivani, gdje se stvarno može naći par izvrsnih primjera. No svi su željno čekali originalno razvijene modele pod patronatom novog gazde, čisto radi predviđanja pravca kojim Chevrolet želi da krene. I došli su. Jedan od takvih je i model Cruze koji smo dobili na sedmodnevni test.', '2019-03-17 16:27:09', 'Najprodavaniji chevrolet'),
(14, 11, 'img/1552836707mazda6.jpg', 'Mazda 6 je već na prvi pogled solidan porodični automobil koji ispunjava sve uslove koje treba da ima četvorotočkaš namenjen prvenstveno porodici i dužim putovanjima. Možda su starije Mazde bile dosadne i neatraktivne, ali to za ovaj model ne važi nikako.', '2019-03-17 16:31:47', 'Stabilan i pouzdan');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `idKomentar` int(11) NOT NULL,
  `tekst` text COLLATE utf8_unicode_ci NOT NULL,
  `idKorisnik` int(11) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idAuto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `idKorisnik` int(255) NOT NULL,
  `imePrezime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `idUloga` int(3) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idKorisnik`, `imePrezime`, `username`, `password`, `pol`, `idUloga`, `email`) VALUES
(27, 'Mario Blazevic', 'mario30', 'ict2017ict', 'M', 1, 'mario@gmail.com'),
(38, 'Sara Blazevicc', 'sara300', 'ict2017ict', '', 1, 'igor.blazevic64@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `marka`
--

CREATE TABLE `marka` (
  `idMarka` int(30) NOT NULL,
  `naziv` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `marka`
--

INSERT INTO `marka` (`idMarka`, `naziv`) VALUES
(1, 'Audi'),
(2, 'BMW'),
(3, 'Mercedes'),
(4, 'jaguar'),
(5, 'Mazda'),
(6, 'Chevrolet'),
(7, 'Volkswagen');

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `idMeni` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `naslov` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`idMeni`, `naziv`, `naslov`) VALUES
(1, 'home', 'Početna'),
(2, 'about', 'O autoru'),
(3, 'cars', 'Automobili'),
(4, 'contact', 'Kontakt');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `idModel` int(50) NOT NULL,
  `naziv` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `idMarka` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`idModel`, `naziv`, `idMarka`) VALUES
(1, 'A3', 1),
(2, 'Serija 1', 2),
(3, 'A klasa', 3),
(4, 'Audi A5', 1),
(5, 'Serija 3', 2),
(6, 'Serija 7', 2),
(7, 'Serija 8', 2),
(8, 'C klasa', 3),
(9, 'E-Pace', 4),
(10, 'Golf 7', 7),
(11, 'Mazda 6', 5),
(12, 'Cruze', 6);

-- --------------------------------------------------------

--
-- Table structure for table `poruka`
--

CREATE TABLE `poruka` (
  `idPoruka` int(255) NOT NULL,
  `imePrezime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `naslov` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tekst` text COLLATE utf8_unicode_ci NOT NULL,
  `datum` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `poruka`
--

INSERT INTO `poruka` (`idPoruka`, `imePrezime`, `naslov`, `tekst`, `datum`) VALUES
(1, 'Mario Blazevic', 'Turizam', 'sdasdasdasdas', '2019-03-15 19:20:14'),
(2, 'Sara Blazevic', 'Sara', 'Dobar dan zelim', '2019-03-15 19:53:55'),
(3, 'Mario Blazevic', 'Turizam', 'Dobar dan', '2019-03-17 10:38:19'),
(4, 'Mario Blazevic', 'Fsdasdsa', 'sdasdasd', '2019-03-17 11:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `idUloga` int(3) NOT NULL,
  `naziv` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`idUloga`, `naziv`) VALUES
(1, 'admin'),
(2, 'korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketa`
--
ALTER TABLE `anketa`
  ADD PRIMARY KEY (`idAnketa`),
  ADD KEY `idMarka` (`idMarka`),
  ADD KEY `idKorisnik` (`idKorisnik`);

--
-- Indexes for table `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`idAuto`),
  ADD KEY `idModel` (`idModel`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`idKomentar`),
  ADD KEY `idKorisnik` (`idKorisnik`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`idKorisnik`),
  ADD KEY `idUloga` (`idUloga`);

--
-- Indexes for table `marka`
--
ALTER TABLE `marka`
  ADD PRIMARY KEY (`idMarka`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`idMeni`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`idModel`),
  ADD KEY `idMarka` (`idMarka`);

--
-- Indexes for table `poruka`
--
ALTER TABLE `poruka`
  ADD PRIMARY KEY (`idPoruka`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`idUloga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anketa`
--
ALTER TABLE `anketa`
  MODIFY `idAnketa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `auto`
--
ALTER TABLE `auto`
  MODIFY `idAuto` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `idKomentar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `idKorisnik` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `marka`
--
ALTER TABLE `marka`
  MODIFY `idMarka` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `idMeni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `idModel` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `poruka`
--
ALTER TABLE `poruka`
  MODIFY `idPoruka` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `idUloga` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anketa`
--
ALTER TABLE `anketa`
  ADD CONSTRAINT `anketa_ibfk_1` FOREIGN KEY (`idMarka`) REFERENCES `marka` (`idMarka`),
  ADD CONSTRAINT `anketa_ibfk_2` FOREIGN KEY (`idKorisnik`) REFERENCES `korisnik` (`idKorisnik`) ON DELETE CASCADE;

--
-- Constraints for table `auto`
--
ALTER TABLE `auto`
  ADD CONSTRAINT `auto_ibfk_1` FOREIGN KEY (`idModel`) REFERENCES `model` (`idModel`);

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`idKorisnik`) REFERENCES `korisnik` (`idKorisnik`) ON DELETE CASCADE;

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`idUloga`) REFERENCES `uloga` (`idUloga`) ON DELETE CASCADE;

--
-- Constraints for table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`idMarka`) REFERENCES `marka` (`idMarka`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
