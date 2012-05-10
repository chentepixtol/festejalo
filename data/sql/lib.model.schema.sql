
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- sf_guard_user_profile
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_user_profile`;


CREATE TABLE `sf_guard_user_profile`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER  NOT NULL,
	`nombre` VARCHAR(30)  NOT NULL,
	`apellido_paterno` VARCHAR(30),
	`apellido_materno` VARCHAR(30),
	`email` VARCHAR(100)  NOT NULL,
	`telefono` INTEGER,
	PRIMARY KEY (`id`),
	UNIQUE KEY `sf_guard_user_profile_U_1` (`email`),
	INDEX `I_referenced_empresa_FK_1_1` (`user_id`),
	INDEX `I_referenced_empresas_sin_ubicacion_FK_1_2` (`user_id`),
	INDEX `sf_guard_user_profile_FI_1` (`user_id`),
	CONSTRAINT `sf_guard_user_profile_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- empresa
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `empresa`;


CREATE TABLE `empresa`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER  NOT NULL,
	`nombre` VARCHAR(150)  NOT NULL,
	`descripcion` VARCHAR(255),
	`afiliacion_fonacot` VARCHAR(40),
	`slot` VARCHAR(150),
	PRIMARY KEY (`id`),
	INDEX `empresa_FI_1` (`user_id`),
	CONSTRAINT `empresa_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user_profile` (`user_id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- estado
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `estado`;


CREATE TABLE `estado`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(150)  NOT NULL,
	`slot` VARCHAR(150),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- general
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `general`;


CREATE TABLE `general`
(
	`empresa_id` INTEGER  NOT NULL,
	`telefono` INTEGER,
	`fax` INTEGER,
	`sitio_web` VARCHAR(150),
	`email` VARCHAR(150),
	PRIMARY KEY (`empresa_id`),
	CONSTRAINT `general_FK_1`
		FOREIGN KEY (`empresa_id`)
		REFERENCES `empresa` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ubicacion
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ubicacion`;


CREATE TABLE `ubicacion`
(
	`empresa_id` INTEGER  NOT NULL,
	`calle` VARCHAR(200),
	`numero` INTEGER,
	`colonia` VARCHAR(200)  NOT NULL,
	`codigo_postal` INTEGER  NOT NULL,
	`delegacion` VARCHAR(150)  NOT NULL,
	`estado_id` INTEGER,
	`latitud` DOUBLE,
	`longitud` DOUBLE,
	`metro` VARCHAR(100),
	PRIMARY KEY (`empresa_id`),
	CONSTRAINT `ubicacion_FK_1`
		FOREIGN KEY (`empresa_id`)
		REFERENCES `empresa` (`id`)
		ON DELETE CASCADE,
	INDEX `ubicacion_FI_2` (`estado_id`),
	CONSTRAINT `ubicacion_FK_2`
		FOREIGN KEY (`estado_id`)
		REFERENCES `estado` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- categoria
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `categoria`;


CREATE TABLE `categoria`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(150)  NOT NULL,
	`slot` VARCHAR(150),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- segmento
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `segmento`;


CREATE TABLE `segmento`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(150)  NOT NULL,
	`slot` VARCHAR(150),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- producto
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `producto`;


CREATE TABLE `producto`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`empresa_id` INTEGER  NOT NULL,
	`categoria_id` INTEGER  NOT NULL,
	`nombre` VARCHAR(150)  NOT NULL,
	`descripcion` TEXT,
	`foto` VARCHAR(255),
	`miniatura` VARCHAR(255),
	`slot` VARCHAR(150),
	PRIMARY KEY (`id`),
	INDEX `producto_FI_1` (`empresa_id`),
	CONSTRAINT `producto_FK_1`
		FOREIGN KEY (`empresa_id`)
		REFERENCES `empresa` (`id`)
		ON DELETE CASCADE,
	INDEX `producto_FI_2` (`categoria_id`),
	CONSTRAINT `producto_FK_2`
		FOREIGN KEY (`categoria_id`)
		REFERENCES `categoria` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tramite
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tramite`;


CREATE TABLE `tramite`
(
	`empresa_id` INTEGER  NOT NULL,
	`recepcion_del_credito` VARCHAR(255),
	`recepcion_del_tramite` VARCHAR(255),
	`persona_encargada` VARCHAR(100),
	`horario` VARCHAR(80),
	`procedimiento` TEXT,
	`documentacion` VARCHAR(255),
	PRIMARY KEY (`empresa_id`),
	CONSTRAINT `tramite_FK_1`
		FOREIGN KEY (`empresa_id`)
		REFERENCES `empresa` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- micrositio
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `micrositio`;


CREATE TABLE `micrositio`
(
	`empresa_id` INTEGER  NOT NULL,
	`quienes_somos` VARCHAR(255),
	`mision` TEXT,
	`vision` TEXT,
	`logo` VARCHAR(255),
	`mini_logo` VARCHAR(255),
	PRIMARY KEY (`empresa_id`),
	CONSTRAINT `micrositio_FK_1`
		FOREIGN KEY (`empresa_id`)
		REFERENCES `empresa` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- empresa_categoria
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `empresa_categoria`;


CREATE TABLE `empresa_categoria`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`empresa_id` INTEGER  NOT NULL,
	`categoria_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `empresa_categoria_U_1` (`empresa_id`, `categoria_id`),
	CONSTRAINT `empresa_categoria_FK_1`
		FOREIGN KEY (`empresa_id`)
		REFERENCES `empresa` (`id`)
		ON DELETE CASCADE,
	INDEX `empresa_categoria_FI_2` (`categoria_id`),
	CONSTRAINT `empresa_categoria_FK_2`
		FOREIGN KEY (`categoria_id`)
		REFERENCES `categoria` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- empresa_segmento
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `empresa_segmento`;


CREATE TABLE `empresa_segmento`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`empresa_id` INTEGER  NOT NULL,
	`segmento_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `empresa_segmento_U_1` (`empresa_id`, `segmento_id`),
	CONSTRAINT `empresa_segmento_FK_1`
		FOREIGN KEY (`empresa_id`)
		REFERENCES `empresa` (`id`)
		ON DELETE CASCADE,
	INDEX `empresa_segmento_FI_2` (`segmento_id`),
	CONSTRAINT `empresa_segmento_FK_2`
		FOREIGN KEY (`segmento_id`)
		REFERENCES `segmento` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- banner
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `banner`;


CREATE TABLE `banner`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`empresa_id` INTEGER  NOT NULL,
	`titulo` VARCHAR(150)  NOT NULL,
	`texto` TEXT,
	`slot` VARCHAR(150),
	`imagen` VARCHAR(255),
	`tipo` INTEGER(2) default 1,
	`segmento_id` INTEGER,
	`categoria_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `banner_FI_1` (`empresa_id`),
	CONSTRAINT `banner_FK_1`
		FOREIGN KEY (`empresa_id`)
		REFERENCES `empresa` (`id`)
		ON DELETE CASCADE,
	INDEX `banner_FI_2` (`segmento_id`),
	CONSTRAINT `banner_FK_2`
		FOREIGN KEY (`segmento_id`)
		REFERENCES `segmento` (`id`)
		ON DELETE CASCADE,
	INDEX `banner_FI_3` (`categoria_id`),
	CONSTRAINT `banner_FK_3`
		FOREIGN KEY (`categoria_id`)
		REFERENCES `categoria` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- cupon
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `cupon`;


CREATE TABLE `cupon`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`empresa_id` INTEGER  NOT NULL,
	`titulo` VARCHAR(150),
	`descripcion` VARCHAR(255),
	`numero` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `cupon_FI_1` (`empresa_id`),
	CONSTRAINT `cupon_FK_1`
		FOREIGN KEY (`empresa_id`)
		REFERENCES `empresa` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- noticia
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `noticia`;


CREATE TABLE `noticia`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`empresa_id` INTEGER  NOT NULL,
	`titulo` VARCHAR(150)  NOT NULL,
	`texto` TEXT,
	`fecha_publicacion` DATE,
	`fecha_cancelacion` DATE,
	`slot` VARCHAR(150),
	PRIMARY KEY (`id`),
	INDEX `noticia_FI_1` (`empresa_id`),
	CONSTRAINT `noticia_FK_1`
		FOREIGN KEY (`empresa_id`)
		REFERENCES `empresa` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- visitante
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `visitante`;


CREATE TABLE `visitante`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(30)  NOT NULL,
	`password` VARCHAR(36)  NOT NULL,
	`email` VARCHAR(150)  NOT NULL,
	`nombre` VARCHAR(50),
	`apellidos` VARCHAR(100),
	`tarjeta_fonacot` VARCHAR(100),
	`promocion_list` TINYINT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `visitante_U_1` (`username`),
	UNIQUE KEY `visitante_U_2` (`email`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- visitante_cupon
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `visitante_cupon`;


CREATE TABLE `visitante_cupon`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`visitante_id` INTEGER  NOT NULL,
	`cupon_id` INTEGER  NOT NULL,
	`codigo` VARCHAR(40),
	PRIMARY KEY (`id`),
	UNIQUE KEY `visitante_cupon_U_1` (`visitante_id`, `cupon_id`),
	CONSTRAINT `visitante_cupon_FK_1`
		FOREIGN KEY (`visitante_id`)
		REFERENCES `visitante` (`id`)
		ON DELETE CASCADE,
	INDEX `visitante_cupon_FI_2` (`cupon_id`),
	CONSTRAINT `visitante_cupon_FK_2`
		FOREIGN KEY (`cupon_id`)
		REFERENCES `cupon` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- autocompleter
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `autocompleter`;


CREATE TABLE `autocompleter`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`suggest` VARCHAR(100)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
