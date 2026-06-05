-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 05 juin 2026 à 10:46
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `essaie_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` varchar(10) NOT NULL,
  `design` varchar(100) DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `categorie` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `design`, `prix`, `categorie`) VALUES
('CA300', 'Canon EOS 3000V zoom 28/80', 300000.00, 'photo'),
('CAS07', 'Cassette DV60 par 5', 18000.00, 'divers'),
('CH45002			', 'Chaise ergonomique', 58000.00, 'Mobilier'),
('CP100		', 'Caméscope Panasonic SV-AV 100', 150000.00, 'vidéo'),
('CS330			', 'Caméscope Sony DCR-PC330', 2700000.00, 'vidéo'),
('DEL30', 'Portable Dell X300', 1114750.00, 'informatique'),
('DVD75', 'DVD vierge par 3', 11375.00, 'divers'),
('EN55007		', 'Enceinte bluetooth', 2000.00, 'Audio'),
('FR678		', 'Tabouret', 5000.00, 'meuble'),
('GE295	', 'Véhicule	', 2000000.00, 'Matériels'),
('HP497', 'PC Bureau HP497 écran TFT', 950000.00, 'informatique '),
('LA67003			', 'Lampe de chevet', 16000.00, 'Décoration'),
('MO99005		', 'Montre connectée', 50000.00, 'Électronique'),
('NIK55', 'Nikon F55+zoom 28/80', 350000.00, 'photo'),
('NIK80', 'Nikon F80', 250000.00, 'photo'),
('PA92025			', 'Poubelle automatique', 60000.00, 'Maison'),
('SAX15', 'Portable Samsung X15 XVM', 400000.00, 'informatique '),
('SOX', 'PC Portable Sony Z1-XMP', 1559000.00, 'informatique'),
('TA36056', 'Tapis de yoga', 15000.00, 'Sport'),
('TG21032			', 'Tablette graphique', 80000.00, 'création numérique'),
('VE880011	', 'Ventilateur sur pied	', 35000.00, 'Maison');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` varchar(10) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `age`, `adresse`, `ville`, `mail`) VALUES
('C001', 'DANSOU', 'Femi', 34, 'Quartier anavié', 'Porto-Novo', 'dansou_femi@gmail.com'),
('C002', 'AGOSSOU', 'Gisèle', 23, 'Quartier vodjè', 'Cotonou', 'agossou_gisele@gmail.com'),
('C003', 'KOSSOU', 'Jean', 36, 'Tverskyaya', 'Japon', 'kossou_jean@gmail.com'),
('C004', 'GODONOU', 'Marie', 32, '5-10 Shibuya', 'Japon', 'godonou@gmail.com'),
('C005', 'BONOU', 'Fifa', 23, 'Tverskyaya', 'Canada', 'bonou@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_comm` varchar(20) NOT NULL,
  `date_comm` date DEFAULT NULL,
  `id_client` varchar(10) DEFAULT NULL,
  `montant` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_comm`, `date_comm`, `id_client`, `montant`) VALUES
('COM1780604', '2026-06-04', 'C001', 2550000.00),
('COM1780605', '2026-06-04', 'C002', 37300000.00),
('FAC-20260604225947', '2026-06-04', 'C003', 46100000.00),
('FAC-2026060509305363', '2026-06-05', 'C004', 22050000.00),
('FAC-2026060510023060', '2026-06-05', 'C005', 38515000.00);

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

CREATE TABLE `contenir` (
  `id_comm` varchar(20) NOT NULL,
  `id_article` varchar(10) NOT NULL,
  `qte_comm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contenir`
--

INSERT INTO `contenir` (`id_comm`, `id_article`, `qte_comm`) VALUES
('FAC-20260604225947', 'CA300', 6),
('FAC-20260604225947', 'CP100		', 9),
('FAC-20260604225947', 'CS330			', 15),
('FAC-20260604225947', 'NIK55', 7),
('FAC-2026060509305363', 'CA300', 7),
('FAC-2026060509305363', 'CP100		', 3),
('FAC-2026060509305363', 'CS330			', 6),
('FAC-2026060509305363', 'NIK55', 8),
('FAC-2026060509305363', 'NIK80', 2),
('FAC-2026060510023060', 'CAS07', 4),
('FAC-2026060510023060', 'CS330			', 9),
('FAC-2026060510023060', 'DEL30', 8),
('FAC-2026060510023060', 'EN55007		', 4),
('FAC-2026060510023060', 'PA92025			', 9),
('FAC-2026060510023060', 'SOX', 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `contact` varchar(30) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `contact`, `login`, `password`) VALUES
(1, 'MAHUGBE', 'Obèdine', '01 53 00 03 44', 'mahugbe', '$2y$10$EQsz2319GsP29Pl3hfilW.1/4wcxxl2n9vJDFSJ27NlFbDhelyygy'),
(2, 'NOBIME', 'Fradel', '01 67 56 34 89', 'fradel', '$2y$10$mCEmk0kKduIWCulGWvr2Zek1HSHoJmv4YBDEf/3kHLT5xIR5hzY/i'),
(3, 'NDLOVU		', 'Thabo	', '73 456 7890', 'thabo_n', '$2y$10$SP.wKpEl9YGCtidyiFsRAeuEyVKhkJEUu8cPnp3uznB4BBrKGIXPG'),
(4, 'KOWALSKI	', 'Anna	', '501 234 567	', 'anna_k', '$2y$10$qVsgSWhlVSdN/JZMVYRXXeNs1Xgr7FLB0IkjWJhf774Z2UZwciyiS'),
(5, 'AHOYO	', 'Linda	', '01 90 56 43 56	', 'linda_a', '$2y$10$/wMfMjtsws4a0q.Js.OKUOJzSpCoia1JkYXtdcv22h/CXZDttMhia'),
(6, 'EL MANSOURI	', 'Fatima	', '612 34 56 78	', 'fatima_e', '$2y$10$Gd9Mj/mP.NWjgwKm0VP.EO.C8CYVYh7EloRxtbdlMcgO5LbfjRGgq'),
(7, 'MIGNANWANDE			', 'Magnificat ', '01 50 02 32 02', 'magniane', '$2y$10$xCHOGMTcSoKqKUnqpFMIzeKiCtXUQjVh3EqBpz1S02hrPKFs6FvXS'),
(8, 'DIALLO	', 'Aminata	', '78 123 45 67	', 'aminata_d', '$2y$10$2QhSRzV/SHaIACgwDY9di.fs2BQvKWstaNIFezYX.sVAmCHWDGam.'),
(9, 'DUBOIS', '	Camille	', '6 12 34 78	', 'camille_d', '$2y$10$keue2FNVV6rV50TMHG86qO2OmMyjfMWlFz27L.DDfMFHspfc/Frru'),
(10, 'KIM	', 'Joon	', '10 1234 5678	', 'joon_k', '$2y$10$86/BoarD6tw7HuMIzCvs5.DIw2HB.jZpqmlIHigLsgG62fNEdJkeG');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_comm`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD PRIMARY KEY (`id_comm`,`id_article`),
  ADD KEY `id_article` (`id_article`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `contenir_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`),
  ADD CONSTRAINT `fk_contenir_commande` FOREIGN KEY (`id_comm`) REFERENCES `commande` (`id_comm`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
