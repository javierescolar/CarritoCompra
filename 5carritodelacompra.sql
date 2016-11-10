-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2016 a las 14:43:00
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `5carritodelacompra`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carroproductos`
--

CREATE TABLE `carroproductos` (
  `id` int(11) NOT NULL,
  `idCart` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carroproductos`
--

INSERT INTO `carroproductos` (`id`, `idCart`, `idProduct`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 2),
(4, 2, 2),
(5, 2, 4),
(6, 2, 4),
(7, 2, 4),
(8, 2, 4),
(9, 3, 1),
(10, 3, 2),
(11, 3, 2),
(12, 4, 1),
(13, 4, 2),
(14, 4, 2),
(15, 5, 1),
(16, 6, 1),
(17, 6, 2),
(18, 6, 2),
(19, 6, 2),
(20, 6, 2),
(21, 7, 1),
(22, 7, 2),
(23, 7, 2),
(24, 8, 1),
(25, 8, 2),
(26, 8, 2),
(27, 8, 9),
(28, 9, 1),
(29, 9, 1),
(30, 9, 1),
(31, 9, 4),
(32, 9, 4),
(33, 9, 9),
(34, 9, 9),
(35, 10, 1),
(36, 10, 4),
(37, 10, 4),
(38, 10, 4),
(39, 11, 1),
(40, 12, 1),
(41, 12, 1),
(42, 12, 2),
(43, 13, 1),
(44, 13, 2),
(45, 16, 1),
(46, 16, 2),
(47, 17, 1),
(48, 18, 1),
(49, 18, 2),
(50, 18, 2),
(51, 18, 2),
(52, 19, 1),
(53, 19, 2),
(54, 20, 1),
(55, 20, 2),
(56, 21, 1),
(57, 21, 1),
(58, 21, 2),
(59, 23, 1),
(60, 23, 2),
(61, 23, 2),
(62, 24, 1),
(63, 24, 1),
(64, 24, 1),
(65, 24, 2),
(66, 25, 1),
(67, 25, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carros`
--

CREATE TABLE `carros` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `finalized` tinyint(1) NOT NULL,
  `datebuy` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carros`
--

INSERT INTO `carros` (`id`, `idUser`, `finalized`, `datebuy`) VALUES
(1, 1, 1, '2016-11-06'),
(2, 1, 1, '2016-11-06'),
(3, 1, 1, '2016-11-06'),
(4, 1, 1, '2016-11-06'),
(5, 1, 1, '2016-11-06'),
(6, 1, 1, '2016-11-06'),
(7, 1, 1, '0000-00-00'),
(8, 1, 1, '0000-00-00'),
(9, 1, 1, '0000-00-00'),
(10, 2, 1, '0000-00-00'),
(11, 1, 1, '0000-00-00'),
(12, 1, 1, '0000-00-00'),
(13, 1, 1, '2016-11-07'),
(14, 3, 0, '0000-00-00'),
(15, 3, 0, '0000-00-00'),
(16, 4, 1, '2016-11-07'),
(17, 1, 1, '2016-11-07'),
(18, 1, 1, '2016-11-08'),
(19, 1, 1, '2016-11-07'),
(20, 1, 1, '2016-11-08'),
(21, 1, 1, '2016-11-08'),
(22, 2, 1, '0000-00-00'),
(23, 2, 1, '2016-11-09'),
(24, 2, 1, '2016-11-09'),
(25, 2, 1, '2016-11-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `name`, `description`, `price`, `image`) VALUES
(1, 'Surface Pro 4', 'Microsoft Surface Pro 4 12,3'''' 128 GB', 999, 'surfacepro4.jpg'),
(2, 'MacBook Air', 'MacBook Air 13" 128 GB', 999, 'macbook.jpg'),
(3, 'HP Envy', 'Intel Core i7-6500U', 950.9, 'hpenvy.jpg'),
(4, 'Asus R510VX', 'I7-6500 4GB RAM', 730.9, 'asusr510vx.jpg'),
(5, 'MSI PE70', 'I7-6700HQ GeForce GTX 960M 2GB', 1270, 'msipe70.jpg'),
(6, 'Toshiba P50-C', 'i7-5500U 1TB', 989, 'toshibap50c.jpg'),
(8, 'Dell Inspirion 7000', '500GB SSD', 899.9, 'dellinspirion.jpg'),
(9, 'Acer aspire', 'I7-6500 8GB RAM', 890.9, 'aceraspire.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `perfil` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `name`, `email`, `username`, `password`, `perfil`) VALUES
(1, 'Javier', 'javierescolar10@gmail.com', 'jescolar', '1234', 0),
(2, 'Irene', 'irene@irene.es', 'itrigo', '77', 0),
(3, 'Admin', 'admin@admin.es', 'admin', 'admin', 1),
(4, 'prueba', 'prueba@prueba.es', 'prueba', 'prueba', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carroproductos`
--
ALTER TABLE `carroproductos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carros`
--
ALTER TABLE `carros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carroproductos`
--
ALTER TABLE `carroproductos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT de la tabla `carros`
--
ALTER TABLE `carros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
