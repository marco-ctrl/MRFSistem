USE `mrfbermejobd`;

SET FOREIGN_KEY_CHECKS=0 
;

/* Drop Tables */

DROP TABLE IF EXISTS `aalumno` CASCADE
;

DROP TABLE IF EXISTS `aapoeco` CASCADE
;

DROP TABLE IF EXISTS `aapoobj` CASCADE
;

DROP TABLE IF EXISTS `aapotes` CASCADE
;

DROP TABLE IF EXISTS `abardir` CASCADE
;

DROP TABLE IF EXISTS `acaldir` CASCADE
;

DROP TABLE IF EXISTS `acelula` CASCADE
;

DROP TABLE IF EXISTS `aciudad` CASCADE
;

DROP TABLE IF EXISTS `aconido` CASCADE
;

DROP TABLE IF EXISTS `acreesp` CASCADE
;

DROP TABLE IF EXISTS `acursom` CASCADE
;

DROP TABLE IF EXISTS `ainfrme` CASCADE
;

DROP TABLE IF EXISTS `aiteinf` CASCADE
;

DROP TABLE IF EXISTS `amaetro` CASCADE
;

DROP TABLE IF EXISTS `amatula` CASCADE
;

DROP TABLE IF EXISTS `amiebro` CASCADE
;

DROP TABLE IF EXISTS `amiecel` CASCADE
;

DROP TABLE IF EXISTS `aproion` CASCADE
;

DROP TABLE IF EXISTS `ausurio` CASCADE
;

DROP TABLE IF EXISTS `aviscel` CASCADE
;

DROP TABLE IF EXISTS `avisita` CASCADE
;

/* Create Tables */

CREATE TABLE `aalumno`
(
	`facodmie` varchar(10) NOT NULL,
	`pacodalu` varchar(10) NOT NULL,
	`caestalu` BOOL NOT NULL,
	CONSTRAINT `PK_Alumno` PRIMARY KEY (`pacodalu` ASC)
)

;

CREATE TABLE `aapoeco`
(
	`camontot` DOUBLE(10,2) NOT NULL,
	`pacodeco` varchar(10) NOT NULL,
	CONSTRAINT `PK_Aporte_economico` PRIMARY KEY (`pacodeco` ASC)
)

;

CREATE TABLE `aapoobj`
(
	`cacanobj` INT NOT NULL,
	`cadesobj` varchar(150) NOT NULL,
	`pacodobj` varchar(10) NOT NULL,
	CONSTRAINT `PK_Aporte_objeto` PRIMARY KEY (`pacodobj` ASC)
)

;

CREATE TABLE `aapotes`
(
	`caestapo` BOOL NOT NULL,
	`cafecapo` DATE NOT NULL,
	`cahorapo` TIME(6) NOT NULL,
	`pacodapo` varchar(10) NOT NULL,
	`facodusu` varchar(10) NOT NULL,
	CONSTRAINT `PK_Aportes` PRIMARY KEY (`pacodapo` ASC)
)

;

CREATE TABLE `abardir`
(
	`caestbar` BOOL NOT NULL,
	`canombar` VARCHAR(30) NOT NULL,
	`pacodbar` VARCHAR(10) NOT NULL,
	CONSTRAINT `PK_Barrio` PRIMARY KEY (`pacodbar` ASC)
)

;

CREATE TABLE `acaldir`
(
	`caestcal` BOOL NOT NULL,
	`canomcal` VARCHAR(30) NOT NULL,
	`pacodcal` VARCHAR(10) NOT NULL,
	CONSTRAINT `PK_Calle` PRIMARY KEY (`pacodcal` ASC)
)

;

CREATE TABLE `acelula`
(
	`caestcel` BOOL NOT NULL,
	`canomcel` varchar(30) NOT NULL,
	`canumcel` varchar(4) NOT NULL,
	`pacodcel` varchar(10) NOT NULL,
	`facodbar` VARCHAR(10) NOT NULL,
	`calatcel` DECIMAL(20,10) NOT NULL,
	`facodcal` VARCHAR(10) NOT NULL,
	`calogcel` DECIMAL(20,10) NOT NULL,
	CONSTRAINT `PK_Celula` PRIMARY KEY (`pacodcel` ASC)
)

