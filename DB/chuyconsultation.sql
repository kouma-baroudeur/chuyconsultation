-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 23 mai 2021 à 19:15
-- Version du serveur :  10.4.6-MariaDB
-- Version de PHP :  7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `chuyconsultation`
--

-- --------------------------------------------------------

--
-- Structure de la table `contacturgence`
--

CREATE TABLE `contacturgence` (
  `id` int(16) NOT NULL,
  `nomContact` varchar(32) NOT NULL,
  `prenomContact` varchar(32) NOT NULL,
  `sexeContact` varchar(32) NOT NULL,
  `adresseContact` varchar(255) NOT NULL,
  `telurgence` int(11) NOT NULL,
  `lienPatientContact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `jours`
--

CREATE TABLE `jours` (
  `codeJour` char(3) NOT NULL,
  `valeur` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jours`
--

INSERT INTO `jours` (`codeJour`, `valeur`) VALUES
('DIM', 'DIMANCHE'),
('JEU', 'JEUDI'),
('LUN', 'LUNDI'),
('MAR', 'MARDI'),
('MER', 'MERCREDI'),
('SAM', 'SAMEDI'),
('VEN', 'VENDREDI');

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE `medecin` (
  `codeMedecin` int(32) NOT NULL,
  `nomMedecin` varchar(32) NOT NULL,
  `prenomMedecin` varchar(32) NOT NULL,
  `codeService` varchar(32) NOT NULL,
  `userId` int(50) NOT NULL,
  `sexeMedecin` varchar(50) NOT NULL,
  `adresseMedecin` varchar(255) NOT NULL,
  `dateNaissanceMedecin` date DEFAULT NULL,
  `lieuNaissanceMedecin` varchar(50) NOT NULL,
  `telMedecin` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`codeMedecin`, `nomMedecin`, `prenomMedecin`, `codeService`, `userId`, `sexeMedecin`, `adresseMedecin`, `dateNaissanceMedecin`, `lieuNaissanceMedecin`, `telMedecin`) VALUES
(1, 'KOUMADOUL', 'Baroud', 'CARDIO', 2, 'M', 'Ngoa-Ekellé, Yaoundé-Cameroun', '1997-10-04', 'N\'Djamena', 693553454),
(2, 'KOUMADOUL', 'Baroud', 'DERMATO', 3, 'M', 'Ngoa-Ekellé, Yaoundé-Cameroun', '1997-10-04', 'N\'Djamena', 693553454),
(3, 'LEKEBAYE BAIPOU', 'Francis', 'KINESI', 4, 'M', 'Yaoundé Bastos', '1996-10-05', 'Yaoundé', 691836203);

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `IP` int(16) NOT NULL,
  `nomPatient` varchar(32) NOT NULL,
  `prenomPatient` varchar(32) NOT NULL,
  `sexePatient` varchar(32) NOT NULL,
  `adressePatient` varchar(255) NOT NULL,
  `dateNaissancePatient` date NOT NULL,
  `lieuNaissancePatient` varchar(255) NOT NULL,
  `emergencyContact` varchar(50) DEFAULT NULL,
  `premiereObservation` int(11) DEFAULT NULL,
  `userId` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`IP`, `nomPatient`, `prenomPatient`, `sexePatient`, `adressePatient`, `dateNaissancePatient`, `lieuNaissancePatient`, `emergencyContact`, `premiereObservation`, `userId`) VALUES
(1, 'Michelle', 'MOYOPO', 'F', 'Yaoundé,mimboman', '2000-10-26', 'Kossamba', NULL, NULL, 1),
(2, 'GAETAN', 'TEUMMAH', 'M', 'Soa-Nkolfoulou', '1999-01-04', 'Yaoundé', NULL, NULL, 5),
(3, 'NDJUKOM MBOBDA', 'Alexie', 'F', 'Yaoundé Mimboman', '1998-04-15', 'Douala', NULL, NULL, 6);

-- --------------------------------------------------------

--
-- Structure de la table `plannings`
--

