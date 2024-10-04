CREATE TABLE `users` (
	`id` int AUTO_INCREMENT NOT NULL,
	`username` varchar(256),
	`email` varchar(256),
	`password` varchar(256),
	`datetime` datetime,
	CONSTRAINT `users_id` PRIMARY KEY(`id`)
);
