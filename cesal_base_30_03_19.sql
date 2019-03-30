-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-03-2019 a las 00:24:02
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cesal`
--

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `ValidacionLogin`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ValidacionLogin` (IN `usua` VARCHAR(250), IN `contra` TEXT)  READS SQL DATA
SELECT *
FROM usuario
WHERE Usuario=usua AND Contrasena=MD5(contra)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_usuarios`
--

DROP TABLE IF EXISTS `permisos_usuarios`;
CREATE TABLE `permisos_usuarios` (
  `ID` int(11) NOT NULL,
  `Modulo` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `Ver` varchar(2) COLLATE latin1_spanish_ci NOT NULL,
  `Modificar` varchar(2) COLLATE latin1_spanish_ci NOT NULL,
  `Rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `permisos_usuarios`
--

INSERT INTO `permisos_usuarios` (`ID`, `Modulo`, `Ver`, `Modificar`, `Rol`) VALUES
(1, 'Talleres', 'SI', 'SI', 2),
(2, 'Alumnos', 'SI', 'SI', 2),
(3, 'Talleres', 'SI', 'SI', 1),
(4, 'Administrativo', 'SI', 'SI', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_usuario`
--

DROP TABLE IF EXISTS `rol_usuario`;
CREATE TABLE `rol_usuario` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(40) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Descripcion` varchar(200) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `rol_usuario`
--

INSERT INTO `rol_usuario` (`ID`, `Nombre`, `Descripcion`) VALUES
(1, 'FACILITADOR', 'ROL SOLO PARA EDUCADORES'),
(2, 'ADMINISTRADOR_DB', 'PERSONAL ENCARGADO DE MODIFICAR LOS DATOS NECESARIOS PARA EL FUNCIONAMIENTO DEL SISTEMA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(250) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Usuario` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Contrasena` text COLLATE latin1_spanish_ci,
  `Rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `Nombre`, `Usuario`, `Contrasena`, `Rol`) VALUES
(1, 'MILTON LOPEZ', 'MLOPEZ', 'de55aad41a1c00bfd04629337d404bac', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `permisos_usuarios`
--
ALTER TABLE `permisos_usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `r_permisosRol` (`Rol`);

--
-- Indices de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `r_rol_user` (`Rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `permisos_usuarios`
--
ALTER TABLE `permisos_usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `permisos_usuarios`
--
ALTER TABLE `permisos_usuarios`
  ADD CONSTRAINT `r_permisosRol` FOREIGN KEY (`Rol`) REFERENCES `rol_usuario` (`ID`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `r_rol_user` FOREIGN KEY (`Rol`) REFERENCES `rol_usuario` (`ID`);


--
-- Metadatos
--
USE `phpmyadmin`;

--
-- Metadatos para la tabla permisos_usuarios
--

--
-- Metadatos para la tabla rol_usuario
--

--
-- Metadatos para la tabla usuario
--

--
-- Metadatos para la base de datos cesal
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
