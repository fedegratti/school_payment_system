-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2015 a las 07:32:22
-- Versión del servidor: 5.6.26-log
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `grupo_2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_mapper`
--

CREATE TABLE IF NOT EXISTS `auth_mapper` (
  `id` int(11) NOT NULL,
  `roleId` int(11) NOT NULL,
  `resourceId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `auth_mapper`
--

INSERT INTO `auth_mapper` (`id`, `roleId`, `resourceId`) VALUES
(8, 3, 70),
(9, 3, 62),
(10, 2, 70),
(11, 2, 62);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuration`
--

CREATE TABLE IF NOT EXISTS `configuration` (
  `id` int(11) NOT NULL,
  `configuration` text NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `configuration`
--

INSERT INTO `configuration` (`id`, `configuration`, `value`) VALUES
(2, 'siteEnabled', '1'),
(3, 'disabledSiteMessage', 'El sitio se encuentra en mantenimiento'),
(4, 'title', 'AdministrAnexa'),
(5, 'description', 'Sitio de gestion de alumnos'),
(6, 'email', 'soporte@graduada.unlp.edu.ar'),
(7, 'paginationNumber', '12');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fee`
--

INSERT INTO `fee` (`id`, `year`, `month`, `number`, `amount`, `kind`, `collectorPayment`, `createDate`, `deleted`) VALUES
(1, 1, 1, 1, '200', 1, '200', '2015-10-04', 1),
(2, 111111, 2017, 1, '1111', 0, '222', '2015-10-04', 0),
(3, 5555, 2, 1, '-2', 0, '123', '2015-10-04', 1),
(4, 2, 1111111, 2, '500', 2, '500', '2015-10-04', 1),
(5, 3333333, 33333333, 3, '33333333', 2, '333333333', '2015-10-04', 0),
(6, 1, 1, 1, '1', 0, '1', '2015-10-04', 0),
(7, 2, 3, 4, '3', 1, '12', '2015-10-05', 0),
(8, 2, 2, 5, '2', 2, '2', '2015-10-05', 0),
(9, 1, 2, 4, '123', 1, '12', '2015-10-05', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `guardian`
--

INSERT INTO `guardian` (`id`, `idUser`, `kind`, `lastName`, `firstName`, `birthDate`, `sex`, `email`, `phone`, `address`, `deleted`) VALUES
(1, 1, 1, 'Rodriguez', 'Ah re loca', '2015-10-01', 1, 'juli@asd.com', 1234, '13 e 44 y 56', 0),
(2, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(3, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(4, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(5, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(6, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(7, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(8, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(9, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(10, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(11, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(12, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(13, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(14, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(15, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(16, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(17, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(18, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(19, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(20, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(21, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(22, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(23, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(24, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(25, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(26, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(27, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(28, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(29, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(30, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(31, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(32, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(33, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(34, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(35, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(36, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(37, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(38, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(39, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(40, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(41, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(42, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(43, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(44, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(45, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(46, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(47, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(48, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(49, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(50, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(51, 0, 0, 'apellido', 'nombre', NULL, 0, 'asd@asd.com', 1234567, 'direcion re loca', 0),
(52, 0, 0, 'asd', 'asd', '0000-00-00', 0, 'asd@asd', 21323, 'asdasd', 0),
(53, 0, 0, 'zzzz', 'xxxx', '2015-10-19', 0, 's@a', 1231231, 'asdasd', 0),
(54, 0, 0, 'czxczxc', 'cxzcxzcxzc', '2015-10-19', 0, 's@a', 12312, 'xxcz', 0);

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
(1, 0, 52, 0),
(2, 2, 53, 0),
(3, 3, 6, 0),
(4, 4, 54, 0),
(5, 5, 5, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `feeId` int(11) NOT NULL,
  `grantholding` tinyint(1) NOT NULL,
  `createDate` date NOT NULL,
  `updatedDate` date DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `payment`
--

INSERT INTO `payment` (`id`, `studentId`, `feeId`, `grantholding`, `createDate`, `updatedDate`, `deleted`) VALUES
(1, 1, 1, 0, '2015-10-13', '2015-10-14', 0),
(3, 1, 6, 0, '2015-10-04', NULL, 0),
(4, 1, 4, 1, '2015-10-04', NULL, 0),
(5, 1, 3, 1, '2015-10-04', NULL, 0),
(6, 1, 2, 0, '2015-10-04', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resource`
--

CREATE TABLE IF NOT EXISTS `resource` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `resource`
--

INSERT INTO `resource` (`id`, `description`) VALUES
(48, 'showView'),
(49, 'loginView'),
(50, 'LogoutView'),
(51, 'loginAction'),
(52, 'addUserView'),
(53, 'addUserAction'),
(54, 'listUsersView'),
(55, 'updateUserView'),
(56, 'updateUserAction'),
(57, 'addStudentView'),
(58, 'addStudentAction'),
(59, 'listStudentsView'),
(60, 'listStudentsWithNameView'),
(61, 'listStudentsWithPayedEnrolmentView'),
(62, 'listAdmittedStudentsView'),
(63, 'addGuardianView'),
(64, 'addGuardianAction'),
(65, 'addFeeView'),
(66, 'addFeeAction'),
(67, 'updateFeeAction'),
(68, 'updateFeeView'),
(69, 'deleteFeeAction'),
(70, 'listFeesView'),
(71, 'listStudentFeesView'),
(72, 'payOrGrantFeeView'),
(73, 'listGuardiansView'),
(74, 'deleteGuardianAction'),
(75, 'updateGuardianView'),
(76, 'updateGuardianAction'),
(77, 'associateGuardianAction'),
(78, 'updateStudentView'),
(79, 'updateStudentAction'),
(80, 'deleteUserView'),
(81, 'deleteUserAction'),
(82, 'deleteStudentAction'),
(83, 'addConfigurationView'),
(84, 'addConfigurationAction'),
(85, 'listConfigurationsView'),
(86, 'updateConfigurationView'),
(87, 'updateConfigurationAction'),
(88, 'deleteConfigurationAction'),
(89, 'siteUnavailableView');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`id`, `description`) VALUES
(1, 'admin'),
(2, 'management'),
(3, 'ask');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL,
  `documentType` int(2) NOT NULL,
  `documentNumber` int(10) NOT NULL,
  `lastName` text COLLATE utf8_unicode_ci NOT NULL,
  `firstName` text COLLATE utf8_unicode_ci NOT NULL,
  `birthDate` date DEFAULT NULL,
  `sex` int(1) DEFAULT NULL,
  `email` text COLLATE utf8_unicode_ci,
  `address` text COLLATE utf8_unicode_ci,
  `admissionDate` date DEFAULT NULL,
  `graduationDate` date DEFAULT NULL,
  `createDate` date NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `student`
--

INSERT INTO `student` (`id`, `documentType`, `documentNumber`, `lastName`, `firstName`, `birthDate`, `sex`, `email`, `address`, `admissionDate`, `graduationDate`, `createDate`, `deleted`) VALUES
(1, 0, 1123, 'sad', 'vvvvvvvv', '2015-10-19', 0, 'asd@asd', '13 55 y 56 1139', '2015-10-13', '2015-10-13', '2015-10-03', 1),
(2, 0, 111, 's', 'rama aslkdasldkasd', '2015-10-19', 0, 'a@a', 'asdasd', '2015-10-19', '2015-10-13', '2015-10-04', 1),
(3, 0, 111, 's', 'rama', '2015-10-19', 0, 'a@a', 'asdasd', '2015-10-19', NULL, '2015-10-04', 0),
(4, 0, 5555555, 'ddddddddddddd', 'dddddddddddddd', '2015-10-19', 0, 's@a', 'asdasd', '2015-10-19', NULL, '2015-10-04', 0),
(5, 0, 213123, 'xczxc', 'muerte a juli', '2015-10-19', 0, 'ramiro_fages@hotmail.com', 'asdasdad', '2015-10-19', NULL, '2015-10-04', 0);

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
  `roleId` int(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `enabled`, `roleId`, `deleted`) VALUES
(1, 'HOLIS2', 'AQWEQWE@asd.com', 'asd', 1, 1, 0),
(2, 'hola rama ah re', 'rama@gay', 'asd', 1, 0, 0),
(4, 'asdasd', NULL, 'asd', 1, 0, 0),
(5, 'zxc', NULL, 'zxc', 1, 0, 1),
(6, 'zxczxcasd', NULL, 'asd', 1, 0, 0),
(7, 'a', NULL, '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 1, 1, 1),
(8, 'b', NULL, 'b', 1, 0, 1),
(9, 'qweqwe 222222', 'ramiro_fages@hotmail.comssssss', 'qwe', 1, 2, 0),
(10, 'asdasdsaasdasdasd', NULL, 'asd', 1, 0, 0),
(11, 'ffdd', NULL, 'dff', 1, 0, 0),
(12, 'andaaaa', NULL, 'asdasd', 1, 2, 0),
(13, 'ola k ase', NULL, 'asd', 1, 2, 0),
(14, 'nuevo', NULL, 'usuario', 1, 2, 0),
(15, 'rama', NULL, '123', 1, 2, 0),
(16, 'asd', NULL, 'f10e2821bbbea527ea02200352313bc059445190', 1, 1, 1),
(17, '321', NULL, '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', 1, 3, 0),
(18, 'pepe', 'a@a', '265392dc2782778664cc9d56c8e3cd9956661bb0', 1, 2, 0),
(19, 'carlos', 'a@a', 'ab5e2bca84933118bbc9d48ffaccce3bac4eeb64', 1, 1, 0),
(20, '555', 'a@a', '8effee409c625e1a2d8f5033631840e6ce1dcb64', 1, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auth_mapper`
--
ALTER TABLE `auth_mapper`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `role`
--
ALTER TABLE `role`
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
-- AUTO_INCREMENT de la tabla `auth_mapper`
--
ALTER TABLE `auth_mapper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `fee`
--
ALTER TABLE `fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `guardian`
--
ALTER TABLE `guardian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT de la tabla `guardian_student_relationship`
--
ALTER TABLE `guardian_student_relationship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `resource`
--
ALTER TABLE `resource`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
