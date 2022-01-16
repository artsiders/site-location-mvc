-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 20 juil. 2021 à 21:47
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `location`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `idCategorie` int(11) NOT NULL,
  `categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`idCategorie`, `categorie`) VALUES
(1, 'appartement'),
(2, 'maison'),
(3, 'chambre'),
(4, 'studio');

-- --------------------------------------------------------

--
-- Structure de la table `city`
--

CREATE TABLE `city` (
  `idCity` int(11) NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `city`
--

INSERT INTO `city` (`idCity`, `city`) VALUES
(2, 'yaoundé'),
(3, 'douala'),
(4, 'bafoussam'),
(5, 'garoua'),
(6, 'ngaoundéré'),
(7, 'bamenda'),
(8, 'maroua'),
(9, 'kribi'),
(10, 'bertoua'),
(11, 'limbé'),
(12, 'dschang'),
(13, 'edéa'),
(14, 'ebolowa'),
(15, 'foumban'),
(16, 'bafang'),
(17, 'mbouda'),
(18, 'bangangté'),
(19, 'mamfé'),
(20, 'mora'),
(21, 'yabassi'),
(22, 'banyo'),
(23, 'eséka'),
(24, 'meiganga'),
(25, 'tibati'),
(26, 'ngaoundal'),
(27, 'nanga eboke'),
(28, 'garoua_boulaî'),
(29, 'kumba'),
(30, 'kousséri'),
(31, 'baham'),
(32, 'bandjoun'),
(33, 'hauts-plateaux'),
(34, 'benoue'),
(35, 'loum'),
(36, 'mokolo'),
(37, 'guider'),
(38, 'tochllire'),
(39, 'sangmélima'),
(40, 'nkambe'),
(41, 'kumbo'),
(42, 'soa'),
(43, 'yagoua'),
(44, 'bangou'),
(46, 'yokadouma'),
(47, 'valée-du-ntem'),
(48, 'mbakmayo'),
(49, 'moungo'),
(50, 'nkambe');

-- --------------------------------------------------------

--
-- Structure de la table `houses`
--

CREATE TABLE `houses` (
  `idHouse` int(11) NOT NULL,
  `electricity` int(1) NOT NULL,
  `water` int(1) NOT NULL,
  `description` text NOT NULL,
  `street` varchar(100) NOT NULL,
  `add_date` datetime NOT NULL DEFAULT current_timestamp(),
  `price` int(255) NOT NULL,
  `idCity` int(11) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `photoHouse1` varchar(255) NOT NULL DEFAULT 'photoHouseDefault.jpg',
  `photoHouse2` varchar(255) NOT NULL DEFAULT 'photoHouseDefault.jpg',
  `photoHouse3` varchar(255) NOT NULL DEFAULT 'photoHouseDefault.jpg',
  `photoHouse4` varchar(255) NOT NULL DEFAULT 'photoHouseDefault.jpg',
  `statue` varchar(50) NOT NULL DEFAULT 'disponible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `houses`
--

INSERT INTO `houses` (`idHouse`, `electricity`, `water`, `description`, `street`, `add_date`, `price`, `idCity`, `idCategorie`, `idUser`, `photoHouse1`, `photoHouse2`, `photoHouse3`, `photoHouse4`, `statue`) VALUES
(1, 1, 1, 'cette maison possede unedouche moderne', 'binam', '2021-06-20 14:15:18', 20000, 4, 0, 1, 'photoHouseDefault.jpg', 'photoHouseDefault.jpg', 'photoHouseDefault.jpg', 'photoHouseDefault.jpg', 'disponible'),
(2, 1, 0, 'le information sur la maison', 'carrefou le maire', '2021-06-20 14:15:18', 600000, 4, 4, 2, '8.jpg', '6.jpg', '8.jpg', 'photoHouseDefault.jpg', 'indisponible'),
(3, 1, 0, 'une petite description sur la maison\r\net sur le voisinage si possible', '3 vente', '2021-06-25 13:16:16', 12000, 4, 3, 1, 'paros_c01.jpg', 'photoHouseDefault.jpg', 'photoHouseDefault.jpg', 'photoHouseDefault.jpg', 'disponible'),
(4, 1, 1, 'juste pour renplire le vide ', 'bonne fontaine', '2021-06-25 13:16:16', 234000, 15, 4, 2, '55.jpg', 'photoHouseDefault.jpg', 'photoHouseDefault.jpg', 'photoHouseDefault.jpg', 'disponible'),
(5, 1, 1, 'une petite description sur la maison\r\net sur le voisinage si possible', '3 vente', '2021-06-25 13:17:00', 12000, 9, 3, 1, '6.jpg', 'photoHouseDefault.jpg', 'photoHouseDefault.jpg', 'photoHouseDefault.jpg', 'indisponible'),
(6, 1, 1, 'juste pour renplire le vide ', 'bonne fontaine', '2021-06-25 13:17:00', 17500, 15, 4, 2, '55.jpg', 'photoHouseDefault.jpg', 'photoHouseDefault.jpg', 'photoHouseDefault.jpg', 'disponible'),
(7, 1, 0, 'nouvelle maison ajouter aujourd\'hui ', 'djelin3', '2021-07-20 18:40:32', 13000, 4, 2, 2, 'photoHouseDefault.jpg', 'photoHouseDefault.jpg', 'photoHouseDefault.jpg', 'photoHouseDefault.jpg', 'disponible'),
(8, 1, 0, 'nouvelle maison ajouter aujourd\'hui ', 'djelin3', '2021-07-20 18:40:37', 13000, 4, 2, 2, 'photoHouseDefault.jpg', 'photoHouseDefault.jpg', 'photoHouseDefault.jpg', 'photoHouseDefault.jpg', 'disponible');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `idCity` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `photo_profil` varchar(255) NOT NULL DEFAULT 'profil_default.jpg',
  `joinDate` datetime NOT NULL DEFAULT current_timestamp(),
  `sex` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `firstName`, `lastName`, `email`, `pass`, `idCity`, `tel`, `photo_profil`, `joinDate`, `sex`) VALUES
(1, 'dimi', 'mabon', 'dimitrov250@gmail.com', '$2y$10$ykuTnTNGEI7rVKT2EKLKKuTNyZfCs5IaM8IyIajRtrU65et0rra2q', '44', '000000000', 'profil_default.jpg', '2021-06-26 14:42:32', 'h'),
(2, 'sider', 'art', 'jimsky699@gmail.com', '$2y$10$8eYlIhGL4Bf3uXnxF.lWWugdBmDVWqhQC2EVHyZeFoTG1ZG6Nxc32', '4', '677299672', 'profil_default.jpg', '2021-06-27 12:19:57', 'h'),
(9, 'jimsky', 'one', 'skyone@gmail.com', '$2y$10$DBeF7us3ZpRXUxnDIctKDuKa/dW5.RwswNyQ5dMGuFr2NkAY15Aji', '10', '0677299672', 'profil_default.jpg', '2021-06-28 19:12:46', 'h'),
(10, 'FEUSSIE', 'cyril', 'feussiecyril@gmail.fr', '$2y$10$pkswQHjq5lU0wE3Q3wOa7uD7i2Bgrxgst3Q49PGtzudQKm/.L.DEW', '23', '670434139', 'profil_default.jpg', '2021-06-30 11:37:52', 'h'),
(31, 'zadze', 'za', 'eazaedragoazonez250@gmail.com', '$2y$10$0CDb5aI82Ktrw1hz01gSxOhpd2TBkvcBQCpK1A8K1LE/SgWgmyCq6', '32', 'zaezeazea', 'profil_default.jpg', '2021-07-17 21:26:33', 'h'),
(33, 'sider', 'art', 'jimserry699@gmail.com', '$2y$10$sKf6Scys4eWOIQax2xsSbuqsOz/6jT1021cK4YoN7m31l3enKwTwW', '', '0677299672', 'profil_default.jpg', '2021-07-17 22:34:14', 'h'),
(34, 'sider', 'art', 'jimsky699fff@gmail.com', '$2y$10$lbv.2y.vkBO3btnwhWhbRuD3EdKbEoBoPpDLCCw7dJd3qq76.XisO', '', '0677299672', 'profil_default.jpg', '2021-07-17 22:42:20', 'h'),
(35, 'sider', 'art', '699@gmail.com', '$2y$10$qwn.sJRiaoNKMx5sUs0tm.22PJ.Z.X4w.e5yNC2Hh.kH.G0i/Ah7C', '', '0677299672', 'profil_default.jpg', '2021-07-17 22:42:46', 'h'),
(36, 'terrs', 'srzez', '69dd9@gmail.com', '$2y$10$zGrP87nyMFkcl024zaS07uZy036TjBMcujWUKPDtpxKMyxnnd7tk.', '', '0677299672', 'profil_default.jpg', '2021-07-18 07:13:34', 'h'),
(37, 'sky', 'one', 'skyone99@gmail.com', '$2y$10$6cKg/BtAF4EtU258eJB0lupnm4jz9Lc9tTThZIITbTkKesSWuC.RS', '11', '677299672', 'profil_default.jpg', '2021-07-18 09:16:38', 'h'),
(38, 'craira', 'annie', 'anniecaira@gmail.com', '$2y$10$z2sw3sJXv1ix7rUVxkuwnepHYXHmSqwrW55L591ZHd6o8qQvYj6D2', '2', '655432245', 'profil_default.jpg', '2021-07-18 13:02:14', 'f'),
(39, 'sider', 'art', 'jimsky6ddd99@gmail.com', '$2y$10$4jAN703688aW9jgwdf0EB.ajjFAsQbmRoB0YgQ3yTets6.Qr3iAMu', '32', '0677299672', 'profil_default.jpg', '2021-07-20 21:27:24', 'f'),
(40, 'sider', 'art', 'jimsky6dddd99@gmail.com', '$2y$10$0yqZxyAUVtoIy5L5vyhUyusfoO9VX3KgDObrkIExYUG7AvVoAvIgi', '32', '0677299672', 'profil_default.jpg', '2021-07-20 21:29:21', 'f'),
(41, 'sider', 'art', 'jimsky6ddddd99@gmail.com', '$2y$10$h9SdO3jEMSy288BEcY6Fium/.RJK2TRsYfLei.O5IYU/gJXoqkYqa', '32', '0677299672', 'profil_default.jpg', '2021-07-20 21:29:54', 'f'),
(42, 'sider', 'art', 'jimsky6dddddd99@gmail.com', '$2y$10$FIrSmon5HCFnLb27VBr4IeVzhx2Hi7yJSAmC8sJviBWT9LBp53XDO', '32', '0677299672', 'profil_default.jpg', '2021-07-20 21:31:12', 'f'),
(43, 'sider', 'art', 'jimsky6ddddddd99@gmail.com', '$2y$10$R.tPYwYnxvMGaAzTt/E3meLf8GF3YeZRSaDi0DFPY4RKrYdwdsNky', '32', '0677299672', 'profil_default.jpg', '2021-07-20 21:35:07', 'f'),
(44, 'sider', 'art', 'djimsky699@gmail.com', '$2y$10$3svf5xB7Tv5TfxBg5SNYw..pxfg7rJQbKvY/lLtFtQ5EYG6iRsZaK', '', '0677299672', 'profil_default.jpg', '2021-07-20 21:36:45', 'h'),
(45, 'sider', 'art', 'ajimserry699@gmail.com', '$2y$10$gi6i9ZGon13pSdIJ6jFr.eb6DBK6jXgqtz8AwM2Cg90K/vgosTyJ6', '', '0677299672', 'profil_default.jpg', '2021-07-20 21:37:29', 'h'),
(46, 'sider', 'AZA', '6333399@gmail.com', '$2y$10$ZOimhTHRRVCm.TWkhHpdJuqtAlHpgDalj1VqBvfZgyvn0FgqtUqPK', '18', '0677299672', 'profil_default.jpg', '2021-07-20 21:40:17', 'h');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`idCity`);

--
-- Index pour la table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`idHouse`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `city`
--
ALTER TABLE `city`
  MODIFY `idCity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `houses`
--
ALTER TABLE `houses`
  MODIFY `idHouse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
