-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 20 mai 2023 à 23:24
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e-learningdz`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `ID` int(255) NOT NULL,
  `fn` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `dob` varchar(250) NOT NULL,
  `pn` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `job` varchar(250) NOT NULL,
  `seal` varchar(250) NOT NULL,
  `signature` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `del` varchar(250) NOT NULL,
  `code` varchar(255) NOT NULL,
  `address` varchar(250) NOT NULL,
  `wilaya` varchar(250) NOT NULL,
  `groupage` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `new` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`ID`, `fn`, `name`, `gender`, `dob`, `pn`, `email`, `password`, `job`, `seal`, `signature`, `status`, `del`, `code`, `address`, `wilaya`, `groupage`, `description`, `new`) VALUES
(1, 'Dris', 'Djihad', 'Mâle', '2006-08-06', '0673730290', 'djihad139@gmail.com', '0000', 'Admin', '', '', 'Activé', '', 'ABCDEFGHIJ', 'Cité Souladj Boudjemaa, Sigus', 'Oum El Bouaghi', 'O+', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `appointments`
--

CREATE TABLE `appointments` (
  `ID` int(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `time` varchar(250) NOT NULL,
  `mp` varchar(250) NOT NULL,
  `namepatient` varchar(250) NOT NULL,
  `fnpatient` varchar(250) NOT NULL,
  `dob` varchar(250) NOT NULL,
  `valid` varchar(250) NOT NULL,
  `observation` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `pay` varchar(250) NOT NULL,
  `remain` varchar(250) NOT NULL,
  `del` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE `chat` (
  `ID` int(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `message` varchar(250) NOT NULL,
  `sender` varchar(250) NOT NULL,
  `receiver` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `time` varchar(250) NOT NULL,
  `del` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `drugs`
--

CREATE TABLE `drugs` (
  `ID` int(255) NOT NULL,
  `name` varchar(250) NOT NULL,
  `form` varchar(250) NOT NULL,
  `del` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

CREATE TABLE `patients` (
  `ID` int(255) NOT NULL,
  `fn` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `dob` varchar(250) NOT NULL,
  `pn` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `mpi` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `del` varchar(250) NOT NULL,
  `notes` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `wilaya` varchar(250) NOT NULL,
  `height` varchar(250) NOT NULL,
  `weight` varchar(250) NOT NULL,
  `groupage` varchar(250) NOT NULL,
  `allergies` varchar(250) NOT NULL,
  `surgeries` varchar(250) NOT NULL,
  `chronic` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `patients`
--

INSERT INTO `patients` (`ID`, `fn`, `name`, `gender`, `dob`, `pn`, `email`, `password`, `mpi`, `status`, `del`, `notes`, `code`, `address`, `wilaya`, `height`, `weight`, `groupage`, `allergies`, `surgeries`, `chronic`) VALUES
(1, 'Dris', 'Ouail mohamed djihad', 'Mâle', '2006-08-06', '0673730290', 'djihad139@gmail.com', '00000000', 'Nacer', 'Activé', '', '', 'ABCDEFGHIG', 'Sigus', 'Oum El Bouaghi', '175', '64', 'O+', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `ID` int(255) NOT NULL,
  `details` mediumtext NOT NULL,
  `mp` varchar(250) NOT NULL,
  `namepatient` varchar(250) NOT NULL,
  `fnpatient` varchar(250) NOT NULL,
  `dob` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `del` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `specialties`
--

CREATE TABLE `specialties` (
  `ID` int(255) NOT NULL,
  `namefr` varchar(250) NOT NULL,
  `namear` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `specialties`
--

INSERT INTO `specialties` (`ID`, `namefr`, `namear`) VALUES
(3, 'Anatomie pathologique', 'التشريح المرضي'),
(4, 'Anesthésie - Réanimation', 'التخدير - الإنعاش'),
(5, 'Biochimie', 'الكيمياء الحيوية'),
(6, 'Biologie clinique', 'علم الأحياء السريري'),
(7, 'Cardiologie', 'طب القلب'),
(8, 'Chirurgie générale', 'الجراحة العامة'),
(9, 'Chirurgie orthopédique', 'جراحة العظام'),
(10, 'Chirurgie pédiatrique', 'جراحة الأطفال'),
(11, 'Chirurgie urologique', 'جراحة المسالك البولية'),
(12, 'Chirurgie maxillo-faciale', 'جراحة الوجه والفكين'),
(13, 'Chirurgie cardio-vasculaire', 'جراحة القلب والأوعية الدموية'),
(14, 'Dermatologie', 'الجلد'),
(15, 'Endocrinologie – Diabétologie', 'أمراض الغدد الصماء - السكري'),
(16, 'Gastro-entérologie', 'أمراض الجهاز الهضمي'),
(17, 'Gynéco-obstétrique', 'أمراض النساء والتوليد'),
(18, 'Hématologie', 'أمراض الدم'),
(19, 'Hémobiologie', 'بيولوجيا الدم'),
(20, 'Histo-embryologie', 'علم الأنسجة'),
(21, 'Immunologie', 'علم المناعة'),
(22, 'Maladies infectieuses', 'أمراض معدية'),
(23, 'Médecine interne', 'الطب الداخلي'),
(24, 'Médecine légale', 'الطب الشرعي'),
(25, 'Médecine nucléaire', 'الطب النووي'),
(26, 'Médecine du travail', 'طب العمل'),
(27, 'Microbiologie', 'علم الأحياء المجهري'),
(28, 'Néphrologie', 'طب الكلى'),
(29, 'Neurochirurgie', 'جراحة الأعصاب'),
(30, 'Neurologie', 'علم الأعصاب'),
(31, 'O.R.L.', 'الأنف والأذن والحنجرة'),
(32, 'Ophtalmologie', 'طب العيون'),
(33, 'Oncologie médicale', 'علم الأورام الطبية'),
(34, 'Parasitologie', 'علم الطفيليات'),
(35, 'Pédiatrie', 'طب الأطفال'),
(36, 'Pharmacologie clinique', 'علم الصيدلة السريرية'),
(37, 'Physiologie', 'علم وظائف الأعضاء'),
(38, 'Pneumo-phtisiologie', 'طب الجهاز التنفسي'),
(39, 'Psychiatrie', 'طب الجهاز التنفسي'),
(40, 'Radiologie - Imagerie', 'الأشعة - التصوير'),
(41, 'Radiothérapie', 'العلاج الإشعاعي'),
(42, 'Rééducation fonctionnelle', 'إعادة التأهيل الوظيفي'),
(43, 'Rhumatologie', 'الروماتيزم');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `chat`
--
ALTER TABLE `chat`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `patients`
--
ALTER TABLE `patients`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
