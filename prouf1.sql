CREATE TABLE IF NOT EXISTS  `Task` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`description` VARCHAR(100) NOT NULL,
	`user` INT NOT NULL,
	`due_date` DATE NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `Role` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`role` varchar(100) NOT NULL,
	PRIMARY KEY (`id`)
);
CREATE TABLE IF NOT EXISTS `Users` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`email` varchar(100) NOT NULL,
	`username` varchar(100) NOT NULL,
	`password` varchar(100) NOT NULL,
	`role` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `Task_Item` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`item` VARCHAR(255) NOT NULL,
	`completed` BOOLEAN NOT NULL,
	`task` varchar(100) NOT NULL,
	PRIMARY KEY (`id`)
);



ALTER TABLE `Users` ADD CONSTRAINT `Users_fk0` FOREIGN KEY (`role`) REFERENCES `Role`(`id`);

ALTER TABLE `Task_Item` ADD CONSTRAINT `Task_Item_fk0` FOREIGN KEY (`task`) REFERENCES `Task`(`id`);

ALTER TABLE `Task` ADD CONSTRAINT `Task_fk0` FOREIGN KEY (`user`) REFERENCES `Users`(`id`);

