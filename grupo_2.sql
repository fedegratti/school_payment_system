-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2015 a las 01:10:50
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `auth_mapper`
--

INSERT INTO `auth_mapper` (`id`, `roleId`, `resourceId`) VALUES
(12, 3, 70),
(13, 3, 62),
(14, 2, 70),
(15, 2, 62),
(16, 2, 65),
(17, 2, 66),
(18, 2, 67),
(19, 2, 68),
(20, 2, 69),
(21, 2, 70),
(22, 2, 71),
(23, 2, 72),
(24, 3, 71);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuration`
--

CREATE TABLE IF NOT EXISTS `configuration` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `configuration`
--

INSERT INTO `configuration` (`id`, `name`, `value`) VALUES
(2, 'siteEnabled', '1'),
(3, 'disabledSiteMessage', 'El sitio se encuentra en mantenimiento'),
(4, 'title', 'AdministrAnexa'),
(5, 'description', 'Sitio de gestion de alumnos2'),
(6, 'email', 'soporte@graduada.unlp.edu.ar'),
(12, 'paginationNumber', '20');

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
  `deleted` tinyint(1) NOT NULL,
  `expirationDate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fee`
--

INSERT INTO `fee` (`id`, `year`, `month`, `number`, `amount`, `kind`, `collectorPayment`, `createDate`, `deleted`, `expirationDate`) VALUES
(1, 1, 1, 1, '200', 1, '200', '2015-10-04', 1, '0000-00-00'),
(2, 111111, 2017, 4, '1111', 1, '222', '2015-10-04', 1, '0000-00-00'),
(4, 2, 1111111, 2, '500', 2, '500', '2015-10-04', 1, '0000-00-00'),
(5, 3333333, 33333333, 3, '33333333', 2, '333333333', '2015-10-04', 1, '0000-00-00'),
(7, 2, 3, 4, '3', 1, '12', '2015-10-05', 1, '0000-00-00'),
(8, 2, 2, 5, '2', 2, '2', '2015-10-05', 1, '0000-00-00'),
(9, 1, 2, 4, '123', 1, '12', '2015-10-05', 1, '0000-00-00'),
(10, 2011, 12, 4, '200', 2, '300', '2015-10-05', 1, '0000-00-00'),
(11, 21, 21, 1, '121', 1, '12', '2015-10-05', 1, '0000-00-00'),
(12, 1, 1, 1, '1', 1, '1', '2015-10-07', 0, '2016-05-14'),
(13, 2444, 1, 3, '321', 2, '123', '2015-06-15', 0, '2014-12-15'),
(14, 2010, 5, 1, '500', 2, '200', '2015-10-08', 1, '0000-00-00'),
(15, 2016, 1, 1, '6666', 2, '66', '2015-10-08', 0, '2015-11-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guardian`
--

CREATE TABLE IF NOT EXISTS `guardian` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `kind` int(1) NOT NULL,
  `lastName` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `firstName` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `birthDate` date DEFAULT NULL,
  `sex` int(1) DEFAULT NULL,
  `email` mediumtext COLLATE utf8_unicode_ci,
  `phone` int(20) DEFAULT NULL,
  `address` mediumtext COLLATE utf8_unicode_ci,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `guardian`
--

