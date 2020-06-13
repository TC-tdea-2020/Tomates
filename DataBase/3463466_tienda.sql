-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: fdb24.awardspace.net
-- Tiempo de generación: 13-06-2020 a las 07:29:04
-- Versión del servidor: 5.7.20-log
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `3463466_tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `name`) VALUES
(1, 'Acel', '123456', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carro`
--

CREATE TABLE `carro` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carro`
--

INSERT INTO `carro` (`id`, `id_cliente`, `id_producto`, `cant`) VALUES
(13, 7, 7, 1),
(14, 7, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(1, 'Alimentos'),
(2, 'Tomates'),
(3, 'test'),
(4, 'Hortalizas ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `username`, `password`, `name`, `email`) VALUES
(10, 'Acelion', '2774618', 'Diego Alejandro Ospina', 'Dial90@hotmail.com'),
(11, 'paula', '123456', 'paula Naranjo', 'paul@correo.com'),
(12, 'Paula Andrea Naranjo', '123456', 'Paula Betancur', 'micorreo@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `monto` float NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `id_cliente`, `fecha`, `monto`, `estado`) VALUES
(14, 10, '2020-06-03 22:50:24', 23160, 0),
(15, 10, '2020-06-03 23:05:46', 5060, 1),
(16, 10, '2020-06-04 16:45:42', 12880, 0),
(17, 10, '2020-06-04 17:40:05', 112000, 1),
(18, 10, '2020-06-04 18:04:13', 8800, 1),
(19, 10, '2020-06-04 18:14:55', 12000, 1),
(20, 10, '2020-06-06 06:44:18', 9625, 2),
(21, 10, '2020-06-11 20:46:04', 12500, 0),
(22, 11, '2020-06-12 03:08:43', 7500, 0),
(23, 11, '2020-06-12 03:15:32', 7500, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `comprobante` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `id_cliente`, `id_compra`, `comprobante`, `nombre`, `fecha`, `estado`) VALUES
(4, 1, 8, '01055363.png', 'Anyelber Boscan', '2019-05-22 18:05:53', 1),
(5, 7, 12, '', 'comprovante de pago ', '2020-06-02 19:15:36', 1),
(6, 10, 14, '035114917.png', 'xcx', '2020-06-03 22:51:14', 1),
(7, 10, 15, '040622376.png', 'Diego OSpina ', '2020-06-03 23:06:22', 1),
(8, 10, 16, '21465052.png', 'Diego OSpina', '2020-06-04 16:46:50', 1),
(9, 10, 17, '22403496.png', '', '2020-06-04 17:40:34', 1),
(10, 10, 18, '230743732.png', 'Diego Alejandro Ospina ', '2020-06-04 18:07:43', 1),
(11, 10, 19, '231531108.png', '', '2020-06-04 18:15:31', 1),
(12, 10, 20, '064903933.png', '', '2020-06-06 06:49:12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `price` float NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `oferta` int(11) NOT NULL,
  `descargable` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `price`, `imagen`, `name`, `id_categoria`, `oferta`, `descargable`) VALUES
(1, 2500, 'uva12.png', 'uva', 1, 45, '572uvas.jpg'),
(16, 2500, 'uva2412.png', 'uva2', 1, 40, '201206chonto.png'),
(24, 2000, 'Tomate de aliÃ±o696.png', 'Tomate de aliÃ±o', 0, 10, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_compra`
--

CREATE TABLE `productos_compra` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `monto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos_compra`
--

INSERT INTO `productos_compra` (`id`, `id_compra`, `id_producto`, `cantidad`, `monto`) VALUES
(1, 3, 5, 7, 400),
(2, 3, 4, 4, 1000),
(3, 3, 3, 4, 1200),
(4, 3, 2, 4, 200),
(5, 3, 1, 4, 1000),
(6, 4, 5, 1, 400),
(7, 4, 7, 1, 1000),
(8, 5, 5, 1, 400),
(9, 5, 4, 1, 1000),
(10, 5, 7, 1, 1000),
(11, 6, 5, 1, 400),
(12, 7, 7, 1, 1000),
(13, 7, 2, 1, 200),
(14, 7, 1, 1, 1000),
(28, 14, 12, 8, 2000),
(29, 14, 7, 5, 1000),
(30, 14, 5, 6, 400),
(31, 15, 12, 1, 2000),
(32, 15, 7, 1, 1000),
(33, 15, 5, 1, 400),
(34, 15, 4, 1, 1000),
(35, 15, 2, 1, 200),
(36, 15, 1, 1, 1000),
(37, 16, 12, 5, 2000),
(38, 16, 5, 8, 400),
(39, 17, 12, 56, 2000),
(40, 18, 2, 4, 200),
(41, 18, 12, 4, 2000),
(42, 19, 12, 6, 2000),
(43, 20, 1, 7, 2500),
(44, 21, 1, 8, 2500),
(45, 21, 16, 1, 2500),
(46, 22, 16, 5, 2500),
(47, 23, 16, 5, 2500);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carro`
--
ALTER TABLE `carro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_compra`
--
ALTER TABLE `productos_compra`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `carro`
--
ALTER TABLE `carro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `productos_compra`
--
ALTER TABLE `productos_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
