-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-03-2021 a las 10:39:22
-- Versión del servidor: 5.6.13
-- Versión de PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `inventario`
--
CREATE DATABASE IF NOT EXISTS `inventario` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `inventario`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adm_general`
--

CREATE TABLE IF NOT EXISTS `adm_general` (
  `id_adm` int(11) NOT NULL AUTO_INCREMENT,
  `adm_general` varchar(15) NOT NULL,
  PRIMARY KEY (`id_adm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `adm_general`
--

INSERT INTO `adm_general` (`id_adm`, `adm_general`) VALUES
(1, 'AGCTI'),
(2, 'AGSC'),
(3, 'AGRS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `n_empleado` varchar(12) NOT NULL,
  `RFC_8` varchar(8) NOT NULL,
  `nombre_s` varchar(25) NOT NULL,
  `a_pat` varchar(30) NOT NULL,
  `a_mat` varchar(30) NOT NULL,
  `id_puesto` int(11) DEFAULT NULL,
  `id_adm` int(11) DEFAULT NULL,
  `ip_address` varchar(16) DEFAULT '0.0.0.0',
  `id_equipo` int(11) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `id_entrega` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=418 ;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `n_empleado`, `RFC_8`, `nombre_s`, `a_pat`, `a_mat`, `id_puesto`, `id_adm`, `ip_address`, `id_equipo`, `id_perfil`, `id_entrega`) VALUES
(1, '0000010', 'OOPM90UJ', 'Miguel Angel', 'Ordoñez', 'Perez', 1, 1, '10.108.36.33', 1, 1, 1),

--
-- Disparadores `empleado`
--
DROP TRIGGER IF EXISTS `after_empleado_delete`;
DELIMITER //
CREATE TRIGGER `after_empleado_delete` AFTER DELETE ON `empleado`
 FOR EACH ROW INSERT INTO historial
 SET fecha = CURRENT_TIMESTAMP(),
	 evento = 'Baja',
     id_equipo = OLD.id_equipo,
     RFC_8 = OLD.RFC_8,
	 nombre = CONCAT(OLD.nombre_s," ",OLD.a_pat," ",OLD.a_mat)
//
DELIMITER ;
DROP TRIGGER IF EXISTS `after_empleado_insert`;
DELIMITER //
CREATE TRIGGER `after_empleado_insert` AFTER INSERT ON `empleado`
 FOR EACH ROW INSERT INTO historial
 SET fecha = CURRENT_TIMESTAMP(),
	 evento = 'Alta',
     id_equipo = NEW.id_equipo,
     RFC_8 = NEW.RFC_8,
	 nombre = CONCAT(NEW.nombre_s," ",NEW.a_pat," ",NEW.a_mat)
