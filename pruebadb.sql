use control_stock;
CREATE TABLE IF NOT EXISTS `appsalon_MVC`.`citasServicios` (
  `id` INT(11) NOT NULL,
  `citaid` INT(11) NULL,
  `serviciosid` INT(11) NULL,
  PRIMARY KEY (`id`),
  INDEX `citas1_idx` (`citaid` ASC) INVISIBLE,
  INDEX `servicios1_idx` (`serviciosid` ASC) VISIBLE,
  CONSTRAINT `citas1`
    FOREIGN KEY (`citaid`)
    REFERENCES `appsalon_MVC`.`citas` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL,
  CONSTRAINT `servicios1`
    FOREIGN KEY (`serviciosid`)
    REFERENCES `appsalon_MVC`.`servicios` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;

use uptask_mvc;
CREATE TABLE IF NOT EXISTS `uptask_mvc`.`proyectos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `proyecto` VARCHAR(60) NULL,
  `url` VARCHAR(32) NULL,
  `propietarioid` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `propietario_idx` (`propietarioid` ASC) VISIBLE,
  CONSTRAINT `propietario`
    FOREIGN KEY (`propietarioid`)
    REFERENCES `uptask_mvc`.`usuarios` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `tareas` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(60) NULL,
  `estado` TINYINT(1) NULL,
  `proyectoid` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `Proyectosid_idx` (`proyectoid` ASC) VISIBLE,
  CONSTRAINT `Proyectosid`
    FOREIGN KEY (`proyectoid`)
    REFERENCES `proyectos` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL)
ENGINE = InnoDB;