;

CREATE TABLE `aciudad`
(
	`caestciu` BOOL NOT NULL,
	`canomciu` VARCHAR(30) NOT NULL,
	`pacodciu` VARCHAR(10) NOT NULL,
	CONSTRAINT `PK_Ciudad` PRIMARY KEY (`pacodciu` ASC)
)

;

CREATE TABLE `aconido`
(
	`cadescon` varchar(150) NOT NULL,
	`caestcon` BOOL NOT NULL,
	`canomcon` varchar(20) NOT NULL,
	`pacodcon` varchar(10) NOT NULL,
	CONSTRAINT `PK_Contenido` PRIMARY KEY (`pacodcon` ASC)
)

;

CREATE TABLE `acreesp`
(
	`cafecenc` DATE NULL,
	`cafecbau` DATE NULL,
	`cafeccon` DATE NULL,
	`cafecigl` DATE NULL,
	`pacodcre` varchar(10) NOT NULL,
	CONSTRAINT `PK_CrecimientoEspiritual` PRIMARY KEY (`pacodcre` ASC)
)

;

CREATE TABLE `acursom` (
    `cadescur` VARCHAR(15) NOT NULL,
    `caestcur` BOOL NOT NULL,
    `cafecini` DATE NOT NULL,
    `cagescur` VARCHAR(4) NOT NULL,
    `facodcon` VARCHAR(10) NOT NULL,
    `facodmae` VARCHAR(10) NOT NULL,
    `pacodcur` VARCHAR(10) NOT NULL,
    CONSTRAINT `PK_Curso` PRIMARY KEY (`pacodcur` ASC)
)

;

CREATE TABLE `ainfrme`
(
	`cafecinf` DATE NOT NULL,
	`pacodinf` varchar(10) NOT NULL,
	CONSTRAINT `PK_Informe` PRIMARY KEY (`pacodinf` ASC)
)

;

CREATE TABLE `aiteinf`
(
	`pacodite` varchar(10) NOT NULL,
	`facodinf` varchar(10) NOT NULL,
	`facodmcl` varchar(10) NOT NULL,
	`facodvcl` varchar(10) NOT NULL,
	CONSTRAINT `PK_Iteminforme` PRIMARY KEY (`pacodite` ASC)
)

;

CREATE TABLE `amaetro`
(
	`facodmie` varchar(10) NOT NULL,
	`pacodmae` varchar(10) NOT NULL,
	CONSTRAINT `PK_Maestro` PRIMARY KEY (`pacodmae` ASC)
)

;

CREATE TABLE `amatula`
(
	`caestmat` BOOL NOT NULL,
	`cafecmat` DATE NOT NULL,
	`cahormat` TIMESTAMP NOT NULL,
	`pacodmat` varchar(10) NOT NULL,
	`facodalu` varchar(10) NOT NULL,
	`facodcur` varchar(10) NOT NULL,
	`facodusu` varchar(10) NOT NULL,
	CONSTRAINT `PK_Matriculacion_escuela` PRIMARY KEY (`pacodmat` ASC)
)

;

CREATE TABLE `amiebro`
(
	`camatmie` varchar(30) NULL,
	`capatmie` varchar(30) NULL,
	`cacelmie` varchar(15) NOT NULL,
	`cacidmie` varchar(15) NOT NULL,
	`cadirmie` varchar(100) NOT NULL,
	`caestmie` BOOL NOT NULL,
	`ceestciv` varchar(30) NOT NULL,
	`cafecnac` DATE NOT NULL,
	`cafotmie` BLOB NOT NULL,
	`canommie` varchar(30) NOT NULL,
	`facodciu` VARCHAR(10) NOT NULL,
	`facodpro` VARCHAR(10) NOT NULL,
	`pacodmie` varchar(10) NOT NULL,
	`caurlfot` VARCHAR(90) NOT NULL,
	CONSTRAINT `PK_Miembro` PRIMARY KEY (`pacodmie` ASC)
)

;

