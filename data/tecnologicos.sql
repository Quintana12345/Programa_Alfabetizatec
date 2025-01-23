-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-01-2025 a las 17:01:39
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alfabetizatec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnologicos`
--

CREATE TABLE `tecnologicos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `estado_id` bigint(20) NOT NULL,
  `modalidad` varchar(255) NOT NULL,
  `director` varchar(200) DEFAULT NULL,
  `tipo_de_institucion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tecnologicos`
--

INSERT INTO `tecnologicos` (`id`, `nombre`, `estado_id`, `modalidad`, `director`, `tipo_de_institucion`) VALUES
(1, 'I.T. de Campeche', 4, '', NULL, ''),
(2, 'I.T. de Álvaro Obregón', 7, '', NULL, ''),
(3, 'I.T. de Chihuahua', 6, '', NULL, ''),
(4, 'I.T. de Celaya', 11, '', NULL, ''),
(5, 'I.T. de Delicias', 6, '', NULL, ''),
(6, 'I.T.S. de Río Verde', 24, '', NULL, ''),
(7, 'I.T. de Lázaro Cárdenas', 16, '', NULL, ''),
(8, 'I.T. de Mérida', 23, '', NULL, ''),
(9, 'I.T.S. de Álamo Temapache', 13, '', NULL, ''),
(10, 'I.T. de Culiacán', 25, '', NULL, ''),
(11, 'I.T.S. de La Costa Chica', 12, '', NULL, ''),
(12, 'I.T. de Nuevo León', 19, '', NULL, ''),
(13, 'T.E.S. de La Región Carbonifera', 8, '', NULL, ''),
(14, 'I.T.S. de Irapuato', 11, '', NULL, ''),
(15, 'I.T. de Iguala', 12, '', NULL, ''),
(16, 'I.T.S. de Zacapoaxtla', 21, '', NULL, ''),
(17, 'I.T. de Toluca', 15, '', NULL, ''),
(18, 'I.T. de Tapachula', 5, '', NULL, ''),
(19, 'I.T.S. de Centla', 27, '', NULL, ''),
(20, 'I.T. del Istmo', 20, '', NULL, ''),
(21, 'I.T. de Tláhuac', 7, '', NULL, ''),
(22, 'T.E.S. de Ote. del Edo. de México', 15, '', NULL, ''),
(23, 'I.T.S. de Teposcolula', 20, '', NULL, ''),
(24, 'I.T. de Comitancillo', 20, '', NULL, ''),
(25, 'I.T.S. de Zacatecas Sur', 32, '', NULL, ''),
(26, 'I.T. de Parral', 6, '', NULL, ''),
(27, 'T.E.S. de Ixtapaluca', 15, '', NULL, ''),
(28, 'I.T. de Cerro Azul', 13, '', NULL, ''),
(29, 'T.E.S. de Coacalco', 15, '', NULL, ''),
(30, 'T.E.S. de Tianguistenco', 15, '', NULL, ''),
(31, 'I.T.S. de La Montaña', 12, '', NULL, ''),
(32, 'I.T.S. de Xalapa', 13, '', NULL, ''),
(33, 'I.T. de Norte de Nayarit', 18, '', NULL, ''),
(34, 'Centro Interdisciplinario de Investigación y Docencia en Educación Técnica (CIIDET)', 22, '', NULL, ''),
(35, 'I.T. de Pochutla', 20, '', NULL, ''),
(36, 'I.T. de Zacatepec', 17, '', NULL, ''),
(37, 'I.T.S. de Huatusco', 13, '', NULL, ''),
(38, 'I.T. de Tláhuac II', 7, '', NULL, ''),
(39, 'I.T.S. de Acatlán de Osorio', 21, '', NULL, ''),
(40, 'I.T. de Zacatecas', 32, '', NULL, ''),
(41, 'I.T.S. de San Miguel El Grande', 20, '', NULL, ''),
(42, 'I.T. de Cancún', 23, '', NULL, ''),
(43, 'T.E.S. de Chicoloapan', 15, '', NULL, ''),
(44, 'I.T.S. de San Pedro de las Colonias', 8, '', NULL, ''),
(45, 'I.T. de Nogales', 26, '', NULL, ''),
(46, 'I.T. de San Juan del Río', 22, '', NULL, ''),
(47, 'I.T.S. de Salvatierra', 11, '', NULL, ''),
(48, 'I.T.S. de El Dorado', 25, '', NULL, ''),
(49, 'I.T. de Durango', 10, '', NULL, ''),
(50, 'I.T. de Mazatlán', 25, '', NULL, ''),
(51, 'I.T. de El Salto', 10, '', NULL, ''),
(52, 'I.T. de Chihuahua II', 6, '', NULL, ''),
(53, 'I.T. de Hermosillo', 26, '', NULL, ''),
(54, 'I.T. de Gustavo A. Madero II', 7, '', NULL, ''),
(55, 'I.T.S. de Los Ríos', 27, '', NULL, ''),
(56, 'I.T. de Ensenada', 2, '', NULL, ''),
(57, 'I.T.S. de Chicontepec', 13, '', NULL, ''),
(58, 'I.T. de Tuxtepec', 20, '', NULL, ''),
(59, 'I.T. de Tijuana', 2, '', NULL, ''),
(60, 'I.T.S. de Nuevo Casas Grandes', 6, '', NULL, ''),
(61, 'I.T.S. de Tlaxco', 21, '', NULL, ''),
(62, 'I.T. de Mexicali', 2, '', NULL, ''),
(63, 'I.T. de Iztapalapa II', 7, '', NULL, ''),
(64, 'I.T.S. de Misantla', 13, '', NULL, ''),
(65, 'I.T.S. de Guanajuato', 11, '', NULL, ''),
(66, 'I.T.S. de Purhepecha', 16, '', NULL, ''),
(67, 'I.T.S. de Cd. Acuña', 8, '', NULL, ''),
(68, 'I.T. de Pinotepa', 20, '', NULL, ''),
(69, 'I.T. de Iztapalapa', 7, '', NULL, ''),
(70, 'T.E.S. de Huixquilucan', 15, '', NULL, ''),
(71, 'T.E.S. de Chalco', 15, '', NULL, ''),
(72, 'T.E.S. de Jocotitlán', 15, '', NULL, ''),
(73, 'I.T.S. de Fresnillo', 32, '', NULL, ''),
(74, 'I.T. de Conkal', 23, '', NULL, ''),
(75, 'I.T. de La Chontalpa', 27, '', NULL, ''),
(76, 'I.T. de Huimanguillo', 27, '', NULL, ''),
(77, 'ITS de Purísima del Rincón', 11, '', NULL, ''),
(78, 'I.T.S. de Cosamaloapan', 13, '', NULL, ''),
(79, 'I.T. de Jiquilpan', 16, '', NULL, ''),
(80, 'I.T. de Tepic', 18, '', NULL, ''),
(81, 'I.T.S. de Tepexi de Rodríguez', 21, '', NULL, ''),
(82, 'I.T. de Ocotlán', 14, '', NULL, ''),
(83, 'T.E.S. de Cuautitlán Izcalli', 15, '', NULL, ''),
(84, 'I.T. de Chetumal', 23, '', NULL, ''),
(85, 'I.T. de Zitácuaro', 16, '', NULL, ''),
(86, 'I.T. de Villahermosa', 27, '', NULL, ''),
(87, 'I.T. de Lerma', 15, '', NULL, ''),
(88, 'I.T. de Acapulco', 12, '', NULL, ''),
(89, 'I.T. de Cuautla', 17, '', NULL, ''),
(90, 'I.T. de San Marcos', 12, '', NULL, ''),
(91, 'I.T.S. de Tamazunchale', 24, '', NULL, ''),
(92, 'I.T.S. de Monclova', 8, '', NULL, ''),
(93, 'I.T.S. de La Región de los Llanos', 24, '', NULL, ''),
(94, 'I.T.S. de Puerto Peñasco', 26, '', NULL, ''),
(95, 'I.T.S. de Múzquiz', 8, '', NULL, ''),
(96, 'ITS de Hopelchen', 4, '', NULL, ''),
(97, 'I.T.S. de Zacatecas Norte', 32, '', NULL, ''),
(98, 'I.T. de Valle de Morelia', 16, '', NULL, ''),
(99, 'I.T.S. de Tacámbaro', 16, '', NULL, ''),
(100, 'I.T. de Valle del Guadiana', 10, '', NULL, ''),
(101, 'I.T.S. de Alvarado', 13, '', NULL, ''),
(102, 'I.T. de Huejutla', 13, '', NULL, ''),
(103, 'I.T. de Salina Cruz', 20, '', NULL, ''),
(104, 'I.T. de Cd. Jiménez', 6, '', NULL, ''),
(105, 'I.T. de Agua Prieta', 26, '', NULL, ''),
(106, 'I.T.S. de Progreso', 23, '', NULL, ''),
(107, 'I.T.S. de Guasave', 25, '', NULL, ''),
(108, 'I.T.S. de Jesús Carranza', 13, '', NULL, ''),
(109, 'I.T. de Linares', 19, '', NULL, ''),
(110, 'I.T. de Roque', 11, '', NULL, ''),
(111, 'I.T.S. de Mulegé', 3, '', NULL, ''),
(112, 'I.T. de Cd. Juárez', 6, '', NULL, ''),
(113, 'I.T.S. de Nochistlán', 32, '', NULL, ''),
(114, 'I.T. de Tlajomulco', 14, '', NULL, ''),
(115, 'I.T. de Úrsulo Galván', 13, '', NULL, ''),
(116, 'I.T.S. de Felipe Carrillo Puerto', 23, '', NULL, ''),
(117, 'I.T. de Iztapalapa III', 7, '', NULL, ''),
(118, 'I.T. de La Piedad', 16, '', NULL, ''),
(119, 'I.T. de La Laguna', 10, '', NULL, ''),
(120, 'I.T.S. de Ote. del Edo. de Hidalgo', 13, '', NULL, ''),
(121, 'I.T. de Cd. Altamirano', 12, '', NULL, ''),
(122, 'I.T. de Tizimín', 23, '', NULL, ''),
(123, 'I.T. de Orizaba', 13, '', NULL, ''),
(124, 'I.T.S. de Lerdo', 10, '', NULL, ''),
(125, 'I.T.S. de La Sierra Negra de Ajalpan', 21, '', NULL, ''),
(126, 'I.T. de Torreón', 8, '', NULL, ''),
(127, 'I.T.S. de Tantoyuca', 13, '', NULL, ''),
(128, 'I.T.S. de Puruándiro', 16, '', NULL, ''),
(129, 'I.T. de Piedras Negras', 8, '', NULL, ''),
(130, 'I.T.S. de Santiago Papasquiaro', 10, '', NULL, ''),
(131, 'I.T. de La Zona Olmeca', 20, '', NULL, ''),
(132, 'I.T. de Apizaco', 21, '', NULL, ''),
(133, 'I.T.S. de Zongolica', 13, '', NULL, ''),
(134, 'I.T. de Cd. Victoria', 28, '', NULL, ''),
(135, 'I.T. de Atitalaquia', 13, '', NULL, ''),
(136, 'I.T. de Matehuala', 24, '', NULL, ''),
(137, 'I.T. de Valle del Yaqui', 26, '', NULL, ''),
(138, 'I.T. de Puebla', 21, '', NULL, ''),
(139, 'I.T.S. de Cajeme', 26, '', NULL, ''),
(140, 'I.T. de Nuevo Laredo', 28, '', NULL, ''),
(141, 'I.T.S. de Comalcalco', 27, '', NULL, ''),
(142, 'I.T. de Tlaxiaco', 20, '', NULL, ''),
(143, 'I.T. de Cd. Valles', 24, '', NULL, ''),
(144, 'CRODE Orizaba', 13, '', NULL, ''),
(145, 'I.T. de Oaxaca', 20, '', NULL, ''),
(146, 'I.T.S. de Atlixco', 21, '', NULL, ''),
(147, 'I.T.S. de Huichapan', 13, '', NULL, ''),
(148, 'I.T.S. de Pánuco', 13, '', NULL, ''),
(149, 'I.T. de Querétaro', 22, '', NULL, ''),
(150, 'I.T. de La Zona Maya', 23, '', NULL, ''),
(151, 'I.T.S. de Calkiní', 4, '', NULL, ''),
(152, 'T.E.S. de Jilotepec', 15, '', NULL, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tecnologicos`
--
ALTER TABLE `tecnologicos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tecnologicos`
--
ALTER TABLE `tecnologicos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
