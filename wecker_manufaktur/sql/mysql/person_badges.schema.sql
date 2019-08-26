CREATE TABLE `person_badges` (
	`person` INT(10) UNSIGNED NOT NULL,
	`badge` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`color` VARCHAR(20) NOT NULL DEFAULT 'badge-primary' COLLATE 'utf8mb4_unicode_ci',
	`order` INT(10) UNSIGNED NOT NULL,
	`visible` INT(10) UNSIGNED NULL DEFAULT 1,
	PRIMARY KEY (`person`, `badge`),
	INDEX `person` (`person`),
	CONSTRAINT `FK__persons` FOREIGN KEY (`person`) REFERENCES `persons` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
;