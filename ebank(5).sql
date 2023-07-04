-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 07:56 PM
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
-- Table structure for table `categori_compte`
--

CREATE TABLE `categori_compte` (
  `idccmpt` int(11) NOT NULL,
  `libelccmpt` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categori_compte`
--

INSERT INTO `categori_compte` (`idccmpt`, `libelccmpt`) VALUES
(1, 'Compte chèque'),
(2, 'Compte CEN'),
(3, 'Compte d\'epargne scolaire'),
(4, 'Compte inteme');

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
  `email` varchar(25) NOT NULL,
  `idcc` int(11) NOT NULL,
  `idtype` varchar(10) NOT NULL,
  `idsj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`numclt`, `nom`, `perom`, `numidentifiant`, `prenomper`, `nomprenommer`, `sexe`, `situationf`, `dnaissance`, `lnaissance`, `ngsm`, `email`, `idcc`, `idtype`, `idsj`) VALUES
(1, 'ALi', 'LACHGAR', 'C_753', 'HAMMOU', 'Kenza ELYAKOUTI', 'Masculin', 'célibataire', '2000-05-08', 'Rabat', 658126935, 'alielhachimi@gmail.com', 2, 'A_120', 3),
(1023457, 'oualid', 'lachgar', 'PA253', 'lachgar', 'ali', 'Masculin', 'célibataire', '2001-05-22', 'TINGHIR', 622115470, 'oualidlachgar@gmail.com', 0, '', 0),
(1023460, 'oualid', 'lachgar', 'PA2535491', 'lachgar', 'ali', 'Masculin', 'célibataire', '2001-05-22', 'TINGHIR', 622115470, 'oualidlachgar@gmail.com', 0, '', 0),
(1023468, 'ha', 'jar', 'PA253', 'jar', 'ha', 'Féminin', 'célibataire', '2001-05-22', 'rabat', 68981653, 'ohzjekjz', 0, '', 0),
(1023469, 'ou', 'lid', 'C_754', 'lid', 'oi', 'Masculin', 'marié', '2001-05-22', 'ooo', 457812458, 'pzeifpozefi', 2, 'A_120', 4),
(1023470, 'ali', 'min', 'C_753', 'cc', 'ali', 'Masculin', 'célibataire', '2023-07-03', 'cc', 0, 'cc', 0, '', 4),
(1023471, 'aa', 'aa', 'aa', 'aa', 'aa', 'Masculin', 'célibataire', '2023-07-03', 'aa', 0, 'aa', 2, 'A_120', 3),
(1023475, 'bb', 'bb', 'bb', 'bb', 'bb', 'Masculin', 'célibataire', '2023-07-03', 'bb', 0, 'bb', 2, 'A_120', 4);

-- --------------------------------------------------------

--
-- Table structure for table `comptes`
--

CREATE TABLE `comptes` (
  `ncmpt` int(11) NOT NULL,
  `devise` char(20) NOT NULL,
  `intitulec` char(25) NOT NULL,
  `solde` float NOT NULL,
  `date` date NOT NULL,
  `idclient` int(11) NOT NULL,
  `idcatcompt` int(11) NOT NULL,
  `idsouscatcompt` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comptes`
--

INSERT INTO `comptes` (`ncmpt`, `devise`, `intitulec`, `solde`, `date`, `idclient`, `idcatcompt`, `idsouscatcompt`, `id`) VALUES
(1, 'MAD', 'COMPTE OUALID', 200, '0000-00-00', 1, 1, 1, 1),
(787, '78', 'ikhan', 1350, '2001-02-05', 787, 2, 2, 3),
(159753, '££', '///', 0, '2023-08-08', 159, 2, 2, 4);

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
-- Table structure for table `operation financiere`
--

CREATE TABLE `operation financiere` (
  `idver` int(11) NOT NULL,
  `idclient` int(11) NOT NULL,
  `idrem` int(11) NOT NULL,
  `soldever` float NOT NULL,
  `datever` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `agence` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operation financiere`
--

INSERT INTO `operation financiere` (`idver`, `idclient`, `idrem`, `soldever`, `datever`, `agence`) VALUES
(1, 787, 1023457, 150, '2023-07-04 17:04:32', 'rabat'),
(2, 787, 1023457, 150, '2023-06-20 23:00:12', ''),
(3, 787, 1023457, 150, '2023-06-20 23:01:08', ''),
(4, 1, 1023457, 154999000, '2023-07-04 16:46:12', ''),
(5, 1, 1023457, 376, '2023-07-04 16:48:46', ''),
(6, 1, 1023457, 200, '2023-07-04 16:49:19', ''),
(7, 1, 1023457, 1000, '2023-07-04 16:57:22', ''),
(8, 1, 1023457, 1000, '2023-07-04 17:04:37', 'rabat'),
(9, 1, 1023457, 1000, '2023-07-04 17:14:58', ''),
(10, 1, 1023457, 1000, '2023-07-04 17:16:32', ''),
(11, 1, 1023457, 150, '2023-07-04 17:17:27', ''),
(12, 1, 1023457, 150, '2023-07-04 17:19:29', ''),
(13, 1, 1023457, 100, '2023-07-04 17:22:54', 'RABAT'),
(14, 1, 1023457, 250, '2023-07-04 17:25:20', 'Salé'),
(15, 1, 1023457, 50, '2023-07-04 17:26:47', 'Tinghir');

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
-- Table structure for table `sous_cat_comptes`
--

CREATE TABLE `sous_cat_comptes` (
  `idsccmpt` int(11) NOT NULL,
  `libelsccmpt` char(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sous_cat_comptes`
--

INSERT INTO `sous_cat_comptes` (`idsccmpt`, `libelsccmpt`) VALUES
(1, 'Compte chèque personne physique'),
(2, 'Compte cheque EMploye BAM'),
(3, 'Compte DH convertible personne');

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
(100, 'abc_100', 'Mohammed Lachgar', 'f899139df5e1059396431415e770c6dd', 'O', 1, 12345),
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
  ADD PRIMARY KEY (`numclt`);

--
-- Indexes for table `comptes`
--
ALTER TABLE `comptes`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `operation financiere`
--
ALTER TABLE `operation financiere`
  ADD PRIMARY KEY (`idver`);

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
  MODIFY `numclt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1023476;

--
-- AUTO_INCREMENT for table `comptes`
--
ALTER TABLE `comptes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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

--
-- AUTO_INCREMENT for table `operation financiere`
--
ALTER TABLE `operation financiere`
  MODIFY `idver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