INSERT INTO `guardian` (`id`, `userId`, `kind`, `lastName`, `firstName`, `birthDate`, `sex`, `email`, `phone`, `address`, `deleted`) VALUES
(59, 37, 1, 'Gratti', 'Oscar', '1965-08-14', 0, 'oscargratti@gmail.com', 2147483647, '13 55 y 56 1139', 0),
(60, 42, 0, 'Lopez', 'Maria', '1965-12-12', 0, 'marialopez@gmail.com', 2147483647, '5 y 45', 0),
(61, 43, 0, 'VuanMadre', 'JuliMadre', '1890-04-12', 1, 'mamadejuli@gmail.com', 2346534, 'citi bell 2', 0),
(62, 22, 0, '123123', '123123', '2000-02-02', 0, 'a@a', 1231231, 'sasdasd', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guardian_student_relationship`
--

CREATE TABLE IF NOT EXISTS `guardian_student_relationship` (
  `id` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `guardianId` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `guardian_student_relationship`
--

INSERT INTO `guardian_student_relationship` (`id`, `studentId`, `guardianId`, `deleted`) VALUES
(12, 12, 62, 0),
(14, 15, 62, 0),
(15, 16, 59, 0),
(16, 17, 62, 0),
(17, 9, 59, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `payment`
--

INSERT INTO `payment` (`id`, `studentId`, `feeId`, `grantholding`, `createDate`, `updatedDate`, `deleted`) VALUES
(20, 21, 15, 0, '2015-10-09', NULL, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `student`
--

INSERT INTO `student` (`id`, `documentType`, `documentNumber`, `lastName`, `firstName`, `birthDate`, `sex`, `email`, `address`, `admissionDate`, `graduationDate`, `createDate`, `deleted`) VALUES
(9, 0, 35610136, 'Gratti', 'Federico', '1990-09-20', 0, 'federicogratti@gmail.com', '13 55 y 56 1139', NULL, NULL, '2015-10-07', 0),
(10, 0, 24542748, 'Gomez', 'Adrian', '1995-08-17', 0, 'adriangomez@hotmail.com', '3 y 65 n 1456', '2015-01-01', '0000-00-00', '2015-10-07', 0),
(11, 0, 123456789, 'Santo Domingo', 'Academia', '2000-10-19', 0, 'asd@gmail.com', '1231231', NULL, NULL, '2015-10-07', 1),
(14, 0, 123, '123', '123', '2000-10-19', 1, 's@a', 'asdasd', NULL, NULL, '2015-10-08', 1),
(15, 0, 123, '123', '123', '2000-10-19', 1, 's@a', 'asdasd', NULL, NULL, '2015-10-08', 0),
(16, 0, 12543542, 'Sole', 'Eugenia', '1991-02-13', 1, 'eugeacdc@gmail.com', '133 y 40', NULL, NULL, '2015-10-08', 0),
(17, 0, 123123123, '123', 'asd', '3123-12-12', 0, 'asd@asd', 'aasd', NULL, NULL, '2015-10-08', 0),
(18, 0, 123, '12123', '213', '0000-00-00', 1, 'asd@asd', '1', NULL, NULL, '2015-10-08', 0),
(19, 0, 123, 'asd', 'saqe', '0123-03-12', 0, 'asd@asd', 'aasd', NULL, NULL, '2015-10-08', 0),
(20, 0, 321432, 'sdffd', 'sdfdsf', '4234-03-21', 1, 'support@graduada.unlp.edu.ar', '36 N 1004 e/ 15 y 16', NULL, NULL, '2015-10-08', 0),
(21, 1, 123, 'python', 'python', '2000-02-02', 0, 'a@a', 'sasdasd', '2015-01-01', '0000-00-00', '2015-10-08', 0),
(22, 0, 123, 'python', 'python', '2000-02-02', 0, 'a@a', 'asd', NULL, NULL, '2015-10-08', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `enabled`, `roleId`, `deleted`) VALUES
(21, 'admin', 'support@graduada.unlp.edu.ar', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 1, 0),
(22, 'consulta', 'consulta@graduada.unlp.edu.ar', 'b71deb9fd5e102295b64777fc8806019b9965813', 1, 3, 0),
(23, 'gestion', 'gestion@graduada.unlp.edu.ar', 'e66bb2fabbe7b86def4cb857aa62748ce7880394', 1, 2, 0),
(36, 'roberto', 'asd@asd', 'f10e2821bbbea527ea02200352313bc059445190', 0, 1, 1),
(37, 'robert', 'asd@asd', 'f10e2821bbbea527ea02200352313bc059445190', 0, 2, 0),
(38, 'julijuli', 'julietavuan@hotmail.com', 'a6463b105fa5c97ebb5ff2d149d05a9ba36229ab', 1, 3, 0),
(39, 'jose', 'asd@asd', '4a3487e57d90e2084654b6d23937e75af5c8ee55', 1, 3, 1),
(40, 'cc', 'asd@asd', 'f10e2821bbbea527ea02200352313bc059445190', 1, 2, 1),
(41, 'Python', 'python@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 3, 1),
(42, 'asd', 'asd@asd', 'f10e2821bbbea527ea02200352313bc059445190', 1, 3, 0),
(43, 'ramona', 'asd@asd', '85136c79cbf9fe36bb9d05d0639c70c265c18d37', 0, 3, 0),
(45, 'ruby', 'ruby@ruby.gmail', 'f10e2821bbbea527ea02200352313bc059445190', 0, 2, 1),
(46, 'asdasdas', 'a@a', '8ecd6dbce7b43ea44efa845b50072f23ad621e78', 1, 3, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `fee`
--
ALTER TABLE `fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `guardian`
--
ALTER TABLE `guardian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT de la tabla `guardian_student_relationship`
--
ALTER TABLE `guardian_student_relationship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
