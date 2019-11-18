-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour webproject
CREATE DATABASE IF NOT EXISTS `webproject` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `webproject`;

-- Listage de la structure de la table webproject. activity
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

-- Listage des données de la table webproject.activity : 8 rows
/*!40000 ALTER TABLE `activity` DISABLE KEYS */;
INSERT INTO `activity` (`activity_id`, `activity_name`, `activity_dated`, `activity_description`, `activity_time`, `activity_cost`, `activity_image`, `recurring`) VALUES
	(1, 'Hackathon', '2019-12-11', 'The Digital Geosciences hackathon, sponsored by EAGE, brings together computer scientists, machine learning specialists and geoscience experts to explore new ideas for digitalization and automation in geophysical research, exploration and industrial production processes. Two principal questions are:  1. How can we use cutting edge machine learning and visualization techniques to extract new information about the subsurface?  2. How can we use such processes to automate typical processes in geosciences industry end-to-end.', '08:00:00', 20.00, 'hackathon.png', NULL),
	(2, 'AfterWorks', '2019-11-28', 'Tired after a busy week and need to decompress at the exit of the job? Want a little action after a busy day of work? Looking for people speaking the same language as you? Eager to have feedback and build even better your network? Need to relax at the end of the day? Look no further, afterworks are here to make you feel good.', '21:00:00', 0.00, 'afterwworks.jfif', NULL),
	(3, 'Normandy Game Jam', '2020-10-25', 'The Normandy Game Jam is a 48 hour event where we invite you to create a video game related to a given theme. Whether you are a beginner or confirmed in the field, we would be very happy to welcome you. You can read the NGJ2019 rules for more information.', '10:00:00', 0.00, 'lions_game_studio.jpg', NULL),
	(4, 'NetSecure Day 2019', '2019-12-12', 'The event #NSD is the annual meeting of cybersecurity in Normandy.  Organized since 2013 by the association NetSecure Day, this annual event has already gathered more than 1,200 people around 47 conferences on the 5 previous editions.', '09:00:00', 10.00, 'net_secure_day.jpg', NULL),
	(5, 'Start-Up week-end', '2020-01-24', 'The Startup Weekend is an event where developers.ses, commercial.les, communicant.e.s, carriers.ses projects, student.e.s meet to share their ideas and start startups. During a weekend of experimentation, the contractors and aspiring entrepreneurs test the viability of their ideas, all with a good dose of fun and good humor.', '09:00:00', 10.00, 'startup-weekend-intelligence-artificielle.jpg', NULL),
	(6, 'Codeurs en Seine', '2019-11-21', 'Codeurs en Seine is a free conference day that takes place in Rouen, to discover, learn and share around the world of development.', '10:00:00', 0.00, 'codeurs_en_seine.jfif', NULL),
	(7, 'Forum Normand', '2020-11-14', 'An unmissable event in the Rouen region, Forum Normand Entreprises Etudiants is back for an eighth edition full of surprises.  Organized by INSA Rouen Normandie, L\'Esigelec, Cesi and ESITech, this forum is an opportunity for companies to meet and build strong relationships with young talent from the region. Each year, some fifty companies are mobilized to offer jobs and internships for more than 2,000 students and recent graduates of engineering schools and their partners.', '09:00:00', 0.00, 'Forum-normand.png', NULL),
	(8, 'Open Lan', '2020-02-13', 'Want to try Tryhard or spend a relaxing weekend? # OPL20 is your next appointment, find our different tournaments and a retro-gaming space!', '10:00:00', 10.00, 'open_lan.jpg', NULL);
/*!40000 ALTER TABLE `activity` ENABLE KEYS */;

-- Listage de la structure de la procédure webproject. best_produit
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `best_produit`()
SELECT goodies_id,goodies_photo FROM goodies ORDER BY order_number DESC//
DELIMITER ;

-- Listage de la structure de la procédure webproject. categorie
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `categorie`(IN `prix_min` INT, IN `prix_max` INT)
SELECT goodies_category 
FROM goodies 
WHERE goodies_cost<=prix_max AND prix_min<=goodies_cost AND goodies_in_stock>0
GROUP BY goodies_category//
DELIMITER ;

