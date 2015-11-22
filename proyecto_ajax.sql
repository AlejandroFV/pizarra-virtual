-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2015 a las 20:33:24
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

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
-- Estructura de tabla para la tabla `given_answers`
--

CREATE TABLE IF NOT EXISTS `given_answers` (
`id_answer` int(11) NOT NULL,
  `equation` varchar(45) NOT NULL,
  `user` varchar(255) NOT NULL,
  `answer` varchar(45) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

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
('(x+4)^2', 'x^2+8x+8', 'Esta mal', 1),
('(x+4)^2', 'x^2+8x+8', 'Esta mal', 1);

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
-- Indices de la tabla `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`id_user`), ADD KEY `id_user` (`id_user`), ADD KEY `id_user_2` (`id_user`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `given_answers`
--
ALTER TABLE `given_answers`
MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

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
