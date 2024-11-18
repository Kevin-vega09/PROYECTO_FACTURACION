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
  `categoria` text,
  `fecha` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla sistem_facturacion.categorias: ~5 rows (aproximadamente)
INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
	(1, 'Equipos electromecánicos', '2024-11-17 22:28:11'),
	(2, 'Taladros', '2024-11-17 22:28:11'),
	(3, 'Andamios', '2024-11-17 22:28:11'),
	(4, 'Generadores de energía', '2024-11-17 22:28:11'),
	(5, 'Equipos para construcción', '2024-11-17 22:28:11'),
	(6, 'Pinturas', '2024-11-18 00:40:10');

-- Volcando estructura para tabla sistem_facturacion.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` text,
  `documento` int DEFAULT NULL,
  `email` text,
  `telefono` text,
  `direccion` text,
  `fecha_nacimiento` date DEFAULT NULL,
  `compras` int DEFAULT NULL,
  `ultima_compra` datetime DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla sistem_facturacion.clientes: ~2 rows (aproximadamente)
INSERT INTO `clientes` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `compras`, `ultima_compra`, `fecha`) VALUES
	(1, 'Kevin', 1000326964, 'kevin@gmail.com', '(321) 268-6159', 'Cra 110B BIS # 64-18', '2002-09-09', 14, '2024-11-18 18:01:03', '2024-11-16 23:04:13'),
	(2, 'Johan', 1000326965, 'johan@gmail.com', '(301) 234-5346', 'calle 50 #45-24', '2002-07-30', 4, '2024-11-18 17:53:09', '2024-11-16 23:04:14');

-- Volcando estructura para tabla sistem_facturacion.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int DEFAULT NULL,
  `id_categoria` int DEFAULT NULL,
  `codigo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci,
  `descripcion` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci,
  `imagen` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci,
  `stock` int DEFAULT NULL,
  `precio_compra` float DEFAULT NULL,
  `precio_venta` float DEFAULT NULL,
  `ventas` int DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla sistem_facturacion.productos: ~60 rows (aproximadamente)
INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `fecha`) VALUES
	(1, 1, '101', 'Aspiradora Industrial ', 'vistas/img/productos/101/105.png', 14, 1000, 1200, 1, '2024-11-18 22:53:09'),
	(2, 1, '102', 'Plato Flotante para Allanadora', 'vistas/img/productos/102/940.jpg', 49, 4500, 6300, 5, '2024-11-18 22:53:09'),
	(3, 1, '103', 'Compresor de Aire para pintura', 'vistas/img/productos/103/763.jpg', 16, 3000, 4200, 5, '2024-11-18 03:44:19'),
	(4, 1, '104', 'Cortadora de Adobe sin Disco ', 'vistas/img/productos/104/957.jpg', 17, 4000, 5600, 3, '2024-11-18 03:41:31'),
	(5, 1, '105', 'Cortadora de Piso sin Disco ', 'vistas/img/productos/105/630.jpg', 20, 1540, 2156, 0, '2024-11-17 21:48:56'),
	(6, 1, '106', 'Disco Punta Diamante ', 'vistas/img/productos/106/635.jpg', 20, 1100, 1540, 0, '2024-11-17 21:48:56'),
	(7, 1, '107', 'Extractor de Aire ', 'vistas/img/productos/107/848.jpg', 20, 1540, 2156, 0, '2024-11-17 21:48:56'),
	(8, 1, '108', 'Guadañadora ', 'vistas/img/productos/108/163.jpg', 20, 1540, 2156, 0, '2024-11-17 21:48:56'),
	(9, 1, '109', 'Hidrolavadora Eléctrica ', 'vistas/img/productos/109/769.jpg', 20, 2600, 3640, 0, '2024-11-17 21:48:56'),
	(10, 1, '110', 'Hidrolavadora Gasolina', 'vistas/img/productos/110/582.jpg', 20, 2210, 3094, 0, '2024-11-17 21:48:56'),
	(11, 1, '111', 'Motobomba a Gasolina', 'vistas/img/productos/default/anonymous.png', 20, 2860, 4004, 0, '2024-11-17 21:48:56'),
	(12, 1, '112', 'Motobomba El?ctrica', 'vistas/img/productos/default/anonymous.png', 20, 2400, 3360, 0, '2024-11-17 21:48:56'),
	(13, 1, '113', 'Sierra Circular ', 'vistas/img/productos/default/anonymous.png', 20, 1100, 1540, 0, '2024-11-17 21:48:56'),
	(14, 1, '114', 'Disco de tugsteno para Sierra circular', 'vistas/img/productos/default/anonymous.png', 20, 4500, 6300, 0, '2024-11-17 21:48:56'),
	(15, 1, '115', 'Soldador Electrico ', 'vistas/img/productos/default/anonymous.png', 20, 1980, 2772, 0, '2024-11-17 21:48:56'),
	(16, 1, '116', 'Careta para Soldador', 'vistas/img/productos/default/anonymous.png', 20, 4200, 5880, 0, '2024-11-17 21:48:56'),
	(17, 1, '117', 'Torre de iluminacion ', 'vistas/img/productos/default/anonymous.png', 20, 1800, 2520, 0, '2024-11-17 21:48:56'),
	(18, 2, '201', 'Martillo Demoledor de Piso 110V', 'vistas/img/productos/default/anonymous.png', 20, 5600, 7840, 0, '2024-11-17 21:48:56'),
	(19, 2, '202', 'Muela o cincel martillo demoledor piso', 'vistas/img/productos/default/anonymous.png', 20, 9600, 13440, 0, '2024-11-17 21:48:56'),
	(20, 2, '203', 'Taladro Demoledor de muro 110V', 'vistas/img/productos/default/anonymous.png', 20, 3850, 5390, 0, '2024-11-17 21:48:56'),
	(21, 2, '204', 'Muela o cincel martillo demoledor muro', 'vistas/img/productos/default/anonymous.png', 20, 9600, 13440, 0, '2024-11-17 21:48:56'),
	(22, 2, '205', 'Taladro Percutor de 1/2 Madera y Metal', 'vistas/img/productos/default/anonymous.png', 20, 8000, 11200, 0, '2024-11-17 21:48:56'),
	(23, 2, '206', 'Taladro Percutor SDS Plus 110V', 'vistas/img/productos/default/anonymous.png', 20, 3900, 5460, 0, '2024-11-17 21:48:56'),
	(24, 2, '207', 'Taladro Percutor SDS Max 110V (Mineria)', 'vistas/img/productos/default/anonymous.png', 20, 4600, 6440, 0, '2024-11-17 21:48:56'),
	(25, 3, '301', 'Andamio colgante', 'vistas/img/productos/default/anonymous.png', 20, 1440, 2016, 0, '2024-11-17 21:48:56'),
	(26, 3, '302', 'Distanciador andamio colgante', 'vistas/img/productos/default/anonymous.png', 20, 1600, 2240, 0, '2024-11-17 21:48:56'),
	(27, 3, '303', 'Marco andamio modular ', 'vistas/img/productos/default/anonymous.png', 20, 900, 1260, 0, '2024-11-17 21:48:56'),
	(28, 3, '304', 'Marco andamio tijera', 'vistas/img/productos/default/anonymous.png', 20, 100, 140, 0, '2024-11-17 21:48:56'),
	(29, 3, '305', 'Tijera para andamio', 'vistas/img/productos/default/anonymous.png', 20, 162, 226, 0, '2024-11-17 21:48:56'),
	(30, 3, '306', 'Escalera interna para andamio', 'vistas/img/productos/default/anonymous.png', 20, 270, 378, 0, '2024-11-17 21:48:56'),
	(31, 3, '307', 'Pasamanos de seguridad', 'vistas/img/productos/default/anonymous.png', 20, 75, 105, 0, '2024-11-17 21:48:56'),
	(32, 3, '308', 'Rueda giratoria para andamio', 'vistas/img/productos/default/anonymous.png', 20, 168, 235, 0, '2024-11-17 21:48:56'),
	(33, 3, '309', 'Arnes de seguridad', 'vistas/img/productos/default/anonymous.png', 20, 1750, 2450, 0, '2024-11-17 21:48:56'),
	(34, 3, '310', 'Eslinga para arnes', 'vistas/img/productos/default/anonymous.png', 20, 175, 245, 0, '2024-11-17 21:48:56'),
	(35, 3, '311', 'Plataforma Met?lica', 'vistas/img/productos/default/anonymous.png', 20, 420, 588, 0, '2024-11-17 21:48:56'),
	(36, 4, '401', 'Planta Electrica Diesel 6 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3500, 4900, 0, '2024-11-17 21:48:56'),
	(37, 4, '402', 'Planta Electrica Diesel 10 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3550, 4970, 0, '2024-11-17 21:48:56'),
	(38, 4, '403', 'Planta Electrica Diesel 20 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3600, 5040, 0, '2024-11-17 21:48:56'),
	(39, 4, '404', 'Planta Electrica Diesel 30 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3650, 5110, 0, '2024-11-17 21:48:56'),
	(40, 4, '405', 'Planta Electrica Diesel 60 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3700, 5180, 0, '2024-11-17 21:48:56'),
	(41, 4, '406', 'Planta Electrica Diesel 75 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3750, 5250, 0, '2024-11-17 21:48:56'),
	(42, 4, '407', 'Planta Electrica Diesel 100 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3800, 5320, 0, '2024-11-17 21:48:56'),
	(43, 4, '408', 'Planta Electrica Diesel 120 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3850, 5390, 0, '2024-11-17 21:48:56'),
	(44, 5, '501', 'Escalera de Tijera Aluminio ', 'vistas/img/productos/default/anonymous.png', 20, 350, 490, 0, '2024-11-17 21:48:56'),
	(45, 5, '502', 'Extension Electrica ', 'vistas/img/productos/default/anonymous.png', 20, 370, 518, 0, '2024-11-17 21:48:56'),
	(46, 5, '503', 'Gato tensor', 'vistas/img/productos/default/anonymous.png', 20, 380, 532, 0, '2024-11-17 21:48:56'),
	(47, 5, '504', 'Lamina Cubre Brecha ', 'vistas/img/productos/default/anonymous.png', 20, 380, 532, 0, '2024-11-17 21:48:56'),
	(48, 5, '505', 'Llave de Tubo', 'vistas/img/productos/default/anonymous.png', 20, 480, 672, 0, '2024-11-17 21:48:56'),
	(49, 5, '506', 'Manila por Metro', 'vistas/img/productos/default/anonymous.png', 20, 600, 840, 0, '2024-11-17 21:48:56'),
	(50, 5, '507', 'Polea 2 canales', 'vistas/img/productos/default/anonymous.png', 20, 900, 1260, 0, '2024-11-17 21:48:56'),
	(51, 5, '508', 'Tensor', 'vistas/img/productos/default/anonymous.png', 20, 100, 140, 0, '2024-11-17 21:48:56'),
	(52, 5, '509', 'Bascula ', 'vistas/img/productos/default/anonymous.png', 40, 130, 182, 0, '2024-11-18 01:13:06'),
	(53, 5, '510', 'Bomba Hidrostatica', 'vistas/img/productos/default/anonymous.png', 20, 770, 1078, 0, '2024-11-17 21:48:56'),
	(54, 5, '511', 'Chapeta', 'vistas/img/productos/default/anonymous.png', 20, 660, 924, 0, '2024-11-17 21:48:56'),
	(55, 5, '512', 'Cilindro muestra de concreto', 'vistas/img/productos/default/anonymous.png', 20, 400, 560, 0, '2024-11-17 21:48:56'),
	(56, 5, '513', 'Cizalla de Palanca', 'vistas/img/productos/default/anonymous.png', 20, 450, 630, 0, '2024-11-17 21:48:56'),
	(57, 5, '514', 'Cizalla de Tijera', 'vistas/img/productos/default/anonymous.png', 20, 580, 812, 0, '2024-11-17 21:48:56'),
	(58, 5, '515', 'Coche llanta neumatica', 'vistas/img/productos/default/anonymous.png', 20, 420, 588, 0, '2024-11-17 21:48:56'),
	(59, 5, '516', 'Cono slump', 'vistas/img/productos/default/anonymous.png', 18, 140, 196, 2, '2024-11-18 23:01:03'),
	(60, 5, '517', 'Cortadora de Baldosin', 'vistas/img/productos/default/anonymous.png', 18, 930, 1302, 2, '2024-11-18 23:01:03'),
	(NULL, 6, '601', 'Pintura profesional', 'vistas/img/productos/601/755.png', 30, 125000, 175000, NULL, '2024-11-18 01:09:08'),
	(NULL, 6, '602', 'Pintura de oleo', 'vistas/img/productos/602/899.jpg', 10, 124000, 173600, NULL, '2024-11-18 01:11:05');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla sistem_facturacion.usuarios: ~4 rows (aproximadamente)
INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
	(2, 'Kevin Vega', 'KVega', '$2y$10$OqDxdqG.rPs671D7hbk2huk/uZApEGT5bWnmmARuXjpYuXtVWccvS', 'Especial', 'vistas/img/usuarios/KVega/351.png', 1, '2024-11-13 22:54:39', '2024-11-15 04:16:21'),
	(10, 'Yamile', 'yamile', '$2y$10$pAVoFPGml6cIqS3RswGsuuuuEm97HU8XL./LcXI63nq9yEerRK5O2', 'Vendedor', 'vistas/img/usuarios/yamile/719.png', 1, '2024-11-18 17:57:42', NULL),
	(11, 'Camilo', 'camilo', '$2y$10$YZSSKEjdQeKxdOieUGs61.BhrXMgAc3aNe6riGBb1My3NqE7NCZ06', 'Especial', 'vistas/img/usuarios/camilo/754.jpg', 1, '2024-11-18 17:54:04', NULL),
	(13, 'Usuario Administrador', 'Admin', '$2y$10$JAozsUYfQh.iJz0ZE8w35.B04ySZ9mvFkPCazq/rxaz6p76L6ESdS', 'Administrador', 'vistas/img/usuarios/Admin/811.png', 1, '2024-11-18 17:59:31', '2024-11-17 02:21:44'),
	(14, 'Juan Camilo', 'juan', '$2y$10$mZ9x6QtNJyGpnGV8Cn5CD.u.2FkUjvh6SePexSC/UqMlPiExXAxNm', 'Especial', 'vistas/img/usuarios/juan/622.jpg', 1, NULL, NULL);

-- Volcando estructura para tabla sistem_facturacion.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `id` int DEFAULT NULL,
  `codigo` int DEFAULT NULL,
  `id_cliente` int DEFAULT NULL,
  `id_vendedor` int DEFAULT NULL,
  `productos` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci,
  `impuesto` float DEFAULT NULL,
  `neto` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `metodo_pago` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla sistem_facturacion.ventas: ~7 rows (aproximadamente)
INSERT INTO `ventas` (`id`, `codigo`, `id_cliente`, `id_vendedor`, `productos`, `impuesto`, `neto`, `total`, `metodo_pago`, `fecha`) VALUES
	(NULL, 10001, 2, 13, '[{"id":"1","descripcion":"Aspiradora Industrial ","cantidad":"1","stock":"14","precio":"1200","total":"1200"},{"id":"2","descripcion":"Plato Flotante para Allanadora","cantidad":"1","stock":"49","precio":"6300","total":"6300"}]', 1425, 7500, 8925, 'TC-001', '2024-11-18 22:53:09'),
	(NULL, 10002, 1, 13, '[{"id":"60","descripcion":"Cortadora de Baldosin","cantidad":"1","stock":"18","precio":"1302","total":"1302"},{"id":"59","descripcion":"Cono slump","cantidad":"1","stock":"18","precio":"196","total":"196"}]', 284.62, 1498, 1782.62, 'Efectivo', '2024-11-18 23:01:03');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
