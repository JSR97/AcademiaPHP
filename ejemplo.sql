-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2020 a las 16:25:34
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
-- Base de datos: `ejemplo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `expediente` char(5) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `usuario` varchar(10) NOT NULL,
  `clave` varchar(8) NOT NULL,
  `f_nac` date DEFAULT NULL,
  `origen` varchar(20) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `observaciones` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`expediente`, `nombre`, `usuario`, `clave`, `f_nac`, `origen`, `email`, `observaciones`) VALUES
('00001', 'Esteban FDEZfghfh', 'este', 'efo', '2012-11-11', 'Nacional', 'af@hotmail.eshjfh', 'Afc'),
('00045', 'Mari', 'mm', 'mm', '1948-04-01', '', 'afermosoga@upsa.es', ''),
('005', 'nicolasa perez', 'nicol', '123', '1971-01-01', 'Regional', 'nicol@gmail.com', 'pruena 1'),
('01223', 'otro', 'otro', 'otro', '0000-00-00', 'SALAMANCA', '0', ''),
('0234', 'maria', '', '', '0000-00-00', 'zamora', '0', ''),
('0887', 'JOQUIN', 'JJ', 'JQ', '0000-00-00', 'Nacional', 'GGJJ@GMAIL.COM', 'DKFH'),
('09876', 'Ana', '', '', '0000-00-00', 'Zamora', '0', ''),
('09877', 'qsxqs', 'AFG', '123', '2015-02-05', 'Regional', 'jasfxrmsjrtf@gmail.com', ''),
('11111', 'Maria', '', '', '2011-04-01', 'Salamanca', '0', ''),
('12323', '123', 'wesr', '123', '0000-00-00', 'Salamanca', '', ''),
('12343', 'ah', '', '', '0000-00-00', 'zamora', '0', ''),
('12344', 'ah', '', '', '0000-00-00', 'zamora', '0', ''),
('12345', 'Nuri', 'nuri', 'nr', '1973-10-29', 'Madrid', '0', ''),
('1356', 'ge', '', '', '0000-00-00', 'ert', '0', ''),
('1456', 's', '', '', '0000-00-00', 'a', '0', ''),
('1459', 's', '', '', '0000-00-00', 'a', '0', ''),
('1523', 'h mwtrd', '', '', '2000-03-05', 'Regional', 'e3wr', 'ewdew'),
('1789', 'pepito grillo ggddf', 'pp', '1234', '2006-03-05', 'Regional', 'ppxx@jja.es', 'prueba xfxzgasfd\r\njytfgd,uyw\r\niywqwieut\r\nkuwqyf'),
('1820', 'LOLA', 'lolita', 'lola', '2013-09-04', NULL, 'lola@gmail.com', 'Metiodo a pelo...'),
('1821', 'LOLA', 'lolita', 'lola', '2013-09-04', 'Madrid', 'lola@gmail.com', 'Metiodo a pelo...'),
('1822', 'LOLA', 'lolita', 'lola', '2013-09-04', 'Madrid', 'lolgmail.com', 'Metiodo a pelo...'),
('1823', NULL, 'lolita', 'lola', '2013-09-04', 'Madrid', 'lolgmail.com', 'Metiodo a pelo...'),
('1824', 'LOLA', 'lolita', 'lola', '2013-09-04', 'Madrid', 'lolgmail.com', 'Metiodo a pelo...'),
('18543', 'afg', '', '', '2000-03-05', 'Regional', '', ''),
('2501', 'LOLA', 'lolita', 'lola', '2013-09-05', 'Madrid', 'lolgmail.com', 'Metiodo a pelo...'),
('25435', '\"nombre\"', '', '', '2000-03-05', 'Extranjera', 'afermosoga@upsa.es', 'Esto es la _\"prueba de las comillas\" y estas son las \' simple\'.\r\nAdios'),
('3122', 'q', '', '', '0000-00-00', 'Nacional', 'ngq', 'qj,'),
('4562', 'perico', 'palotes', 'pal', '1967-12-13', 'nacional', 'palotes@gmail.com', 'prueba perico palotes rest'),
('4566', 'perico', 'palotes', 'pal', '1967-12-13', 'nacional', 'palotes@gmail.com', 'prueba perico palotes rest'),
('5678', 'PP', '', '', '0000-00-00', 'SALAMANCA', '0', ''),
('6096', 'rodrigo', '', '', '1999-05-25', 'valladolid', '0', ''),
('6243', 'rwetr', '', '', '2000-03-05', 'Regional', 'grt', 'trghr'),
('6324', 'kk', 'kk', 'kk', '0000-00-00', 'Salamanca', 'kk@upsa.es', 'rest'),
('6480', 'Godofredo', 'Godo', 'GDF', '0000-00-00', 'Salamanca', 'godo@hotmail.com', 'HTK JYK'),
('666', 'toribio', 'tori', '34', '2001-03-05', 'Extranjera', 'tori@gmail.es', 'ejremplo toribio'),
('66666', 'Julia Rguez', 'JR', 'JR', '1969-03-03', 'Nacional', 'gd@pp.es', ''),
('6780', 'nicolasa', 'nicol', '111', '1940-03-13', 'Nacional', 'nicol@gmail.com', 'tyu'),
('7054', 'MERCEDES', 'MERCE', '45', '2006-03-05', 'Salamanca', 'merce@gmail.com', 'estea es merceces'),
('77777', 'Jorge Pérez', 'jorge', 'jorge', '2007-03-04', 'Nacional', 'jorge@mail.es', 'qdw'),
('8234', 'juan', '', '', '0000-00-00', 'madrid', '0', ''),
('8354', 'PEDRO', 'PEDRO', 'PEDRO', '0000-00-00', 'Salamanca', 'pedro@upsa.es', 'sxd'),
('85309', 'pp', '', '', '0000-00-00', 'barcelona', '0', ''),
('8723', 'luis', 'lui', '134', '2005-12-12', 'Salamanca', 'lui2@gail.com', 'a pelo'),
('8881', 'laura', 'la', 'abc12', '2006-03-13', 'Salamanca', 'lar@gmail.com', 'prueba rest'),
('8889', 'laura', 'la', 'abc12', '2006-03-13', 'Salamanca', 'lar@gmail.com', 'prueba rest'),
('89065', 'dm', '', '', '0000-00-00', 'valladolid', '0', ''),
('9011', 'Godofredo', 'Godo', 'gdf', '0000-00-00', '', 'godo@hotmail.com', 'fcdgfdc yct dcyt w'),
('90876', 'symfony', 'sym', 'ssss', '2009-07-04', 'local', 'af@hotmail.com', 'fdf'),
('9834', 'agh', '', '', '2000-03-05', 'Nacional', 'ja@sfg.x', 'esms ydtwkuay rwakuyrt wkyrtwlu rw,erwuleytr wekyrkuyrt wekyurt.\r\nuyukwe riuy weyrw iuyer luewrliytwe  l7ter ytreu ewluty dwek .\r\nj.yftde ulry'),
('987', '', '', '', '0000-00-00', 'Salamanca', '', ''),
('99888', 'lucia', 'lrf', 'lrf', '2006-03-13', 'Nacional', 'lrf@hotmail.com', 'niña'),
('999', 'lucia', 'luciarf', 'lrf', '2006-03-13', 'Salamanca', 'lrf@hormail.com', 'una observación sobre lucia'),
('DWG', 'RTE', '', '', '0000-00-00', 'Regional', '', ''),
('sad', '', '', '', '0000-00-00', 'Salamanca', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `cod_asig` int(10) NOT NULL,
  `nom_asig` varchar(20) NOT NULL,
  `creditos` int(10) NOT NULL,
  `curso` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`cod_asig`, `nom_asig`, `creditos`, `curso`) VALUES
(1, 'Programacion', 6, 1),
(2, 'Ingenieria del softw', 8, 3),
(3, 'Redes', 6, 3),
(4, 'Estadística', 6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

CREATE TABLE `matriculas` (
  `expediente` varchar(5) NOT NULL,
  `cod_asig` int(10) NOT NULL,
  `calificacion` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `matriculas`
--

INSERT INTO `matriculas` (`expediente`, `cod_asig`, `calificacion`) VALUES
('00001', 1, '5.60'),
('00001', 3, '8.50'),
('00045', 1, '5.30'),
('00045', 3, '7.40'),
('005', 1, '6.80'),
('005', 2, '5.60'),
('005', 3, '8.00'),
('01223', 1, '8.00'),
('01223', 2, '2.40'),
('01223', 3, '5.25'),
('09876', 1, '2.60'),
('09876', 2, '9.40'),
('12345', 1, '7.00'),
('1789', 1, '8.30'),
('1789', 3, '5.00'),
('66666', 2, '9.00'),
('77777', 2, '9.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`expediente`);

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`cod_asig`);

--
-- Indices de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`expediente`,`cod_asig`),
  ADD KEY `cod_asig` (`cod_asig`),
  ADD KEY `exp` (`expediente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `cod_asig` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `matriculas_ibfk_1` FOREIGN KEY (`expediente`) REFERENCES `alumnos` (`expediente`),
  ADD CONSTRAINT `matriculas_ibfk_2` FOREIGN KEY (`cod_asig`) REFERENCES `asignaturas` (`cod_asig`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
