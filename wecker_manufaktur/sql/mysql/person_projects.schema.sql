CREATE TABLE `person_projects` (
	`person` INT(10) UNSIGNED NOT NULL,
	`project` INT(10) UNSIGNED NOT NULL,
	PRIMARY KEY (`project`, `person`),
	INDEX `FK_person_projects_persons` (`person`),
	CONSTRAINT `FK_person_projects_persons` FOREIGN KEY (`person`) REFERENCES `persons` (`id`) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT `FK_person_projects_projects` FOREIGN KEY (`project`) REFERENCES `projects` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
;