# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 192.168.10.10 (MySQL 5.7.16-0ubuntu0.16.04.1)
# Database: satis
# Generation Time: 2017-02-12 02:50:53 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table answers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `answers`;

CREATE TABLE `answers` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `section_id` int(11) unsigned NOT NULL,
  `survey_id` int(11) unsigned NOT NULL,
  `question_id` int(11) unsigned NOT NULL,
  `result` text COLLATE utf8_spanish_ci NOT NULL,
  `teacher` int(11) unsigned DEFAULT NULL,
  `sports_id` int(11) unsigned DEFAULT NULL,
  `group_id` int(11) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `section_id` (`section_id`),
  KEY `survey_id` (`survey_id`),
  KEY `question_id` (`question_id`),
  KEY `user_id` (`user_id`),
  KEY `teacher` (`teacher`),
  KEY `sports_id` (`sports_id`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`),
  CONSTRAINT `answers_ibfk_4` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
  CONSTRAINT `answers_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `users_survey` (`id`),
  CONSTRAINT `answers_ibfk_6` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `abrev` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `name`, `abrev`, `created_at`, `updated_at`)
VALUES
	(1,'Generales','PG','2017-01-21 12:02:25',NULL),
	(2,'Formación Humana - Cristiana','HC','2017-01-21 12:02:25',NULL),
	(3,'Formación Académica','FA','2017-01-21 12:02:25',NULL),
	(4,'Personal Docente','PD','2017-01-21 12:02:25',NULL),
	(5,'Clima Escolar','CE','2017-01-21 12:02:25',NULL),
	(6,'Atención al Cliente','AP','2017-01-21 12:02:25',NULL),
	(7,'Instalaciones','IN','2017-01-21 12:02:25',NULL),
	(8,'Actividades Vespertinas','AV','2017-01-21 12:02:25',NULL),
	(9,'Preguntas Abiertas','PA','2017-01-21 12:02:25',NULL);

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(11) unsigned DEFAULT NULL,
  `sections_id` int(11) unsigned DEFAULT NULL,
  `surveys_id` int(11) unsigned DEFAULT NULL,
  `teachers_id` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;

INSERT INTO `comments` (`id`, `users_id`, `sections_id`, `surveys_id`, `teachers_id`, `comment`, `created_at`, `updated_at`)
VALUES
	(1,3,8,2,NULL,'sdfxsfdfsdfsdfsdf fsdf dfcdffcdf sdfdvvfbvtgbdf f fdgcfsexefe','2017-01-31 22:16:45','2017-01-31 22:16:45'),
	(2,3,9,2,NULL,'ñlk,okpk,kñkpkpkk,{ñl','2017-01-31 22:17:17','2017-01-31 22:17:17'),
	(3,4,8,2,NULL,'ELMER OMERO','2017-01-31 22:21:32','2017-01-31 22:21:32'),
	(4,6,8,2,NULL,'fdrdtxctcgcgtctgxct','2017-01-31 23:39:19','2017-01-31 23:39:19'),
	(5,6,8,2,NULL,'fdrdtxctcgcgtctgxct','2017-01-31 23:39:20','2017-01-31 23:39:20'),
	(6,6,9,2,NULL,'dtftft5fyfygy6fgdg','2017-01-31 23:39:46','2017-01-31 23:39:46'),
	(7,17,12,4,NULL,'fdgdfgdfgdf','2017-02-07 21:07:08','2017-02-07 21:07:08'),
	(8,22,10,3,NULL,'fdfsdfsdfsdfsdf','2017-02-09 18:55:00','2017-02-09 18:55:00'),
	(9,22,11,3,NULL,'rcfsdfcttttrcfd','2017-02-09 19:13:32','2017-02-09 19:13:32'),
	(10,23,10,3,NULL,'maestro barco','2017-02-09 21:21:26','2017-02-09 21:21:26'),
	(11,24,10,3,NULL,'dfdsfsdfdf','2017-02-09 21:23:42','2017-02-09 21:23:42'),
	(12,25,10,3,NULL,'maestro barco el victor','2017-02-09 21:26:43','2017-02-09 21:26:43'),
	(13,26,10,3,NULL,'mal maestro','2017-02-09 21:30:41','2017-02-09 21:30:41'),
	(14,27,10,3,NULL,'fdsfsdfsdfsd','2017-02-09 21:32:42','2017-02-09 21:32:42'),
	(15,29,10,3,NULL,'whhjyiukou','2017-02-09 21:37:28','2017-02-09 21:37:28'),
	(16,30,10,3,NULL,'xrreecCCTRTRTE','2017-02-09 21:47:27','2017-02-09 21:47:27'),
	(17,31,10,3,NULL,'fsdfsdfsdfs','2017-02-09 21:58:38','2017-02-09 21:58:38'),
	(18,32,10,3,NULL,'cxczxczxzx','2017-02-09 22:00:37','2017-02-09 22:00:37'),
	(19,32,11,3,NULL,'likljkljkljkljkljk','2017-02-09 22:04:28','2017-02-09 22:04:28'),
	(20,33,10,3,NULL,'buen maeestro','2017-02-10 17:34:53','2017-02-10 17:34:53'),
	(21,34,10,3,NULL,'fsdfsdfsdfds','2017-02-10 17:36:34','2017-02-10 17:36:34'),
	(22,35,10,3,NULL,'nono','2017-02-10 18:13:18','2017-02-10 18:13:18'),
	(23,36,10,3,NULL,'fdfsfsdfsdfsd','2017-02-10 18:15:27','2017-02-10 18:15:27'),
	(24,37,10,3,NULL,'fallo','2017-02-10 18:18:19','2017-02-10 18:18:19'),
	(25,38,10,3,NULL,'rrrrrrrrrrrrrrrrrrrrr','2017-02-10 18:20:27','2017-02-10 18:20:27'),
	(26,39,10,3,NULL,'dddddddd','2017-02-10 18:22:18','2017-02-10 18:22:18'),
	(27,40,10,3,44,'eeeeeeeeeeeeeeeeeeee','2017-02-10 18:24:23','2017-02-10 18:24:23'),
	(28,41,10,3,8,'fffffffffffffffssssssssssss','2017-02-10 18:46:41','2017-02-10 18:46:41'),
	(29,41,11,3,NULL,'ddddddddd','2017-02-10 18:49:48','2017-02-10 18:49:48'),
	(30,42,10,3,53,'ddddddddddd','2017-02-10 18:51:40','2017-02-10 18:51:40'),
	(31,43,19,7,2,'LLLLLLLLLLLLLLLLLLLLL','2017-02-10 18:53:29','2017-02-10 18:53:29'),
	(32,43,20,7,NULL,'KKKKKKKKKKKKKKKKKKKKKK','2017-02-10 18:54:13','2017-02-10 18:54:13'),
	(33,44,19,7,8,'rrrrrrrrrrrr','2017-02-10 18:57:09','2017-02-10 18:57:09'),
	(34,45,10,3,27,' dddd','2017-02-11 12:02:06','2017-02-11 12:02:06'),
	(35,100,10,3,2,' ','2017-02-11 15:51:26','2017-02-11 15:51:26'),
	(36,100,10,3,2,' ','2017-02-11 15:51:27','2017-02-11 15:51:27'),
	(37,100,11,3,NULL,' ','2017-02-11 15:51:37','2017-02-11 15:51:37'),
	(38,100,11,3,NULL,' ','2017-02-11 15:51:38','2017-02-11 15:51:38'),
	(39,101,26,10,NULL,'prueba 1','2017-02-11 20:20:22','2017-02-11 20:20:22');

/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table group_has_question
# ------------------------------------------------------------

DROP TABLE IF EXISTS `group_has_question`;

