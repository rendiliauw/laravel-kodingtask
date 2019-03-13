# Host: localhost  (Version 5.5.5-10.1.35-MariaDB)
# Date: 2019-03-13 22:09:22
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "migrations"
#

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "migrations"
#

INSERT INTO `migrations` VALUES (3,'2019_03_10_010017_create_tasks',2),(4,'2014_10_12_000000_create_users_table',3),(5,'2014_10_12_100000_create_password_resets_table',3),(6,'2019_03_10_014553_create_tasks',3);

#
# Structure for table "password_resets"
#

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "password_resets"
#


#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'Hieronimus Rendi\r\n','user@gmail.com',NULL,'$2y$10$kabX809WqqNP9eLep6JOGexL6aKGy6KcKaPbTr2Jz5iY8OcDTPVbC',NULL,'2019-03-11 08:08:03','2019-03-11 08:08:03');

#
# Structure for table "tasks"
#

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title_task` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `due_date` date NOT NULL,
  `status` enum('UNMARK','MARK') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'UNMARK',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tasks_user_id_foreign` (`user_id`),
  CONSTRAINT `tasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "tasks"
#

INSERT INTO `tasks` VALUES (16,1,'Pergi Latihan','Latihan muay thai jam 3 sore','2019-03-13','UNMARK','2019-03-13 20:29:18','2019-03-13 20:29:18',NULL),(17,1,'Meeting dengan client','Meeting dengan client jam 10 pagi di mall central park','2019-03-14','UNMARK','2019-03-13 20:30:16','2019-03-13 20:30:16',NULL),(18,1,'Workshop ryan filbert','Mengikuti workhsop reksadana jam 10 pagi di Hotel novotel','2019-03-15','UNMARK','2019-03-13 20:30:51','2019-03-13 20:30:51',NULL);
