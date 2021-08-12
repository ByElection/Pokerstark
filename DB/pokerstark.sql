-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-08-2021 a las 02:10:18
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Estructura de tabla para la tabla `avatars`
--

CREATE TABLE `avatars` (
  `id_avatar` int(11) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `avatars`
--

INSERT INTO `avatars` (`id_avatar`, `img`) VALUES
(1, 'img/1.jpg'),
(2, 'img/2.jpg'),
(3, 'img/3.jpg'),
(4, 'img/4.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id_mesa` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `mensaje` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id_mesa`, `id_usuario`, `mensaje`) VALUES
(14, 1, 'hola'),
(14, 1, 'agarrame los huevo'),
(14, 1, 'agarrame los huevo'),
(14, 1, 'agarrame los huevo'),
(14, 1, 'agarrame los huevo'),
(14, 1, 'agarrame los huevo');

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
(13, 10, 20),
(15, 50, 100),
(16, 200, 400),
(17, 100, 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `id_usuario` int(11) NOT NULL,
  `fichas_mesa` int(11) NOT NULL,
  `id_mesa` int(11) NOT NULL,
  `silla` int(11) NOT NULL,
  `cartas` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `apuesta` int(11) NOT NULL DEFAULT 0,
  `retirado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `id_mesa` int(11) NOT NULL,
  `id_ciegas` int(11) NOT NULL,
  `pozo` int(11) NOT NULL DEFAULT 0,
  `sillas` int(11) NOT NULL DEFAULT 9,
  `mazo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`mazo`)),
  `dealer` int(11) DEFAULT 1,
  `turno` int(11) DEFAULT 1,
  `fase` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id_mesa`, `id_ciegas`, `pozo`, `sillas`, `mazo`, `dealer`, `turno`, `fase`) VALUES
(14, 13, 0, 5, '[{\"palo\":\"C\",\"valor\":\"8\"},{\"palo\":\"C\",\"valor\":\"3\"},{\"palo\":\"P\",\"valor\":\"12\"},{\"palo\":\"P\",\"valor\":\"8\"},{\"palo\":\"C\",\"valor\":\"6\"},{\"palo\":\"P\",\"valor\":\"6\"},{\"palo\":\"C\",\"valor\":\"13\"},{\"palo\":\"D\",\"valor\":\"9\"},{\"palo\":\"P\",\"valor\":\"11\"},{\"palo\":\"P\",\"valor\":\"9\"},{\"palo\":\"C\",\"valor\":\"2\"},{\"palo\":\"T\",\"valor\":\"8\"},{\"palo\":\"C\",\"valor\":\"7\"},{\"palo\":\"D\",\"valor\":\"5\"},{\"palo\":\"P\",\"valor\":\"3\"},{\"palo\":\"P\",\"valor\":\"1\"},{\"palo\":\"T\",\"valor\":\"13\"},{\"palo\":\"D\",\"valor\":\"2\"},{\"palo\":\"C\",\"valor\":\"4\"},{\"palo\":\"T\",\"valor\":\"4\"},{\"palo\":\"P\",\"valor\":\"13\"},{\"palo\":\"P\",\"valor\":\"5\"},{\"palo\":\"D\",\"valor\":\"11\"},{\"palo\":\"P\",\"valor\":\"10\"},{\"palo\":\"T\",\"valor\":\"9\"},{\"palo\":\"T\",\"valor\":\"6\"},{\"palo\":\"C\",\"valor\":\"11\"},{\"palo\":\"D\",\"valor\":\"3\"},{\"palo\":\"P\",\"valor\":\"2\"},{\"palo\":\"C\",\"valor\":\"1\"},{\"palo\":\"D\",\"valor\":\"12\"},{\"palo\":\"T\",\"valor\":\"11\"},{\"palo\":\"T\",\"valor\":\"1\"},{\"palo\":\"C\",\"valor\":\"5\"},{\"palo\":\"T\",\"valor\":\"3\"},{\"palo\":\"D\",\"valor\":\"1\"},{\"palo\":\"D\",\"valor\":\"10\"},{\"palo\":\"D\",\"valor\":\"7\"},{\"palo\":\"P\",\"valor\":\"4\"},{\"palo\":\"D\",\"valor\":\"13\"},{\"palo\":\"P\",\"valor\":\"7\"},{\"palo\":\"T\",\"valor\":\"12\"},{\"palo\":\"C\",\"valor\":\"10\"},{\"palo\":\"C\",\"valor\":\"12\"},{\"palo\":\"T\",\"valor\":\"5\"},{\"palo\":\"T\",\"valor\":\"10\"},{\"palo\":\"D\",\"valor\":\"4\"},{\"palo\":\"D\",\"valor\":\"6\"},{\"palo\":\"C\",\"valor\":\"9\"},{\"palo\":\"T\",\"valor\":\"7\"},{\"palo\":\"T\",\"valor\":\"2\"},{\"palo\":\"D\",\"valor\":\"8\"}]', 1, 1, 0),
(15, 13, 0, 6, '[{\"palo\":\"D\",\"valor\":\"9\"},{\"palo\":\"P\",\"valor\":\"4\"},{\"palo\":\"P\",\"valor\":\"5\"},{\"palo\":\"C\",\"valor\":\"1\"},{\"palo\":\"P\",\"valor\":\"9\"},{\"palo\":\"C\",\"valor\":\"13\"},{\"palo\":\"T\",\"valor\":\"7\"},{\"palo\":\"C\",\"valor\":\"9\"},{\"palo\":\"P\",\"valor\":\"8\"},{\"palo\":\"P\",\"valor\":\"3\"},{\"palo\":\"P\",\"valor\":\"11\"},{\"palo\":\"T\",\"valor\":\"2\"},{\"palo\":\"T\",\"valor\":\"9\"},{\"palo\":\"D\",\"valor\":\"7\"},{\"palo\":\"D\",\"valor\":\"10\"},{\"palo\":\"D\",\"valor\":\"13\"},{\"palo\":\"D\",\"valor\":\"5\"},{\"palo\":\"P\",\"valor\":\"2\"},{\"palo\":\"C\",\"valor\":\"12\"},{\"palo\":\"C\",\"valor\":\"2\"},{\"palo\":\"T\",\"valor\":\"6\"},{\"palo\":\"T\",\"valor\":\"4\"},{\"palo\":\"D\",\"valor\":\"6\"},{\"palo\":\"P\",\"valor\":\"6\"},{\"palo\":\"C\",\"valor\":\"3\"},{\"palo\":\"C\",\"valor\":\"7\"},{\"palo\":\"D\",\"valor\":\"3\"},{\"palo\":\"T\",\"valor\":\"5\"},{\"palo\":\"C\",\"valor\":\"5\"},{\"palo\":\"P\",\"valor\":\"13\"},{\"palo\":\"D\",\"valor\":\"2\"},{\"palo\":\"P\",\"valor\":\"7\"},{\"palo\":\"C\",\"valor\":\"10\"},{\"palo\":\"P\",\"valor\":\"12\"},{\"palo\":\"D\",\"valor\":\"1\"},{\"palo\":\"D\",\"valor\":\"8\"},{\"palo\":\"D\",\"valor\":\"11\"},{\"palo\":\"T\",\"valor\":\"11\"},{\"palo\":\"T\",\"valor\":\"10\"},{\"palo\":\"C\",\"valor\":\"6\"},{\"palo\":\"T\",\"valor\":\"12\"},{\"palo\":\"C\",\"valor\":\"4\"},{\"palo\":\"T\",\"valor\":\"1\"},{\"palo\":\"P\",\"valor\":\"10\"},{\"palo\":\"C\",\"valor\":\"8\"},{\"palo\":\"T\",\"valor\":\"8\"},{\"palo\":\"D\",\"valor\":\"12\"},{\"palo\":\"C\",\"valor\":\"11\"},{\"palo\":\"T\",\"valor\":\"3\"},{\"palo\":\"T\",\"valor\":\"13\"},{\"palo\":\"P\",\"valor\":\"1\"},{\"palo\":\"D\",\"valor\":\"4\"}]', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntajes`
--

CREATE TABLE `puntajes` (
  `id_usuario` int(11) NOT NULL,
  `id_mesa` int(11) NOT NULL,
  `puntaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puntajes`
--

INSERT INTO `puntajes` (`id_usuario`, `id_mesa`, `puntaje`) VALUES
(1, 14, 5);

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
  `id_avatar` int(11) DEFAULT 1,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `username`, `password`, `nombre`, `apellido`, `pais`, `fichas`, `id_avatar`, `admin`) VALUES
(1, 'ByElection', '$2y$10$3ZZ.tShVVlrBwJw/iWwuBezFfj2r2KAUhhZSjNhsJqz4UENbFE6OC', 'Gonzalo', 'Zarzabal', 'Argentina', 209000, 1, 1),
(2, 'robertito', '$2y$10$udMc/EsZsv4yPYMxYDbGruewerBP2tnzAn38HDqNuLroMDdhidGSa', 'roberto', 'carlos', 'Brasil', 30000, 1, 0),
(3, 'pechofrio', '$2y$10$ICEY9uvast08K7SOs3G15OsZzuS7T3QXuYsswYiOkx2dXCSG6lQPq', 'Lionel', 'Messi', 'España', 10000, 1, 0),
(4, 'EbolaKills', '$2y$10$jctRdE5GVKbcWAgg.8UzruWPntZNV3SmSgnzSBpmjh2ULJeiU7zhG', 'Juan', 'Grela', 'Bosnia y Herzegovina', 2000, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `avatars`
--
ALTER TABLE `avatars`
  ADD PRIMARY KEY (`id_avatar`);

--
-- Indices de la tabla `ciegas`
--
ALTER TABLE `ciegas`
  ADD PRIMARY KEY (`id_ciegas`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD UNIQUE KEY `id_usuario_2` (`id_usuario`),
  ADD KEY `id_mesa` (`id_mesa`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id_mesa`),
  ADD KEY `id_ciegas` (`id_ciegas`);

--
-- Indices de la tabla `puntajes`
--
ALTER TABLE `puntajes`
  ADD PRIMARY KEY (`id_usuario`,`id_mesa`),
  ADD KEY `id_mesa` (`id_mesa`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_avatar` (`id_avatar`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `avatars`
--
ALTER TABLE `avatars`
  MODIFY `id_avatar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ciegas`
--
ALTER TABLE `ciegas`
  MODIFY `id_ciegas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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

--
-- Filtros para la tabla `puntajes`
--
ALTER TABLE `puntajes`
  ADD CONSTRAINT `puntajes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `puntajes_ibfk_2` FOREIGN KEY (`id_mesa`) REFERENCES `mesas` (`id_mesa`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_avatar`) REFERENCES `avatars` (`id_avatar`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
