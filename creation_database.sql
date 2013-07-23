-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Lun 22 Juillet 2013 à 10:34
-- Version du serveur: 5.1.44
-- Version de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `marketing_univ`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `information` varchar(100) NOT NULL,
  `id_university` int(11) NOT NULL,
  PRIMARY KEY (`id_contact`),
  KEY `fk_contacts_university1` (`id_university`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `information`, `id_university`) VALUES
(1, 'International Partnership Manager', 1),
(2, 'International Partnership Manager', 3),
(3, 'International Partnership Manager', 4),
(4, 'Internship Manager', 1),
(5, 'Standard', 2),
(6, 'Standard', 1),
(7, 'Standard', 5);

-- --------------------------------------------------------

--
-- Structure de la table `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
  `id_mail` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(100) NOT NULL,
  `id_contact` int(11) NOT NULL,
  PRIMARY KEY (`id_mail`),
  KEY `fk_mail_contacts1` (`id_contact`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `mail`
--

INSERT INTO `mail` (`id_mail`, `mail`, `id_contact`) VALUES
(1, 'university.country@example.com', 6),
(2, 'university.country@example.com', 7),
(3, 'instance@example.com', 6),
(4, 'instance@example.com', 2),
(5, 'manager.partnership@example.com', 4),
(6, 'manager.partnership@example.com', 4);

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id_newsletter` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `creation_date` datetime NOT NULL,
  `cover` varchar(100) NOT NULL,
  `checking_state` int(11) NOT NULL COMMENT '0= writing, 1 = Designing, 2= HTML, 3= sent',
  `content` longtext NOT NULL,
  `comment` longtext,
  PRIMARY KEY (`id_newsletter`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `newsletter`
--

INSERT INTO `newsletter` (`id_newsletter`, `type`, `name`, `description`, `path`, `creation_date`, `cover`, `checking_state`, `content`, `comment`) VALUES
(1, 0, 'First Newsletter', 'First newsletter to send to universities', '/92data/marketing/newsletter', '2013-07-22 10:58:30', '/img/toto/cover.jpg', 0, '<!DOCTYPE html>\r\n<html>\r\n    <head>\r\n        <meta charset="utf-8" />\r\n        <title>Newsletter</title>\r\n        <style>\r\n        body{margin: 0px; width: 900px; margin: auto;}\r\n		header{background-image:url(''img/Top Banner.png''); background-size: 100% 100%; height: 120px; width: 100%;}\r\n		.intro{font-weight: bold; font-size: 1.4em; text-align: center;}\r\n		.img1{display: inline-block; width: 63%;  height: 610px; background-image:url(''img/Picture 1 with Title.png'');  background-size: 100% 100%;}\r\n		.rightSection{width: 60%; display: inline-block; margin-left: -25%;  margin-top: 7%; font-size: 1.2em; vertical-align: top;} \r\n		 .rightSection ul{margin-top: 10%;}\r\n		.rightSection li {margin-bottom: 5%;}\r\n		.rightSection  {margin-top: 5%;}\r\n		.mainTitle{background-color: red; color: white; padding: 5px; font-size: 1.2em;}\r\n		.contact{text-align: center; font-size: 1.2em;}\r\n		section p a {color: black; text-decoration: none;}\r\n		.info{font-weight: bold;}\r\n		.leftSection{ width: 45%; display: inline-block;  font-size: 1.2em; margin-left: 1%; margin-top: -27%; vertical-align: top;} \r\n		.leftSection p{text-align: justify;}\r\n		.img2{display: inline-block; width: 75%;  height: 300px; background-image:url(''img/Picture 2 with Title.png'');  background-size: 100% 100%; margin-left: 20%; }\r\n		footer{background-color: #c50b16; height: 80px; width: 100%;}\r\n		footer li {list-style-type: none; display: inline-block;}\r\n		footer a {text-decoration: none;}\r\n		.offset{margin-left: -10%;}\r\n		.offset2{margin-left: -15%;}\r\n        </style>\r\n    </head>\r\n \r\n    <body>\r\n        <header>\r\n        </header>\r\n\r\n        <section class="intro">\r\n                <p>Interested in having a rewarding work experience in Great Britain?</p>\r\n                <p>Do you want your work/life balance to be fantastic?</p>\r\n               <p> Apply to Internship-uk and join us in Kent for an amazing and unforgettable adventure!</p>\r\n        </section>\r\n\r\n        <aside class="img1">\r\n\r\n        </aside>\r\n\r\n        <section class="rightSection">\r\n\r\n            <ul>\r\n             <li><span class="info">A wide range of challenging internships</span> in one of our numerous departments.</li>\r\n             <li><span class="info">A multi-cultural team </span>with whom you can build friendships with atwork, during interactive workshops, exciting trips and activities.</li>\r\n             <li><span class="info">A daily workshop</span> that helps you to integrate into the team, improve your English level, and also experience different cultures and learn important skills and techniques for your future career.</li>\r\n             <li>?<span class="info">An event manager </span>whose aim is to make your stay in Kent unique and exciting</li>\r\n             <li><span class="info">An office </span>situated near the fantastic Kent coast line, easy travelling distance to London, Canterbury and France.</li>\r\n            </ul>\r\n\r\n            <p>\r\n                We are looking for people who are motivated and desire new challenges. An intermediate level of English will start you on your internship journey with us, where you can develop and gain new professional skills and knowledge.\r\n            </p>\r\n        </section>\r\n\r\n        <section class="contact">\r\n            <p class="info">How to apply</p>\r\n            <p>You can apply at anytime. <br>\r\n               Check out our placement opportunities on our website, call one of the friendly team here at New Romney,<br> \r\n               <span class="info">contact us</span> now to plan your future.\r\n           </p>\r\n            <p><a class="info" href="www.internship-uk.com">www.internship-uk.com</a></p>\r\n        </section>\r\n\r\n\r\n        <aside class="img2">\r\n\r\n        </aside>\r\n        <section class="leftSection">\r\n            <p>\r\n                Internship-UK.com Ltd is a company which offers a wide range of high quality internships in the fields of Marketing, Customer Relationship Management, Human Resources, IT, Media, Translation in the South of England. Based in Kent, we have been offering work experience placements and training to students\r\n                from around the world for more than 12 years.\r\n            </p>\r\n\r\n        </section>\r\n\r\n        <footer>\r\n            <ul class="foot">\r\n                <li class="number"></a><img src="img/Icon 1.png" alt="number"> <img src="img/Text 1.png" alt="text1" class="offset" width="170"></li>\r\n\r\n                <li class="mail"><a href="mailto:hr@internship-uk.com" > <img class="offset2" src="img/Icon 2.png"> </a><a href="mailto:hr@internship-uk.com" ><img src="img/Text 2.png" class="offset" width="170"></a></li>\r\n\r\n                <li class="facebook"><a href="https://www.facebook.com/internship.uk?fref=ts" ><img class="offset2" src="img/Icon 3.png"> </a> <a href="https://www.facebook.com/internship.uk?fref=ts" ><img src="img/Text 3.png" class="offset" width="170"></a></li>\r\n\r\n                <li class="twitter"><a href="https://twitter.com/internshipinuk" ><img class="offset2" src="img/Icon 4.png"> </a> <a href="https://twitter.com/internshipinuk" ><img src="img/Text 4.png" class="offset" width="170"></a></li>\r\n            </ul>\r\n        </footer>\r\n    </body>\r\n</html>', NULL),
(2, 0, 'July Newsletter', 'July news', '/92data/marketing/newsletter', '2013-07-22 11:08:03', '/img/toto/cover.jpg', 1, '<!DOCTYPE html>\r\n<html>\r\n    <head>\r\n        <meta charset="utf-8" />\r\n        <title>Newsletter</title>\r\n        <style>\r\n        body{margin: 0px; width: 900px; margin: auto;}\r\n		header{background-image:url(''img/Top Banner.png''); background-size: 100% 100%; height: 120px; width: 100%;}\r\n		.intro{font-weight: bold; font-size: 1.4em; text-align: center;}\r\n		.img1{display: inline-block; width: 63%;  height: 610px; background-image:url(''img/Picture 1 with Title.png'');  background-size: 100% 100%;}\r\n		.rightSection{width: 60%; display: inline-block; margin-left: -25%;  margin-top: 7%; font-size: 1.2em; vertical-align: top;} \r\n		 .rightSection ul{margin-top: 10%;}\r\n		.rightSection li {margin-bottom: 5%;}\r\n		.rightSection  {margin-top: 5%;}\r\n		.mainTitle{background-color: red; color: white; padding: 5px; font-size: 1.2em;}\r\n		.contact{text-align: center; font-size: 1.2em;}\r\n		section p a {color: black; text-decoration: none;}\r\n		.info{font-weight: bold;}\r\n		.leftSection{ width: 45%; display: inline-block;  font-size: 1.2em; margin-left: 1%; margin-top: -27%; vertical-align: top;} \r\n		.leftSection p{text-align: justify;}\r\n		.img2{display: inline-block; width: 75%;  height: 300px; background-image:url(''img/Picture 2 with Title.png'');  background-size: 100% 100%; margin-left: 20%; }\r\n		footer{background-color: #c50b16; height: 80px; width: 100%;}\r\n		footer li {list-style-type: none; display: inline-block;}\r\n		footer a {text-decoration: none;}\r\n		.offset{margin-left: -10%;}\r\n		.offset2{margin-left: -15%;}\r\n        </style>\r\n    </head>\r\n \r\n    <body>\r\n        <header>\r\n        </header>\r\n\r\n        <section class="intro">\r\n                <p>Interested in having a rewarding work experience in Great Britain?</p>\r\n                <p>Do you want your work/life balance to be fantastic?</p>\r\n               <p> Apply to Internship-uk and join us in Kent for an amazing and unforgettable adventure!</p>\r\n        </section>\r\n\r\n        <aside class="img1">\r\n\r\n        </aside>\r\n\r\n        <section class="rightSection">\r\n\r\n            <ul>\r\n             <li><span class="info">A wide range of challenging internships</span> in one of our numerous departments.</li>\r\n             <li><span class="info">A multi-cultural team </span>with whom you can build friendships with atwork, during interactive workshops, exciting trips and activities.</li>\r\n             <li><span class="info">A daily workshop</span> that helps you to integrate into the team, improve your English level, and also experience different cultures and learn important skills and techniques for your future career.</li>\r\n             <li>?<span class="info">An event manager </span>whose aim is to make your stay in Kent unique and exciting</li>\r\n             <li><span class="info">An office </span>situated near the fantastic Kent coast line, easy travelling distance to London, Canterbury and France.</li>\r\n            </ul>\r\n\r\n            <p>\r\n                We are looking for people who are motivated and desire new challenges. An intermediate level of English will start you on your internship journey with us, where you can develop and gain new professional skills and knowledge.\r\n            </p>\r\n        </section>\r\n\r\n        <section class="contact">\r\n            <p class="info">How to apply</p>\r\n            <p>You can apply at anytime. <br>\r\n               Check out our placement opportunities on our website, call one of the friendly team here at New Romney,<br> \r\n               <span class="info">contact us</span> now to plan your future.\r\n           </p>\r\n            <p><a class="info" href="www.internship-uk.com">www.internship-uk.com</a></p>\r\n        </section>\r\n\r\n\r\n        <aside class="img2">\r\n\r\n        </aside>\r\n        <section class="leftSection">\r\n            <p>\r\n                Internship-UK.com Ltd is a company which offers a wide range of high quality internships in the fields of Marketing, Customer Relationship Management, Human Resources, IT, Media, Translation in the South of England. Based in Kent, we have been offering work experience placements and training to students\r\n                from around the world for more than 12 years.\r\n            </p>\r\n\r\n        </section>\r\n\r\n        <footer>\r\n            <ul class="foot">\r\n                <li class="number"></a><img src="img/Icon 1.png" alt="number"> <img src="img/Text 1.png" alt="text1" class="offset" width="170"></li>\r\n\r\n                <li class="mail"><a href="mailto:hr@internship-uk.com" > <img class="offset2" src="img/Icon 2.png"> </a><a href="mailto:hr@internship-uk.com" ><img src="img/Text 2.png" class="offset" width="170"></a></li>\r\n\r\n                <li class="facebook"><a href="https://www.facebook.com/internship.uk?fref=ts" ><img class="offset2" src="img/Icon 3.png"> </a> <a href="https://www.facebook.com/internship.uk?fref=ts" ><img src="img/Text 3.png" class="offset" width="170"></a></li>\r\n\r\n                <li class="twitter"><a href="https://twitter.com/internshipinuk" ><img class="offset2" src="img/Icon 4.png"> </a> <a href="https://twitter.com/internshipinuk" ><img src="img/Text 4.png" class="offset" width="170"></a></li>\r\n            </ul>\r\n        </footer>\r\n    </body>\r\n</html>', NULL),
(3, 1, 'First Intern Newsletter', 'First Intern Newsletter', '/92data/marketing/newsletter', '2013-07-25 11:32:28', '/img/toto/cover.jpg', 0, '<!DOCTYPE html>\r\n<html>\r\n    <head>\r\n        <meta charset="utf-8" />\r\n        <title>Newsletter</title>\r\n        <style>\r\n        body{margin: 0px; width: 900px; margin: auto;}\r\n		header{background-image:url(''img/Top Banner.png''); background-size: 100% 100%; height: 120px; width: 100%;}\r\n		.intro{font-weight: bold; font-size: 1.4em; text-align: center;}\r\n		.img1{display: inline-block; width: 63%;  height: 610px; background-image:url(''img/Picture 1 with Title.png'');  background-size: 100% 100%;}\r\n		.rightSection{width: 60%; display: inline-block; margin-left: -25%;  margin-top: 7%; font-size: 1.2em; vertical-align: top;} \r\n		 .rightSection ul{margin-top: 10%;}\r\n		.rightSection li {margin-bottom: 5%;}\r\n		.rightSection  {margin-top: 5%;}\r\n		.mainTitle{background-color: red; color: white; padding: 5px; font-size: 1.2em;}\r\n		.contact{text-align: center; font-size: 1.2em;}\r\n		section p a {color: black; text-decoration: none;}\r\n		.info{font-weight: bold;}\r\n		.leftSection{ width: 45%; display: inline-block;  font-size: 1.2em; margin-left: 1%; margin-top: -27%; vertical-align: top;} \r\n		.leftSection p{text-align: justify;}\r\n		.img2{display: inline-block; width: 75%;  height: 300px; background-image:url(''img/Picture 2 with Title.png'');  background-size: 100% 100%; margin-left: 20%; }\r\n		footer{background-color: #c50b16; height: 80px; width: 100%;}\r\n		footer li {list-style-type: none; display: inline-block;}\r\n		footer a {text-decoration: none;}\r\n		.offset{margin-left: -10%;}\r\n		.offset2{margin-left: -15%;}\r\n        </style>\r\n    </head>\r\n \r\n    <body>\r\n        <header>\r\n        </header>\r\n\r\n        <section class="intro">\r\n                <p>Interested in having a rewarding work experience in Great Britain?</p>\r\n                <p>Do you want your work/life balance to be fantastic?</p>\r\n               <p> Apply to Internship-uk and join us in Kent for an amazing and unforgettable adventure!</p>\r\n        </section>\r\n\r\n        <aside class="img1">\r\n\r\n        </aside>\r\n\r\n        <section class="rightSection">\r\n\r\n            <ul>\r\n             <li><span class="info">A wide range of challenging internships</span> in one of our numerous departments.</li>\r\n             <li><span class="info">A multi-cultural team </span>with whom you can build friendships with atwork, during interactive workshops, exciting trips and activities.</li>\r\n             <li><span class="info">A daily workshop</span> that helps you to integrate into the team, improve your English level, and also experience different cultures and learn important skills and techniques for your future career.</li>\r\n             <li>?<span class="info">An event manager </span>whose aim is to make your stay in Kent unique and exciting</li>\r\n             <li><span class="info">An office </span>situated near the fantastic Kent coast line, easy travelling distance to London, Canterbury and France.</li>\r\n            </ul>\r\n\r\n            <p>\r\n                We are looking for people who are motivated and desire new challenges. An intermediate level of English will start you on your internship journey with us, where you can develop and gain new professional skills and knowledge.\r\n            </p>\r\n        </section>\r\n\r\n        <section class="contact">\r\n            <p class="info">How to apply</p>\r\n            <p>You can apply at anytime. <br>\r\n               Check out our placement opportunities on our website, call one of the friendly team here at New Romney,<br> \r\n               <span class="info">contact us</span> now to plan your future.\r\n           </p>\r\n            <p><a class="info" href="www.internship-uk.com">www.internship-uk.com</a></p>\r\n        </section>\r\n\r\n\r\n        <aside class="img2">\r\n\r\n        </aside>\r\n        <section class="leftSection">\r\n            <p>\r\n                Internship-UK.com Ltd is a company which offers a wide range of high quality internships in the fields of Marketing, Customer Relationship Management, Human Resources, IT, Media, Translation in the South of England. Based in Kent, we have been offering work experience placements and training to students\r\n                from around the world for more than 12 years.\r\n            </p>\r\n\r\n        </section>\r\n\r\n        <footer>\r\n            <ul class="foot">\r\n                <li class="number"></a><img src="img/Icon 1.png" alt="number"> <img src="img/Text 1.png" alt="text1" class="offset" width="170"></li>\r\n\r\n                <li class="mail"><a href="mailto:hr@internship-uk.com" > <img class="offset2" src="img/Icon 2.png"> </a><a href="mailto:hr@internship-uk.com" ><img src="img/Text 2.png" class="offset" width="170"></a></li>\r\n\r\n                <li class="facebook"><a href="https://www.facebook.com/internship.uk?fref=ts" ><img class="offset2" src="img/Icon 3.png"> </a> <a href="https://www.facebook.com/internship.uk?fref=ts" ><img src="img/Text 3.png" class="offset" width="170"></a></li>\r\n\r\n                <li class="twitter"><a href="https://twitter.com/internshipinuk" ><img class="offset2" src="img/Icon 4.png"> </a> <a href="https://twitter.com/internshipinuk" ><img src="img/Text 4.png" class="offset" width="170"></a></li>\r\n            </ul>\r\n        </footer>\r\n    </body>\r\n</html>', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `id_person` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `worked_until` datetime DEFAULT NULL,
  PRIMARY KEY (`id_person`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `person`
--

INSERT INTO `person` (`id_person`, `first_name`, `last_name`, `phone`, `mail`, `country`, `worked_until`) VALUES
(1, 'Djothi', 'Grondin', '00000000', NULL, 'France', '2013-08-09 11:17:05'),
(2, 'Bazire', 'Houssin', NULL, NULL, 'France', NULL),
(3, 'Alexis', 'Je sais pas', NULL, NULL, 'Spain', NULL),
(4, 'Natazsa', 'I don''t know', NULL, NULL, 'Greece', '2013-10-31 11:18:10');

-- --------------------------------------------------------

--
-- Structure de la table `phone`
--

CREATE TABLE IF NOT EXISTS `phone` (
  `id_phone` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(45) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0' COMMENT '0=phone, 1=fax',
  `id_contact` int(11) NOT NULL,
  PRIMARY KEY (`id_phone`),
  KEY `fk_table1_contacts1` (`id_contact`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `phone`
--

INSERT INTO `phone` (`id_phone`, `number`, `type`, `id_contact`) VALUES
(5, '54354354353', 0, 3),
(6, '543543543543543', 0, 5),
(7, '09098756754', 0, 4),
(8, '43254387686', 0, 1),
(9, '65465464646464', 0, 3),
(10, '544365465465436', 0, 5);

-- --------------------------------------------------------

--
-- Structure de la table `recommended_by`
--

CREATE TABLE IF NOT EXISTS `recommended_by` (
  `id_person` int(11) NOT NULL,
  `id_university` int(11) NOT NULL,
  `is_student` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0= No, 1= Yes',
  PRIMARY KEY (`id_person`,`id_university`),
  KEY `fk_person_has_university_university1` (`id_university`),
  KEY `fk_person_has_university_person1` (`id_person`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `recommended_by`
--

INSERT INTO `recommended_by` (`id_person`, `id_university`, `is_student`) VALUES
(1, 1, 1),
(1, 2, 0),
(2, 4, 0),
(3, 4, 1),
(3, 5, 0),
(4, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id_role`, `name`) VALUES
(1, 'Administrator'),
(2, 'Manager'),
(3, 'Agent'),
(4, 'Agent'),
(5, 'User');

-- --------------------------------------------------------

--
-- Structure de la table `sent_newsletter_person`
--

CREATE TABLE IF NOT EXISTS `sent_newsletter_person` (
  `id_newsletter` int(11) NOT NULL,
  `id_person` int(11) NOT NULL,
  `sending_date` datetime NOT NULL,
  PRIMARY KEY (`id_newsletter`,`id_person`),
  KEY `fk_newsletter_has_person_person1_idx` (`id_person`),
  KEY `fk_newsletter_has_person_newsletter1_idx` (`id_newsletter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sent_newsletter_person`
--

INSERT INTO `sent_newsletter_person` (`id_newsletter`, `id_person`, `sending_date`) VALUES
(3, 2, '2013-07-27 11:33:04'),
(3, 3, '2013-07-19 11:33:01');

-- --------------------------------------------------------

--
-- Structure de la table `sent_newsletter_university`
--

CREATE TABLE IF NOT EXISTS `sent_newsletter_university` (
  `id_university` int(11) NOT NULL,
  `id_newsletter` int(11) NOT NULL,
  `sending_date` datetime NOT NULL,
  PRIMARY KEY (`id_university`,`id_newsletter`),
  KEY `fk_university_has_newsletter_newsletter1` (`id_newsletter`),
  KEY `fk_university_has_newsletter_university1` (`id_university`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sent_newsletter_university`
--

INSERT INTO `sent_newsletter_university` (`id_university`, `id_newsletter`, `sending_date`) VALUES
(1, 1, '2013-07-24 11:26:51'),
(1, 2, '2013-07-31 11:27:30'),
(3, 1, '2013-07-10 11:27:54'),
(4, 1, '2013-07-20 11:27:47');

-- --------------------------------------------------------

--
-- Structure de la table `university`
--

CREATE TABLE IF NOT EXISTS `university` (
  `id_university` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `subscription` tinyint(1) DEFAULT NULL,
  `checking_state` int(11) NOT NULL DEFAULT '0' COMMENT '0 = no checked, 1= OK, 2= no OK',
  `comment` longtext,
  PRIMARY KEY (`id_university`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `university`
--

INSERT INTO `university` (`id_university`, `name`, `address`, `country`, `subscription`, `checking_state`, `comment`) VALUES
(1, 'ESIROI', 'La reunion', 'France', NULL, 0, NULL),
(2, 'Université de Paris III', 'Paris', 'France', NULL, 0, NULL),
(3, 'Université de Bordeaux II', 'Bordeaux', 'France', NULL, 0, NULL),
(4, 'Univrsidad de Cristobal', 'Madrid', 'Spain', NULL, 0, NULL),
(5, 'Universidad de PortoPaga', 'Millan', 'Italy', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `id_person` int(11) DEFAULT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `fk_users_person1_idx` (`id_person`),
  KEY `fk_users_role1_idx` (`id_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `login`, `password`, `id_person`, `id_role`) VALUES
(1, 'djothi', '2786f93d7b6fdbefa3b485bb2848cdb98665ab21', 1, 1),
(2, 'bazire', '2786f93d7b6fdbefa3b485bb2848cdb98665ab21', 2, 5);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `fk_contacts_university1` FOREIGN KEY (`id_university`) REFERENCES `university` (`id_university`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `mail`
--
ALTER TABLE `mail`
  ADD CONSTRAINT `fk_mail_contacts1` FOREIGN KEY (`id_contact`) REFERENCES `contact` (`id_contact`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `fk_table1_contacts1` FOREIGN KEY (`id_contact`) REFERENCES `contact` (`id_contact`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `recommended_by`
--
ALTER TABLE `recommended_by`
  ADD CONSTRAINT `fk_person_has_university_person1` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_person_has_university_university1` FOREIGN KEY (`id_university`) REFERENCES `university` (`id_university`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sent_newsletter_person`
--
ALTER TABLE `sent_newsletter_person`
  ADD CONSTRAINT `fk_newsletter_has_person_newsletter1` FOREIGN KEY (`id_newsletter`) REFERENCES `newsletter` (`id_newsletter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_newsletter_has_person_person1` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sent_newsletter_university`
--
ALTER TABLE `sent_newsletter_university`
  ADD CONSTRAINT `fk_university_has_newsletter_university1` FOREIGN KEY (`id_university`) REFERENCES `university` (`id_university`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_university_has_newsletter_newsletter1` FOREIGN KEY (`id_newsletter`) REFERENCES `newsletter` (`id_newsletter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_users_person1` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_role1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `user` ADD UNIQUE (
`login`
)