-- Listage de la structure de la table webproject. commentary
CREATE TABLE IF NOT EXISTS `commentary` (
  `commentary_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `likes` int(11) DEFAULT NULL,
  PRIMARY KEY (`commentary_id`),
  KEY `FK_ILLUSTRATE` (`picture_id`),
  KEY `FK_WRITE` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table webproject.commentary : 0 rows
/*!40000 ALTER TABLE `commentary` DISABLE KEYS */;
/*!40000 ALTER TABLE `commentary` ENABLE KEYS */;

-- Listage de la structure de la procédure webproject. controle_prix
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `controle_prix`(IN `prix_min` INT, IN `prix_max` INT)
SELECT * FROM (
    SELECT goodies_id,goodies_name,goodies_photo,goodies_cost,goodies_category 
    FROM goodies 
    WHERE goodies_in_stock>0)
    AS info_goodies
WHERE goodies_cost<=prix_max AND prix_min<=goodies_cost//
DELIMITER ;

-- Listage de la structure de la table webproject. goodies
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

-- Listage des données de la table webproject.goodies : 6 rows
/*!40000 ALTER TABLE `goodies` DISABLE KEYS */;
INSERT INTO `goodies` (`goodies_id`, `goodies_name`, `goodies_description`, `goodies_in_stock`, `goodies_category`, `order_number`, `goodies_photo`, `goodies_cost`) VALUES
	(1, 'Panda Sweatshirt', 'One of the cutest panda sweatshirt ever made. Made in a really hot and comfortable tissu to keep you warm', 50, 'goodies', 17, 'pull-panda.jpg', 50.00),
	(2, 'Panda slipper', 'The best slipper to wear is the one of your school. Lucky for you we take care of our students so he we have comfort and love for your feet', 500, 'goodies', 152, 'chausson-panda.jpg', 20.00),
	(3, 'Nightfall cards', 'You want to get out of your routine ? You want to get free drinks and be the king of the night ? Let us introduce to the must have for someone who desperatly need to drink', 150, 'goodies', 140, 'cartes-nightfall.jpg', 10.00),
	(4, 'Steampunk Sunglasses', 'Needs some glasses and  some style ? We have what you need', 200, 'goodies', 70, 'lunettes-de-soleil-steampunk.jpg', 25.00),
	(5, 'Sunglasses for Humans', 'You are human ? So you need this', 200, 'goodies', 70, 'lunettes-de-soleil-yamaha-adulte.jpg', 25.00),
	(6, 'Teddy Bear', 'Need some hugs ? I personnaly can\'t but you can buy a panda', 500, 'goodies', 399, 'pull-panda.jpg', 25.00);
/*!40000 ALTER TABLE `goodies` ENABLE KEYS */;

-- Listage de la structure de la procédure webproject. info_goodies
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `info_goodies`(IN `id` INT)
SELECT goodies_name,goodies_photo,goodies_cost,goodies_category,goodies_description FROM goodies WHERE goodies_id=id//
DELIMITER ;

-- Listage de la structure de la procédure webproject. list_activity
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `list_activity`()
SELECT * FROM activity//
DELIMITER ;

-- Listage de la structure de la procédure webproject. list_produit_présent
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `list_produit_présent`()
SELECT goodies_id,goodies_name,goodies_photo,goodies_cost,goodies_category FROM goodies WHERE goodies_in_stock>0//
DELIMITER ;

-- Listage de la structure de la table webproject. participate
CREATE TABLE IF NOT EXISTS `participate` (
  `id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`activity_id`),
  KEY `FK_PARTICIPATE` (`activity_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table webproject.participate : 6 rows
/*!40000 ALTER TABLE `participate` DISABLE KEYS */;
INSERT INTO `participate` (`id`, `activity_id`) VALUES
	(2, 2),
	(3, 2),
	(3, 6),
	(4, 2),
	(5, 4),
	(6, 4);
/*!40000 ALTER TABLE `participate` ENABLE KEYS */;

-- Listage de la structure de la table webproject. picture
CREATE TABLE IF NOT EXISTS `picture` (
  `picture_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `picture_name` text COLLATE utf8_unicode_ci,
  `picture_description` text COLLATE utf8_unicode_ci,
  `likes` decimal(8,0) DEFAULT NULL,
  PRIMARY KEY (`picture_id`),
  KEY `FK_SHARE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table webproject.picture : 4 rows
/*!40000 ALTER TABLE `picture` DISABLE KEYS */;
INSERT INTO `picture` (`picture_id`, `id`, `picture_name`, `picture_description`, `likes`) VALUES
	(2, 1, 'startup-weekend-intelligence-artificielle.jpg', 'Hackathon of Rouen', NULL),
	(3, 1, 'automa-hand.jpg', 'One of the coolest project we have, trying to make robotic hands for disabled people.', NULL),
	(4, 1, 'batiment-CESI.jpg', 'Expectations of all the student about the future CESI building', NULL),
	(5, 1, 'WerAreCesi-Social-Club.jpg', 'One of the first events we did with the BDE in the Social-Club Bar', NULL);
/*!40000 ALTER TABLE `picture` ENABLE KEYS */;

-- Listage de la structure de la table webproject. purchase
CREATE TABLE IF NOT EXISTS `purchase` (
  `id` int(11) NOT NULL,
  `goodies_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`goodies_id`),
  KEY `FK_PURCHASE` (`goodies_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table webproject.purchase : 0 rows
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;

-- Listage de la structure de la procédure webproject. redirect_name_id
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `redirect_name_id`(IN `name` VARCHAR(200))
SELECT goodies_id FROM goodies WHERE goodies_name=name//
DELIMITER ;

-- Listage de la structure de la procédure webproject. select_comment
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `select_comment`(IN `$name` TEXT)
SELECT commentary.comment, user.first_name, user.last_name FROM `commentary`,`user` WHERE picture_id=$name AND user.id=commentary.id//
DELIMITER ;

-- Listage de la structure de la procédure webproject. select_goodies_id_name
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `select_goodies_id_name`()
SELECT goodies_id,goodies_name FROM goodies//
DELIMITER ;

-- Listage de la structure de la procédure webproject. select_picture
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `select_picture`()
SELECT * FROM `picture`//
DELIMITER ;

-- Listage de la structure de la table webproject. user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` text COLLATE utf8_unicode_ci,
  `last_name` text COLLATE utf8_unicode_ci,
  `email` text COLLATE utf8_unicode_ci,
  `role` text COLLATE utf8_unicode_ci,
  `campus` text COLLATE utf8_unicode_ci,
  `cart` text COLLATE utf8_unicode_ci,
  `password` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table webproject.user : 7 rows
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `role`, `campus`, `cart`, `password`) VALUES
	(1, 'admin', 'admin', 'admin@viacesi.fr', 'bdemember', 'Rouen', NULL, '952bfe8032f4bf59a3bc536b556ebd69'),
	(2, 'brossier', 'achille', 'achille.brossier@viacesi.fr', 'bdemember', 'Rouen', NULL, '952bfe8032f4bf59a3bc536b556ebd69'),
	(3, 'Renouf', 'ThÃ©ophile', 'theophile.renouf@viacesi.fr', 'bdemember', 'Rouen', NULL, '952bfe8032f4bf59a3bc536b556ebd69'),
	(4, 'Cahard', 'Antoine', 'antoine.cahard@viacesi.fr', 'bdemember', 'Rouen', NULL, '952bfe8032f4bf59a3bc536b556ebd69'),
	(5, 'Letalleur', 'CÃ©dric', 'cedric.letalleur@viacesi.fr', 'bdemember', 'Rouen', NULL, '952bfe8032f4bf59a3bc536b556ebd69'),
	(6, 'Bond', 'James', 'james.bond@viacesi.fr', 'employee', 'Rouen', NULL, '952bfe8032f4bf59a3bc536b556ebd69'),
	(7, 'Students', 'Cesi', 'cesi.students@viacesi.fr', 'student', 'Rouen', NULL, '952bfe8032f4bf59a3bc536b556ebd69');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
