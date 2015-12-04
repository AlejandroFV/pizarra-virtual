-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2015 at 07:06 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyecto_ajax`
--

-- --------------------------------------------------------

--
-- Table structure for table `equations`
--

CREATE TABLE `equations` (
  `equation` varchar(45) NOT NULL,
  `answer` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equations`
--

INSERT INTO `equations` (`equation`, `answer`) VALUES
('(a+1)^2', 'a^2+2a+1'),
('(a+3)^2', 'a^2+6a+9'),
('(a+4)^2', 'a^2+8a+16'),
('(a+5)^2', 'a^2+10a+25'),
('(i+1)^2', 'i^2+2i+1'),
('(i+3)^2', 'i^2+6i+9'),
('(i+4)^2', 'i^2+8i+16'),
('(i+5)^2', 'i^2+10i+25'),
('(m+1)^2', 'm^2+2m+1'),
('(m+3)^2', 'm^2+6m+9'),
('(m+4)^2', 'm^2+8m+16'),
('(m+5)^2', 'm^2+10m+25'),
('(x+1)^2', 'x^2+2x+1'),
('(x+3)^2', 'x^2+6x+9'),
('(x+4)^2', 'x^2+8x+16'),
('(x+5)^2', 'x^2+10x+25');

-- --------------------------------------------------------

--
-- Table structure for table `expressions`
--

