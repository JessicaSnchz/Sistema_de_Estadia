-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-03-2019 a las 19:06:52
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_cn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambito_de_aplicacion`
--

CREATE TABLE `ambito_de_aplicacion` (
  `id_ambito_de_a` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ambito_de_aplicacion`
--

INSERT INTO `ambito_de_aplicacion` (`id_ambito_de_a`, `nombre`, `descripcion`) VALUES
(1, 'Personas físicas', 'Es el concepto jurídico para definir a las personas, los seres humanos, que son susceptibles de adquirir derechos y contraer obligaciones'),
(2, 'Personas morales', 'Toda aquella entidad de existencia jurídica, que está constituida por grupos de personas, y que está sujeta a ejercer derechos y contraer obligaciones'),
(3, 'Ciudadanía', 'Se refiere al conjunto de derechos y deberes a los cuales el ciudadano o individuo está sujeto en su relación con la sociedad en que vive');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id_archivo` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id_area` int(11) NOT NULL,
  `nombre_a` varchar(30) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `ubicacion` varchar(150) NOT NULL,
  `id_depe` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id_area`, `nombre_a`, `descripcion`, `ubicacion`, `id_depe`, `id_horario`) VALUES
(1, 'Mejora regulatoria', 'Área encargada de optimizar los procesos de trámites y servicios', 'Oficina de Mejora regulatoria (estacionamiento)', 3, 1),
(2, 'Transparencia', 'Sección para administrar las dependencias que fungen en el municipio de huimilpan', 'Oficina de Transparencia (estacionamiento)', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cantidad`
--

CREATE TABLE `cantidad` (
  `id_cant` int(11) NOT NULL,
  `copias` smallint(2) DEFAULT NULL,
  `original` smallint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cantidad`
--

INSERT INTO `cantidad` (`id_cant`, `copias`, `original`) VALUES
(7, 0, 1),
(8, 3, 0),
(9, 3, 0),
(10, 3, 0),
(11, 4, 0),
(12, 3, 0),
(13, 4, 0),
(14, 4, 1),
(15, 3, 0),
(16, 4, 0),
(17, 4, 1),
(18, 3, 0),
(19, 4, 0),
(20, 4, 1),
(21, 0, 1),
(22, 1, 2),
(23, 2, 3),
(24, NULL, NULL),
(25, 6, 6),
(26, 6, 6),
(27, 6, 6),
(28, 6, 6),
(29, 6, 6),
(30, 6, 6),
(31, 6, 6),
(32, 6, 6),
(33, 6, 6),
(34, 6, 6),
(35, 6, 6),
(36, 7, 7),
(37, 6, 6),
(38, 7, 7),
(39, 4, 1),
(40, 4, 0),
(41, 2, 1),
(42, 4, 1),
(43, 4, 0),
(44, 2, 1),
(45, 4, 1),
(46, 2, 0),
(47, 0, 0),
(48, 0, 0),
(49, 4, 1),
(50, 4, 1),
(51, 4, 1),
(52, 4, 1),
(53, 2, 1),
(54, 2, 1),
(55, 2, 1),
(56, 4, 1),
(57, 4, 1),
(58, 4, 1),
(59, 2, 1),
(60, 0, 1),
(61, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id_cargo` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `descripcion_c` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id_cargo`, `nombre`, `descripcion_c`) VALUES
(1, 'Comisionada', 'Encargada del área en cuestión');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(5) NOT NULL,
  `n_categoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `n_categoria`) VALUES
(1, 'Cultura'),
(2, 'Deporte'),
(3, 'Educación '),
(4, 'Jurídico'),
(5, 'Programas sociales'),
(6, 'Salud'),
(7, 'Turismo'),
(8, 'Vivienda'),
(9, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_spanish_ci NOT NULL,
  `data` text COLLATE utf8_spanish_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `user_agent`, `last_activity`, `user_data`, `data`, `timestamp`) VALUES
