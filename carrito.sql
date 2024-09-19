-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2024 a las 05:29:04
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
-- Base de datos: `carrito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproductos`
--

CREATE TABLE `tblproductos` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Precio` decimal(20,2) NOT NULL,
  `Descripcion` text NOT NULL,
  `Imagenes` varchar(255) NOT NULL,
  `Unidades_en_Stock` int(11) NOT NULL,
  `Punto_de_reorden` int(11) NOT NULL,
  `Unidades_comprometidas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblproductos`
--

INSERT INTO `tblproductos` (`ID`, `Nombre`, `Precio`, `Descripcion`, `Imagenes`, `Unidades_en_Stock`, `Punto_de_reorden`, `Unidades_comprometidas`) VALUES
(1, 'Elicuis 5 mg 60 tabletas', 1876.00, 'Detalles del artículo\r\n\r\nElicuis 5 mg 60 tabletas.\r\nConsulte a su médico.\r\nLimitado a 4 piezas por cliente.\r\nRealiza todas tus compras de farmacia desde la comodidad de tu hogar en tu tienda en línea y recibe tus artículos con el servicio a domicilio a tan solo unos clics de distancia. ¡Hacemos el súper por ti!', '../imagenes/me1.webp', 1, 0, 0),
(2, 'Fluoxetina Medimart 20 mg, 40 tabletas', 170.00, 'Detalles del artículo\r\n\r\nCuide su salud\r\nSiga las recomendaciones de su médico\r\nManténgase fuera del alcance de los niños\r\nFluoxetina Medimart 20 mg, 40 tabletas.\r\nConsulte a su médico.\r\nDescubre los artículos que tenemos para toda la familia en la tienda en línea, elige los que necesitas para tu día a día y llévatelos a casa con unos cuantos clics. Recuerda que contamos con servicio de envío a domicilio y Pickup, así como diversas formas de pagos.', '../imagenes/me22.webp', 2, 0, 0),
(3, 'Krytan Tek 20 mg/5 mg/2 mg/ml solución 5 ml', 765.00, 'Detalles del artículo\r\n\r\nKrytan Tek 20 mg/5 mg/2 mg/ml solución 5 ml.\r\nConsulte a su médico.\r\nLimitado a 4 piezas por cliente.\r\nRealiza todas tus compras de farmacia desde la comodidad de tu hogar en tu tienda en línea y recibe tus artículos con el servicio a domicilio a tan solo unos clics de distancia. ¡Hacemos el súper por ti!', '../imagenes/me2.webp', 0, 0, 0),
(4, 'Diane 2.00 mg/0.035 mg 21 tabletas', 567.00, 'Detalles del artículo\r\n\r\nDiane 2.00 mg/0.035 mg 21 tabletas.\r\nConsulte a su médico.\r\nLimitado a 4 piezas por cliente.\r\nRealiza todas tus compras de farmacia desde la comodidad de tu hogar en tu tienda en línea y recibe tus artículos con el servicio a domicilio a tan solo unos clics de distancia. ¡Hacemos el súper por ti!', '../imagenes/me3.webp', 0, 0, 0),
(5, 'Nucleo CMP Forte Citidín-5-monofosfato disódico 5 mg Uridín-5-trifosfato trisódico 3 mg 30 cápsulas', 406.00, 'Detalles del artículo\r\n\r\nNucleo CMP Forte Citidín-5-monofosfato disódico 5 mg Uridín-5-trifosfato trisódico 3 mg 30 cápsulas.\r\nConsulte a su médico.\r\nDescubre los artículos que tenemos para toda la familia en la tienda en línea, elige los que necesitas para tu día a día y llévatelos a casa con unos cuantos clics. Recuerda que contamos con servicio de envío a domicilio y Pickup, así como diversas formas de pagos.', '../imagenes/me4.webp', 0, 0, 0),
(6, 'Forxiga 10 mg 28 tabletas', 1283.00, 'Detalles del artículo\r\n\r\nForxiga 10 mg 28 tabletas.\r\nConsulte a su médico.\r\n¡Recibe a domicilio o recoge en tienda todo lo que necesitas para seguir con tu tratamiento médico y disfruta de nuestros precios bajos!', '../imagenes/me5.webp', 0, 0, 0),
(7, 'vartalon\r\nNovovartalon 30 sobres con polvo', 1.00, 'Detalles del artículo\r\n\r\nNovovartalon sobres 30 pzas, glucosamina-meloxicam.\r\nSurte tu receta médica en nuestra tienda en línea y recibe tu tratamiento médico directo en tu hogar.', '../imagenes/me12.webp', 0, 0, 0),
(8, 'Jardianz 25 mg/5 mg 30 tabletas', 2.00, 'Detalles del artículo\r\n\r\nJardianz 25 mg/5 mg 30 tabletas.\r\nConsulte a su médico.\r\n¡Recibe a domicilio o recoge en tienda todo lo que necesitas para seguir con tu tratamiento médico y disfruta de nuestros precios bajos!', '../imagenes/me6.webp', 0, 0, 0),
(9, 'Quetiapina Medimart 100 mg 60 tabletas', 395.00, 'Detalles del artículo\r\n\r\nQuetiapina Medimart 100 mg 60 tabletas.\r\nConsulte a su médico.\r\nDescubre los artículos que tenemos para toda la familia en la tienda en línea, elige los que necesitas para tu día a día y llévatelos a casa con unos cuantos clics. Recuerda que contamos con servicio de envío a domicilio y Pickup, así como diversas formas de pagos.', '../imagenes/me7.webp', 0, 0, 0),
(10, 'Tempra Forte adultos 650 mg 24 tabletas', 108.00, 'Detalles del artículo\r\n\r\nTempra Forte adultos 650 mg 24 tabletas.\r\nConsulte a su médico\r\nHaz tus compras sin salir de casa entrando a tu tienda en línea y encuentra una gran variedad de artículos de farmacia. Recuerda que contamos con diferentes formas de pago.', '../imagenes/me8.webp', 0, 0, 0),
(11, 'Advil 20 cápsulas 400 mg', 129.00, 'Detalles del artículo\r\n\r\nAnalgésico Advil 20 cápsulas 400 mg.\r\nTe invitamos a leer la etiqueta trasera donde podrás encontrar indicaciones e información de seguridad del producto.\r\nConsulte a su médico.\r\nRealiza todas tus compras de farmacia desde la comodidad de tu hogar en tu tienda en línea y recibe tus artículos con el servicio a domicilio a tan sólo unos clics de distancia. ¡Hacemos el súper por ti!', '../imagenes/me9.webp', 0, 0, 0),
(12, 'Jarabe Tempra Infantil sabor fresa 3.2 g 120 ml\r\n', 147.00, 'Detalles del artículo\r\n\r\nJarabe Tempra infantil sabor fresa 3.2 g 120 ml, fiebre y dolor.\r\nConsulte a su médico.\r\nSurte tu receta médica en nuestra tienda en línea y recibe tu tratamiento médico directo en tu hogar.\r\nHaz tus compras en línea y disfruta una gran variedad de artículos de belleza y bienestar. Además recuerda que contamos con diferentes formas de pago y envió a domicilio.', '../imagenes/me10.webp', 0, 0, 0),
(13, 'Krytan Tek 20 mg/5 mg/2 mg/ml solución 5 ml', 765.00, 'Detalles del artículo\r\n\r\nKrytan Tek 20 mg/5 mg/2 mg/ml solución 5 ml.\r\nConsulte a su médico.\r\nLimitado a 4 piezas por cliente.\r\nRealiza todas tus compras de farmacia desde la comodidad de tu hogar en tu tienda en línea y recibe tus artículos con el servicio a domicilio a tan solo unos clics de distancia. ¡Hacemos el súper por ti!', '../imagenes/me2.webp', 0, 0, 0),
(14, 'Diane 2.00 mg/0.035 mg 21 tabletas', 567.00, 'Detalles del artículo\r\n\r\nDiane 2.00 mg/0.035 mg 21 tabletas.\r\nConsulte a su médico.\r\nLimitado a 4 piezas por cliente.\r\nRealiza todas tus compras de farmacia desde la comodidad de tu hogar en tu tienda en línea y recibe tus artículos con el servicio a domicilio a tan solo unos clics de distancia. ¡Hacemos el súper por ti!', '../imagenes/me3.webp', 0, 0, 0),
(15, 'Nucleo CMP Forte Citidín-5-monofosfato disódico 5 mg Uridín-5-trifosfato trisódico 3 mg 30 cápsulas', 406.00, 'Detalles del artículo\r\n\r\nNucleo CMP Forte Citidín-5-monofosfato disódico 5 mg Uridín-5-trifosfato trisódico 3 mg 30 cápsulas.\r\nConsulte a su médico.\r\nDescubre los artículos que tenemos para toda la familia en la tienda en línea, elige los que necesitas para tu día a día y llévatelos a casa con unos cuantos clics. Recuerda que contamos con servicio de envío a domicilio y Pickup, así como diversas formas de pagos.', '../imagenes/me4.webp', 0, 0, 0),
(16, 'Forxiga 10 mg 28 tabletas', 1283.00, 'Detalles del artículo\r\n\r\nForxiga 10 mg 28 tabletas.\r\nConsulte a su médico.\r\n¡Recibe a domicilio o recoge en tienda todo lo que necesitas para seguir con tu tratamiento médico y disfruta de nuestros precios bajos!', '../imagenes/me5.webp', 0, 0, 0),
(17, 'vartalon\r\nNovovartalon 30 sobres con polvo', 1330.00, 'Detalles del artículo\r\n\r\nNovovartalon sobres 30 pzas, glucosamina-meloxicam.\r\nSurte tu receta médica en nuestra tienda en línea y recibe tu tratamiento médico directo en tu hogar.', '../imagenes/me12.webp', 0, 0, 0),
(18, 'Jardianz 25 mg/5 mg 30 tabletas', 2343.00, 'Detalles del artículo\r\n\r\nJardianz 25 mg/5 mg 30 tabletas.\r\nConsulte a su médico.\r\n¡Recibe a domicilio o recoge en tienda todo lo que necesitas para seguir con tu tratamiento médico y disfruta de nuestros precios bajos!', '../imagenes/me6.webp', 0, 0, 0),
(19, 'Quetiapina Medimart 100 mg 60 tabletas', 395.00, 'Detalles del artículo\r\n\r\nQuetiapina Medimart 100 mg 60 tabletas.\r\nConsulte a su médico.\r\nDescubre los artículos que tenemos para toda la familia en la tienda en línea, elige los que necesitas para tu día a día y llévatelos a casa con unos cuantos clics. Recuerda que contamos con servicio de envío a domicilio y Pickup, así como diversas formas de pagos.', '../imagenes/me7.webp', 0, 0, 0),
(20, 'Tempra Forte adultos 650 mg 24 tabletas', 108.00, 'Detalles del artículo\r\n\r\nTempra Forte adultos 650 mg 24 tabletas.\r\nConsulte a su médico\r\nHaz tus compras sin salir de casa entrando a tu tienda en línea y encuentra una gran variedad de artículos de farmacia. Recuerda que contamos con diferentes formas de pago.', '../imagenes/me8.webp', 0, 0, 0),
(21, 'Advil 20 cápsulas 400 mg', 129.00, 'Detalles del artículo\r\n\r\nAnalgésico Advil 20 cápsulas 400 mg.\r\nTe invitamos a leer la etiqueta trasera donde podrás encontrar indicaciones e información de seguridad del producto.\r\nConsulte a su médico.\r\nRealiza todas tus compras de farmacia desde la comodidad de tu hogar en tu tienda en línea y recibe tus artículos con el servicio a domicilio a tan sólo unos clics de distancia. ¡Hacemos el súper por ti!', '../imagenes/me9.webp', 0, 0, 0),
(22, 'Jarabe Tempra Infantil sabor fresa 3.2 g 120 ml\r\n', 147.00, 'Detalles del artículo\r\n\r\nJarabe Tempra infantil sabor fresa 3.2 g 120 ml, fiebre y dolor.\r\nConsulte a su médico.\r\nSurte tu receta médica en nuestra tienda en línea y recibe tu tratamiento médico directo en tu hogar.\r\nHaz tus compras en línea y disfruta una gran variedad de artículos de belleza y bienestar. Además recuerda que contamos con diferentes formas de pago y envió a domicilio.', '../imagenes/me10.webp', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblvantas`
--

