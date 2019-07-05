-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `sexo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `promocion` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `clients` (`id`, `email`, `birthday`, `sexo`, `promocion`, `created_at`, `updated_at`) VALUES
(1,	'ara@outlook.com',	'1994-02-12',	'femenino',	1,	'2019-07-01 12:59:52',	'2019-07-01 12:59:52');

DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `logo_id` int(11) NOT NULL,
  `landing_background_id` int(11) NOT NULL,
  `publicity_id` int(11) NOT NULL,
  `success_background_id` int(11) NOT NULL,
  `success_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `config` (`id`, `name`, `logo_id`, `landing_background_id`, `publicity_id`, `success_background_id`, `success_text`, `created_at`, `updated_at`) VALUES
(1,	'Testing',	1,	2,	4,	3,	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce posuere magna elit, a molestie tortor posuere eget.',	'2019-07-01 02:49:27',	'2019-07-01 18:38:58');

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `images` (`id`, `url`, `created_at`, `updated_at`) VALUES
(1,	'images/logo.png',	'2019-07-01 03:27:37',	'0000-00-00 00:00:00'),
(2,	'images/bg1.jpg',	'2019-07-01 03:29:01',	'0000-00-00 00:00:00'),
(3,	'images/bg2.jpg',	'2019-07-01 03:29:07',	'0000-00-00 00:00:00'),
(4,	'images/banner.png',	'2019-07-01 03:29:12',	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `usuario`, `nombre`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'admin',	'Administrator',	'$2y$10$2GidQJigbkl9hl4eaZw0HuF8K9sXJ5WEg1MBwmXHb.weRh.PVxRo2',	'',	'2019-07-01 07:48:34',	'0000-00-00 00:00:00');

-- 2019-07-01 12:50:46
