-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bd_academia
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bd_academia
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bd_academia` DEFAULT CHARACTER SET utf8 ;
USE `bd_academia` ;

-- -----------------------------------------------------
-- Table `bd_academia`.`Aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_academia`.`Aluno` (
  `idaluno` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(45) NULL,
  `cpf` VARCHAR(45) NULL,
  `telefone` VARCHAR(45) NULL,
  PRIMARY KEY (`idaluno`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_academia`.`Treino`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_academia`.`Treino` (
  `idTreino` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(45) NULL,
  `Descricao` TEXT NULL,
  PRIMARY KEY (`idTreino`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_academia`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_academia`.`categoria` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT,
  `deacricao` VARCHAR(45) NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_academia`.`Exercicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_academia`.`Exercicio` (
  `idExercicio` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `Descricao` TEXT NULL,
  `categoria_idcategoria` INT NOT NULL,
  PRIMARY KEY (`idExercicio`),
  INDEX `fk_Exercicio_categoria1_idx` (`categoria_idcategoria` ASC) VISIBLE,
  CONSTRAINT `fk_Exercicio_categoria1`
    FOREIGN KEY (`categoria_idcategoria`)
    REFERENCES `bd_academia`.`categoria` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_academia`.`Treino_has_Exercicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_academia`.`Treino_has_Exercicio` (
  `Treino_idTreino` INT NOT NULL,
  `Exercicio_idExercicio` INT NOT NULL,
  `series` INT NULL,
  `repeticao` INT NULL,
  PRIMARY KEY (`Treino_idTreino`, `Exercicio_idExercicio`),
  INDEX `fk_Treino_has_Exercicio_Exercicio1_idx` (`Exercicio_idExercicio` ASC) VISIBLE,
  INDEX `fk_Treino_has_Exercicio_Treino_idx` (`Treino_idTreino` ASC) VISIBLE,
  CONSTRAINT `fk_Treino_has_Exercicio_Treino`
    FOREIGN KEY (`Treino_idTreino`)
    REFERENCES `bd_academia`.`Treino` (`idTreino`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Treino_has_Exercicio_Exercicio1`
    FOREIGN KEY (`Exercicio_idExercicio`)
    REFERENCES `bd_academia`.`Exercicio` (`idExercicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_academia`.`Aluno_has_Treino`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_academia`.`Aluno_has_Treino` (
  `Aluno_idaluno` INT NOT NULL,
  `Treino_idTreino` INT NOT NULL,
  PRIMARY KEY (`Aluno_idaluno`, `Treino_idTreino`),
  INDEX `fk_Aluno_has_Treino_Treino1_idx` (`Treino_idTreino` ASC) VISIBLE,
  INDEX `fk_Aluno_has_Treino_Aluno1_idx` (`Aluno_idaluno` ASC) VISIBLE,
  CONSTRAINT `fk_Aluno_has_Treino_Aluno1`
    FOREIGN KEY (`Aluno_idaluno`)
    REFERENCES `bd_academia`.`Aluno` (`idaluno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Aluno_has_Treino_Treino1`
    FOREIGN KEY (`Treino_idTreino`)
    REFERENCES `bd_academia`.`Treino` (`idTreino`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
