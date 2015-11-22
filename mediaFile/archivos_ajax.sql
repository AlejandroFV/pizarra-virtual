SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `archivos_ajax`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file_uploads`
--

CREATE TABLE IF NOT EXISTS `tbl_file_uploads` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `file` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `size` int(11) NOT NULL,
  `workgroup` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;
