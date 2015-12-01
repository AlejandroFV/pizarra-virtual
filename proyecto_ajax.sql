-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2015 a las 17:56:39
-- Versión del servidor: 5.5.39
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto_ajax`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equations`
--

CREATE TABLE IF NOT EXISTS `equations` (
  `equation` varchar(45) NOT NULL,
  `answer` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `equations`
--

INSERT INTO `equations` (`equation`, `answer`) VALUES
('(x+1)^2', 'x^2+2x+1'),
('(x+2)^2', 'x^2+4x+4'),
('(x+3)^2', 'x^2+6x+9'),
('(x+4)^2', 'x^2+8x+16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expressions`
--

CREATE TABLE IF NOT EXISTS `expressions` (
`id` int(20) NOT NULL,
  `expression` varchar(200) CHARACTER SET utf32 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `expressions`
--

INSERT INTO `expressions` (`id`, `expression`) VALUES
(1, 'Productos notables');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expressions_types`
--

CREATE TABLE IF NOT EXISTS `expressions_types` (
`id` int(11) NOT NULL,
  `id_expression` int(11) NOT NULL,
  `expression_type` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `expressions_types`
--

INSERT INTO `expressions_types` (`id`, `id_expression`, `expression_type`) VALUES
(1, 1, 'Binomio al cuadrado'),
(2, 1, 'Binomio al cubo'),
(3, 1, 'Binomios conjugados'),
(4, 1, 'Binomios con término común'),
(5, 1, 'Binomios con término semejante'),
(6, 1, 'Binomio por trinomio'),
(7, 1, 'Trinomio al cuadrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `given_answers`
--

CREATE TABLE IF NOT EXISTS `given_answers` (
`id_answer` int(11) NOT NULL,
  `equation` varchar(45) NOT NULL,
  `user` varchar(255) NOT NULL,
  `answer` varchar(45) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `given_answers`
--

INSERT INTO `given_answers` (`id_answer`, `equation`, `user`, `answer`) VALUES
(8, '(x+1)^2', '001', 'x^2+2x+1'),
(9, '(x+2)^2', '001', 'x^2+4x+4'),
(10, '(x+3)^2', '001', 'x^2+6x+9'),
(11, '(x+4)^2', '001', 'x^2+8x+8'),
(12, '(x+1)^2', '001', 'x^2+2x+1'),
(13, '(x+2)^2', '001', 'x^2+4x+4'),
(14, '(x+3)^2', '001', 'x^2+6x+9'),
(15, '(x+4)^2', '001', 'x^2+8x+8'),
(16, '(x+1)^2', '001', 'x^2+2x+1'),
(17, '(x+2)^2', '001', 'x^2+4x+4'),
(18, '(x+3)^2', '001', 'x^2+6x+9'),
(19, '(x+4)^2', '001', 'x^2+8x+8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likely_answers`
--

CREATE TABLE IF NOT EXISTS `likely_answers` (
  `equation` varchar(45) NOT NULL,
  `likely_answer` varchar(45) NOT NULL,
  `message` varchar(45) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `likely_answers`
--

INSERT INTO `likely_answers` (`equation`, `likely_answer`, `message`, `count`) VALUES
('(x+1)^2', '', '', 0),
('(x+2)^2', 'x^2+2x+4', 'Checa el 2do termino', 0),
('(x+3)^2', 'x^2+2x+4', 'Esta mal', 0),
('(x+4)^2', 'x^2+8x+8', 'Esta mal', 4),
('(x+4)^2', 'x^2+8x+8', 'Esta mal', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messege`
--

CREATE TABLE IF NOT EXISTS `messege` (
`id` int(10) unsigned NOT NULL,
  `user` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `messege` text COLLATE utf8_unicode_ci NOT NULL,
  `group` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id_user` varchar(255) NOT NULL,
  `specialty` varchar(255) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `group` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `student`
--

INSERT INTO `student` (`id_user`, `specialty`, `latitude`, `longitude`, `group`) VALUES
('001', 'lis', 666, 666, '3'),
('123', 'LIS', -333.444, 1111.22, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_file_uploads`
--

CREATE TABLE IF NOT EXISTS `tbl_file_uploads` (
`id` int(10) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `size` int(11) NOT NULL,
  `workgroup` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `password`, `name`, `last_name`, `email`, `gender`, `role`) VALUES
('001', '001', 'carlos', 'Araujo', 'carlos943@gmail.com', 'hombre', 'alumno'),
('123', 'hola', 'luis', 'perez', 'luis@gmail.com', 'mujer', 'alumno'),
('321', 'admin', 'admin', 'admin', 'admin@gmail.com', 'hombre', 'admin'),
('456', 'hola', 'tutor', 'tutor', 'tutor@gmail.com', 'mujer', 'tutor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equations`
--
ALTER TABLE `equations`
 ADD PRIMARY KEY (`equation`);

--
-- Indices de la tabla `expressions`
--
ALTER TABLE `expressions`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `expressions_types`
--
ALTER TABLE `expressions_types`
 ADD PRIMARY KEY (`id`), ADD KEY `indice` (`id_expression`) COMMENT 'Restriccion del tipo de expresion con la expresion';

--
-- Indices de la tabla `given_answers`
--
ALTER TABLE `given_answers`
 ADD PRIMARY KEY (`id_answer`), ADD KEY `producto_notable_idx` (`equation`), ADD KEY `usuario_idx` (`user`);

--
-- Indices de la tabla `likely_answers`
--
ALTER TABLE `likely_answers`
 ADD KEY `producto_notable_idx` (`equation`);

--
-- Indices de la tabla `messege`
--
ALTER TABLE `messege`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`id_user`), ADD KEY `id_user` (`id_user`), ADD KEY `id_user_2` (`id_user`);

--
-- Indices de la tabla `tbl_file_uploads`
--
ALTER TABLE `tbl_file_uploads`
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
-- AUTO_INCREMENT de la tabla `expressions`
--
ALTER TABLE `expressions`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `expressions_types`
--
ALTER TABLE `expressions_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `given_answers`
--
ALTER TABLE `given_answers`
MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `messege`
--
ALTER TABLE `messege`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_file_uploads`
--
ALTER TABLE `tbl_file_uploads`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `expressions_types`
--
ALTER TABLE `expressions_types`
ADD CONSTRAINT `expressionRestriction` FOREIGN KEY (`id_expression`) REFERENCES `expressions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `given_answers`
--
ALTER TABLE `given_answers`
ADD CONSTRAINT `fk_equation` FOREIGN KEY (`equation`) REFERENCES `equations` (`equation`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_user` FOREIGN KEY (`user`) REFERENCES `student` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `likely_answers`
--
ALTER TABLE `likely_answers`
ADD CONSTRAINT `fk_eq` FOREIGN KEY (`equation`) REFERENCES `equations` (`equation`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `student`
--
ALTER TABLE `student`
ADD CONSTRAINT `fk_id_user_student_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