('0ljrnen568ijj846qadbb330n5e4eilb', '::1', '', 0, '', '__ci_last_regenerate|i:1553626857;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('0oicl7g0qapaensupbjibk8jnntbea2a', '::1', '', 0, '', '__ci_last_regenerate|i:1553670895;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('0tmgfna536mqa5f58pv6p51fg4pqiam7', '::1', '', 0, '', '__ci_last_regenerate|i:1553699721;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('0v2i541rbdj6a2hvs1emf3jqlc3d1dr7', '::1', '', 0, '', '__ci_last_regenerate|i:1553793979;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('11h1pi3rjb09ab3ebbduv8hoqrka540d', '::1', '', 0, '', '__ci_last_regenerate|i:1553794422;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('148rej3a1vslv67e8tpocoa4sd6n0efi', '::1', '', 0, '', '__ci_last_regenerate|i:1553388984;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('1ja18sbuq1417mm9bres12eh4mtgr8af', '::1', '', 0, '', '__ci_last_regenerate|i:1553628251;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('1r0jjr7grvn8hf8batkq9ff6s6f67f74', '::1', '', 0, '', '__ci_last_regenerate|i:1553750635;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('25f64ejnbvam5qe2rnam49lg235q83u0', '::1', '', 0, '', '__ci_last_regenerate|i:1553667140;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('2f1ue0749pfj8otkkhgls9p99m345efq', '::1', '', 0, '', '__ci_last_regenerate|i:1553379117;', '0000-00-00 00:00:00'),
('2f4if7l524enldla4vm4q81nl1947b89', '::1', '', 0, '', '__ci_last_regenerate|i:1553707708;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('2g8oneidjjjukm4a9av9hh7vlcnhkn10', '::1', '', 0, '', '__ci_last_regenerate|i:1553572549;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('3d9r37ihcpnnjvq4tgnj89d3ao3s0ss0', '::1', '', 0, '', '__ci_last_regenerate|i:1553528087;', '0000-00-00 00:00:00'),
('546h3nqrm2hskn7bi7c84k5ic01rbmvm', '::1', '', 0, '', '__ci_last_regenerate|i:1553746164;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('56ji8fhk6jl7v4fr5m81sie6admooc0s', '::1', '', 0, '', '__ci_last_regenerate|i:1553793351;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('5pkmfjuighmksr34ojvna4o5s74do1v0', '::1', '', 0, '', '__ci_last_regenerate|i:1553618453;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('5pv2o1f3b3pds0igbk2qo9c0nuck9h7q', '::1', '', 0, '', '__ci_last_regenerate|i:1553286182;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('6856ka1bli8gsm5l4hg8p1rf677lbceq', '::1', '', 0, '', '__ci_last_regenerate|i:1553618145;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('68bje0rcgqtgfpuhcru3sug5u6i4s2s5', '::1', '', 0, '', '__ci_last_regenerate|i:1553628567;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('72lcv6a8ob6pg9upbo0v2v2r7mbatj5g', '::1', '', 0, '', '__ci_last_regenerate|i:1553628871;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('776btg5e0t87s8u4g7g65cv7s8a0h87v', '::1', '', 0, '', '__ci_last_regenerate|i:1553623083;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('7n32v7m63t1lg5btg51jk5chhb69lovg', '::1', '', 0, '', '__ci_last_regenerate|i:1553635438;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('8lmft06r2d4cvmpdhdi4acj1vbpc1cec', '::1', '', 0, '', '__ci_last_regenerate|i:1553674917;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('8o287uc2v9bvbhcbf2h9let01c1bft4k', '::1', '', 0, '', '__ci_last_regenerate|i:1553280616;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('96hec6bj3eo3cn4kif58mirr1v63bs9b', '::1', '', 0, '', '__ci_last_regenerate|i:1553280306;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('aq6fnmj6ii3jbq7hili1mfhs46kh7u8c', '::1', '', 0, '', '__ci_last_regenerate|i:1553708387;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('bb489qmt4tqhpu5phqvp9c1l5uib4d9s', '::1', '', 0, '', '__ci_last_regenerate|i:1553789535;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('be94814hdh82u5a8j6mvs5l2hbel3ok5', '::1', '', 0, '', '__ci_last_regenerate|i:1553545362;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('bkm0uoagcbvu16cksf6qd9hjvqjaa41d', '::1', '', 0, '', '__ci_last_regenerate|i:1553630996;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('bnrioegc4v362danqe4mi0jjt0750ajr', '::1', '', 0, '', '__ci_last_regenerate|i:1553706109;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('cc0a5bs97u6uja83gcuv6ug6b6gtlnmd', '::1', '', 0, '', '__ci_last_regenerate|i:1553698720;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('cgfdr45blfrfcsr5un93tg8tn18favt0', '::1', '', 0, '', '__ci_last_regenerate|i:1553630674;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('des34lr4iikdu6udbv0uelk2n4ooj154', '::1', '', 0, '', '__ci_last_regenerate|i:1553626526;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('egn2ojvu7b7ftajesefg81hnhaejgts3', '::1', '', 0, '', '__ci_last_regenerate|i:1553379116;', '0000-00-00 00:00:00'),
('ekvbh8u18dobft8kpec5rb81ijat5mip', '::1', '', 0, '', '__ci_last_regenerate|i:1553623439;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('eu9bg4tl9co1fm9huo0hnh9vogn443jc', '::1', '', 0, '', '__ci_last_regenerate|i:1553281291;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('feabj3her3s96lio7ektj751739ju65i', '::1', '', 0, '', '__ci_last_regenerate|i:1553389792;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('fqekdgirf38ak0k8jbeg0n2j67078cot', '::1', '', 0, '', '__ci_last_regenerate|i:1553280927;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('g2vfbmsihm9qlho9gtofoqtmacojcgti', '::1', '', 0, '', '__ci_last_regenerate|i:1553544012;', '0000-00-00 00:00:00'),
('gcl860g35mmcjihg2n1bk29ifc3qg02c', '::1', '', 0, '', '__ci_last_regenerate|i:1553741583;', '0000-00-00 00:00:00'),
('gctspjkr047i8k3uj8n1rn8npu42kuk7', '::1', '', 0, '', '__ci_last_regenerate|i:1553285705;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('gi0i570f8fhvsj1uhne2i126etkjl9ij', '::1', '', 0, '', '__ci_last_regenerate|i:1553627736;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('h991a3dj4sen2j6fr1lhpsi668f4hkb0', '::1', '', 0, '', '__ci_last_regenerate|i:1553750018;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('ibvlal6pi09uf49k3vefcqmrh744cc1p', '::1', '', 0, '', '__ci_last_regenerate|i:1553706451;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('if5nhntvknn8ajir89mck3073amvqdsd', '::1', '', 0, '', '__ci_last_regenerate|i:1553665827;', '0000-00-00 00:00:00'),
('ijii9uq8j8a836q3jq48694sh5bqs4uv', '::1', '', 0, '', '__ci_last_regenerate|i:1553709119;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('ijj3ifqgqmo6bp3pgil3naisn2amfj69', '::1', '', 0, '', '__ci_last_regenerate|i:1553388246;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('inlga56cjdjii3l6h938s34g9bq3m5cc', '::1', '', 0, '', '__ci_last_regenerate|i:1553666563;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('ivqeqke3j4qkrje0ianrg4nkhj0uef85', '::1', '', 0, '', '__ci_last_regenerate|i:1553380559;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('j5u6jfevabhspsqmk98kmvoeuev7r60h', '::1', '', 0, '', '__ci_last_regenerate|i:1553629495;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('k2qt2os6otdltc0kvtv83lcva4pdg2pt', '::1', '', 0, '', '__ci_last_regenerate|i:1553675845;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('k3evj7cq0lif2cs1srduq2bvd6iur3dd', '::1', '', 0, '', '__ci_last_regenerate|i:1553747127;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('k6a4crgrp6sj7hvnc87vqqbj7me5o1ka', '::1', '', 0, '', '__ci_last_regenerate|i:1553699270;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('k8qmj67cv2cu4uol4mcqju1mrd91hm8t', '::1', '', 0, '', '__ci_last_regenerate|i:1553286486;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('l3j2bqnjc3g7i1fvu1qj7f8f9vvq9jdb', '::1', '', 0, '', '__ci_last_regenerate|i:1553617205;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('lbqbpaqcd9lval98h04psbaa6j8qds93', '::1', '', 0, '', '__ci_last_regenerate|i:1553632405;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('m0fmcs358409440aofoa6ff1cm98b7o6', '::1', '', 0, '', '__ci_last_regenerate|i:1553388549;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('m3mv3fhqotc9h75dgbesveqj70cneara', '::1', '', 0, '', '__ci_last_regenerate|i:1553379116;', '0000-00-00 00:00:00'),
('m4jeo3mqrb1i7n3u0ao8r5aolffcs70o', '::1', '', 0, '', '__ci_last_regenerate|i:1553629173;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('me69vpjm2vfsodp5puk97kj7qofsbo9d', '::1', '', 0, '', '__ci_last_regenerate|i:1553625828;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('nq2mqbfsmnufhunup8qj9et1urmfeqv1', '::1', '', 0, '', '__ci_last_regenerate|i:1553631392;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('nt5vq2n57c238v6pmm7qm0uhuo7rh41e', '::1', '', 0, '', '__ci_last_regenerate|i:1553627284;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('oo49s2venk3ogi5sc4o087hfke2jehik', '::1', '', 0, '', '__ci_last_regenerate|i:1553389297;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('opdtih6t3v53k56r3927iajr24jqpj3s', '::1', '', 0, '', '__ci_last_regenerate|i:1553567902;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('p18qijmgsfogfsuet4qt7g3nupnf3nru', '::1', '', 0, '', '__ci_last_regenerate|i:1553633301;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('p8vih3qrdb4o20hmqehg01fbbairiojp', '::1', '', 0, '', '__ci_last_regenerate|i:1553741595;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('pccoc1i1njdc7d9h7i8rgrmgdb52cbpa', '::1', '', 0, '', '__ci_last_regenerate|i:1553707346;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('pjl4mob6d9a9l1p2f4bfhrejea865evh', '::1', '', 0, '', '__ci_last_regenerate|i:1553709539;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('prs9n3kr8ll98155vmkd8mlihup3feg0', '::1', '', 0, '', '__ci_last_regenerate|i:1553671730;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('psul6iple4sl5ncvn32j4mo491sefb4u', '::1', '', 0, '', '__ci_last_regenerate|i:1553626160;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('qb9l4mrincq609sht1hpsv60n6n3k1hv', '::1', '', 0, '', '__ci_last_regenerate|i:1553711932;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('qbriu91phaq2adpgedqpjh1dnappl7h3', '::1', '', 0, '', '__ci_last_regenerate|i:1553282017;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('qm9j2bd8q7u1vsh0mopo8k2708r3f8sl', '::1', '', 0, '', '__ci_last_regenerate|i:1553746699;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('rcgdbvtenggepdopt5s5gk8qo56hobcf', '::1', '', 0, '', '__ci_last_regenerate|i:1553704446;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('rjndao5fkd6f7khs2t5omv5g09g66hac', '::1', '', 0, '', '__ci_last_regenerate|i:1553530255;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('rpou0m7mip484f99avbj1oidm1eprvon', '::1', '', 0, '', '__ci_last_regenerate|i:1553528087;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('rrksu4h8qt64q1c6hm5frqibp6u8bs6s', '::1', '', 0, '', '__ci_last_regenerate|i:1553667442;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('sbaa4oocijp9h672gkv8s4j37pq9j3co', '::1', '', 0, '', '__ci_last_regenerate|i:1553675242;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('tantkvt14alk45p6sgcs2gpqo24ap417', '::1', '', 0, '', '__ci_last_regenerate|i:1553665827;', '0000-00-00 00:00:00'),
('tebqe8k83n6bo3jqj0e573me46l5l71c', '::1', '', 0, '', '__ci_last_regenerate|i:1553622612;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('tmmmh7rtta4m0toqt1b4cjh6uanhkjuf', '::1', '', 0, '', '__ci_last_regenerate|i:1553545797;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('u686iej580n0j4a1be6l1rda2m8r10tr', '::1', '', 0, '', '__ci_last_regenerate|i:1553799142;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('u72ievrsup3naeo9tmbm6rkaq46611ii', '::1', '', 0, '', '__ci_last_regenerate|i:1553673053;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('ugmvj1o8umsij6eeef33i6n791b1otp1', '::1', '', 0, '', '__ci_last_regenerate|i:1553635137;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('ut7uga0hfc07lhppd5sg4c20mpbscv6t', '::1', '', 0, '', '__ci_last_regenerate|i:1553631852;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('uvkkjrt60cjhivvpm211670n7edti5qq', '::1', '', 0, '', '__ci_last_regenerate|i:1553749578;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('v4dsie14l4rrr227us3icmkhog2hq9fk', '::1', '', 0, '', '__ci_last_regenerate|i:1553671308;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00'),
('vctrjm39rnht38jk0tg8lctv9mmafp17', '::1', '', 0, '', '__ci_last_regenerate|i:1553632969;', '0000-00-00 00:00:00'),
('ve37humg2u0ov79sqc5co0gj4ust1hep', '::1', '', 0, '', '__ci_last_regenerate|i:1553617522;nombre|s:6:"Alonso";privilegio|s:21:"Administrador General";id_privilegio|s:1:"1";id_usuario|s:1:"1";id_persona|s:1:"1";logged_in|b:1;', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion`
--

CREATE TABLE `clasificacion` (
  `id_clasificacion` int(11) NOT NULL,
  `nombre_clasificacion` varchar(50) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `identificador_c` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clasificacion`
--

INSERT INTO `clasificacion` (`id_clasificacion`, `nombre_clasificacion`, `descripcion`, `identificador_c`) VALUES
(1, 'Otro', 'No cuenta con ningún RPM registrado', 'N'),
(2, 'Construcción', 'qwdwqdefwfd', 'CR'),
(3, 'Comercio', 'Registro público municipal orientado principalmente a todo aquello relacionado con el intercambio de vienes.', 'CM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencia`
--

CREATE TABLE `dependencia` (
  `id_depe` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descrip` varchar(200) NOT NULL,
  `siglas` varchar(15) DEFAULT NULL,
  `id_dom` int(11) NOT NULL,
  `extension` varchar(20) DEFAULT NULL,
  `telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dependencia`
--

INSERT INTO `dependencia` (`id_depe`, `nombre`, `descrip`, `siglas`, `id_dom`, `extension`, `telefono`) VALUES
(1, 'Desarrollo de obras públicas', 'ifijfiomdciom hubdibeiucb  dchdicoid', 'Dop', 1, '1', '133434345'),
(3, 'Obras públicas', 'se encarga de obras públicas', '', 1, '1', '12132435'),
(5, 'secretaria', 'sfewfefef', 'se', 2, '1', '2344445123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `id_dom` int(11) NOT NULL,
  `estado` varchar(70) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `calle` varchar(50) DEFAULT NULL,
  `num_int` int(11) DEFAULT NULL,
  `num_ext` int(11) DEFAULT NULL,
  `c_p` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `domicilio`
--

INSERT INTO `domicilio` (`id_dom`, `estado`, `municipio`, `colonia`, `calle`, `num_int`, `num_ext`, `c_p`) VALUES
(1, 'Querétaro', 'Coroneo', 'Altavista', 'bulevar', 57, 57, 1234),
(2, 'México', 'Tlatelalpan', 'cuahtemoc', 'weweer', 12, 14, 1234);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extensiones`
--

CREATE TABLE `extensiones` (
  `id_extension` int(11) NOT NULL,
  `extension` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `extensiones`
--

INSERT INTO `extensiones` (`id_extension`, `extension`) VALUES
(2, 2334);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha_tecnica`
--

CREATE TABLE `ficha_tecnica` (
  `id_ficha` int(11) NOT NULL,
  `validacion` varchar(2) NOT NULL,
  `consideraciones` text NOT NULL,
  `info_relevante` text NOT NULL,
  `fecha_elab` date NOT NULL,
  `fk_ts` int(11) NOT NULL,
  `fk_us` int(11) NOT NULL,
  `tiempo_res` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ficha_tecnica`
--

INSERT INTO `ficha_tecnica` (`id_ficha`, `validacion`, `consideraciones`, `info_relevante`, `fecha_elab`, `fk_ts`, `fk_us`, `tiempo_res`) VALUES
(4, 'NO', '- En caso de ser necesario presentarse en horario matutino', '- Los requisitos deberán ser legibles\r\n- La solicitud podrá ser llenada en computadora o a mano', '2019-03-27', 102, 1, '1 semana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fundamento_ts`
--

CREATE TABLE `fundamento_ts` (
  `id_tramite_fundamento` int(11) NOT NULL,
  `fk_ley` int(11) NOT NULL,
  `enunciado` varchar(100) NOT NULL,
  `fk_ts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fundamento_ts`
--

INSERT INTO `fundamento_ts` (`id_tramite_fundamento`, `fk_ley`, `enunciado`, `fk_ts`) VALUES
(7, 4, 'art.2, X,XI', 99),
(8, 3, 'art.6, III', 99),
(9, 4, 'art.2, X,XI', 100),
(10, 4, 'art.2, X,XI', 101),
(11, 3, 'art.6, III', 101),
(12, 4, 'art.2, X,XI', 102);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL,
  `dias` varchar(20) NOT NULL,
  `horas` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id_horario`, `dias`, `horas`) VALUES
(1, 'Lunes - Viernes', '09:00 - 15:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leyes`
--

CREATE TABLE `leyes` (
  `id_ley` int(11) NOT NULL,
  `titulo` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `leyes`
--

INSERT INTO `leyes` (`id_ley`, `titulo`) VALUES
(3, 'Constitución Política de los Estados Unidos Mexicano'),
(4, 'Ley de ingresos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medios`
--

CREATE TABLE `medios` (
  `id_medio` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `medios`
--

INSERT INTO `medios` (`id_medio`, `nombre`) VALUES
(2, 'CORREO ELECTRÓNICO'),
(3, 'TELÉFONO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidades`
--

CREATE TABLE `modalidades` (
  `id_modalidad` int(11) NOT NULL,
  `nombre_modalidad` varchar(30) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `identificador` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modalidades`
--

INSERT INTO `modalidades` (`id_modalidad`, `nombre_modalidad`, `descripcion`, `identificador`) VALUES
(1, 'No aplica', 'No tiene modalidad', 'N'),
(2, 'Alta', 'Modalidad básica para crear un nuevo registro.', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasos`
--

CREATE TABLE `pasos` (
  `id_paso` int(11) NOT NULL,
  `descripcion_paso` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pasos`
--

INSERT INTO `pasos` (`id_paso`, `descripcion_paso`) VALUES
(7, 'yiyiyi '),
(8, 'lalalal'),
(9, 'cucucu'),
(10, 'mirmirmir'),
(11, 'jijii'),
(12, 'yiyiyi '),
(13, 'cucucu'),
(14, 'yiyiyi '),
(15, 'nioniom'),
(16, 'yiyiyi '),
(17, 'cucucu'),
(18, 'mirmirmir'),
(19, 'presentarse en la dependencia correspondiente'),
(20, 'presentar solicitud llenada correctamente'),
(21, 'presentar requisitos de forma completa'),
(22, 'presentarse en presidencia'),
(23, 'llenar solicitud'),
(24, 'presentarse en la dependencia correspondiente'),
(25, 'presentar solicitud llenada correctamente'),
(26, 'presentar requisitos de forma completa'),
(27, 'Llenar solicitud con la información requerida'),
(28, 'presentar la solicitud ante la dependencia correspondiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(255) NOT NULL,
  `nombres` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `ape_pat` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `ape_mat` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `genero` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `num_empleado` int(5) DEFAULT NULL,
  `id_area` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `nombres`, `ape_pat`, `ape_mat`, `fecha_nac`, `genero`, `num_empleado`, `id_area`, `id_cargo`, `correo`) VALUES
(1, 'Alonso', 'Fernández', 'López', '1970-01-09', 'M', 0, 1, 0, 'usuario@correo.com'),
(4, 'Claudia Flor', 'Medina', 'Aguilar', '1992-08-17', 'F', 0, 1, 0, 'claudiaflormedina@yahoo.com'),
(5, 'Elvira', 'Medina', 'Hernández', '1987-12-14', 'F', 9991, 1, 1, 'elvis123@gmail.com'),
(6, 'Jesusa', 'Altamira', 'Robledo', '1978-10-18', 'F', 8523, 2, 1, 'jesusitalove@gmail.com'),
(7, 'Luis', 'Vega', 'Pérez', '1993-03-10', 'M', 7921, 2, 2, 'luisitotirarostro@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegio`
--

CREATE TABLE `privilegio` (
  `id_privilegio` int(11) NOT NULL,
  `nombre_privilegio` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `publico` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `privilegio`
--

INSERT INTO `privilegio` (`id_privilegio`, `nombre_privilegio`, `descripcion`, `publico`) VALUES
(1, 'Administrador General', 'Tiene acceso a todas las secciones del sistema', 0),
(3, 'Público', 'privilegio básico de ingreso al sistema', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegio_seccion`
--

CREATE TABLE `privilegio_seccion` (
  `id_privilegio` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `orden` int(11) NOT NULL,
  `menu` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `privilegio_seccion`
--

INSERT INTO `privilegio_seccion` (`id_privilegio`, `id_seccion`, `orden`, `menu`) VALUES
(1, 1, 1, 1),
(1, 2, 2, 1),
(1, 3, 0, 1),
(1, 4, 0, 1),
(1, 5, 5, 1),
(1, 6, 6, 1),
(1, 7, 7, 1),
(1, 8, 8, 1),
(1, 9, 9, 1),
(1, 10, 0, 1),
(1, 11, 11, 1),
(1, 12, 0, 1),
(1, 14, 0, 1),
(1, 15, 0, 1),
(1, 16, 0, 1),
(1, 17, 0, 1),
(1, 18, 0, 1),
(1, 19, 0, 1),
(1, 20, 0, 1),
(1, 21, 0, 1),
(1, 22, 0, 1),
(1, 23, 0, 1),
(1, 24, 0, 1),
(1, 25, 0, 1),
(1, 26, 0, 1),
(1, 27, 0, 1),
(1, 28, 0, 1),
(1, 29, 0, 1),
(1, 30, 0, 1),
(1, 31, 0, 1),
(1, 32, 0, 1),
(1, 33, 0, 1),
(1, 34, 0, 1),
(1, 35, 0, 1),
(1, 36, 0, 1),
(1, 37, 0, 1),
(1, 38, 0, 1),
(1, 39, 0, 1),
(1, 40, 0, 1),
(1, 41, 0, 1),
(1, 42, 0, 1),
(1, 43, 0, 1),
(1, 44, 0, 1),
(1, 45, 0, 1),
(1, 46, 0, 1),
(1, 47, 0, 1),
(1, 48, 0, 1),
(1, 99, 99, 1),
(2, 1, 0, 1),
(2, 2, 0, 1),
(2, 12, 0, 1),
(2, 14, 0, 1),
(2, 16, 0, 1),
(3, 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quien_ambito_aplicacion`
--

CREATE TABLE `quien_ambito_aplicacion` (
  `id_quien_ambito_ts` int(11) NOT NULL,
  `fk_quien_p` int(11) NOT NULL,
  `fk_ambito_de_a` int(11) NOT NULL,
  `fk_ts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `quien_ambito_aplicacion`
--

INSERT INTO `quien_ambito_aplicacion` (`id_quien_ambito_ts`, `fk_quien_p`, `fk_ambito_de_a`, `fk_ts`) VALUES
(6, 2, 3, 7),
(7, 2, 3, 8),
(8, 2, 3, 9),
(9, 2, 3, 10),
(10, 2, 3, 11),
(11, 2, 3, 12),
(12, 2, 3, 13),
(13, 2, 3, 14),
(14, 2, 3, 15),
(15, 2, 3, 16),
(16, 2, 3, 17),
(17, 2, 3, 18),
(18, 2, 3, 19),
(19, 2, 3, 20),
(20, 2, 3, 21),
(21, 2, 3, 22),
(22, 2, 3, 23),
(23, 2, 3, 24),
(24, 2, 3, 25),
(25, 2, 3, 26),
(26, 2, 3, 27),
(27, 2, 3, 28),
(28, 2, 3, 29),
(29, 2, 3, 30),
(30, 2, 3, 31),
(31, 2, 3, 32),
(32, 2, 3, 33),
(33, 2, 3, 34),
(34, 2, 3, 35),
(35, 2, 3, 36),
(36, 2, 3, 37),
(37, 2, 3, 38),
(38, 2, 3, 39),
(39, 2, 3, 40),
(40, 2, 3, 41),
(41, 2, 3, 42),
(42, 2, 3, 43),
(43, 2, 3, 44),
(44, 2, 3, 45),
(45, 2, 3, 46),
(46, 2, 3, 47),
(47, 2, 3, 48),
(48, 2, 3, 49),
(49, 2, 3, 50),
(50, 2, 3, 51),
(51, 2, 3, 52),
(52, 1, 2, 53),
(53, 2, 2, 53),
(54, 2, 3, 54),
(55, 2, 3, 55),
(56, 1, 1, 56),
(57, 1, 3, 57),
(58, 2, 3, 57),
(59, 3, 3, 57),
(60, 2, 3, 58),
(61, 1, 3, 59),
(62, 2, 3, 59),
(63, 1, 3, 60),
(64, 2, 3, 60),
(65, 1, 3, 61),
(66, 2, 3, 61),
(67, 1, 3, 62),
(68, 2, 3, 62),
(69, 1, 3, 63),
(70, 2, 3, 63),
(71, 1, 3, 64),
(72, 2, 3, 64),
(73, 2, 3, 65),
(74, 2, 3, 66),
(75, 2, 3, 67),
(76, 3, 3, 68),
(77, 3, 3, 69),
(78, 1, 2, 70),
(79, 3, 2, 70),
(80, 2, 3, 71),
(81, 2, 3, 72),
(82, 2, 3, 73),
(83, 2, 3, 74),
(84, 2, 3, 75),
(85, 2, 3, 76),
(86, 2, 3, 77),
(87, 2, 3, 78),
(88, 2, 3, 79),
(89, 2, 3, 80),
(90, 1, 3, 81),
(91, 2, 3, 81),
(92, 2, 2, 82),
(93, 1, 1, 83),
(94, 3, 1, 83),
(95, 2, 3, 84),
(96, 2, 3, 85),
(97, 2, 3, 86),
(98, 3, 3, 87),
(99, 3, 3, 88),
(100, 3, 3, 89),
(101, 3, 3, 90),
(102, 3, 3, 91),
(103, 3, 3, 92),
(104, 1, 1, 93),
(105, 2, 1, 94),
(106, 3, 1, 94),
(107, 3, 2, 95),
(108, 1, 1, 96),
(109, 2, 1, 96),
(110, 3, 1, 96),
(111, 1, 2, 97),
(112, 2, 2, 97),
(113, 3, 2, 97),
(114, 1, 3, 98),
(115, 2, 3, 98),
(116, 2, 1, 99),
(117, 3, 1, 99),
(118, 1, 3, 100),
(119, 2, 3, 100),
(120, 3, 3, 100),
(121, 2, 3, 101),
(122, 1, 3, 102),
(123, 2, 3, 102),
(124, 3, 3, 102);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quien_puede`
--

CREATE TABLE `quien_puede` (
  `id_quien_p` int(11) NOT NULL,
  `nombre_q` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `quien_puede`
--

INSERT INTO `quien_puede` (`id_quien_p`, `nombre_q`) VALUES
(1, 'Representante'),
(2, 'Interesado'),
(3, 'Terceros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requisitos`
--

CREATE TABLE `requisitos` (
  `id_requisito` int(11) NOT NULL,
  `descripcion_req` varchar(255) DEFAULT NULL,
  `fk_ts` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `requisitos`
--

INSERT INTO `requisitos` (`id_requisito`, `descripcion_req`, `fk_ts`) VALUES
(11, 'derecho de suelo', 99),
(12, 'Acta de nacimiento', 1),
(13, 'Solicitud del servicio', 1),
(14, 'INE', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requisitos_ts`
--

CREATE TABLE `requisitos_ts` (
  `id_req_ts` int(11) NOT NULL,
  `fk_ts` int(11) NOT NULL,
  `fk_requisito` int(11) NOT NULL,
  `fk_archivo` int(11) DEFAULT NULL,
  `fk_cantidad` int(11) DEFAULT NULL,
  `orden` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `requisitos_ts`
--

INSERT INTO `requisitos_ts` (`id_req_ts`, `fk_ts`, `fk_requisito`, `fk_archivo`, `fk_cantidad`, `orden`) VALUES
(39, 99, 11, NULL, 55, 1),
(40, 99, 12, NULL, 56, 2),
(41, 100, 12, NULL, 57, 1),
(42, 101, 12, NULL, 58, 1),
(43, 101, 11, NULL, 59, 2),
(44, 102, 13, NULL, 60, 1),
(45, 102, 14, NULL, 61, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requisito_externo`
--

CREATE TABLE `requisito_externo` (
  `id_req_ext` int(11) NOT NULL,
  `institucion` varchar(50) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `fk_requisito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `requisito_externo`
--

INSERT INTO `requisito_externo` (`id_req_ext`, `institucion`, `direccion`, `fk_requisito`) VALUES
(1, 'Departamento de suelos', 'weweer, cuahtemoc', 10),
(2, 'Departamento de suelos', 'weweer, cuahtemoc', 11),
(3, 'Departamento de suelos', 'weweer, cuahtemoc', 11),
(4, 'Instituto Nacional Electoral', 'Módulo Corregidora, El pueblito, avenida candiles,#19', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `id_seccion` int(11) NOT NULL,
  `nombre_seccion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `icono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`id_seccion`, `nombre_seccion`, `icono`, `descripcion`, `url`, `activo`) VALUES
(1, 'Principal', '', 'Página principal del Panel de administración.', 'panel', 1),
(2, 'Error', '', 'Página de error.', 'error', 0),
(3, 'Privilegios', '', 'Gestiona los perfiles de usuario con.', 'privilegios', 1),
(4, 'Alta de privilegio', '', 'Alta de un nuevo privilegio', 'alta_privilegio', NULL),
(5, 'Edita privilegio', '', 'Actualización del nombre de un privilegio.', 'edita_privilegio', 0),
(6, 'Secciones', '', 'Gestión de secciones', 'secciones', 1),
(7, 'Edita sección', '', 'Edita las secciones del panel de administración', 'edita_seccion', 0),
(8, 'Privilegios y secciones', '', 'Asigna secciones a un privilegio', 'privilegio_seccion', 1),
(9, 'Agrega sección', '', 'Agrega y elimina secciones a un privilegio', 'alta_seccion', 0),
(11, 'Agrega sección a privilegio', '', 'Agrega una sección a un privilegio', 'agrega_seccion', NULL),
(12, 'Salir', '', 'Cierra la sesión', 'salir', NULL),
(13, 'Rosario', '', 'Desc', 'rosario', 1),
(14, 'Dependencias', '', 'Sección para administrar las dependencias ', 'dependencias', NULL),
(15, 'Agregar dependencia', '', 'formulario para dar de alta las dependencias en el sistema', 'alta_dependencia', NULL),
(16, 'Catálogos', '', 'Sección para realizar la administración de todos los catálogos del sistema', 'catalogos', 1),
(17, 'Edición de dependencia', '', 'Edita información sobre la dependencia en cuestión', 'edita_dependencia', NULL),
(18, 'Horarios', '', 'Gestión de los distintos horarios de los servidores públicos de Huimilpan', 'horarios', NULL),
(19, 'Alta de horarios', '', 'Gestor de los distintos horarios que se establecen en la presidencia n', 'alta_horario', NULL),
(20, 'Medios', '', 'Gestión de los medios de comunicación', 'medios', NULL),
(21, 'Elimina medio', '', 'Elimina medio', 'elimina_medio', NULL),
(22, 'Alta de áreas', '', 'Administra las áreas de las dependencias municipales', 'alta_areas', NULL),
(23, 'Áreas', '', 'Gestiona las áreas de las dependencias', 'areas', NULL),
(24, 'Edita áreas', '', 'Sección para modificar la información de las áreas', 'edita_area', NULL),
(25, 'cargos', '', 'Gestión de cargos de usuarios', 'cargos', NULL),
(26, 'Alta de cargos', '', 'Genera nuevos cargos para los usuarios del sistema', 'alta_cargo', NULL),
(27, 'Usuarios', '', 'Apartado para la gestión de usuarios del sistema', 'usuarios', 1),
(28, 'Asigna privilegio', '', 'Apartado para asignar privilegios', 'asigna_privilegio', NULL),
(29, 'Clasificación (RPM)', '', 'Muestra las clasificaciones que existen de acuerdo a los Registros Públicos Municipales', 'clasificaciones', NULL),
(30, 'Modalidades', '', 'Muestra las distintas modalidades que aplican para los trámites ', 'modalidades', NULL),
(31, 'Alta modalidad', '', 'Sección que permite dar de alta una nueva modalidad', 'alta_modalidad', NULL),
(32, 'Alta de clasificación', '', 'Sección que permite dar de alta alguna clasificación (registros públicos municipales)', 'alta_clasificacion', NULL),
(33, 'Edición de modalidades', '', 'Sección que permite realizar cambios al catálogo de modalidades ', 'edita_modalidad', NULL),
(34, 'Edición de Clasificaciones (RP', '', 'Sección que permite realizar cambios al catálogo de clasificaciones o registros público municipales', 'edita_clasificacion', NULL),
(35, 'Crear ficha técnica', '', 'Paso 1: sobre el trámite y servicio', 'alta_fichat_1', 1),
(36, 'Alta de Leyes', '', 'Se realiza el alta de una nueva ley', 'alta_leyes', NULL),
(37, 'Elimina ley', '', 'eliminación de leyes', 'elimina_ley', NULL),
(38, 'Alta de extensiones', '', 'Formulario  donde se agregan las extensiones', 'alta_extension', NULL),
(39, 'Extensiones', '', 'Muestra todas las extensiones que han sido dadas de alta', 'extensiones', NULL),
(40, 'paso 2', '', 'Segundo paso para creación de ficha técnica', 'alta_fichat_2_1', NULL),
(41, 'paso 3', '', 'Tercer paso para creación de ficha técnica', 'alta_fichat_3_1', NULL),
(42, 'Paso 4', '', 'El paso 4 para realizar una ficha técnica', 'alta_fichat_4', NULL),
(43, 'Elimina paso', '', 'Sección que permite eliminar un registro del paso en el trámite', 'elimina_ts_paso', NULL),
(44, 'Elimina requisito', '', 'Sección que permite eliminar un registro de requisitos del trámite/servicio', 'elimina_ts_requisito', NULL),
(45, 'Leyes', '', 'Sección que muestra las disposiciones existentes', 'leyes', NULL),
(46, 'paso 5', '', 'Paso 5: sobre aspectos generales del trámite/servicio', 'alta_fichat_5', NULL),
(47, 'Mis fichas técnicas', '', 'Sección que me permite visualizar las fichas técnicas que he creado', 'mis_fichas', 1),
(48, 'fichas', '', 'visualización de todas las fichas tecnica', 'fichas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_medio_usuario`
--

CREATE TABLE `tipo_medio_usuario` (
  `id_medio_persona` int(11) NOT NULL,
  `dato` varchar(100) NOT NULL,
  `fk_medio` int(11) NOT NULL,
  `fk_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_medio_usuario`
--

INSERT INTO `tipo_medio_usuario` (`id_medio_persona`, `dato`, `fk_medio`, `fk_persona`) VALUES
(1, 'claudiaflormedina@yahoo.com', 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites_servicios`
--

CREATE TABLE `tramites_servicios` (
  `id_ts` int(11) NOT NULL,
  `nombre_ts` varchar(100) NOT NULL,
  `clave` varchar(25) DEFAULT NULL,
  `descripcion_ft` varchar(250) NOT NULL,
  `en_caso_de` varchar(85) NOT NULL,
  `tipo` char(1) NOT NULL,
  `vigencia` varchar(20) DEFAULT NULL,
  `fk_modalidad` int(11) NOT NULL,
  `fk_rpm` int(11) NOT NULL,
  `costo` float DEFAULT NULL,
  `concepto_pago` varchar(40) DEFAULT NULL,
  `fk_archivo` int(11) DEFAULT NULL,
  `ficta` char(1) NOT NULL,
  `producto_final` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tramites_servicios`
--

INSERT INTO `tramites_servicios` (`id_ts`, `nombre_ts`, `clave`, `descripcion_ft`, `en_caso_de`, `tipo`, `vigencia`, `fk_modalidad`, `fk_rpm`, `costo`, `concepto_pago`, `fk_archivo`, `ficta`, `producto_final`) VALUES
(1, 'NA', 'NA', 'NA', 'NA', 'T', NULL, 0, 0, NULL, NULL, NULL, 'N', 'N'),
(98, 'Pie de casa', 'HUI-SER-98', 'lololo ', 'Una familia de bajos recursos no cuente con casa propia', 'S', '12 meses', 2, 2, 30, 'por documento', NULL, 'P', 'Pie de casa: 2 habitaciones, 1 baño completo, cocina/comedor y sala'),
(99, 'Pie de casa', 'HUI-TRA-99', 'shalala lalala', 'Una familia de bajos recursos no cuente con casa propia', 'T', '12 meses', 2, 2, 14000, 'Por apoyo', NULL, 'N', 'Pie de casa: 2 habitaciones, 1 baño completo, cocina/comedor y sala'),
(100, 'Pie de casa', 'HUI-SER-100', 'cucucucucu ', 'Una familia de bajos recursos no cuente con casa propia', 'S', '12 meses', 1, 2, 30, 'Por apoyo', NULL, 'P', 'Pie de casa: 2 habitaciones, 1 baño completo, cocina/comedor y sala'),
(101, 'Constancia de residencia', 'HUI-TRA-101', 'bla bla bla bla', 'Un ciudadano desee acreditar su residencia en el municipio', 'T', '12 meses', 1, 1, 30, 'Por apoyo', NULL, 'P', 'Constancia'),
(102, 'Poda de árboles', 'HUI-SER-102', 'sholooooooooooooooooooooooooooo', 'Un ciudadano levante una demanda por obstrucción de la vía pública.', 'S', '', 1, 1, 0, '', NULL, 'P', 'árboles podadps');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ts_pasos`
--

CREATE TABLE `ts_pasos` (
  `id_ts_pasos` int(11) NOT NULL,
  `fk_ts` int(11) NOT NULL,
  `fk_paso` int(11) NOT NULL,
  `orden` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ts_pasos`
--

INSERT INTO `ts_pasos` (`id_ts_pasos`, `fk_ts`, `fk_paso`, `orden`) VALUES
(40, 95, 12, 1),
(42, 96, 14, 1),
(43, 96, 15, 2),
(44, 97, 16, 1),
(45, 98, 17, 1),
(46, 98, 18, 2),
(47, 99, 19, 1),
(49, 99, 21, 2),
(50, 100, 22, 1),
(51, 100, 23, 2),
(52, 101, 24, 1),
(53, 101, 25, 2),
(54, 101, 26, 3),
(55, 102, 27, 1),
(56, 102, 28, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_persona` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `recupera` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `id_privilegio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `contrasena`, `id_persona`, `activo`, `recupera`, `id_privilegio`) VALUES
(1, 'usuario@correo.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '', 1),
(5, 'jesusitalove@gmail.com', 'a39e98c6b804cbd006dfe854eca086ce', 6, 1, '', 2),
(6, 'luisitotirarostro@gmail.com', 'a96229978ca3907743deda950743742c', 7, 1, '', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `versiones`
--

CREATE TABLE `versiones` (
  `id_version` int(11) NOT NULL,
  `version` smallint(3) NOT NULL,
  `fk_ficha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `versiones`
--

INSERT INTO `versiones` (`id_version`, `version`, `fk_ficha`) VALUES
(2, 1, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ambito_de_aplicacion`
--
ALTER TABLE `ambito_de_aplicacion`
  ADD PRIMARY KEY (`id_ambito_de_a`);

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id_archivo`);

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `cantidad`
--
ALTER TABLE `cantidad`
  ADD PRIMARY KEY (`id_cant`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indices de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  ADD PRIMARY KEY (`id_clasificacion`);

--
-- Indices de la tabla `dependencia`
--
ALTER TABLE `dependencia`
  ADD PRIMARY KEY (`id_depe`);

--
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`id_dom`);

--
-- Indices de la tabla `extensiones`
--
ALTER TABLE `extensiones`
  ADD PRIMARY KEY (`id_extension`);

--
-- Indices de la tabla `ficha_tecnica`
--
ALTER TABLE `ficha_tecnica`
  ADD PRIMARY KEY (`id_ficha`);

--
-- Indices de la tabla `fundamento_ts`
--
ALTER TABLE `fundamento_ts`
  ADD PRIMARY KEY (`id_tramite_fundamento`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indices de la tabla `leyes`
--
ALTER TABLE `leyes`
  ADD PRIMARY KEY (`id_ley`);

--
-- Indices de la tabla `medios`
--
ALTER TABLE `medios`
  ADD PRIMARY KEY (`id_medio`);

--
-- Indices de la tabla `modalidades`
--
ALTER TABLE `modalidades`
  ADD PRIMARY KEY (`id_modalidad`);

--
-- Indices de la tabla `pasos`
--
ALTER TABLE `pasos`
  ADD PRIMARY KEY (`id_paso`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `privilegio`
--
ALTER TABLE `privilegio`
  ADD PRIMARY KEY (`id_privilegio`);

--
-- Indices de la tabla `privilegio_seccion`
--
ALTER TABLE `privilegio_seccion`
  ADD PRIMARY KEY (`id_privilegio`,`id_seccion`);

--
-- Indices de la tabla `quien_ambito_aplicacion`
--
ALTER TABLE `quien_ambito_aplicacion`
  ADD PRIMARY KEY (`id_quien_ambito_ts`);

--
-- Indices de la tabla `quien_puede`
--
ALTER TABLE `quien_puede`
  ADD PRIMARY KEY (`id_quien_p`);

--
-- Indices de la tabla `requisitos`
--
ALTER TABLE `requisitos`
  ADD PRIMARY KEY (`id_requisito`);

--
-- Indices de la tabla `requisitos_ts`
--
ALTER TABLE `requisitos_ts`
  ADD PRIMARY KEY (`id_req_ts`);

--
-- Indices de la tabla `requisito_externo`
--
ALTER TABLE `requisito_externo`
  ADD PRIMARY KEY (`id_req_ext`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`id_seccion`);

--
-- Indices de la tabla `tipo_medio_usuario`
--
ALTER TABLE `tipo_medio_usuario`
  ADD PRIMARY KEY (`id_medio_persona`);

--
-- Indices de la tabla `tramites_servicios`
--
ALTER TABLE `tramites_servicios`
  ADD PRIMARY KEY (`id_ts`);

--
-- Indices de la tabla `ts_pasos`
--
ALTER TABLE `ts_pasos`
  ADD PRIMARY KEY (`id_ts_pasos`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `versiones`
--
ALTER TABLE `versiones`
  ADD PRIMARY KEY (`id_version`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ambito_de_aplicacion`
--
ALTER TABLE `ambito_de_aplicacion`
  MODIFY `id_ambito_de_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cantidad`
--
ALTER TABLE `cantidad`
  MODIFY `id_cant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  MODIFY `id_clasificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `dependencia`
--
ALTER TABLE `dependencia`
  MODIFY `id_depe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `id_dom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `extensiones`
--
ALTER TABLE `extensiones`
  MODIFY `id_extension` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ficha_tecnica`
--
ALTER TABLE `ficha_tecnica`
  MODIFY `id_ficha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `fundamento_ts`
--
ALTER TABLE `fundamento_ts`
  MODIFY `id_tramite_fundamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `leyes`
--
ALTER TABLE `leyes`
  MODIFY `id_ley` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `medios`
--
ALTER TABLE `medios`
  MODIFY `id_medio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `modalidades`
--
ALTER TABLE `modalidades`
  MODIFY `id_modalidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pasos`
--
ALTER TABLE `pasos`
  MODIFY `id_paso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `privilegio`
--
ALTER TABLE `privilegio`
  MODIFY `id_privilegio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `quien_ambito_aplicacion`
--
ALTER TABLE `quien_ambito_aplicacion`
  MODIFY `id_quien_ambito_ts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT de la tabla `quien_puede`
--
ALTER TABLE `quien_puede`
  MODIFY `id_quien_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `requisitos`
--
ALTER TABLE `requisitos`
  MODIFY `id_requisito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `requisitos_ts`
--
ALTER TABLE `requisitos_ts`
  MODIFY `id_req_ts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `requisito_externo`
--
ALTER TABLE `requisito_externo`
  MODIFY `id_req_ext` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `id_seccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT de la tabla `tipo_medio_usuario`
--
ALTER TABLE `tipo_medio_usuario`
  MODIFY `id_medio_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tramites_servicios`
--
ALTER TABLE `tramites_servicios`
  MODIFY `id_ts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT de la tabla `ts_pasos`
--
ALTER TABLE `ts_pasos`
  MODIFY `id_ts_pasos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `versiones`
--
ALTER TABLE `versiones`
  MODIFY `id_version` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