CREATE TABLE `plannings` (
  `id` int(11) NOT NULL,
  `jours` char(3) NOT NULL,
  `disponibilites` varchar(255) NOT NULL COMMENT 'ici le medecins emargera ses heures disponibles, nous avons laisser en VARCHAR pour cela',
  `codeMedecin` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `plannings`
--

INSERT INTO `plannings` (`id`, `jours`, `disponibilites`, `codeMedecin`) VALUES
(1, 'LUN', '07h - 12h', 2),
(2, 'MER', '14h30 - 22h', 3);

-- --------------------------------------------------------

--
-- Structure de la table `premiereobservation`
--

CREATE TABLE `premiereobservation` (
  `id` int(11) NOT NULL,
  `poids` double NOT NULL,
  `taille` double NOT NULL,
  `PA` varchar(10) NOT NULL,
  `pouls` varchar(10) NOT NULL,
  `antecedantMedicaux` varchar(255) NOT NULL,
  `antecedantFamiliaux` varchar(255) NOT NULL,
  `allergies` varchar(255) NOT NULL,
  `goupeSanguin` varchar(5) NOT NULL,
  `rhesus` varchar(10) NOT NULL,
  `examenPhysique` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rendezvous`
--

CREATE TABLE `rendezvous` (
  `numeroRdv` int(255) NOT NULL,
  `dateRdv` date DEFAULT NULL,
  `heureRdv` time NOT NULL,
  `IP` int(32) NOT NULL COMMENT 'identifiant du patient',
  `codeMedecin` int(32) DEFAULT NULL,
  `etatRdv` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rendezvous`
--

INSERT INTO `rendezvous` (`numeroRdv`, `dateRdv`, `heureRdv`, `IP`, `codeMedecin`, `etatRdv`) VALUES
(1, '2021-05-27', '12:50:00', 1, 1, 'Attente'),
(2, '2021-05-30', '07:50:00', 1, 3, 'Attente'),
(3, '2021-06-03', '10:00:00', 2, 3, 'Attente');

-- --------------------------------------------------------

--
-- Structure de la table `secretaire`
--

CREATE TABLE `secretaire` (
  `codeSecretaire` int(32) NOT NULL,
  `nomSecretaire` varchar(32) NOT NULL,
  `prenomSecretaire` varchar(32) NOT NULL,
  `codeService` varchar(32) NOT NULL,
  `userId` int(50) NOT NULL,
  `sexeSecretaire` varchar(50) NOT NULL,
  `adresseSecretaire` varchar(255) NOT NULL,
  `dateNaissanceSecretaire` date DEFAULT NULL,
  `lieuNaissanceSecretaire` varchar(255) NOT NULL,
  `telSecretaire` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `codeService` varchar(50) NOT NULL,
  `nomService` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`codeService`, `nomService`) VALUES
('BACTERIO', 'Bactériologie'),
('CARDIO', 'Cardiologie'),
('DERMATO', 'Dermatologie'),
('DIABETO', 'Diabétologie'),
('ENDO', 'Endocrinologie'),
('GYNECO', 'Gynecologie'),
('HEMATO', 'Hématologie'),
('KINESI', 'Kinésithérapie'),
('NEPHRO', 'Nephrologie'),
('NEURO', 'Neurologie'),
('PARASI', 'Parasitologie'),
('PEDO', 'Pedologie'),
('PNEUMO', 'Pneumologie'),
('PSYCHIA', 'Psychiatrie'),
('RADIO', 'Radiologie'),
('URO', 'Urologie');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `state` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `state`) VALUES
(1, 'michellefotso2@gmail.com', '$2y$10$uquVd1sfpBpKmRiKt/5xfuGBehqTPhLq5nqkRSyKqlnlGGkq3eTWa', 'patient', 'complet'),
(2, 'koumadoulbaroud@gmail.com', '$2y$10$OVhc1WGnEFDvOql3Z6R8iOHUo6eoAQ0szrQ7lA8lhD4I1S8JC373.', 'admin', 'complet'),
(3, 'koumadoul.baroud@facsciences-uy1.cm', '$2y$10$oZEqqlRqI7XZAqwq78Vojegi3.MC1dFLHZiVx8AXMAIFHPFOkOGL.', 'medecin', 'incomplet'),
(4, 'fbaipou@gmail.com', '$2y$10$xPFERi//uTp68OLJJiU1XOhGczN4B2fnBWptju8jwtSNT7AD.HvzW', 'medecin', 'complet'),
(5, 'gaetanteummah@gmail.com', '$2y$10$KBDkLkV9oNJTJyT2dNF9Seyr4H9kiQuum7CblezF3kK9E3pQh1Fh.', 'patient', 'complet'),
(6, 'alexiakending1@gmail.com', '$2y$10$w6Nnb1iFpH9ziQO2jJhncO7baXSjOjuh2/1ikTUxLQuSXkEkrWmAe', 'patient', 'complet');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contacturgence`
--
ALTER TABLE `contacturgence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lienPatientContact` (`lienPatientContact`);

--
-- Index pour la table `jours`
--
ALTER TABLE `jours`
  ADD PRIMARY KEY (`codeJour`);

--
-- Index pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`codeMedecin`),
  ADD KEY `Code_Service` (`codeService`),
  ADD KEY `FK_medecin_users` (`userId`),
  ADD KEY `nomMedecin` (`nomMedecin`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`IP`),
  ADD KEY `userId` (`userId`),
  ADD KEY `premiereObservation` (`premiereObservation`),
  ADD KEY `emergencyContact` (`emergencyContact`);

--
-- Index pour la table `plannings`
--
ALTER TABLE `plannings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jours` (`jours`),
  ADD KEY `lien_entre_medecin_planning` (`codeMedecin`);

--
-- Index pour la table `premiereobservation`
--
ALTER TABLE `premiereobservation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD PRIMARY KEY (`numeroRdv`),
  ADD KEY `Code` (`codeMedecin`),
  ADD KEY `IP` (`IP`);

--
-- Index pour la table `secretaire`
--
ALTER TABLE `secretaire`
  ADD PRIMARY KEY (`codeSecretaire`),
  ADD KEY `Code_Service` (`codeService`),
  ADD KEY `FK_secretaire_users` (`userId`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`codeService`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `medecin`
--
ALTER TABLE `medecin`
  MODIFY `codeMedecin` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `IP` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `plannings`
--
ALTER TABLE `plannings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  MODIFY `numeroRdv` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `secretaire`
--
ALTER TABLE `secretaire`
  MODIFY `codeSecretaire` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contacturgence`
--
ALTER TABLE `contacturgence`
  ADD CONSTRAINT `FK_patient_relationship` FOREIGN KEY (`lienPatientContact`) REFERENCES `patient` (`emergencyContact`);

--
-- Contraintes pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD CONSTRAINT `FK_medecin_service` FOREIGN KEY (`codeService`) REFERENCES `service` (`codeService`),
  ADD CONSTRAINT `FK_medecin_users` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `FK_patient_users` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `plannings`
--
ALTER TABLE `plannings`
  ADD CONSTRAINT `FK_planning_jours` FOREIGN KEY (`jours`) REFERENCES `jours` (`codeJour`),
  ADD CONSTRAINT `FK_planning_medecin` FOREIGN KEY (`codeMedecin`) REFERENCES `medecin` (`codeMedecin`);

--
-- Contraintes pour la table `premiereobservation`
--
ALTER TABLE `premiereobservation`
  ADD CONSTRAINT `FK_patient_first_observation` FOREIGN KEY (`id`) REFERENCES `patient` (`premiereObservation`);

--
-- Contraintes pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD CONSTRAINT `FK_rendezvous_medecin` FOREIGN KEY (`codeMedecin`) REFERENCES `medecin` (`codeMedecin`),
  ADD CONSTRAINT `FK_rendezvous_patient` FOREIGN KEY (`IP`) REFERENCES `patient` (`IP`);

--
-- Contraintes pour la table `secretaire`
--
ALTER TABLE `secretaire`
  ADD CONSTRAINT `FK_secretaire_service` FOREIGN KEY (`codeService`) REFERENCES `service` (`codeService`),
  ADD CONSTRAINT `FK_secretaire_users` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
