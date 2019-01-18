
# Birthdays

This is a small example of a website that allows you to remember the birthdays of employees.

## Installing
A step by step series of examples that tell you how to get a development this website

### Step 1

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

~~~
php composer.phar create-project --prefer-dist --stability=dev yiisoft/yii2-app-basic Birthday
~~~

### Step 2
Using git write the following command
~~~
git clone https://github.com/ImperatorMarsa/Birthdays.io.git
~~~

### Step 3
Transfer the contents of folder `Birthdays.io` to folder `Birthday`

### Step 4
Create a table named `relationship`, `name` and `birthday` in the `yii2basic` database, and insert some sample data. You may run the following SQL statements to do so:
```sql
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
```

Now you should be able to access the application through the following URL, assuming `Birthday` is the directory
directly under the Web root.

~~~
http://localhost
~~~
