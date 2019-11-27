-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2019 a las 20:54:11
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

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
CREATE DATABASE IF NOT EXISTS `pokerstark` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pokerstark`;

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

INSERT INTO `avatars` (`id_avatar`, `img`) VALUES(1, 'img/1.jpg');
INSERT INTO `avatars` (`id_avatar`, `img`) VALUES(2, 'img/2.jpg');
INSERT INTO `avatars` (`id_avatar`, `img`) VALUES(3, 'img/3.jpg');
INSERT INTO `avatars` (`id_avatar`, `img`) VALUES(4, 'img/4.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id_mensaje` int(11) NOT NULL,
  `id_mesa` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `mensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id_mensaje`, `id_mesa`, `id_usuario`, `mensaje`) VALUES(1, 10, 1, 'hola');
INSERT INTO `chat` (`id_mensaje`, `id_mesa`, `id_usuario`, `mensaje`) VALUES(4, 10, 1, 'asdadasd');
INSERT INTO `chat` (`id_mensaje`, `id_mesa`, `id_usuario`, `mensaje`) VALUES(5, 10, 1, 'toma por curioso ..I.,');

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

INSERT INTO `ciegas` (`id_ciegas`, `ciega_chica`, `ciega_grande`) VALUES(13, 4545, 9090);
INSERT INTO `ciegas` (`id_ciegas`, `ciega_chica`, `ciega_grande`) VALUES(15, 55, 110);
INSERT INTO `ciegas` (`id_ciegas`, `ciega_chica`, `ciega_grande`) VALUES(16, 200, 400);
INSERT INTO `ciegas` (`id_ciegas`, `ciega_chica`, `ciega_grande`) VALUES(17, 100, 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `id_usuario` int(11) NOT NULL,
  `fichas_mesa` int(11) NOT NULL,
  `apuesta` int(11) NOT NULL DEFAULT 0,
  `id_mesa` int(11) NOT NULL,
  `silla` int(11) NOT NULL,
  `cartas` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `id_mesa` int(11) NOT NULL,
  `id_ciegas` int(11) NOT NULL,
  `pozo` int(11) NOT NULL DEFAULT 0,
  `mazo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id_mesa`, `id_ciegas`, `pozo`, `mazo`, `sillas`) VALUES(10, 16, 0, '[{\"palo\":\"C\",\"valor\":\"10\"},{\"palo\":\"P\",\"valor\":\"3\"},{\"palo\":\"T\",\"valor\":\"12\"},{\"palo\":\"T\",\"valor\":\"13\"},{\"palo\":\"D\",\"valor\":\"13\"},{\"palo\":\"D\",\"valor\":\"3\"},{\"palo\":\"C\",\"valor\":\"11\"},{\"palo\":\"C\",\"valor\":\"4\"},{\"palo\":\"C\",\"valor\":\"8\"},{\"palo\":\"C\",\"valor\":\"6\"},{\"palo\":\"P\",\"valor\":\"4\"},{\"palo\":\"C\",\"valor\":\"12\"},{\"palo\":\"C\",\"valor\":\"3\"},{\"palo\":\"T\",\"valor\":\"2\"},{\"palo\":\"D\",\"valor\":\"9\"},{\"palo\":\"P\",\"valor\":\"8\"},{\"palo\":\"T\",\"valor\":\"3\"},{\"palo\":\"T\",\"valor\":\"1\"},{\"palo\":\"P\",\"valor\":\"7\"},{\"palo\":\"D\",\"valor\":\"1\"},{\"palo\":\"D\",\"valor\":\"5\"},{\"palo\":\"P\",\"valor\":\"6\"},{\"palo\":\"D\",\"valor\":\"8\"},{\"palo\":\"C\",\"valor\":\"13\"},{\"palo\":\"D\",\"valor\":\"11\"},{\"palo\":\"D\",\"valor\":\"10\"},{\"palo\":\"T\",\"valor\":\"7\"},{\"palo\":\"T\",\"valor\":\"5\"},{\"palo\":\"D\",\"valor\":\"7\"},{\"palo\":\"P\",\"valor\":\"11\"},{\"palo\":\"C\",\"valor\":\"9\"},{\"palo\":\"D\",\"valor\":\"4\"},{\"palo\":\"P\",\"valor\":\"13\"},{\"palo\":\"T\",\"valor\":\"8\"},{\"palo\":\"D\",\"valor\":\"2\"},{\"palo\":\"C\",\"valor\":\"1\"},{\"palo\":\"C\",\"valor\":\"2\"},{\"palo\":\"C\",\"valor\":\"7\"},{\"palo\":\"T\",\"valor\":\"9\"},{\"palo\":\"P\",\"valor\":\"1\"},{\"palo\":\"P\",\"valor\":\"2\"},{\"palo\":\"T\",\"valor\":\"4\"},{\"palo\":\"D\",\"valor\":\"6\"},{\"palo\":\"T\",\"valor\":\"10\"},{\"palo\":\"T\",\"valor\":\"11\"},{\"palo\":\"P\",\"valor\":\"9\"},{\"palo\":\"D\",\"valor\":\"12\"},{\"palo\":\"P\",\"valor\":\"10\"},{\"palo\":\"T\",\"valor\":\"6\"},{\"palo\":\"P\",\"valor\":\"12\"},{\"palo\":\"C\",\"valor\":\"5\"},{\"palo\":\"P\",\"valor\":\"5\"}]', 3);
