-- MySQL Workbench Synchronization
-- Generated: 2015-08-28 09:17
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Onyx

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `gimmaster` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

CREATE TABLE IF NOT EXISTS `gimmaster`.`eps` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `detalleEps` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `gimmaster`.`ips` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `detalleIps` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `gimmaster`.`tipoIdentificacion` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `detalleTipoIdentificacion` VARCHAR(2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `gimmaster`.`alumnos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `tipoIdentificacion` INT(11) NOT NULL,
  `eps` INT(11) NOT NULL,
  `ips` INT(11) NOT NULL,
  `estado` INT(11) NOT NULL,
  `rh` INT(11) NOT NULL,
  `genero` INT(11) NOT NULL,
  `nombres` VARCHAR(55) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `apellidoPaterno` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `apellidoMaterno` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `identificacion` VARCHAR(12) NULL DEFAULT NULL,
  `direccion` VARCHAR(60) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `telefono` VARCHAR(8) NULL DEFAULT NULL,
  `celular` VARCHAR(10) NULL DEFAULT NULL,
  `convive` VARCHAR(60) NULL DEFAULT NULL,
  `ianterior` VARCHAR(45) NULL DEFAULT NULL,
  `correo` VARCHAR(50) NULL DEFAULT NULL,
  `fechaNacimiento` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_alumnos_eps_idx` (`eps` ASC),
  INDEX `fk_alumnos_ips1_idx` (`ips` ASC),
  INDEX `fk_alumnos_tipoIdentificacion1_idx` (`tipoIdentificacion` ASC),
  INDEX `fk_alumnos_estado1_idx` (`estado` ASC),
  INDEX `fk_alumnos_rh1_idx` (`rh` ASC),
  INDEX `fk_alumnos_genero1_idx` (`genero` ASC),
  CONSTRAINT `fk_alumnos_eps`
    FOREIGN KEY (`eps`)
    REFERENCES `gimmaster`.`eps` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumnos_ips1`
    FOREIGN KEY (`ips`)
    REFERENCES `gimmaster`.`ips` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumnos_tipoIdentificacion1`
    FOREIGN KEY (`tipoIdentificacion`)
    REFERENCES `gimmaster`.`tipoIdentificacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumnos_estado1`
    FOREIGN KEY (`estado`)
    REFERENCES `gimmaster`.`estado` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumnos_rh1`
    FOREIGN KEY (`rh`)
    REFERENCES `gimmaster`.`rh` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumnos_genero1`
    FOREIGN KEY (`genero`)
    REFERENCES `gimmaster`.`genero` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `gimmaster`.`acudientes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `tipoIdentificacion_a` INT(11) NOT NULL,
  `genero_id` INT(11) NOT NULL,
  `nombres_a` VARCHAR(55) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `apellidoPaterno_a` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `apellidoMaterno_a` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `identificacion_a` VARCHAR(12) NULL DEFAULT NULL,
  `direccion_a` VARCHAR(60) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `telefono_a` VARCHAR(8) NULL DEFAULT NULL,
  `telefonoEmpresa` VARCHAR(20) NULL DEFAULT NULL,
  `celular_a` VARCHAR(12) NULL DEFAULT NULL,
  `correo_a` VARCHAR(50) NULL DEFAULT NULL,
  `fechaNacimiento_a` DATE NULL DEFAULT NULL,
  `empresa_a` VARCHAR(85) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `cargo_a` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `titulo_a` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_alumnos_tipoIdentificacion1_idx` (`tipoIdentificacion_a` ASC),
  INDEX `fk_acudientes_genero1_idx` (`genero_id` ASC),
  CONSTRAINT `fk_alumnos_tipoIdentificacion10`
    FOREIGN KEY (`tipoIdentificacion_a`)
    REFERENCES `gimmaster`.`tipoIdentificacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_acudientes_genero1`
    FOREIGN KEY (`genero_id`)
    REFERENCES `gimmaster`.`genero` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `gimmaster`.`alumnos_acudientes` (
  `alumnos_id` INT(11) NOT NULL,
  `acudientes_id` INT(11) NOT NULL,
  PRIMARY KEY (`alumnos_id`, `acudientes_id`),
  INDEX `fk_alumnos_has_acudientes_acudientes1_idx` (`acudientes_id` ASC),
  INDEX `fk_alumnos_has_acudientes_alumnos1_idx` (`alumnos_id` ASC),
  CONSTRAINT `fk_alumnos_has_acudientes_alumnos1`
    FOREIGN KEY (`alumnos_id`)
    REFERENCES `gimmaster`.`alumnos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumnos_has_acudientes_acudientes1`
    FOREIGN KEY (`acudientes_id`)
    REFERENCES `gimmaster`.`acudientes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `gimmaster`.`estado` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `detalleEstado` VARCHAR(15) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `gimmaster`.`institucion` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `departament` INT(11) NOT NULL,
  `municipio` INT(11) NOT NULL,
  `nit` VARCHAR(12) NULL DEFAULT NULL,
  `nombreInstitucion` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `telefono1` VARCHAR(12) NULL DEFAULT NULL,
  `telefono2` VARCHAR(12) NULL DEFAULT NULL,
  `direccion` VARCHAR(60) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `correo` VARCHAR(40) NULL DEFAULT NULL,
  `url` VARCHAR(25) NULL DEFAULT NULL,
  `dane` VARCHAR(15) NULL DEFAULT NULL,
  `icfes` VARCHAR(15) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_institucion_departamento1_idx` (`departament` ASC),
  INDEX `fk_institucion_municipio1_idx` (`municipio` ASC),
  CONSTRAINT `fk_institucion_departamento1`
    FOREIGN KEY (`departament`)
    REFERENCES `gimmaster`.`poblacion` (`idpoblacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_institucion_municipio1`
    FOREIGN KEY (`municipio`)
    REFERENCES `gimmaster`.`provincia` (`idprovincia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `gimmaster`.`poblacion` (
  `idpoblacion` INT(11) NOT NULL AUTO_INCREMENT,
  `detalleDepartamento` VARCHAR(25) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `idprovincia` INT(11) NOT NULL,
  PRIMARY KEY (`idpoblacion`),
  INDEX `fk_poblacion_provincia1_idx` (`idprovincia` ASC),
  CONSTRAINT `fk_poblacion_provincia1`
    FOREIGN KEY (`idprovincia`)
    REFERENCES `gimmaster`.`provincia` (`idprovincia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `gimmaster`.`provincia` (
  `idprovincia` INT(11) NOT NULL AUTO_INCREMENT,
  `detalleMunicipio` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`idprovincia`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `gimmaster`.`asignaturas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `codigoAsignatura` VARCHAR(15) NULL DEFAULT NULL,
  `detalleAsignatura` VARCHAR(60) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `gimmaster`.`asignaturas_alumnos` (
  `asignaturas` INT(11) NOT NULL,
  `alumnos` INT(11) NOT NULL,
  PRIMARY KEY (`asignaturas`, `alumnos`),
  INDEX `fk_asignaturas_has_alumnos_alumnos1_idx` (`alumnos` ASC),
  INDEX `fk_asignaturas_has_alumnos_asignaturas1_idx` (`asignaturas` ASC),
  CONSTRAINT `fk_asignaturas_has_alumnos_asignaturas1`
    FOREIGN KEY (`asignaturas`)
    REFERENCES `gimmaster`.`asignaturas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignaturas_has_alumnos_alumnos1`
    FOREIGN KEY (`alumnos`)
    REFERENCES `gimmaster`.`alumnos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `gimmaster`.`rh` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `detalleRh` VARCHAR(3) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE TABLE IF NOT EXISTS `gimmaster`.`genero` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `detalleGenero` VARCHAR(12) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
