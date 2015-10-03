-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2015 a las 01:24:00
-- Versión del servidor: 5.6.21-log
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `grupo_2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_mapper`
--

CREATE TABLE IF NOT EXISTS `auth_mapper` (
  `id` int(11) NOT NULL,
  `idRole` int(11) NOT NULL,
  `idResource` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuration`
--

CREATE TABLE IF NOT EXISTS `configuration` (
`keyValue` int(11) NOT NULL,
  `numberValue` int(50) DEFAULT NULL,
  `textValue` mediumtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fee`
--

CREATE TABLE IF NOT EXISTS `fee` (
`id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `kind` int(11) NOT NULL,
  `collectorPayment` decimal(10,0) NOT NULL,
  `createDate` date DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fee`
--

INSERT INTO `fee` (`id`, `year`, `month`, `number`, `amount`, `kind`, `collectorPayment`, `createDate`, `deleted`) VALUES
(1, 2, 2015, 2, '2', 0, '2', '2015-10-03', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guardian`
--

CREATE TABLE IF NOT EXISTS `guardian` (
`id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `kind` int(1) NOT NULL,
  `lastName` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `firstName` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `birthDate` date DEFAULT NULL,
  `sex` int(1) DEFAULT NULL,
  `email` mediumtext COLLATE utf8_unicode_ci,
  `phone` int(20) DEFAULT NULL,
  `address` mediumtext COLLATE utf8_unicode_ci,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `guardian`
--

INSERT INTO `guardian` (`id`, `idUser`, `kind`, `lastName`, `firstName`, `birthDate`, `sex`, `email`, `phone`, `address`, `deleted`) VALUES
(1, 0, 0, 'a', 'a', '0002-02-02', 0, 'ASD@ERT.COM', 2, 'a', 0),
(2, 0, 0, 'juana', 'juana', '0002-02-02', 0, 'az@hotmail.com', 2, 'a', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guardian_student_relationship`
--

CREATE TABLE IF NOT EXISTS `guardian_student_relationship` (
`id` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `guardianId` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `guardian_student_relationship`
--

INSERT INTO `guardian_student_relationship` (`id`, `studentId`, `guardianId`, `deleted`) VALUES
(1, 0, 0, 0),
(2, 0, 1, 0),
(3, 0, 2, 0),
(4, 0, 1, 0),
(5, 0, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
`id` int(11) NOT NULL,
  `idStudent` int(11) NOT NULL,
  `idFee` int(11) NOT NULL,
  `date` date NOT NULL,
  `grantholding` tinyint(1) NOT NULL,
  `fechaAlta` date NOT NULL,
  `fechaActualizado` date DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resource`
--

CREATE TABLE IF NOT EXISTS `resource` (
`id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `resource`
--

INSERT INTO `resource` (`id`, `description`) VALUES
(1, 'showView'),
(2, 'addFeeView'),
(3, 'showView'),
(4, 'addFeeView'),
(5, 'addFeeAction'),
(6, 'addGuardianView'),
(7, 'addGuardianAction'),
(8, 'listGuardiansView'),
(9, 'associateGuardianAction'),
(10, 'addStudentView'),
(11, 'addStudentAction'),
(12, 'listStudentsView'),
(13, 'listStudentsWithNameView'),
(14, 'updateStudentAction'),
(15, 'deleteStudentAction'),
(16, 'addUserView('),
(17, 'addUserAction'),
(18, 'listUsersView'),
(19, 'updateUserView'),
(20, 'updateUserAction'),
(21, 'deleteUserView'),
(22, 'deleteUserAction');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`id` int(11) NOT NULL,
  `documentType` int(2) NOT NULL,
  `documentNumber` int(10) NOT NULL,
  `lastName` text COLLATE utf8_unicode_ci NOT NULL,
  `fisrtName` text COLLATE utf8_unicode_ci NOT NULL,
  `birthDate` date DEFAULT NULL,
  `sex` int(1) DEFAULT NULL,
  `email` text COLLATE utf8_unicode_ci,
  `address` text COLLATE utf8_unicode_ci,
  `admissionDate` date DEFAULT NULL,
  `graduationDate` date DEFAULT NULL,
  `createDate` date NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `student`
--

INSERT INTO `student` (`id`, `documentType`, `documentNumber`, `lastName`, `fisrtName`, `birthDate`, `sex`, `email`, `address`, `admissionDate`, `graduationDate`, `createDate`, `deleted`) VALUES
(1, 0, 1123, 'sad', 'asd', '2015-10-06', 0, 'asd@asd', '13 55 y 56 1139', '2015-10-13', NULL, '2015-10-03', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci,
  `password` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `role` int(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `enabled`, `role`, `deleted`) VALUES
(1, 'HOLIS', 'AQWEQWE@asd.com', 'asd', 1, 1, 1),
(2, 'hola rama ah re', 'rama@gay', 'asd', 1, 0, 0),
(3, 'asds', NULL, 'f10e2821bbbea527ea02200352313bc059445190', 1, 0, 0),
(4, 'asdasd', NULL, 'asd', 1, 0, 0),
(5, 'zxc', NULL, 'zxc', 1, 0, 0),
(6, 'zxczxcasd', NULL, 'asd', 1, 0, 0),
(7, 'a', NULL, 'a', 1, 0, 0),
(8, 'b', NULL, 'b', 1, 0, 0),
(9, 'qweqwe', NULL, 'qwe', 1, 0, 0),
(10, 'asdasdsaasdasdasd', NULL, 'asd', 1, 0, 0),
(11, 'ffdd', NULL, 'dff', 1, 0, 0),
(12, 'andaaaa', NULL, 'asdasd', 1, 2, 0),
(13, 'sd', NULL, 'jh', 1, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `configuration`
--
ALTER TABLE `configuration`
 ADD PRIMARY KEY (`keyValue`);

--
-- Indices de la tabla `fee`
--
ALTER TABLE `fee`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `guardian`
--
ALTER TABLE `guardian`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `guardian_student_relationship`
--
ALTER TABLE `guardian_student_relationship`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `payment`
--
ALTER TABLE `payment`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resource`
--
ALTER TABLE `resource`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `configuration`
--
ALTER TABLE `configuration`
MODIFY `keyValue` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `fee`
--
ALTER TABLE `fee`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `guardian`
--
ALTER TABLE `guardian`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `guardian_student_relationship`
--
ALTER TABLE `guardian_student_relationship`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `payment`
--
ALTER TABLE `payment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `resource`
--
ALTER TABLE `resource`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `student`
--
ALTER TABLE `student`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