//
DELIMITER ;
DROP TRIGGER IF EXISTS `before_empleado_update`;
DELIMITER //
CREATE TRIGGER `before_empleado_update` BEFORE UPDATE ON `empleado`
 FOR EACH ROW INSERT INTO historial
 SET fecha = CURRENT_TIMESTAMP(),
	 evento = 'Modificado',
     id_equipo = OLD.id_equipo,
	 nid_equipo = NEW.id_equipo,
	 RFC_8 = OLD.RFC_8,
	 nombre = CONCAT(OLD.nombre_s," ",OLD.a_pat," ",OLD.a_mat)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega`
--

CREATE TABLE IF NOT EXISTS `entrega` (
  `id_entrega` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_entrega` varchar(40) NOT NULL,
  PRIMARY KEY (`id_entrega`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `entrega`
--

INSERT INTO `entrega` (`id_entrega`, `tipo_entrega`) VALUES
(1, 'PERSONAL'),
(2, 'SERVICIO SOCIAL'),
(3, 'SCCM SERVIDOR SECUNDARIO'),
(4, 'CITASAT'),
(5, 'SITIO ALTERNO ACCSI'),
(6, 'SEGURIDAD Y VIGILANCIA '),
(7, 'AULAS DE CAPACITACION'),
(8, 'CAMPAÑA DE DECLARACIONES ANUALES'),
(9, 'SALA DE INTERNET'),
(10, 'ORIENTACION COLECTIVA'),
(11, 'DESPACHADOR DE TURNOS'),
(12, 'ABOGADO TRIBUTARIO'),
(13, 'TEMPORAL DECLARACIONES Y PAGOS'),
(14, 'ENTIDADES FEDERATIVAS'),
(15, 'CAPTIVA'),
(16, 'PROGRAMA AFILIATE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE IF NOT EXISTS `equipos` (
  `id_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `n_serie` varchar(20) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `asignacion` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_equipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=414 ;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `n_serie`, `id_proveedor`, `asignacion`) VALUES
(1, 'MP16FDM1', 1, 1),
(2, 'MP16L1NF', 1, 1),
(3, 'MP16FBC3', 1, 1),
(4, 'MP1CBBR7', 1, 1),
(5, 'PF0V236D', 1, 1),
(6, 'PF0VAA4F', 1, 1),
(7, 'PF0V9ZMD', 1, 1),
(8, 'PF0V9SFJ', 1, 1),
(9, ' PF0ZHQCD ', 1, 1),
(10, ' MP1CAZQG ', 1, 1),
(11, ' MP1CAZCH ', 1, 1),
(12, 'PF0VSRVY', 1, 1),
(17, 'PF0TTTLG', 1, 1),
(18, 'MP1C7FJ4', 1, 1),
(20, ' PF0UUGJ1 ', 1, 1),
(21, 'PF0U2SEU', 1, 1),
(22, '2172500000985', 1, 1),
(23, 'MJ05XA23', 1, 1),
(24, '2172500000400', 1, 1),
(25, ' MJ05WRXA ', 1, 1),
(26, 'PF0UUBKR', 1, 1),
(27, '2172500001778', 1, 1),
(28, '2172500001674', 1, 1),
(29, '2172500001153', 1, 1),
(30, 'PF0VC0P9', 1, 1),
(31, 'MP1C8VA5', 1, 1),
(32, 'MP1C7XH0', 1, 1),
(33, 'MP1C7JA4', 1, 1),
(34, 'MP1C99CX', 1, 1),
(35, 'MP1C8TJQ', 1, 1),
(36, 'MP1C7F0S', 1, 1),
(37, 'MP1C8XHG', 1, 1),
(38, 'MP1C9HEP', 1, 1),
(39, 'MP1C78JS', 1, 1),
(40, 'MP1CBFCR', 1, 1),
(41, 'MP1CBL15', 1, 1),
(42, 'MP1CBNBF', 1, 1),
(43, 'PF0ZHFVS', 1, 1),
(44, 'MP1C7JHK', 1, 1),
(45, 'MP1CBC88', 1, 1),
(46, 'MP1C7DKV', 1, 1),
(47, 'PF0U5QXD', 1, 1),
(48, 'MP1C7F7M', 1, 1),
(49, 'MP1C7XAZ', 1, 1),
(50, 'MP1C7HC6', 1, 1),
(51, 'MP1C7YGN', 1, 1),
(52, 'PF0ZKQKX', 1, 1),
(53, 'MP1CBJLP', 1, 1),
(54, 'MP1CBJGD', 1, 1),
(55, 'MP1CBEHS', 1, 1),
(56, 'MP1C91DN', 1, 1),
(57, 'MP1C7FAZ', 1, 1),
(58, 'MP1C8T3Q', 1, 1),
(59, 'MP1C8S4Y', 1, 1),
(60, 'MP1CBLGY', 1, 1),
(61, 'MP1C7794', 1, 1),
(62, 'MP1C9ANB', 1, 1),
(63, 'MP19H44Y', 1, 1),
(64, 'MP1CBG0Z', 1, 1),
(65, 'MP1C95Q7', 1, 1),
(66, 'MP1C7K3G', 1, 1),
(67, 'MP1C781S', 1, 1),
(68, 'MP1C7FF0', 1, 1),
(69, 'MP1CAX1F', 1, 1),
(70, 'MP1C77FT', 1, 1),
(71, 'MP1CBD5D', 1, 1),
(72, 'MP1C9HWR', 1, 1),
(73, 'MP1CAZC9', 1, 1),
(74, 'MP1C79WV', 1, 1),
(75, 'MP1CBA4B', 1, 1),
(76, 'MP1C9CBA', 1, 1),
(77, 'MP1C7869', 1, 1),
(78, 'MP1C7XTV', 1, 1),
(79, 'MP1C8T5Y', 1, 1),
(80, 'MP1C8TLE', 1, 1),
(81, 'MP1CB8K1', 1, 1),
(82, 'MP1CB8HN', 1, 1),
(83, 'MP1CB6HJ', 1, 1),
(84, 'MP1CB2N5', 1, 1),
(85, 'MP1CB8FQ', 1, 1),
(86, 'MP1CB6G5', 1, 1),
(87, 'MP1CB8D6', 1, 1),
(88, 'MP1CB8F3', 1, 1),
(89, 'MP1CAX4N', 1, 1),
(90, 'MP1CB6J1', 1, 1),
(91, 'MP1CBKTZ', 1, 1),
(92, 'MP1C9DYQ', 1, 1),
(93, 'MP1C9NYN', 1, 1),
(94, 'MP1C9QZ8', 1, 1),
(95, 'PF0TU72G', 1, 1),
(96, 'MP1C9QUQ', 1, 1),
(97, 'MP1C9NLF', 1, 1),
(98, 'MP1C9HYG', 1, 1),
(99, 'MP1C9M19', 1, 1),
(100, 'MP1C7C3T', 1, 1),
(101, 'MP1C9E5V', 1, 1),
(102, 'MP1C9F6J', 1, 1),
(103, 'MP1C7CKF', 1, 1),
(104, 'MP18ZMVL', 1, 1),
(105, 'MP1C7Y7H', 1, 1),
(106, 'MP1C9M2J', 1, 1),
(107, 'MP1CBCSL', 1, 1),
(108, 'MP1CBDFB', 1, 1),
(109, 'MP1CBJHS', 1, 1),
(110, 'MP1C9GWY', 1, 1),
(111, 'MP1C91VS', 1, 1),
(112, 'MP1C98M7', 1, 1),
(113, 'MP1CBDF9', 1, 1),
(114, 'MP1C799G', 1, 1),
(115, 'MP1C9DZM', 1, 1),
(116, 'MP1CAVTL', 1, 1),
(117, 'MP1CBBTV', 1, 1),
(118, 'MP1CBD0A', 1, 1),
(119, 'MP1CBJEF', 1, 1),
(120, 'MP1C7JFZ', 1, 1),
(121, 'MP1CBN8D', 1, 1),
(122, 'MP1C9BXF', 1, 1),
(123, 'MP1CBLGE', 1, 1),
(124, 'MP1C9E4T', 1, 1),
(125, 'MP1C7G65', 1, 1),
(126, 'MP1C9D51', 1, 1),
(127, 'MP1C7FMS', 1, 1),
(128, 'MP1C7GEV', 1, 1),
(129, 'MP1C8XP9', 1, 1),
(130, 'MP1CBHCM', 1, 1),
(131, 'MP1C7X86', 1, 1),
(132, 'MP1C8TPJ', 1, 1),
(133, 'MP1C7X2Q', 1, 1),
(134, 'MP1C7DC1', 1, 1),
(135, 'MP1C7WQP', 1, 1),
(136, 'MP1C99TW', 1, 1),
(137, 'MP1CBHZ0', 1, 1),
(138, 'MP1C9HM1', 1, 1),
(139, 'MP1C7HBZ', 1, 1),
(140, 'PF0WBMVD', 1, 1),
(141, 'MP18ZM3Z', 1, 1),
(142, 'PF0V1ZF1', 1, 1),
(143, 'MP1CAZRK', 1, 1),
(144, 'MP1C95ZM', 1, 1),
(145, 'MP19GSTM', 1, 1),
(146, 'MP1C9NLL', 1, 1),
(147, 'MP1C9FTJ', 1, 1),
(148, 'MP1CB8K5', 1, 1),
(149, 'PF0V9NAR', 1, 1),
(150, 'MP1CBRJA', 1, 1),
(151, 'PF0V2FQU', 1, 1),
(152, 'MP1C9E6D', 1, 1),
(153, 'MP1C9G5T', 1, 1),
(154, 'MP1C7Y1C', 1, 1),
(155, 'MP1C8XCH', 1, 1),
(156, 'MP1CBN8L', 1, 1),
(157, 'MP1C9FB4', 1, 1),
(158, 'MP1CB9E3', 1, 1),
(159, 'MP187NJA', 1, 1),
(160, 'MP1C8UCJ', 1, 1),
(161, 'MP1C8X61', 1, 1),
(162, 'MP1C7Y96', 1, 1),
(163, 'MP18ZPTN', 1, 1),
(164, 'MP1C9TH4', 1, 1),
(165, 'MP1C9C5U', 1, 1),
(166, 'MP1CB2JK', 1, 1),
(167, 'MP1CB8KR', 1, 1),
(168, 'MP1CBNX0', 1, 1),
(169, 'MP19GXMF', 1, 1),
(170, 'MP1C7DAV', 1, 1),
(171, 'MP1CBFCT', 1, 1),
(172, 'MP1C98NC', 1, 1),
(173, 'MP1C77JY', 1, 1),
(174, 'MP18ZMKT', 1, 1),
(175, 'MP187HWC', 1, 1),
(176, 'MP1CB8BL', 1, 1),
(177, 'MP1C7F9A', 1, 1),
(178, 'MP1C960G', 1, 1),
(179, 'MP1C7FBC', 1, 1),
(180, 'MP1C8WG5', 1, 1),
(181, 'MP1C8RSS', 1, 1),
(182, 'MP1C8WS4', 1, 1),
(183, 'MP187PDJ', 1, 1),
(184, 'MP1C77JD', 1, 1),
(185, 'MP1C8ZUB', 1, 1),
(186, 'MP1C8XP0', 1, 1),
(187, 'MP1C7X13', 1, 1),
(188, 'MP187PDN', 1, 1),
(189, 'MP1C8QA7', 1, 1),
(190, 'MP1C9KLM', 1, 1),
(191, 'MP187M0U', 1, 1),
(192, 'MP1C9SBJ', 1, 1),
(193, 'MP1C7X7X', 1, 1),
(194, 'MP1C8XPN', 1, 1),
(195, 'MP1C7WXS', 1, 1),
(196, 'MP18ZS7K', 1, 1),
(197, 'MP1C97DC', 1, 1),
(198, 'MP1C91MD', 1, 1),
(199, 'PF0ZJ7F6', 1, 1),
(200, 'PF0TUHFH', 1, 1),
(201, 'MP1C8SC6', 1, 1),
(202, 'MP1CAZ87', 1, 1),
(203, 'MP1C7AB4', 1, 1),
(204, 'MP1CBKVT', 1, 1),
(205, 'MP1CBCE7', 1, 1),
(206, 'MP1C7JKP', 1, 1),
(207, 'MP1C8V1U', 1, 1),
(208, 'PF0U32FX', 1, 1),
(209, 'MP1CAX61', 1, 1),
(210, 'MP1C95N5', 1, 1),
(211, 'MP1C7YK4', 1, 1),
(212, 'MP1C7X5L', 1, 1),
(213, 'MP1C8T5K', 1, 1),
(214, 'MP1C8V5J', 1, 1),
(215, 'MP1C8X55', 1, 1),
(216, 'MP1C7JDQ', 1, 1),
(217, 'MP1CBF8L', 1, 1),
(218, 'MP1C7YG5', 1, 1),
(219, 'PF0U2Q39', 1, 1),
(220, 'MP1C7X1Y', 1, 1),
(221, 'MP1C9HUB', 1, 1),
(222, 'PF0VAG4Y', 1, 1),
(223, 'MP1C7E9T', 1, 1),
(224, 'MP1C7XUD', 1, 1),
(225, 'MP1C8TNS', 1, 1),
(226, 'MP1CBGBS', 1, 1),
(227, 'MP1C8TJ5', 1, 1),
(228, 'PF0TU0GB', 1, 1),
(229, 'MP1C8SQ7', 1, 1),
(230, 'MP1C95Z2', 1, 1),
(231, 'MP1C99KG', 1, 1),
(232, 'MP1C9BLG', 1, 1),
(233, 'MP1C9QAB', 1, 1),
(234, '2172500001863', 1, 1),
(235, '2172500001692', 1, 1),
(236, '2172500001708', 1, 1),
(237, '2172500001668', 1, 1),
(238, '2172500001676', 1, 1),
(239, 'PF0VAG6J', 1, 1),
(240, 'MP1CAZTW', 1, 1),
(241, 'MP1C8U1G', 1, 1),
(242, 'MP1CBCBG', 1, 1),
(243, 'MP1C7E0P', 1, 1),
(244, 'MP1C7YCG', 1, 1),
(245, 'MP1C7WZ6', 1, 1),
(246, 'MP1CAVE7', 1, 1),
(247, 'MP1CAVB6', 1, 1),
(248, 'MP1C7CGU', 1, 1),
(249, 'MP18ZPZA', 1, 1),
(250, 'MP1CBRDR', 1, 1),
(251, 'MP1C8TJK', 1, 1),
(252, 'MP1C9A5W', 1, 1),
(253, 'MP1C7XSF', 1, 1),
(254, 'MP1C97DW', 1, 1),
(255, 'PF0VAB0P', 1, 1),
(256, 'PF0VAG8Q', 1, 1),
(257, 'PF0V9HPV', 1, 1),
(258, 'MP1CAZGB', 1, 1),
(259, 'MP1C99L8', 1, 1),
(260, 'MP1C79XD', 1, 1),
(261, 'MP18ZWMV', 1, 1),
(262, 'MP1CBQ0C', 1, 1),
(263, 'MP1C7HHK', 1, 1),
(264, 'MP1CB1KX', 1, 1),
(265, 'MP1CB6LR', 1, 1),
(266, 'MP1C8XQZ', 1, 1),
(267, 'MP18ZPYC', 1, 1),
(268, 'MP1C7DA5', 1, 1),
(269, 'MP187PB5', 1, 1),
(270, 'MP1C8S2C', 1, 1),
(271, 'PF0ZJDTM', 1, 1),
(272, 'MP1C9KGR', 1, 1),
(273, 'MP1C957Z', 1, 1),
(274, 'MP18ZN07', 1, 1),
(275, 'MP1CBF51', 1, 1),
(276, 'MP18ZSBP', 1, 1),
(277, 'PF0VACLC', 1, 1),
(278, 'MP1CAXA6', 1, 1),
(279, 'MP1C8V9N', 1, 1),
(280, 'PF0VA3FR', 1, 1),
(281, 'MP1C8WJ0', 1, 1),
(282, 'MP1C9HWE', 1, 1),
(283, 'MP1C8XR2', 1, 1),
(284, 'MP1C7YDB', 1, 1),
(285, 'MP1C9QB3', 1, 1),
(286, 'MP1CBD02', 1, 1),
(287, 'MP1CBAG2', 1, 1),
(288, 'MP1CB0XX', 1, 1),
(289, 'MP1C7EJW', 1, 1),
(290, 'MP1CAYU8', 1, 1),
(291, 'MP19GUET', 1, 1),
(292, 'MP1CBPW5', 1, 1),
(293, 'MP1C9E68', 1, 1),
(294, 'PF0ZHNAM', 1, 1),
(295, 'MP1CBR13', 1, 1),
(296, 'MPC7GM6', 1, 1),
(297, 'MP1C8XPA', 1, 1),
(298, 'MP18ZU89', 1, 1),
(299, 'MP1C7CNM', 1, 1),
(300, 'MP1C8X3E', 1, 1),
(301, 'MP1C8TGX', 1, 1),
(302, 'MP1C8XQD', 1, 1),
(303, 'MP1C8XHT', 1, 1),
(304, 'MP1C939P', 1, 1),
(305, 'MP1C982F', 1, 1),
(306, 'MP1C79L6', 1, 1),
(307, 'MP1C9BHC', 1, 1),
(308, 'MP1C8T5B', 1, 1),
(309, 'MP1CB2JA', 1, 1),
(310, 'MP1C99LF', 1, 1),
(311, 'MP1CB8JJ', 1, 1),
(312, 'MP1C775K', 1, 1),
(313, 'MP1C8NC4', 1, 1),
(314, 'MP1C8V49', 1, 1),
(315, 'MP1CBFX4', 1, 1),
(316, 'MP18ZMYT', 1, 1),
(317, 'MP1C9C3M', 1, 1),
(318, 'MP1CAYWF', 1, 1),
(319, 'MP1C7XNV', 1, 1),
(320, 'MP1C8XPU', 1, 1),
(321, 'MP1CAXBL', 1, 1),
(322, 'PF0TUDHZ', 1, 1),
(323, 'MP1C9603', 1, 1),
(324, 'MP1C8RZR', 1, 1),
(325, 'PF0VAM0G', 1, 1),
(326, 'PF0V40C8', 1, 1),
(327, 'PF0U2VAB', 1, 1),
(328, 'PF0V3VMC', 1, 1),
(329, 'MP19GUDY', 1, 1),
(330, 'MP1CBHKC', 1, 1),
(331, 'MP1C9FCL', 1, 1),
(332, 'MP1C8TEF', 1, 1),
(333, 'MP1C7XZW', 1, 1),
(334, 'MP1C7Y7W', 1, 1),
(335, 'MP1C9GW4', 1, 1),
(336, 'MP1C7XUX', 1, 1),
(337, 'MP1C7XM5', 1, 1),
(338, 'MP1C9FHJ', 1, 1),
(339, 'MP1C9QCY', 1, 1),
(340, 'MP1C7XKS', 1, 1),
(341, 'MP1C7XPH', 1, 1),
(342, 'MP1C99WT', 1, 1),
(343, 'MP1C7DB5', 1, 1),
(344, 'MP1C95NZ', 1, 1),
(345, 'MP1C9CDP', 1, 1),
(346, 'MP1C8MPT', 1, 1),
(347, 'MP1C8RYS', 1, 1),
(348, 'MP187HZK', 1, 1),
(349, 'MP1C96GT', 1, 1),
(350, 'MP1CBMBT', 1, 1),
(351, 'MP1C7JH5', 1, 1),
(352, 'MP1C99UV', 1, 1),
(353, 'MP1CBB2Y', 1, 1),
(354, 'MP1C7AX7', 1, 1),
(355, 'MP1C98KB', 1, 1),
(356, 'MP1C97P2', 1, 1),
(357, 'MP1C9C3A', 1, 1),
(358, 'MP1C98F2', 1, 1),
(359, 'MP1C7DF8', 1, 1),
(360, 'MP1C77ZM', 1, 1),
(361, 'MP1CBG0E', 1, 1),
(362, 'MP1C9ARG', 1, 1),
(363, 'MP1C9AMA', 1, 1),
(364, 'MP1C7JH9', 1, 1),
(365, 'MP1C7DCU', 1, 1),
(366, 'MP1C95QW', 1, 1),
(367, 'MP1C99NJ', 1, 1),
(368, 'MP18ZW8E', 1, 1),
(369, 'MP1C95LS', 1, 1),
(370, 'MP187PEM', 1, 1),
(371, 'MP1CBGXH', 1, 1),
(372, 'MP1C7F8E', 1, 1),
(373, 'MP1C7HFH', 1, 1),
(374, 'MP1C7F0K', 1, 1),
(375, 'MP1C9BVK', 1, 1),
(376, 'MP1C98FQ', 1, 1),
(377, 'MP1C7AYC', 1, 1),
(378, 'MP1C7FEF', 1, 1),
(379, 'MP1C99VT', 1, 1),
(380, 'MP1C7D6Q', 1, 1),
(381, 'MP1C98K3', 1, 1),
(382, 'MP1CBBVP', 1, 1),
(383, 'MP1C7WW3', 1, 1),
(384, 'MP1C7WVU', 1, 1),
(385, 'MP1C9D24', 1, 1),
(386, 'MP1CAZXS', 1, 1),
(387, 'MP1CBFS5', 1, 1),
(388, 'MP1CBNJE', 1, 1),
(389, 'MP1CBPPR', 1, 1),
(390, 'MP1C9CL5', 1, 1),
(391, 'MP1CBLP3', 1, 1),
(392, 'MP1C79UU', 1, 1),
(393, 'MP1CB9UV', 1, 1),
(394, 'MP18ZYRN', 1, 1),
(395, 'MP1C9CVE', 1, 1),
(396, 'MP1CB6TA', 1, 1),
(397, 'MP1C9QB5', 1, 1),
(398, 'MP1C79VS', 1, 1),
(399, 'MP1CBN1K', 1, 1),
(400, 'PF0V2Z68', 1, 1),
(401, 'PF0UA12G', 1, 1),
(402, 'MP1C9C0S', 1, 1),
(403, 'PF0V9HN0', 1, 1),
(404, 'MP1CB89L', 1, 1),
(405, 'MP1C7AWZ', 1, 1),
(406, '2172500001781', 1, 0),
(407, 'MP1CBFPR', 1, 1),
(408, 'PF0UD2DJ', 1, 1),
(409, 'MP18ZW8V', 1, 1),
(410, 'MP1C9GML', 1, 1),
(411, 'MP1CBFDM', 1, 1),
(412, 'MP1C798W', 1, 1),
(413, 'MP1C7WX7', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE IF NOT EXISTS `historial` (
  `id_historial` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `evento` varchar(10) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `nid_equipo` int(11) NOT NULL,
  `RFC_8` varchar(8) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`id_historial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_historial`, `fecha`, `evento`, `id_equipo`, `nid_equipo`, `RFC_8`, `nombre`) VALUES
(5, '2020-11-20 18:53:23', 'Alta', 0, 0, 'LOAJ9706', 'Jazmin Lopez Alvarez'),
(6, '2020-11-20 18:53:59', 'Modificado', 0, 406, 'LOAJ9706', 'Jazmin Lopez Alvarez'),
(7, '2020-11-20 18:54:34', 'Baja', 406, 0, 'LOAJ9706', 'Jazmin Lopez Alvarez'),
(8, '2020-11-20 22:50:34', 'Modificado', 57, 57, 'SARR6494', 'Rosa Maria Salmeron Rojo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE IF NOT EXISTS `perfiles` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(30) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `perfil`) VALUES
(1, 'FIJO FUNCIONAL'),
(2, 'MOVIL FUNCIONAL'),
(3, 'MOVIL EJECUTIVO'),
(4, 'MOVIL LIGERO SERVICIO SOCIAL'),
(5, 'FIJO PROYECTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `proveedor` varchar(20) NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `proveedor`) VALUES
(1, 'Mainbit');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestos`
--

CREATE TABLE IF NOT EXISTS `puestos` (
  `id_puesto` int(11) NOT NULL AUTO_INCREMENT,
  `puesto` varchar(30) NOT NULL,
  PRIMARY KEY (`id_puesto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `puestos`
--

INSERT INTO `puestos` (`id_puesto`, `puesto`) VALUES
(1, 'OPERATIVO'),
(2, 'ENLACE'),
(3, 'JEFE DE DEPARTAMENTO'),
(4, 'SUBADMINISTRADOR'),
(5, 'ADMON. CENTRAL'),
(6, 'ADMINISTRADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(15) NOT NULL,
  `password` varchar(42) DEFAULT NULL,
  `nombre_s` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombre_s`) VALUES
(1, 'admin1', '*B37ACB9927C1F3B520BBF976386EAB76A08F3367', 'Administrador Principal');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
