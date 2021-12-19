-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2021 a las 04:45:27
-- Versión del servidor: 8.0.20
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mrfbermejobd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aalumno`
--

CREATE TABLE `aalumno` (
  `facodmie` varchar(10) NOT NULL,
  `pacodalu` varchar(10) NOT NULL,
  `caestalu` tinyint(1) NOT NULL
);

--
-- Volcado de datos para la tabla `aalumno`
--

INSERT INTO `aalumno` (`facodmie`, `pacodalu`, `caestalu`) VALUES
('MBR-000004', 'ALU-000001', 1),
('MBR-000005', 'ALU-000002', 1),
('MBR-000002', 'ALU-000004', 0),
('MBR-000006', 'ALU-000005', 1),
('MBR-000008', 'ALU-000006', 1),
('MBR-000007', 'ALU-000007', 1),
('MBR-000009', 'ALU-000008', 1),
('MBR-000010', 'ALU-000009', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aarqcaj`
--

CREATE TABLE `aarqcaj` (
  `pacodcaj` varchar(10) NOT NULL,
  `cainicaj` date NOT NULL,
  `cafincaj` date DEFAULT NULL,
  `camonini` decimal(10,2) NOT NULL,
  `camonfin` decimal(10,2) DEFAULT NULL,
  `caestcaj` tinyint(1) NOT NULL,
  `catoting` decimal(10,2) DEFAULT NULL,
  `catotegr` decimal(10,2) DEFAULT NULL
);

--
-- Volcado de datos para la tabla `aarqcaj`
--

INSERT INTO `aarqcaj` (`pacodcaj`, `cainicaj`, `cafincaj`, `camonini`, `camonfin`, `caestcaj`, `catoting`, `catotegr`) VALUES
('CAJ-000001', '2021-11-26', '2021-12-01', '250.00', '245.59', 0, '963.59', '968.00'),
('CAJ-000002', '2021-12-01', '2021-12-01', '245.59', '423.59', 0, '1245.00', '1067.00'),
('CAJ-000004', '2021-12-11', '2021-12-11', '423.59', '528.79', 0, '763.00', '657.80');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abardir`
--

CREATE TABLE `abardir` (
  `caestbar` tinyint(1) NOT NULL,
  `canombar` varchar(30) NOT NULL,
  `pacodbar` varchar(10) NOT NULL
);

--
-- Volcado de datos para la tabla `abardir`
--

INSERT INTO `abardir` (`caestbar`, `canombar`, `pacodbar`) VALUES
(1, 'BOLIVAR', 'BAR-000001'),
(1, 'MUNICIPAL', 'BAR-000002'),
(1, 'AEROPUERTO', 'BAR-000003'),
(1, 'MOTO MENDEZ', 'BAR-000005'),
(1, 'CENTRAL', 'BAR-000006'),
(1, 'SAN JOSE', 'BAR-000008'),
(1, 'CENTRAL', 'BAR-000009'),
(1, 'MUNICIPAL', 'BAR-000010'),
(1, 'LINDO', 'BAR-000011'),
(1, 'BOLIVAR', 'BAR-000012'),
(1, 'AEROPUERTO', 'BAR-000013'),
(1, 'BOLIVAR', 'BAR-000014'),
(1, 'BOLIVAR', 'BAR-000015');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acaldir`
--

CREATE TABLE `acaldir` (
  `caestcal` tinyint(1) NOT NULL,
  `canomcal` varchar(30) NOT NULL,
  `pacodcal` varchar(10) NOT NULL
);

--
-- Volcado de datos para la tabla `acaldir`
--

INSERT INTO `acaldir` (`caestcal`, `canomcal`, `pacodcal`) VALUES
(1, 'LUIS DE FUENTES', 'CAL-000001'),
(1, 'COHABAMBA', 'CAL-000003'),
(1, 'PANDO', 'CAL-000005'),
(1, 'TARIJA', 'CAL-000006'),
(1, 'AMELLER', 'CAL-000008'),
(1, 'NILLS KLEMEN', 'CAL-000009'),
(1, 'LITORAL', 'CAL-000010'),
(1, 'LUIS DE FUENTES', 'CAL-000011'),
(1, 'MARISCAL ANDRES DE SANTA CRUZ', 'CAL-000012'),
(1, 'GERMAN BUSH', 'CAL-000013'),
(1, 'GERMAN BUSH', 'CAL-000014');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acelula`
--

CREATE TABLE `acelula` (
  `caestcel` tinyint(1) NOT NULL,
  `canomcel` varchar(30) NOT NULL,
  `canumcel` varchar(4) NOT NULL,
  `pacodcel` varchar(10) NOT NULL,
  `facodbar` varchar(10) NOT NULL,
  `calatcel` decimal(20,10) NOT NULL,
  `facodcal` varchar(10) NOT NULL,
  `calogcel` decimal(20,10) NOT NULL
);

--
-- Volcado de datos para la tabla `acelula`
--

INSERT INTO `acelula` (`caestcel`, `canomcel`, `canumcel`, `pacodcel`, `facodbar`, `calatcel`, `facodcal`, `calogcel`) VALUES
(1, 'ALFA Y OMEGA', '7', 'CEL-000001', 'BAR-000001', '-22.7358520702', 'CAL-000001', '-64.3363237281'),
(1, 'HEDEON', '1', 'CEL-000002', 'BAR-000001', '-22.7339152892', 'CAL-000001', '-64.3391561508'),
(1, 'TORRE FUERTE', '2', 'CEL-000003', 'BAR-000013', '-22.7321341223', 'CAL-000012', '-64.3395423889'),
(1, 'SOLDADOS DE CRISTO', '4', 'CEL-000004', 'BAR-000012', '-22.7368838492', 'CAL-000011', '-64.3355941772'),
(0, 'LEON DE JUDA', '6', 'CEL-000005', 'BAR-000001', '-22.7316591405', 'CAL-000001', '-64.3418169022'),
(1, 'HERALDOZ', '8', 'CEL-000008', 'BAR-000011', '-22.7352610444', 'CAL-000010', '-64.3390274048'),
(1, 'LEON DE JUDA', '9', 'CEL-000009', 'BAR-000010', '-22.7245738000', 'CAL-000009', '-64.3426752090'),
(1, 'CORDERO', '11', 'CEL-000010', 'BAR-000008', '-22.7267014198', 'CAL-000005', '-64.3381583691'),
(1, 'HIJOS DEL REY', '12', 'CEL-000011', 'BAR-000006', '-22.7329653364', 'CAL-000008', '-64.3430614471'),
(1, 'AGUILAS', '13', 'CEL-000012', 'BAR-000015', '-22.7349048164', 'CAL-000014', '-64.3392419815');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aciudad`
--

