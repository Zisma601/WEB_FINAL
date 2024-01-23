-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-01-2024 a las 21:32:49
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `register`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombre_completo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `nombre_empresa` varchar(255) DEFAULT NULL,
  `mensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre_completo`, `email`, `telefono`, `nombre_empresa`, `mensaje`) VALUES
(2, 'sdd', 'sddsds@sdd', 'sdsd', '', 'sdd'),
(3, 'DSDS', 'DSD@FDFDF', 'SDSD', '', 'DDSSDS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donacion`
--

CREATE TABLE `donacion` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `MetodoPago` varchar(255) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `donacion`
--

INSERT INTO `donacion` (`id`, `usuario`, `Cantidad`, `MetodoPago`, `Fecha`) VALUES
(1, 'ASA', 50, 'tarjeta', '2024-01-23 20:09:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `name`, `email`, `password`) VALUES
(1, 'dsd', 'sdsdsd@nfgfg', '$2y$10$QpPee5lOQ1uy0zz1Ogr5HuCmd5P1r.f8yRnEeBUJXNMhFRbqQTTH2'),
(2, 'ds', 'dsd@mgmg', '$2y$10$1VXdVPq.RVmND1G18PBExuUeGYdnBm0IKbdiXQ9PfN.Ki0LfCptU2'),
(3, 'sdsd', 'aa@gmail.com', '$2y$10$H3/Tzya02FfPmGYarQauLuSiXLiZzp7/kxfTV1b.NEgzao/wMrieC'),
(4, 'dsd', 'sdsdsdsdsd@gmama', '$2y$10$V/bTM7xIl3QkS71eFtPRKes8vhOqotyfn1wmWudChcOzz3bjgeAle'),
(5, 'S', 'SDSDSD@GMAIL', '$2y$10$aqperEVH3zSqOY2ZB3pXGuwIqRSTs6qLF0r9uajDPcfHkz1EaxPpG'),
(6, 'H', 'SDSDSD@HMSDMDSS', '$2y$10$iWbHahUMUoDsWqzLitjYHucTTmJqRwPt7iHm2Y8D58t2VAoKjiIYq'),
(7, 'HOLA', 'HOLA@GMAIL.COM', '$2y$10$jjxCLR62BG44j.KZINVCS.ZbKsdEbOKPsbBbQ0PpxRg2ox33cpw6y'),
(8, 'AS', 'ASASS@ASA', '$2y$10$cuUb5Bo7ftwvLXRvAt25m.FmSFP584ygrYg3LrAvW6x6f4.xRLSAy'),
(9, 'ASA', 'ASASS@ASAA', '$2y$10$d/iC0nPVSwmZZQgsHPPIVe8LyR8DkH/1GfJX8l3rccquNxIH7ioXO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `donacion`
--
ALTER TABLE `donacion`
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
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `donacion`
--
ALTER TABLE `donacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
