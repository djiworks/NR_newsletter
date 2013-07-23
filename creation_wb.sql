SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `mydb` ;
CREATE SCHEMA IF NOT EXISTS `mydb` ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`university`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`university` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`university` (
  `id_university` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `address` VARCHAR(255) NULL DEFAULT NULL ,
  `country` VARCHAR(45) NULL DEFAULT NULL ,
  `subscription` TINYINT(1) NULL DEFAULT NULL ,
  `checking_state` INT(11) NOT NULL DEFAULT '0' COMMENT '0 = no checked, 1= OK, 2= no OK' ,
  `comment` LONGTEXT NULL DEFAULT NULL ,
  PRIMARY KEY (`id_university`) )
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mydb`.`contact`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`contact` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`contact` (
  `id_contact` INT(11) NOT NULL AUTO_INCREMENT ,
  `information` VARCHAR(100) NOT NULL ,
  `id_university` INT(11) NOT NULL ,
  PRIMARY KEY (`id_contact`) ,
  INDEX `fk_contacts_university1` (`id_university` ASC) ,
  CONSTRAINT `fk_contacts_university1`
    FOREIGN KEY (`id_university` )
    REFERENCES `mydb`.`university` (`id_university` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mydb`.`mail`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`mail` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`mail` (
  `id_mail` INT(11) NOT NULL AUTO_INCREMENT ,
  `mail` VARCHAR(100) NOT NULL ,
  `id_contact` INT(11) NOT NULL ,
  PRIMARY KEY (`id_mail`) ,
  INDEX `fk_mail_contacts1` (`id_contact` ASC) ,
  CONSTRAINT `fk_mail_contacts1`
    FOREIGN KEY (`id_contact` )
    REFERENCES `mydb`.`contact` (`id_contact` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mydb`.`newsletter`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`newsletter` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`newsletter` (
  `id_newsletter` INT(11) NOT NULL AUTO_INCREMENT ,
  `type` INT(11) NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(255) NULL DEFAULT NULL ,
  `path` VARCHAR(100) NULL DEFAULT NULL ,
  `creation_date` DATETIME NOT NULL ,
  `cover` VARCHAR(100) NOT NULL ,
  `checking_state` INT(11) NOT NULL COMMENT '0= writing, 1 = Designing, 2= HTML, 3= sent' ,
  `content` LONGTEXT NOT NULL ,
  `comment` LONGTEXT NULL DEFAULT NULL ,
  PRIMARY KEY (`id_newsletter`) )
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mydb`.`person`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`person` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`person` (
  `id_person` INT(11) NOT NULL AUTO_INCREMENT ,
  `first_name` VARCHAR(45) NULL DEFAULT NULL ,
  `last_name` VARCHAR(45) NULL DEFAULT NULL ,
  `phone` VARCHAR(45) NULL DEFAULT NULL ,
  `mail` VARCHAR(45) NULL DEFAULT NULL ,
  `country` VARCHAR(45) NULL DEFAULT NULL ,
  `worked_until` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id_person`) )
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mydb`.`phone`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`phone` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`phone` (
  `id_phone` INT(11) NOT NULL AUTO_INCREMENT ,
  `number` VARCHAR(45) NOT NULL ,
  `type` INT(11) NOT NULL DEFAULT '0' COMMENT '0=phone, 1=fax' ,
  `id_contact` INT(11) NOT NULL ,
  PRIMARY KEY (`id_phone`) ,
  INDEX `fk_table1_contacts1` (`id_contact` ASC) ,
  CONSTRAINT `fk_table1_contacts1`
    FOREIGN KEY (`id_contact` )
    REFERENCES `mydb`.`contact` (`id_contact` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mydb`.`recommended_by`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`recommended_by` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`recommended_by` (
  `id_person` INT(11) NOT NULL ,
  `id_university` INT(11) NOT NULL ,
  `is_student` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0= No, 1= Yes' ,
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
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mydb`.`role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`role` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`role` (
  `id_role` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id_role`) )
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mydb`.`sent_newsletter_person`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`sent_newsletter_person` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`sent_newsletter_person` (
  `id_newsletter` INT(11) NOT NULL ,
  `id_person` INT(11) NOT NULL ,
  `sending_date` DATETIME NOT NULL ,
  PRIMARY KEY (`id_newsletter`, `id_person`) ,
  INDEX `fk_newsletter_has_person_person1_idx` (`id_person` ASC) ,
  INDEX `fk_newsletter_has_person_newsletter1_idx` (`id_newsletter` ASC) ,
  CONSTRAINT `fk_newsletter_has_person_newsletter1`
    FOREIGN KEY (`id_newsletter` )
    REFERENCES `mydb`.`newsletter` (`id_newsletter` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_newsletter_has_person_person1`
    FOREIGN KEY (`id_person` )
    REFERENCES `mydb`.`person` (`id_person` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mydb`.`sent_newsletter_university`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`sent_newsletter_university` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`sent_newsletter_university` (
  `id_university` INT(11) NOT NULL ,
  `id_newsletter` INT(11) NOT NULL ,
  `sending_date` DATETIME NOT NULL ,
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
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mydb`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`user` ;

CREATE  TABLE IF NOT EXISTS `mydb`.`user` (
  `id_user` INT(11) NOT NULL AUTO_INCREMENT ,
  `login` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `id_person` INT(11) NULL ,
  `id_role` INT(11) NOT NULL ,
  PRIMARY KEY (`id_user`) ,
  INDEX `fk_users_role1_idx` (`id_role` ASC) ,
  INDEX `fk_user_person1_idx` (`id_person` ASC) ,
  CONSTRAINT `fk_users_role1`
    FOREIGN KEY (`id_role` )
    REFERENCES `mydb`.`role` (`id_role` )
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_user_person1`
    FOREIGN KEY (`id_person` )
    REFERENCES `mydb`.`person` (`id_person` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;

USE `mydb` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;