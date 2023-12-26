CREATE TABLE `mi_tienda`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
  `password` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

INSERT INTO `users` (`username`, `password`) VALUES ('ale', 'ale');