INSERT INTO `mesas` (`id_mesa`, `id_ciegas`, `pozo`, `mazo`, `sillas`) VALUES(11, 16, 0, NULL, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntajes`
--

CREATE TABLE `puntajes` (
  `id_usuario` int(11) NOT NULL,
  `id_mesa` int(11) NOT NULL,
  `puntaje` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

INSERT INTO `usuarios` (`id_usuario`, `username`, `password`, `nombre`, `apellido`, `pais`, `fichas`, `id_avatar`, `admin`) VALUES(1, 'ByElection', '$2y$10$3ZZ.tShVVlrBwJw/iWwuBezFfj2r2KAUhhZSjNhsJqz4UENbFE6OC', 'Gonzalo', 'Zarzabal', 'Argentina', 210000, 3, 1);
INSERT INTO `usuarios` (`id_usuario`, `username`, `password`, `nombre`, `apellido`, `pais`, `fichas`, `id_avatar`, `admin`) VALUES(2, 'robertito', '$2y$10$udMc/EsZsv4yPYMxYDbGruewerBP2tnzAn38HDqNuLroMDdhidGSa', 'roberto', 'carlos', 'Brasil', 30000, 1, 0);
INSERT INTO `usuarios` (`id_usuario`, `username`, `password`, `nombre`, `apellido`, `pais`, `fichas`, `id_avatar`, `admin`) VALUES(3, 'pechofrio', '$2y$10$ICEY9uvast08K7SOs3G15OsZzuS7T3QXuYsswYiOkx2dXCSG6lQPq', 'Lionel', 'Messi', 'España', 10000, 1, 0);
INSERT INTO `usuarios` (`id_usuario`, `username`, `password`, `nombre`, `apellido`, `pais`, `fichas`, `id_avatar`, `admin`) VALUES(4, 'EbolaKills', '$2y$10$jctRdE5GVKbcWAgg.8UzruWPntZNV3SmSgnzSBpmjh2ULJeiU7zhG', 'Juan', 'Grela', 'Bosnia y Herzegovina', 2000, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `avatars`
--
ALTER TABLE `avatars`
  ADD PRIMARY KEY (`id_avatar`);

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_mensaje`);

--
-- Indices de la tabla `ciegas`
--
ALTER TABLE `ciegas`
  ADD PRIMARY KEY (`id_ciegas`);

--
-- Indices de la tabla `puntajes`
--
ALTER TABLE `puntajes`
  ADD PRIMARY KEY (`id_usuario`,`id_mesa`);

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
  MODIFY `id_avatar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ciegas`
--
ALTER TABLE `ciegas`
  MODIFY `id_ciegas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_avatar`) REFERENCES `avatars` (`id_avatar`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