CREATE TABLE `amiecel`
(
	`cafunmie` varchar(20) NOT NULL,
	`facodcel` varchar(10) NOT NULL,
	`facodmie` varchar(10) NOT NULL,
	`pacodmcl` varchar(10) NOT NULL,
	`caestmcl` BOOL NOT NULL,
	CONSTRAINT `PK_Miembro-celula` PRIMARY KEY (`pacodmcl` ASC)
)

;

CREATE TABLE `aproion`
(
	`canompro` VARCHAR(30) NOT NULL,
	`pacodpro` VARCHAR(10) NOT NULL,
	CONSTRAINT `PK_Profesion` PRIMARY KEY (`pacodpro` ASC)
)

;

CREATE TABLE `ausurio`
(
	`caconusu` varchar(8) NOT NULL,
	`catipusu` varchar(20) NOT NULL,
	`canomusu` varchar(8) NOT NULL,
	`facodmie` varchar(10) NOT NULL,
	`pacodusu` varchar(10) NOT NULL,
	CONSTRAINT `PK_Usuario` PRIMARY KEY (`pacodusu` ASC)
)

;

CREATE TABLE `aviscel`
(
	`cafecvis` DATE NOT NULL,
	`facodcel` varchar(10) NOT NULL,
	`facodvis` varchar(10) NOT NULL,
	`pacodvcl` varchar(10) NOT NULL,
	`caestvcl` BOOL NOT NULL,
	`pacodvis` varchar(10) NULL,
	CONSTRAINT `PK_Visita_celula` PRIMARY KEY (`pacodvcl` ASC)
)

;

CREATE TABLE `avisita`
(
	`caapavis` varchar(30) NULL,
	`caamavis` varchar(30) NULL,
	`cadirvis` varchar(60) NOT NULL,
	`canomvis` varchar(30) NOT NULL,
	`catelvis` varchar(15) NOT NULL,
	`caestvis` BOOL NOT NULL,
	`pacodvis` varchar(10) NOT NULL,
	CONSTRAINT `PK_Visita` PRIMARY KEY (`pacodvis` ASC)
)

;

/* Create Primary Keys, Indexes, Uniques, Checks */

ALTER TABLE `aalumno` 
 ADD INDEX `IXFK_Alumno_Miembro` (`facodmie` ASC)
;

ALTER TABLE `aapoeco` 
 ADD INDEX `IXFK_Aporte_Economico_Aportes` (`pacodeco` ASC)
;

ALTER TABLE `aapoobj` 
 ADD INDEX `IXFK_Aporte_Objeto_Aportes` (`pacodobj` ASC)
;

ALTER TABLE `aapotes` 
 ADD INDEX `IXFK_Aportes_Usuario` (`facodusu` ASC)
;

ALTER TABLE `acelula` 
 ADD INDEX `IXFK_Celula_Barrio` (`facodbar` ASC)
;

ALTER TABLE `acelula` 
 ADD INDEX `IXFK_Celula_Calle` (`facodcal` ASC)
;

ALTER TABLE `acreesp` 
 ADD INDEX `IXFK_CrecimientoEspiritual_Miembro` (`pacodcre` ASC)
;

ALTER TABLE `acursom` 
 ADD INDEX `IXFK_Curso_Contenido` (`facodcon` ASC)
;

ALTER TABLE `acursom` 
 ADD INDEX `IXFK_Curso_Maestro` (`facodmae` ASC)
;

ALTER TABLE `aiteinf` 
 ADD INDEX `IXFK_Iteminforme_Informe` (`facodinf` ASC)
;

ALTER TABLE `aiteinf` 
 ADD INDEX `IXFK_Iteminforme_Miembro-celula` (`facodmcl` ASC)
;

ALTER TABLE `aiteinf` 
 ADD INDEX `IXFK_Iteminforme_Visita_celula` (`facodvcl` ASC)
;

ALTER TABLE `amaetro` 
 ADD INDEX `IXFK_Maestro_Miembro` (`facodmie` ASC)
;

ALTER TABLE `amatula` 
 ADD INDEX `IXFK_Matriculacion_escuela_Alumno` (`facodalu` ASC)
