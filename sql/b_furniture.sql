-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 23, 2014 at 08:54 PM
-- Server version: 5.5.38
-- PHP Version: 5.3.10-1ubuntu3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `b_furniture`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `c_id` int(5) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(30) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
(1, 'Sofá'),
(2, 'Cama'),
(3, 'Mesa');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `c_id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `c_id`, `name`, `price`) VALUES
(1, 1, 'Sofa (2+2+1)', 87000),
(2, 1, 'Sofa (2+2+1)', 82000),
(3, 1, 'Sofa (2+2+1)', 78000),
(4, 1, 'Sofa (2+2+1)', 85000),
(5, 3, 'Lotus Dining Table', 28000),
(6, 3, 'Unique Round Dining Table', 26000),
(7, 2, 'Butterfly Bed', 35000),
(8, 2, 'Daina Bed', 36000),
(9, 2, 'Dalia Bed', 33000),
(10, 2, 'Imperial Bed', 29000),
(11, 2, 'Jerin Bed', 43000),
(13, 2, 'Lotus Bed', 48000),
(14, 2, 'Magnolia Bed', 43000);

-- --------------------------------------------------------

--
-- Table structure for table `showroom`
--

CREATE TABLE IF NOT EXISTS `showroom` (
  `s_id` int(5) NOT NULL AUTO_INCREMENT,
  `district` varchar(30) NOT NULL,
  `location` varchar(200) NOT NULL,
  `contact_no` int(11) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `showroom`
--

INSERT INTO `showroom` (`s_id`, `district`, `location`, `contact_no`) VALUES
(1, 'São Paulo', '500, Av. Otto Baumgart, Centro, São Paulo.',  36366763),
(2, 'Rio de Janeiro', '37, Rua Araci Martins, São Jorge, Novo Hamburgo.',  36366763),
(3, 'Minas Gerais', '22, Rua Vinte e Cinco, Calhau, São Luís.', 36366763),
(5, 'Rio Grande do Sul', '345, Avenida Vinte e Um de Julho, Novo Buritizal, Telêmaco Borba.', 36366763);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(5) NOT NULL AUTO_INCREMENT,
  `uname` varchar(30) NOT NULL,
  `password` varchar(130) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `uname`, `password`) VALUES
(1, 'admin', 'd4047d3e56e6d6d63f7d16b85cd2fa88');

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us`(
    id int NOT NULL AUTO_INCREMENT,
    subject_message varchar(255),
    email varchar(255) ,
    number_requested int(255),
    message varchar(255),
    PRIMARY KEY (ID)
);

--
-- Table structure for table `client_user`
--
CREATE TABLE IF NOT EXISTS `client_user` (
  `c_id` int(5) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(80) NOT NULL,
  `cpf` varchar(80) NOT NULL,
  `cellphone` varchar(255) NOT NULL,
  `cep` varchar(80) NOT NULL,
  `full_adress` varchar(80) NOT NULL,
  `adress_complement` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(130) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- Table structure for table `product_order`
--
CREATE TABLE IF NOT EXISTS `product_order` (
  `p_id` int(50) NOT NULL AUTO_INCREMENT,
  `id_user` int(50) NOT NULL,
  `name_user` varchar(80) NOT NULL,
  `cpf_user` varchar(80) NOT NULL,
  `number_order` varchar(80) NOT NULL,
  `payment` varchar(80) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
