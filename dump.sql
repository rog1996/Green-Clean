-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for gc
CREATE DATABASE IF NOT EXISTS `gc` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `gc`;

-- Dumping structure for table gc.comentario
CREATE TABLE IF NOT EXISTS `comentario` (
  `idComentario` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `Post_idPost` int(11) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idComentario`),
  KEY `fk_Comentario_Post1_idx` (`Post_idPost`),
  KEY `fk_Comentario_Usuario1_idx` (`Usuario_idUsuario`),
  CONSTRAINT `fk_Comentario_Post1` FOREIGN KEY (`Post_idPost`) REFERENCES `post` (`idPost`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comentario_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gc.comentario: ~0 rows (approximately)
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;

-- Dumping structure for table gc.post
CREATE TABLE IF NOT EXISTS `post` (
  `idPost` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Tipo_idTipo` int(11) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `direccion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idPost`),
  KEY `fk_Post_Tipo1_idx` (`Tipo_idTipo`),
  KEY `fk_Post_Usuario1_idx` (`Usuario_idUsuario`),
  CONSTRAINT `fk_Post_Tipo1` FOREIGN KEY (`Tipo_idTipo`) REFERENCES `tipo` (`idTipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Post_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gc.post: ~3 rows (approximately)
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` (`idPost`, `titulo`, `descripcion`, `Tipo_idTipo`, `Usuario_idUsuario`, `fechaInicio`, `fechaFin`, `direccion`) VALUES
	(1, 'Santa Maria del Pinar', 'xd', 1, 1, '2019-06-15', '2019-06-16', 'mi ksa'),
	(2, 'Adios', 'xdddddddddddddddddddddd', 2, 3, '2019-06-04', '2019-06-05', 'mi kasa'),
	(3, 'sadasd', 'asdasd', 1, 2, '2019-06-16', '2019-06-16', 'sadasdas');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;

-- Dumping structure for table gc.tipo
CREATE TABLE IF NOT EXISTS `tipo` (
  `idTipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gc.tipo: ~3 rows (approximately)
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` (`idTipo`, `tipo`) VALUES
	(1, 'Campaña de reciclaje'),
	(2, 'Recojo de basura'),
	(3, 'No c q + poner');
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;

-- Dumping structure for table gc.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `fechaNacimiento` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gc.usuario: ~3 rows (approximately)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellido`, `fechaNacimiento`, `direccion`, `email`, `password`) VALUES
	(1, 'Rodrigo', 'Ortiz', '1997-08-14', 'xd', 'rodri96@gmail.com', '123'),
	(2, 'Elias', 'Guere', '2019-06-20', 'mi ksa', 'eliasguere1025@gmail.com', '123'),
	(3, 'Flavio', 'Guitierrez', '2019-06-13', 'sadasda', 'monogay@gmail.com', '123');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
