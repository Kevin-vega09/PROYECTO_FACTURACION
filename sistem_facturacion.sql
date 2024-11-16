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


-- Volcando estructura de base de datos para sistem_facturacion
CREATE DATABASE IF NOT EXISTS `sistem_facturacion` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sistem_facturacion`;

-- Volcando estructura para tabla sistem_facturacion.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` text,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla sistem_facturacion.categorias: ~3 rows (aproximadamente)
INSERT INTO `categorias` (`id`, `nombre`, `fecha_creacion`) VALUES
	(1, 'Brochas', NULL),
	(2, 'Pintura', NULL),
	(3, 'Rejas', NULL);

-- Volcando estructura para tabla sistem_facturacion.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` text,
  `usuario` text,
  `password` text,
  `perfil` text,
  `foto` text,
  `estado` int DEFAULT NULL,
  `ultimo_login` datetime DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla sistem_facturacion.usuarios: ~4 rows (aproximadamente)
INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
	(1, 'Usuario administrador', 'Admin', '$2y$10$pOqqNlprr7waXRf4v4rNn.uUgsSLFryWpcjhoTfvF2.rPTEsye2Vm', 'Administrador', 'vistas/img/usuarios/Admin/898.png', 1, '2024-11-14 23:07:30', '2024-11-10 03:44:10'),
	(2, 'Kevin Vega', 'KVega', '$2y$10$OqDxdqG.rPs671D7hbk2huk/uZApEGT5bWnmmARuXjpYuXtVWccvS', 'Especial', 'vistas/img/usuarios/KVega/351.png', 1, '2024-11-13 22:54:39', NULL),
	(10, 'Yamile', 'yamile', '$2y$10$pAVoFPGml6cIqS3RswGsuuuuEm97HU8XL./LcXI63nq9yEerRK5O2', 'Vendedor', 'vistas/img/usuarios/yamile/497.jpg', 0, '2024-11-14 22:56:07', NULL),
	(11, 'Camilo', 'camilo', '$2y$10$1.Zalvzfbt8Yz291uMBHPuuEDqTvmAT.8sdeosuzqJZlDGtObg.Bm', 'Especial', 'vistas/img/usuarios/camilo/754.jpg', 1, NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
