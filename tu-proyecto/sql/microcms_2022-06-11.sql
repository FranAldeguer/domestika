# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.32)
# Base de datos: microcms
# Tiempo de Generación: 2022-06-11 16:52:56 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `excerpt` text CHARACTER SET latin1 NOT NULL,
  `content` text CHARACTER SET latin1 NOT NULL,
  `published_on` datetime NOT NULL,
  `user` int(11) DEFAULT '11',
  `img_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_ext` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user - post` (`user`),
  CONSTRAINT `user - post` FOREIGN KEY (`user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `title`, `excerpt`, `content`, `published_on`, `user`, `img_name`, `img_ext`)
VALUES
	(2,'1234','Extracto de la hostia','Este contenido es la puta hostia, fua chaval','2018-10-11 10:15:00',11,NULL,NULL),
	(3,'1234','adfasdfadsf','Este es mi puto nuevo contenido','2022-02-01 21:26:00',11,NULL,NULL),
	(4,'1234','my excpert workbench','Este es el contenido de mi post creado desde workbench','2022-02-12 11:00:00',11,NULL,NULL),
	(5,'1234','Extracto acutalizado','Contenido acutalizado desde query','2022-04-05 11:30:00',11,NULL,NULL),
	(12,'1234','','ESte es el nuevo post','2022-04-25 05:27:40',11,NULL,NULL),
	(48,'1234','','<p>Muy buenos días señor <b>Fransisco</b></p>\r\n\r\n<p> Te gusta mi código para jakiarte?  alert(\"HAS SIDO JAKIADO JAJA\");  </p>\r\n','2022-04-24 06:00:04',11,NULL,NULL),
	(66,'1234','Este post está modificado','Este post está modificado','2022-04-25 05:46:50',11,NULL,NULL),
	(70,'1234','asdfasdfasdfNuevo post','Nuevo post de puta madreasdfasdfasdfasdf','2022-04-29 04:30:19',11,NULL,NULL),
	(71,'1234','Nuevo post de Fran','NUevo post de puto fucking Fran','2022-04-29 04:54:19',11,NULL,NULL),
	(74,'oujhkl','Esto es asdfadsfel remember poadfadsfadsfast','Contenido del remember post','2022-05-07 02:42:17',12,NULL,NULL),
	(77,'qwerafasdfadfasdfadfa','qweradfasd','adfadfads','2022-05-25 21:44:42',12,'IMG_20220525_214442',''),
	(78,'Prueba','Demo','Prueba imgs','2022-05-31 22:04:39',12,'IMG_20220531_220439','jpeg'),
	(79,'adfad','asdfadsf','q2erqwerqwerqer','2022-05-31 22:15:24',12,'IMG_20220531_221524','jpg'),
	(80,'adfadsf','asdfadsf','adfbertqwertqwer','2022-05-31 22:17:54',12,'IMG_20220531_221754','jpg'),
	(81,'adfadsf','asdfasdf','adsfasdfasdf','2022-05-31 22:21:07',12,'IMG_20220531_222107','jpg'),
	(82,'qwerqwerqwerq','erqerqewrqwe','rqwerqewrqwrqwer','2022-06-04 15:30:42',12,'IMG_20220604_153042','jpeg'),
	(83,'adfadfa','asdfasdf','asdfasdfasdf','2022-06-04 15:38:33',12,'IMG_20220604_153833','jpeg'),
	(84,'dfadfa','asdfasdf','asdfasdfadsfadsf','2022-06-04 15:41:09',12,'IMG_20220604_154109','jpg'),
	(85,'sadfadsf','asdfadsf','adsfasdfasdf','2022-06-05 14:13:32',12,'IMG_20220605_141332','jpg'),
	(86,'dafdsfa','dfasdfasdf','asdfadsfasdf','2022-06-05 14:14:16',12,'IMG_20220605_141416','jpg'),
	(87,'asdfasdf','dfadsfadsf','adfadsfadsf','2022-06-05 14:18:46',12,'IMG_20220605_141846','jpg');

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) CHARACTER SET latin1 NOT NULL,
  `email` varchar(40) CHARACTER SET latin1 NOT NULL,
  `password` varchar(60) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `role` varchar(10) CHARACTER SET latin1 DEFAULT 'creador',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`)
VALUES
	(0,'default_user','default@user.com','123456','creador'),
	(11,'admin','admin@localhost.com','$2y$10$txRyk7FvGObMxPgj6Mmsru.W5Pnu7OO3RC5bWrdFG7KqWMMUmYVdS','admin'),
	(12,'fran','fran@localhost.com','$2y$10$Ycily7iPfip5cD6GAa.Oke4kngWNgXvRRANwthbqM9bCMv24PtdQq','admin'),
	(15,'Veronicaasdf','vero@localhost.com','$2y$10soSwXJRXU15sXmUz7no3ee5h12MjOWwVs3zOs/nySPEeLlRVngk5G','creador'),
	(16,'jose','jose@localhost.com','$2y$10$T4CYqaODxrs0kFf3zRBAiucJALq6tUifMYNLwu8pM2YTT/2oHRRMm','creador'),
	(17,'pedro','pedro@localhost.com','$2y$10$7.PegdCnH0CZW6GNe74McegZ25//kxXIMB4OtbJlyHL8/zoA5N1ni','editor'),
	(18,'perico','perico@ungramo.com','$2y$10$lNpLdHw2XYPAe.GY3ogeOuKB0UUKIEd4pt2ZcvdpV6o0XE.U24ZsK','editor');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
