-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 12:50 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebank`
--

-- --------------------------------------------------------

--
-- Table structure for table `agence`
--

CREATE TABLE `agence` (
  `codag` int(11) NOT NULL,
  `libelag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agence`
--

INSERT INTO `agence` (`codag`, `libelag`) VALUES
(12345, 0),
(12346, 0);

-- --------------------------------------------------------

--
-- Table structure for table `agent_economique`
--

CREATE TABLE `agent_economique` (
  `codageec` int(11) NOT NULL,
  `libageec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categorie_client`
--

CREATE TABLE `categorie_client` (
  `codcatcl` int(20) NOT NULL,
  `libcatcl` char(30) NOT NULL,
  `categuic` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorie_client`
--

INSERT INTO `categorie_client` (`codcatcl`, `libcatcl`, `categuic`) VALUES
(1, 'personne physique', 'O'),
(2, 'personne morale', 'O'),
(3, 'entrepreneur individuel', 'O'),
(4, 'etat', 'O');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `numclt` int(11) NOT NULL,
  `nom` char(25) NOT NULL,
  `perom` char(25) NOT NULL,
  `numidentifiant` varchar(20) NOT NULL,
  `prenomper` char(11) NOT NULL,
  `nomprenommer` char(20) NOT NULL,
  `sexe` char(11) NOT NULL,
  `situationf` varchar(11) NOT NULL,
  `dnaissance` date NOT NULL,
  `lnaissance` char(11) NOT NULL,
  `ngsm` int(11) NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`numclt`, `nom`, `perom`, `numidentifiant`, `prenomper`, `nomprenommer`, `sexe`, `situationf`, `dnaissance`, `lnaissance`, `ngsm`, `email`) VALUES
(1023456, 'ALi', 'LACHGAR', 'C_753', 'HAMMOU', 'Kenza ELYAKOUTI', 'Masculin', 'célibataire', '2000-05-08', 'Rabat', 658126935, 'alielhachimi@gmail.com'),
(1023457, 'oualid', 'lachgar', 'PA253', 'lachgar', 'ali', 'Masculin', 'célibataire', '2001-05-22', 'TINGHIR', 622115470, 'oualidlachgar@gmail.com'),
(1023460, 'oualid', 'lachgar', 'PA2535491', 'lachgar', 'ali', 'Masculin', 'célibataire', '2001-05-22', 'TINGHIR', 622115470, 'oualidlachgar@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `comptes`
--

CREATE TABLE `comptes` (
  `numcmpt` int(11) NOT NULL,
  `etatcmpt` int(11) NOT NULL,
  `catcmpt` int(11) NOT NULL,
  `souscat` int(11) NOT NULL,
  `intitule` int(11) NOT NULL,
  `idclientprinc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contrat ouverture`
--

CREATE TABLE `contrat ouverture` (
  `idclt` int(11) NOT NULL,
  `num cmpt` int(11) NOT NULL,
  `type relation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `forme_juridique`
--

CREATE TABLE `forme_juridique` (
  `codfj` int(11) NOT NULL,
  `libelfj` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forme_juridique`
--

INSERT INTO `forme_juridique` (`codfj`, `libelfj`) VALUES
(1, 'Societe anonyme'),
(2, 'Societe et nom collectif'),
(3, 'Societe responsable limitee'),
(4, 'Societe en commandite simple'),
(5, 'Groupe interet economique'),
(6, 'Societe civile professionnelle'),
(7, 'Comptables publics'),
(8, 'collectivités locales'),
(9, 'Etablissement public administr'),
(10, 'Cercle et foyer militaire'),
(11, 'Autres etablissement public');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `codrole` int(11) NOT NULL,
  `libelrole` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`codrole`, `libelrole`) VALUES
(1, 'Agent ghuichet'),
(2, 'Chef agence');

-- --------------------------------------------------------

--
-- Table structure for table `situation_juridique`
--

CREATE TABLE `situation_juridique` (
  `codsitju` int(20) NOT NULL,
  `libesitju` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `situation_juridique`
--

INSERT INTO `situation_juridique` (`codsitju`, `libesitju`) VALUES
(1, 'Constituee legale'),
(2, 'En cours de constition'),
(3, 'Majeur'),
(4, 'Mineur'),
(5, 'Mineur emancipe'),
(6, 'Mineur incapable');

-- --------------------------------------------------------

--
-- Table structure for table `type_client`
--

CREATE TABLE `type_client` (
  `codtypcl` varchar(10) NOT NULL,
  `libtypcl` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type_client`
--

INSERT INTO `type_client` (`codtypcl`, `libtypcl`) VALUES
('A_120', 'RM Resident marocain'),
('A_130', 'RE Resident etrangers');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `codutil` int(11) NOT NULL,
  `matricule` varchar(11) NOT NULL,
  `nomutil` char(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `statut` char(11) NOT NULL,
  `codrole` int(11) NOT NULL,
  `codagc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`codutil`, `matricule`, `nomutil`, `password`, `statut`, `codrole`, `codagc`) VALUES
(100, 'abc_100', 'Mohammed Lachgar', '65af9e9e085bd79f8458b320d1b5f2ea', 'O', 1, 12345),
(101, 'abc_101', ' Karim LZRAK', '38b3eff8baf56627478ec76a704e9b52', 'O', 2, 12346);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`codag`);

--
-- Indexes for table `agent_economique`
--
ALTER TABLE `agent_economique`
  ADD PRIMARY KEY (`codageec`);

--
-- Indexes for table `categorie_client`
--
ALTER TABLE `categorie_client`
  ADD PRIMARY KEY (`codcatcl`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`numclt`),
  ADD UNIQUE KEY `numidentifiant` (`numidentifiant`);

--
-- Indexes for table `contrat ouverture`
--
ALTER TABLE `contrat ouverture`
  ADD PRIMARY KEY (`idclt`);

--
-- Indexes for table `forme_juridique`
--
ALTER TABLE `forme_juridique`
  ADD PRIMARY KEY (`codfj`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`codrole`);

--
-- Indexes for table `situation_juridique`
--
ALTER TABLE `situation_juridique`
  ADD PRIMARY KEY (`codsitju`);

--
-- Indexes for table `type_client`
--
ALTER TABLE `type_client`
  ADD PRIMARY KEY (`codtypcl`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`codutil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `numclt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1023463;

--
-- AUTO_INCREMENT for table `contrat ouverture`
--
ALTER TABLE `contrat ouverture`
  MODIFY `idclt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forme_juridique`
--
ALTER TABLE `forme_juridique`
  MODIFY `codfj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
