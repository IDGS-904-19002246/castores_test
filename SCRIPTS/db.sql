-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para db_castores
CREATE DATABASE IF NOT EXISTS `db_castores` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_castores`;

-- Volcando estructura para tabla db_castores.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `idProducto` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  `precio` double(16,2) DEFAULT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_castores.productos: ~7 rows (aproximadamente)
INSERT INTO `productos` (`idProducto`, `nombre`, `precio`) VALUES
	(1, 'LAPTOP', 3000.00),
	(2, 'PC', 4000.00),
	(3, 'MOUSE', 100.00),
	(4, 'TECLADO', 150.00),
	(5, 'MONITOR', 2000.00),
	(6, 'MICROFONO', 350.00),
	(7, 'AUDIFONOS', 450.00);

-- Volcando estructura para tabla db_castores.tbl_historial
CREATE TABLE IF NOT EXISTS `tbl_historial` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fk_producto` int DEFAULT NULL,
  `fk_usuario` int DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `tipo_movimiento` int DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `cantidad_nueva` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_historial_tbl_productos` (`fk_producto`),
  KEY `FK_tbl_historial_tbl_usuarios` (`fk_usuario`),
  CONSTRAINT `FK_tbl_historial_tbl_productos` FOREIGN KEY (`fk_producto`) REFERENCES `tbl_productos` (`id`),
  CONSTRAINT `FK_tbl_historial_tbl_usuarios` FOREIGN KEY (`fk_usuario`) REFERENCES `tbl_usuarios` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_castores.tbl_historial: ~1 rows (aproximadamente)
INSERT INTO `tbl_historial` (`id`, `fk_producto`, `fk_usuario`, `fecha`, `tipo_movimiento`, `cantidad`, `cantidad_nueva`) VALUES
	(8, 1, 1, '2024-08-19 04:08:00', 1, 39, 43);

-- Volcando estructura para tabla db_castores.tbl_productos
CREATE TABLE IF NOT EXISTS `tbl_productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `estado` int DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `precio` int DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_castores.tbl_productos: ~4 rows (aproximadamente)
INSERT INTO `tbl_productos` (`id`, `estado`, `nombre`, `precio`, `cantidad`) VALUES
	(1, 1, 'producto 1', 12, 24),
	(2, 1, 'producto 2', 11, 24),
	(3, 0, 'producto 3', 13, 35),
	(4, 1, 'producto 4', 13, 35);

-- Volcando estructura para tabla db_castores.tbl_usuarios
CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `idUsuario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `contrasena` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `idRol` int DEFAULT NULL,
  `estatus` int DEFAULT NULL,
  PRIMARY KEY (`idUsuario`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='0 = inactivo\r\n1 = adminstrador\r\n2 = almacenista';

-- Volcando datos para la tabla db_castores.tbl_usuarios: ~2 rows (aproximadamente)
INSERT INTO `tbl_usuarios` (`idUsuario`, `nombre`, `correo`, `contrasena`, `idRol`, `estatus`) VALUES
	(1, 'juan', 'juan@gmail.com', 'juan', 1, 1),
	(3, 'jose', 'jose@gmail.com', 'jose', 2, 1);

-- Volcando estructura para tabla db_castores.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `idVenta` int NOT NULL AUTO_INCREMENT,
  `idProducto` int DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  PRIMARY KEY (`idVenta`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_castores.ventas: ~8 rows (aproximadamente)
INSERT INTO `ventas` (`idVenta`, `idProducto`, `cantidad`) VALUES
	(1, 5, 8),
	(2, 1, 15),
	(3, 6, 13),
	(4, 6, 4),
	(5, 2, 3),
	(6, 5, 1),
	(7, 4, 5),
	(8, 2, 5),
	(9, 6, 2),
	(10, 1, 8);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
