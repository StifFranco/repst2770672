-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-02-2024 a las 14:23:19
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `petsapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `photo` varchar(64) NOT NULL DEFAULT 'images/photo-pet.png',
  `type` varchar(32) NOT NULL,
  `weight` varchar(32) NOT NULL,
  `age` int(3) NOT NULL,
  `breed` varchar(32) NOT NULL,
  `location` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pets`
--

INSERT INTO `pets` (`id`, `name`, `photo`, `type`, `weight`, `age`, `breed`, `location`) VALUES
(1, 'Doradito', 'Pet-icon.svg', 'Fish', '22', 1, 'Golden Fish', 'Cartago'),
(2, 'Michi', 'Pet-icon.svg', 'Cat', '50', 2, 'Persa', 'Bogota'),
(4, 'Tobias', '1708986078.jpg', 'Dog', '64', 1, 'Pastor Collie', 'Medellin'),
(18, 'Cuacker', 'Pet-icon.svg', 'Duck', '22', 1, 'Mandarin Duck', 'Manizales'),
(19, 'Patricio', '1708977468.jpg', 'Duck', '4', 5, 'Mandarin', 'Cali');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `document` bigint(12) NOT NULL,
  `fullname` varchar(32) NOT NULL,
  `photo` varchar(64) DEFAULT 'ico-user.svg',
  `phone` varchar(16) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `document`, `fullname`, `photo`, `phone`, `email`, `password`) VALUES
(1, 75000001, 'Jesus Jose Jaramillo', 'ico-user.svg', '3225669559', 'jejoja@gmail.com', ' $2y$10$eRpDlGmh6073P2PgORI/fOEGsZGAsbS3ARFe8oLVfhyGx6qm1TVhu');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `document` (`document`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
