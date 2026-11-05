-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-11-2026 a las 22:40:08
-- Versión del servidor: 8.4.7
-- Versión de PHP: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `encuesta_estudiantes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

DROP TABLE IF EXISTS `administradores`;
CREATE TABLE IF NOT EXISTS `administradores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `usuario`, `password`) VALUES
(1, 'admin', '$2y$12$gAUPLRMcYvufd8dQ8cziCuRS0BZgcijBzYyWD/2giV.pvSzzI6EFy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

DROP TABLE IF EXISTS `respuestas`;
CREATE TABLE IF NOT EXISTS `respuestas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institucion` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carrera` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departamento` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `convivencia` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personas_cargo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `distancia` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transporte` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `situacion_laboral` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relacion_laboral` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ayuda_social` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trayectoria_previa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `interrupcion` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `impacto_laboral` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `impacto_familiar` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asistencia` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `factor_inasistencia` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `puntualidad` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dispositivo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `propiedad_dispositivo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conexion_internet` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
