CREATE TABLE `relationship` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`n_id` INT(10) UNSIGNED NULL DEFAULT NULL,
	`b_id` INT(10) UNSIGNED NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;
CREATE TABLE `name` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(73) NULL DEFAULT '0',
	`kind` VARCHAR(73) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;
CREATE TABLE `birthday` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`birthday` DATE NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;

INSERT INTO `birthday` (`birthday`) VALUES ('0666-04-02');
INSERT INTO `birthday` (`birthday`) VALUES ('1994-11-17');
INSERT INTO `birthday` (`birthday`) VALUES ('1970-01-01');
INSERT INTO `birthday` (`birthday`) VALUES ('2038-01-19');
INSERT INTO `birthday` (`birthday`) VALUES ('1961-04-12');
INSERT INTO `birthday` (`birthday`) VALUES ('1929-05-04');

INSERT INTO `name` (`name`, `kind`) VALUES ('Twilight Sparkle', 'Alicorn');
INSERT INTO `name` (`name`, `kind`) VALUES ('Fluttershy',       'Pegasi');
INSERT INTO `name` (`name`, `kind`) VALUES ('Applejack',        'Earth ponies');
INSERT INTO `name` (`name`, `kind`) VALUES ('Pinkie Pie',       'Earth ponies');
INSERT INTO `name` (`name`, `kind`) VALUES ('Rainbow Dash',     'Pegasi');
INSERT INTO `name` (`name`, `kind`) VALUES ('Rarity',           'Unicorn');

INSERT INTO `relationship` (`n_id`, `b_id`) VALUES (1, 1);
INSERT INTO `relationship` (`n_id`, `b_id`) VALUES (2, 2);
INSERT INTO `relationship` (`n_id`, `b_id`) VALUES (3, 3);
INSERT INTO `relationship` (`n_id`, `b_id`) VALUES (4, 4);
INSERT INTO `relationship` (`n_id`, `b_id`) VALUES (5, 5);
INSERT INTO `relationship` (`n_id`, `b_id`) VALUES (6, 6);


SELECT relationship.id, name.name, birthday FROM relationship JOIN name, birthday
  WHERE name.id=relationship.n_id 
    AND birthday.id=relationship.b_id
  
  ORDER BY name
;