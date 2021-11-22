-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 30 juin 2020 à 00:05
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ayoubshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstName` varchar(125) NOT NULL,
  `lastName` varchar(125) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `confirmCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `firstName`, `lastName`, `email`, `mobile`, `address`, `password`, `type`, `confirmCode`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '6464651', 'okay', 'admin', 'admin', '789456');

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`id`, `uid`, `pid`, `quantity`) VALUES
(64, 53, 81, 1),
(65, 53, 79, 1);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `oplace` text NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `dstatus` varchar(10) NOT NULL DEFAULT 'no',
  `odate` date NOT NULL,
  `ddate` date NOT NULL,
  `delivery` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `uid`, `pid`, `quantity`, `oplace`, `mobile`, `dstatus`, `odate`, `ddate`, `delivery`) VALUES
(96, 53, 90, 1, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-11', '0000-00-00', 'Standard Delivery'),
(97, 53, 86, 1, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-23', '0000-00-00', 'Express Delivery +100php upon '),
(98, 53, 81, 1, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-23', '0000-00-00', 'Express Delivery +100php upon '),
(100, 53, 86, 1, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-28', '0000-00-00', 'Express Delivery +100php upon '),
(101, 53, 90, 1, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-28', '0000-00-00', 'Express Delivery +100php upon '),
(102, 53, 87, 1, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-28', '0000-00-00', 'Express Delivery +100php upon '),
(103, 53, 81, 1, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-29', '0000-00-00', 'Express Delivery +100php upon '),
(104, 53, 77, 3, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-29', '0000-00-00', 'Express Delivery +100php upon '),
(116, 53, 79, 4, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-29', '0000-00-00', 'Express Delivery +100php upon '),
(117, 53, 79, 1, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-29', '0000-00-00', 'Express Delivery +100php upon '),
(118, 53, 81, 1, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-29', '0000-00-00', 'Standard Delivery'),
(119, 53, 86, 1, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-29', '0000-00-00', 'Express Delivery +100php upon '),
(120, 53, 90, 5, 'Ajdir Al-Hoceima', '0667227916', 'Yes', '2020-06-29', '0456-06-05', 'Express Delivery +100php upon '),
(121, 53, 109, 1, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-29', '0000-00-00', 'Express Delivery +100php upon '),
(122, 53, 90, 1, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-29', '0000-00-00', 'Express Delivery +100php upon '),
(123, 53, 81, 1, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-29', '0000-00-00', 'Express Delivery +100php upon '),
(124, 53, 109, 3, 'Ajdir Al-Hoceimasd', '0667227916sdcsd', 'no', '2020-06-29', '0000-00-00', 'Express Delivery +100php upon '),
(127, 53, 79, 1, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-29', '0000-00-00', 'Express Delivery +100php upon '),
(128, 53, 109, 1, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-29', '0000-00-00', 'Express Delivery +100php upon '),
(129, 53, 81, 1, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-29', '0000-00-00', 'Express Delivery +100php upon '),
(130, 53, 81, 1, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-29', '0000-00-00', 'Standard Delivery'),
(131, 53, 80, 3, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-29', '0000-00-00', 'Express Delivery +100php upon '),
(132, 53, 79, 4, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-29', '0000-00-00', 'Express Delivery +100php upon '),
(133, 53, 79, 1, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-29', '0000-00-00', 'Express Delivery +100php upon '),
(134, 53, 90, 1, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-29', '0000-00-00', 'Express Delivery +100php upon '),
(135, 53, 109, 1, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-29', '0000-00-00', 'Express Delivery +100php upon '),
(136, 53, 109, 2, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-29', '0000-00-00', 'Express Delivery +100php upon '),
(137, 53, 109, 2, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-29', '0000-00-00', 'Express Delivery +100php upon '),
(138, 53, 85, 1, 'Ajdir Al-Hoceima', '0667227916', 'no', '2020-06-29', '0000-00-00', 'Express Delivery +100php upon ');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pName` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `piece` int(11) NOT NULL,
  `description` text NOT NULL,
  `available` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `item` varchar(100) NOT NULL,
  `pCode` varchar(20) NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `pName`, `price`, `piece`, `description`, `available`, `category`, `type`, `item`, `pCode`, `picture`) VALUES
(77, 'FENDER', 3340, 1, 'Electro-acoustic Folk Guitar', 100, '', '', 'guitars', 'aa', '1.png'),
(78, 'MARTIN', 12000, 1, 'Electro-acoustique Folk Guitar\r\nD-18E-2020 DREADNOUGHT D-18E 2020 LTD', 100, '', '', 'guitars', 'bb', '2.png'),
(79, 'TAYLOR', 7500, 1, 'Electro-acoustique Folk Guitar\r\nGS MINI-E ROSEWOOD', 100, '', '', 'guitars', 'cc', '3.png'),
(80, 'GRETSCH', 2999, 1, 'Electro-acoustique Retro Vintage Guitar\r\nG2210 STREAMLINER JUNIOR JET CLUB IMPERIAL STAIN', 100, '', '', 'guitars', 'dd', '4.png'),
(81, 'Monzani MZFL-133 Flûte Traversière', 1300, 1, 'The articulation of the head of the MZFL-133 C flute gives the instrument a balanced sound and a very direct response.', 100, '', '', 'flutes', 'qq', '1.PNG'),
(83, 'Yamaha YFL-212', 2499, 1, 'The YAMAHA YFL-212 flute has not only been redesigned. YAMAHA has also added some technical improvements to the new series.', 100, '', '', 'flutes', '', '2.png'),
(84, 'YAMAHA YAS-280 - ALTO MIB VERNI', 7000, 1, 'saxhophone for beginners ', 100, '', '', 'saxophones', 'po', '1.PNG'),
(85, 'EAGLETONE ROAD AS100', 4500, 1, 'saxophone for studying', 100, '', '', 'saxophones', 'b', '3.PNG'),
(86, 'YAMAHA YTS-280 - TENOR SIB', 11000, 1, 'professional saxophone ', 100, '', '', 'saxophones', 'n', '2.PNG'),
(87, 'EAGLETONE ROAD CSS100', 3000, 1, 'saxophone for biginners', 100, '', '', 'saxophones', '', '4.png'),
(90, 'Yamaha - NYDP143 - Piano Numérique - Noir', 11499, 1, 'classic piano 192 notes with Stereophonique Optimiser while playing with casque', 100, '', '', 'pianos', '', '1.png'),
(109, 'Classic Cantabile GP-A 810 piano', 20250, 1, 'professionl classic piano 88 touches ', 100, '', '', 'pianos', '', '2.png');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(120) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirmCode` varchar(10) NOT NULL,
  `activation` varchar(10) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `email`, `mobile`, `address`, `password`, `confirmCode`, `activation`) VALUES
(53, 'Ayoub', 'Chachi', 'chachiayoub9@gmail.com', '0667227916', 'Ajdir Al-Hoceima', '123', '0', 'yes'),
(56, 'Karim', 'Mohamed', '0102ayoub@gmail.com', '0636753917', 'casa', '123', '0', 'yes');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
