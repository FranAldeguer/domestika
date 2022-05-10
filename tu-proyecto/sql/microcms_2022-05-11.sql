DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `excerpt` text CHARACTER SET latin1 NOT NULL,
  `content` text CHARACTER SET latin1 NOT NULL,
  `published_on` datetime NOT NULL,
  `user` int(11) DEFAULT '11',
  PRIMARY KEY (`id`),
  KEY `user - post` (`user`),
  CONSTRAINT `user - post` FOREIGN KEY (`user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `title`, `excerpt`, `content`, `published_on`, `user`)
VALUES
	(2,'Nuevo titulo del carajo','Extracto de la hostia','Este contenido es la puta hostia, fua chaval','2018-10-11 10:15:00',11),
	(3,'Mi título','adfasdfadsf','Este es mi puto nuevo contenido','2022-02-01 21:26:00',11),
	(4,'Mi titulo desde Workbench','my excpert workbench','Este es el contenido de mi post creado desde workbench','2022-02-12 11:00:00',11),
	(5,'Titulo actualizado','Extracto acutalizado','Contenido acutalizado desde query','2022-04-05 11:30:00',11),
	(12,'Nuevo post','','ESte es el nuevo post','2022-04-25 05:27:40',11),
	(48,'Este es el extracto del post que habla sobre el contenido','','<p>Muy buenos días señor <b>Fransisco</b></p>\r\n\r\n<p> Te gusta mi código para jakiarte?  alert(\"HAS SIDO JAKIADO JAJA\");  </p>\r\n','2022-04-24 06:00:04',11),
	(66,'Este post está modificado','Este post está modificado','Este post está modificado','2022-04-25 05:46:50',11),
	(70,'Nuevo adfadsf','asdfasdfasdfNuevo post','Nuevo post de puta madreasdfasdfasdfasdf','2022-04-29 04:30:19',11),
	(71,'Nuevo post de Fran','Nuevo post de Fran','NUevo post de puto fucking Fran','2022-04-29 04:54:19',11),
	(74,'Remember post','Esto es el remember post','Contenido del remember post','2022-05-07 02:42:17',12),
	(76,'wdfasdf','asdfasdf','asdfasdf','2022-05-10 05:28:02',12);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`)
VALUES
	(0,'default_user','default@user.com','123456','creador'),
	(11,'admin','admin@localhost.com','$2y$10$txRyk7FvGObMxPgj6Mmsru.W5Pnu7OO3RC5bWrdFG7KqWMMUmYVdS','admin'),
	(12,'fran','fran@localhost.com','$2y$10$Ycily7iPfip5cD6GAa.Oke4kngWNgXvRRANwthbqM9bCMv24PtdQq','admin'),
	(15,'Veronica amoros','vero@localhost.com','$2y$10$xTddBBlmWn8r8ocPlVyaaOOzBnJEqKNDhiz/g4VX7lVC6wYbE88W2','creador'),
	(16,'jose','jose@localhost.com','$2y$10$T4CYqaODxrs0kFf3zRBAiucJALq6tUifMYNLwu8pM2YTT/2oHRRMm','creador'),
	(17,'pedro','pedro@localhost.com','$2y$10$7.PegdCnH0CZW6GNe74McegZ25//kxXIMB4OtbJlyHL8/zoA5N1ni','editor'),
	(18,'perico','perico@ungramo.com','$2y$10$lNpLdHw2XYPAe.GY3ogeOuKB0UUKIEd4pt2ZcvdpV6o0XE.U24ZsK','editor');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