CREATE TABLE `aciudad` (
  `caestciu` tinyint(1) NOT NULL,
  `canomciu` varchar(30) NOT NULL,
  `pacodciu` varchar(10) NOT NULL
);

--
-- Volcado de datos para la tabla `aciudad`
--

INSERT INTO `aciudad` (`caestciu`, `canomciu`, `pacodciu`) VALUES
(1, 'BERMEJO', 'CIU-000001'),
(1, 'PADCAYA', 'CIU-000002'),
(1, 'TARIJA', 'CIU-000003'),
(1, 'VILLAMONTES', 'CIU-000004'),
(1, 'YACUIBA', 'CIU-000005'),
(1, 'SANTA CRUZ', 'CIU-000006'),
(1, 'COCHABAMBA', 'CIU-000007'),
(1, 'LA PAZ', 'CIU-000008'),
(1, 'ORURO', 'CIU-000009'),
(1, 'POTOSI', 'CIU-000010');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aconegr`
--

CREATE TABLE `aconegr` (
  `camonegr` int NOT NULL,
  `cadesegr` varchar(150) NOT NULL,
  `pacodegr` varchar(10) NOT NULL,
  `cafecegr` date DEFAULT NULL
);

--
-- Volcado de datos para la tabla `aconegr`
--

INSERT INTO `aconegr` (`camonegr`, `cadesegr`, `pacodegr`, `cafecegr`) VALUES
(200, 'SERVICIOS DE LIMPIEZA', 'EGR-000005', '2021-11-26'),
(120, 'SEGURIDAD', 'EGR-000006', '2021-11-26'),
(50, 'INSTRUMENTOS DE MUSICA', 'EGR-000007', '2021-11-26'),
(20, 'HERRAMIENTAS', 'EGR-000008', '2021-11-26'),
(482, 'OFRENDA MINISTERIAL(50%)', 'EGR-000013', '2021-12-01'),
(96, 'MISIONES(10%)', 'EGR-000014', '2021-12-01'),
(200, 'SERVICIOS DE LIMPIEZA', 'EGR-000015', '2021-12-01'),
(120, 'SEGURIDAD', 'EGR-000016', '2021-12-01'),
(623, 'OFRENDA MINISTERIAL(50%)', 'EGR-000017', '2021-12-01'),
(125, 'MISIONES(10%)', 'EGR-000018', '2021-12-01'),
(200, 'SERVICIOS DE LIMPIEZA', 'EGR-000019', '2021-12-11'),
(382, 'OFRENDA MINISTERIAL(50%)', 'EGR-000020', '2021-12-11'),
(76, 'MISIONES(10%)', 'EGR-000021', '2021-12-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aconfin`
--

CREATE TABLE `aconfin` (
  `caestapo` tinyint(1) NOT NULL,
  `cafecapo` date NOT NULL,
  `cahorapo` time(6) NOT NULL,
  `pacodapo` varchar(10) NOT NULL,
  `facodusu` varchar(10) NOT NULL,
  `facodcaj` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
);

--
-- Volcado de datos para la tabla `aconfin`
--

