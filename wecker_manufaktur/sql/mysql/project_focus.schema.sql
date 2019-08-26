CREATE TABLE `project_focus` (
	`project` INT(10) UNSIGNED NOT NULL,
	`focus` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`color` VARCHAR(20) NOT NULL DEFAULT 'badge-primary' COLLATE 'utf8mb4_unicode_ci',
	`order` INT(10) UNSIGNED NOT NULL,
	`visible` INT(10) UNSIGNED NOT NULL DEFAULT 1,
	PRIMARY KEY (`project`, `focus`),
	INDEX `project` (`project`),
	CONSTRAINT `FK_project_focus_projects` FOREIGN KEY (`project`) REFERENCES `projects` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
;