CREATE TABLE `tblvantas` (
  `ID` int(11) NOT NULL,
  `ClaveTransaccion` varchar(250) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Direccion` varchar(500) NOT NULL,
  `Total` decimal(60,2) NOT NULL,
  `Status` varchar(200) NOT NULL,
  `Datos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblvantas`
--

INSERT INTO `tblvantas` (`ID`, `ClaveTransaccion`, `Fecha`, `Direccion`, `Total`, `Status`, `Datos`) VALUES
(3, 't72441f34ub6or5s11f4a0ucvd', '2023-12-07 10:52:14', 'hacienda santa maria ', 3378.00, 'pendiente', 0),
(4, 't72441f34ub6or5s11f4a0ucvd', '2023-12-07 10:56:39', 'hacienda santa maria ', 3378.00, 'pendiente', 0),
(5, 't72441f34ub6or5s11f4a0ucvd', '2023-12-07 12:08:33', 'hacienda santa maria ', 3378.00, 'pendiente', 0),
(6, 't72441f34ub6or5s11f4a0ucvd', '2023-12-07 12:11:29', 'hacienda santa maria ', 3378.00, 'pendiente', 0),
(7, 't72441f34ub6or5s11f4a0ucvd', '2023-12-07 12:12:01', 'hacienda santa maria ', 3378.00, 'pendiente', 0),
(8, 't72441f34ub6or5s11f4a0ucvd', '2023-12-07 12:15:09', 'gfk', 1876.00, 'pendiente', 0),
(9, 't72441f34ub6or5s11f4a0ucvd', '2023-12-07 12:28:08', 'gfk', 1876.00, 'pendiente', 0),
(10, 't72441f34ub6or5s11f4a0ucvd', '2023-12-07 12:28:27', 'gfk', 1876.00, 'pendiente', 0),
(11, 't72441f34ub6or5s11f4a0ucvd', '2023-12-07 12:30:34', 'gfk', 1876.00, 'pendiente', 0),
(12, 't72441f34ub6or5s11f4a0ucvd', '2023-12-07 12:31:54', 'gfk', 1876.00, 'pendiente', 0),
(13, 't72441f34ub6or5s11f4a0ucvd', '2023-12-07 12:32:44', 'gfk', 1876.00, 'pendiente', 0),
(14, 't72441f34ub6or5s11f4a0ucvd', '2023-12-07 12:36:05', 'gfk', 1876.00, 'pendiente', 0),
(15, 't72441f34ub6or5s11f4a0ucvd', '2023-12-07 12:41:49', 'gfk', 1876.00, 'pendiente', 0),
(16, 't72441f34ub6or5s11f4a0ucvd', '2023-12-07 12:43:40', 'gfk', 1876.00, 'pendiente', 0),
(17, 't72441f34ub6or5s11f4a0ucvd', '2023-12-07 12:44:20', 'gfk', 1876.00, 'pendiente', 0),
(18, 't72441f34ub6or5s11f4a0ucvd', '2023-12-07 12:47:21', 'gfk', 1876.00, 'pendiente', 0),
(19, 't72441f34ub6or5s11f4a0ucvd', '2024-09-10 12:10:18', 'azsxdfvgbhj', 2046.00, 'pendiente', 0),
(20, 't72441f34ub6or5s11f4a0ucvd', '2024-09-10 12:46:34', 'dfvghjkl', 2811.00, 'pendiente', 0),
(21, 't72441f34ub6or5s11f4a0ucvd', '2024-09-10 14:12:14', 'asdfghjklñ', 935.00, 'pendiente', 0),
(22, 't72441f34ub6or5s11f4a0ucvd', '2024-09-16 13:07:26', 'asdfghjklñ', 935.00, 'pendiente', 0),
(23, 't72441f34ub6or5s11f4a0ucvd', '2024-09-16 16:34:47', 'sdddd', 765.00, 'pendiente', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuarios` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `id_cargo` int(11) NOT NULL DEFAULT 2,
  `codigo_postal` int(5) NOT NULL,
  `numero_telefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuarios`, `nombre`, `apellidos`, `email`, `username`, `contrasena`, `id_cargo`, `codigo_postal`, `numero_telefono`) VALUES
