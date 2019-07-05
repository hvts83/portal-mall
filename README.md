# portal-mall

CREATE TABLE `banners` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `imagen_id` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NOT NULL
);

ALTER TABLE `config`
DROP `publicity_id`;

ALTER TABLE `banners`
CHANGE `deleted_at` `deleted_at` timestamp NULL AFTER `updated_at`;
