-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2019 a las 09:01:02
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
CREATE DATABASE IF NOT EXISTS `pokerstark` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `pokerstark`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avatars`
--

CREATE TABLE `avatars` (
  `id_avatar` int(11) NOT NULL,
  `img` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `avatars`
--

INSERT INTO `avatars` (`id_avatar`, `img`) VALUES
(1, 'img/avatars/5ddf7956be1f1.jpg'),
(2, 'img/avatars/5ddf795cb1a5a.jpg'),
(3, 'img/avatars/5ddf79678bd00.jpg'),
(4, 'img/avatars/5ddf796caf909.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id_mensaje` int(11) NOT NULL,
  `id_mesa` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `mensaje` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id_mensaje`, `id_mesa`, `id_usuario`, `mensaje`) VALUES
(1, 11, 1, 'hola');

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
(2, 200, 400),
(3, 500, 1000),
(4, 1000, 2000);

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
  `mazo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `sillas` int(11) NOT NULL DEFAULT 9
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id_mesa`, `id_ciegas`, `pozo`, `mazo`, `sillas`) VALUES
(11, 1, 0, NULL, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntajes`
--

CREATE TABLE `puntajes` (
  `id_usuario` int(11) NOT NULL,
  `id_mesa` int(11) NOT NULL,
  `puntaje` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `puntajes`
--

INSERT INTO `puntajes` (`id_usuario`, `id_mesa`, `puntaje`) VALUES
(1, 11, 5);

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
  `fichas` int(11) NOT NULL,
  `id_avatar` int(11) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `username`, `password`, `nombre`, `apellido`, `pais`, `fichas`, `id_avatar`, `admin`) VALUES
(1, 'ByElection', '$2y$10$TnHAZ4YQnl7zDkYQBRgXAe8uYO9vJ.K8DgdXMjRP.NPb3xZ/QvENe', 'Gonzalo', 'Zarzabal', 'Argentina', 5000, 3, 1),
(2, 'EbolaKills', '$2y$10$I7OG2JfOkXhV.kxI4wpMIOZRfkl12kuYmSSuZHPz4qPNNwLeEoFXO', 'Juan', 'Grela', 'Argentina', 500, NULL, 1);

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
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id_mesa`);

--
-- Indices de la tabla `puntajes`
--
ALTER TABLE `puntajes`
  ADD PRIMARY KEY (`id_usuario`,`id_mesa`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `avatars`
--
ALTER TABLE `avatars`
  MODIFY `id_avatar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ciegas`
--
ALTER TABLE `ciegas`
  MODIFY `id_ciegas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
