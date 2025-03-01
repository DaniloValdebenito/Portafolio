-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2023 a las 02:55:56
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinariaahq`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes_cita`
--

CREATE TABLE `solicitudes_cita` (
  `id` int(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `motivo` varchar(100) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `estado` varchar(100) DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitudes_cita`
--

INSERT INTO `solicitudes_cita` (`id`, `nombre`, `correo`, `motivo`, `fecha`, `estado`) VALUES
(23, 'troton', 'marcolabrana@gmail.com', 'asdasdas', '2023-10-12 15:30:00', 'aceptada'),
(24, 'troton', 'marcolabrana@gmail.com', 'fghfghf', '2023-10-12 20:08:00', 'aceptada'),
(25, 'corean', 'marcolabrana@gmail.com', 'sfsdfsdfsdf', '2023-10-13 01:07:00', 'aceptada');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `solicitudes_cita`
--
ALTER TABLE `solicitudes_cita`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `solicitudes_cita`
--
ALTER TABLE `solicitudes_cita`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