INSERT INTO `aconfin` (`caestapo`, `cafecapo`, `cahorapo`, `pacodapo`, `facodusu`, `facodcaj`) VALUES
(1, '2021-11-26', '22:36:00.000000', 'EGR-000005', 'USU-000004', 'CAJ-000001'),
(1, '2021-11-26', '22:09:00.000000', 'EGR-000006', 'USU-000004', 'CAJ-000001'),
(1, '2021-11-26', '22:22:00.000000', 'EGR-000007', 'USU-000004', 'CAJ-000001'),
(1, '2021-11-26', '22:44:00.000000', 'EGR-000008', 'USU-000004', 'CAJ-000001'),
(1, '2021-12-01', '01:56:00.000000', 'EGR-000013', 'USU-000004', 'CAJ-000001'),
(1, '2021-12-01', '01:56:00.000000', 'EGR-000014', 'USU-000004', 'CAJ-000001'),
(1, '2021-12-01', '20:57:00.000000', 'EGR-000015', 'USU-000004', 'CAJ-000002'),
(1, '2021-12-01', '20:57:00.000000', 'EGR-000016', 'USU-000004', 'CAJ-000002'),
(1, '2021-12-01', '10:40:00.000000', 'EGR-000017', 'USU-000004', 'CAJ-000002'),
(1, '2021-12-01', '10:40:00.000000', 'EGR-000018', 'USU-000004', 'CAJ-000002'),
(1, '2021-12-11', '17:54:00.000000', 'EGR-000019', 'USU-000001', 'CAJ-000004'),
(1, '2021-12-11', '05:56:00.000000', 'EGR-000020', 'USU-000001', 'CAJ-000004'),
(1, '2021-12-11', '05:56:00.000000', 'EGR-000021', 'USU-000001', 'CAJ-000004'),
(1, '2021-11-26', '22:36:00.000000', 'ING-000016', 'USU-000004', 'CAJ-000001'),
(1, '2021-11-26', '22:01:00.000000', 'ING-000017', 'USU-000004', 'CAJ-000001'),
(1, '2021-11-26', '22:02:00.000000', 'ING-000018', 'USU-000004', 'CAJ-000001'),
(1, '2021-11-26', '22:08:00.000000', 'ING-000019', 'USU-000004', 'CAJ-000001'),
(1, '2021-11-29', '21:33:00.000000', 'ING-000020', 'USU-000004', 'CAJ-000001'),
(1, '2021-11-29', '21:33:00.000000', 'ING-000021', 'USU-000004', 'CAJ-000001'),
(1, '2021-11-29', '21:33:00.000000', 'ING-000022', 'USU-000004', 'CAJ-000001'),
(1, '2021-11-29', '21:48:00.000000', 'ING-000023', 'USU-000004', 'CAJ-000001'),
(1, '2021-11-29', '21:48:00.000000', 'ING-000024', 'USU-000004', 'CAJ-000001'),
(1, '2021-11-29', '21:48:00.000000', 'ING-000025', 'USU-000004', 'CAJ-000001'),
(1, '2021-11-29', '21:49:00.000000', 'ING-000026', 'USU-000004', 'CAJ-000001'),
(1, '2021-12-01', '20:54:00.000000', 'ING-000027', 'USU-000004', 'CAJ-000002'),
(1, '2021-12-01', '20:54:00.000000', 'ING-000028', 'USU-000004', 'CAJ-000002'),
(1, '2021-12-01', '20:54:00.000000', 'ING-000029', 'USU-000004', 'CAJ-000002'),
(1, '2021-12-01', '20:55:00.000000', 'ING-000030', 'USU-000004', 'CAJ-000002'),
(1, '2021-12-01', '20:55:00.000000', 'ING-000031', 'USU-000004', 'CAJ-000002'),
(1, '2021-12-01', '20:55:00.000000', 'ING-000032', 'USU-000004', 'CAJ-000002'),
(1, '2021-12-11', '17:50:00.000000', 'ING-000033', 'USU-000001', 'CAJ-000004'),
(1, '2021-12-11', '17:51:00.000000', 'ING-000034', 'USU-000001', 'CAJ-000004');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aconido`
--

CREATE TABLE `aconido` (
  `cadescon` varchar(150) NOT NULL,
  `caestcon` tinyint(1) NOT NULL,
  `canommat` varchar(20) NOT NULL,
  `pacodcon` varchar(10) NOT NULL
);

--
-- Volcado de datos para la tabla `aconido`
--

INSERT INTO `aconido` (`cadescon`, `caestcon`, `canommat`, `pacodcon`) VALUES
('MODULO 1 DE LA ESCUELA DE LIDEREZ', 1, 'MODULO 1', 'CON-000001'),
('MARIO RODRIGUES', 0, 'MODULO 2', 'CON-000002'),
('TERCER MODULO DE LA ESCUELA DE LIDERES', 1, 'MODULO 3', 'CON-000003'),
('DESCRIPCIÓN', 0, 'HERMENÉUTICA', 'CON-000004'),
('DESCRIPC', 1, 'MODULO 2', 'CON-000005');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aconing`
--

CREATE TABLE `aconing` (
  `camoning` double(10,2) NOT NULL,
  `pacodeco` varchar(10) NOT NULL,
  `catiping` varchar(50) NOT NULL,
  `cafecing` date NOT NULL
);

--
-- Volcado de datos para la tabla `aconing`
--

