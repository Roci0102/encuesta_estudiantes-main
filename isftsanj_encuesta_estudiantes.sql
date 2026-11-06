-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 10.0.10.75:3306
-- Tiempo de generación: 06-11-2026 a las 11:30:26
-- Versión del servidor: 11.4.7-MariaDB
-- Versión de PHP: 8.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `isftsanj_encuesta_estudiantes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `usuario`, `password`) VALUES
(1, 'admin', '$2y$12$gAUPLRMcYvufd8dQ8cziCuRS0BZgcijBzYyWD/2giV.pvSzzI6EFy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `institucion` varchar(150) NOT NULL,
  `carrera` varchar(150) NOT NULL,
  `edad` varchar(20) NOT NULL,
  `genero` varchar(30) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `convivencia` varchar(100) NOT NULL,
  `personas_cargo` varchar(20) NOT NULL,
  `distancia` varchar(50) NOT NULL,
  `transporte` varchar(100) NOT NULL,
  `situacion_laboral` varchar(100) NOT NULL,
  `relacion_laboral` varchar(100) NOT NULL,
  `ayuda_social` varchar(10) NOT NULL,
  `trayectoria_previa` text NOT NULL,
  `interrupcion` varchar(30) NOT NULL,
  `impacto_laboral` varchar(30) NOT NULL,
  `impacto_familiar` varchar(30) NOT NULL,
  `asistencia` varchar(30) NOT NULL,
  `factor_inasistencia` varchar(200) DEFAULT NULL,
  `puntualidad` varchar(30) NOT NULL,
  `dispositivo` varchar(50) NOT NULL,
  `propiedad_dispositivo` varchar(30) NOT NULL,
  `conexion_internet` varchar(50) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `email`, `institucion`, `carrera`, `edad`, `genero`, `departamento`, `convivencia`, `personas_cargo`, `distancia`, `transporte`, `situacion_laboral`, `relacion_laboral`, `ayuda_social`, `trayectoria_previa`, `interrupcion`, `impacto_laboral`, `impacto_familiar`, `asistencia`, `factor_inasistencia`, `puntualidad`, `dispositivo`, `propiedad_dispositivo`, `conexion_internet`, `fecha_registro`) VALUES
(4, 'luizone890@gmail.com', 'ISFD ESCUELA NORMAL SUPERIOR \"GRAL. SAN MARTÍN\"', 'Profesorado de Educación Inicial', '20 a 25', 'Masculino', 'Valle Fértil', 'Con pareja e hijos', '4 o más', 'Hasta 5 km', 'Vehículo particular motorizado (Auto/Moto)', 'Trabajo medio día', 'Tengo un trabajo en relación de dependencia (en blanco)', 'Sí', 'Estudió otra carrera de nivel superior y la culminó', '5 a 10 años', 'Poco', 'No afecta', '25%', 'Mas de uno', 'Ocasionalmente', 'Teléfono celular propio', 'Compartido', 'Solo Wifi', '2026-11-06 14:16:05'),
(5, 'panter@nose.com', 'ISFT DE BIBLIOTECOLOGÍA \"DR. MARIANO MORENO\"', 'Tecnicatura Superior en Bibliotecología', '26 a 30', 'Otro', 'Ullum', 'Con pareja e hijos', '3', 'De 5 a 10 km', 'Vehículo particular motorizado (Auto/Moto)', 'Trabajo los fines de semana', 'Tengo un trabajo en relación de dependencia (en blanco)', 'No', 'Estudió otra carrera de nivel superior y la culminó', '2 a 5 años', 'No afecta', 'Poco', '50%', 'Motivación y clima institucional', 'Ocasionalmente', 'PC o Notebook', 'Compartido', 'Solo Wifi', '2026-11-06 14:29:40');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
