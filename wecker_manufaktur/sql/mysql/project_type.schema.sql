CREATE TABLE `project_type` (
	`project` INT(10) UNSIGNED NOT NULL,
	`type` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`color` VARCHAR(20) NOT NULL DEFAULT 'badge-primary' COLLATE 'utf8mb4_unicode_ci',
	`order` INT(10) UNSIGNED NOT NULL,
	`visible` INT(10) UNSIGNED NOT NULL DEFAULT 1,
	PRIMARY KEY (`project`, `type`),
	INDEX `project` (`project`),
	CONSTRAINT `FK_project_type_projects` FOREIGN KEY (`project`) REFERENCES `projects` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
;