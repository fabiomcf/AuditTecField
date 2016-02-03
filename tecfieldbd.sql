-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 15, 2011 at 03:29 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tecfieldbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `auditlist`
--

DROP TABLE IF EXISTS `auditlist`;
CREATE TABLE IF NOT EXISTS `auditlist` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `user` text NOT NULL,
  `loja` text NOT NULL,
  `id_equip` text NOT NULL,
  `data` text NOT NULL,
  `incidente` text NOT NULL,
  `c_sup_pp` tinyint(1) NOT NULL,
  `c_pp_fix` tinyint(1) NOT NULL,
  `c_bc_pp` tinyint(1) NOT NULL,
  `c_bpo` tinyint(1) NOT NULL,
  `c_plmdo` tinyint(1) NOT NULL,
  `c_obs` text NOT NULL,
  `tb_sup_pp` tinyint(1) NOT NULL,
  `tb_pp_fix` tinyint(1) NOT NULL,
  `tb_bdc` tinyint(1) NOT NULL,
  `tb_pdt` tinyint(1) NOT NULL,
  `tb_obs` text NOT NULL,
  `s_liOK` tinyint(1) NOT NULL,
  `s_b` tinyint(1) NOT NULL,
  `s_scg` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `auditlist`
--

INSERT INTO `auditlist` (`ID`, `user`, `loja`, `id_equip`, `data`, `incidente`, `c_sup_pp`, `c_pp_fix`, `c_bc_pp`, `c_bpo`, `c_plmdo`, `c_obs`, `tb_sup_pp`, `tb_pp_fix`, `tb_bdc`, `tb_pdt`, `tb_obs`, `s_liOK`, `s_b`, `s_scg`) VALUES
(1, 'teste', 'localhost', 'alho', '15-11-2011 10:38:30', '111', 1, 1, 1, 1, 1, 'checkouts', 0, 0, 0, 0, 'trios', 1, 0, 'servidor'),
(2, 'teste', 'localhost', 'alho', '15-11-2011 10:39:15', '222', 0, 0, 0, 0, 0, 'aa', 0, 1, 0, 1, 'bb', 1, 0, 'cc'),
(3, 'teste', 'localhost', 'alho', '15-11-2011 10:40:00', '23542353', 1, 1, 1, 1, 1, '345345', 1, 1, 1, 1, 'erter545345 345345erterter', 1, 1, '34535ererer er ergerg er gerg erg er ger gerg erg ');

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

DROP TABLE IF EXISTS `auth`;
CREATE TABLE IF NOT EXISTS `auth` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `email` text NOT NULL,
  `nivel` int(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`ID`, `user`, `pass`, `email`, `nivel`) VALUES
(3, 'teste', '698dc19d489c4e4db73e28a713eab07b', 'teste', 1),
(5, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 2);
