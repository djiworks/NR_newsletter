SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `mydb` ;
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`university`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`university` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`university` (
  `id_university` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `address` VARCHAR(255) NULL ,
  `country` VARCHAR(45) NULL ,
  `subscription` TINYINT(1) NULL ,
  `checking_state` INT NOT NULL ,
  `comment` LONGTEXT NULL ,
  PRIMARY KEY (`id_university`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`newsletter`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`newsletter` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`newsletter` (
  `id_newsletter` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(255) NULL ,
  `path` VARCHAR(100) NULL ,
  `creation_date` DATETIME NOT NULL ,
  `cover` VARCHAR(100) NOT NULL ,
  `checking state` INT NOT NULL ,
  `content` LONGTEXT NOT NULL ,
  `comment` LONGTEXT NULL ,
  PRIMARY KEY (`id_newsletter`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`sent_newsletters`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`sent_newsletters` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`sent_newsletters` (
  `id_university` INT NOT NULL ,
  `id_newsletter` INT NOT NULL ,
  `sending_date` DATETIME NULL ,
  PRIMARY KEY (`id_university`, `id_newsletter`) ,
  INDEX `fk_university_has_newsletter_newsletter1` (`id_newsletter` ASC) ,
  INDEX `fk_university_has_newsletter_university1` (`id_university` ASC) ,
  CONSTRAINT `fk_university_has_newsletter_university1`
    FOREIGN KEY (`id_university` )
    REFERENCES `mydb`.`university` (`id_university` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_university_has_newsletter_newsletter1`
    FOREIGN KEY (`id_newsletter` )
    REFERENCES `mydb`.`newsletter` (`id_newsletter` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`person`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`person` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`person` (
  `id_person` INT NOT NULL AUTO_INCREMENT ,
  `first name` VARCHAR(45) NULL ,
  `last name` VARCHAR(45) NULL ,
  `phone` VARCHAR(45) NULL ,
  `mail` VARCHAR(45) NULL ,
  `country` VARCHAR(45) NULL ,
  `worked_until` DATETIME NULL ,
  PRIMARY KEY (`id_person`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`recommended_by`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`recommended_by` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`recommended_by` (
  `id_person` INT NOT NULL ,
  `id_university` INT NOT NULL ,
  `is_student` TINYINT(1) NULL ,
  PRIMARY KEY (`id_person`, `id_university`) ,
  INDEX `fk_person_has_university_university1` (`id_university` ASC) ,
  INDEX `fk_person_has_university_person1` (`id_person` ASC) ,
  CONSTRAINT `fk_person_has_university_person1`
    FOREIGN KEY (`id_person` )
    REFERENCES `mydb`.`person` (`id_person` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_person_has_university_university1`
    FOREIGN KEY (`id_university` )
    REFERENCES `mydb`.`university` (`id_university` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`role` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`role` (
  `id_role` INT NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id_role`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`contacts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`contacts` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`contacts` (
  `idcontacts` INT NOT NULL ,
  `informations` VARCHAR(100) NULL ,
  `id_university` INT NOT NULL ,
  PRIMARY KEY (`idcontacts`) ,
  INDEX `fk_contacts_university1` (`id_university` ASC) ,
  CONSTRAINT `fk_contacts_university1`
    FOREIGN KEY (`id_university` )
    REFERENCES `mydb`.`university` (`id_university` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`phone`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`phone` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`phone` (
  `id_phone` VARCHAR(45) NOT NULL ,
  `phone` VARCHAR(45) NULL ,
  `id_contacts` INT NOT NULL ,
  PRIMARY KEY (`id_phone`) ,
  INDEX `fk_table1_contacts1` (`id_contacts` ASC) ,
  CONSTRAINT `fk_table1_contacts1`
    FOREIGN KEY (`id_contacts` )
    REFERENCES `mydb`.`contacts` (`idcontacts` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`mail`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`mail` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`mail` (
  `id_mail` VARCHAR(45) NOT NULL ,
  `mail` VARCHAR(100) NULL ,
  `id_contacts` INT NOT NULL ,
  PRIMARY KEY (`id_mail`) ,
  INDEX `fk_mail_contacts1` (`id_contacts` ASC) ,
  CONSTRAINT `fk_mail_contacts1`
    FOREIGN KEY (`id_contacts` )
    REFERENCES `mydb`.`contacts` (`idcontacts` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`users` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`users` (
  `id_users` INT NOT NULL AUTO_INCREMENT ,
  `login` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `id_person` INT NULL ,
  `id_role` INT NOT NULL ,
  PRIMARY KEY (`id_users`) ,
  INDEX `fk_users_person1_idx` (`id_person` ASC) ,
  INDEX `fk_users_role1_idx` (`id_role` ASC) ,
  CONSTRAINT `fk_users_person1`
    FOREIGN KEY (`id_person` )
    REFERENCES `mydb`.`person` (`id_person` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_users_role1`
    FOREIGN KEY (`id_role` )
    REFERENCES `mydb`.`role` (`id_role` )
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ci_sessions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`ci_sessions` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`ci_sessions` (
  `session_id` VARCHAR(40) NOT NULL DEFAULT '0' ,
  `ip_address` VARCHAR(16) NOT NULL DEFAULT '0' ,
  `user_agent` VARCHAR(120) NOT NULL ,
  `last_activity` INT(10) UNSIGNED NOT NULL DEFAULT 0 ,
  `user_data` TEXT NOT NULL ,
  PRIMARY KEY (`session_id`) )
ENGINE = InnoDB;

USE `mydb` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
