-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 25-12-2019 a las 21:26:01
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
(1, '#000000', '#ffffff', '#47bac1', '#ffffff', 'view/img/plantilla/logo.png', 'view/img/plantilla/icono.png', '[{\r\n        \"red\": \"fa-facebook\",\r\n        \"estilo\": \"facebookBlanco\",\r\n        \"url\": \"http://facebook.com/\"\r\n    },\r\n    {\r\n        \"red\": \"fa-youtube\",\r\n        \"estilo\": \"youtubeBlanco\",\r\n        \"url\": \"http://youtube.com/\"\r\n    },\r\n    {\r\n        \"red\": \"fa-twitter\",\r\n        \"estilo\": \"twitterBlanco\",\r\n        \"url\": \"http://twitter.com/\"\r\n    },\r\n    {\r\n        \"red\": \"fa-google-plus\",\r\n        \"estilo\": \"googleBlanco\",\r\n        \"url\": \"http://google.com/\"\r\n    },\r\n    {\r\n        \"red\": \"fa-instagram\",\r\n        \"estilo\": \"instagramBlanco\",\r\n        \"url\": \"http://instagram.com/\"\r\n    }\r\n]', '2019-12-25 22:20:51');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Plantilla`
--
ALTER TABLE `Plantilla`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Plantilla`
--
ALTER TABLE `Plantilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
