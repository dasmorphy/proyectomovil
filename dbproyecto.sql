-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2022 a las 03:57:57
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbproyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id` int(11) NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `titular` varchar(20) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `mz` varchar(30) NOT NULL,
  `villa` varchar(30) NOT NULL,
  `actividad` varchar(15) NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `codigo`, `titular`, `direccion`, `mz`, `villa`, `actividad`, `estado`) VALUES
(105, '2', 'daniel', 'q', '1', '1', 'Conectar Servic', 'Pendiente'),
(108, '2331', 'josue', '3131', '1', '1', 'Conectar Servic', 'Pendiente'),
(110, '12320', 'samuel', 'dsds', '2', '2', 'Conectar Servic', 'Pendiente'),
(112, '2222', 'josue', '3131', '1', '1', 'Conectar Servic', 'Pendiente'),
(113, '2355', 'daniel', 'q', '1', '1', 'Conectar Servic', 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lecturas`
--

CREATE TABLE `lecturas` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `titular` varchar(20) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `mz` varchar(3) NOT NULL,
  `villa` varchar(3) NOT NULL,
  `lectura` varchar(5) NOT NULL,
  `localizacion` varchar(40) NOT NULL,
  `urlcamera` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lecturas`
--

INSERT INTO `lecturas` (`id`, `codigo`, `titular`, `direccion`, `mz`, `villa`, `lectura`, `localizacion`, `urlcamera`) VALUES
(12, '2355', 'daniel', 'q', '1', '1', '2', 'gye', 'https://res.cloudinary.com/doz4s8eki/image/upload/c_pad,b_auto:predominant,fl_preserve_transparency/v1663541277/cld-sample-4.jpg'),
(13, '2222', 'josue', '3131', '1', '1', '2331', 'gye', 'https://res.cloudinary.com/doz4s8eki/image/upload/v1663541278/cld-sample-5.jpg'),
(43, '4566', 'samuel', 'dsds', '2', '2', '12320', 'gye', 'https://res.cloudinary.com/doz4s8eki/image/upload/v1663541276/cld-sample-2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`) VALUES
(1, 'daniel', 'daniel'),
(2, 'josue', 'josue');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lecturas`
--
ALTER TABLE `lecturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT de la tabla `lecturas`
--
ALTER TABLE `lecturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
