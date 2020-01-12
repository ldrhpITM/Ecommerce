-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 05-01-2020 a las 23:14:26
-- Versión del servidor: 10.1.43-MariaDB-0ubuntu0.18.04.1
-- Versión de PHP: 7.3.13-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Categorias`
--

CREATE TABLE `Categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish2_ci NOT NULL,
  `ruta` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `Categorias`
--

INSERT INTO `Categorias` (`id`, `categoria`, `ruta`, `fecha`) VALUES
(1, 'Ropa', 'ropa', '0000-00-00 00:00:00'),
(2, 'Calzado', 'calzado', '0000-00-00 00:00:00'),
(3, 'Accesorios', 'accesorios', '0000-00-00 00:00:00'),
(4, 'Tecnología', 'tecnologia', '0000-00-00 00:00:00'),
(5, 'Cursos', 'cursos', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Plantilla`
--

CREATE TABLE `Plantilla` (
  `id` int(11) NOT NULL,
  `barraSuperior` text COLLATE utf8_spanish2_ci NOT NULL,
  `textoSuperior` text COLLATE utf8_spanish2_ci NOT NULL,
  `colorFondo` text COLLATE utf8_spanish2_ci NOT NULL,
  `colorTexto` text COLLATE utf8_spanish2_ci NOT NULL,
  `logo` text COLLATE utf8_spanish2_ci NOT NULL,
  `icono` text COLLATE utf8_spanish2_ci NOT NULL,
  `redesSociales` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `Plantilla`
--

INSERT INTO `Plantilla` (`id`, `barraSuperior`, `textoSuperior`, `colorFondo`, `colorTexto`, `logo`, `icono`, `redesSociales`, `fecha`) VALUES
(1, '#000000', '#ffffff', '#47bac1', '#ffffff', 'view/img/plantilla/logo.png', 'view/img/plantilla/icono.png', '[{\r\n        \"red\": \"fa-facebook\",\r\n        \"estilo\": \"facebookBlanco\",\r\n        \"url\": \"http://facebook.com/\"\r\n    },\r\n    {\r\n        \"red\": \"fa-youtube\",\r\n        \"estilo\": \"youtubeBlanco\",\r\n        \"url\": \"http://youtube.com/\"\r\n    },\r\n    {\r\n        \"red\": \"fa-twitter\",\r\n        \"estilo\": \"twitterBlanco\",\r\n        \"url\": \"http://twitter.com/\"\r\n    },\r\n    {\r\n        \"red\": \"fa-google-plus\",\r\n        \"estilo\": \"googleBlanco\",\r\n        \"url\": \"http://google.com/\"\r\n    },\r\n    {\r\n        \"red\": \"fa-instagram\",\r\n        \"estilo\": \"instagramBlanco\",\r\n        \"url\": \"http://instagram.com/\"\r\n    }\r\n]', '2019-12-26 04:23:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Subcategorias`
--

CREATE TABLE `Subcategorias` (
  `id` int(11) NOT NULL,
  `subcategoria` text COLLATE utf8_spanish2_ci NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `ruta` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `Subcategorias`
--

INSERT INTO `Subcategorias` (`id`, `subcategoria`, `categoria_id`, `ruta`, `fecha`) VALUES
(1, 'Ropa para Dama', 1, 'ropa-para-dama', '0000-00-00 00:00:00'),
(2, 'Ropa para Hombre', 1, 'ropa-para-hombre', '0000-00-00 00:00:00'),
(3, 'Ropa Deportiva', 1, 'ropa-deportiva', '0000-00-00 00:00:00'),
(4, 'Ropa Infantil', 1, 'ropa-infantil', '0000-00-00 00:00:00'),
(5, 'Calzado para Dama', 2, 'calzado-para-dama', '0000-00-00 00:00:00'),
(6, 'Calzado para Hombre', 2, 'calzado-para-hombre', '0000-00-00 00:00:00'),
(7, 'Calzado Deportivo', 2, 'calzado-deportivo', '0000-00-00 00:00:00'),
(8, 'Calzado Infantil', 2, 'calzado-infantil', '0000-00-00 00:00:00'),
(9, 'Bolsos', 3, 'bolsos', '0000-00-00 00:00:00'),
(10, 'Relojes', 3, 'relojes', '0000-00-00 00:00:00'),
(11, 'Pulseras', 3, 'pulseras', '0000-00-00 00:00:00'),
(12, 'Collares', 3, 'collares', '0000-00-00 00:00:00'),
(13, 'Gafas de Sol', 3, 'Gafas-de-sol', '0000-00-00 00:00:00'),
(14, 'Teléfonos Móvil', 4, 'telefonos-móvil', '0000-00-00 00:00:00'),
(15, 'Tabletas Electrónicas', 4, 'tabletas-electronicas', '0000-00-00 00:00:00'),
(16, 'Computadoras', 4, 'computadoras', '0000-00-00 00:00:00'),
(17, 'Auriculares', 4, 'auriculares', '0000-00-00 00:00:00'),
(18, 'Desarrollo web', 5, 'desarrollo-web', '0000-00-00 00:00:00'),
(19, 'Aplicaciones Movil', 5, 'aplicaciones-movil', '0000-00-00 00:00:00'),
(20, 'Diseño Grafico', 5, 'diseño-grafico', '0000-00-00 00:00:00'),
(21, 'Marketing Digital', 5, 'marketing-digital', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Categorias`
--
ALTER TABLE `Categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Plantilla`
--
ALTER TABLE `Plantilla`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Subcategorias`
--
ALTER TABLE `Subcategorias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Categorias`
--
ALTER TABLE `Categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `Plantilla`
--
ALTER TABLE `Plantilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `Subcategorias`
--
ALTER TABLE `Subcategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
