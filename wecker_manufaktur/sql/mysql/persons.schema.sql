CREATE TABLE `persons` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`img` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`info` TEXT NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`order` INT(10) UNSIGNED NULL DEFAULT NULL,
	PRIMARY KEY (`id`),
	INDEX `id` (`id`)
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
;