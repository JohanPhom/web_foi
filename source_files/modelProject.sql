-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema WebDiP2019x1001
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema WebDiP2019x1001
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `WebDiP2019x1001` DEFAULT CHARACTER SET utf8 ;
USE `WebDiP2019x1001` ;

-- -----------------------------------------------------
-- Table `WebDiP2019x1001`.`user_type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2019x1001`.`user_type` (
  `ID_user_type` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `description` TEXT NULL,
  PRIMARY KEY (`ID_user_type`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2019x1001`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2019x1001`.`user` (
  `ID_user` INT NOT NULL AUTO_INCREMENT,
  `ID_user_type` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `surname` VARCHAR(70) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(70) NOT NULL,
  `password_hash` VARCHAR(255) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `registration_date` TIMESTAMP NOT NULL,
  `locked` TINYINT NOT NULL,
  `phone` INT NULL,
  PRIMARY KEY (`ID_user`),
  INDEX `fk_user_user_type_idx` (`ID_user_type` ASC),
  CONSTRAINT `fk_user_user_type`
    FOREIGN KEY (`ID_user_type`)
    REFERENCES `WebDiP2019x1001`.`user_type` (`ID_user_type`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2019x1001`.`statistics`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2019x1001`.`statistics` (
  `ID_user` INT NOT NULL,
  `current_point` INT NOT NULL,
  `nb_create_discussion` INT NOT NULL,
  `nb_question` INT NOT NULL,
  `nb_answer` INT NOT NULL,
  PRIMARY KEY (`ID_user`),
  CONSTRAINT `fk_statistics_user1`
    FOREIGN KEY (`ID_user`)
    REFERENCES `WebDiP2019x1001`.`user` (`ID_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2019x1001`.`type_message`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2019x1001`.`type_message` (
  `ID_type_message` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `point_given` INT NOT NULL,
  PRIMARY KEY (`ID_type_message`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2019x1001`.`club`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2019x1001`.`club` (
  `ID_club` INT NOT NULL AUTO_INCREMENT,
  `ID_creator_user` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `description` TEXT NOT NULL,
  `nb_member` INT NOT NULL,
  `nb_item` INT NOT NULL,
  `date` TIMESTAMP NOT NULL,
  `author` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID_club`),
  INDEX `fk_club_user1_idx` (`ID_creator_user` ASC),
  CONSTRAINT `fk_club_user1`
    FOREIGN KEY (`ID_creator_user`)
    REFERENCES `WebDiP2019x1001`.`user` (`ID_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2019x1001`.`forum`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2019x1001`.`forum` (
  `ID_forum` INT NOT NULL AUTO_INCREMENT,
  `ID_club` INT NOT NULL,
  `ID_creator_user` INT NOT NULL,
  `subject` TEXT NOT NULL,
  `date` TIMESTAMP NOT NULL,
  `number_answer` INT NULL,
  PRIMARY KEY (`ID_forum`),
  INDEX `fk_forum_user1_idx` (`ID_creator_user` ASC),
  INDEX `fk_forum_club1_idx` (`ID_club` ASC),
  CONSTRAINT `fk_forum_user1`
    FOREIGN KEY (`ID_creator_user`)
    REFERENCES `WebDiP2019x1001`.`user` (`ID_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_forum_club1`
    FOREIGN KEY (`ID_club`)
    REFERENCES `WebDiP2019x1001`.`club` (`ID_club`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2019x1001`.`message`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2019x1001`.`message` (
  `ID_message` INT NOT NULL AUTO_INCREMENT,
  `ID_user` INT NOT NULL,
  `ID_type_message` INT NOT NULL,
  `ID_forum` INT NOT NULL,
  `best_answer` TINYINT NOT NULL,
  `text_message` TEXT NOT NULL,
  `date` TIMESTAMP NOT NULL,
  PRIMARY KEY (`ID_message`),
  INDEX `fk_message_user1_idx` (`ID_user` ASC),
  INDEX `fk_message_type_message1_idx` (`ID_type_message` ASC),
  INDEX `fk_message_forum1_idx` (`ID_forum` ASC),
  CONSTRAINT `fk_message_user1`
    FOREIGN KEY (`ID_user`)
    REFERENCES `WebDiP2019x1001`.`user` (`ID_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_message_type_message1`
    FOREIGN KEY (`ID_type_message`)
    REFERENCES `WebDiP2019x1001`.`type_message` (`ID_type_message`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_message_forum1`
    FOREIGN KEY (`ID_forum`)
    REFERENCES `WebDiP2019x1001`.`forum` (`ID_forum`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2019x1001`.`item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2019x1001`.`item` (
  `ID_item` INT NOT NULL AUTO_INCREMENT,
  `ID_creator_user` INT NOT NULL,
  `ID_club` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `description` TEXT NOT NULL,
  `price` INT NOT NULL,
  `quantity` INT NOT NULL,
  `picture` LONGTEXT NULL,
  PRIMARY KEY (`ID_item`),
  INDEX `fk_item_user1_idx` (`ID_creator_user` ASC),
  INDEX `fk_item_club1_idx` (`ID_club` ASC),
  CONSTRAINT `fk_item_user1`
    FOREIGN KEY (`ID_creator_user`)
    REFERENCES `WebDiP2019x1001`.`user` (`ID_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_item_club1`
    FOREIGN KEY (`ID_club`)
    REFERENCES `WebDiP2019x1001`.`club` (`ID_club`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2019x1001`.`purchase`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2019x1001`.`purchase` (
  `ID_purchase` INT NOT NULL AUTO_INCREMENT,
  `ID_item` INT NOT NULL,
  `ID_user` INT NOT NULL,
  `date` TIMESTAMP NOT NULL,
  PRIMARY KEY (`ID_purchase`),
  INDEX `fk_purchase_user1_idx` (`ID_user` ASC),
  INDEX `fk_purchase_item1_idx` (`ID_item` ASC),
  CONSTRAINT `fk_purchase_user1`
    FOREIGN KEY (`ID_user`)
    REFERENCES `WebDiP2019x1001`.`user` (`ID_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_purchase_item1`
    FOREIGN KEY (`ID_item`)
    REFERENCES `WebDiP2019x1001`.`item` (`ID_item`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2019x1001`.`user_has_item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2019x1001`.`user_has_item` (
  `ID_user` INT NOT NULL,
  `ID_item` INT NOT NULL,
  PRIMARY KEY (`ID_user`, `ID_item`),
  INDEX `fk_user_has_item_item1_idx` (`ID_item` ASC),
  INDEX `fk_user_has_item_user1_idx` (`ID_user` ASC),
  CONSTRAINT `fk_user_has_item_user1`
    FOREIGN KEY (`ID_user`)
    REFERENCES `WebDiP2019x1001`.`user` (`ID_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_item_item1`
    FOREIGN KEY (`ID_item`)
    REFERENCES `WebDiP2019x1001`.`item` (`ID_item`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2019x1001`.`club_member`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2019x1001`.`club_member` (
  `ID_user` INT NOT NULL,
  `ID_club` INT NOT NULL,
  `moderator` TINYINT NOT NULL,
  PRIMARY KEY (`ID_user`, `ID_club`),
  INDEX `fk_user_has_club_club1_idx` (`ID_club` ASC),
  INDEX `fk_user_has_club_user1_idx` (`ID_user` ASC),
  CONSTRAINT `fk_user_has_club_user1`
    FOREIGN KEY (`ID_user`)
    REFERENCES `WebDiP2019x1001`.`user` (`ID_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_club_club1`
    FOREIGN KEY (`ID_club`)
    REFERENCES `WebDiP2019x1001`.`club` (`ID_club`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2019x1001`.`test`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2019x1001`.`test` (
  `ID_test` INT NOT NULL AUTO_INCREMENT,
  `ID_club` INT NOT NULL,
  `nb_question` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID_test`),
  INDEX `fk_test_club1_idx` (`ID_club` ASC),
  CONSTRAINT `fk_test_club1`
    FOREIGN KEY (`ID_club`)
    REFERENCES `WebDiP2019x1001`.`club` (`ID_club`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2019x1001`.`test_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2019x1001`.`test_user` (
  `ID_test_user` INT NOT NULL AUTO_INCREMENT,
  `ID_user` INT NOT NULL,
  `ID_test` INT NOT NULL,
  `date` TIMESTAMP NOT NULL,
  `success` TINYINT NOT NULL,
  `good_anwser` INT NOT NULL,
  `nb_attempt` INT NOT NULL,
  PRIMARY KEY (`ID_test_user`),
  INDEX `fk_test_user_user1_idx` (`ID_user` ASC),
  INDEX `fk_test_user_test1_idx` (`ID_test` ASC),
  CONSTRAINT `fk_test_user_user1`
    FOREIGN KEY (`ID_user`)
    REFERENCES `WebDiP2019x1001`.`user` (`ID_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_test_user_test1`
    FOREIGN KEY (`ID_test`)
    REFERENCES `WebDiP2019x1001`.`test` (`ID_test`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2019x1001`.`question_answer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2019x1001`.`question_answer` (
  `ID_question` INT NOT NULL AUTO_INCREMENT,
  `question` TEXT NOT NULL,
  `answer` TEXT NOT NULL,
  PRIMARY KEY (`ID_question`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2019x1001`.`test_has_question_answer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2019x1001`.`test_has_question_answer` (
  `test_ID_test` INT NOT NULL,
  `question_answer_ID_question` INT NOT NULL,
  PRIMARY KEY (`test_ID_test`, `question_answer_ID_question`),
  INDEX `fk_test_has_question_answer_question_answer1_idx` (`question_answer_ID_question` ASC),
  INDEX `fk_test_has_question_answer_test1_idx` (`test_ID_test` ASC),
  CONSTRAINT `fk_test_has_question_answer_test1`
    FOREIGN KEY (`test_ID_test`)
    REFERENCES `WebDiP2019x1001`.`test` (`ID_test`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_test_has_question_answer_question_answer1`
    FOREIGN KEY (`question_answer_ID_question`)
    REFERENCES `WebDiP2019x1001`.`question_answer` (`ID_question`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