CREATE TABLE `expressions` (
  `id` int(20) NOT NULL,
  `expression` varchar(200) CHARACTER SET utf32 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expressions`
--

INSERT INTO `expressions` (`id`, `expression`) VALUES
(1, 'Productos notables');

-- --------------------------------------------------------

--
-- Table structure for table `expressions_types`
--

CREATE TABLE `expressions_types` (
  `id` int(11) NOT NULL,
  `id_expression` int(11) NOT NULL,
  `expression_type` varchar(200) NOT NULL
) COMMENT='Restriccion del tipo de expresion con la expresion';

--
-- Dumping data for table `expressions_types`
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
-- Table structure for table `given_answers`
--

CREATE TABLE `given_answers` (
  `id_answer` int(11) NOT NULL,
  `equation` varchar(45) NOT NULL,
  `user` varchar(45) NOT NULL,
  `answer` varchar(45) NOT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `given_answers`
--

INSERT INTO `given_answers` (`id_answer`, `equation`, `user`, `answer`, `attempts`) VALUES
(1, '(m+1)^2', '001', 'm^2+2m+1', 7);

-- --------------------------------------------------------

--
-- Table structure for table `group_equation`
--

CREATE TABLE `group_equation` (
  `equation` varchar(45) NOT NULL,
  `group` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_equation`
--

INSERT INTO `group_equation` (`equation`, `group`) VALUES
('(a+1)^2', '1'),
('(i+1)^2', '2'),
('(m+1)^2', '3'),
('(x+1)^2', '5');

-- --------------------------------------------------------

--
-- Table structure for table `likely_answers`
--

CREATE TABLE `likely_answers` (
  `equation` varchar(45) NOT NULL,
  `likely_answer` varchar(45) NOT NULL,
  `message` varchar(45) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likely_answers`
--

INSERT INTO `likely_answers` (`equation`, `likely_answer`, `message`, `count`) VALUES
('(a+1)^2', 'a^2+2a+2', 'Esta mal', 0),
('(i+1)^2', 'i^2+2i+2', 'Esta mal', 0),
('(m+1)^2', 'm^2+2m+2', 'Esta mal', 0),
('(x+1)^2', 'x^2+2x+2', 'Esta mal', 0),
('(a+3)^2', 'a^2+2a+4', 'Esta mal', 0),
('(i+3)^2', 'i^2+2i+4', 'Esta mal', 0),
('(m+3)^2', 'm^2+2m+4', 'Esta mal', 0),
('(x+3)^2', 'x^2+2x+4', 'Esta mal', 0),
('(a+5)^2', 'a^2+10a+20', 'maaal', 0),
('(i+5)^2', 'i^2+10i+20', 'maaal', 0),
('(m+5)^2', 'm^2+10m+20', 'maaal', 0),
('(x+5)^2', 'x^2+10x+20', 'maaal', 0),
('(a+4)^2', 'a^2+8a+8', 'Esta mal', 0),
('(i+4)^2', 'i^2+8i+8', 'Esta mal', 0),
('(m+4)^2', 'm^2+8m+8', 'Esta mal', 0),
('(x+4)^2', 'x^2+8x+8', 'Esta mal', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messege`
--

CREATE TABLE `messege` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `messege` text COLLATE utf8_unicode_ci NOT NULL,
  `group` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messege`
--

INSERT INTO `messege` (`id`, `user`, `messege`, `group`) VALUES
(5, 'Alum', 'hola ', 1),
(6, 'carlos', 'holaaa ', 1),
(7, 'Alum', 'hey ', 1),
(8, 'Alum', 'hhhhh ', 1),
(9, 'Alum', 'hhh ', 1),
(10, 'Alum', 'neee ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `metrics`
--

CREATE TABLE `metrics` (
  `id` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `dateMetric` date NOT NULL,
  `expression` varchar(200) NOT NULL,
  `expressionType` varchar(200) NOT NULL,
  `numMistakes` int(11) NOT NULL,
  `mistakes` text NOT NULL,
  `frequency` text NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id_user` varchar(255) NOT NULL,
  `specialty` varchar(255) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `group` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id_user`, `specialty`, `latitude`, `longitude`, `group`) VALUES
('001', 'lis', 666, 666, '3'),
('002', 'lis', 0, 0, '2'),
('003', 'lis', 777, 777, '1'),
('004', 'lis', 0, 0, '1'),
('005', 'lis', 0, 0, '5'),
('122', 'lis', 8888, 8888, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file_uploads`
--

CREATE TABLE `tbl_file_uploads` (
  `id` int(10) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `size` int(11) NOT NULL,
  `workgroup` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_file_uploads`
--

INSERT INTO `tbl_file_uploads` (`id`, `file`, `type`, `size`, `workgroup`) VALUES
(8, 'ej1', 'pdf', 192, 4),
(7, 'IEEE830_esp', 'pdf', 80, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `name`, `last_name`, `email`, `gender`, `role`) VALUES
('001', '001', 'carlos', 'Araujo', 'carlos943@gmail.com', 'hombre', 'alumno'),
('002', '002', 'Alum', 'Alum', 'carlos943@gmail.com', 'hombre', 'alumno'),
('003', '003', 'Alum', 'Alum', 'carlos943@gmail.com', 'hombre', 'alumno'),
('004', '004', 'Alum', 'Alum4', 'carlos943@gmail.com', 'hombre', 'alumno'),
('005', '005', 'Alum', 'Alum5', 'carlos943@gmail.com', 'hombre', 'alumno'),
('122', '0001', 'alejandro', 'sumarraga', 'carlos943@gmail.com', 'hombre', 'alumno'),
('321', 'admin', 'admin', 'admin', 'admin@gmail.com', 'hombre', 'admin'),
('456', '0001', 'carlos', 'tutorrr', 'carlos943@gmail.com', 'hombre', 'tutor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equations`
--
ALTER TABLE `equations`
  ADD PRIMARY KEY (`equation`);

--
-- Indexes for table `expressions`
--
ALTER TABLE `expressions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expressions_types`
--
ALTER TABLE `expressions_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indice` (`id_expression`);

--
-- Indexes for table `given_answers`
--
ALTER TABLE `given_answers`
  ADD PRIMARY KEY (`id_answer`),
  ADD KEY `producto_notable_idx` (`equation`),
  ADD KEY `usuario_idx` (`user`);

--
-- Indexes for table `group_equation`
--
ALTER TABLE `group_equation`
  ADD PRIMARY KEY (`equation`,`group`),
  ADD KEY `fk_equation_idx` (`equation`);

--
-- Indexes for table `likely_answers`
--
ALTER TABLE `likely_answers`
  ADD KEY `producto_notable_idx` (`equation`);

--
-- Indexes for table `messege`
--
ALTER TABLE `messege`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metrics`
--
ALTER TABLE `metrics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `tbl_file_uploads`
--
ALTER TABLE `tbl_file_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expressions`
--
ALTER TABLE `expressions`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `expressions_types`
--
ALTER TABLE `expressions_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `given_answers`
--
ALTER TABLE `given_answers`
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `messege`
--
ALTER TABLE `messege`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `metrics`
--
ALTER TABLE `metrics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_file_uploads`
--
ALTER TABLE `tbl_file_uploads`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `given_answers`
--
ALTER TABLE `given_answers`
  ADD CONSTRAINT `fk_equation` FOREIGN KEY (`equation`) REFERENCES `equations` (`equation`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user`) REFERENCES `student` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `group_equation`
--
ALTER TABLE `group_equation`
  ADD CONSTRAINT `fk_equ` FOREIGN KEY (`equation`) REFERENCES `equations` (`equation`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `likely_answers`
--
ALTER TABLE `likely_answers`
  ADD CONSTRAINT `fk_eq` FOREIGN KEY (`equation`) REFERENCES `equations` (`equation`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_id_user_student_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
