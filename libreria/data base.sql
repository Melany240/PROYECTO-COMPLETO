-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para libreria
CREATE DATABASE IF NOT EXISTS `libreria` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `libreria`;

-- Volcando estructura para tabla libreria.autores
CREATE TABLE IF NOT EXISTS `autores` (
  `aut_id` int(11) NOT NULL AUTO_INCREMENT,
  `aut_nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `aut_apellidos` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `aut_edicion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `aut_biografia` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `aut_ibras` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`aut_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla libreria.autores: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `autores` DISABLE KEYS */;
INSERT INTO `autores` (`aut_id`, `aut_nombres`, `aut_apellidos`, `aut_edicion`, `aut_biografia`, `aut_ibras`) VALUES
	(1, 'Ava', 'Dellaira', 'El Universo', 'Escritora', 'Amar Vivir'),
	(2, 'Melany', 'Cardenas', 'Pinceles', 'Estudiante', 'Amor');
/*!40000 ALTER TABLE `autores` ENABLE KEYS */;

-- Volcando estructura para tabla libreria.editorial_provedor
CREATE TABLE IF NOT EXISTS `editorial_provedor` (
  `edi_id` int(11) NOT NULL AUTO_INCREMENT,
  `aut_id` int(11) DEFAULT NULL,
  `edi_nombre_empresa` varchar(100) COLLATE utf8_spanish_ci,
  `edi_telefono` varchar(100) COLLATE utf8_spanish_ci,
  `edi_direccion` varchar(100) COLLATE utf8_spanish_ci,
  `edi_correo` varchar(100) COLLATE utf8_spanish_ci,
  PRIMARY KEY (`edi_id`),
  KEY `fk_reference_8` (`aut_id`),
  CONSTRAINT `fk_reference_8` FOREIGN KEY (`aut_id`) REFERENCES `autores` (`aut_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla libreria.editorial_provedor: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `editorial_provedor` DISABLE KEYS */;
INSERT INTO `editorial_provedor` (`edi_id`, `aut_id`, `edi_nombre_empresa`, `edi_telefono`, `edi_direccion`, `edi_correo`) VALUES
	(4, 1, 'Pincelitos', '0980845781', 'San Antonio Av. El pascual OE2-789', 'avadellaira@gmail.com');
/*!40000 ALTER TABLE `editorial_provedor` ENABLE KEYS */;

-- Volcando estructura para tabla libreria.empleados
CREATE TABLE IF NOT EXISTS `empleados` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `li_id` int(11) DEFAULT NULL,
  `emp_nombres` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `emp_apellidos` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `emp_cedula` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `emp_direccion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `emp_telefono` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `emp_correo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `fk_reference_5` (`li_id`),
  CONSTRAINT `fk_reference_5` FOREIGN KEY (`li_id`) REFERENCES `libreria` (`li_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla libreria.empleados: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` (`emp_id`, `li_id`, `emp_nombres`, `emp_apellidos`, `emp_cedula`, `emp_direccion`, `emp_telefono`, `emp_correo`) VALUES
	(6, 2, 'Dennise', 'Sanchez', '1725361425', 'Guamaní  S78 OE2-567', '0988828087', 'denisse@gmail.com');
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;

-- Volcando estructura para tabla libreria.factura
CREATE TABLE IF NOT EXISTS `factura` (
  `fac_id` int(11) NOT NULL AUTO_INCREMENT,
  `li_id` int(11) NOT NULL,
  `clie_id` int(11) NOT NULL,
  `fac_numero` int(11) NOT NULL,
  `fac_iva` float NOT NULL DEFAULT '0',
  `fac_descuento` float NOT NULL,
  `fac_fecha` date NOT NULL,
  PRIMARY KEY (`fac_id`),
  KEY `fk_reference_11` (`clie_id`),
  KEY `FK_factura_libreria` (`li_id`),
  CONSTRAINT `FK_factura_libreria` FOREIGN KEY (`li_id`) REFERENCES `libreria` (`li_id`),
  CONSTRAINT `fk_reference_11` FOREIGN KEY (`clie_id`) REFERENCES `users` (`clie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla libreria.factura: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` (`fac_id`, `li_id`, `clie_id`, `fac_numero`, `fac_iva`, `fac_descuento`, `fac_fecha`) VALUES
	(2, 2, 4, 1, 1, 5, '2021-06-25');
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;

-- Volcando estructura para tabla libreria.factura_detalle
CREATE TABLE IF NOT EXISTS `factura_detalle` (
  `fade_id` int(11) NOT NULL AUTO_INCREMENT,
  `fac_id` int(11) NOT NULL,
  `lib_id` int(11) NOT NULL,
  `fade_cant` float NOT NULL DEFAULT '0',
  `fade_vu` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`fade_id`),
  KEY `fac_id` (`fac_id`),
  KEY `FK_factura_detalle_libros` (`lib_id`),
  CONSTRAINT `FK_factura_detalle_libros` FOREIGN KEY (`lib_id`) REFERENCES `libros` (`lib_id`),
  CONSTRAINT `fk_reference_14` FOREIGN KEY (`fac_id`) REFERENCES `factura` (`fac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla libreria.factura_detalle: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `factura_detalle` DISABLE KEYS */;
INSERT INTO `factura_detalle` (`fade_id`, `fac_id`, `lib_id`, `fade_cant`, `fade_vu`) VALUES
	(3, 2, 2, 4, 15);
/*!40000 ALTER TABLE `factura_detalle` ENABLE KEYS */;

-- Volcando estructura para tabla libreria.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla libreria.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla libreria.libreria
CREATE TABLE IF NOT EXISTS `libreria` (
  `li_id` int(11) NOT NULL AUTO_INCREMENT,
  `li_rep_legal` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `li_ubicacion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `li_nombre_libreria` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `li_correo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `li_sitio_web` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `li_telefono` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`li_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla libreria.libreria: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `libreria` DISABLE KEYS */;
INSERT INTO `libreria` (`li_id`, `li_rep_legal`, `li_ubicacion`, `li_nombre_libreria`, `li_correo`, `li_sitio_web`, `li_telefono`) VALUES
	(2, 'Dilan Cardenas', 'Quito El Beaterio Av.Juan y Morales Local 376', 'Libritos', 'libritos@gmail.com', 'libritos.com', '1998-12-11 19:10:56');
/*!40000 ALTER TABLE `libreria` ENABLE KEYS */;

-- Volcando estructura para tabla libreria.libros
CREATE TABLE IF NOT EXISTS `libros` (
  `lib_id` int(11) NOT NULL AUTO_INCREMENT,
  `li_id` int(11) DEFAULT NULL,
  `edi_id` int(11) DEFAULT NULL,
  `lib_autores_` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `lib_nombres_libros` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `lib_ano` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `lib_categoria` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `lib_editorial_` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `lib_clasificacion_` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`lib_id`),
  KEY `FK_libros_libreria` (`li_id`),
  KEY `FK_libros_editorial_provedor` (`edi_id`),
  CONSTRAINT `FK_libros_editorial_provedor` FOREIGN KEY (`edi_id`) REFERENCES `editorial_provedor` (`edi_id`),
  CONSTRAINT `FK_libros_libreria` FOREIGN KEY (`li_id`) REFERENCES `libreria` (`li_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla libreria.libros: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `libros` DISABLE KEYS */;
INSERT INTO `libros` (`lib_id`, `li_id`, `edi_id`, `lib_autores_`, `lib_nombres_libros`, `lib_ano`, `lib_categoria`, `lib_editorial_`, `lib_clasificacion_`) VALUES
	(2, 2, 4, 'Ava Dellaira', 'Amar Vivir', '2003', 'Romance', 'El Universo', '5'),
	(3, 2, 4, 'Melani Cardenas', 'Amor', '1985', 'Romance', 'Piceles', '5');
/*!40000 ALTER TABLE `libros` ENABLE KEYS */;

-- Volcando estructura para tabla libreria.libros_prestados
CREATE TABLE IF NOT EXISTS `libros_prestados` (
  `lp_id` int(11) NOT NULL AUTO_INCREMENT,
  `clie_id` int(11) DEFAULT NULL,
  `lib_id` int(11) DEFAULT NULL,
  `lp_fecha_inicio` date,
  `lp_fecha_entrega` date DEFAULT NULL,
  PRIMARY KEY (`lp_id`),
  KEY `fk_reference_15` (`lib_id`),
  KEY `fk_reference_7` (`clie_id`),
  CONSTRAINT `fk_reference_15` FOREIGN KEY (`lib_id`) REFERENCES `libros` (`lib_id`),
  CONSTRAINT `fk_reference_7` FOREIGN KEY (`clie_id`) REFERENCES `users` (`clie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla libreria.libros_prestados: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `libros_prestados` DISABLE KEYS */;
INSERT INTO `libros_prestados` (`lp_id`, `clie_id`, `lib_id`, `lp_fecha_inicio`, `lp_fecha_entrega`) VALUES
	(1, 4, 2, '2021-06-08', '2021-06-29');
/*!40000 ALTER TABLE `libros_prestados` ENABLE KEYS */;

-- Volcando estructura para tabla libreria.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla libreria.migrations: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla libreria.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla libreria.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla libreria.users
CREATE TABLE IF NOT EXISTS `users` (
  `clie_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clie_cedula` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clie_telefono` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clie_direccion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clie_genero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clie_tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clie_estadocivil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clie_usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clie_fenac` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clie_estado` int(11) NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`clie_id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla libreria.users: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`clie_id`, `name`, `clie_cedula`, `clie_telefono`, `clie_direccion`, `email`, `clie_genero`, `clie_tipo`, `clie_estadocivil`, `clie_usuario`, `clie_fenac`, `clie_estado`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(4, 'Melany', '0501521425', '0985741245', 'Nueva Aurora L23 OE2-786', 'alexmorales@gmail.com', 'HOMBRE', 'T', 'Casado', 'Alex', '2000-10-12 00:00:00', 1, NULL, '$2y$10$O1ZiPiMScdOATTFe.Slyy.l1sj77mjg6xLph/ffXWIXufKZuOXWi.', NULL, NULL, NULL),
	(6, 'Admin', '0504561234', '0987748574', 'San Blas H56-0E2-809', 'dilan_cardenas2008@hotmail.com', 'HOMBRE', 'A', 'Casado', 'Admin', '1985-06-25 00:00:00', 1, '2021-06-10 00:00:00', '$2y$10$dJvfeZEOzDJVX9xJpDxPI.sMvFSk4aLUTxNgWe.rWBWibeAKguxhW', 'Nbolj36D41pUKHS0OwE3euTiQY561aBVROjyS359yoSd1tNTiU7mcWcIk19P', NULL, NULL),
	(22, 'Melany Cardenas', '1721210860', '0985748283', 'San Fernando L12 OE2-456', 'melanycardena32@gmail.com', 'MUJER', 'C', 'Soltero', 'Melany', '2003-05-11 00:00:00', 1, NULL, '$2y$10$NJ2.4bxalqqN9LWR1J5VHuDo3BF3sm87Pgv3YhAcHQJTv1BU2JvhK', NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