CREATE TABLE `group_has_question` (
  `group_id` int(11) unsigned NOT NULL,
  `question_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) unsigned DEFAULT NULL,
  `updated_by` int(11) unsigned DEFAULT NULL,
  KEY `index_group_id` (`group_id`),
  KEY `index_question_id` (`question_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  CONSTRAINT `group_has_question_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group_questions` (`id`),
  CONSTRAINT `group_has_question_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
  CONSTRAINT `group_has_question_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `group_has_question_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

LOCK TABLES `group_has_question` WRITE;
/*!40000 ALTER TABLE `group_has_question` DISABLE KEYS */;

INSERT INTO `group_has_question` (`group_id`, `question_id`, `created_at`, `updated_at`, `created_by`, `updated_by`)
VALUES
	(1,155,'2017-01-29 03:58:32',NULL,NULL,NULL),
	(1,156,'2017-01-29 04:02:59',NULL,NULL,NULL),
	(1,157,'2017-01-29 04:03:04',NULL,NULL,NULL),
	(1,158,'2017-01-29 04:03:13',NULL,NULL,NULL),
	(1,159,'2017-01-29 04:03:17',NULL,NULL,NULL),
	(1,160,'2017-01-29 04:03:22',NULL,NULL,NULL),
	(1,161,'2017-01-29 04:03:26',NULL,NULL,NULL),
	(1,162,'2017-01-29 04:03:31',NULL,NULL,NULL),
	(1,163,'2017-01-29 04:03:35',NULL,NULL,NULL),
	(1,164,'2017-01-29 04:03:40',NULL,NULL,NULL),
	(1,165,'2017-01-29 04:03:44',NULL,NULL,NULL),
	(1,166,'2017-01-29 04:03:47',NULL,NULL,NULL),
	(1,167,'2017-01-29 04:03:50',NULL,NULL,NULL),
	(2,204,'2017-01-29 03:58:32',NULL,NULL,NULL),
	(2,205,'2017-01-29 04:02:59',NULL,NULL,NULL),
	(2,155,'2017-01-29 04:03:04',NULL,NULL,NULL),
	(2,156,'2017-01-29 04:03:13',NULL,NULL,NULL),
	(2,157,'2017-01-29 04:03:17',NULL,NULL,NULL),
	(2,158,'2017-01-29 04:03:22',NULL,NULL,NULL),
	(2,159,'2017-01-29 04:03:26',NULL,NULL,NULL),
	(2,160,'2017-01-29 04:03:31',NULL,NULL,NULL),
	(2,161,'2017-01-29 04:03:35',NULL,NULL,NULL),
	(2,162,'2017-01-29 04:03:40',NULL,NULL,NULL),
	(2,163,'2017-01-29 04:03:44',NULL,NULL,NULL),
	(2,164,'2017-01-29 04:03:47',NULL,NULL,NULL),
	(2,165,'2017-01-29 04:03:50',NULL,NULL,NULL),
	(3,155,'2017-01-29 03:58:32',NULL,NULL,NULL),
	(3,156,'2017-01-29 04:02:59',NULL,NULL,NULL),
	(3,157,'2017-01-29 04:03:04',NULL,NULL,NULL),
	(3,158,'2017-01-29 04:03:13',NULL,NULL,NULL),
	(3,159,'2017-01-29 04:03:17',NULL,NULL,NULL),
	(3,160,'2017-01-29 04:03:22',NULL,NULL,NULL),
	(3,161,'2017-01-29 04:03:26',NULL,NULL,NULL),
	(3,162,'2017-01-29 04:03:31',NULL,NULL,NULL),
	(3,163,'2017-01-29 04:03:35',NULL,NULL,NULL),
	(3,164,'2017-01-29 04:03:40',NULL,NULL,NULL),
	(3,165,'2017-01-29 04:03:44',NULL,NULL,NULL),
	(3,166,'2017-01-29 04:03:47',NULL,NULL,NULL),
	(3,167,'2017-01-29 04:03:50',NULL,NULL,NULL),
	(4,155,'2017-01-29 03:58:32',NULL,NULL,NULL),
	(4,156,'2017-01-29 04:02:59',NULL,NULL,NULL),
	(4,157,'2017-01-29 04:03:04',NULL,NULL,NULL),
	(4,158,'2017-01-29 04:03:13',NULL,NULL,NULL),
	(4,159,'2017-01-29 04:03:17',NULL,NULL,NULL),
	(4,160,'2017-01-29 04:03:22',NULL,NULL,NULL),
	(4,161,'2017-01-29 04:03:26',NULL,NULL,NULL),
	(4,162,'2017-01-29 04:03:31',NULL,NULL,NULL),
	(4,163,'2017-01-29 04:03:35',NULL,NULL,NULL),
	(4,164,'2017-01-29 04:03:40',NULL,NULL,NULL),
	(4,165,'2017-01-29 04:03:44',NULL,NULL,NULL),
	(4,166,'2017-01-29 04:03:47',NULL,NULL,NULL),
	(4,167,'2017-01-29 04:03:50',NULL,NULL,NULL),
	(5,168,'2017-01-29 03:58:32',NULL,NULL,NULL),
	(5,169,'2017-01-29 04:02:59',NULL,NULL,NULL),
	(5,170,'2017-01-29 04:03:04',NULL,NULL,NULL),
	(5,171,'2017-01-29 04:03:13',NULL,NULL,NULL),
	(5,172,'2017-01-29 04:03:17',NULL,NULL,NULL),
	(5,173,'2017-01-29 04:03:22',NULL,NULL,NULL),
	(5,174,'2017-01-29 04:03:26',NULL,NULL,NULL),
	(5,175,'2017-01-29 04:03:31',NULL,NULL,NULL),
	(5,176,'2017-01-29 04:03:35',NULL,NULL,NULL),
	(5,177,'2017-01-29 04:03:40',NULL,NULL,NULL),
	(5,178,'2017-01-29 04:03:44',NULL,NULL,NULL),
	(5,179,'2017-01-29 04:03:47',NULL,NULL,NULL),
	(5,180,'2017-01-29 04:03:50',NULL,NULL,NULL),
	(5,181,'2017-01-29 04:03:31',NULL,NULL,NULL),
	(5,182,'2017-01-29 04:03:35',NULL,NULL,NULL),
	(5,183,'2017-01-29 04:03:40',NULL,NULL,NULL),
	(5,184,'2017-01-29 04:03:44',NULL,NULL,NULL),
	(5,185,'2017-01-29 04:03:47',NULL,NULL,NULL),
	(5,186,'2017-01-29 04:03:50',NULL,NULL,NULL),
	(5,187,'2017-01-29 04:03:50',NULL,NULL,NULL),
	(6,204,'2017-01-29 03:58:32',NULL,NULL,NULL),
	(6,205,'2017-01-29 04:02:59',NULL,NULL,NULL),
	(6,168,'2017-01-29 04:03:04',NULL,NULL,NULL),
	(6,169,'2017-01-29 04:03:13',NULL,NULL,NULL),
	(6,170,'2017-01-29 04:03:17',NULL,NULL,NULL),
	(6,171,'2017-01-29 04:03:22',NULL,NULL,NULL),
	(6,172,'2017-01-29 04:03:26',NULL,NULL,NULL),
	(6,173,'2017-01-29 04:03:31',NULL,NULL,NULL),
	(6,174,'2017-01-29 04:03:35',NULL,NULL,NULL),
	(6,175,'2017-01-29 04:03:40',NULL,NULL,NULL),
	(6,176,'2017-01-29 04:03:44',NULL,NULL,NULL),
	(6,177,'2017-01-29 04:03:47',NULL,NULL,NULL),
	(6,178,'2017-01-29 04:03:50',NULL,NULL,NULL),
	(6,179,'2017-01-29 04:03:31',NULL,NULL,NULL),
	(6,180,'2017-01-29 04:03:35',NULL,NULL,NULL),
	(6,181,'2017-01-29 04:03:40',NULL,NULL,NULL),
	(6,182,'2017-01-29 04:03:44',NULL,NULL,NULL),
	(6,183,'2017-01-29 04:03:47',NULL,NULL,NULL),
	(6,184,'2017-01-29 04:03:50',NULL,NULL,NULL),
	(6,185,'2017-01-29 04:03:50',NULL,NULL,NULL),
	(7,168,'2017-01-29 03:58:32',NULL,NULL,NULL),
	(7,169,'2017-01-29 04:02:59',NULL,NULL,NULL),
	(7,170,'2017-01-29 04:03:04',NULL,NULL,NULL),
	(7,171,'2017-01-29 04:03:13',NULL,NULL,NULL),
	(7,172,'2017-01-29 04:03:17',NULL,NULL,NULL),
	(7,173,'2017-01-29 04:03:22',NULL,NULL,NULL),
	(7,174,'2017-01-29 04:03:26',NULL,NULL,NULL),
	(7,175,'2017-01-29 04:03:31',NULL,NULL,NULL),
	(7,176,'2017-01-29 04:03:35',NULL,NULL,NULL),
	(7,177,'2017-01-29 04:03:40',NULL,NULL,NULL),
	(7,178,'2017-01-29 04:03:44',NULL,NULL,NULL),
	(7,179,'2017-01-29 04:03:47',NULL,NULL,NULL),
	(7,180,'2017-01-29 04:03:50',NULL,NULL,NULL),
	(7,181,'2017-01-29 04:03:31',NULL,NULL,NULL),
	(7,182,'2017-01-29 04:03:35',NULL,NULL,NULL),
	(7,183,'2017-01-29 04:03:40',NULL,NULL,NULL),
	(7,184,'2017-01-29 04:03:44',NULL,NULL,NULL),
	(7,185,'2017-01-29 04:03:47',NULL,NULL,NULL),
	(7,186,'2017-01-29 04:03:50',NULL,NULL,NULL),
	(7,187,'2017-01-29 04:03:50',NULL,NULL,NULL),
	(8,168,'2017-01-29 03:58:32',NULL,NULL,NULL),
	(8,169,'2017-01-29 04:02:59',NULL,NULL,NULL),
	(8,170,'2017-01-29 04:03:04',NULL,NULL,NULL),
	(8,171,'2017-01-29 04:03:13',NULL,NULL,NULL),
	(8,172,'2017-01-29 04:03:17',NULL,NULL,NULL),
	(8,173,'2017-01-29 04:03:22',NULL,NULL,NULL),
	(8,174,'2017-01-29 04:03:26',NULL,NULL,NULL),
	(8,175,'2017-01-29 04:03:31',NULL,NULL,NULL),
	(8,176,'2017-01-29 04:03:35',NULL,NULL,NULL),
	(8,177,'2017-01-29 04:03:40',NULL,NULL,NULL),
	(8,178,'2017-01-29 04:03:44',NULL,NULL,NULL),
	(8,179,'2017-01-29 04:03:47',NULL,NULL,NULL),
	(8,180,'2017-01-29 04:03:50',NULL,NULL,NULL),
	(8,181,'2017-01-29 04:03:31',NULL,NULL,NULL),
	(8,182,'2017-01-29 04:03:35',NULL,NULL,NULL),
	(8,183,'2017-01-29 04:03:40',NULL,NULL,NULL),
	(8,184,'2017-01-29 04:03:44',NULL,NULL,NULL),
	(8,185,'2017-01-29 04:03:47',NULL,NULL,NULL),
	(8,186,'2017-01-29 04:03:50',NULL,NULL,NULL),
	(8,187,'2017-01-29 04:03:50',NULL,NULL,NULL),
	(9,191,'2017-01-29 04:55:39',NULL,NULL,NULL),
	(9,192,'2017-01-29 04:55:44',NULL,NULL,NULL),
	(10,199,'2017-01-29 05:15:15',NULL,NULL,NULL),
	(10,200,'2017-01-29 05:15:19',NULL,NULL,NULL),
	(11,199,'2017-01-29 05:15:36',NULL,NULL,NULL),
	(11,200,'2017-01-29 05:15:38',NULL,NULL,NULL),
	(2,166,'2017-01-29 08:05:00',NULL,NULL,NULL),
	(2,167,'2017-01-29 08:05:14',NULL,NULL,NULL),
	(6,186,'2017-01-29 08:06:40',NULL,NULL,NULL),
	(6,187,'2017-01-29 08:06:51',NULL,NULL,NULL);

/*!40000 ALTER TABLE `group_has_question` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table group_questions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `group_questions`;

CREATE TABLE `group_questions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `panel_title` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `comments_required` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

LOCK TABLES `group_questions` WRITE;
/*!40000 ALTER TABLE `group_questions` DISABLE KEYS */;

INSERT INTO `group_questions` (`id`, `name`, `panel_title`, `description`, `comments_required`)
VALUES
	(1,'Alumnos Act Vesp. 1 (Estancia Infantil)','Estancia Infantil','Grupo de preguntas correspondientes a la Estancia Infantil.',1),
	(2,'Alumnos Act. Vesp.2 (CDE)','Club Después de la Escuela','Grupo de preguntas correspondientes al Club después de la escuela.',1),
	(3,'Alumnos Act. Vesp.3 (Club de Tareas)','Club de Tareas','Grupo de preguntas correspondientes al Club de Tareas.',1),
	(4,'Alumnos Act. Vesp.4 (Centro Idiomas)','Centro de Idiomas','Grupo de preguntas correspondientes al Centro de Idiomas.',1),
	(5,'Padres Act Vesp. 1 (Estancia Infantil)','Estancia Infantil','Grupo de preguntas correspondientes a la Estancia Infantil.',1),
	(6,'Padres Act. Vesp.2 (CDE)','Club Después de la Escuela','Grupo de preguntas correspondientes al Club después de la escuela.',1),
	(7,'Padres Act. Vesp.3 (Club de Tareas)','Club de Tareas','Grupo de preguntas correspondientes al Club de Tareas.',1),
	(8,'Padres Act. Vesp.4 (Centro Idiomas)','Centro de Idiomas','Grupo de preguntas correspondientes al Centro de Idiomas.',1),
	(9,'Act. Vesp (Ult. Pregunta)',NULL,'Grupo de preguntas para la respuesta de NO en Act. Vesp.',0),
	(10,'Abiertas Alumnos Cambio Colegio',NULL,'Grupo de Preguntas de la Sección 3 de cambio de colegio.',0),
	(11,'Abiertas Padres Cambio Colegio',NULL,'Grupo de Preguntas de la Sección 3 de cambio de colegio.',0);

/*!40000 ALTER TABLE `group_questions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table questions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `question_type` int(10) unsigned DEFAULT NULL,
  `description` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `options` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `required` tinyint(4) NOT NULL DEFAULT '1',
  `rule_id` int(11) unsigned DEFAULT NULL,
  `init_hidden` int(1) DEFAULT '0',
  `disable_on_change` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_type_index` (`question_type`),
  KEY `rule_id` (`rule_id`),
  CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`rule_id`) REFERENCES `rules` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;

INSERT INTO `questions` (`id`, `question_type`, `description`, `options`, `required`, `rule_id`, `init_hidden`, `disable_on_change`, `created_at`, `updated_at`)
VALUES
	(1,1,'Los baños',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(2,1,'El salón de clases',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(3,1,'Las áreas de juegos',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(4,1,'Los jardines',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(5,1,'Las canchas',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(6,1,'Los bancos y sillas',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(7,1,'El pizarrón, las grabadoras, la televisión',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(8,1,'La limpieza del colegio',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(9,1,'La seguridad de las instalaciones',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(10,1,'La Presentación personal',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(11,1,'El buen ejemplo que nos da',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(12,1,'La puntualidad y asistencia a su lugar de trabajo y las actividades',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(13,1,'El trato amable y respetuoso',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(14,1,'La forma en que nos enseña',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(15,1,'La manera en que nos evalúa',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(16,1,'La forma en que platica conmigo cuando tengo problemas o dudas',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(17,1,'Como nos enseña a trabajar en equipo',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(18,1,'La manera en que me enseñan a portarme bien y respetar a los demás',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(19,1,'La forma en que me llama la atención',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(20,1,'La justicia en la aplicación del reglamento',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(21,1,'Lo que me enseñan en el Colegio',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(22,1,'La forma en que aprendo',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(23,1,'Las actividades extracurriculares',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(24,1,'Las tareas',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(25,1,'Como me enseñan a investigar',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(26,1,'La formación en valores',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(27,1,'Educación en la Fe - Catecismo',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(28,1,'Las actividades litúrgicas: Momento Mariano, Peregrinación, retiro',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(29,1,'La participación en las obras de caridad',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(30,5,'¿Cuál fue la razón por la que tus padres nos eligieron?',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(31,5,'¿Estás de acuerdo con su decisión? ¿Por qué?',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(32,4,'¿Recomendarías tu Colegio a un amigo/conocido/familiar?','Si,No',1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(33,5,'¿Por qué?',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(34,5,'¿Qué es lo que más te agrada de nuestro Colegio?',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(35,5,'¿Qué es lo que menos te agrada de tu Colegio?',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(36,4,'¿Te gustaría cambiarte a otro Colegio?','Si,No',1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(37,5,'¿A cuál?',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(38,5,'¿Por qué?',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(39,3,'Formación Humana - Cristiana',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(40,3,'Formación Académica',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(41,3,'Personal Docente',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(42,3,'Clima Escolar',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(43,3,'Atención al Alumno',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(44,3,'Instalaciones',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(45,4,'Seleccione la característica que considere que es la MÁS IMPORTANTE para usted.','Formación Humana - Cristiana,Formación Académica,Personal Docente,Clima Escolar,Atención al Alumno,Instalaciones',1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(46,2,'La formación integral que recibo en el Colegio.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(47,2,'La forma en que me enseñan a vivir y practicar los valores.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(48,2,'La forma en que la clase de Educación de la fe me ha ayudado a acercarme más a Dios.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(49,2,'La manera en que la formación católica que he recibido me ha ayudado en mi vida familiar.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(50,2,'La manera en que el Colegio me ayuda a sensibilizarme a las necesiades de los demás a través de mi participación en obras de caridad, de ayuda o campañas de solidaridad.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(51,2,'Mi participación en los grupos apostólicos que promueve el Colegio (Vanclar, Movimiento Infantil y Juvenil Lasallista).',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(52,2,'El crecimiento en la fe que he experimentado al estar en un Colegio católico.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(53,2,'Qué tan contento estoy de estudiar en un Colegio católico.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(54,2,'El conocimiento que tengo del tipo de persona que la institución desea formar (perfil de egreso).',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(55,2,'El plan o programa de estudios de nivel y grado que curso.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(56,2,'La variedad de actividades (deportivas, culturales, recreativas, sociales, religiosas) en las que participé en este ciclo escolar (visitas a otras escuelas, torneos, concursos, muestras, etc.)',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(57,2,'El desarrollo de mis habilidades matemáticas.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(58,2,'El desarrollo de mis habilidades de investigación.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(59,2,'El desarrollo de mis habilidades de comunicación (hablar, leer, escuchar, escribir) en el idioma inglés.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(60,2,'El desarrollo de mis habilidades de comunicación (hablar, leer, escuchar, escribir) en el idioma español.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(61,2,'El desarrollo de mis habilidades para el uso de la computadora.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(62,2,'El desarrollo de mis habilidades físicas (educación física, deportes).',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(63,2,'El desarrollo de mis habilidades artísticas.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(64,2,'El nivel de desarrollo de mis habilidades del pensamiento.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(65,2,'El desarrollo de mis habilidades para aprender a aprender.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(66,2,'El desarrollo de hábitos para mi cuidado personal, de la salud y del medio ambiente.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(67,2,'El desarrollo de hábitos de estudio.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(68,2,'La orientación que recibo para atender los problemas o situaciones que enfrento durante mi proceso de formación.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(69,2,'La forma en que mis maestros se preocupan y me ayudan a relacionarme mejor.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(70,2,'La forma en que el Colegio me ha ayudado para desarrollar mi creatividad.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(71,2,'La forma en que el Colegio me ha ayudado a mejorar en mi desarrollo social y personal.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(72,2,'La forma en que me siento preparado para ingresar al siguiente grado o nivel.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(73,2,'La cantidad de tarea diaria que me encargan.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(74,8,'Maestro Asignado:',NULL,1,NULL,NULL,NULL,'2017-01-23 13:47:31',NULL),
	(75,2,'La experiencia y preparación que tiene.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(76,2,'La presentación personal.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(77,2,'La puntualidad y asistencia a sus compromisos de trabajo.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(78,2,'El reconocimiento que recibo de él cuando me esfuerzo y hago bien las cosas.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(79,2,'La forma en que acepta las sugerencias, opiniones o quejas realizadas por alumnos.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(80,2,'La habilidad que tiene para motivarnos a realizar nuestro mejor esfuerzo.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(81,2,'La forma en que prepara y da sus clases.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(82,2,'El material y recursos que utiliza para hacer la clase más atractiva.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(83,2,'La forma en que evalúa y asigna calificaciones.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(84,2,'La capacidad de respuesta a nuestras inquietudes y dudas.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(85,2,'La forma en que se relaciona conmigo y con mis compañeros.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(86,2,'La forma en que vigila mi aprendizaje al momento de dar clases.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(87,2,'La forma en que promueve que todo el grupo participe en su clase.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(88,2,'El interés que demuestra por conocerme mejor.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(89,2,'La forma en que me ha ayudado a aprender a estudiar.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(90,2,'El apoyo y comprensión que he recibido de él durante este ciclo escolar.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(91,2,'La forma respetuosa en que me trata, aún y cuando me llama la atención.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(92,2,'La forma en la que mantiene un ambiente de disciplina durante las actividades dentro y fuera del aula.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(93,2,'La forma en que organiza y revisa las tareas.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(94,2,'La forma en que lleva a cabo el seguimiento de mi avance académico.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(95,2,'La forma en que está al pendiente de mi conducta y disciplina.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(96,2,'La forma en que dialoga conmigo y mis papás para que me ayuden a mejorar.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(97,2,'La forma en que utiliza los recursos tecnológicos',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(98,2,'El nivel de conocimiento que tengo del Colegio (historia, vida y obra de sus fundadores, el ideario, la misión, visión y los valores).',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(99,2,'Las amistades que he establecido a lo largo de mi estancia en el Colegio.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(100,2,'La forma en que me siento aceptado y valorado por mis compañeros de clase.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(101,2,'La forma respetuosa en la que me tratan mis compañeros.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(102,2,'Las disposiciones y sanciones que contempla el reglamento escolar.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(103,2,'La justicia y equidad en la aplicación del reglamento.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(104,2,'La vigilancia permanente del cumplimiento del reglamento.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(105,2,'El ambiente de disciplina que hay en el Colegio.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(106,2,'La vivencia y práctica de los valores por parte de los padres de familia del Colegio.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(107,2,'La vivencia y práctica de los valores por parte del personal del Colegio.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(108,2,'El interés que siento por venir al Colegio.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(109,2,'El orgullo que siento de pertenecer a este Colegio.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(110,2,'El espíritu de colaboración y compañerismo entre el personal.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(111,2,'El comportamiento y la disciplina de mis compañeros.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(112,2,'La igualdad en el trato que se da a todos los alumnos.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(113,2,'El nivel de confianza que tengo para expresar al personal del colegio mis problemas o preocupaciones.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(114,2,'El respeto que los alumnos demuestran por el personal del Colegio.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(115,2,'El respeto que el personal demuestra por los alumnos y padres de familia.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(116,2,'El respeto que los padres de familia demuestran por el personal del Colegio.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(117,2,'El respeto por los compañeros que tienen alguna discapacidad.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(118,2,'La atención y respuesta a las opiniones, quejas, preguntas o necesidades.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(119,2,'La disponibilidad y accesibilidad del personal para atender a los alumnos.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(120,2,'El interés del personal por mis preocupaciones o necesidades.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(121,2,'El trato amable y respetuoso del personal que nos atiende (directivo, secretaria, psicólogas, mantenimiento e indendencia).',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(122,2,'El compromiso del colegio con la calidad y la mejora continua.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(123,2,'El apoyo y asesoría que me dan cuando tengo problemas académicos.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(124,2,'La organización para la entrada y salida de los alumnos.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(125,2,'El uniforme escolar.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(126,2,'Los libros y útiles escolares.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(127,2,'El Sistema Integral de Comunicación e Información SICI.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(128,2,'La Página Electrónica Institucional (www.cecac.edu.mx).',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(129,2,'La Página de Facebook del Colegio.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(130,2,'La Plataforma EDUCAMOS.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(131,2,'El Programa de Escuela para Padres.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(132,2,'La biblioteca (contestar solo si se cuenta con el servicio).',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(133,2,'El departamento o área de psicología.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(134,2,'El nivel académico del servicio educativo que recibo en comparación con otros colegios.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(135,2,'La participación y asistencia de los padres de familia en las actividades escolares.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(136,2,'El grado nutricional de los alimentos que ofrecen en la tiendita escolar.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(137,2,'La forma en que el Colegio mejoró en comparación con el año pasado.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(138,2,'Los baños.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(139,2,'Mi salón de clases.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(140,2,'Las áreas de descanso o recreo.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(141,2,'Las áreas verdes.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(142,2,'Las canchas.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(143,2,'Las condiciones del salón de computación.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(144,2,'Las condiciones del mobiliario (bancos, escritorios, pizarrones, etc.)',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(145,2,'Las condiciones de los equipos (computadoras, grabadoras, proyectores y pantallas).',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(146,2,'La iluminación de las áreas.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(147,2,'El nivel de ruido.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(148,2,'La limpieza de las instalaciones.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(149,2,'La temperatura ambiente del salón de clases.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(150,2,'El orden de los espacios y las distintas áreas.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(151,2,'Las condiciones de seguridad de las instalaciones.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(152,2,'Las mejoras que se han realizado a los edificios, mobiliarios y equipos.',NULL,1,NULL,NULL,NULL,'2017-01-21 12:02:25',NULL),
	(153,4,'¿Estás inscrito en alguna de las actividades vespertinas que ofrece el CECAC? ','Si,No',1,1,NULL,NULL,'2017-01-29 03:49:21',NULL),
	(154,5,'¿Por qué motivo?',NULL,0,NULL,1,NULL,'2017-02-01 03:06:10',NULL),
	(155,2,'Lo que he aprendido.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:04:12',NULL),
	(156,2,'La experiencia y preparación que tiene el personal.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:04:16',NULL),
	(157,2,'La puntualidad y asistencia del personal.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:04:18',NULL),
	(158,2,'El interés que demuestra el maestro por los alumnos.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:04:24',NULL),
	(159,2,'La forma en la que mantiene un ambiente de disciplina durante las actividades dentro y fuera del aula.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:04:23',NULL),
	(160,2,'El agrado que siento por asistir a mis actividades.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:04:23',NULL),
	(161,2,'La capacidad de atención y respuesta a las opiniones, quejas, preguntas o necesidades.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:04:22',NULL),
	(162,2,'El trato amable y respetuoso del personal.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:04:21',NULL),
	(163,2,'La organización para la entrada y salida de los alumnos.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:04:20',NULL),
	(164,2,'La organización de eventos y actividades.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:04:20',NULL),
	(165,2,'El cumplimiento del horario.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:04:19',NULL),
	(166,2,'Las condiciones de los espacios físicos que se utilizan para el desarrollo de las actividades extracurriculares.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:04:18',NULL),
	(167,2,'Las condiciones de seguridad.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:04:15',NULL),
	(168,2,'El programa o plan de trabajo.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:04:53',NULL),
	(169,2,'El nivel de satisfacción con lo aprendido.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:04:54',NULL),
	(170,2,'La experiencia y preparación que tiene el personal para ejercer su función.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:04:55',NULL),
	(171,2,'La puntualidad y asistencia del personal.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:04:56',NULL),
	(172,2,'El interés que demuestra el maestro por los alumnos.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:04:57',NULL),
	(173,2,'La forma en la que mantiene un ambiente de disciplina durante las actividades dentro y fuera del aula.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:04:57',NULL),
	(174,2,'La forma en que nos retroalimentan del avance y logros.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:05:03',NULL),
	(175,2,'La forma respetuosa en la que tratan los compañeros a su hijo.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:05:04',NULL),
	(176,2,'El interés por asistir a sus actividades.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:05:05',NULL),
	(177,2,'La capacidad de atención y respuesta a las opiniones, quejas, preguntas o necesidades.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:05:05',NULL),
	(178,2,'El trato amable y respetuoso del personal.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:05:06',NULL),
	(179,2,'El compromiso que reflejan con la calidad y la mejora continua.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:05:07',NULL),
	(180,2,'La organización para la entrada y salida de los alumnos.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:05:08',NULL),
	(181,2,'La organización de eventos y actividades.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:05:09',NULL),
	(182,2,'El cumplimiento del horario.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:05:11',NULL),
	(183,2,'La forma en que nos mantienen informados.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:05:12',NULL),
	(184,2,'La calidad del servicio que recibo en comparación con otros.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:05:13',NULL),
	(185,2,'El costo del servicio que recibo en comparación con otros.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:05:14',NULL),
	(186,2,'Las condiciones de los espacios físicos que se utilizan para el desarrollo de las actividades extracurriculares.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:05:15',NULL),
	(187,2,'Las condiciones de seguridad de las instalaciones.',NULL,0,NULL,NULL,NULL,'2017-02-01 03:05:16',NULL),
	(188,4,'¿Su hijo(a) está inscrito en alguno de las actividades vespertinas que ofrece el CECAC?','Si,No',1,7,NULL,NULL,'2017-02-11 22:10:04',NULL),
	(189,4,'¿Cuál?  Seleccione para calificar.','Estancia Infantil,Club Después de la Escuela,Club de Tareas,Centro de Idiomas',0,2,1,1,'2017-02-12 01:48:13',NULL),
	(190,4,'¿Practicas alguna actividad extracurricular por las tardes o los fines de samana fuera de las que ofrece el CECAC?','Si,No',1,3,NULL,NULL,'2017-01-29 04:52:35',NULL),
	(191,5,'¿Cuál?',NULL,0,NULL,NULL,NULL,'2017-02-01 03:05:57',NULL),
	(192,5,'¿Dónde?',NULL,0,NULL,NULL,NULL,'2017-02-01 03:05:59',NULL),
	(193,6,'¿Cuál es la razón por la que tus padres eligieron este Colegio para tí?',NULL,1,NULL,NULL,NULL,'2017-01-29 05:03:32',NULL),
	(194,4,'¿Recomendarías tu Colegio a un amigo/conocido/familiar?','Si,No',1,8,NULL,NULL,'2017-02-12 02:02:14',NULL),
	(195,6,'¿Por qué si?',NULL,0,NULL,1,NULL,'2017-02-12 02:05:29',NULL),
	(196,6,'Menciona el aspecto que más te agrade de nuestro Colegio:',NULL,1,NULL,NULL,NULL,'2017-01-29 05:05:01',NULL),
	(197,6,'Menciona el aspecto que consideres sea urgente e importante mejorar',NULL,1,NULL,NULL,NULL,'2017-01-29 05:05:03',NULL),
	(198,4,'¿Si tuvieras oportunidad te cambiarías a otro Colegio?','Si,No',1,4,NULL,NULL,'2017-02-11 22:03:25',NULL),
	(199,5,'¿A cuál?',NULL,0,NULL,NULL,NULL,'2017-02-01 03:08:08',NULL),
	(200,6,'¿Por qué motivo?',NULL,0,NULL,0,NULL,'2017-02-11 23:26:43',NULL),
	(201,10,'Si opinas que no estamos considerando un tema relevante descríbelo en el siguiente cuadro.',NULL,0,NULL,NULL,NULL,'2017-02-11 20:52:20',NULL),
	(202,5,'Tema:',NULL,0,NULL,NULL,NULL,'2017-01-29 05:12:32',NULL),
	(203,6,'Sugerencia:',NULL,0,NULL,NULL,NULL,'2017-01-29 05:12:33',NULL),
	(204,9,'¿Cuál de las actividades vespertinas te agrada más?','sports',0,NULL,NULL,NULL,'2017-02-12 00:42:40',NULL),
	(205,4,'Selecciona una actividad en la que estás y quieras calificar en la sección de abajo:','sports',0,NULL,NULL,NULL,'2017-02-12 00:41:07',NULL),
	(206,2,'La formación integral que su hijo(a) recibe en el Colegio.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:26:30',NULL),
	(207,2,'La forma en que la educación recibida en el Colegio enriquece la formación recibida en casa.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:26:36',NULL),
	(208,2,'El grado en que la formación que recibe en el Colegio influye para que actúe como un agente de cambio en la familia y en su entorno.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:26:40',NULL),
	(209,2,'La forma en que le enseñamos a vivir y practicar los valores.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:26:43',NULL),
	(210,2,'La forma en que la clase de Educación de la Fe le ha ayudado a acercarse más a Dios.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:26:57',NULL),
	(211,2,'La forma en que las Asesorías para clase de Educación en la Fe le han ayudado en su vida e impartición de la clase.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:27:02',NULL),
	(212,2,'La congruencia entre los valores que promueve la Institución y lo que se vive.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:27:04',NULL),
	(213,2,'La manera en que la formación católica les ha ayudado en su vida familiar.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:30:35',NULL),
	(214,2,'La forma en que el Colegio les ayuda a sensibilizarse a las necesidades de los demás a través de su participación en obras de caridad, de ayuda o campañas de solidaridad.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:30:39',NULL),
	(215,2,'La participación de su hijo(a) en los grupos apostólicos que promueve el Colegio (Vanclar, Movimiento Infantil y Juvenil Lasallista).',NULL,1,NULL,NULL,NULL,'2017-02-08 00:30:48',NULL),
	(216,2,'El nivel de satisfacción en el Programa Protege tu Corazón.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:31:02',NULL),
	(217,2,'El crecimiento en la Fe que su hijo(a) ha experimentado al estar en un colegio católico.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:31:06',NULL),
	(218,2,'El ambiente de colegio católico que proyecta nuestra Comunidad Educativa.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:31:09',NULL),
	(219,2,'La oportunidad de formación en la fe para padres de familia: Diplomado en Teología, Escuela Bíblica.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:31:13',NULL),
	(220,2,'El conocimiento que tienen del tipo de persona que la Institución desea formar (Perfil de Egreso).',NULL,1,NULL,NULL,NULL,'2017-02-08 00:31:18',NULL),
	(221,2,'El nivel de conocimiento que tienen del plan de estudios del grado y nivel que cursa su hijo.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:31:21',NULL),
	(222,2,'El plan o programa de estudios del nivel y grado que cursa su hijo(a).',NULL,1,NULL,NULL,NULL,'2017-02-08 00:31:39',NULL),
	(223,2,'El conocimiento que tienen del enfoque y el modelo pedagógico (forma en la que enseña el maestro y en la que aprende el alumno) que promueve la Institución',NULL,1,NULL,NULL,NULL,'2017-02-08 00:31:45',NULL),
	(224,2,'La variedad de actividades (deportivas, culturales, recreativas, sociales, religiosas) en las que su hijo(a) participó en este ciclo escolar (visitas a otras escuelas, torneos, concursos, muestras, etc.)',NULL,1,NULL,NULL,NULL,'2017-02-08 00:31:49',NULL),
	(225,2,'El desarrollo de sus habilidades matemáticas.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:31:53',NULL),
	(226,2,'El desarrollo de sus habilidades de investigación.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:31:57',NULL),
	(227,2,'El desarrollo de sus habilidades de comunicación (hablar, leer, escuchar, escribir) en el idioma inglés.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:32:00',NULL),
	(228,2,'El desarrollo de sus habilidades de comunicación (hablar, leer, escuchar, escribir) en el idioma español.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:32:04',NULL),
	(229,2,'El desarrollo de sus habilidades para el uso de la computadora.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:32:07',NULL),
	(230,2,'El desarrollo de sus habilidades físicas (educación física, deportes).',NULL,1,NULL,NULL,NULL,'2017-02-08 00:32:15',NULL),
	(231,2,'El desarrollo de sus habilidades artísticas.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:35:06',NULL),
	(232,2,'El nivel de desarrollo de sus habilidades del pensamiento.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:35:09',NULL),
	(233,2,'El desarrollo de sus habilidades para aprender a aprender.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:35:13',NULL),
	(234,2,'La forma en que la escuela apoya la formación en hábitos para sus cuidado personal, de la salud y del medio ambiente.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:35:21',NULL),
	(235,2,'El desarrollo de hábitos de estudio.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:35:24',NULL),
	(236,2,'La orientación que recibo para atender los problemas o situaciones que su hijo(a) enfrenta durante su proceso de formación.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:35:29',NULL),
	(237,2,'La forma en que sus maestros se preocupan y le ayudan a relacionarse mejor.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:35:32',NULL),
	(238,2,'La forma en que le enseñan ha favorecido para desarrollar su creatividad.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:35:35',NULL),
	(239,2,'La forma en que el colegio le ha ayudado a mejorar en su desarrollo social y personal.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:35:37',NULL),
	(240,2,'La preparación que recibió en este ciclo escolar para ingresar al siguiente grado o nivel.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:35:42',NULL),
	(241,2,'La forma en que planean y organizan las tareas y horas de estudio en casa.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:40:01',NULL),
	(242,2,'La forma en que han mejorado los planes y programas de estudio.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:40:25',NULL),
	(243,2,'La experiencia y preparación que tiene para ejercer su función.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:40:51',NULL),
	(244,2,'La presentación personal.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:42:27',NULL),
	(245,2,'La puntualidad y asistencia a sus compromisos de trabajo ( juntas, actividades extracurriculares, clase diaria, etc.).',NULL,1,NULL,NULL,NULL,'2017-02-08 00:43:23',NULL),
	(246,2,'La actitud que demuestra en relación a su profesión.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:46:09',NULL),
	(247,2,'La forma en que recibe las sugerencias, opiniones o quejas realizadas por alumnos o padres de familia.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:46:09',NULL),
	(248,2,'La habilidad que tiene para motivarnos a realizar nuestro mejor esfuerzo como padres de familia.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:46:09',NULL),
	(249,2,'El agrado que demuestra mi hijo(a) por la forma en que da sus clases.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:46:09',NULL),
	(250,2,'La forma en que evalúa y asigna calificaciones.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:46:09',NULL),
	(251,2,'La capacidad de respuesta a nuestras inquietudes y dudas.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:46:09',NULL),
	(252,2,'La forma en que se relaciona con los padres de familia.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:46:09',NULL),
	(253,2,'La forma en que promueve que los padres de familia del grupo participen.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:46:09',NULL),
	(254,2,'El interés que demuestra el maestro por mi hijo(a).',NULL,1,NULL,NULL,NULL,'2017-02-08 00:46:09',NULL),
	(255,2,'La forma en que ha ayudado a mi hijo(a) a aprender a estudiar.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:46:09',NULL),
	(256,2,'El apoyo y comprensión que he recibido del maestro durante este ciclo escolar.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:46:09',NULL),
	(257,2,'La forma respetuosa en la que trata a mi hijo(a), aún y cuando le llama la atención.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:46:09',NULL),
	(258,2,'La forma en la que mantiene un ambiente de disciplina durante las actividades dentro y fuera del aula.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:46:09',NULL),
	(259,2,'La forma en que organiza y revisa las tareas.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:46:09',NULL),
	(260,2,'La forma en que lleva a cabo revisiones periódicas del avance académico de mi hijo(a).',NULL,1,NULL,NULL,NULL,'2017-02-08 00:46:09',NULL),
	(261,2,'La forma en que lleva a cabo revisiones periódicas del avance disciplinario de mi hijo(a).',NULL,1,NULL,NULL,NULL,'2017-02-08 00:46:09',NULL),
	(262,2,'La forma en que dialoga con nosotros para definir juntos estrategias que le ayuden a mejorar.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:46:09',NULL),
	(263,2,'El conocimiento que tengo de la metodología y criterios que aplica el maestro para evaluar.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:46:09',NULL),
	(264,2,'El modo en el que conduce las entrevistas con los padres de familia',NULL,1,NULL,NULL,NULL,'2017-02-08 00:46:09',NULL),
	(265,2,'El ambiente de convivencia entre los miembros de la Comunidad Educativa: personal, padres de familia y alumnos.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:46:09',NULL),
	(266,2,'Las amistades que mi hijo(a) ha establecido a lo largo de su estancia en el Colegio.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:46:09',NULL),
	(267,2,'La forma en que se siente aceptado y valorado por sus compañeros de clases.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:46:09',NULL),
	(268,2,'La forma respetuosa en la que lo tratan sus compañeros de salón.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:46:09',NULL),
	(269,2,'Las disposiciones y sanciones que contempla el reglamento escolar.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:46:09',NULL),
	(270,2,'La justicia y equidad en la aplicación del reglamento.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:47:41',NULL),
	(271,2,'La vigilancia permanente del cumplimiento del reglamento.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:47:41',NULL),
	(272,2,'El conocimiento que tengo del estilo de disciplina que el Colegio promueve.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:47:41',NULL),
	(273,2,'El ambiente de disciplina que hay en el Colegio.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:47:41',NULL),
	(274,2,'La vivencia y práctica de los valores por parte de los padres de familia del Colegio.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:47:41',NULL),
	(275,2,'La vivencia y práctica de los valores por parte del personal del Colegio.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:47:41',NULL),
	(276,2,'El interés que mi hijo(a) demuestra por venir al Colegio.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:47:41',NULL),
	(277,2,'El orgullo que siento de pertenecer a este Colegio.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:47:41',NULL),
	(278,2,'El espíritu de colaboración y compañerismo entre el personal y los padres de familia del Colegio.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:47:41',NULL),
	(279,2,'El comportamiento y la disciplina de los alumnos del Colegio.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:47:41',NULL),
	(280,2,'La igualdad en el trato que se da a todos los alumnos.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:47:41',NULL),
	(281,2,'El respeto que los alumnos demuestran por el personal del Colegio.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:47:41',NULL),
	(282,2,'El respeto que el personal demuestra por los alumnos y padres de familia.',NULL,1,NULL,NULL,NULL,'2017-02-08 00:47:41',NULL),
	(283,2,'El respeto que los padres de familia demuestran por el personal del Colegio.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:40:27',NULL),
	(284,2,'El respeto por los alumnos con alguna discapacidad.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:45:00',NULL),
	(285,2,'El nivel de conocimiento que tengo del Colegio (historia, vida y obra de sus fundadores, el ideario, la misión, visión y los valores).',NULL,1,NULL,NULL,NULL,'2017-02-08 18:45:00',NULL),
	(286,2,'La forma en que me siento identificado con la filosofía institucional.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:49:46',NULL),
	(287,2,'El contar con alumnos de necesidades educativas especiales como compañeros de mi hijo(a).',NULL,1,NULL,NULL,NULL,'2017-02-08 18:49:46',NULL),
	(288,2,'Los medios o canales que tienen para atender mis necesidades, quejas o sugerencias, o solicitudes de información.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:49:46',NULL),
	(289,2,'La capacidad de atención y respuesta del Colegio a las opiniones, quejas, preguntas o necesidades.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:49:46',NULL),
	(290,2,'La disponibilidad y accesibilidad del personal para atender a los padres de familia.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:49:46',NULL),
	(291,2,'El interés del personal por mis preocupaciones o necesidades.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:49:46',NULL),
	(292,2,'El trato amable y respetuoso del personal que los atiende (directivo, administrativo, secretaria, psicólogas, mantenimiento e indendencia).',NULL,1,NULL,NULL,NULL,'2017-02-08 18:49:46',NULL),
	(293,2,'La percepción que tengo de que lo más importante para el personal del Colegio son los alumnos.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:49:46',NULL),
	(294,2,'El compromiso de la Institución con la calidad y la mejora continua.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:49:46',NULL),
	(295,2,'La organización para la entrada y salida de los alumnos.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:49:46',NULL),
	(296,2,'La organización de eventos y actividades.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:49:46',NULL),
	(297,2,'El uniforme escolar.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:49:46',NULL),
	(298,2,'Los libros y útiles escolares.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:49:46',NULL),
	(299,2,'El Sistema Integral de Comunicación e Información SICI.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:49:46',NULL),
	(300,2,'La Página Electrónica Institucional (www.cecac.edu.mx).',NULL,1,NULL,NULL,NULL,'2017-02-08 18:49:46',NULL),
	(301,2,'La Página de Facebook del Colegio.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:49:46',NULL),
	(302,2,'La Plataforma EDUCAMOS.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:49:46',NULL),
	(303,2,'El servicio de atención telefónica.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:49:46',NULL),
	(304,2,'El Programa de Escuela para Padres.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:49:46',NULL),
	(305,2,'El Programa de Salud y Nutrición.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:49:46',NULL),
	(306,2,'La biblioteca (contestar solo si se cuenta con el servicio).',NULL,1,NULL,NULL,NULL,'2017-02-08 18:49:46',NULL),
	(307,2,'El departamento o área de psicología.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:49:46',NULL),
	(308,2,'El Club Después de la Escuela (antes CEDECU).',NULL,1,NULL,NULL,NULL,'2017-02-08 18:49:46',NULL),
	(309,2,'El Centro de Idiomas.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:49:46',NULL),
	(310,2,'La Estancia Infantil.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:49:46',NULL),
	(311,2,'El Club de Tareas.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(312,2,'El trabajo realizado por la Sociedad de Padres de Familia.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(313,2,'El cumplimiento del horario de clases.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(314,2,'La información emitida por el Colegio a través de circulares.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(315,2,'El nivel de cumplimiento del Calendario Escolar Institucional.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(316,2,'El proceso de inscripción y/o reinscripción.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(317,2,'La información recibida al ingresar al Colegio o al siguiente grado o nivel.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(318,2,'Las juntas de entrega de calificaciones.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(319,2,'El servicio de caja.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(320,2,'El horario de atención del Colegio a padres de familia.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(321,2,'El horario de atención de la unidad administrativa a padres de familia.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(322,2,'El nivel académico del servicio educativo que recibo en comparación con otros colegios.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(323,2,'El costo del colegio en comparación con otros.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(324,2,'El apoyo que ofrece el Colegio a través de charlas, cursos, conferencia a los padres de familia para su formación y actualización como los principales responsables de la formación de sus hijos.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(325,2,'La participación y asistencia de los padres de familia en las actividades escolares.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(326,2,'La seguridad de los alumnos en el Colegio.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(327,2,'El grado nutricional de los alimentos que ofrecen en la tiendita escolar.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(328,2,'La forma en que el colegio ha mejorado.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(329,2,'La fachada de las instalaciones.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(330,2,'Las condiciones de los baños.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(331,2,'De los salones de clases.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(332,2,'De las áreas recreativas.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(333,2,'De las áreas verdes.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(334,2,'De las canchas.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(335,2,'De las áreas exteriores.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(336,2,'Del salón de computación.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(337,2,'Del laboratorio de ciencias.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(338,2,'Del mobiliario (bancos, escritorios, pizarrones, etc.).',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(339,2,'De los equipos (computadoras, grabadoras, proyectores, pantallas).',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(340,2,'La iluminación de las áreas.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(341,2,'El nivel de ruido.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(342,2,'La limpieza de las instalaciones.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(343,2,'La temperatura ambiente del salón de clases.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(344,2,'El orden de los espacios y las distintas áreas.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(345,2,'Las condiciones de seguridad de las instalaciones.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(346,2,'La congruencia del tipo de instalaciones con el servicio educativo que se ofrece.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(347,2,'La suficiencia de las instalaciones para la atención adecuada de los alumnos y sus familiares.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(348,2,'Las mejoras que se han realizado a los edificios, mobiliarios y equipos.',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(349,4,'¿Su hijo(a) practica alguna actividad extracurricular por las tardes o los sábados fuera de las que ofrece el CECAC?','Si,No',1,3,NULL,NULL,'2017-02-11 21:58:35',NULL),
	(350,6,'¿Cuál fue la razón por la que nos eligió?',NULL,1,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(351,4,'¿Recomendaría nuestra institución a un amigo/conocido/familiar?','Si,No',1,9,NULL,NULL,'2017-02-12 02:07:21',NULL),
	(352,6,'¿Por qué si?',NULL,0,NULL,1,NULL,'2017-02-12 02:06:41',NULL),
	(353,6,'Mencione el aspecto que más le agrade de nuestro Colegio:',NULL,1,NULL,NULL,NULL,'2017-02-11 21:58:35',NULL),
	(354,6,'Mencione el aspecto que considere sea urgente e importante mejorar:',NULL,1,NULL,NULL,NULL,'2017-02-11 21:58:35',NULL),
	(355,4,'¿Si tuviera la oportunidad se cambiaría a otro Colegio?','Si,No',1,6,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(357,6,'¿Por qué motivo?',NULL,0,NULL,1,NULL,'2017-02-08 18:52:16',NULL),
	(358,10,'Si opinas que no estamos considerando un tema relevante descríbelo en el siguiente cuadro.',NULL,0,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(359,5,'Tema:',NULL,0,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(360,6,'Sugerencia:',NULL,0,NULL,NULL,NULL,'2017-02-08 18:52:16',NULL),
	(361,4,'¿Cuál?  Seleccione para calificar.','Estancia Infantil,Club Después de la Escuela,Club de Tareas,Centro de Idiomas',0,5,1,1,'2017-02-12 02:22:34',NULL),
	(362,6,'¿Por qué no?',NULL,0,NULL,1,NULL,'2017-02-12 02:05:38',NULL),
	(363,6,'¿Por qué no?',NULL,0,NULL,1,NULL,'2017-02-12 02:08:56',NULL);

/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table questions_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `questions_type`;

CREATE TABLE `questions_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `high_rank` int(11) NOT NULL,
  `na_active` int(11) NOT NULL,
  `typehead_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

LOCK TABLES `questions_type` WRITE;
/*!40000 ALTER TABLE `questions_type` DISABLE KEYS */;

INSERT INTO `questions_type` (`id`, `name`, `high_rank`, `na_active`, `typehead_type`)
VALUES
	(1,'Escala Calificación 1',3,0,NULL),
	(2,'Escala Calificación 2',5,1,NULL),
	(3,'Escala Calificación 3',10,0,NULL),
	(4,'Selector',0,0,NULL),
	(5,'Abierta corta',0,0,NULL),
	(6,'Abierta larga',0,0,NULL),
	(7,'Autocompletar Basic',0,0,1),
	(8,'Autocompletar Maestros',0,0,2),
	(9,'Select2 múltiple',0,0,NULL),
	(10,'Texto Plano',0,0,NULL),
	(11,'Checkbox múltiple',0,0,NULL);

/*!40000 ALTER TABLE `questions_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table rols
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rols`;

CREATE TABLE `rols` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `level` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

LOCK TABLES `rols` WRITE;
/*!40000 ALTER TABLE `rols` DISABLE KEYS */;

INSERT INTO `rols` (`id`, `name`, `description`, `level`, `create_at`)
VALUES
	(1,'Administrador','Control total del sistema.',1,'2017-01-29 01:55:42'),
	(2,'Supervisor','Ver resultados de ambos colegios.',2,'2017-01-29 01:55:45'),
	(3,'Director CILAC','Ver resultados del colegio CILAC.',3,'2017-01-29 01:55:47'),
	(4,'Director La Salle','Ver resultados del colegio La Salle.',3,'2017-01-29 01:55:48');

/*!40000 ALTER TABLE `rols` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table rules
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rules`;

CREATE TABLE `rules` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `action` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `rules` WRITE;
/*!40000 ALTER TABLE `rules` DISABLE KEYS */;

INSERT INTO `rules` (`id`, `action`)
VALUES
	(1,'1:show question_id=189,hide question_id=154;2:show question_id=154,hide question_id=189'),
	(2,'1:show group_question=1;2:show group_question=2;3:show group_question=3;4:show group_question=4'),
	(3,'1:show group_question=9;2:hide group_question=9'),
	(4,'1:show group_question=10;2:hide group_question=10'),
	(5,'1:show group_question=5;2:show group_question=6;3:show group_question=7;4:show group_question=8'),
	(6,'1:show group_question=11;2:hide group_question=11'),
	(7,'1:show question_id=361,hide question_id=154;2:show question_id=154,hide question_id=361'),
	(8,'1:show question_id=195,hide question_id=362;2:show question_id=362,hide question_id=195'),
	(9,'1:show question_id=352,hide question_id=363;2:show question_id=363,hide question_id=352');

/*!40000 ALTER TABLE `rules` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table schools
# ------------------------------------------------------------

DROP TABLE IF EXISTS `schools`;

CREATE TABLE `schools` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

LOCK TABLES `schools` WRITE;
/*!40000 ALTER TABLE `schools` DISABLE KEYS */;

INSERT INTO `schools` (`id`, `name`, `create_at`, `update_at`)
VALUES
	(1,'Isabel la Católica','2017-01-18 06:23:22',NULL),
	(2,'La Salle','2017-01-18 06:23:22',NULL);

/*!40000 ALTER TABLE `schools` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sections
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sections`;

CREATE TABLE `sections` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `description` text COLLATE utf8_spanish_ci,
  `category_id` int(11) unsigned DEFAULT NULL,
  `comments_required` int(1) DEFAULT '1',
  `questions_ids` text COLLATE utf8_spanish_ci,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `sections_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;

INSERT INTO `sections` (`id`, `name`, `description`, `category_id`, `comments_required`, `questions_ids`, `create_at`)
VALUES
	(7,'Generales - Alum_Pmayor','A continuación se describen las seis dimensiones del servicio educativo a evaluar. En la columna de CALIFICACIÓN anote en cada cuadro cómo calificaría cada dimensión (del 1 al 10, donde 10 es la mejor calificación).',1,0,'39,40,41,42,43,44,45','2017-01-31 01:11:08'),
	(8,'Formacion HC - Alum_Pmayor','Lea con atención cada enunciado y elija, de la ESCALA DE VALORACIÓN, la que mejor refleje su sentir. Le solicitamos, de la manera más atenta, que para aquellas características que evalúe de insatisfacción o mucha insatisfacción nos describa brevemente, en el espacio de comentarios, la razón.',2,1,'46,47,48,49,50,51,52,53','2017-01-21 12:02:25'),
	(9,'Formación Acad.  - Alum_Pmayor',NULL,3,1,'54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73','2017-01-21 12:02:25'),
	(10,'Personal Docente  - Alum_Pmayor',NULL,4,1,'74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,97','2017-01-21 12:02:25'),
	(11,'Clima Escolar  - Alum_Pmayor',NULL,5,1,'98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117','2017-01-21 12:02:25'),
	(12,'Atn Alumnos - Alum_Pmayor',NULL,6,1,'118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137','2017-01-21 12:02:25'),
	(13,'Instalaciones  - Alum_Pmayor',NULL,7,1,'138,139,140,141,142,143,144,145,146,147,148,149,150,151,152','2017-01-21 12:02:25'),
	(14,'Actividades Vesp. - Alum_Pmayor',NULL,8,0,'153,189,group_1,group_2,group_3,group_4,154,190,group_9','2017-01-29 04:53:42'),
	(15,'Abiertas - Alum_Pmayor',NULL,9,0,'193,194,195,362,196,197,198,group_10,201,202,203','2017-02-12 02:04:23'),
	(16,'Generales - Alum_Pmayor','A continuación se describen las seis dimensiones del servicio educativo a evaluar. En la columna de CALIFICACIÓN anote en cada cuadro cómo calificaría cada dimensión (del 1 al 10, donde 10 es la mejor calificación).',1,0,'39,40,41,42,43,44,45','2017-01-31 01:11:08'),
	(17,'Formacion HC - Alum_Secundaria','Lea con atención cada enunciado y elija, de la ESCALA DE VALORACIÓN, la que mejor refleje su sentir. Le solicitamos, de la manera más atenta, que para aquellas características que evalúe de insatisfacción o mucha insatisfacción nos describa brevemente, en el espacio de comentarios, la razón.',2,1,'46,47,48,49,50,51,52,53','2017-02-07 23:45:26'),
	(18,'Formación Acad. - Alum_Secundaria',NULL,3,1,'54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73','2017-02-07 23:45:26'),
	(19,'Personal Docente  - Alum_Secundaria',NULL,4,1,'74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,97','2017-02-07 23:45:26'),
	(20,'Clima Escolar  - Alum_Secundaria',NULL,5,1,'98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117','2017-02-07 23:45:26'),
	(21,'Atn Alumnos - Alum_Secundaria',NULL,6,1,'118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137','2017-02-07 23:45:26'),
	(22,'Instalaciones  - Alum_Secundaria',NULL,7,1,'138,139,140,141,142,143,144,145,146,147,148,149,150,151,152','2017-02-07 23:45:26'),
	(23,'Actividades Vesp. - Alum_Secundaria',NULL,8,0,'153,189,group_1,group_2,group_3,group_4,154,190,group_9','2017-02-07 23:45:26'),
	(24,'Abiertas - Alum_Secundaria',NULL,9,0,'193,194,195,362,196,197,198,group_10,201,202,203','2017-02-12 02:04:47'),
	(25,'Generales - Padre_Familia','A continuación se describen las seis dimensiones del servicio educativo a evaluar. En la columna de CALIFICACIÓN anote en cada cuadro cómo calificaría cada dimensión (del 1 al 10, donde 10 es la mejor calificación).',1,0,'39,40,41,42,43,44,45','2017-02-07 23:45:26'),
	(26,'Formacion HC - Padre_Familia','Lea con atención cada enunciado y elija, de la ESCALA DE VALORACIÓN, la que mejor refleje su sentir. Le solicitamos, de la manera más atenta, que para aquellas características que evalúe de insatisfacción o mucha insatisfacción nos describa brevemente, en el espacio de comentarios, la razón.',2,1,'206,207,208,209,210,211,212,213,214,215,216,217,218,219','2017-02-07 23:45:26'),
	(27,'Formación Acad.  - Padre_Familia',NULL,3,1,'220,221,222,223,224,225,226,227,228,229,230,231,232,233,234,235,236,237,238,239,240,241,242','2017-02-07 23:45:26'),
	(28,'Personal Docente  - Padre_Familia',NULL,4,1,'243,244,245,246,247,248,249,250,251,252,253,254,255,256,257,258,259,260,261,262,263,264','2017-02-07 23:45:26'),
	(29,'Clima Escolar  - Padre_Familia',NULL,5,1,'265,266,267,268,269,270,280,281,282,283,284,285,286,287','2017-02-07 23:45:26'),
	(30,'Atn PdF 1  - Padre_Familia',NULL,6,1,'288,289,290,291,292,293,294,295,296,297,298,299,300,301,302,303,304,305,306,307','2017-02-07 23:45:26'),
	(31,'Atn PdF 2  - Padre_Familia',NULL,6,1,'308,309,310,311,312,313,314,315,316,317,318,319,320,321,322,323,324,325,326,327,328','2017-02-07 23:45:26'),
	(32,'Instalaciones  - Padre_Familia',NULL,7,1,'329,330,331,332,333,334,335,336,337,338,339,340,341,342,343,344,345,346,347,348','2017-02-07 23:45:26'),
	(33,'Actividades Vesp. - Padre_Familia',NULL,8,0,'188,361,group_5,group_6,group_7,group_8,154,349,group_9','2017-02-11 22:08:31'),
	(34,'Abiertas - Padre_Familia',NULL,9,0,'350,351,352,363,353,354,355,group_11,358,359,360','2017-02-12 02:11:09'),
	(35,'Generales - Empleados','A continuación se describen las seis dimensiones del servicio educativo a evaluar. En la columna de CALIFICACIÓN anote en cada cuadro cómo calificaría cada dimensión (del 1 al 10, donde 10 es la mejor calificación).',1,0,NULL,'2017-01-21 12:02:25'),
	(36,'Formacion HC - Empleados','Lea con atención cada enunciado y elija, de la ESCALA DE VALORACIÓN, la que mejor refleje su sentir. Le solicitamos, de la manera más atenta, que para aquellas características que evalúe de insatisfacción o mucha insatisfacción nos describa brevemente, en el espacio de comentarios, la razón.',2,1,NULL,'2017-01-21 12:02:25'),
	(37,'Formación Acad.  - Empleados',NULL,3,1,NULL,'2017-01-21 12:02:25'),
	(38,'Personal Docente  - Empleados',NULL,4,1,NULL,'2017-01-21 12:02:25'),
	(39,'Clima Escolar  - Empleados',NULL,5,1,NULL,'2017-01-21 12:02:25'),
	(40,'Atn PdF 1  - Empleados',NULL,6,1,NULL,'2017-01-21 12:02:25'),
	(41,'Atn PdF 2  - Empleados',NULL,6,1,NULL,'2017-01-21 12:02:25'),
	(42,'Instalaciones  - Empleados',NULL,7,1,NULL,'2017-01-21 12:02:25'),
	(43,'Actividades Vesp. - Empleados',NULL,8,0,NULL,'2017-01-21 12:02:25');

/*!40000 ALTER TABLE `sections` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sectors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sectors`;

CREATE TABLE `sectors` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `schools_id` int(11) unsigned NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

LOCK TABLES `sectors` WRITE;
/*!40000 ALTER TABLE `sectors` DISABLE KEYS */;

INSERT INTO `sectors` (`id`, `name`, `schools_id`, `create_at`)
VALUES
	(1,'ICB',1,'2017-01-17 18:00:00'),
	(2,'ICA',1,'2017-01-17 18:00:00'),
	(3,'ICC',1,'2017-01-17 18:00:00'),
	(4,'ICD',1,'2017-01-17 18:00:00'),
	(5,'LSB',2,'2017-01-17 18:00:00'),
	(6,'LSC',2,'2017-01-17 18:00:00'),
	(7,'FGS',2,'2017-01-17 18:00:00');

/*!40000 ALTER TABLE `sectors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sports
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sports`;

CREATE TABLE `sports` (
  `id` int(111) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(111) COLLATE utf8_spanish_ci NOT NULL,
  `create_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

LOCK TABLES `sports` WRITE;
/*!40000 ALTER TABLE `sports` DISABLE KEYS */;

INSERT INTO `sports` (`id`, `name`, `create_at`, `updated_at`)
VALUES
	(1,'Fútbol',NULL,NULL),
	(2,'Karate',NULL,NULL),
	(3,'Atletismo',NULL,NULL),
	(4,'Dibujo Cómics',NULL,NULL),
	(5,'Pintura Acuarela',NULL,NULL),
	(6,'Danza Folklórica',NULL,NULL),
	(7,'Básquetbol',NULL,NULL),
	(8,'Porristas',NULL,NULL),
	(9,'Ballet',NULL,NULL),
	(10,'Jazz',NULL,NULL),
	(11,'Guitarra',NULL,NULL),
	(12,'Mecatrónica',NULL,NULL),
	(13,'Violín',NULL,NULL),
	(14,'Ajedrez',NULL,NULL),
	(15,'Videojuegos',NULL,NULL);

/*!40000 ALTER TABLE `sports` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table surveys
# ------------------------------------------------------------

DROP TABLE IF EXISTS `surveys`;

CREATE TABLE `surveys` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `sections_ids` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `code` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(270) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

LOCK TABLES `surveys` WRITE;
/*!40000 ALTER TABLE `surveys` DISABLE KEYS */;

INSERT INTO `surveys` (`id`, `name`, `sections_ids`, `code`, `created_at`, `updated_at`, `remember_token`)
VALUES
	(1,'Encuesta Primaria Menor','1,2,3,4,5,6','K76XM9','2017-01-29 03:28:39','2017-01-28 21:28:39','Pdx14MoOJ4KT7jq12S2i70Vxn7e0v7LRlTyF6AlRcgGj7ifvbMHMRvUKquy6'),
	(2,'Encuesta Tipo 1 - Prim. Mayor','7,8,9,14,15','H6FP88','2017-02-01 21:27:02','2017-02-01 21:27:02','TJmSSI8tyydrcORTDCQltUZLvoxzfyCh82lNOYpwcdrsJ0nCc6AxUzaqxGum'),
	(3,'Encuesta Tipo 2 - Prim. Mayor','7,10,11,14,15','NCPSL8','2017-02-12 02:09:21','2017-02-11 20:09:21','81nQSmjimLfHACoXizW4TGWFnFTOIc1SeXpG5zFcZOtRXQ9lUwK5xBOFJRdp'),
	(4,'Encuesta Tipo 3 - Prim. Mayor','7,12,13,14,15','5BMB76','2017-02-07 21:07:21','2017-02-07 21:07:21','wd3kskhXfBTHDz2j1V0YpH8hy61uhV8qVHDLA3mdaycKgIFJMHhLIYUBtALJ'),
	(6,'Encuesta Tipo 1 - Secundaria','16,17,18,23,24','Y9JWUE','2017-02-07 21:09:55','2017-02-07 21:09:55','qIKJTLd0CW6cPcA0RldLf08csg6O2UxO6UtWM1WiwkB1a4bBAk0r7RhavRwq'),
	(7,'Encuesta Tipo 2 - Secundaria','16,19,20,23,24','TTTTEEEE','2017-02-10 19:03:41','2017-02-10 19:03:41','nW0JI3xHdllEFAqiS4ZgHiQYQGY2yKC2AcPTLRF80ZIaVmjxU7udVtOM4k7n'),
	(8,'Encuesta Tipo 3 - Secundaria','16,21,22,23,24',NULL,'2017-01-21 12:02:25',NULL,NULL),
	(10,'Encuesta Tipo 1 - Padre Familia','25,26,27,33,34','YYY777','2017-02-08 00:49:08','2017-02-08 00:49:08','E9hBnhdkNFPN8BEoKpI8Nm7QLSESsMbiDRtpDweBBGetmcnAhKcynm4eWrss'),
	(11,'Encuesta Tipo 2 - Padre Familia','25,28,29,33,34',NULL,'2017-01-21 12:02:25',NULL,NULL),
	(12,'Encuesta Tipo 3 - Padre Familia','25,30,32,33,34',NULL,'2017-01-21 12:02:25',NULL,NULL),
	(13,'Encuesta Tipo 4 - Padre Familia','25,31,32,33,34',NULL,'2017-01-21 12:02:25',NULL,NULL),
	(14,'Encuesta Tipo 1 - Empleados','35,36,37,43,44',NULL,'2017-01-21 12:02:25',NULL,NULL),
	(15,'Encuesta Tipo 2 - Empleados','35,38,39,43,44',NULL,'2017-01-21 12:02:25',NULL,NULL),
	(16,'Encuesta Tipo 3 - Empleados','35,40,42,43,44',NULL,'2017-01-21 12:02:25',NULL,NULL),
	(17,'Encuesta Tipo 4 - Empleados','35,41,42,43,44',NULL,'2017-01-21 12:02:25',NULL,NULL);

/*!40000 ALTER TABLE `surveys` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table teachers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `teachers`;

CREATE TABLE `teachers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(111) COLLATE utf8_spanish_ci NOT NULL,
  `grupo` varchar(111) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sectors_id` int(11) unsigned NOT NULL,
  `schools_id` int(11) unsigned NOT NULL,
  `materia` varchar(111) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  PRIMARY KEY (`id`),
  KEY `sectors_id` (`sectors_id`),
  KEY `schools_id` (`schools_id`),
  CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`sectors_id`) REFERENCES `sectors` (`id`),
  CONSTRAINT `teachers_ibfk_2` FOREIGN KEY (`schools_id`) REFERENCES `schools` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;

INSERT INTO `teachers` (`id`, `name`, `grupo`, `sectors_id`, `schools_id`, `materia`, `created_at`, `updated_at`)
VALUES
	(1,'Alvarado González, Sandra Luz','2c',7,2,'computación y artes','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(2,'Andrade Garza, José De Jesús','todos grupos',7,2,'educacion fisica','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(3,'Ávila Rodríguez, Diana Marianela','3d',7,2,'Historia de mexico y titular','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(4,'Barron Valdez, Silvia Nora','3c',7,2,'titular y civica y etica','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(5,'Castillo Silva, Marlon Javier','1, 2 y 3',7,2,'computacion y valores','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(6,'Contreras Stroobants, Susana Josefina','1b',7,2,'titular y biología','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(7,'García Rodríguez, Andrea Catalina','2d',7,2,'titular, civica y etica','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(8,'Mayorga Morales, Yilenia Lizeth','3b',7,2,'titular y español','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(9,'Melo Cruz, Ana Lidia','3e',7,2,'quimica y arte','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(10,'Miranda García, María del Carmen','2 y 3',7,2,'matemáticas','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(11,'Morales Barrios, Yaresi Del Carmen','2b',7,2,'historia universal artes 1, 2, 3.','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(12,'Morales Briones, Rosario','1 y 3',7,2,'teacher','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(13,'Núñez Aguiar, Ana María','2a',7,2,'teacher y titular','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(14,'Orozco Caracheo, Alicia Guadalupe','3a',7,2,'español y valores','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(15,'Plascencia Escalante, Alberto','3',7,2,'teacher','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(16,'Rangel Nava, Diego Antonio','1c',7,2,'titular geoografia y física','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(17,'Treviño Hinojosa, Ana María','1a',7,2,'matemáticas','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(18,'Alvarado Ayala, Amalia Eugenia','4,5,6 primaria',3,1,'danza','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(19,'Barrera Rodríguez, María Gabriela','teacher 6',3,1,'teacher','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(20,'Calderón Campa, Carolina','4c',3,1,'titular','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(21,'Cintora Berumen, Aracely Guadalupe','4,5,y 6',3,1,'computación','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(22,'Esmeralda Hernández, María Luisa','4d',3,1,'titular','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(23,'Espinoza Medina, Diana','5',3,1,'teacher','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(24,'Fernández Treviño, Catalina','5c',3,1,'titular','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(25,'Flores, Iza Nelly','coord. Ingles',3,1,NULL,'2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(26,'Galavíz Aguilar, Iris Gabriela','6b',3,1,'titular','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(27,'García Del Río, Víctor Manuel','4b',3,1,'titular','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(28,'García Uresti, Brenda Liliana','5a',3,1,'titular','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(29,'Hernandez Martinez, Stephanie Cristina','5d',3,1,'titular','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(30,'Hernandez Palomo, Armandina','6a',3,1,'titular','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(31,'López García, Anilú','directora icc',3,1,'hermana','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(32,'Mata Reyes, Maria Luisa','5b',3,1,'titular','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(33,'Ortega Palomo, Francisco Javier','4,5,6',3,1,'educación física','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(34,'Ruíz Rodríguez, Tania Lizzeth','6c',3,1,'titular','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(35,'Salinas Gonzalez, Laura Patricia','4',3,1,'teacher','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(36,'Torres Rocha, Monica Nayeli','4 y 5',3,1,'teacher','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(37,'Torres Ruiz, Marcela Nataly','6d',3,1,'titular','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(38,'Tovar Torres, Miriam','4a',3,1,'titular','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(39,'Alvarado Garza, Alma Aurora',NULL,6,2,'computacion','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(40,'Castillo Vallejo, María Virginia','6c',6,2,'titular','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(41,'Cruz Amaya, María Guadalupe','4b',6,2,'titular','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(42,'González Cerda, Edith Irasema',NULL,6,2,NULL,'2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(43,'González Ortega, Alma','6',6,2,'teacher','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(44,'Graniel Abdo, Maria Margarita','5a',6,2,'titular','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(45,'Lira Becerra, Yaresi Mayela','6a',6,2,'titular','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(46,'Olan Carrillo, Neide','5b',6,2,'titular','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(47,'Pérez Cavazos, Brenda Lisha','5',6,2,'teacher','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(48,'Ramos Medina, Nallely Viridiana','6b',6,2,'titular','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(49,'Reyna Ramírez, Maricela Guadalupe','5c',6,2,'titular','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(50,'Sánchez Vargas, Karla','4c',6,2,'titular','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(51,'Valdez Baldivia, Andrea Teresa','4',6,2,'teacher','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(52,'Velázquez Chapa, Maryangela','4a',6,2,'titular','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(53,'Zatarain Anleu, Marco Jonathan','5d',6,2,'titular','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(54,'Aguilar Álvarez, Adolfo','1,2 y 3',4,1,'educación física','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(55,'Álvarez González, María Concepción','3c',4,1,'titular, matemáticas III','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(56,'Arroyo Gallegos, Maria del Socorro','1d',4,1,'titular, inglés I','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(57,'Castro Ramírez, Domitila','2d',4,1,'titular, educación en la fe.','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(58,'Cavazos Ruiz, Martha Delia','3d',4,1,'titular, Química','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(59,'Cedano Perez, Juanita','3b',4,1,'titular, Historia III, Formación civica y etica','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(60,'Cerda Sánchez, José Luis','3',4,1,'ingles III','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(61,'González Silva, María Luisa','1,2,3',4,1,'artes','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(62,'Hernández Alanís, Hilda Janeth','2',4,1,'historia II, formación civica y etica','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(63,'Hernández Guajardo, Vanessa Damaris','1b',4,1,'titular, matemáticas I y formación civica y etica','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(64,'Herrera Morales, Rosa Elvia','1,2 y 3',4,1,'computación','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(65,'Ledezma Vargas, Miriam Elizabeth','2',4,1,'Ingles II','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(66,'Martínez Mendoza, Jessica Fabiola','1c',4,1,'titular, español I y formación ciudadana','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(67,'Mendoza Arreola, Lilia Mireya','2a',4,1,'titular, español II','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(68,'Reyna Monsivais, Silvia','2b',4,1,'titular, matemáticas II','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(69,'Rodríguez Razo, Sergio Israel',NULL,4,1,'español III y formación civica II','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(70,'Salazar Macías, Adela Ivett','3a',4,1,'titular, geografía I y formación cívica II','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(71,'Salazar Villa, Pedro','2c',4,1,'titular, Física','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000'),
	(72,'Solís Segovia, María Beatriz','1a',4,1,'titular, Biología','2017-02-09 06:00:00.000000','2017-02-09 06:00:00.000000');

/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_has_school
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_has_school`;

CREATE TABLE `user_has_school` (
  `user_id` int(11) unsigned NOT NULL,
  `school_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) unsigned DEFAULT NULL,
  `updated_by` int(11) unsigned DEFAULT NULL,
  KEY `index_user_id` (`user_id`),
  KEY `index_school_id` (`school_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  CONSTRAINT `fk_school_id` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`),
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `user_has_school_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `user_has_school_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `rols_id` int(11) unsigned NOT NULL,
  `remember_token` varchar(270) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) unsigned DEFAULT NULL,
  `updated_by` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rol_id_index` (`rols_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  CONSTRAINT `fk_rol_id` FOREIGN KEY (`rols_id`) REFERENCES `rols` (`id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `rols_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`)
VALUES
	(1,'Álvaro Esparza','alvaro.esparza@cecac.edu.mx','$2y$10$iL3PJrqj6TXMyvvfRd0WYOw0Cwv1ubO9kQ9sZxL0dkde8rJH5g3VS',1,'k3kdsS8pdMb5F5evPp9q4en6gzbXeZqMuAOmiaDbBq8BrFIdF2WPmuOFWnxu','2017-01-05 02:22:50','2017-01-05 10:22:14',NULL,NULL,NULL),
	(2,'Christopher Medina','cmedina@cecac.edu.mx','$2y$10$lV6s/dEXBpbYr3.yIaJy1eAokytMd8pGGeI7fr6XzRDC37oZGIbIq',1,'091ZOe4T8eey0hB6OO2b4YX1VzxcPo9jwdZ9lw9SEYNGHHQnC6I4Z0I3Tuwn','2017-01-04 21:22:58','2017-01-27 23:12:20',NULL,NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users_survey
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users_survey`;

CREATE TABLE `users_survey` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `lastname1` varchar(255) DEFAULT NULL,
  `lastname2` varchar(255) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `sector_id` int(11) DEFAULT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `student_lastname1` varchar(255) DEFAULT NULL,
  `student_lastname2` varchar(255) DEFAULT NULL,
  `survey_id` varchar(100) DEFAULT NULL,
  `survey_answered` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
