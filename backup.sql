CREATE DATABASE bdgopor;

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `cnombre` varchar(255) DEFAULT NULL,
  `cdesc` varchar(255) DEFAULT NULL,
  `RUC` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8
GO

CREATE TABLE `competidor` (
  `idcompetidor` int(11) NOT NULL AUTO_INCREMENT,
  `cnombre` varchar(255) DEFAULT NULL,
  `cdesc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idcompetidor`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8
GO

CREATE TABLE `cotizacion` (
  `idcot` int(11) NOT NULL AUTO_INCREMENT,
  `vigencia` date DEFAULT NULL,
  `cotestado` varchar(255) DEFAULT NULL,
  `cotestdesc` varchar(255) DEFAULT NULL,
  `cotmonto` int(11) DEFAULT NULL,
  `idoport` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcot`),
  KEY `R_3` (`idoport`),
  CONSTRAINT `R_3` FOREIGN KEY (`idoport`) REFERENCES `oportunidad` (`idoport`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8
GO

CREATE TABLE `estado` (
  `idoestado` int(11) NOT NULL AUTO_INCREMENT,
  `oestado` varchar(255) DEFAULT NULL,
  `edesc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idoestado`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8
GO

CREATE TABLE `oportunidad` (
  `idoport` int(11) NOT NULL AUTO_INCREMENT,
  `desoport` varchar(255) NOT NULL,
  `ofoport` date DEFAULT NULL,
  `ofvigencia` date NOT NULL,
  `idoestado` int(11) NOT NULL,
  `idpersonal` int(11) NOT NULL,
  `idotipo` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idcompetidor` int(11) DEFAULT NULL,
  `idsolicitante` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idoport`),
  KEY `R_6` (`idoestado`),
  KEY `R_7` (`idpersonal`),
  KEY `R_8` (`idotipo`),
  KEY `R_9` (`idcliente`),
  KEY `R_10` (`idcompetidor`),
  KEY `R_13` (`idsolicitante`),
  KEY `R_18` (`idusuario`),
  CONSTRAINT `R_10` FOREIGN KEY (`idcompetidor`) REFERENCES `competidor` (`idcompetidor`),
  CONSTRAINT `R_13` FOREIGN KEY (`idsolicitante`) REFERENCES `solicitante` (`idsolicitante`),
  CONSTRAINT `R_18` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`),
  CONSTRAINT `R_6` FOREIGN KEY (`idoestado`) REFERENCES `estado` (`idoestado`),
  CONSTRAINT `R_7` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idpersonal`),
  CONSTRAINT `R_8` FOREIGN KEY (`idotipo`) REFERENCES `tipo` (`idotipo`),
  CONSTRAINT `R_9` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8
GO

CREATE TABLE `ordencompra` (
  `idorden` int(11) NOT NULL AUTO_INCREMENT,
  `oestado` varchar(255) DEFAULT NULL,
  `idcot` int(11) DEFAULT NULL,
  PRIMARY KEY (`idorden`),
  KEY `R_15` (`idcot`),
  CONSTRAINT `R_15` FOREIGN KEY (`idcot`) REFERENCES `cotizacion` (`idcot`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8
GO

CREATE TABLE `tipo` (
  `idotipo` int(11) NOT NULL AUTO_INCREMENT,
  `tdesc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idotipo`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8
GO

CREATE TABLE `personal` (
  `idpersonal` int(11) NOT NULL AUTO_INCREMENT,
  `papaterno` varchar(255) DEFAULT NULL,
  `pamaterno` varchar(255) DEFAULT NULL,
  `pnombre` varchar(255) DEFAULT NULL,
  `pcargo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idpersonal`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8
GO

CREATE TABLE `solicitante` (
  `idsolicitante` int(11) NOT NULL AUTO_INCREMENT,
  `sapaterno` varchar(255) DEFAULT NULL,
  `samaterno` varchar(255) DEFAULT NULL,
  `snombre` varchar(255) DEFAULT NULL,
  `scargo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idsolicitante`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8
GO

CREATE TABLE `tarea` (
  `idtarea` int(11) NOT NULL AUTO_INCREMENT,
  `tdesc` varchar(255) DEFAULT NULL,
  `idoport` int(11) NOT NULL,
  PRIMARY KEY (`idtarea`),
  KEY `R_19` (`idoport`),
  CONSTRAINT `R_19` FOREIGN KEY (`idoport`) REFERENCES `oportunidad` (`idoport`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8
GO

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `apaterno` varchar(255) NOT NULL,
  `amaterno` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `tipo` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `fregistro` datetime NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8
GO