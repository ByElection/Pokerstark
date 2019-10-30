-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2019 a las 03:09:52
-- Versión del servidor: 10.3.15-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pokerstark`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciegas`
--

CREATE TABLE `ciegas` (
  `id_ciegas` int(11) NOT NULL,
  `ciega_chica` int(11) NOT NULL,
  `ciega_grande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `ciegas`
--

INSERT INTO `ciegas` (`id_ciegas`, `ciega_chica`, `ciega_grande`) VALUES
(1, 50, 100),
(2, 100, 200),
(3, 200, 400),
(4, 500, 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `id_usuario` int(11) NOT NULL,
  `fichas_mesa` int(11) NOT NULL,
  `id_mesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id_usuario`, `fichas_mesa`, `id_mesa`) VALUES
(1, 1000, 2),
(3, 1000, 2),
(2, 1000, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `id_mesa` int(11) NOT NULL,
  `id_ciegas` int(11) NOT NULL,
  `pozo` int(11) NOT NULL DEFAULT 0,
  `sillas` int(11) NOT NULL DEFAULT 9
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id_mesa`, `id_ciegas`, `pozo`, `sillas`) VALUES
(1, 1, 0, 9),
(2, 2, 0, 3),
(3, 3, 0, 9),
(4, 4, 0, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` text COLLATE latin1_spanish_ci NOT NULL,
  `password` text COLLATE latin1_spanish_ci NOT NULL,
  `nombre` text COLLATE latin1_spanish_ci NOT NULL,
  `apellido` text COLLATE latin1_spanish_ci NOT NULL,
  `pais` text COLLATE latin1_spanish_ci NOT NULL,
  `fichas` int(11) NOT NULL DEFAULT 2000,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `username`, `password`, `nombre`, `apellido`, `pais`, `fichas`, `admin`) VALUES
(1, 'ByElection', '$2y$10$3ZZ.tShVVlrBwJw/iWwuBezFfj2r2KAUhhZSjNhsJqz4UENbFE6OC', 'Gonzalo', 'Zarzabal', 'Argentina', 2000, 1),
(2, 'robertito', '$2y$10$udMc/EsZsv4yPYMxYDbGruewerBP2tnzAn38HDqNuLroMDdhidGSa', 'roberto', 'carlos', 'Brasil', 2000, 0),
(3, 'pechofrio', '$2y$10$ICEY9uvast08K7SOs3G15OsZzuS7T3QXuYsswYiOkx2dXCSG6lQPq', 'Lionel', 'Messi', 'España', 2000, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciegas`
--
ALTER TABLE `ciegas`
  ADD PRIMARY KEY (`id_ciegas`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD KEY `id_mesa` (`id_mesa`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id_mesa`),
  ADD KEY `id_ciegas` (`id_ciegas`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciegas`
--
ALTER TABLE `ciegas`
  MODIFY `id_ciegas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugadores_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `jugadores_ibfk_2` FOREIGN KEY (`id_mesa`) REFERENCES `mesas` (`id_mesa`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD CONSTRAINT `mesas_ibfk_1` FOREIGN KEY (`id_ciegas`) REFERENCES `ciegas` (`id_ciegas`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
