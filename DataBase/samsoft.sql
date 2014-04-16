# SQL Manager Lite for MySQL 5.4.2.43077
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : sam_soft


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `sam_soft`
    CHARACTER SET 'utf8'
    COLLATE 'utf8_general_ci';

USE `sam_soft`;

#
# Structure for the `categoria` table : 
#

CREATE TABLE `categoria` (
  `idcategoria` INTEGER(11) NOT NULL,
  `nomcategoria` TEXT COLLATE utf8_general_ci NOT NULL,
  `descategoria` TEXT COLLATE utf8_general_ci,
  PRIMARY KEY USING BTREE (`idcategoria`) COMMENT ''
)ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `detalle_activo_fijo` table : 
#

CREATE TABLE `detalle_activo_fijo` (
  `iddetactivo` INTEGER(11) NOT NULL,
  `idcategoria` INTEGER(11) DEFAULT NULL,
  `nomdetactivo` TEXT COLLATE utf8_general_ci NOT NULL,
  `desdetactivo` TEXT COLLATE utf8_general_ci NOT NULL,
  `stock` INTEGER(11) DEFAULT NULL,
  PRIMARY KEY USING BTREE (`iddetactivo`) COMMENT '',
   INDEX `fk_relationship_6` USING BTREE (`idcategoria`) COMMENT '',
  CONSTRAINT `fk_relationship_6` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`)
)ENGINE=InnoDB
AVG_ROW_LENGTH=8192 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `ciudad` table : 
#

CREATE TABLE `ciudad` (
  `idciudad` INTEGER(11) NOT NULL,
  `ciudad` TEXT COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY USING BTREE (`idciudad`) COMMENT ''
)ENGINE=InnoDB
AVG_ROW_LENGTH=8192 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `sucursal` table : 
#

CREATE TABLE `sucursal` (
  `idsucursal` INTEGER(11) NOT NULL,
  `idciudad` INTEGER(11) DEFAULT NULL,
  `encargado` TEXT COLLATE utf8_general_ci NOT NULL,
  `telefono` DECIMAL(8,0) DEFAULT NULL,
  `direccion` TEXT COLLATE utf8_general_ci,
  PRIMARY KEY USING BTREE (`idsucursal`) COMMENT '',
   INDEX `fk_relationship_1` USING BTREE (`idciudad`) COMMENT '',
  CONSTRAINT `fk_relationship_1` FOREIGN KEY (`idciudad`) REFERENCES `ciudad` (`idciudad`)
)ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `activo_fijo` table : 
#

CREATE TABLE `activo_fijo` (
  `idactivo` INTEGER(11) NOT NULL,
  `iddetactivo` INTEGER(11) DEFAULT NULL,
  `idsucursal` INTEGER(11) DEFAULT NULL,
  `numserial` VARCHAR(30) COLLATE utf8_general_ci NOT NULL,
  `stock` INTEGER(11) DEFAULT NULL,
  PRIMARY KEY USING BTREE (`idactivo`) COMMENT '',
   INDEX `fk_relationship_4` USING BTREE (`iddetactivo`) COMMENT '',
   INDEX `fk_relationship_5` USING BTREE (`idsucursal`) COMMENT '',
  CONSTRAINT `fk_relationship_4` FOREIGN KEY (`iddetactivo`) REFERENCES `detalle_activo_fijo` (`iddetactivo`),
  CONSTRAINT `fk_relationship_5` FOREIGN KEY (`idsucursal`) REFERENCES `sucursal` (`idsucursal`)
)ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Structure for the `usuario` table : 
#

CREATE TABLE `usuario` (
  `iduser` INTEGER(11) NOT NULL,
  `login` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `password` VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
  `tipo` INTEGER(11) DEFAULT NULL,
  `estado` TINYINT(1) DEFAULT NULL,
  PRIMARY KEY USING BTREE (`iduser`) COMMENT ''
)ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
COMMENT=''
;

#
# Data for the `categoria` table  (LIMIT -498,500)
#

INSERT INTO `categoria` (`idcategoria`, `nomcategoria`, `descategoria`) VALUES

  (1,'Muebles y Utiles',NULL);
COMMIT;

#
# Data for the `detalle_activo_fijo` table  (LIMIT -498,500)
#

INSERT INTO `detalle_activo_fijo` (`iddetactivo`, `idcategoria`, `nomdetactivo`, `desdetactivo`, `stock`) VALUES

  (6,1,'fdsfds','rewr',324);
COMMIT;

#
# Data for the `ciudad` table  (LIMIT -497,500)
#

INSERT INTO `ciudad` (`idciudad`, `ciudad`) VALUES

  (1,'Cochabamba'),
  (2,'Santa Cruz');
COMMIT;

#
# Data for the `sucursal` table  (LIMIT -498,500)
#

INSERT INTO `sucursal` (`idsucursal`, `idciudad`, `encargado`, `telefono`, `direccion`) VALUES

  (1,1,'Cristian',70354495,'Centro');
COMMIT;

#
# Data for the `usuario` table  (LIMIT -498,500)
#

INSERT INTO `usuario` (`iduser`, `login`, `password`, `tipo`, `estado`) VALUES

  (1,'admin','21232f297a57a5a743894a0e4a801fc3',0,1);
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;