INSERT INTO `aconing` (`camoning`, `pacodeco`, `catiping`, `cafecing`) VALUES
(200.00, 'ING-000016', 'DIEZMOS', '2021-11-26'),
(100.00, 'ING-000017', 'OFRENDAS', '2021-11-26'),
(50.59, 'ING-000018', 'OFRENDA DE CELULAS', '2021-11-26'),
(20.00, 'ING-000019', 'OFRENDA DE JOVENES', '2021-11-26'),
(300.00, 'ING-000020', 'DIEZMOS', '2021-11-29'),
(60.00, 'ING-000021', 'OFRENDA DE JOVENES', '2021-11-29'),
(30.00, 'ING-000022', 'OFRENDA DE CELULAS', '2021-11-29'),
(63.00, 'ING-000023', 'OFRENDAS', '2021-11-29'),
(52.00, 'ING-000024', 'OFRENDA AYUNO', '2021-11-29'),
(32.00, 'ING-000025', 'OTROS INGRESOS', '2021-11-29'),
(56.00, 'ING-000026', 'DIEZMOS', '2021-11-29'),
(200.00, 'ING-000027', 'DIEZMOS', '2021-12-01'),
(65.00, 'ING-000028', 'OFRENDAS', '2021-12-01'),
(300.00, 'ING-000029', 'OFRENDA DE CELULAS', '2021-12-01'),
(100.00, 'ING-000030', 'OFRENDA DE JOVENES', '2021-12-01'),
(80.00, 'ING-000031', 'OFRENDA AYUNO', '2021-12-01'),
(500.00, 'ING-000032', 'OTROS INGRESOS', '2021-12-01'),
(559.00, 'ING-000033', 'DIEZMOS', '2021-12-11'),
(204.00, 'ING-000034', 'OFRENDAS', '2021-12-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acreesp`
--

CREATE TABLE `acreesp` (
  `cafecenc` date DEFAULT NULL,
  `cafecbau` date DEFAULT NULL,
  `cafeccon` date DEFAULT NULL,
  `cafecigl` date DEFAULT NULL,
  `pacodcre` varchar(10) NOT NULL
);

--
-- Volcado de datos para la tabla `acreesp`
--

INSERT INTO `acreesp` (`cafecenc`, `cafecbau`, `cafeccon`, `cafecigl`, `pacodcre`) VALUES
('2018-02-01', '2021-10-14', '2021-10-21', '2021-10-27', 'MBR-000001'),
('0210-02-05', '2009-06-05', '2009-08-05', '2009-02-05', 'MBR-000002'),
('2006-02-25', '2006-05-09', '2005-08-06', '2006-02-05', 'MBR-000004'),
('2008-05-06', '2008-06-25', '2008-05-08', '2008-02-06', 'MBR-000005'),
('2017-03-10', '2019-08-10', '2019-10-11', '2019-08-16', 'MBR-000006'),
('2010-08-06', '2010-05-06', '2010-08-05', '2010-05-06', 'MBR-000007'),
('2008-08-06', '2008-05-06', '2008-08-06', '2008-05-06', 'MBR-000008'),
('2011-05-06', '2011-05-31', '2010-06-05', '2011-05-06', 'MBR-000009'),
('2017-07-14', '2017-03-16', '2017-02-08', '2017-07-14', 'MBR-000010');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acursom`
--

CREATE TABLE `acursom` (
  `cadescur` varchar(15) NOT NULL,
  `caestcur` tinyint(1) NOT NULL,
  `cafecini` date NOT NULL,
  `cagescur` varchar(4) NOT NULL,
  `facodcon` varchar(10) NOT NULL,
  `facodmae` varchar(10) NOT NULL,
  `pacodcur` varchar(10) NOT NULL,
  `caparcur` varchar(1) NOT NULL
);

--
-- Volcado de datos para la tabla `acursom`
--

INSERT INTO `acursom` (`cadescur`, `caestcur`, `cafecini`, `cagescur`, `facodcon`, `facodmae`, `pacodcur`, `caparcur`) VALUES
('descripcion', 1, '2021-10-16', '2021', 'CON-000001', 'MTR-000001', 'CUR-000001', 'B'),
('descr', 1, '2021-10-23', '2021', 'CON-000002', 'MTR-000002', 'CUR-000002', 'A'),
('des', 1, '2021-10-29', '2021', 'CON-000003', 'MTR-000002', 'CUR-000003', 'A'),
('descripcion', 1, '2021-11-06', '2021', 'CON-000001', 'MTR-000002', 'CUR-000004', 'A'),
('descripcion', 1, '2021-12-25', '2021', 'CON-000005', 'MTR-000006', 'CUR-000005', 'C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aegrefij`
--

CREATE TABLE `aegrefij` (
  `pacodefe` varchar(10) NOT NULL,
  `cadesefe` varchar(50) DEFAULT NULL,
  `cacanefe` double(10,2) NOT NULL,
  `caestefe` tinyint(1) NOT NULL,
  `catipcan` varchar(15) DEFAULT NULL
);

--
-- Volcado de datos para la tabla `aegrefij`
--

INSERT INTO `aegrefij` (`pacodefe`, `cadesefe`, `cacanefe`, `caestefe`, `catipcan`) VALUES
('EGE-000001', 'SERVICIOS DE LIMPIEZA', 200.00, 1, 'EFECTIVO'),
('EGE-000002', 'OFRENDA MINISTERIAL', 50.00, 1, 'PORCENTUAL'),
('EGE-000003', 'MISIONES', 10.00, 1, 'PORCENTUAL'),
('EGE-000004', 'SEGURIDAD', 120.00, 1, 'EFECTIVO'),
('EGE-000005', 'LKJ', 65.00, 0, 'PORCENTUAL'),
('EGE-000006', 'SERVICIOS DE INTERNET', 150.00, 1, 'EFECTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ainfrme`
--

CREATE TABLE `ainfrme` (
  `cafecinf` date NOT NULL,
  `pacodinf` varchar(10) NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aiteinf`
--

CREATE TABLE `aiteinf` (
  `pacodite` varchar(10) NOT NULL,
  `facodinf` varchar(10) NOT NULL,
  `facodmcl` varchar(10) NOT NULL,
  `facodvcl` varchar(10) NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amaetro`
--

CREATE TABLE `amaetro` (
  `facodmie` varchar(10) NOT NULL,
  `pacodmae` varchar(10) NOT NULL,
  `caestmae` tinyint(1) NOT NULL
);

--
-- Volcado de datos para la tabla `amaetro`
--

INSERT INTO `amaetro` (`facodmie`, `pacodmae`, `caestmae`) VALUES
('MBR-000001', 'MTR-000001', 1),
('MBR-000008', 'MTR-000002', 1),
('MBR-000007', 'MTR-000003', 0),
('MBR-000004', 'MTR-000006', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amatula`
--

CREATE TABLE `amatula` (
  `caestmat` tinyint(1) NOT NULL,
  `cafecmat` date NOT NULL,
  `cahormat` time NOT NULL,
  `pacodmat` varchar(10) NOT NULL,
  `facodalu` varchar(10) NOT NULL,
  `facodcur` varchar(10) NOT NULL,
  `facodusu` varchar(10) NOT NULL
);

--
-- Volcado de datos para la tabla `amatula`
--

INSERT INTO `amatula` (`caestmat`, `cafecmat`, `cahormat`, `pacodmat`, `facodalu`, `facodcur`, `facodusu`) VALUES
(1, '2013-10-21', '00:31:00', 'MAT-000001', 'ALU-000002', 'CUR-000001', 'USU-000001'),
(1, '2013-10-21', '00:40:00', 'MAT-000002', 'ALU-000001', 'CUR-000001', 'USU-000001'),
(1, '2023-10-21', '23:29:00', 'MAT-000003', 'ALU-000005', 'CUR-000001', 'USU-000001'),
(1, '2031-10-21', '10:18:00', 'MAT-000004', 'ALU-000002', 'CUR-000002', 'USU-000001'),
(1, '2031-10-21', '10:28:00', 'MAT-000005', 'ALU-000006', 'CUR-000003', 'USU-000001'),
(1, '2021-11-07', '10:21:00', 'MAT-000006', 'ALU-000007', 'CUR-000003', 'USU-000001'),
(1, '2021-11-09', '19:55:00', 'MAT-000007', 'ALU-000007', 'CUR-000002', 'USU-000001'),
(1, '2021-12-11', '18:10:00', 'MAT-000008', 'ALU-000009', 'CUR-000005', 'USU-000001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amiebro`
--

CREATE TABLE `amiebro` (
  `camatmie` varchar(30) DEFAULT NULL,
  `capatmie` varchar(30) DEFAULT NULL,
  `cacelmie` varchar(15) DEFAULT NULL,
  `cacidmie` varchar(15) DEFAULT NULL,
  `cadirmie` varchar(100) DEFAULT NULL,
  `caestmie` tinyint(1) NOT NULL,
  `ceestciv` varchar(30) DEFAULT NULL,
  `cafecnac` date DEFAULT NULL,
  `cafotmie` blob,
  `canommie` varchar(30) NOT NULL,
  `facodciu` varchar(10) DEFAULT NULL,
  `facodpro` varchar(10) DEFAULT NULL,
  `pacodmie` varchar(10) NOT NULL,
  `caurlfot` varchar(90) DEFAULT NULL,
  `cabanmae` tinyint(1) NOT NULL,
  `cabanalu` tinyint(1) NOT NULL
);

--
-- Volcado de datos para la tabla `amiebro`
--

INSERT INTO `amiebro` (`camatmie`, `capatmie`, `cacelmie`, `cacidmie`, `cadirmie`, `caestmie`, `ceestciv`, `cafecnac`, `cafotmie`, `canommie`, `facodciu`, `facodpro`, `pacodmie`, `caurlfot`, `cabanmae`, `cabanalu`) VALUES
('VILLENA', 'MAMANI', '69317832', '7222862', '/B. MOTO MENDEZ', 1, 'SOLTERO/A', '1994-03-31', '', 'MARCO', 'CIU-000001', 'PRO-000001', 'MBR-000001', '/MRFSistem/AccesoDatos/Miembro/Imagenes/MBR-000011MARCOS260820044215.jpg', 1, 0),
('VILLENA', 'OCAMPO', '6545321', '654987', 'B/ BOLIVAR C/ BELGRANO', 1, 'SOLTERO/A', '1995-08-05', '', 'JORGE', 'CIU-000001', 'PRO-000001', 'MBR-000002', '/MRFSistem/AccesoDatos/Miembro/Imagenes/MBR-000002JORGE121021065508.jmysqli', 1, 1),
('MARTINEZ', 'FLORES', '654987', '654987', 'B/ CENTRAL C/VILLARROEL', 1, 'SOLTERO/A', '2000-05-08', '', 'MATIAS', 'CIU-000001', 'PRO-000004', 'MBR-000004', '/MRFSistem/AccesoDatos/Miembro/Imagenes/MBR-000004MATIAS291021125531.jmysqli', 1, 1),
('MOLLO', 'SALINAZ', '654987', '654321', 'B/ MOTO MENDEZ C/COCHABAMBA', 1, 'CASADO/A', '1999-05-31', '', 'HECTOR', 'CIU-000001', 'PRO-000016', 'MBR-000005', '/MRFSistem/AccesoDatos/Miembro/Imagenes/MBR-000005HECTOR151221052112.jmysqli', 0, 1),
('FLORES', 'FARFAN', '3655', '256478', 'B/ CENTRAL C/COCHABAMBA', 1, 'SOLTERO/A', '1999-08-05', '', 'LUIS MARTIN', 'CIU-000001', 'PRO-000007', 'MBR-000006', '/MRFSistem/AccesoDatos/Miembro/Imagenes/MBR-000006LUIS MARTIN281021124617.jmysqli', 0, 1),
('YAPU', 'GONZALES', '987654', '9876548', 'B/ AEROPUERTO C/ARGENTINA', 1, 'SOLTERO/A', '1993-05-25', '', 'MIGUEL', 'CIU-000001', 'PRO-000002', 'MBR-000007', '/MRFSistem/AccesoDatos/Miembro/Imagenes/MBR-000007MIGUEL311021032547.jmysqli', 1, 1),
('MORALES', 'TOLABA', '987654', '654645', 'B/ CENTRAL C/ MARISCAL SANTA CRUZ', 1, 'SOLTERO/A', '1990-08-05', '', 'CRISTIAN', 'CIU-000001', 'PRO-000019', 'MBR-000008', '/MRFSistem/AccesoDatos/Miembro/Imagenes/MBR-000008CRISTIAN311021031519.jmysqli', 1, 1),
('VARGAS', 'CONDORI', '6587654', '987654', 'B/ MOTO MENDEZ C/COCHABAMBA', 1, 'CASADO/A', '2001-02-08', '', 'JULIO', 'CIU-000002', 'PRO-000015', 'MBR-000009', '/MRFSistem/AccesoDatos/Miembro/Imagenes/MBR-000009JULIO71221044147.jmysqli', 0, 1),
('ORTIS', 'SALAZAR', '25687', '65478', 'B/ MUNICIPAL C/ NILLS KLEMEN', 1, 'SOLTERO/A', '1998-12-11', '', 'LUIS', 'CIU-000008', 'PRO-000006', 'MBR-000010', '/MRFSistem/AccesoDatos/Miembro/Imagenes/MBR-000010LUIS111221102510.jmysqli', 0, 1),
('VERAS', 'GARCIA', '987654', '654987', 'B/ LAPACHO C/ CAÑEROS', 0, NULL, '1998-12-13', NULL, 'ESTHER', NULL, NULL, 'MBR-000014', NULL, 0, 0),
('RAMIREZ', 'TEJERINA', '987654', '987654', 'B/ 21 DE DICIEMBRE C/ PEDRO DOMINGO MURILLO', 0, NULL, '1998-05-08', NULL, 'YULIANA', NULL, NULL, 'MBR-000015', NULL, 0, 0),
('QUISPE', 'MARTINEZ', '321654', '683214', 'B/ LINDO C/ BENI', 0, NULL, '1997-05-02', NULL, 'LUCIA', NULL, NULL, 'MBR-000016', NULL, 0, 0),
('VILTE', 'GONZALES', '654987', '987654', 'B/ AEROPUERTO C/ ARGENTINA', 0, NULL, '1995-03-13', NULL, 'PAULINA', NULL, NULL, 'MBR-000017', NULL, 0, 0),
('BALDEVIEZO', 'ZOTAR', '987654', '654654', 'B/ LINDO C/ ANICETO ARCE', 0, NULL, '1995-12-14', NULL, 'JOSE MANUEL', NULL, NULL, 'MBR-000018', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amiecel`
--

CREATE TABLE `amiecel` (
  `cafunmie` varchar(20) NOT NULL,
  `facodcel` varchar(10) NOT NULL,
  `facodmie` varchar(10) NOT NULL,
  `pacodmcl` varchar(10) NOT NULL,
  `caestmcl` tinyint(1) NOT NULL
);

--
-- Volcado de datos para la tabla `amiecel`
--

INSERT INTO `amiecel` (`cafunmie`, `facodcel`, `facodmie`, `pacodmcl`, `caestmcl`) VALUES
('LIDER', 'CEL-000001', 'MBR-000002', 'MCL-000001', 1),
('DISCIPULO/A', 'CEL-000001', 'MBR-000001', 'MCL-000002', 1),
('LIDER', 'CEL-000003', 'MBR-000004', 'MCL-000003', 1),
('DISCIPULO/A', 'CEL-000003', 'MBR-000005', 'MCL-000004', 1),
('LIDER', 'CEL-000008', 'MBR-000006', 'MCL-000005', 1),
('DISCIPULO/A', 'CEL-000009', 'MBR-000007', 'MCL-000006', 1),
('DISCIPULO/A', 'CEL-000008', 'MBR-000008', 'MCL-000007', 1),
('DISCIPULO/A', 'CEL-000003', 'MBR-000009', 'MCL-000008', 1),
('DISCIPULO/A', 'CEL-000011', 'MBR-000010', 'MCL-000009', 1),
('DISCIPULO/A', 'CEL-000012', 'MBR-000014', 'MCL-000013', 0),
('DISCIPULO/A', 'CEL-000012', 'MBR-000015', 'MCL-000014', 1),
('ANFITRION', 'CEL-000012', 'MBR-000016', 'MCL-000015', 1),
('ASISTENTE', 'CEL-000012', 'MBR-000017', 'MCL-000016', 1),
('DISCIPULO/A', 'CEL-000010', 'MBR-000018', 'MCL-000017', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aproion`
--

CREATE TABLE `aproion` (
  `canompro` varchar(30) NOT NULL,
  `pacodpro` varchar(10) NOT NULL
);

--
-- Volcado de datos para la tabla `aproion`
--

INSERT INTO `aproion` (`canompro`, `pacodpro`) VALUES
('ESTUDIANTE', 'PRO-000001'),
('ING. SISTEMAS', 'PRO-000002'),
('COMERCIANTE', 'PRO-000003'),
('DOCTOR', 'PRO-000004'),
('ING. INDUSTRIAL', 'PRO-000006'),
('ABOGADO', 'PRO-000007'),
('DENTISTA', 'PRO-000008'),
('VETERINARIO', 'PRO-000009'),
('CONTADOR', 'PRO-000010'),
('ARQUITECTO', 'PRO-000011'),
('ING. CIVIL', 'PRO-000012'),
('LICENCIADO', 'PRO-000013'),
('ING. COMERCIAL', 'PRO-000014'),
('MECANICO', 'PRO-000015'),
('ELECTRICISTA', 'PRO-000016'),
('PERIODISTA', 'PRO-000017'),
('PSICOLOGO', 'PRO-000019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ausurio`
--

CREATE TABLE `ausurio` (
  `caconusu` varchar(100) NOT NULL,
  `catipusu` varchar(20) NOT NULL,
  `canomusu` varchar(15) NOT NULL,
  `facodmie` varchar(10) NOT NULL,
  `pacodusu` varchar(10) NOT NULL,
  `caestusu` tinyint(1) DEFAULT NULL
);

--
-- Volcado de datos para la tabla `ausurio`
--

INSERT INTO `ausurio` (`caconusu`, `catipusu`, `canomusu`, `facodmie`, `pacodusu`, `caestusu`) VALUES
('40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'ADMINISTRADOR', 'marck46', 'MBR-000001', 'USU-000001', 1),
('d36550fc4422fde2c3bb4169c939e24e583e79f0', 'TESORERO', 'hecsal5.tes', 'MBR-000005', 'USU-000004', 1),
('65cfe2445a43dfacd35373e2a799b229255cb156', 'SECRETARIO', 'jorg_010@secre', 'MBR-000002', 'USU-000010', 1),
('45f76eeaf99c5eece3a90c10af43df52c58f813d', 'TESORERO', 'luis_011@tesor', 'MBR-000010', 'USU-000011', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aviscel`
--

CREATE TABLE `aviscel` (
  `cafecvis` date NOT NULL,
  `facodcel` varchar(10) NOT NULL,
  `facodvis` varchar(10) NOT NULL,
  `pacodvcl` varchar(10) NOT NULL,
  `caestvcl` tinyint(1) NOT NULL,
  `pacodvis` varchar(10) DEFAULT NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avisita`
--

CREATE TABLE `avisita` (
  `caapavis` varchar(30) DEFAULT NULL,
  `caamavis` varchar(30) DEFAULT NULL,
  `cadirvis` varchar(60) NOT NULL,
  `canomvis` varchar(30) NOT NULL,
  `catelvis` varchar(15) NOT NULL,
  `caestvis` tinyint(1) NOT NULL,
  `pacodvis` varchar(10) NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `num_correlativo`
--

CREATE TABLE `num_correlativo` (
  `codigo` varchar(10) NOT NULL,
  `correlativo` varchar(10) NOT NULL
);

--
-- Volcado de datos para la tabla `num_correlativo`
--

INSERT INTO `num_correlativo` (`codigo`, `correlativo`) VALUES
('ALU', '9'),
('BAR', '15'),
('CAJ', '4'),
('CAL', '14'),
('CEL', '12'),
('CIU', '1'),
('CON', '5'),
('CUR', '5'),
('del', '2'),
('EGE', '6'),
('EGR', '21'),
('ING', '34'),
('MAE', '1'),
('MAT', '8'),
('MBR', '18'),
('MCL', '17'),
('MTR', '6'),
('PRO', '19'),
('USU', '11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aalumno`
--
ALTER TABLE `aalumno`
  ADD PRIMARY KEY (`pacodalu`),
  ADD KEY `IXFK_Alumno_Miembro` (`facodmie`);

--
-- Indices de la tabla `aarqcaj`
--
ALTER TABLE `aarqcaj`
  ADD PRIMARY KEY (`pacodcaj`);

--
-- Indices de la tabla `abardir`
--
ALTER TABLE `abardir`
  ADD PRIMARY KEY (`pacodbar`);

--
-- Indices de la tabla `acaldir`
--
ALTER TABLE `acaldir`
  ADD PRIMARY KEY (`pacodcal`);

--
-- Indices de la tabla `acelula`
--
ALTER TABLE `acelula`
  ADD PRIMARY KEY (`pacodcel`),
  ADD KEY `IXFK_Celula_Barrio` (`facodbar`),
  ADD KEY `IXFK_Celula_Calle` (`facodcal`);

--
-- Indices de la tabla `aciudad`
--
ALTER TABLE `aciudad`
  ADD PRIMARY KEY (`pacodciu`);

--
-- Indices de la tabla `aconegr`
--
ALTER TABLE `aconegr`
  ADD PRIMARY KEY (`pacodegr`),
  ADD KEY `IXFK_Aporte_Objeto_Aportes` (`pacodegr`);

--
-- Indices de la tabla `aconfin`
--
ALTER TABLE `aconfin`
  ADD PRIMARY KEY (`pacodapo`),
  ADD KEY `IXFK_Aportes_Usuario` (`facodusu`),
  ADD KEY `IXFK_aconfin_aarqcaj` (`facodcaj`);

--
-- Indices de la tabla `aconido`
--
ALTER TABLE `aconido`
  ADD PRIMARY KEY (`pacodcon`);

--
-- Indices de la tabla `aconing`
--
ALTER TABLE `aconing`
  ADD PRIMARY KEY (`pacodeco`),
  ADD KEY `IXFK_Aporte_Economico_Aportes` (`pacodeco`);

--
-- Indices de la tabla `acreesp`
--
ALTER TABLE `acreesp`
  ADD PRIMARY KEY (`pacodcre`),
  ADD KEY `IXFK_CrecimientoEspiritual_Miembro` (`pacodcre`);

--
-- Indices de la tabla `acursom`
--
ALTER TABLE `acursom`
  ADD PRIMARY KEY (`pacodcur`),
  ADD KEY `IXFK_Curso_Contenido` (`facodcon`),
  ADD KEY `IXFK_Curso_Maestro` (`facodmae`);

--
-- Indices de la tabla `aegrefij`
--
ALTER TABLE `aegrefij`
  ADD PRIMARY KEY (`pacodefe`),
  ADD KEY `IXFK_aegrent_aconegr` (`pacodefe`);

--
-- Indices de la tabla `ainfrme`
--
ALTER TABLE `ainfrme`
  ADD PRIMARY KEY (`pacodinf`);

--
-- Indices de la tabla `aiteinf`
--
ALTER TABLE `aiteinf`
  ADD PRIMARY KEY (`pacodite`),
  ADD KEY `IXFK_Iteminforme_Informe` (`facodinf`),
  ADD KEY `IXFK_Iteminforme_Miembro-celula` (`facodmcl`),
  ADD KEY `IXFK_Iteminforme_Visita_celula` (`facodvcl`);

--
-- Indices de la tabla `amaetro`
--
ALTER TABLE `amaetro`
  ADD PRIMARY KEY (`pacodmae`),
  ADD KEY `IXFK_Maestro_Miembro` (`facodmie`);

--
-- Indices de la tabla `amatula`
--
ALTER TABLE `amatula`
  ADD PRIMARY KEY (`pacodmat`),
  ADD KEY `IXFK_Matriculacion_escuela_Alumno` (`facodalu`),
  ADD KEY `IXFK_Matriculacion_escuela_Curso` (`facodcur`),
  ADD KEY `IXFK_Matriculacion_escuela_Usuario` (`facodusu`);

--
-- Indices de la tabla `amiebro`
--
ALTER TABLE `amiebro`
  ADD PRIMARY KEY (`pacodmie`),
  ADD KEY `FK_Miembro_Ciudad` (`facodciu`),
  ADD KEY `FK_Miembro_Profesion` (`facodpro`);

--
-- Indices de la tabla `amiecel`
--
ALTER TABLE `amiecel`
  ADD PRIMARY KEY (`pacodmcl`),
  ADD KEY `IXFK_Miembro-celula_Celula` (`facodcel`),
  ADD KEY `IXFK_Miembro-celula_Miembro` (`facodmie`);

--
-- Indices de la tabla `aproion`
--
ALTER TABLE `aproion`
  ADD PRIMARY KEY (`pacodpro`);

--
-- Indices de la tabla `ausurio`
--
ALTER TABLE `ausurio`
  ADD PRIMARY KEY (`pacodusu`),
  ADD KEY `IXFK_Usuario_Miembro` (`facodmie`);

--
-- Indices de la tabla `aviscel`
--
ALTER TABLE `aviscel`
  ADD PRIMARY KEY (`pacodvcl`),
  ADD KEY `IXFK_Visita_celula_Celula` (`facodcel`),
  ADD KEY `IXFK_Visita_celula_Visita` (`facodvis`);

--
-- Indices de la tabla `avisita`
--
ALTER TABLE `avisita`
  ADD PRIMARY KEY (`pacodvis`);

--
-- Indices de la tabla `num_correlativo`
--
ALTER TABLE `num_correlativo`
  ADD PRIMARY KEY (`codigo`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aalumno`
--
ALTER TABLE `aalumno`
  ADD CONSTRAINT `FK_alumno_miebro` FOREIGN KEY (`facodmie`) REFERENCES `amiebro` (`pacodmie`),
  ADD CONSTRAINT `FK_Alumno_Miembro` FOREIGN KEY (`facodmie`) REFERENCES `amiebro` (`pacodmie`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `acelula`
--
ALTER TABLE `acelula`
  ADD CONSTRAINT `FK_bardir_celula` FOREIGN KEY (`facodbar`) REFERENCES `abardir` (`pacodbar`),
  ADD CONSTRAINT `FK_caldir_celula` FOREIGN KEY (`facodcal`) REFERENCES `acaldir` (`pacodcal`),
  ADD CONSTRAINT `FK_Celula_Barrio` FOREIGN KEY (`facodbar`) REFERENCES `abardir` (`pacodbar`),
  ADD CONSTRAINT `FK_Celula_Calle` FOREIGN KEY (`facodcal`) REFERENCES `acaldir` (`pacodcal`);

--
-- Filtros para la tabla `aconegr`
--
ALTER TABLE `aconegr`
  ADD CONSTRAINT `FK_Aporte_Objeto_Aportes` FOREIGN KEY (`pacodegr`) REFERENCES `aconfin` (`pacodapo`);

--
-- Filtros para la tabla `aconfin`
--
ALTER TABLE `aconfin`
  ADD CONSTRAINT `FK_aconfin_aarqcaj` FOREIGN KEY (`facodcaj`) REFERENCES `aarqcaj` (`pacodcaj`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_Aportes_Usuario` FOREIGN KEY (`facodusu`) REFERENCES `ausurio` (`pacodusu`);

--
-- Filtros para la tabla `aconing`
--
ALTER TABLE `aconing`
  ADD CONSTRAINT `FK_Aporte_Economico_Aportes` FOREIGN KEY (`pacodeco`) REFERENCES `aconfin` (`pacodapo`);

--
-- Filtros para la tabla `acreesp`
--
ALTER TABLE `acreesp`
  ADD CONSTRAINT `FK_CrecimientoEspiritual_Miembro` FOREIGN KEY (`pacodcre`) REFERENCES `amiebro` (`pacodmie`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_cremie_miebro` FOREIGN KEY (`pacodcre`) REFERENCES `amiebro` (`pacodmie`);

--
-- Filtros para la tabla `acursom`
--
ALTER TABLE `acursom`
  ADD CONSTRAINT `FK_Curso_Contenido` FOREIGN KEY (`facodcon`) REFERENCES `aconido` (`pacodcon`),
  ADD CONSTRAINT `FK_Curso_Maestro` FOREIGN KEY (`facodmae`) REFERENCES `amaetro` (`pacodmae`);

--
-- Filtros para la tabla `aiteinf`
--
ALTER TABLE `aiteinf`
  ADD CONSTRAINT `FK_iteinf_infrme` FOREIGN KEY (`facodinf`) REFERENCES `ainfrme` (`pacodinf`),
  ADD CONSTRAINT `FK_iteinf_miecel` FOREIGN KEY (`facodmcl`) REFERENCES `amiecel` (`pacodmcl`),
  ADD CONSTRAINT `FK_iteinf_viscel` FOREIGN KEY (`facodvcl`) REFERENCES `avidcel` (`pacodvcl`),
  ADD CONSTRAINT `FK_Iteminforme_Informe` FOREIGN KEY (`facodinf`) REFERENCES `ainfrme` (`pacodinf`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_Iteminforme_Miembro-celula` FOREIGN KEY (`facodmcl`) REFERENCES `amiecel` (`pacodmcl`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_Iteminforme_Visita_celula` FOREIGN KEY (`facodvcl`) REFERENCES `aviscel` (`pacodvcl`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `amaetro`
--
ALTER TABLE `amaetro`
  ADD CONSTRAINT `FK_Maestro_Miembro` FOREIGN KEY (`facodmie`) REFERENCES `amiebro` (`pacodmie`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_maetro_miebro` FOREIGN KEY (`facodmie`) REFERENCES `amiebro` (`pacodmie`);

--
-- Filtros para la tabla `amatula`
--
ALTER TABLE `amatula`
  ADD CONSTRAINT `FK_Matriculacion_escuela_Alumno` FOREIGN KEY (`facodalu`) REFERENCES `aalumno` (`pacodalu`),
  ADD CONSTRAINT `FK_Matriculacion_escuela_Curso` FOREIGN KEY (`facodcur`) REFERENCES `acursom` (`pacodcur`),
  ADD CONSTRAINT `FK_Matriculacion_escuela_Usuario` FOREIGN KEY (`facodusu`) REFERENCES `ausurio` (`pacodusu`);

--
-- Filtros para la tabla `amiebro`
--
ALTER TABLE `amiebro`
  ADD CONSTRAINT `FK_Miembro_Ciudad` FOREIGN KEY (`facodciu`) REFERENCES `aciudad` (`pacodciu`),
  ADD CONSTRAINT `FK_Miembro_Profesion` FOREIGN KEY (`facodpro`) REFERENCES `aproion` (`pacodpro`);

--
-- Filtros para la tabla `amiecel`
--
ALTER TABLE `amiecel`
  ADD CONSTRAINT `FK_miecel_celula` FOREIGN KEY (`facodcel`) REFERENCES `acelula` (`pacodcel`),
  ADD CONSTRAINT `FK_miecel_miebro` FOREIGN KEY (`facodmie`) REFERENCES `amiebro` (`pacodmie`),
  ADD CONSTRAINT `FK_Miembro-celula_Celula` FOREIGN KEY (`facodcel`) REFERENCES `acelula` (`pacodcel`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_Miembro-celula_Miembro` FOREIGN KEY (`facodmie`) REFERENCES `amiebro` (`pacodmie`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `ausurio`
--
ALTER TABLE `ausurio`
  ADD CONSTRAINT `FK_Usuario_Miembro` FOREIGN KEY (`facodmie`) REFERENCES `amiebro` (`pacodmie`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_usurio_miebro` FOREIGN KEY (`facodmie`) REFERENCES `amiebro` (`pacodmie`);

--
-- Filtros para la tabla `aviscel`
--
ALTER TABLE `aviscel`
  ADD CONSTRAINT `FK_viscel_celula` FOREIGN KEY (`facodcel`) REFERENCES `acelula` (`pacodcel`),
  ADD CONSTRAINT `FK_viscel_visita` FOREIGN KEY (`facodvis`) REFERENCES `avisita` (`pacodvis`),
  ADD CONSTRAINT `FK_Visita_celula_Celula` FOREIGN KEY (`facodcel`) REFERENCES `acelula` (`pacodcel`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_Visita_celula_Visita` FOREIGN KEY (`facodvis`) REFERENCES `avisita` (`pacodvis`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