;

ALTER TABLE `amatula` 
 ADD INDEX `IXFK_Matriculacion_escuela_Curso` (`facodcur` ASC)
;

ALTER TABLE `amatula` 
 ADD INDEX `IXFK_Matriculacion_escuela_Usuario` (`facodusu` ASC)
;

ALTER TABLE `amiecel` 
 ADD INDEX `IXFK_Miembro-celula_Celula` (`facodcel` ASC)
;

ALTER TABLE `amiecel` 
 ADD INDEX `IXFK_Miembro-celula_Miembro` (`facodmie` ASC)
;

ALTER TABLE `ausurio` 
 ADD INDEX `IXFK_Usuario_Miembro` (`facodmie` ASC)
;

ALTER TABLE `aviscel` 
 ADD INDEX `IXFK_Visita_celula_Celula` (`facodcel` ASC)
;

ALTER TABLE `aviscel` 
 ADD INDEX `IXFK_Visita_celula_Visita` (`facodvis` ASC)
;

/* Create Foreign Key Constraints */

ALTER TABLE `aalumno` 
 ADD CONSTRAINT `FK_Alumno_Miembro`
	FOREIGN KEY (`facodmie`) REFERENCES `amiebro` (`pacodmie`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `aalumno` 
 ADD CONSTRAINT `FK_alumno_miebro`
	FOREIGN KEY (`facodmie`) REFERENCES `amiebro` (`pacodmie`) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE `aapoeco` 
 ADD CONSTRAINT `FK_Aporte_Economico_Aportes`
	FOREIGN KEY (`pacodeco`) REFERENCES `aapotes` (`pacodapo`) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE `aapoobj` 
 ADD CONSTRAINT `FK_Aporte_Objeto_Aportes`
	FOREIGN KEY (`pacodobj`) REFERENCES `aapotes` (`pacodapo`) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE `aapotes` 
 ADD CONSTRAINT `FK_Aportes_Usuario`
	FOREIGN KEY (`facodusu`) REFERENCES `ausurio` (`pacodusu`) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE `acelula` 
 ADD CONSTRAINT `FK_bardir_celula`
	FOREIGN KEY (`facodbar`) REFERENCES `abardir` (`pacodbar`) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE `acelula` 
 ADD CONSTRAINT `FK_caldir_celula`
	FOREIGN KEY (`facodcal`) REFERENCES `acaldir` (`pacodcal`) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE `acelula` 
 ADD CONSTRAINT `FK_Celula_Barrio`
	FOREIGN KEY (`facodbar`) REFERENCES `abardir` (`pacodbar`) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE `acelula` 
 ADD CONSTRAINT `FK_Celula_Calle`
	FOREIGN KEY (`facodcal`) REFERENCES `acaldir` (`pacodcal`) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE `acreesp` 
 ADD CONSTRAINT `FK_CrecimientoEspiritual_Miembro`
	FOREIGN KEY (`pacodcre`) REFERENCES `amiebro` (`pacodmie`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `acreesp` 
 ADD CONSTRAINT `FK_cremie_miebro`
	FOREIGN KEY (`pacodcre`) REFERENCES `amiebro` (`pacodmie`) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE `acursom` 
 ADD CONSTRAINT `FK_Curso_Contenido`
	FOREIGN KEY (`facodcon`) REFERENCES `aconido` (`pacodcon`) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE `acursom` 
 ADD CONSTRAINT `FK_Curso_Maestro`
	FOREIGN KEY (`facodmae`) REFERENCES `amaetro` (`pacodmae`) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE `aiteinf` 
 ADD CONSTRAINT `FK_Iteminforme_Informe`
	FOREIGN KEY (`facodinf`) REFERENCES `ainfrme` (`pacodinf`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `aiteinf` 
 ADD CONSTRAINT `FK_Iteminforme_Miembro-celula`
	FOREIGN KEY (`facodmcl`) REFERENCES `amiecel` (`pacodmcl`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `aiteinf` 
 ADD CONSTRAINT `FK_Iteminforme_Visita_celula`
	FOREIGN KEY (`facodvcl`) REFERENCES `aviscel` (`pacodvcl`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `aiteinf` 
 ADD CONSTRAINT `FK_iteinf_infrme`
	FOREIGN KEY (`facodinf`) REFERENCES  `ainfrme` (`pacodinf`) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE `aiteinf` 
 ADD CONSTRAINT `FK_iteinf_miecel`
	FOREIGN KEY (`facodmcl`) REFERENCES `amiecel` (`pacodmcl`) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE `aiteinf` 
 ADD CONSTRAINT `FK_iteinf_viscel`
	FOREIGN KEY (`facodvcl`) REFERENCES `avidcel` (`pacodvcl`) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE `amaetro` 
 ADD CONSTRAINT `FK_Maestro_Miembro`
	FOREIGN KEY (`facodmie`) REFERENCES `amiebro` (`pacodmie`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `amaetro` 
 ADD CONSTRAINT `FK_maetro_miebro`
	FOREIGN KEY (`facodmie`) REFERENCES `amiebro`  (`pacodmie`) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE `amatula` 
 ADD CONSTRAINT `FK_Matriculacion_escuela_Alumno`
	FOREIGN KEY (`facodalu`) REFERENCES `aalumno` (`pacodalu`) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE `amatula` 
 ADD CONSTRAINT `FK_Matriculacion_escuela_Curso`
	FOREIGN KEY (`facodcur`) REFERENCES `acursom` (`pacodcur`) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE `amatula` 
 ADD CONSTRAINT `FK_Matriculacion_escuela_Usuario`
	FOREIGN KEY (`facodusu`) REFERENCES `ausurio` (`pacodusu`) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE `amiebro` 
 ADD CONSTRAINT `FK_Miembro_Ciudad`
	FOREIGN KEY (`facodciu`) REFERENCES `aciudad` (`pacodciu`) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE `amiebro` 
 ADD CONSTRAINT `FK_Miembro_Profesion`
	FOREIGN KEY (`facodpro`) REFERENCES `aproion` (`pacodpro`) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE `amiecel` 
 ADD CONSTRAINT `FK_Miembro-celula_Celula`
	FOREIGN KEY (`facodcel`) REFERENCES `acelula` (`pacodcel`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `amiecel` 
 ADD CONSTRAINT `FK_Miembro-celula_Miembro`
	FOREIGN KEY (`facodmie`) REFERENCES `amiebro` (`pacodmie`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `amiecel` 
 ADD CONSTRAINT `FK_miecel_celula`
	FOREIGN KEY (`facodcel`) REFERENCES `acelula` (`pacodcel`) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE `amiecel` 
 ADD CONSTRAINT `FK_miecel_miebro`
	FOREIGN KEY (`facodmie`) REFERENCES `amiebro` (`pacodmie`) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE `ausurio` 
 ADD CONSTRAINT `FK_Usuario_Miembro`
	FOREIGN KEY (`facodmie`) REFERENCES `amiebro` (`pacodmie`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `ausurio` 
 ADD CONSTRAINT `FK_usurio_miebro`
	FOREIGN KEY (`facodmie`) REFERENCES `amiebro` (`pacodmie`) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE `aviscel` 
 ADD CONSTRAINT `FK_Visita_celula_Celula`
	FOREIGN KEY (`facodcel`) REFERENCES `acelula` (`pacodcel`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `aviscel` 
 ADD CONSTRAINT `FK_Visita_celula_Visita`
	FOREIGN KEY (`facodvis`) REFERENCES `avisita` (`pacodvis`) ON DELETE Restrict ON UPDATE Restrict
;

ALTER TABLE `aviscel` 
 ADD CONSTRAINT `FK_viscel_celula`
	FOREIGN KEY (`facodcel`) REFERENCES `acelula` (`pacodcel`) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE `aviscel` 
 ADD CONSTRAINT `FK_viscel_visita`
	FOREIGN KEY (`facodvis`) REFERENCES `avisita` (`pacodvis`) ON DELETE No Action ON UPDATE No Action
;

SET FOREIGN_KEY_CHECKS=1 
;
