-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 05 Mai 2017 à 18:39
-- Version du serveur :  5.6.17
-- Version de PHP :  5.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ehcgstudio`
--

-- --------------------------------------------------------

--
-- Structure de la table `q_admin`
--

CREATE TABLE IF NOT EXISTS `q_admin` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `q_admin`
--

INSERT INTO `q_admin` (`idAdmin`, `login`, `password`, `isActive`) VALUES
(1, 'ehcg', 'fd1c3ed2df439e320bbfd794ab54fa03', 1);

-- --------------------------------------------------------

--
-- Structure de la table `q_answer`
--

CREATE TABLE IF NOT EXISTS `q_answer` (
  `idAnswer` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `isTrue` tinyint(1) NOT NULL,
  `idFkQuestion` int(11) NOT NULL,
  PRIMARY KEY (`idAnswer`),
  KEY `fk_answer_question` (`idFkQuestion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=187 ;

--
-- Contenu de la table `q_answer`
--

INSERT INTO `q_answer` (`idAnswer`, `content`, `isTrue`, `idFkQuestion`) VALUES
(1, 'Ses activités sont principalement liées à l''entretien et à la production du verger', 1, 2),
(2, 'Il assure l''encadrement, l''organisation des travaux et d''encadrement du personnel', 0, 2),
(3, 'Ses activités sont principalement liées aux travaux de la vigne', 0, 2),
(4, 'Il a la responsabilité de la conduite et du suivi du troupeau laitier', 0, 3),
(5, 'Il travaille à la station et participe aux opérations de tri, de calibrage, de conditionnement et d''expédition des fruits', 1, 3),
(6, 'Ses activités sont principalement liées à l''entretien et à la production du verger', 0, 3),
(7, 'Il assure l''encadrement, l''organisation des travaux et d''encadrement du personnel', 0, 4),
(8, 'Il règle et prépare le matériel en fonction des travaux à effectuer et des données climatiques', 0, 4),
(9, 'Il prépare et met en place les cultures, réalise la protection des plantes et effectue des travaux culturaux', 1, 4),
(10, 'Il gère la production, l''organisation des travaux et l''encadrement du personnel', 1, 5),
(11, 'Ses activités sont principalement liées aux travaux de la vigne', 0, 5),
(12, 'Il travaille à la station et participe aux opérations de tri, de calibrage, de conditionnement et d''expédition des légumes', 0, 5),
(13, 'La poire Blue-Man', 0, 6),
(14, 'La pomme Pink-Lady', 1, 6),
(15, 'La myrtille Blue-Velvet', 0, 6),
(16, 'Formé aux techniques de taille, il est en charge de la taille des arbres, des soins et de l''abattage', 1, 7),
(17, 'Il intervient en création et/ou entretien des espaces verts', 0, 7),
(18, 'Il règle et prépare le matériel en fonction des travaux à effectuer et des données climatiques', 0, 7),
(19, 'Il règle et prépare le matériel en fonction des travaux à effectuer et des données climatiques', 0, 8),
(20, 'Formé aux techniques de taille, il est en charge de la taille des arbres, des soins et de l''abattage', 0, 8),
(21, 'Il intervient en création et/ou en entretien des espaces verts', 1, 8),
(22, 'Il a la responsabilité de la conduite et du suivi du troupeau laitier', 0, 9),
(23, 'Il assure les travaux préparatoires aux constructions paysagères', 1, 9),
(24, 'Il intervient en création et/ou en entretien des espaces verts', 0, 9),
(25, 'Il travaille à la station et participe aux opérations de tri, de calibrage, de conditionnement et d''expédition des légumes', 0, 10),
(26, 'Il assure les travaux préparatoires aux constructions paysagères', 0, 10),
(27, 'Il réalise les études et prépare la mise en œuvre', 1, 10),
(28, 'Il organise et supervise les travaux sur plusieurs chantiers', 1, 11),
(29, 'Il assure l''encadrement, l''organisation des travaux et d''encadrement de personnel', 0, 11),
(30, 'Ses activités sont principalement liées à l''entretien et à la production du verger', 0, 11),
(31, 'anefa-emploi.org', 1, 12),
(32, 'google.fr', 0, 12),
(33, 'anefa.org', 0, 12),
(34, 'Il assure les travaux préparatoires aux constructions paysagères', 0, 13),
(35, 'Il assure la conduite des machines agricoles et de leur équipement', 1, 13),
(36, 'Il réalise la maintenance des bâtiments d’exploitation', 0, 13),
(37, 'Il travaille dans des pépinières forestières', 0, 14),
(38, 'Il entretient les clôtures et les aires de stockage', 0, 14),
(39, 'Il assure essentiellement la réparation et le dépannage du matériel', 1, 14),
(40, 'Il organise les travaux de culture et de récolte', 1, 15),
(41, 'Il choisit l’itinéraire le mieux adapté au niveau des cavaliers', 0, 15),
(42, 'Il contribue à la préparation des sols', 0, 15),
(43, 'Il s’occupe essentiellement de l’alimentation des animaux', 1, 16),
(44, 'Il est parfois amené à ranger du bois', 0, 16),
(45, 'Il effectue l’ouverture des chantiers', 0, 16),
(46, 'Il a en charge l’alimentation des poissons', 0, 17),
(47, 'Il s’occupe d’un troupeau et apporte des  soins aux bêtes', 1, 17),
(48, 'Il dépanne les engins et équipements agricoles', 0, 17),
(49, 'Il s''occupe essentiellement des porcs', 1, 18),
(50, 'Il prépare les sols en vue des semis', 0, 18),
(51, 'Il est chargé de la gestion de l’eau', 0, 18),
(52, 'Il élague des arbres', 0, 19),
(53, 'Il apporte essentiellement des réponses aux professionnels du monde agricole.', 1, 19),
(54, 'Il assure la maintenance des machines outils', 0, 19),
(55, 'Il met en œuvre l’enseignement et procède aux évaluations', 1, 20),
(56, 'Il observe le comportement animalier', 0, 20),
(57, 'Il effectue l’ouverture des chantiers agricoles', 0, 20),
(58, 'La culture de cellules, de bactéries et de levures', 0, 21),
(59, 'De vigne et de légumes', 0, 21),
(60, 'De céréales (blé, orge, maïs,...), les oléagineux (tourne-sol, colza, soja,...) et les protéaginteux (poix, féveroles,...)', 1, 21),
(61, 'Emploi du temps agricole', 0, 22),
(62, 'Entreprises de travaux agricoles', 1, 22),
(63, 'Ecole de travaux agricoles', 0, 22),
(64, 'l''Ostréiculture', 0, 23),
(65, 'L''agriculture', 1, 23),
(66, 'La viticulture', 0, 23),
(67, 'Oui', 0, 24),
(68, 'Non, si il est agriculteur', 1, 24),
(69, 'Non, si il a le permis bateau', 0, 24),
(70, 'L''avoine', 0, 25),
(71, 'L''orge', 1, 25),
(72, 'Le riz', 0, 25),
(73, 'se sèment', 0, 26),
(74, 'se plantent', 1, 26),
(75, 'se repiquent', 0, 26),
(76, '100 m²', 0, 27),
(77, '1000 m²', 0, 27),
(78, '10000 m²', 1, 27),
(79, 'A retourner la terre', 1, 28),
(80, 'A broyer', 0, 28),
(81, 'A semer', 0, 28),
(82, 'A arroser', 0, 29),
(83, 'A traiter contre les maladies, à désherber, ...', 1, 29),
(84, 'A nettoyer le tracteur', 0, 29),
(85, 'De produire des oeufs', 0, 30),
(86, 'De produire du méthane', 0, 30),
(87, 'De produire des aliments (lait, viande, ...) et des matières premières (laine, cuir, ...)', 1, 30),
(88, 'Les volailles et les lapins sont des animaux de basse-cour', 1, 31),
(89, 'La poule pond entre 10 000 et 12 000 oeufs par an', 0, 31),
(90, 'La poule est élevée pour retirer les vers de terre des champs agricoles', 0, 31),
(91, 'La voliculture', 0, 32),
(92, 'L''aviculture', 1, 32),
(93, 'L''oviculture', 0, 32),
(94, 'De pain', 0, 33),
(95, 'D''antibiotiques', 1, 33),
(96, 'De bière', 0, 33),
(97, 'L''onglonnier', 0, 34),
(98, 'Le pareur', 1, 34),
(99, 'Le limeur', 0, 34),
(100, 'Taureau', 0, 35),
(101, 'Veau', 0, 35),
(102, 'Boeuf', 1, 35),
(103, '3 mois', 0, 36),
(104, '5 mois', 1, 36),
(105, '19 mois', 0, 36),
(106, 'La viticulture', 0, 37),
(107, 'L''huîtriculture', 0, 37),
(108, 'L''Ostréiculture', 1, 37),
(109, 'La riziculture', 0, 38),
(110, 'La mytiliculture', 1, 38),
(111, 'L''Apiculture', 0, 38),
(112, 'La vache', 0, 39),
(113, 'La chèvre', 0, 39),
(114, 'La Jument', 1, 39),
(115, 'Qu''elle boive du lait', 0, 40),
(116, 'Qu''elle donne naissance à un veau', 1, 40),
(117, 'Qu''elle mange des céréales', 0, 40),
(118, '50 à 100 litres', 1, 41),
(119, '1000 à 1500 litres', 0, 41),
(120, '3500 à 5000 litres', 0, 41),
(121, 'Pour être plus jolies', 0, 42),
(122, 'Le numéro inscrit sur la boucle est leur carte d''identité qui permet de connaître leur origine', 1, 42),
(123, 'Pour inscrire sa date de péremption', 0, 42),
(124, 'Batavia', 0, 43),
(125, 'Trévise', 0, 43),
(126, 'Romanesco', 1, 43),
(127, 'Coeur de boeuf', 0, 44),
(128, 'Roma', 0, 44),
(129, 'Belle de Pontoise', 1, 44),
(130, 'Il cultive des plantes légumières pour les vendre sur les marchés', 1, 45),
(131, 'Il étudie les marées', 0, 45),
(133, 'Un habitant de la forêt australe', 0, 46),
(134, 'Un professionnel qui plante et cultive des arbres fruitiers', 1, 46),
(135, 'Un agriculteur biologique', 0, 46),
(136, 'Il produit et vend des végétaux d''extérieur', 1, 47),
(137, 'Il extrait les pépins des fruits', 0, 47),
(138, 'Il plante des pépins de pamplemousses', 0, 47),
(139, 'Sinusoïdale', 0, 48),
(140, 'Carré', 1, 48),
(141, 'N''importe quelle forme du moment que l''arbre rentre', 0, 48),
(142, '20 %', 1, 49),
(143, '50 %', 0, 49),
(144, '175 %', 0, 49),
(145, 'Piquer les plants en pleine terre bien avant les Saints de Glace', 0, 50),
(146, 'Attendre que les Saints de Glace soient passés pour repiquer les plants en pleine terre', 1, 50),
(147, 'Piquer les plants en pleine terre au moment des Saint de Glace', 0, 50),
(148, 'Un plante vivant plus d''un an', 0, 51),
(149, 'Une plante coriace et impérissable', 0, 51),
(150, 'Une plante vivant plus de deux ans', 1, 51),
(151, 'Pour drainer', 1, 52),
(152, 'Pour favoriser la pousse des racines', 0, 52),
(153, 'Pour faire beau, bien que l''on ne les voit pas', 0, 52),
(154, 'Le conducteur d''engins en entreprise de travaux agricole réalise des travaux d''aménagement des terres destinés à l''exploitation', 0, 53),
(155, 'Le conducteur d''engins en entreprise de travaux utilise des technologies embarquées', 0, 53),
(156, 'Le conducteur d''engins en entreprise de travaux est chargé du secrétariat de l''entreprise', 1, 53),
(157, 'Il conseille et forme les agriculteurs à la comptabilité et au marketing', 0, 54),
(158, 'Il conseille et forme les agriculteurs sur la fertilisation des terres', 1, 54),
(159, 'Il a la responsabilité de la conduite et du suivi du troupeau laitier', 0, 54),
(160, 'Elle réalise des prestations pour le compte des agriculteurs (préparation des sols, élagage, débardage, drainage, ...)', 1, 55),
(161, 'Elle propose de la main d''oeuvre supplémentaire aux agriculteurs', 0, 55),
(162, 'Elle réalise des bâtiments sur les champs des agriculteurs', 0, 55),
(163, 'Directeur NCS Marketing Manager', 0, 56),
(164, 'Sexeur de poussins', 0, 56),
(165, 'Juriste', 1, 56),
(166, 'Il remplace les engins défectueux des agriculteurs', 0, 57),
(167, 'Il remplace les poules qui ne pondent pas assez d''oeufs', 0, 57),
(168, 'Il remplace les agriculteurs absents (vacances, maladie, accident)', 1, 57),
(169, 'Il aide les entreprises à structurer leurs projets', 0, 58),
(170, 'Il intervient sur les choix stratégique de l''entreprise', 0, 58),
(171, 'Il conseille les agriculteurs sur la manière de dresser les animaux', 1, 58),
(172, 'Agence de Notation des Exploitants Françaises Agricoles', 0, 59),
(173, 'Accord Nationaux pour les Exploitations et les Firmes Agricoles', 0, 59),
(174, 'Association Nationale pour l''Emploi et la Formation en Agriculture', 1, 59),
(175, 'L''ANEFA n''est pas présente sur Facebook', 1, 60),
(176, 'L''ANEFA a pour but de promouvoir l''emploi agricole', 0, 60),
(177, 'L''ANEFA a pour but de communiquer sur les métiers et les formations de l''agriculture', 0, 60),
(178, 'Bureau des exploitants', 0, 61),
(179, 'Bourse de l''emploi', 1, 61),
(180, 'Bureau des étudiants', 0, 61),
(181, 'Mettre en relation des employeurs et des demandeurs d''emploi', 1, 62),
(182, 'Subventionner les employeurs agricoles', 0, 62),
(183, 'Aider les agriculteurs dans leurs démarches juridique', 0, 62),
(184, 'Il protège les arbres contre le gibier', 0, 63),
(185, 'Il organise les opérations liées à la conduite d’un élevage', 0, 63),
(186, 'Il gère essentiellement un portefeuille clients', 1, 63);