(0, 'ana', 'De la Rosa Flores', 'anadela07@hotmail.com', 'ana1', '$2y$10$ipVjmQq0tym8ZWrOnSno.euPb8LJCmI92ubftvSCoA81/39TOF.Ky', 2, 0, ''),
(0, 'heri', 'wrfr', 'hei@gmail.com', 'heri', '$2y$10$KmraKiuhNhJ/6/ZEZ4XCbOFDtmpZzqtCFuPYNQ9NygZXtW4unuvY.', 2, 0, ''),
(0, 'admin', 'Valdes Daw', 'admin07@hotmail.com', '[value-5]', 'e807f1fcf82d132f9bb018ca6738a19f', 1, 0, '[value-9]'),
(0, 'admin', 'Valdes Daw', 'admin07@hotmail.com', '[value-5]', 'e807f1fcf82d132f9bb018ca6738a19f', 1, 0, '[value-9]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_detalle`
--

CREATE TABLE `venta_detalle` (
  `ID` int(11) NOT NULL,
  `id_ventas` int(11) NOT NULL,
  `id_productos` int(11) NOT NULL,
  `precioUnitario` decimal(20,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tblvantas`
--
ALTER TABLE `tblvantas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `venta_detalle`
--
ALTER TABLE `venta_detalle`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_ventas` (`id_ventas`) USING BTREE,
  ADD KEY `id_productos` (`id_productos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `tblvantas`
--
ALTER TABLE `tblvantas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `venta_detalle`
--
ALTER TABLE `venta_detalle`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `venta_detalle`
--
ALTER TABLE `venta_detalle`
  ADD CONSTRAINT `venta_detalle_ibfk_1` FOREIGN KEY (`id_ventas`) REFERENCES `tblvantas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_detalle_ibfk_2` FOREIGN KEY (`id_productos`) REFERENCES `tblproductos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
