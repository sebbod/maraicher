-- MySQL Workbench Synchronization
-- Generated: 2022-01-14 16:45
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: bod

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE TABLE IF NOT EXISTS `grandschenes`.`customers` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `grandschenes`.`address` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `adr1` VARCHAR(45) NULL DEFAULT NULL,
  `adr2` VARCHAR(45) NULL DEFAULT NULL,
  `zcode` VARCHAR(8) NULL DEFAULT NULL,
  `town` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `grandschenes`.`customers_has_address` (
  `customers_id` INT(10) UNSIGNED NOT NULL,
  `address_id` INT(11) NOT NULL,
  `addressType_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`customers_id`, `address_id`),
  INDEX `fk_customers_has_address_address1_idx` (`address_id` ASC) VISIBLE,
  INDEX `fk_customers_has_address_customers_idx` (`customers_id` ASC) VISIBLE,
  INDEX `fk_customers_has_address_addressType1_idx` (`addressType_id` ASC) VISIBLE,
  CONSTRAINT `fk_customers_has_address_customers`
    FOREIGN KEY (`customers_id`)
    REFERENCES `grandschenes`.`customers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_customers_has_address_address1`
    FOREIGN KEY (`address_id`)
    REFERENCES `grandschenes`.`address` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_customers_has_address_addressType1`
    FOREIGN KEY (`addressType_id`)
    REFERENCES `grandschenes`.`addressType` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `grandschenes`.`addressType` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `grandschenes`.`orders` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dateCreate` DATETIME NOT NULL DEFAULT now(),
  `states_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`, `states_id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_orders_states1_idx` (`states_id` ASC) VISIBLE,
  CONSTRAINT `fk_orders_states1`
    FOREIGN KEY (`states_id`)
    REFERENCES `grandschenes`.`states` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `grandschenes`.`customers_has_orders` (
  `customers_id` INT(10) UNSIGNED NOT NULL,
  `orders_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`customers_id`, `orders_id`),
  INDEX `fk_customers_has_orders_orders1_idx` (`orders_id` ASC) VISIBLE,
  INDEX `fk_customers_has_orders_customers1_idx` (`customers_id` ASC) VISIBLE,
  CONSTRAINT `fk_customers_has_orders_customers1`
    FOREIGN KEY (`customers_id`)
    REFERENCES `grandschenes`.`customers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_customers_has_orders_orders1`
    FOREIGN KEY (`orders_id`)
    REFERENCES `grandschenes`.`orders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `grandschenes`.`products` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `grandschenes`.`stocks` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `products_id` INT(10) UNSIGNED NOT NULL,
  `units_id` INT(10) UNSIGNED NOT NULL,
  `qty` INT(10) ZEROFILL UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_stocks_products1_idx` (`products_id` ASC) INVISIBLE,
  INDEX `fk_stocks_units1_idx` (`units_id` ASC) INVISIBLE,
  CONSTRAINT `fk_stocks_products1`
    FOREIGN KEY (`products_id`)
    REFERENCES `grandschenes`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_stocks_units1`
    FOREIGN KEY (`units_id`)
    REFERENCES `grandschenes`.`units` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `grandschenes`.`units` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `grandschenes`.`orders_has_stocks` (
  `orders_id` INT(10) UNSIGNED NOT NULL,
  `stocks_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`orders_id`, `stocks_id`),
  INDEX `fk_orders_has_stocks_stocks1_idx` (`stocks_id` ASC) VISIBLE,
  INDEX `fk_orders_has_stocks_orders1_idx` (`orders_id` ASC) VISIBLE,
  CONSTRAINT `fk_orders_has_stocks_orders1`
    FOREIGN KEY (`orders_id`)
    REFERENCES `grandschenes`.`orders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_has_stocks_stocks1`
    FOREIGN KEY (`stocks_id`)
    REFERENCES `grandschenes`.`stocks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `grandschenes`.`states` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