-- --------------------------------------------------------

--
-- Structure de la table `q_question`
--

CREATE TABLE IF NOT EXISTS `q_question` (
  `idQuestion` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `idFkTheme` int(11) NOT NULL,
  PRIMARY KEY (`idQuestion`),
  KEY `fk_question_theme` (`idFkTheme`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Contenu de la table `q_question`
--

INSERT INTO `q_question` (`idQuestion`, `content`, `idFkTheme`) VALUES
(2, 'En quoi consiste le travail d''Agent Arboricole ?', 1),
(3, 'En quoi consiste le travail d''Agent de conditionnement ?', 1),
(4, 'En quoi consiste le travail d''Agent horticole ?', 1),
(5, 'En quoi consiste le travail de Chef de culture / Reponsable de serre ?', 1),
(6, 'Parmis ces 3 propositions, quelle est la variété créée en arboriculture ?', 1),
(7, 'En quoi consiste le travail d''Elagueur test?', 2),
(8, 'En quoi consiste le travail de Jardinier d''espaces verts ?', 2),
(9, 'En quoi consiste le travail de Maçon du paysage ?', 2),
(10, 'En quoi consiste le travail de Concepteur du paysage ?', 2),
(11, 'En quoi consiste le travail de Conducteur de travaux paysagers ?', 2),
(12, 'Quelle est l''adresse du site de la Bourse De l''Emploi ?', 3),
(13, 'En quoi consiste le travail de Conducteur d’engins ?', 4),
(14, 'En quoi consiste le travail de Mécanicien en exploitation agricole ?', 4),
(15, 'En quoi consiste le travail de Chef de culture ?', 4),
(16, 'En quoi consiste le métier d’Agent d’élevage porcin ?', 5),
(17, 'Quelles sont les activités du Berger ?', 5),
(18, 'En quoi consiste le métier d’éleveur porcin ?', 5),
(19, 'Quelles sont les fonctions d’un Ingénieur agro environnement?', 6),
(20, 'En quoi consiste le métier de professeur formateur ?', 6),
(21, 'De quoi sont composés les Grandes Cultures ?', 4),
(22, 'Que veut dire ETA dans le milieu agricole ?', 4),
(23, 'Quelle est la culture du sol et de l''élevage des animaux ?', 4),
(24, 'Le permis de tracteur est-il obligatoire pour un agriculteur ?', 4),
(25, 'Laquelle de ces trois céréales a une inflorescence en épi ?', 4),
(26, 'La pomme de terre (et les choux)', 4),
(27, 'Combien faut-il de m² pour faire 1 ha ?', 4),
(28, 'A quoi sert une charrue ?', 4),
(29, 'A quoi sert un pulvérisateur en agriculture ?', 4),
(30, 'Quel est le but de l''élevage de gros animaux ?', 5),
(31, 'Parmis ces 3 propositions, laquelle est correcte ?', 5),
(32, 'Comment s''appelle l''élevage des volailles (poule, poulet, ...) ?', 5),
(33, 'Le maïs est utilisé comme alimentation animale mais aussi en industrie pour la fabrication ...', 5),
(34, 'Quel est le métier de la personne qui lime les onglons des bovins ?', 5),
(35, 'Comment appelle t''on un bovin castré ?', 5),
(36, 'Combien de mois dure la gestation d''une brebis ?', 5),
(37, 'Comment s''appelle la culture de l''huître ?', 5),
(38, 'Comment s''appelle la culture des moules ?', 5),
(39, 'Un de ces trois animaux domestiques n''est pas un ruminant. A votre avis il s''agit de :', 5),
(40, 'Que faut-il pour qu''une vache produise du lait ?', 5),
(41, 'Combien de litres d''eau une vache boit-elle par jour ?', 5),
(42, 'Pourquoi les vaches portent-elles une boucle à l''oreille ?', 5),
(43, 'Laquelle de ces variétés n''est pas une salade ?', 1),
(44, 'Quelle proposition ne correspond pas à une variété de tomates ?', 1),
(45, 'Que fait le Maraîcher ?', 1),
(46, 'Qu''est ce qu''un Arboriculteur ?', 1),
(47, 'Que fait un Pépiniériste ?', 1),
(48, 'Quelle forme devons-nous donner à notre trou pour planter un arbre ?', 2),
(49, 'Quel est le taux de féminisation dans le secteur végétal ?', 2),
(50, 'Selon le dicton des Saints de Glace, il faut :', 2),
(51, 'Qu''est ce qu''une plante vivace ?', 2),
(52, 'Pourquoi met-on des billes d''argile au fond des pots de fleurs ?', 2),
(53, 'Parmis ces 3 propositions, laquelle est fausse ?', 6),
(54, 'Quelle est la fonction du Technicien agro-environnement ?', 6),
(55, 'En quoi consiste les entreprises de travaux et services à l''agriculture ?', 6),
(56, 'Parmi ces métiers, lequel peut être proposé en tant que services aux agriculteurs ?', 6),
(57, 'En quoi consiste le métier d''Agent de remplacement ?', 6),
(58, 'Parmi ces fonctions, laquelle n''existe pas pour le métier de Conseiller de gestion ?', 6),
(59, 'Que veut dire ANEFA ?', 3),
(60, 'Parmi ces 3 propositions, laquelle est fausse ?', 3),
(61, 'Qu''est ce que le BDE de l''ANEFA ?', 3),
(62, 'En quoi consiste la Bourse de l''emploi (BDE) de l''ANEFA ?', 3),
(63, 'Quelles sont les activités du conseiller clientèle ?', 6);

-- --------------------------------------------------------

--
-- Structure de la table `q_response`
--

CREATE TABLE IF NOT EXISTS `q_response` (
  `idResponse` int(11) NOT NULL AUTO_INCREMENT,
  `idFkTest` int(11) NOT NULL,
  `idFkQuestion` int(11) NOT NULL,
  `idFkAnswer` int(11) DEFAULT NULL,
  `isTrue` tinyint(1) NOT NULL,
  PRIMARY KEY (`idResponse`),
  KEY `fk_response_question` (`idFkQuestion`),
  KEY `fk_response_answer` (`idFkAnswer`),
  KEY `fk_response_test` (`idFkTest`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=357 ;

-- --------------------------------------------------------

--
-- Structure de la table `q_test`
--

CREATE TABLE IF NOT EXISTS `q_test` (
  `idTest` int(11) NOT NULL AUTO_INCREMENT,
  `creationDate` datetime NOT NULL,
  `score` varchar(45) NOT NULL,
  `result` varchar(45) NOT NULL,
  `idFkUser` int(11) NOT NULL,
  PRIMARY KEY (`idTest`),
  KEY `fk_test_user` (`idFkUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

-- --------------------------------------------------------

--
-- Structure de la table `q_theme`
--

CREATE TABLE IF NOT EXISTS `q_theme` (
  `idTheme` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `nbQuestion` int(11) NOT NULL,
  `imgPath` varchar(255) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`idTheme`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `q_theme`
--

INSERT INTO `q_theme` (`idTheme`, `name`, `nbQuestion`, `imgPath`, `isActive`) VALUES
(1, 'culture_specialisees', 1, 'img/culture_specialisees.png', 1),
(2, 'paysage_jardins', 1, 'img/paysage_jardins.png', 1),
(3, 'bde_anefa', 1, 'img/bde_anefa.png', 1),
(4, 'grandes_cultures', 1, 'img/grandes_cultures.png', 1),
(5, 'elevage', 1, 'img/elevage.png', 1),
(6, 'service_agriculture', 1, 'img/service_agriculture.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `q_user`
--

CREATE TABLE IF NOT EXISTS `q_user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `registerDate` datetime NOT NULL,
  `idFkAdmin` int(11) NOT NULL,
  PRIMARY KEY (`idUser`),
  KEY `fk_user_admin` (`idFkAdmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Structure de la table `tb_qcm`
--

CREATE TABLE IF NOT EXISTS `tb_qcm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theme` varchar(20) DEFAULT NULL,
  `question` varchar(94) DEFAULT NULL,
  `reponse_1` varchar(127) DEFAULT NULL,
  `reponse_1_v` varchar(5) DEFAULT NULL,
  `reponse_2` varchar(121) DEFAULT NULL,
  `reponse_2_v` varchar(5) DEFAULT NULL,
  `reponse_3` varchar(122) DEFAULT NULL,
  `reponse_3_v` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Contenu de la table `tb_qcm`
--

INSERT INTO `tb_qcm` (`id`, `theme`, `question`, `reponse_1`, `reponse_1_v`, `reponse_2`, `reponse_2_v`, `reponse_3`, `reponse_3_v`) VALUES
(2, 'culture_specialisees', 'En quoi consiste le travail d''Agent Arboricole ?', 'Ses activités sont principalement liées à l''entretien et à la production du verger', 'true', 'Il assure l''encadrement, l''organisation des travaux et d''encadrement du personnel', 'false', 'Ses activités sont principalement liées aux travaux de la vigne', 'false'),
(3, 'culture_specialisees', 'En quoi consiste le travail d''Agent de conditionnement ?', 'Il a la responsabilité de la conduite et du suivi du troupeau laitier', 'false', 'Il travaille à la station et participe aux opérations de tri, de calibrage, de conditionnement et d''expédition des fruits', 'true', 'Ses activités sont principalement liées à l''entretien et à la production du verger', 'false'),
(4, 'culture_specialisees', 'En quoi consiste le travail d''Agent horticole ?', 'Il assure l''encadrement, l''organisation des travaux et d''encadrement du personnel', 'false', 'Il règle et prépare le matériel en fonction des travaux à effectuer et des données climatiques', 'false', 'Il prépare et met en place les cultures, réalise la protection des plantes et effectue des travaux culturaux', 'true'),
(5, 'culture_specialisees', 'En quoi consiste le travail de Chef de culture / Reponsable de serre ?', 'Il gère la production, l''organisation des travaux et l''encadrement du personnel', 'true', 'Ses activités sont principalement liées aux travaux de la vigne', 'false', 'Il travaille à la station et participe aux opérations de tri, de calibrage, de conditionnement et d''expédition des légumes', 'false'),
(6, 'culture_specialisees', 'Parmis ces 3 propositions, quelle est la variété créée en arboriculture ?', 'La poire Blue-Man', 'false', 'La pomme Pink-Lady', 'true', 'La myrtille Blue-Velvet', 'false'),
(7, 'paysage_jardins', 'En quoi consiste le travail d''Elagueur test?', 'Formé aux techniques de taille, il est en charge de la taille des arbres, des soins et de l''abattage', 'true', 'Il intervient en création et/ou entretien des espaces verts', 'false', 'Il règle et prépare le matériel en fonction des travaux à effectuer et des données climatiques', 'false'),
(8, 'paysage_jardins', 'En quoi consiste le travail de Jardinier d''espaces verts ?', 'Il règle et prépare le matériel en fonction des travaux à effectuer et des données climatiques', 'false', 'Formé aux techniques de taille, il est en charge de la taille des arbres, des soins et de l''abattage', 'false', 'Il intervient en création et/ou en entretien des espaces verts', 'true'),
(9, 'paysage_jardins', 'En quoi consiste le travail de Maçon du paysage ?', 'Il a la responsabilité de la conduite et du suivi du troupeau laitier', 'false', 'Il assure les travaux préparatoires aux constructions paysagères', 'true', 'Il intervient en création et/ou en entretien des espaces verts', 'false'),
(10, 'paysage_jardins', 'En quoi consiste le travail de Concepteur du paysage ?', 'Il travaille à la station et participe aux opérations de tri, de calibrage, de conditionnement et d''expédition des légumes', 'false', 'Il assure les travaux préparatoires aux constructions paysagères', 'false', 'Il réalise les études et prépare la mise en œuvre', 'true'),
(11, 'paysage_jardins', 'En quoi consiste le travail de Conducteur de travaux paysagers ?', 'Il organise et supervise les travaux sur plusieurs chantiers', 'true', 'Il assure l''encadrement, l''organisation des travaux et d''encadrement de personnel', 'false', 'Ses activités sont principalement liées à l''entretien et à la production du verger', 'false'),
(12, 'bde_anefa', 'Quelle est l''adresse du site de la Bourse De l''Emploi ?', 'anefa-emploi.org', 'true', 'google.fr', 'false', 'anefa.org', 'false'),
(13, 'grandes_cultures', 'En quoi consiste le travail de Conducteur d’engins ?', 'Il assure les travaux préparatoires aux constructions paysagères', 'false', 'Il assure la conduite des machines agricoles et de leur équipement', 'true', 'Il réalise la maintenance des bâtiments d’exploitation', 'false'),
(14, 'grandes_cultures', 'En quoi consiste le travail de Mécanicien en exploitation agricole ?', 'Il travaille dans des pépinières forestières', 'false', 'Il entretient les clôtures et les aires de stockage', 'false', 'Il assure essentiellement la réparation et le dépannage du matériel', 'true'),
(15, 'grandes_cultures', 'En quoi consiste le travail de Chef de culture ?', 'Il organise les travaux de culture et de récolte', 'true', 'Il choisit l’itinéraire le mieux adapté au niveau des cavaliers', 'false', 'Il contribue à la préparation des sols', 'false'),
(16, 'elevage', 'En quoi consiste le métier d’Agent d’élevage porcin ?', 'Il s’occupe essentiellement de l’alimentation des animaux', 'true', 'Il est parfois amené à ranger du bois', 'false', 'Il effectue l’ouverture des chantiers', 'false'),
(17, 'elevage', 'Quelles sont les activités du Berger ?', 'Il a en charge l’alimentation des poissons', 'false', 'Il s’occupe d’un troupeau et apporte des  soins aux bêtes', 'true', 'Il dépanne les engins et équipements agricoles', 'false'),
(18, 'elevage', 'En quoi consiste le métier d’éleveur porcin ?', 'Il s''occupe essentiellement des porcs', 'true', 'Il prépare les sols en vue des semis', 'false', 'Il est chargé de la gestion de l’eau', 'false'),
(19, 'service_agriculture', 'Quelles sont les fonctions d’un Ingénieur agro environnement?', 'Il élague des arbres', 'false', 'Il apporte essentiellement des réponses aux professionnels du monde agricole.', 'true', 'Il assure la maintenance des machines outils', 'false'),
(20, 'service_agriculture', 'En quoi consiste le métier de professeur formateur ?', 'Il met en œuvre l’enseignement et procède aux évaluations', 'true', 'Il observe le comportement animalier', 'false', 'Il effectue l’ouverture des chantiers agricoles', 'false'),
(21, 'grandes_cultures', 'De quoi sont composés les Grandes Cultures ?', 'La culture de cellules, de bactéries et de levures', 'false', 'De vigne et de légumes', 'false', 'De céréales (blé, orge, maïs,...), les oléagineux (tourne-sol, colza, soja,...) et les protéaginteux (poix, féveroles,...)', 'true'),
(22, 'grandes_cultures', 'Que veut dire ETA dans le milieu agricole ?', 'Emploi du temps agricole', 'false', 'Entreprises de travaux agricoles', 'true', 'Ecole de travaux agricoles', 'false'),
(23, 'grandes_cultures', 'Quelle est la culture du sol et de l''élevage des animaux ?', 'l''Ostréiculture', 'false', 'L''agriculture', 'true', 'La viticulture', 'false'),
(24, 'grandes_cultures', 'Le permis de tracteur est-il obligatoire pour un agriculteur ?', 'Oui', 'false', 'Non, si il est agriculteur', 'true', 'Non, si il a le permis bateau', 'false'),
(25, 'grandes_cultures', 'Laquelle de ces trois céréales a une inflorescence en épi ?', 'L''avoine', 'false', 'L''orge', 'true', 'Le riz', 'false'),
(26, 'grandes_cultures', 'La pomme de terre (et les choux)', 'se sèment', 'false', 'se plantent', 'true', 'se repiquent', 'false'),
(27, 'grandes_cultures', 'Combien faut-il de m² pour faire 1 ha ?', '100 m²', 'false', '1000 m²', 'false', '10000 m²', 'true'),
(28, 'grandes_cultures', 'A quoi sert une charrue ?', 'A retourner la terre', 'true', 'A broyer', 'false', 'A semer', 'false'),
(29, 'grandes_cultures', 'A quoi sert un pulvérisateur en agriculture ?', 'A arroser', 'false', 'A traiter contre les maladies, à désherber, ...', 'true', 'A nettoyer le tracteur', 'false'),
(30, 'elevage', 'Quel est le but de l''élevage de gros animaux ?', 'De produire des oeufs', 'false', 'De produire du méthane', 'false', 'De produire des aliments (lait, viande, ...) et des matières premières (laine, cuir, ...)', 'true'),
(31, 'elevage', 'Parmis ces 3 propositions, laquelle est correcte ?', 'Les volailles et les lapins sont des animaux de basse-cour', 'true', 'La poule pond entre 10 000 et 12 000 oeufs par an', 'false', 'La poule est élevée pour retirer les vers de terre des champs agricoles', 'false'),
(32, 'elevage', 'Comment s''appelle l''élevage des volailles (poule, poulet, ...) ?', 'La voliculture', 'false', 'L''aviculture', 'true', 'L''oviculture', 'false'),
(33, 'elevage', 'Le maïs est utilisé comme alimentation animale mais aussi en industrie pour la fabrication ...', 'De pain', 'false', 'D''antibiotiques', 'true', 'De bière', 'false'),
(34, 'elevage', 'Quel est le métier de la personne qui lime les onglons des bovins ?', 'L''onglonnier', 'false', 'Le pareur', 'true', 'Le limeur', 'false'),
(35, 'elevage', 'Comment appelle t''on un bovin castré ?', 'Taureau', 'false', 'Veau', 'false', 'Boeuf', 'true'),
(36, 'elevage', 'Combien de mois dure la gestation d''une brebis ?', '3 mois', 'false', '5 mois', 'true', '19 mois', 'false'),
(37, 'elevage', 'Comment s''appelle la culture de l''huître ?', 'La viticulture', 'false', 'L''huîtriculture', 'false', 'L''Ostréiculture', 'true'),
(38, 'elevage', 'Comment s''appelle la culture des moules ?', 'La riziculture', 'false', 'La mytiliculture', 'true', 'L''Apiculture', 'false'),
(39, 'elevage', 'Un de ces trois animaux domestiques n''est pas un ruminant. A votre avis il s''agit de :', 'La vache', 'false', 'La chèvre', 'false', 'La Jument', 'true'),
(40, 'elevage', 'Que faut-il pour qu''une vache produise du lait ?', 'Qu''elle boive du lait', 'false', 'Qu''elle donne naissance à un veau', 'true', 'Qu''elle mange des céréales', 'false'),
(41, 'elevage', 'Combien de litres d''eau une vache boit-elle par jour ?', '50 à 100 litres', 'true', '1000 à 1500 litres', 'false', '3500 à 5000 litres', 'false'),
(42, 'elevage', 'Pourquoi les vaches portent-elles une boucle à l''oreille ?', 'Pour être plus jolies', 'false', 'Le numéro inscrit sur la boucle est leur carte d''identité qui permet de connaître leur origine', 'true', 'Pour inscrire sa date de péremption', 'false'),
(43, 'culture_specialisees', 'Laquelle de ces variétés n''est pas une salade ?', 'Batavia', 'false', 'Trévise', 'false', 'Romanesco', 'true'),
(44, 'culture_specialisees', 'Quelle proposition ne correspond pas à une variété de tomates ?', 'Coeur de boeuf', 'false', 'Roma', 'false', 'Belle de Pontoise', 'true'),
(45, 'culture_specialisees', 'Que fait le Maraîcher ?', 'Il cultive des plantes légumières pour les vendre sur les marchés', 'true', 'Il étudie les marées', 'false', 'Il produit des fraises "Mara des bois"', 'false'),
(46, 'culture_specialisees', 'Qu''est ce qu''un Arboriculteur ?', 'Un habitant de la forêt australe', 'false', 'Un professionnel qui plante et cultive des arbres fruitiers', 'true', 'Un agriculteur biologique', 'false'),
(47, 'culture_specialisees', 'Que fait un Pépiniériste ?', 'Il produit et vend des végétaux d''extérieur', 'true', 'Il extrait les pépins des fruits', 'false', 'Il plante des pépins de pamplemousses', 'false'),
(48, 'paysage_jardins', 'Quelle forme devons-nous donner à notre trou pour planter un arbre ?', 'Sinusoïdale', 'false', 'Carré', 'true', 'N''importe quelle forme du moment que l''arbre rentre', 'false'),
(49, 'paysage_jardins', 'Quel est le taux de féminisation dans le secteur végétal ?', '20 %', 'true', '50 %', 'false', '175 %', 'false'),
(50, 'paysage_jardins', 'Selon le dicton des Saints de Glace, il faut :', 'Piquer les plants en pleine terre bien avant les Saints de Glace', 'false', 'Attendre que les Saints de Glace soient passés pour repiquer les plants en pleine terre', 'true', 'Piquer les plants en pleine terre au moment des Saint de Glace', 'false'),
(51, 'paysage_jardins', 'Qu''est ce qu''une plante vivace ?', 'Un plante vivant plus d''un an', 'false', 'Une plante coriace et impérissable', 'false', 'Une plante vivant plus de deux ans', 'true'),
(52, 'paysage_jardins', 'Pourquoi met-on des billes d''argile au fond des pots de fleurs ?', 'Pour drainer', 'true', 'Pour favoriser la pousse des racines', 'false', 'Pour faire beau, bien que l''on ne les voit pas', 'false'),
(53, 'service_agriculture', 'Parmis ces 3 propositions, laquelle est fausse ?', 'Le conducteur d''engins en entreprise de travaux agricole réalise des travaux d''aménagement des terres destinés à l''exploitation', 'false', 'Le conducteur d''engins en entreprise de travaux utilise des technologies embarquées', 'false', 'Le conducteur d''engins en entreprise de travaux est chargé du secrétariat de l''entreprise', 'true'),
(54, 'service_agriculture', 'Quelle est la fonction du Technicien agro-environnement ?', 'Il conseille et forme les agriculteurs à la comptabilité et au marketing', 'false', 'Il conseille et forme les agriculteurs sur la fertilisation des terres', 'true', 'Il a la responsabilité de la conduite et du suivi du troupeau laitier', 'false'),
(55, 'service_agriculture', 'En quoi consiste les entreprises de travaux et services à l''agriculture ?', 'Elle réalise des prestations pour le compte des agriculteurs (préparation des sols, élagage, débardage, drainage, ...)', 'true', 'Elle propose de la main d''oeuvre supplémentaire aux agriculteurs', 'false', 'Elle réalise des bâtiments sur les champs des agriculteurs', 'false'),
(56, 'service_agriculture', 'Parmi ces métiers, lequel peut être proposé en tant que services aux agriculteurs ?', 'Directeur NCS Marketing Manager', 'false', 'Sexeur de poussins', 'false', 'Juriste', 'true'),
(57, 'service_agriculture', 'En quoi consiste le métier d''Agent de remplacement ?', 'Il remplace les engins défectueux des agriculteurs', 'false', 'Il remplace les poules qui ne pondent pas assez d''oeufs', 'false', 'Il remplace les agriculteurs absents (vacances, maladie, accident)', 'true'),
(58, 'service_agriculture', 'Parmi ces fonctions, laquelle n''existe pas pour le métier de Conseiller de gestion ?', 'Il aide les entreprises à structurer leurs projets', 'false', 'Il intervient sur les choix stratégique de l''entreprise', 'false', 'Il conseille les agriculteurs sur la manière de dresser les animaux', 'true'),
(59, 'bde_anefa', 'Que veut dire ANEFA ?', 'Agence de Notation des Exploitants Françaises Agricoles', 'false', 'Accord Nationaux pour les Exploitations et les Firmes Agricoles', 'false', 'Association Nationale pour l''Emploi et la Formation en Agriculture', 'true'),
(60, 'bde_anefa', 'Parmi ces 3 propositions, laquelle est fausse ?', 'L''ANEFA n''est pas présente sur Facebook', 'true', 'L''ANEFA a pour but de promouvoir l''emploi agricole', 'false', 'L''ANEFA a pour but de communiquer sur les métiers et les formations de l''agriculture', 'false'),
(61, 'bde_anefa', 'Qu''est ce que le BDE de l''ANEFA ?', 'Bureau des exploitants', 'false', 'Bourse de l''emploi', 'true', 'Bureau des étudiants', 'false'),
(62, 'bde_anefa', 'En quoi consiste la Bourse de l''emploi (BDE) de l''ANEFA ?', 'Mettre en relation des employeurs et des demandeurs d''emploi', 'true', 'Subventionner les employeurs agricoles', 'false', 'Aider les agriculteurs dans leurs démarches juridique', 'false'),
(63, 'service_agriculture', 'Quelles sont les activités du conseiller clientèle ?', 'Il protège les arbres contre le gibier', 'false', 'Il organise les opérations liées à la conduite d’un élevage', 'false', 'Il gère essentiellement un portefeuille clients', 'true');

-- --------------------------------------------------------

--
-- Structure de la table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` text NOT NULL,
  `nom` text NOT NULL,
  `email` text NOT NULL,
  `q1` int(11) NOT NULL,
  `r1` text NOT NULL,
  `t1` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `r2` text NOT NULL,
  `t2` int(11) NOT NULL,
  `q3` int(11) NOT NULL,
  `r3` text NOT NULL,
  `t3` int(11) NOT NULL,
  `q4` int(11) NOT NULL,
  `r4` text NOT NULL,
  `t4` int(11) NOT NULL,
  `q5` int(11) NOT NULL,
  `r5` text NOT NULL,
  `t5` int(11) NOT NULL,
  `q6` int(11) NOT NULL,
  `r6` text NOT NULL,
  `t6` int(11) NOT NULL,
  `worl` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Contenu de la table `tb_user`
--

INSERT INTO `tb_user` (`id`, `prenom`, `nom`, `email`, `q1`, `r1`, `t1`, `q2`, `r2`, `t2`, `q3`, `r3`, `t3`, `q4`, `r4`, `t4`, `q5`, `r5`, `t5`, `q6`, `r6`, `t6`, `worl`) VALUES
(1, 'Guillaume', 'SENESCHAL', '', 21, 'true', 9, 19, 'true', 21, 26, 'true', 16, 28, 'true', 13, 31, 'true', 16, 36, 'true', 15, 'win'),
(2, 'Charlotte', 'Duyck', '', 21, 'true', 17, 16, 'true', 11, 26, 'true', 14, 30, 'true', 11, 31, 'true', 7, 35, 'false', 11, 'win'),
(3, 'Guillaume', 'SENESCHAL', '', 21, 'true', 16, 20, 'false', 30, 25, 'false', 30, 28, 'true', 27, 33, 'true', 6, 36, 'true', 24, 'win'),
(4, 'caroline', 'bonczyk', '', 21, 'true', 6, 20, 'true', 19, 24, 'true', 21, 29, 'false', 6, 31, 'true', 8, 35, 'false', 5, 'win'),
(5, 'Elise', 'Letellier', 'vfarreyrol@clonor.com', 21, 'true', 8, 19, 'false', 30, 24, 'false', 30, 29, 'false', 30, 33, 'false', 30, 35, 'false', 30, 'loose'),
(6, 'Frédéric ', 'VERMERSCH', '', 21, 'true', 16, 16, 'true', 12, 26, 'true', 13, 28, 'true', 18, 32, 'true', 10, 34, 'true', 16, 'win'),
(7, 'SENESCHAL', 'Guillaume', '', 21, 'true', 22, 19, 'true', 16, 24, 'true', 22, 30, 'true', 4, 31, 'true', 13, 34, 'false', 30, 'win'),
(8, 'Guillaume', 'SENESCHAL', '', 21, 'true', 5, 18, 'false', 30, 22, 'true', 12, 29, 'false', 14, 33, 'true', 13, 35, 'false', 9, 'win'),
(9, 'Vincent', 'Letellier', 'vfarreyrol@clonor.com', 21, 'false', 2, 18, 'false', 30, 22, 'false', 30, 28, 'false', 30, 31, 'false', 30, 34, 'false', 30, 'loose'),
(10, 'Vincent', 'Nord', 'vfarreyrol@clonor.com', 21, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, ''),
(11, 'Elise', 'Letellier', '', 21, 'false', 2, 19, 'false', 1, 26, 'true', 1, 29, 'false', 1, 31, 'false', 30, 34, 'false', 30, 'loose'),
(12, 'Vincent', 'Nord', 'vfarreyrol@clonor.com', 21, 'true', 1, 16, 'true', 1, 24, 'false', 30, 28, 'false', 30, 31, 'false', 30, 36, 'false', 30, 'loose'),
(13, 'Vincent', 'Letellier', 'vfarreyrol@clonor.com', 21, 'false', 2, 17, 'false', 30, 25, 'false', 30, 30, 'false', 30, 33, 'false', 30, 35, 'false', 2, 'loose'),
(14, 'qsdqsdq', 'qsdqsdqsd', '', 21, 'false', 2, 16, 'false', 5, 25, 'false', 7, 28, 'true', 5, 31, 'true', 5, 35, 'false', 2, 'loose'),
(15, 'Ben', 'Ben', '', 61, 'true', 5, 43, 'true', 16, 48, 'false', 4, 25, 'true', 3, 38, 'true', 4, 57, 'true', 2, 'win'),
(16, 'qd', 'qq', '', 12, 'true', 3, 44, 'true', 2, 48, 'true', 3, 27, 'true', 2, 18, 'true', 5, 58, 'false', 4, 'win'),
(17, 'Bruno', 'LEBLANC', 'bruno@adviser.tm.fr', 62, 'true', 8, 46, 'true', 7, 48, 'false', 9, 25, 'false', 8, 16, 'true', 11, 63, 'false', 30, 'win'),
(18, 'Olivier', 'Varé', 'o.vare@laposte.net', 59, 'true', 18, 45, 'true', 10, 48, 'true', 22, 24, 'true', 12, 38, 'true', 8, 56, 'true', 13, 'win'),
(19, 'olivier', 'Varé', 'o.varel@laposteische.net', 59, 'false', 9, 47, 'true', 13, 52, 'true', 10, 28, 'true', 5, 42, 'true', 10, 19, 'true', 14, 'win'),
(20, 'olivier', 'varé', 'olivier@adviser.tm.fr', 12, 'false', 30, 5, 'false', 30, 7, 'false', 30, 23, 'false', 30, 42, 'false', 30, 54, 'false', 30, 'loose'),
(21, 'QSD', 'SQDQ', '', 59, 'true', 1, 2, 'false', 2, 9, 'false', 1, 15, 'false', 4, 33, 'true', 4, 53, 'true', 8, 'win'),
(22, 'xddd', 'xxx', '', 59, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, ''),
(23, 'xddd', 'xxx', '', 12, 'false', 30, 3, 'false', 30, 49, 'false', 30, 24, 'false', 30, 33, 'false', 30, 57, 'false', 30, 'loose'),
(24, 'jj', 'jgj', '', 12, 'false', 7, 46, 'true', 8, 8, 'false', 30, 25, 'false', 30, 33, 'false', 30, 56, 'false', 30, 'loose'),
(25, 'hhh', 'ahhh', '', 62, 'false', 30, 45, 'true', 15, 48, 'true', 21, 14, 'true', 15, 17, 'false', 30, 56, 'false', 30, 'win'),
(26, 'ddd', 'ddd', '', 59, 'false', 30, 2, 'false', 24, 9, 'true', 27, 25, 'true', 22, 31, 'true', 21, 20, 'false', 30, 'win'),
(27, 'qsdqs', 'qsdqsd', 'qsdqsd@qsds.qsd', 61, 'true', 3, 66, 'true', 5, 49, 'false', 2, 24, 'false', 1, 42, 'false', 30, 53, 'false', 2, 'loose'),
(28, 'ben', 'ben', 'ben@ben.ben', 12, 'false', 3, 43, 'true', 1, 49, 'true', 2, 28, 'false', 1, 42, 'false', 1, 53, 'true', 1, 'win'),
(29, 'Hassan', 'AYARI', 'hayari@ehcg.fr', 60, 'false', 18, 66, 'false', 6, 51, 'false', 9, 13, 'true', 9, 31, 'false', 20, 20, 'true', 7, 'loose'),
(30, 'aa', 'aa', 'aa@aa.fr', 61, 'false', 11, 47, 'false', 2, 10, 'false', 4, 15, 'false', 2, 40, 'false', 1, 53, 'true', 1, 'loose'),
(31, 'AA', 'BB', 'AB@AB.FR', 60, 'false', 30, 4, 'false', 15, 52, 'false', 2, 24, 'true', 3, 39, 'false', 3, 19, 'true', 3, 'loose'),
(32, 'ad', 'eryt', 'aa@aa.fr', 62, 'false', 30, 4, 'false', 30, 48, 'false', 30, 28, 'false', 30, 30, 'false', 30, 54, 'false', 30, 'loose'),
(33, 'justine', 'RICHEZ', 'jrichez@fdsea59.fr', 61, 'true', 16, 46, 'true', 19, 9, 'true', 22, 15, 'true', 22, 39, 'true', 17, 20, 'true', 21, 'win'),
(34, 'justine', 'richez', '', 61, 'true', 4, 45, 'true', 5, 9, 'true', 8, 27, 'false', 21, 32, 'true', 23, 19, 'false', 30, 'win'),
(35, 'marie ', 'vagniez', '', 62, 'false', 3, 2, 'false', 5, 51, 'false', 3, 23, 'false', 2, 30, 'false', 2, 55, 'true', 6, 'loose'),
(36, 'Hassan', 'AYARI', 'hayari@ehcg.fr', 61, 'false', 19, 46, 'false', 16, 11, 'true', 3, 26, 'false', 4, 16, 'true', 2, 58, 'false', 4, 'loose'),
(37, 'Hassan', 'Ayari', 'hayari@ehcg.fr', 12, 'false', 30, 43, 'false', 19, 10, 'false', 3, 15, 'true', 13, 42, 'false', 30, 53, 'false', 19, 'loose'),
(38, 'aaa', 'aaa', 'aaa@aaa.de', 12, 'true', 11, 2, 'true', 10, 9, 'false', 7, 14, 'true', 9, 34, 'false', 11, 57, 'true', 10, 'win');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `q_answer`
--
ALTER TABLE `q_answer`
  ADD CONSTRAINT `fk_answer_question` FOREIGN KEY (`idFkQuestion`) REFERENCES `q_question` (`idQuestion`);

--
-- Contraintes pour la table `q_question`
--
ALTER TABLE `q_question`
  ADD CONSTRAINT `fk_question_theme` FOREIGN KEY (`idFkTheme`) REFERENCES `q_theme` (`idTheme`);

--
-- Contraintes pour la table `q_response`
--
ALTER TABLE `q_response`
  ADD CONSTRAINT `fk_response_test` FOREIGN KEY (`idFkTest`) REFERENCES `q_test` (`idTest`),
  ADD CONSTRAINT `fk_response_answer` FOREIGN KEY (`idFkAnswer`) REFERENCES `q_answer` (`idAnswer`),
  ADD CONSTRAINT `fk_response_question` FOREIGN KEY (`idFkQuestion`) REFERENCES `q_question` (`idQuestion`);

--
-- Contraintes pour la table `q_test`
--
ALTER TABLE `q_test`
  ADD CONSTRAINT `fk_test_user` FOREIGN KEY (`idFkUser`) REFERENCES `q_user` (`idUser`);

--
-- Contraintes pour la table `q_user`
--
ALTER TABLE `q_user`
  ADD CONSTRAINT `fk_user_admin` FOREIGN KEY (`idFkAdmin`) REFERENCES `q_admin` (`idAdmin`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
