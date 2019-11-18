-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 18 nov. 2019 à 02:46
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `webproject`
--
CREATE DATABASE IF NOT EXISTS `webproject` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `webproject`;

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `ajout_commande`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ajout_commande` (IN `id_p` INT, IN `id_u` INT, IN `quantité` INT)  INSERT INTO purchase
VALUES (id_u,id_p,quantité)$$

DROP PROCEDURE IF EXISTS `ajout_panier`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ajout_panier` (IN `id_p` INT, IN `id_u` INT)  UPDATE user 
SET cart = CONCAT((CONCAT(cart,":")) ,id_p)
WHERE id=id_u$$

DROP PROCEDURE IF EXISTS `best_produit`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `best_produit` ()  SELECT goodies_id,goodies_photo FROM goodies ORDER BY order_number DESC$$

DROP PROCEDURE IF EXISTS `categorie`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `categorie` (IN `prix_min` INT, IN `prix_max` INT)  SELECT goodies_category 
FROM goodies 
WHERE goodies_cost<=prix_max AND prix_min<=goodies_cost AND goodies_in_stock>0
GROUP BY goodies_category$$

DROP PROCEDURE IF EXISTS `controle_prix`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `controle_prix` (IN `prix_min` INT, IN `prix_max` INT)  SELECT * FROM (
    SELECT goodies_id,goodies_name,goodies_photo,goodies_cost,goodies_category 
    FROM goodies 
    WHERE goodies_in_stock>0)
    AS info_goodies
WHERE goodies_cost<=prix_max AND prix_min<=goodies_cost$$

DROP PROCEDURE IF EXISTS `delete_heart`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_heart` (IN `$picture_id` INT, IN `$id` INT)  DELETE FROM `commentary` where picture_id=`$picture_id` AND id=`$id` AND likes='1'$$

DROP PROCEDURE IF EXISTS `info_goodies`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `info_goodies` (IN `id` INT)  SELECT goodies_name,goodies_photo,goodies_cost,goodies_category,goodies_description FROM goodies WHERE goodies_id=id$$

DROP PROCEDURE IF EXISTS `info_panier`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `info_panier` (IN `user_id` INT)  SELECT cart FROM user WHERE id=user_id$$

DROP PROCEDURE IF EXISTS `insert_comment`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_comment` (IN `$id` INT, IN `$name` INT, IN `$picture_description` TEXT)  INSERT INTO `commentary` (commentary_id, id, picture_id,comment, likes)values(NULL,`$id`,`$name`,`$picture_description`,NULL)$$

DROP PROCEDURE IF EXISTS `insert_heart`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_heart` (IN `$id` INT, IN `$picture_id` INT)  INSERT INTO commentary (commentary_id, id, picture_id, comment, likes) VALUES(NULL,`$id`,`$picture_id`,NULL,'1')$$

DROP PROCEDURE IF EXISTS `list_activity`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `list_activity` ()  SELECT * FROM activity$$

DROP PROCEDURE IF EXISTS `list_produit_présent`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `list_produit_présent` ()  SELECT goodies_id,goodies_name,goodies_photo,goodies_cost,goodies_category FROM goodies WHERE goodies_in_stock>0$$

DROP PROCEDURE IF EXISTS `picture_id`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `picture_id` (IN `$id` INT)  SELECT picture_id FROM ` commentary` WHERE  id=`$id`$$

DROP PROCEDURE IF EXISTS `redirect_name_id`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `redirect_name_id` (IN `name` VARCHAR(200))  SELECT goodies_id FROM goodies WHERE goodies_name=name$$

DROP PROCEDURE IF EXISTS `select_comment`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `select_comment` (IN `$name` TEXT)  SELECT commentary.comment, user.first_name, user.last_name FROM `commentary`,`user` WHERE picture_id=$name AND user.id=commentary.id$$

DROP PROCEDURE IF EXISTS `select_goodies_id_name`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `select_goodies_id_name` ()  SELECT goodies_id,goodies_name FROM goodies$$

DROP PROCEDURE IF EXISTS `select_I`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `select_I` (IN `$email` TEXT)  SELECT id FROM `user` WHERE email = `$email`$$

DROP PROCEDURE IF EXISTS `select_id`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `select_id` (IN `$email` TEXT)  SELECT id FROM `user` WHERE email =`$email`$$

DROP PROCEDURE IF EXISTS `select_likes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `select_likes` (IN `$id` INT, IN `$picture_id` INT)  SELECT likes FROM `commentary` WHERE id=`$id` AND picture_id=`$picture_id`$$

DROP PROCEDURE IF EXISTS `select_likes2`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `select_likes2` (IN `$id` INT, IN `$name` INT)  SELECT likes FROM `commentary` WHERE id=`$id` AND picture_id=`$name`$$

DROP PROCEDURE IF EXISTS `select_picture`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `select_picture` ()  SELECT * FROM `picture`$$

DROP PROCEDURE IF EXISTS `select_picture_id`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `select_picture_id` (IN `$src` TEXT)  SELECT picture_id FROM `picture` WHERE picture_name=`$src`$$

