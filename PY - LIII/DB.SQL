-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-04-2025 a las 01:28:37
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
-- Base de datos: `project_language`
--
CREATE DATABASE IF NOT EXISTS `project_language` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `project_language`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `description`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(14) NOT NULL,
  `last_name` varchar(14) NOT NULL,
  `username` varchar(8) NOT NULL,
  `email` varchar(320) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `password` varchar(300) NOT NULL,
  `status` int(1) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `username`, `email`, `telephone`, `password`, `status`, `role_id`) VALUES
(1, 'Diego', 'Rios', '_iJRT', 'diegojrt23@gmail.com', '+58 4124728183', '$2y$10$Kqk9XF8rUUvoBJOsYEQAw.G34CfkT5ALhbiovCcnLQB.61R4jRVPu', 1, 1),
(2, 'Jesus', 'Torres', 'JTR', 'jesus23100501@gmail.com', '+58 4124728435', '$2y$10$rcQ6t5.8of8omh.SWHyoQ.rKWJsbnmQN4SY7j3nX0dbaje1OJPMHa', 1, 1),
(3, 'Sebastian', 'Rios', 'SrGluty', 'sebastian09@gmail.com', '+58 412472524', '$2y$10$3pt5iYhyuVmDIeTiNWYIh.h1hr0I9953Dzh9yrUuKFH9quOe0kATy', 1, 1),
(6, 'Ayuda', 'Quemado', 'Estoy123', 'aaaa@gmail.com', '+58 4124728183', '$2y$10$00aW0YKAX9SkCGWpbmloqOkdIYnyPtSCLtg/84UKVoJBOPBQ9JGn6', 0, 2),
(7, 'Prueba', 'Antes', 'DePasar1', 'aaaa2@gmail.com', '+58 412223244', '$2y$10$GF4g/sBJ5XOwaabAEMlc2.n25Lzj3nQCovwM0AvAteZrPF4EqXkYq', 0, 2),
(8, 'Prueba2', 'Antes2', 'DePasar1', 'aaaa3@gmail.com', '+58 4123224', '$2y$10$8OaXOvfXb.jXRfnpvDdzdONZv0D852Tk2VWfZXVPImpjFwsoE6i4O', 0, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