DROP PROCEDURE IF EXISTS `supprime_panier`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `supprime_panier` (IN `panier` VARCHAR(200), `id_u` INT)  UPDATE user
SET cart=panier
WHERE id=id_u$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_name` text COLLATE utf8_unicode_ci,
  `activity_dated` date DEFAULT NULL,
  `activity_description` text COLLATE utf8_unicode_ci,
  `activity_time` time DEFAULT NULL,
  `activity_cost` float(8,2) DEFAULT NULL,
  `activity_image` text COLLATE utf8_unicode_ci,
  `recurring` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`activity_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `activity`
--

INSERT INTO `activity` (`activity_id`, `activity_name`, `activity_dated`, `activity_description`, `activity_time`, `activity_cost`, `activity_image`, `recurring`) VALUES
(1, 'Hackathon', '2019-12-11', 'The Digital Geosciences hackathon, sponsored by EAGE, brings together computer scientists, machine learning specialists and geoscience experts to explore new ideas for digitalization and automation in geophysical research, exploration and industrial production processes. Two principal questions are:  1. How can we use cutting edge machine learning and visualization techniques to extract new information about the subsurface?  2. How can we use such processes to automate typical processes in geosciences industry end-to-end.', '08:00:00', 20.00, 'hackathon.png', NULL),
(2, 'AfterWorks', '2019-11-28', 'Tired after a busy week and need to decompress at the exit of the job? Want a little action after a busy day of work? Looking for people speaking the same language as you? Eager to have feedback and build even better your network? Need to relax at the end of the day? Look no further, afterworks are here to make you feel good.', '21:00:00', 0.00, 'afterwworks.jfif', NULL),
(3, 'Normandy Game Jam', '2020-10-25', 'The Normandy Game Jam is a 48 hour event where we invite you to create a video game related to a given theme. Whether you are a beginner or confirmed in the field, we would be very happy to welcome you. You can read the NGJ2019 rules for more information.', '10:00:00', 0.00, 'lions_game_studio.jpg', NULL),
(4, 'NetSecure Day 2019', '2019-12-12', 'The event #NSD is the annual meeting of cybersecurity in Normandy.  Organized since 2013 by the association NetSecure Day, this annual event has already gathered more than 1,200 people around 47 conferences on the 5 previous editions.', '09:00:00', 10.00, 'net_secure_day.jpg', NULL),
(5, 'Start-Up week-end', '2020-01-24', 'The Startup Weekend is an event where developers.ses, commercial.les, communicant.e.s, carriers.ses projects, student.e.s meet to share their ideas and start startups. During a weekend of experimentation, the contractors and aspiring entrepreneurs test the viability of their ideas, all with a good dose of fun and good humor.', '09:00:00', 10.00, 'startup-weekend-intelligence-artificielle.jpg', NULL),
(6, 'Codeurs en Seine', '2019-11-21', 'Codeurs en Seine is a free conference day that takes place in Rouen, to discover, learn and share around the world of development.', '10:00:00', 0.00, 'codeurs_en_seine.jfif', NULL),
(7, 'Forum Normand', '2020-11-14', 'An unmissable event in the Rouen region, Forum Normand Entreprises Etudiants is back for an eighth edition full of surprises.  Organized by INSA Rouen Normandie, L\'Esigelec, Cesi and ESITech, this forum is an opportunity for companies to meet and build strong relationships with young talent from the region. Each year, some fifty companies are mobilized to offer jobs and internships for more than 2,000 students and recent graduates of engineering schools and their partners.', '09:00:00', 0.00, 'Forum-normand.png', NULL),
(8, 'Open Lan', '2020-02-13', 'Want to try Tryhard or spend a relaxing weekend? # OPL20 is your next appointment, find our different tournaments and a retro-gaming space!', '10:00:00', 10.00, 'open_lan.jpg', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commentary`
--

DROP TABLE IF EXISTS `commentary`;
CREATE TABLE IF NOT EXISTS `commentary` (
  `commentary_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `likes` int(11) DEFAULT NULL,
  PRIMARY KEY (`commentary_id`),
  KEY `FK_ILLUSTRATE` (`picture_id`),
  KEY `FK_WRITE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `commentary`
--

INSERT INTO `commentary` (`commentary_id`, `id`, `picture_id`, `comment`, `likes`) VALUES
(4, 3, 2, 'yolo', NULL),
(5, 3, 3, 'yolo', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `goodies`
--

DROP TABLE IF EXISTS `goodies`;
CREATE TABLE IF NOT EXISTS `goodies` (
  `goodies_id` int(11) NOT NULL AUTO_INCREMENT,
  `goodies_name` text,
  `goodies_description` text,
  `goodies_in_stock` int(11) DEFAULT NULL,
  `goodies_category` text,
  `order_number` int(11) DEFAULT NULL,
  `goodies_photo` text,
  `goodies_cost` float(8,2) DEFAULT NULL,
  PRIMARY KEY (`goodies_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `goodies`
--

INSERT INTO `goodies` (`goodies_id`, `goodies_name`, `goodies_description`, `goodies_in_stock`, `goodies_category`, `order_number`, `goodies_photo`, `goodies_cost`) VALUES
(1, 'Panda Sweatshirt', 'One of the cutest panda sweatshirt ever made. Made in a really hot and comfortable tissu to keep you warm', 50, 'goodies', 17, 'pull-panda.jpg', 50.00),
(2, 'Panda slipper', 'The best slipper to wear is the one of your school. Lucky for you we take care of our students so he we have comfort and love for your feet', 500, 'goodies', 152, 'chausson-panda.jpg', 20.00),
(3, 'Nightfall cards', 'You want to get out of your routine ? You want to get free drinks and be the king of the night ? Let us introduce to the must have for someone who desperatly need to drink', 150, 'goodies', 140, 'cartes-nightfall.jpg', 10.00),
(4, 'Steampunk Sunglasses', 'Needs some glasses and  some style ? We have what you need', 200, 'goodies', 70, 'lunettes-de-soleil-steampunk.jpg', 25.00),
(5, 'Sunglasses for Humans', 'You are human ? So you need this', 200, 'goodies', 70, 'lunettes-de-soleil-yamaha-adulte.jpg', 25.00),
(6, 'Teddy Bear', 'Need some hugs ? I personnaly can\'t but you can buy a panda', 500, 'goodies', 399, 'peluche-panda.jpeg', 25.00);

-- --------------------------------------------------------

--
-- Structure de la table `participate`
--

DROP TABLE IF EXISTS `participate`;
CREATE TABLE IF NOT EXISTS `participate` (
  `id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`activity_id`),
  KEY `FK_PARTICIPATE` (`activity_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `participate`
--

INSERT INTO `participate` (`id`, `activity_id`) VALUES
(2, 2),
(3, 2),
(3, 6),
(4, 2),
(5, 4),
(6, 4);

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

DROP TABLE IF EXISTS `picture`;
CREATE TABLE IF NOT EXISTS `picture` (
  `picture_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `picture_name` text COLLATE utf8_unicode_ci,
  `picture_description` text COLLATE utf8_unicode_ci,
  `likes` decimal(8,0) DEFAULT NULL,
  PRIMARY KEY (`picture_id`),
  KEY `FK_SHARE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `picture`
--

INSERT INTO `picture` (`picture_id`, `id`, `picture_name`, `picture_description`, `likes`) VALUES
(2, 1, 'startup-weekend-intelligence-artificielle.jpg', 'Hackathon of Rouen', NULL),
(3, 1, 'automa-hand.jpg', 'One of the coolest project we have, trying to make robotic hands for disabled people.', NULL),
(4, 1, 'batiment-CESI.jpg', 'Expectations of all the student about the future CESI building', NULL),
(5, 1, 'WerAreCesi-Social-Club.jpg', 'One of the first events we did with the BDE in the Social-Club Bar', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE IF NOT EXISTS `purchase` (
  `id` int(11) NOT NULL,
  `goodies_id` int(11) NOT NULL,
  `goodies_quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`,`goodies_id`),
  KEY `FK_PURCHASE` (`goodies_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `purchase`
--

INSERT INTO `purchase` (`id`, `goodies_id`, `goodies_quantity`) VALUES
(4, 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` text COLLATE utf8_unicode_ci,
  `last_name` text COLLATE utf8_unicode_ci,
  `email` text COLLATE utf8_unicode_ci,
  `role` text COLLATE utf8_unicode_ci,
  `campus` text COLLATE utf8_unicode_ci,
  `cart` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `role`, `campus`, `cart`, `password`) VALUES
(1, 'admin', 'admin', 'admin@viacesi.fr', 'bdemember', 'Rouen', '', '952bfe8032f4bf59a3bc536b556ebd69'),
(2, 'brossier', 'achille', 'achille.brossier@viacesi.fr', 'bdemember', 'Rouen', '', '952bfe8032f4bf59a3bc536b556ebd69'),
(3, 'Renouf', 'ThÃ©ophile', 'theophile.renouf@viacesi.fr', 'bdemember', 'Rouen', '', '952bfe8032f4bf59a3bc536b556ebd69'),
(4, 'Cahard', 'Antoine', 'antoine.cahard@viacesi.fr', 'bdemember', 'Rouen', ':6:3:4:6', '952bfe8032f4bf59a3bc536b556ebd69'),
(5, 'Letalleur', 'CÃ©dric', 'cedric.letalleur@viacesi.fr', 'bdemember', 'Rouen', '', '952bfe8032f4bf59a3bc536b556ebd69'),
(6, 'Bond', 'James', 'james.bond@viacesi.fr', 'employee', 'Rouen', '', '952bfe8032f4bf59a3bc536b556ebd69'),
(7, 'Students', 'Cesi', 'cesi.students@viacesi.fr', 'student', 'Rouen', '', '952bfe8032f4bf59a3bc536b556ebd69');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
