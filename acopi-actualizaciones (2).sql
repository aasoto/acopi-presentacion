-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2022 a las 01:01:24
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `acopi-actualizaciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `updated_at`, `created_at`) VALUES
(1, 'Noticias', NULL, NULL),
(2, 'Capacitación', NULL, NULL),
(3, 'Otros', NULL, NULL),
(4, 'Eventos', NULL, NULL),
(5, 'Articulo', '2022-10-01 08:03:57', '2022-10-01 07:46:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `tipo_usuario_cita` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `cc_rprt_legal` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cc_interesado` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_interesado` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_cita` date NOT NULL,
  `hora_cita` time NOT NULL,
  `area` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado_cita` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `color` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `tipo_usuario_cita`, `id_empresa`, `cc_rprt_legal`, `cc_interesado`, `nombre_interesado`, `fecha_cita`, `hora_cita`, `area`, `estado_cita`, `color`, `created_at`, `updated_at`) VALUES
(1, 'afiliado', 13, '77345723', NULL, NULL, '2022-02-15', '08:00:00', 'Director ejecutivo', 'pendiente', '#ffc107', '2022-02-10 02:18:10', '2022-02-11 02:18:27'),
(3, 'interesado', NULL, NULL, '1065856913', 'María Belén Atehortúa Álvarez', '2022-02-14', '09:00:00', 'Subdirector juridico', 'atendida', '#28a745', '2022-02-10 03:07:04', '2022-02-12 02:53:30'),
(4, 'afiliado', 15, '49548329', NULL, NULL, '2022-02-14', '16:00:00', 'Director ejecutivo', 'pendiente', '#ffc107', '2022-02-10 03:09:16', '2022-02-12 03:04:57'),
(5, 'afiliado', 12, '49328431', NULL, NULL, '2022-02-11', '16:00:00', 'Director ejecutivo', 'perdida', '#dc3545', '2022-02-10 07:36:02', '2022-02-12 02:52:25'),
(6, 'interesado', NULL, NULL, '1006438450', 'Ebenezer de Jesus Hernandez de Ávila', '2022-02-18', '08:00:00', 'Director ejecutivo', 'pendiente', '#ffc107', '2022-02-10 07:37:29', '2022-02-11 02:21:30'),
(7, 'afiliado', 1, '1065831073', NULL, NULL, '2022-02-15', '10:00:00', 'Director ejecutivo', 'pendiente', '#ffc107', '2022-02-12 18:27:45', '2022-02-12 18:27:45'),
(8, 'afiliado', 14, '77213845', NULL, NULL, '2022-04-04', '08:00:00', 'Subdirector administrativo y financiero', 'atendida', '#28a745', '2022-04-03 20:10:36', '2022-04-03 20:11:22'),
(9, 'afiliado', 17, '1065873651', NULL, NULL, '2022-05-23', '12:00:00', 'Subdirector de desarrollo empresarial', 'pendiente', '#ffc107', '2022-05-20 21:17:51', '2022-05-20 21:17:51'),
(10, 'afiliado', 3, '1065829462', NULL, NULL, '2022-08-12', '10:00:00', 'Director ejecutivo', 'pendiente', '#ffc107', '2022-06-02 04:38:17', '2022-08-06 00:37:22'),
(13, 'interesado', NULL, NULL, '54034978', 'Miguel Castro', '2022-08-15', '09:00:00', 'Subdirector administrativo y financiero', 'pendiente', '#ffc107', '2022-08-11 22:42:48', '2022-08-11 22:47:02'),
(14, 'afiliado', 20, '49213754', NULL, NULL, '2022-09-29', '12:50:00', 'Subdirector administrativo y financiero', 'pendiente', '#ffc107', '2022-09-17 21:50:02', '2022-09-17 21:50:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `id` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `empresas_activas` int(11) DEFAULT NULL,
  `empresas_inactivas` int(11) DEFAULT NULL,
  `empresas_nuevas` int(11) DEFAULT NULL,
  `recibos_generados` int(11) DEFAULT NULL,
  `recibos_pendientes` int(11) DEFAULT NULL,
  `recibos_pagos` int(11) DEFAULT NULL,
  `recibos_negociados` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`id`, `mes`, `year`, `empresas_activas`, `empresas_inactivas`, `empresas_nuevas`, `recibos_generados`, `recibos_pendientes`, `recibos_pagos`, `recibos_negociados`, `created_at`, `updated_at`) VALUES
(1, 1, 2022, 50, 12, 5, 50, 10, 40, 2, NULL, NULL),
(2, 2, 2022, 52, 10, 5, 52, 8, 44, 5, NULL, NULL),
(3, 3, 2022, 60, 5, 2, 60, 12, 48, 0, NULL, NULL),
(4, 4, 2022, 62, 5, 8, 62, 8, 54, 2, NULL, NULL),
(5, 5, 2022, 64, 3, 10, 64, 0, 64, 1, NULL, NULL),
(6, 6, 2022, 17, 1, 0, 17, 9, 6, 2, '2022-06-15 07:41:56', '2022-06-22 03:58:28'),
(7, 7, 2022, 16, 3, 0, 17, 0, 14, 0, '2022-08-01 21:17:26', '2022-08-01 21:17:26'),
(8, 8, 2022, 17, 4, 3, 30, 12, 10, 8, NULL, NULL),
(9, 9, 2022, 21, 3, 0, 22, 18, 1, 0, '2022-09-30 20:17:07', '2022-10-01 01:47:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_rango`
--

CREATE TABLE `datos_rango` (
  `id` int(11) NOT NULL,
  `rango` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `datos_rango`
--

INSERT INTO `datos_rango` (`id`, `rango`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 6, '6 meses', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `tipo_documento` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `num_documento` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `primer_nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `segundo_nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `primer_apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `segundo_apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `email` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_rol` int(11) NOT NULL,
  `estado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `foto` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `hoja_de_vida` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `cedula` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `tipo_documento`, `num_documento`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `sexo`, `fecha_nacimiento`, `email`, `id_rol`, `estado`, `id_usuario`, `foto`, `hoja_de_vida`, `cedula`, `created_at`, `updated_at`) VALUES
(2, 'CC', '1065831073', 'Andrés', 'Alfredo', 'Soto', 'Suárez', 'M', '1997-02-13', 'aasoto@gmail.com', 1, 'Pasante', 17, 'vistas/documentos/empleados/fotos/8440831.jpg', 'vistas/documentos/empleados/hojas-de-vida/4124001.pdf', 'vistas/documentos/empleados/cedulas/7907716.pdf', '2022-03-17 03:52:51', '2022-04-01 01:23:52'),
(5, 'CC', '1065758329', 'Pedro', 'José', 'Hurtado', 'Hurtado', 'M', '2004-06-25', 'pjhurtado@gmail.com', 6, 'Pasante', 16, 'vistas/documentos/empleados/fotos/4901119.jpg', 'vistas/documentos/empleados/hojas-de-vida/9069797.pdf', 'vistas/documentos/empleados/cedulas/3698473.pdf', '2022-03-22 07:39:44', '2022-04-01 01:16:55'),
(6, 'CC', '77435859', 'María', 'Clemencia', 'Torres', 'De Alba', 'F', '1960-01-12', 'mctorres@gmail.com', 7, 'Empleado', 25, 'vistas/documentos/empleados/fotos/9287112.jpg', 'vistas/images/empleados/documentos/6906769.pdf', 'vistas/documentos/empleados/cedulas/8963456.jpg', '2022-03-24 03:13:21', '2022-07-17 03:02:34'),
(8, 'CC', '1065831073', 'Andrés', 'Alfredo', 'Soto', 'Suarez', 'M', '1997-02-13', 'andresalfredosotosuarez@gmail.com', 1, 'Empleado', 1, 'vistas/documentos/empleados/fotos/9118801.jpg', 'vistas/documentos/empleados/hojas-de-vida/5889636.pdf', 'vistas/documentos/empleados/cedulas/4631593.pdf', '2022-04-02 01:59:22', '2022-04-02 01:59:22'),
(9, 'CC', '1065834328', 'Jean', 'Carlos', 'Recio', 'Caballero', 'M', '1997-05-12', 'jrecio@gmail.com', 1, 'Pasante', 4, 'vistas/documentos/empleados/fotos/4689448.jpg', 'vistas/documentos/empleados/hojas-de-vida/7087339.pdf', 'vistas/documentos/empleados/cedulas/8549545.pdf', '2022-04-02 02:15:07', '2022-04-02 02:15:07'),
(10, 'CC', '77342845', 'Yekaterina', 'Ivanova', 'Gagarín', 'Yeltsin', 'F', '1978-12-12', 'yigagarin@vk.com', 7, 'Empleado', 18, 'vistas/documentos/empleados/fotos/3079240.jpg', 'vistas/documentos/empleados/hojas-de-vida/6336775.pdf', 'vistas/documentos/empleados/cedulas/4058425.pdf', '2022-04-02 02:22:36', '2022-04-02 02:23:13'),
(11, 'CC', '49548506', 'Adonais', NULL, 'Fuentes', 'Argote', 'F', '1990-12-31', 'afuentes@gmail.com', 2, 'Empleado', 19, 'vistas/documentos/empleados/fotos/7651080.jpg', 'vistas/documentos/empleados/hojas-de-vida/6754971.pdf', 'vistas/documentos/empleados/cedulas/8830334.pdf', '2022-04-03 00:25:34', '2022-04-03 00:40:39'),
(12, 'CC', '67483193', 'Hernan', 'Enrique', 'Cuevas', 'Castro', 'M', '1976-08-12', 'hecuervas@gmail.com', 3, 'Empleado', 20, 'vistas/documentos/empleados/fotos/3268649.jpg', 'vistas/documentos/empleados/hojas-de-vida/3128388.pdf', 'vistas/documentos/empleados/cedulas/2592675.pdf', '2022-04-03 00:28:18', '2022-04-03 00:40:47'),
(13, 'CC', '77329540', 'Carlota', 'Sofía', 'Manrriquez', 'Orcasita', 'F', '1985-07-06', 'csmartinez@gmail.com', 4, 'Empleado', 21, 'vistas/documentos/empleados/fotos/7657275.jpg', 'vistas/documentos/empleados/hojas-de-vida/6558276.pdf', 'vistas/documentos/empleados/cedulas/1932432.pdf', '2022-04-03 00:34:37', '2022-04-03 00:40:52'),
(14, 'CC', '99438549', 'Jeison', 'José', 'Zamora', 'Sotelo', 'M', '1986-03-31', 'jjzamora@gmail.com', 5, 'Empleado', 22, 'vistas/documentos/empleados/fotos/8218976.jpg', 'vistas/documentos/empleados/hojas-de-vida/3402323.pdf', 'vistas/documentos/empleados/cedulas/5982512.jpg', '2022-04-03 00:37:28', '2022-04-03 00:40:58'),
(15, 'CC', '1065658438', 'Margarita', 'Lilomila', 'De Tormes', 'y Alcahazar', 'F', '1981-12-25', 'mldetormes@gmail.com', 6, 'Empleado', 23, 'vistas/documentos/empleados/fotos/2167913.jpg', 'vistas/documentos/empleados/hojas-de-vida/9552558.pdf', 'vistas/documentos/empleados/cedulas/6101458.jpg', '2022-04-03 00:40:09', '2022-04-03 00:41:03'),
(16, 'CC', '1065932854', 'Ernestina', 'María', 'Herrera', 'Gómez', 'F', '1980-12-12', 'emherrara@gmail.com', 4, 'Empleado', 24, 'vistas/documentos/empleados/fotos/8483000.jpg', 'vistas/documentos/empleados/hojas-de-vida/1056822.pdf', 'vistas/documentos/empleados/cedulas/3054121.jpg', '2022-04-21 02:02:18', '2022-07-20 21:52:55'),
(17, 'CC', '1065943950', 'Alejandra', 'María', 'Arvelaez', 'De la Torre', 'F', '1997-12-12', 'alarvelaez@gmail.com', 4, 'Empleado', 26, 'vistas/documentos/empleados/fotos/4860491.jpg', 'vistas/documentos/empleados/hojas-de-vida/1448426.pdf', 'vistas/documentos/empleados/cedulas/8239168.jpg', '2022-08-06 02:31:39', '2022-08-11 22:20:48'),
(19, 'CC', '458967439', 'Mario', 'Andres', 'Martinez', 'Arzuaga', 'M', '1997-12-12', 'info@des.com', 3, 'Empleado', NULL, 'vistas/documentos/empleados/fotos/7872933.jpg', 'vistas/documentos/empleados/hojas-de-vida/4689135.pdf', 'vistas/documentos/empleados/cedulas/1184796.jpg', '2022-09-17 21:07:26', '2022-10-01 03:14:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados_afiliados`
--

CREATE TABLE `empleados_afiliados` (
  `id_empleado_afiliado` int(11) NOT NULL,
  `tipo_doc_empleado_afiliado` text COLLATE utf8_spanish_ci NOT NULL,
  `cc_empleado_afiliado` text COLLATE utf8_spanish_ci NOT NULL,
  `primer_nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `segundo_nombre` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `primer_apellido` text COLLATE utf8_spanish_ci NOT NULL,
  `segundo_apellido` text COLLATE utf8_spanish_ci NOT NULL,
  `cargo_empleado_afiliado` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `id_empresa_afiliado` int(11) NOT NULL,
  `nit_empresa_afiliado` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen_cedula` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleados_afiliados`
--

INSERT INTO `empleados_afiliados` (`id_empleado_afiliado`, `tipo_doc_empleado_afiliado`, `cc_empleado_afiliado`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `cargo_empleado_afiliado`, `fecha_nacimiento`, `id_empresa_afiliado`, `nit_empresa_afiliado`, `imagen_cedula`, `created_at`, `updated_at`) VALUES
(1, 'cedula', '77432043', 'Miguel', 'José', 'Henao', 'Acosta', 'Repartidor', '1981-03-12', 1, '475939293-5', 'vistas/images/afiliados/empleados/documentos/3352371.jpg', '2022-01-18 07:50:32', '2022-01-18 07:50:32'),
(2, 'cedula', '1065843745', 'Sandra', 'Catalina', 'Martinez', 'Gonzalez', 'Recepcionista', '1992-12-12', 3, '5843729343-6', 'vistas/images/afiliados/empleados/documentos/5777857.jpg', '2022-01-18 07:54:36', '2022-01-18 07:54:36'),
(3, 'cedula', '1065851740', 'Martha', NULL, 'Salas', 'Costa', 'Tecnica', '1990-12-12', 1, '475939293-5', 'vistas/images/afiliados/empleados/documentos/2824721.jpg', '2022-01-19 02:19:02', '2022-01-19 02:19:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int(11) NOT NULL,
  `nit_empresa` text COLLATE utf8_spanish_ci NOT NULL,
  `razon_social` text COLLATE utf8_spanish_ci NOT NULL,
  `cc_rprt_legal` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `num_empleados` int(11) NOT NULL,
  `direccion_empresa` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono_empresa` text COLLATE utf8_spanish_ci NOT NULL,
  `fax_empresa` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `celular_empresa` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `email_empresa` text COLLATE utf8_spanish_ci NOT NULL,
  `id_sector_empresa` int(11) NOT NULL,
  `productos_empresa` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `ciudad_empresa` text COLLATE utf8_spanish_ci NOT NULL,
  `estado_afiliacion_empresa` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `numero_pagos_atrasados` int(11) DEFAULT NULL,
  `fecha_afiliacion_empresa` date DEFAULT NULL,
  `carta_bienvenida` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `acta_compromiso` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `estudio_afiliacion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `rut` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `camara_comercio` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechas_birthday` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `nit_empresa`, `razon_social`, `cc_rprt_legal`, `num_empleados`, `direccion_empresa`, `telefono_empresa`, `fax_empresa`, `celular_empresa`, `email_empresa`, `id_sector_empresa`, `productos_empresa`, `ciudad_empresa`, `estado_afiliacion_empresa`, `numero_pagos_atrasados`, `fecha_afiliacion_empresa`, `carta_bienvenida`, `acta_compromiso`, `estudio_afiliacion`, `rut`, `camara_comercio`, `fechas_birthday`, `created_at`, `updated_at`) VALUES
(1, '475939293-5', 'CompuCell', '1065831073', 8, 'Cra 14 No. 16-35', '5724386', '5724386', '3045395221', 'info@compucell.com', 2, '[\"celulares\",\"computadores\",\"reparaci\\u00f3n de equipos\",\"venta de software\"]', 'VLL', 'activa', 0, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-11 01:43:01', '2022-09-30 20:16:20'),
(2, '574382232-5', 'Variedades Rosita', '1065839234', 8, 'Cra 25 No. 34-45', '5824385', '5824385', '3003428574', 'info@variedadesrosita.com', 2, '[\"collares\",\"hilos\",\"agujas\",\"telas\",\"vestidos\",\"camisas\",\"botones\"]', 'LPZ', 'inactiva', 3, '2021-01-14', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-13 23:10:40', '2022-06-15 01:09:00'),
(3, '5843729343-6', 'Comercializadora La Providencia', '1065829462', 40, 'Cra 4A No. 25A-03', '5739483', '4538457', '3205483295', 'comlaprovidencia@hotmail.com', 1, '[\"abonos\",\"verduras\",\"frutas\"]', 'VLL', 'activa', 1, '2021-01-03', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-16 02:01:37', '2022-09-30 20:16:20'),
(6, '568430438-2', 'Boutique París', '1065723941', 5, 'Calle 18 No. 12-32', '5823495', '5823495', '3005494396', 'info@boutiqueparis.com', 2, '[\"ropa de damas\",\"vestidos de noche\",\"vestidos de novia\",\"lencer\\u00eda\",\"zapatos\",\"sandalias\"]', 'AGC', 'activa', 2, '2021-12-12', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-26 06:59:39', '2022-09-30 20:16:20'),
(7, '659430459-3', 'Ferretería Las Casas', '1001234758', 12, 'Cra 35 No. 23-01', '5723485', '5723485', '3003425483', 'info@ferrelascasas.com', 2, '[\"ladrillos\",\"varillas\",\"cemetos\",\"pintura\",\"grevilla\",\"herramientas de construccion\"]', 'LPZ', 'activa', 2, '2022-01-24', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-26 07:07:44', '2022-09-30 20:16:20'),
(8, '342948548-4', 'Textiles Libra-Yardas', '77345213', 20, 'Calle 11 No. 9A-01', '5726593', '5726593', '3045862395', 'info@librayardas.com', 3, '[\"telas\"]', 'VLL', 'activa', 1, '2022-01-24', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-26 07:12:01', '2022-09-30 20:16:21'),
(9, '485328438-9', 'Restaurante Seoul', '1001438437', 10, 'Cra 18D No. 21-35', '5823245', '5823245', '3045868305', 'info@restauranteseoul.com', 2, '[\"comida coreana\",\"bebidas\"]', 'VLL', 'activa', 0, '2021-10-22', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-26 07:15:51', '2022-09-30 20:16:21'),
(10, '595324850-4', 'Droguería La Bendición', '65327430', 4, 'Cra 23 No. 23-23', '5823256', '5823256', '3164394395', 'info@labencion.com', 2, '[\"medicamentos\",\"productos para el cuidado personal\",\"tapabocas\"]', 'CDZ', 'activa', 0, '2021-01-12', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-26 07:28:13', '2022-09-30 20:16:21'),
(11, '548438329-4', 'Gimnasio Mundo del Fitness', '1065856913', 5, 'Cra 40 No. 8D-34', '5724395', '5724395', '3173283493', 'info@mundodelfitness.com', 2, '[\"proteinas\",\"alquiler de maquinas de musculacion\",\"entremamiento personalizado\"]', 'VLL', 'activa', 0, '2019-03-12', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-26 07:39:05', '2022-09-30 20:16:21'),
(12, '548329453-4', 'RestoBar La Esquina Rosa', '49328431', 7, 'Diagona 23 No. 17-44', '5833285', '5833285', '3145485295', 'info@laesquinarosa.com', 2, '[\"cervezas\",\"comidas rapidas\",\"cenas\"]', 'VLL', 'activa', 0, '2021-01-20', 'vistas/documentos/afiliados/empresas/carta_bienvenida/94567450.pdf', NULL, NULL, NULL, NULL, NULL, '2022-01-26 07:46:16', '2022-09-30 20:16:22'),
(13, '657394758-3', 'Opticas Lunnettes', '77345723', 12, 'Cra 15 No. 13-34', '5823285', '5823285', '3208459345', 'info@opticaslunnettes', 2, '[\"gafas\",\"consulta de optometria\"]', 'VLL', 'inactiva', 3, '2021-01-25', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-26 07:52:09', '2022-08-01 19:47:04'),
(14, '584439329-5', 'Electrodomesticos Nuevo Milenio', '77213845', 6, 'Cra 8A No. 16A-12', '5723232', '5723232', '3045863850', 'info@electronuevomilenio.com', 2, '[\"electrodomesticos\",\"televisores\",\"computadores\",\"celulares\"]', 'VLL', 'activa', 0, '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-26 07:55:59', '2022-09-30 20:16:22'),
(15, '475954021-5', 'Motos La 12', '49548329', 8, 'Calle 12 No. 11-23', '5823487', '5823487', '3008793254', 'info@motosdoce.com', 2, '[\"motos\",\"repuestos de motos\"]', 'VLL', 'activa', 0, '2021-01-20', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-26 07:58:22', '2022-09-30 20:16:22'),
(16, '453854394-6', 'Floristería las Margaritas', '1065832953', 5, 'Cra 13 No. 24-45', '5739548', '5739548', '3194384395', 'info@lasmargaritas.com', 2, '[\"flores\",\"adornos florales\",\" decoraciones\"]', 'LPZ', 'activa', 0, '2022-01-25', NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-29 07:16:11', '2022-09-30 20:16:22'),
(17, '596026594-2', 'Restaurante de puerta de Nankín', '1065873651', 10, 'Cra 8A No. 10-35', '5724396', '5724396', '3194385407', 'info@puertanankin.com', 2, '[\"comida china\",\"arroz chino\",\"bebidas frias\",\"domicilios\"]', 'CDZ', 'activa', 0, '2022-03-01', 'vistas/documentos/afiliados/empresas/carta_bienvenida/63902660.pdf', 'vistas/documentos/afiliados/empresas/acta_compromiso/57533257.pdf', 'vistas/documentos/afiliados/empresas/estudio_afiliacion/92522229.pdf', 'vistas/documentos/afiliados/empresas/rut/47095405.pdf', 'vistas/documentos/afiliados/empresas/camara_comercio/57358597.pdf', 'vistas/documentos/afiliados/empresas/fechas_birthday/38034857.pdf', '2022-03-21 02:55:24', '2022-09-30 20:16:22'),
(18, '657394539-2', 'Empaquetería de la Costa', '77324956', 34, 'Calle 2 No. 13-45', '5834395', '5834395', '3209568345', 'info@empaqueriadelacosta.com', 2, '[\"empaquetes\",\"bolsas\",\"carpas\"]', 'AST', 'activa', 0, '2022-03-01', 'vistas/documentos/afiliados/empresas/carta_bienvenida/88219390.pdf', 'vistas/documentos/afiliados/empresas/acta_compromiso/89486847.pdf', 'vistas/documentos/afiliados/empresas/estudio_afiliacion/54568695.pdf', 'vistas/documentos/afiliados/empresas/rut/61610035.pdf', 'vistas/documentos/afiliados/empresas/camara_comercio/25324772.pdf', 'vistas/documentos/afiliados/empresas/fechas_birthday/25367311.pdf', '2022-03-21 03:18:18', '2022-09-30 20:16:22'),
(19, '5864394385-7', 'Gimnasio Cuerpo al Límite', '49520439', 7, 'Diagonal 12 No. 12-45', '5695678', '5695678', '3225469240', 'info@gymallimite.com', 2, '[\"entrenamiento personalizado\",\"suplementos multivitaminicos\",\"manuernas\",\"ropa deportiva\"]', 'BSC', 'activa', 0, '2022-03-02', 'vistas/documentos/afiliados/empresas/carta_bienvenida/79193744.pdf', 'vistas/documentos/afiliados/empresas/acta_compromiso/59492226.pdf', 'vistas/documentos/afiliados/empresas/estudio_afiliacion/90549113.pdf', 'vistas/documentos/afiliados/empresas/rut/36959385.pdf', 'vistas/documentos/afiliados/empresas/camara_comercio/81250490.pdf', 'vistas/documentos/afiliados/empresas/fechas_birthday/86577550.pdf', '2022-03-22 01:34:48', '2022-09-30 20:16:22'),
(20, '6874356078-3', 'Ferretería La Esperanza', '49213754', 10, 'Calle 7 No. 23-45', '5823456', '5823456', '3125484507', 'info@ferreesperanza.com', 2, '[\"ladrillos\",\"cementos\",\"varillas\",\"baldosas\",\"ba\\u00f1os\",\"cables\",\"herramientas\"]', 'VLL', 'activa', 2, '2020-06-02', 'vistas/documentos/afiliados/empresas/carta_bienvenida/97520268.pdf', 'vistas/documentos/afiliados/empresas/acta_compromiso/43796795.pdf', 'vistas/documentos/afiliados/empresas/estudio_afiliacion/40159434.pdf', 'vistas/documentos/afiliados/empresas/rut/54036122.pdf', 'vistas/documentos/afiliados/empresas/camara_comercio/81036932.pdf', 'vistas/documentos/afiliados/empresas/fechas_birthday/31463561.pdf', '2022-03-22 07:31:37', '2022-09-30 20:16:23'),
(21, '439560328-3', 'Sastrería Los Pinos', '77329456', 10, 'Cra 23 No. 16B-34', '5823402', '5823402', '3003294395', 'info@lospinos.com', 5, '[\"camisas\",\"pantalones\",\"corbatas\"]', 'VLL', 'inactiva', 3, '2022-01-01', 'vistas/documentos/afiliados/empresas/carta_bienvenida/63496833.pdf', 'vistas/documentos/afiliados/empresas/acta_compromiso/52896504.pdf', 'vistas/documentos/afiliados/empresas/estudio_afiliacion/64593063.pdf', 'vistas/documentos/afiliados/empresas/rut/96110689.pdf', 'vistas/documentos/afiliados/empresas/camara_comercio/28358570.pdf', 'vistas/documentos/afiliados/empresas/fechas_birthday/52034129.pdf', '2022-07-22 00:41:52', '2022-08-01 19:47:06'),
(22, '596082594-2', 'El herrero de la 25', '1100549328', 10, 'Cra 25 No. 18D-45', '5729406', '5729406', '3003295496', 'info@elherrero.com', 2, '[\"rejas\",\"puertas\",\"candados\"]', 'AST', 'activa', 0, '2022-01-01', 'vistas/documentos/afiliados/empresas/carta_bienvenida/48445765.pdf', 'vistas/documentos/afiliados/empresas/acta_compromiso/70551368.pdf', NULL, 'vistas/documentos/afiliados/empresas/rut/43392892.pdf', 'vistas/documentos/afiliados/empresas/camara_comercio/17167067.pdf', 'vistas/documentos/afiliados/empresas/fechas_birthday/92493923.pdf', '2022-08-01 22:26:38', '2022-09-30 20:16:23'),
(23, '8774356078-3', 'Modistería La casa de Vestido', NULL, 17, 'Cra 34 No. 45-23', '5721234', '5721234', '3045967284', 'info@lacasadelvestido.com', 5, '[\"vestidos\",\"blusas\",\"pantalones\",\"vestidos de novia\"]', 'BCR', 'activa', 0, '2021-12-12', '', '', '', '', '', '', '2022-08-05 19:42:35', '2022-09-30 20:16:23'),
(24, '8774356078-3', 'Modistería La casa de Vestido', '1065943920', 17, 'Cra 34 No. 45-23', '5721234', '5721234', '3045967284', 'info@lacasadelvestido.com', 5, '[\"vestidos\",\"blusas\",\"pantalones\",\"vestidos de novia\"]', 'BCR', 'activa', 0, '2021-12-12', 'vistas/documentos/afiliados/empresas/carta_bienvenida/28250442.pdf', 'vistas/documentos/afiliados/empresas/acta_compromiso/63981259.pdf', 'vistas/documentos/afiliados/empresas/estudio_afiliacion/41059014.pdf', 'vistas/documentos/afiliados/empresas/rut/13455798.pdf', 'vistas/documentos/afiliados/empresas/camara_comercio/33457141.pdf', 'vistas/documentos/afiliados/empresas/fechas_birthday/15649816.pdf', '2022-08-05 19:43:57', '2022-09-30 20:16:23'),
(25, '424356078-3', 'Lacteos NorteValle', NULL, 12, 'Cra 4a No. 3-43', '5723456', '5724567', '3124395487', 'info@lacteosnorte.com', 2, '[\"leche\",\"queso\",\"suero\",\"crema de leche\",\"yogourt\"]', 'VLL', 'activa', 0, '2021-12-12', '', '', '', '', '', '', '2022-08-05 19:57:54', '2022-09-30 20:16:23'),
(26, '8874356078-3', 'La casa de la pintura', '1120439549', 34, 'Cra 34 No. 23-01', '5844321', '5844321', '3129540679', 'info@lacasadelapintura.com', 2, '[\"pinturas\",\"brochas\",\"madera\",\"ladrillos\"]', 'VLL', 'activa', 0, '2022-01-01', 'vistas/documentos/afiliados/empresas/carta_bienvenida/78093641.pdf', 'vistas/documentos/afiliados/empresas/acta_compromiso/47180946.pdf', 'vistas/documentos/afiliados/empresas/estudio_afiliacion/67483161.pdf', 'vistas/documentos/afiliados/empresas/rut/75604405.pdf', 'vistas/documentos/afiliados/empresas/camara_comercio/92641297.pdf', 'vistas/documentos/afiliados/empresas/fechas_birthday/45952276.pdf', '2022-08-10 22:17:25', '2022-09-30 20:16:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrevistas`
--

CREATE TABLE `entrevistas` (
  `id` int(11) NOT NULL,
  `titulo_entrevista` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_entrevista` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `video_entrevista` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `entrevistas`
--

INSERT INTO `entrevistas` (`id`, `titulo_entrevista`, `descripcion_entrevista`, `video_entrevista`, `created_at`, `updated_at`) VALUES
(1, 'REACTIVACIÓN DE ACOPI CESAR', 'Comienza la transformación en de los microempresarios en el departamento del Cesar. ', 'https://www.youtube.com/embed/qJ7Kpfm6DXM', NULL, NULL),
(2, 'PARQUE INDUSTRIAL DE VALLEDUPAR', 'Entrevista realizada a su administradora, en que la se cuenta parte de su historia, los servicios que ofrece y responde a unas cuantas preguntas especificas.', 'https://www.youtube.com/embed/TYvtmPZ6YS8', '2022-01-01 21:06:11', '2022-10-01 08:21:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tematica` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `ponentes` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `patrocinadores` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `num_participantes` int(11) DEFAULT NULL,
  `fecha_inicio` date NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  `hora_final` time DEFAULT NULL,
  `backgroundColor` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `borderColor` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `allDay` varchar(20) COLLATE utf8_spanish_ci DEFAULT 'false',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `nombre`, `tematica`, `ponentes`, `patrocinadores`, `num_participantes`, `fecha_inicio`, `hora_inicio`, `fecha_final`, `hora_final`, `backgroundColor`, `borderColor`, `allDay`, `created_at`, `updated_at`) VALUES
(1, 'Evento todo el día', NULL, NULL, NULL, NULL, '2022-02-01', NULL, NULL, NULL, '#f56954', '#f56954', 'true', NULL, NULL),
(2, 'Evento Largo', NULL, NULL, NULL, NULL, '2022-01-31', NULL, '2022-02-03', NULL, '#f39c12', '#f39c12', 'false', NULL, NULL),
(3, 'Reunión', NULL, NULL, NULL, NULL, '2022-02-04', '10:30:00', NULL, NULL, '#0073b7', '#0073b7', 'false', NULL, NULL),
(5, 'Fiesta de cumpleaños', NULL, NULL, NULL, NULL, '2022-02-05', '19:00:00', '2022-02-05', '22:30:00', '#00a65a', '#00a65a', 'false', NULL, NULL),
(6, 'Entrar a Google', NULL, NULL, NULL, NULL, '2022-02-28', NULL, '2022-02-28', NULL, '#3c8dbc', '#3c8dbc', 'false', NULL, NULL),
(7, 'Capacitación', 'Capacitación sobre implentación del nuevo aplicativo web.', 'Andrés Soto Suárez, Jean Carlos Recio.', 'Universidad Popular del Cesar.', 12, '2022-02-08', '08:00:00', '2022-02-08', '16:30:00', '#01ff70', '#01ff70', 'false', '2022-02-07 02:00:24', '2022-02-07 02:00:24'),
(8, 'Auditoría', 'Sobre procesos internos', 'María Josefina Gutierrez', 'Contraloría', 2, '2022-02-10', NULL, '2022-02-12', NULL, '#6c757d', '#6c757d', 'false', '2022-02-07 02:07:28', '2022-02-08 02:17:24'),
(9, 'Llamadas de cobro', NULL, NULL, NULL, NULL, '2022-02-12', NULL, NULL, NULL, '#f012be', '#f012be', 'true', '2022-02-07 02:11:39', '2022-02-08 02:24:25'),
(11, 'Rendición de cuentas', NULL, 'Adonaís Fuentes.', NULL, 34, '2022-02-14', NULL, NULL, NULL, '#007bff', '#007bff', 'true', '2022-02-08 07:33:49', '2022-02-08 07:33:49'),
(12, 'Campaña de socialización microempresarios.', NULL, NULL, NULL, NULL, '2022-02-15', NULL, NULL, NULL, '#ffc107', '#ffc107', 'true', '2022-02-08 07:35:49', '2022-02-08 07:35:49'),
(13, 'Evaluación de resultados campaña afiliados.', NULL, NULL, NULL, NULL, '2022-02-16', NULL, NULL, NULL, '#f012be', '#f012be', 'true', '2022-02-08 07:37:04', '2022-02-08 07:37:04'),
(14, 'Llamar a los interesados de la campaña de socialización', NULL, NULL, NULL, NULL, '2022-02-17', NULL, NULL, NULL, '#000000', '#000000', 'true', '2022-02-08 07:37:47', '2022-02-08 07:37:47'),
(15, 'Plenaria jornada mañana', NULL, 'Adonaís Funetes.', 'ACOPI Cesar', 30, '2022-02-14', '08:00:00', '2022-02-14', '12:00:00', '#001f3f', '#001f3f', 'false', '2022-02-08 07:40:45', '2022-02-08 07:40:45'),
(16, 'Plenaria jornada tarde', NULL, 'Adonaís Fuente', 'ACOPI Cesar', 25, '2022-02-14', '14:00:00', '2022-02-14', '18:00:00', '#ff851b', '#ff851b', 'false', '2022-02-08 07:44:26', '2022-02-08 07:44:26'),
(17, 'Descanso', NULL, NULL, NULL, NULL, '2022-02-04', '12:00:00', '2022-02-04', '14:00:00', '#dc3545', '#dc3545', 'false', '2022-02-09 03:06:44', '2022-02-09 03:07:24'),
(19, 'Revisión de estatus afiliados', 'Revisar que afiliados están inactivos y desde cuando lo están.', NULL, NULL, NULL, '2022-03-14', '08:00:00', NULL, NULL, '#ffc107', '#ffc107', 'false', '2022-03-11 02:08:22', '2022-03-11 02:09:05'),
(20, 'Hotel Adlon', 'Hotel Adlon es un clásico hotel situado en el bulevar Unter den Linden de Berlín frente a la Puerta de Brandenburgo, cerca del Checkpoint Charlie y del Monumento a los judíos de Europa asesinados.', 'Andres Soto', 'Acopi', 50, '2022-07-12', '08:00:00', '2022-07-12', '10:00:00', '#39cccc', '#39cccc', 'false', '2022-07-08 01:08:56', '2022-07-08 01:08:56'),
(21, 'Llamadas de cobro', 'Fue abandonado por las autoridades de Alemania Oriental y en 1964 la fachada se reconstruyó. Hacia 1970 fue posada para estudiantes y en 1984 demolido.', 'Andres SOto', 'Julio', 45, '2022-07-14', '14:00:00', '2022-07-14', '18:00:00', '#007bff', '#007bff', 'false', '2022-07-08 01:37:12', '2022-07-08 01:37:12'),
(22, 'Septiembre mes de la salud mental', 'Durante este mes estaremos haciendo diferentes campañas acerca de como controlar las malas emociones.', 'Adriana Marquez', 'ACOPI Cesar, Universidad Popular del Cesar', 100, '2022-08-15', NULL, NULL, NULL, '#28a745', '#28a745', 'true', '2022-08-12 00:31:27', '2022-08-12 00:31:27'),
(23, 'Llamado de lista', NULL, 'Adonáis Fuentes.', 'ACOPI - Cesar.', NULL, '2022-08-15', '08:00:00', '2022-08-15', '08:30:00', '#007bff', '#007bff', 'false', '2022-08-12 00:33:35', '2022-08-12 00:33:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `codigo_genero` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_genero` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id`, `codigo_genero`, `nombre_genero`) VALUES
(1, 'F', 'Femenino'),
(2, 'M', 'Masculino'),
(3, 'O', 'Otro'),
(4, 'NE', 'No especifica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interesados`
--

CREATE TABLE `interesados` (
  `id` int(11) NOT NULL,
  `nombre_interesado` text COLLATE utf8_spanish_ci NOT NULL,
  `empresa_interesado` text COLLATE utf8_spanish_ci NOT NULL,
  `email_interesado` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono_interesado` text COLLATE utf8_spanish_ci NOT NULL,
  `estado_interesado` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `interesados`
--

INSERT INTO `interesados` (`id`, `nombre_interesado`, `empresa_interesado`, `email_interesado`, `telefono_interesado`, `estado_interesado`, `created_at`, `updated_at`) VALUES
(1, 'Andrés Soto', 'CompuCell', 'andres@gmail.com', '5724597', 'no contactado', NULL, NULL),
(3, 'Mario Gomez', 'CompuCell', 'mario@outlook.com', '5768345', 'contactado', NULL, '2022-08-12 01:31:03'),
(5, 'Magalis Herrera', 'Decoraciones Maga', 'mherrera@gmail.com', '5757832', 'contactado', NULL, '2022-01-08 04:01:48'),
(6, 'Edmundo Alvarez', 'Asadero Pollo Norte', 'ealvarez@gmail.com', '5723456', 'contactado', NULL, '2022-01-08 04:08:55'),
(7, 'Andrés Soto', 'Estetica Dayis', 'info@ased.com', '12345', '', NULL, NULL),
(8, 'Andrés Soto', 'Estetica Dayis', 'info@ased.com', '12345', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meses`
--

CREATE TABLE `meses` (
  `id` int(11) NOT NULL,
  `codigo_mes` int(11) NOT NULL,
  `nombre_mes` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_mes_min` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `meses`
--

INSERT INTO `meses` (`id`, `codigo_mes`, `nombre_mes`, `nombre_mes_min`) VALUES
(1, 1, 'Enero', 'enero'),
(2, 2, 'Febrero', 'febrero'),
(3, 3, 'Marzo', 'marzo'),
(4, 4, 'Abril', 'abril'),
(5, 5, 'Mayo', 'mayo'),
(6, 6, 'Junio', 'junio'),
(7, 7, 'Julio', 'julio'),
(8, 8, 'Agosto', 'agosto'),
(9, 9, 'Septiembre', 'septiembre'),
(10, 10, 'Octubre', 'octubre'),
(11, 11, 'Noviembre', 'noviembre'),
(12, 12, 'Diciembre', 'diciembre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios_departamento`
--

CREATE TABLE `municipios_departamento` (
  `id` int(11) NOT NULL,
  `abreviatura` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `municipios_departamento`
--

INSERT INTO `municipios_departamento` (`id`, `abreviatura`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'VLL', 'Valledupar', NULL, NULL),
(2, 'ZRVLL', 'Zona rural de Valledupar', NULL, NULL),
(3, 'AGC', 'Aguachica', NULL, NULL),
(4, 'CDZ', 'Agustín Codazzi', NULL, '2022-02-03 04:58:42'),
(5, 'AST', 'Astrea', '2022-02-03 03:48:17', '2022-02-03 03:48:17'),
(6, 'BCR', 'Becerril', '2022-02-03 07:15:02', '2022-02-03 07:15:02'),
(7, 'BSC', 'Bosconia', '2022-02-03 07:15:40', '2022-02-03 07:15:40'),
(8, 'CHM', 'Chimichagua', '2022-02-03 07:16:13', '2022-02-03 07:16:13'),
(9, 'CHR', 'Chiriguaná', '2022-02-03 07:16:31', '2022-02-03 07:16:31'),
(10, 'CRM', 'Curumaní', '2022-02-03 07:16:57', '2022-02-03 07:16:57'),
(11, 'ECP', 'El Copey', '2022-02-03 07:17:22', '2022-02-03 07:17:22'),
(12, 'EPS', 'El Paso', '2022-02-03 07:17:44', '2022-02-03 07:17:44'),
(13, 'GMR', 'Gamarra', '2022-02-03 07:18:17', '2022-02-03 07:18:17'),
(14, 'GNZ', 'González', '2022-02-03 07:18:37', '2022-02-03 07:18:37'),
(15, 'LGL', 'La Gloria', '2022-02-03 07:18:57', '2022-02-03 07:18:57'),
(16, 'LJI', 'La Jagua de Ibirico', '2022-02-03 07:19:50', '2022-02-03 07:19:50'),
(17, 'LPZ', 'La Paz', '2022-02-03 07:20:17', '2022-02-03 07:20:17'),
(18, 'MNR', 'Manaure', '2022-02-03 07:20:36', '2022-02-03 07:20:36'),
(19, 'PLT', 'Pailitas', '2022-02-03 07:20:54', '2022-02-03 07:20:54'),
(20, 'PLY', 'Pelaya', '2022-02-03 07:21:26', '2022-02-03 07:21:26'),
(21, 'PBB', 'Pueblo Bello', '2022-02-03 07:22:23', '2022-02-03 07:22:23'),
(22, 'RDO', 'Río de Oro', '2022-02-03 07:22:57', '2022-02-03 07:22:57'),
(23, 'SNA', 'San Alberto', '2022-02-03 07:23:24', '2022-02-03 07:23:24'),
(24, 'SND', 'San Diego', '2022-02-03 07:23:52', '2022-02-03 07:23:52'),
(25, 'SNM', 'San Martín', '2022-02-03 07:24:14', '2022-02-03 07:24:14'),
(26, 'TML', 'Tamalameque', '2022-02-03 07:24:41', '2022-02-03 07:24:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `portada_noticia` text COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_noticia` text COLLATE utf8_spanish_ci NOT NULL,
  `p_claves_noticia` text COLLATE utf8_spanish_ci NOT NULL,
  `ruta_noticia` text COLLATE utf8_spanish_ci NOT NULL,
  `contenido_noticia` text COLLATE utf8_spanish_ci NOT NULL,
  `vistas_noticia` int(11) DEFAULT NULL,
  `destacado` tinyint(1) NOT NULL DEFAULT 0,
  `fecha_noticia` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `categoria`, `portada_noticia`, `titulo`, `descripcion_noticia`, `p_claves_noticia`, `ruta_noticia`, `contenido_noticia`, `vistas_noticia`, `destacado`, `fecha_noticia`, `created_at`, `updated_at`) VALUES
(1, 2, 'vistas/images/noticias/1.jpeg', '66° CONGRESO NACIONAL: EMPRESAS PARA EL DESARROLLO SOCIAL 70 AÑOS DE ACOPI: LA MIPYME, DINAMIZADORA SOCIAL Y ECONÓMICA DE COLOMBIA', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'congreso-70-acopi', '                ', NULL, 0, '2021-12-05 20:05:03', NULL, NULL),
(2, 1, 'vistas/images/noticias/2.jpeg', 'Reactivación de empresa', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-2', ' ', NULL, 0, '2021-12-05 20:06:12', NULL, NULL),
(3, 1, 'vistas/images/noticias/3.jpg', 'Aprobación de creditos', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-3', ' ', NULL, 0, '2021-12-05 20:07:02', NULL, NULL),
(4, 3, 'vistas/images/noticias/4.jpg', 'ACOPI Cesar celebra el festival vallenato 2021 ', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-4', ' ', NULL, 0, '2021-12-05 20:07:10', NULL, NULL),
(5, 2, 'vistas/images/noticias/5.jpg', 'Congreso regional de microempresarios en Barranquilla - Colombia', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-5', ' ', NULL, 0, '2021-12-05 20:07:20', NULL, NULL),
(6, 3, 'vistas/images/noticias/6.jpg', 'Feria de gastronomía local organizada por la Alcaldía de Valledupar', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-6', ' ', NULL, 0, '2021-12-05 20:07:34', NULL, NULL),
(7, 1, 'vistas/images/noticias/7.jpg', 'Ponte al día con la cuota de sostenimiento', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-7', ' ', NULL, 0, '2021-12-05 20:08:01', NULL, NULL),
(8, 1, 'vistas/images/noticias/8.jpg', 'Rendición de cuentas - ACOPI Nacional', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-8', ' ', NULL, 1, '2021-12-05 20:08:18', NULL, NULL),
(9, 1, 'vistas/images/noticias/9.jpg', 'Subsidios Post cuarentena obligatoria, otorgados por el gobierno nacional', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-9', ' ', NULL, 0, '2021-12-05 20:08:30', NULL, NULL),
(10, 3, 'vistas/images/noticias/10.jpg', 'Cuenta la historia de tu emprendimiento en nuestro canal de Youtube', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-10', ' ', NULL, 0, '2021-12-05 20:08:46', NULL, NULL),
(11, 1, 'vistas/images/noticias/1.jpeg', 'El desempleo en el Cesar dismuniye un 5,8%', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-11', '<p class=\"text-justify\">Desde hace 70 años, ACOPI ha sido reconocida como un gremio dinámico, respetuoso y dispuesto a la construcción\n                colectiva. Hoy, seguimos conservando esa posición, donde la sociedad, las instituciones públicas y privadas\n                exaltan la labor gremial, representando no sólo a nuestros afiliados sino también a todas las MiPymes del país\n                que se benefician con nuestra gestión.\n            </p>\n            <p class=\"text-justify\">Empresas para el desarrollo social, nombre que enmarca nuestro 66º Congreso Nacional, resaltando el papel\n                dinamizador del segmento MiPyme colombiano, por lo que conservarlo y desarrollarlo es un propósito común.\n                Dar a conocer las acciones que realizan los empresarios frente a los retos de transformación que como país\n                venimos enfrentando será la labor durante estos dos días de Congreso como instrumento de dialogo constructivo.\n            </p>\n            <p class=\"text-justify\">Resaltamos el papel fundamental de la rama legislativa y ejecutiva, así como el de los futuros candidatos\n                presidenciales, en los retos que debemos trabajar a través de diálogos constructivos e incluyentes, donde\n                se establezcan rutas eficaces, cerrando brechas competitivas y sociales.\n            </p>\n            <p class=\"text-justify\">Por esta razón, desde ACOPI presentamos las siguientes propuestas:\n            </p>\n            <p class=\"text-justify\">Reforma Laboral Estructural:\n            </p>\n            <p class=\"text-justify\">Trabajo por unidad de tiempo.</p>\n            <p class=\"text-justify\"> Eliminación del periodo mínimo de cotización para el reconocimiento y pago de incapacidades por enfermedad\n                común.</p>\n            <p class=\"text-justify\">Adopción de un preaviso por parte del trabajador </p>\n            <p class=\"text-justify\">Mayor optimización de los aportes del sector empresarial a las cajas de compensación. Teniendo en cuenta\n                que las cajas de compensación fueron creadas para el beneficio de los empleados, desde el sector empresarial\n                se vería de manera positiva que se destine un porcentaje de los aportes al cumplimiento de ciertas\n                obligaciones que benefician a los trabajadores a cargo del sector empresarial, entre estas: organizar y\n                realizar la jornada denominada día de la familia, espacio creado para que el trabajador pueda compartir\n                mayor tiempo con esta; elaborar y adaptar programas dirigidos a la realización de actividades recreativas,\n                culturales, deportivas o de capacitación; al cierre de brechas de capital humano fortaleciendo competencias\n                tecnológicas, habilidades blandas, readaptación laboral; realización de la valoración anual de los factores\n                de riesgo psicosocial.\n            </p>\n            <p class=\"text-justify\">Pago de prestaciones sociales proporcional al ingreso del trabajador.</p>\n            <p class=\"text-justify\"> 2. Disminuir los costos indirectos a la nómina a través de la exoneración del pago del 4×1000 a las\n                transacciones relacionadas con la contratación y pagos laborales.\n            </p>\n            <p class=\"text-justify\">3. Tarifa diferencial del 33% en el Impuesto de la Renta en la Nueva Reforma Tributaria. Proposición que\n                busca alivianar los efectos generados en la pandemia por el COVID-19.\n            </p>\n            <p class=\"text-justify\">4. Programa Temporal de Empleo de Emergencia, que priorice la contratación de trabajadores no calificados,\n                para el desarrollo de actividades de reparación, recuperación y rehabilitación de infraestructura básica\n                de las zonas rurales o urbanas. Con el fin de disminuir el desempleo.\n            </p>\n            <p class=\"text-justify\">5. Flexibilizar las condiciones para el acceso de las MiPymes a recursos de financiación.\n            </p>\n            <p class=\"text-justify\">El día 26 de agosto, nuestra primera jornada denominada “Constructores de la nueva realidad social” contará\n                con la presencia del Dr. Jairo Pulecio, Presidente de la Junta Nacional de ACOPI; Dr. José O´Meara,\n                Director General de Colombia Comprar Eficiente; la Dra. Lucia Cusmano, Directora de las Pymes de la OCDE;\n                Dr. Aurelio Mejía, Viceministro encargado de Desarrollo Empresarial; Dra. Martha Lucía Ramírez,\n                Vicepresidente de la República de Colombia y Ministra de Relaciones exteriores.\n            </p>\n            <p class=\"text-justify\">La segunda jornada llamada “Experiencias que suman” contará con la presencia del Dr. Andrés García, Director\n                de Ventas del Segmento de Mediana y Pequeñas Empresas; Dra. Lucia Manfredi, Experta Politóloga; Sacerdote\n                Francisco de Roux; Tatyana Orozco, Presidente de Arena del Rio; Dra. Alejandra Botero, Directora DNP;\n                Dr. Mauricio Toro, Presidente Comisión por el Emprendimiento; Dr. Carlos Mario Estrada Molina, Director\n                General SENA; Dr. Guillermo Cáez, Presidente Asociación Nacional de Emprendedores de Colombia; Dr. Camilo\n                Guzmán, Director Ejecutivo Libertank. La cual, tiene como objetivo principal abrir un espacio de diálogo\n                constructivo frente a la nueva realidad que aquejan a las diferentes instituciones.\n            </p>\n            <p class=\"text-justify\">    En nuestro segundo día de congreso se desarrollará el tercer bloque llamado “Retos económicos y sociales”\n                donde nos acompañará el Dr. Ángel Custodio Cabrera, Ministro de Trabajo; Dr. Raúl José Buitrago, Presidente\n                del Fondo Nacional de Garantías; Dr. David Ortiz Díaz, CEO de SIIGO; Dr. Edgar Julián Gálvez, Universidad\n                del Valle – FAEDPYME; Dr. Domingo García, Universidad Politécnica de Cartagena – FAEDPYME. Este último\n                bloque se enfocará en los retos que corresponde asumir para recuperar los indicadores económicos y cerrar\n                las brechas sociales agravadas por el impacto de la pandemia.\n            </p>\n            <p class=\"text-justify\">    Para finalizar nuestro congreso, la clausura estará a cargo del Presidente de la República Dr. Iván\n                Duque Márquez en compañía de la Dra. Rosmery Quintero, Presidente Nacional ACOPI.\n            </p>\n            <p class=\"text-justify\">¡Bienvenidos a nuestro 66º Congreso Nacional: Empresas para el Desarrollo Social en el marco de la\n                celebración de nuestros 70 años!\n            </p>', NULL, 1, '2021-12-05 20:09:06', NULL, NULL),
(12, 2, 'vistas/images/noticias/2.jpeg', 'Congreso Local en Valledupar', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-12', '<p class=\"text-justify\">Desde hace 70 años, ACOPI ha sido reconocida como un gremio dinámico, respetuoso y dispuesto a la construcción\n                colectiva. Hoy, seguimos conservando esa posición, donde la sociedad, las instituciones públicas y privadas\n                exaltan la labor gremial, representando no sólo a nuestros afiliados sino también a todas las MiPymes del país\n                que se benefician con nuestra gestión.\n            </p>\n            <p class=\"text-justify\">Empresas para el desarrollo social, nombre que enmarca nuestro 66º Congreso Nacional, resaltando el papel\n                dinamizador del segmento MiPyme colombiano, por lo que conservarlo y desarrollarlo es un propósito común.\n                Dar a conocer las acciones que realizan los empresarios frente a los retos de transformación que como país\n                venimos enfrentando será la labor durante estos dos días de Congreso como instrumento de dialogo constructivo.\n            </p>\n            <p class=\"text-justify\">Resaltamos el papel fundamental de la rama legislativa y ejecutiva, así como el de los futuros candidatos\n                presidenciales, en los retos que debemos trabajar a través de diálogos constructivos e incluyentes, donde\n                se establezcan rutas eficaces, cerrando brechas competitivas y sociales.\n            </p>\n            <p class=\"text-justify\">Por esta razón, desde ACOPI presentamos las siguientes propuestas:\n            </p>\n            <p class=\"text-justify\">Reforma Laboral Estructural:\n            </p>\n            <p class=\"text-justify\">Trabajo por unidad de tiempo.</p>\n            <p class=\"text-justify\"> Eliminación del periodo mínimo de cotización para el reconocimiento y pago de incapacidades por enfermedad\n                común.</p>\n            <p class=\"text-justify\">Adopción de un preaviso por parte del trabajador </p>\n            <p class=\"text-justify\">Mayor optimización de los aportes del sector empresarial a las cajas de compensación. Teniendo en cuenta\n                que las cajas de compensación fueron creadas para el beneficio de los empleados, desde el sector empresarial\n                se vería de manera positiva que se destine un porcentaje de los aportes al cumplimiento de ciertas\n                obligaciones que benefician a los trabajadores a cargo del sector empresarial, entre estas: organizar y\n                realizar la jornada denominada día de la familia, espacio creado para que el trabajador pueda compartir\n                mayor tiempo con esta; elaborar y adaptar programas dirigidos a la realización de actividades recreativas,\n                culturales, deportivas o de capacitación; al cierre de brechas de capital humano fortaleciendo competencias\n                tecnológicas, habilidades blandas, readaptación laboral; realización de la valoración anual de los factores\n                de riesgo psicosocial.\n            </p>\n            <p class=\"text-justify\">Pago de prestaciones sociales proporcional al ingreso del trabajador.</p>\n            <p class=\"text-justify\"> 2. Disminuir los costos indirectos a la nómina a través de la exoneración del pago del 4×1000 a las\n                transacciones relacionadas con la contratación y pagos laborales.\n            </p>\n            <p class=\"text-justify\">3. Tarifa diferencial del 33% en el Impuesto de la Renta en la Nueva Reforma Tributaria. Proposición que\n                busca alivianar los efectos generados en la pandemia por el COVID-19.\n            </p>\n            <p class=\"text-justify\">4. Programa Temporal de Empleo de Emergencia, que priorice la contratación de trabajadores no calificados,\n                para el desarrollo de actividades de reparación, recuperación y rehabilitación de infraestructura básica\n                de las zonas rurales o urbanas. Con el fin de disminuir el desempleo.\n            </p>\n            <p class=\"text-justify\">5. Flexibilizar las condiciones para el acceso de las MiPymes a recursos de financiación.\n            </p>\n            <p class=\"text-justify\">El día 26 de agosto, nuestra primera jornada denominada “Constructores de la nueva realidad social” contará\n                con la presencia del Dr. Jairo Pulecio, Presidente de la Junta Nacional de ACOPI; Dr. José O´Meara,\n                Director General de Colombia Comprar Eficiente; la Dra. Lucia Cusmano, Directora de las Pymes de la OCDE;\n                Dr. Aurelio Mejía, Viceministro encargado de Desarrollo Empresarial; Dra. Martha Lucía Ramírez,\n                Vicepresidente de la República de Colombia y Ministra de Relaciones exteriores.\n            </p>\n            <p class=\"text-justify\">La segunda jornada llamada “Experiencias que suman” contará con la presencia del Dr. Andrés García, Director\n                de Ventas del Segmento de Mediana y Pequeñas Empresas; Dra. Lucia Manfredi, Experta Politóloga; Sacerdote\n                Francisco de Roux; Tatyana Orozco, Presidente de Arena del Rio; Dra. Alejandra Botero, Directora DNP;\n                Dr. Mauricio Toro, Presidente Comisión por el Emprendimiento; Dr. Carlos Mario Estrada Molina, Director\n                General SENA; Dr. Guillermo Cáez, Presidente Asociación Nacional de Emprendedores de Colombia; Dr. Camilo\n                Guzmán, Director Ejecutivo Libertank. La cual, tiene como objetivo principal abrir un espacio de diálogo\n                constructivo frente a la nueva realidad que aquejan a las diferentes instituciones.\n            </p>\n            <p class=\"text-justify\">    En nuestro segundo día de congreso se desarrollará el tercer bloque llamado “Retos económicos y sociales”\n                donde nos acompañará el Dr. Ángel Custodio Cabrera, Ministro de Trabajo; Dr. Raúl José Buitrago, Presidente\n                del Fondo Nacional de Garantías; Dr. David Ortiz Díaz, CEO de SIIGO; Dr. Edgar Julián Gálvez, Universidad\n                del Valle – FAEDPYME; Dr. Domingo García, Universidad Politécnica de Cartagena – FAEDPYME. Este último\n                bloque se enfocará en los retos que corresponde asumir para recuperar los indicadores económicos y cerrar\n                las brechas sociales agravadas por el impacto de la pandemia.\n            </p>\n            <p class=\"text-justify\">    Para finalizar nuestro congreso, la clausura estará a cargo del Presidente de la República Dr. Iván\n                Duque Márquez en compañía de la Dra. Rosmery Quintero, Presidente Nacional ACOPI.\n            </p>\n            <p class=\"text-justify\">¡Bienvenidos a nuestro 66º Congreso Nacional: Empresas para el Desarrollo Social en el marco de la\n                celebración de nuestros 70 años!\n            </p>', NULL, 1, '2021-12-05 20:09:32', NULL, NULL),
(13, 2, 'vistas/images/noticias/3.jpg', '66° CONGRESO NACIONAL: EMPRESAS PARA EL DESARROLLO SOCIAL 70 AÑOS\n                                DE ACOPI: LA MIPYME, DINAMIZADORA SOCIAL Y ECONÓMICA DE COLOMBIA', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-13', '<p class=\"text-justify\">Desde hace 70 años, ACOPI ha sido reconocida como un gremio dinámico, respetuoso y dispuesto a la construcción\n                colectiva. Hoy, seguimos conservando esa posición, donde la sociedad, las instituciones públicas y privadas\n                exaltan la labor gremial, representando no sólo a nuestros afiliados sino también a todas las MiPymes del país\n                que se benefician con nuestra gestión.\n            </p>\n            <p class=\"text-justify\">Empresas para el desarrollo social, nombre que enmarca nuestro 66º Congreso Nacional, resaltando el papel\n                dinamizador del segmento MiPyme colombiano, por lo que conservarlo y desarrollarlo es un propósito común.\n                Dar a conocer las acciones que realizan los empresarios frente a los retos de transformación que como país\n                venimos enfrentando será la labor durante estos dos días de Congreso como instrumento de dialogo constructivo.\n            </p>\n            <p class=\"text-justify\">Resaltamos el papel fundamental de la rama legislativa y ejecutiva, así como el de los futuros candidatos\n                presidenciales, en los retos que debemos trabajar a través de diálogos constructivos e incluyentes, donde\n                se establezcan rutas eficaces, cerrando brechas competitivas y sociales.\n            </p>\n            <p class=\"text-justify\">Por esta razón, desde ACOPI presentamos las siguientes propuestas:\n            </p>\n            <p class=\"text-justify\">Reforma Laboral Estructural:\n            </p>\n            <p class=\"text-justify\">Trabajo por unidad de tiempo.</p>\n            <p class=\"text-justify\"> Eliminación del periodo mínimo de cotización para el reconocimiento y pago de incapacidades por enfermedad\n                común.</p>\n            <p class=\"text-justify\">Adopción de un preaviso por parte del trabajador </p>\n            <p class=\"text-justify\">Mayor optimización de los aportes del sector empresarial a las cajas de compensación. Teniendo en cuenta\n                que las cajas de compensación fueron creadas para el beneficio de los empleados, desde el sector empresarial\n                se vería de manera positiva que se destine un porcentaje de los aportes al cumplimiento de ciertas\n                obligaciones que benefician a los trabajadores a cargo del sector empresarial, entre estas: organizar y\n                realizar la jornada denominada día de la familia, espacio creado para que el trabajador pueda compartir\n                mayor tiempo con esta; elaborar y adaptar programas dirigidos a la realización de actividades recreativas,\n                culturales, deportivas o de capacitación; al cierre de brechas de capital humano fortaleciendo competencias\n                tecnológicas, habilidades blandas, readaptación laboral; realización de la valoración anual de los factores\n                de riesgo psicosocial.\n            </p>\n            <p class=\"text-justify\">Pago de prestaciones sociales proporcional al ingreso del trabajador.</p>\n            <p class=\"text-justify\"> 2. Disminuir los costos indirectos a la nómina a través de la exoneración del pago del 4×1000 a las\n                transacciones relacionadas con la contratación y pagos laborales.\n            </p>\n            <p class=\"text-justify\">3. Tarifa diferencial del 33% en el Impuesto de la Renta en la Nueva Reforma Tributaria. Proposición que\n                busca alivianar los efectos generados en la pandemia por el COVID-19.\n            </p>\n            <p class=\"text-justify\">4. Programa Temporal de Empleo de Emergencia, que priorice la contratación de trabajadores no calificados,\n                para el desarrollo de actividades de reparación, recuperación y rehabilitación de infraestructura básica\n                de las zonas rurales o urbanas. Con el fin de disminuir el desempleo.\n            </p>\n            <p class=\"text-justify\">5. Flexibilizar las condiciones para el acceso de las MiPymes a recursos de financiación.\n            </p>\n            <p class=\"text-justify\">El día 26 de agosto, nuestra primera jornada denominada “Constructores de la nueva realidad social” contará\n                con la presencia del Dr. Jairo Pulecio, Presidente de la Junta Nacional de ACOPI; Dr. José O´Meara,\n                Director General de Colombia Comprar Eficiente; la Dra. Lucia Cusmano, Directora de las Pymes de la OCDE;\n                Dr. Aurelio Mejía, Viceministro encargado de Desarrollo Empresarial; Dra. Martha Lucía Ramírez,\n                Vicepresidente de la República de Colombia y Ministra de Relaciones exteriores.\n            </p>\n            <p class=\"text-justify\">La segunda jornada llamada “Experiencias que suman” contará con la presencia del Dr. Andrés García, Director\n                de Ventas del Segmento de Mediana y Pequeñas Empresas; Dra. Lucia Manfredi, Experta Politóloga; Sacerdote\n                Francisco de Roux; Tatyana Orozco, Presidente de Arena del Rio; Dra. Alejandra Botero, Directora DNP;\n                Dr. Mauricio Toro, Presidente Comisión por el Emprendimiento; Dr. Carlos Mario Estrada Molina, Director\n                General SENA; Dr. Guillermo Cáez, Presidente Asociación Nacional de Emprendedores de Colombia; Dr. Camilo\n                Guzmán, Director Ejecutivo Libertank. La cual, tiene como objetivo principal abrir un espacio de diálogo\n                constructivo frente a la nueva realidad que aquejan a las diferentes instituciones.\n            </p>\n            <p class=\"text-justify\">    En nuestro segundo día de congreso se desarrollará el tercer bloque llamado “Retos económicos y sociales”\n                donde nos acompañará el Dr. Ángel Custodio Cabrera, Ministro de Trabajo; Dr. Raúl José Buitrago, Presidente\n                del Fondo Nacional de Garantías; Dr. David Ortiz Díaz, CEO de SIIGO; Dr. Edgar Julián Gálvez, Universidad\n                del Valle – FAEDPYME; Dr. Domingo García, Universidad Politécnica de Cartagena – FAEDPYME. Este último\n                bloque se enfocará en los retos que corresponde asumir para recuperar los indicadores económicos y cerrar\n                las brechas sociales agravadas por el impacto de la pandemia.\n            </p>\n            <p class=\"text-justify\">    Para finalizar nuestro congreso, la clausura estará a cargo del Presidente de la República Dr. Iván\n                Duque Márquez en compañía de la Dra. Rosmery Quintero, Presidente Nacional ACOPI.\n            </p>\n            <p class=\"text-justify\">¡Bienvenidos a nuestro 66º Congreso Nacional: Empresas para el Desarrollo Social en el marco de la\n                celebración de nuestros 70 años!\n            </p>', NULL, 0, '2021-12-05 20:10:08', NULL, NULL),
(14, 2, 'vistas/images/noticias/4.jpg', '66° CONGRESO NACIONAL: EMPRESAS PARA EL DESARROLLO SOCIAL 70 AÑOS\n                                DE ACOPI: LA MIPYME, DINAMIZADORA SOCIAL Y ECONÓMICA DE COLOMBIA', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-14', '<p class=\"text-justify\">Desde hace 70 años, ACOPI ha sido reconocida como un gremio dinámico, respetuoso y dispuesto a la construcción\n                colectiva. Hoy, seguimos conservando esa posición, donde la sociedad, las instituciones públicas y privadas\n                exaltan la labor gremial, representando no sólo a nuestros afiliados sino también a todas las MiPymes del país\n                que se benefician con nuestra gestión.\n            </p>\n            <p class=\"text-justify\">Empresas para el desarrollo social, nombre que enmarca nuestro 66º Congreso Nacional, resaltando el papel\n                dinamizador del segmento MiPyme colombiano, por lo que conservarlo y desarrollarlo es un propósito común.\n                Dar a conocer las acciones que realizan los empresarios frente a los retos de transformación que como país\n                venimos enfrentando será la labor durante estos dos días de Congreso como instrumento de dialogo constructivo.\n            </p>\n            <p class=\"text-justify\">Resaltamos el papel fundamental de la rama legislativa y ejecutiva, así como el de los futuros candidatos\n                presidenciales, en los retos que debemos trabajar a través de diálogos constructivos e incluyentes, donde\n                se establezcan rutas eficaces, cerrando brechas competitivas y sociales.\n            </p>\n            <p class=\"text-justify\">Por esta razón, desde ACOPI presentamos las siguientes propuestas:\n            </p>\n            <p class=\"text-justify\">Reforma Laboral Estructural:\n            </p>\n            <p class=\"text-justify\">Trabajo por unidad de tiempo.</p>\n            <p class=\"text-justify\"> Eliminación del periodo mínimo de cotización para el reconocimiento y pago de incapacidades por enfermedad\n                común.</p>\n            <p class=\"text-justify\">Adopción de un preaviso por parte del trabajador </p>\n            <p class=\"text-justify\">Mayor optimización de los aportes del sector empresarial a las cajas de compensación. Teniendo en cuenta\n                que las cajas de compensación fueron creadas para el beneficio de los empleados, desde el sector empresarial\n                se vería de manera positiva que se destine un porcentaje de los aportes al cumplimiento de ciertas\n                obligaciones que benefician a los trabajadores a cargo del sector empresarial, entre estas: organizar y\n                realizar la jornada denominada día de la familia, espacio creado para que el trabajador pueda compartir\n                mayor tiempo con esta; elaborar y adaptar programas dirigidos a la realización de actividades recreativas,\n                culturales, deportivas o de capacitación; al cierre de brechas de capital humano fortaleciendo competencias\n                tecnológicas, habilidades blandas, readaptación laboral; realización de la valoración anual de los factores\n                de riesgo psicosocial.\n            </p>\n            <p class=\"text-justify\">Pago de prestaciones sociales proporcional al ingreso del trabajador.</p>\n            <p class=\"text-justify\"> 2. Disminuir los costos indirectos a la nómina a través de la exoneración del pago del 4×1000 a las\n                transacciones relacionadas con la contratación y pagos laborales.\n            </p>\n            <p class=\"text-justify\">3. Tarifa diferencial del 33% en el Impuesto de la Renta en la Nueva Reforma Tributaria. Proposición que\n                busca alivianar los efectos generados en la pandemia por el COVID-19.\n            </p>\n            <p class=\"text-justify\">4. Programa Temporal de Empleo de Emergencia, que priorice la contratación de trabajadores no calificados,\n                para el desarrollo de actividades de reparación, recuperación y rehabilitación de infraestructura básica\n                de las zonas rurales o urbanas. Con el fin de disminuir el desempleo.\n            </p>\n            <p class=\"text-justify\">5. Flexibilizar las condiciones para el acceso de las MiPymes a recursos de financiación.\n            </p>\n            <p class=\"text-justify\">El día 26 de agosto, nuestra primera jornada denominada “Constructores de la nueva realidad social” contará\n                con la presencia del Dr. Jairo Pulecio, Presidente de la Junta Nacional de ACOPI; Dr. José O´Meara,\n                Director General de Colombia Comprar Eficiente; la Dra. Lucia Cusmano, Directora de las Pymes de la OCDE;\n                Dr. Aurelio Mejía, Viceministro encargado de Desarrollo Empresarial; Dra. Martha Lucía Ramírez,\n                Vicepresidente de la República de Colombia y Ministra de Relaciones exteriores.\n            </p>\n            <p class=\"text-justify\">La segunda jornada llamada “Experiencias que suman” contará con la presencia del Dr. Andrés García, Director\n                de Ventas del Segmento de Mediana y Pequeñas Empresas; Dra. Lucia Manfredi, Experta Politóloga; Sacerdote\n                Francisco de Roux; Tatyana Orozco, Presidente de Arena del Rio; Dra. Alejandra Botero, Directora DNP;\n                Dr. Mauricio Toro, Presidente Comisión por el Emprendimiento; Dr. Carlos Mario Estrada Molina, Director\n                General SENA; Dr. Guillermo Cáez, Presidente Asociación Nacional de Emprendedores de Colombia; Dr. Camilo\n                Guzmán, Director Ejecutivo Libertank. La cual, tiene como objetivo principal abrir un espacio de diálogo\n                constructivo frente a la nueva realidad que aquejan a las diferentes instituciones.\n            </p>\n            <p class=\"text-justify\">    En nuestro segundo día de congreso se desarrollará el tercer bloque llamado “Retos económicos y sociales”\n                donde nos acompañará el Dr. Ángel Custodio Cabrera, Ministro de Trabajo; Dr. Raúl José Buitrago, Presidente\n                del Fondo Nacional de Garantías; Dr. David Ortiz Díaz, CEO de SIIGO; Dr. Edgar Julián Gálvez, Universidad\n                del Valle – FAEDPYME; Dr. Domingo García, Universidad Politécnica de Cartagena – FAEDPYME. Este último\n                bloque se enfocará en los retos que corresponde asumir para recuperar los indicadores económicos y cerrar\n                las brechas sociales agravadas por el impacto de la pandemia.\n            </p>\n            <p class=\"text-justify\">    Para finalizar nuestro congreso, la clausura estará a cargo del Presidente de la República Dr. Iván\n                Duque Márquez en compañía de la Dra. Rosmery Quintero, Presidente Nacional ACOPI.\n            </p>\n            <p class=\"text-justify\">¡Bienvenidos a nuestro 66º Congreso Nacional: Empresas para el Desarrollo Social en el marco de la\n                celebración de nuestros 70 años!\n            </p>', NULL, 0, '2021-12-05 20:10:42', NULL, NULL),
(15, 1, 'vistas/images/noticias/5.jpg', 'Reactivación de empresa', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-15', '<p class=\"text-justify\">Desde hace 70 años, ACOPI ha sido reconocida como un gremio dinámico, respetuoso y dispuesto a la construcción\n                colectiva. Hoy, seguimos conservando esa posición, donde la sociedad, las instituciones públicas y privadas\n                exaltan la labor gremial, representando no sólo a nuestros afiliados sino también a todas las MiPymes del país\n                que se benefician con nuestra gestión.\n            </p>\n            <p class=\"text-justify\">Empresas para el desarrollo social, nombre que enmarca nuestro 66º Congreso Nacional, resaltando el papel\n                dinamizador del segmento MiPyme colombiano, por lo que conservarlo y desarrollarlo es un propósito común.\n                Dar a conocer las acciones que realizan los empresarios frente a los retos de transformación que como país\n                venimos enfrentando será la labor durante estos dos días de Congreso como instrumento de dialogo constructivo.\n            </p>\n            <p class=\"text-justify\">Resaltamos el papel fundamental de la rama legislativa y ejecutiva, así como el de los futuros candidatos\n                presidenciales, en los retos que debemos trabajar a través de diálogos constructivos e incluyentes, donde\n                se establezcan rutas eficaces, cerrando brechas competitivas y sociales.\n            </p>\n            <p class=\"text-justify\">Por esta razón, desde ACOPI presentamos las siguientes propuestas:\n            </p>\n            <p class=\"text-justify\">Reforma Laboral Estructural:\n            </p>\n            <p class=\"text-justify\">Trabajo por unidad de tiempo.</p>\n            <p class=\"text-justify\"> Eliminación del periodo mínimo de cotización para el reconocimiento y pago de incapacidades por enfermedad\n                común.</p>\n            <p class=\"text-justify\">Adopción de un preaviso por parte del trabajador </p>\n            <p class=\"text-justify\">Mayor optimización de los aportes del sector empresarial a las cajas de compensación. Teniendo en cuenta\n                que las cajas de compensación fueron creadas para el beneficio de los empleados, desde el sector empresarial\n                se vería de manera positiva que se destine un porcentaje de los aportes al cumplimiento de ciertas\n                obligaciones que benefician a los trabajadores a cargo del sector empresarial, entre estas: organizar y\n                realizar la jornada denominada día de la familia, espacio creado para que el trabajador pueda compartir\n                mayor tiempo con esta; elaborar y adaptar programas dirigidos a la realización de actividades recreativas,\n                culturales, deportivas o de capacitación; al cierre de brechas de capital humano fortaleciendo competencias\n                tecnológicas, habilidades blandas, readaptación laboral; realización de la valoración anual de los factores\n                de riesgo psicosocial.\n            </p>\n            <p class=\"text-justify\">Pago de prestaciones sociales proporcional al ingreso del trabajador.</p>\n            <p class=\"text-justify\"> 2. Disminuir los costos indirectos a la nómina a través de la exoneración del pago del 4×1000 a las\n                transacciones relacionadas con la contratación y pagos laborales.\n            </p>\n            <p class=\"text-justify\">3. Tarifa diferencial del 33% en el Impuesto de la Renta en la Nueva Reforma Tributaria. Proposición que\n                busca alivianar los efectos generados en la pandemia por el COVID-19.\n            </p>\n            <p class=\"text-justify\">4. Programa Temporal de Empleo de Emergencia, que priorice la contratación de trabajadores no calificados,\n                para el desarrollo de actividades de reparación, recuperación y rehabilitación de infraestructura básica\n                de las zonas rurales o urbanas. Con el fin de disminuir el desempleo.\n            </p>\n            <p class=\"text-justify\">5. Flexibilizar las condiciones para el acceso de las MiPymes a recursos de financiación.\n            </p>\n            <p class=\"text-justify\">El día 26 de agosto, nuestra primera jornada denominada “Constructores de la nueva realidad social” contará\n                con la presencia del Dr. Jairo Pulecio, Presidente de la Junta Nacional de ACOPI; Dr. José O´Meara,\n                Director General de Colombia Comprar Eficiente; la Dra. Lucia Cusmano, Directora de las Pymes de la OCDE;\n                Dr. Aurelio Mejía, Viceministro encargado de Desarrollo Empresarial; Dra. Martha Lucía Ramírez,\n                Vicepresidente de la República de Colombia y Ministra de Relaciones exteriores.\n            </p>\n            <p class=\"text-justify\">La segunda jornada llamada “Experiencias que suman” contará con la presencia del Dr. Andrés García, Director\n                de Ventas del Segmento de Mediana y Pequeñas Empresas; Dra. Lucia Manfredi, Experta Politóloga; Sacerdote\n                Francisco de Roux; Tatyana Orozco, Presidente de Arena del Rio; Dra. Alejandra Botero, Directora DNP;\n                Dr. Mauricio Toro, Presidente Comisión por el Emprendimiento; Dr. Carlos Mario Estrada Molina, Director\n                General SENA; Dr. Guillermo Cáez, Presidente Asociación Nacional de Emprendedores de Colombia; Dr. Camilo\n                Guzmán, Director Ejecutivo Libertank. La cual, tiene como objetivo principal abrir un espacio de diálogo\n                constructivo frente a la nueva realidad que aquejan a las diferentes instituciones.\n            </p>\n            <p class=\"text-justify\">    En nuestro segundo día de congreso se desarrollará el tercer bloque llamado “Retos económicos y sociales”\n                donde nos acompañará el Dr. Ángel Custodio Cabrera, Ministro de Trabajo; Dr. Raúl José Buitrago, Presidente\n                del Fondo Nacional de Garantías; Dr. David Ortiz Díaz, CEO de SIIGO; Dr. Edgar Julián Gálvez, Universidad\n                del Valle – FAEDPYME; Dr. Domingo García, Universidad Politécnica de Cartagena – FAEDPYME. Este último\n                bloque se enfocará en los retos que corresponde asumir para recuperar los indicadores económicos y cerrar\n                las brechas sociales agravadas por el impacto de la pandemia.\n            </p>\n            <p class=\"text-justify\">    Para finalizar nuestro congreso, la clausura estará a cargo del Presidente de la República Dr. Iván\n                Duque Márquez en compañía de la Dra. Rosmery Quintero, Presidente Nacional ACOPI.\n            </p>\n            <p class=\"text-justify\">¡Bienvenidos a nuestro 66º Congreso Nacional: Empresas para el Desarrollo Social en el marco de la\n                celebración de nuestros 70 años!\n            </p>', NULL, 0, '2021-12-05 20:11:00', NULL, NULL),
(16, 1, 'vistas/images/noticias/6.jpg', 'Aprobación de creditos', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-16', '<p class=\"text-justify\">Desde hace 70 años, ACOPI ha sido reconocida como un gremio dinámico, respetuoso y dispuesto a la construcción\n                colectiva. Hoy, seguimos conservando esa posición, donde la sociedad, las instituciones públicas y privadas\n                exaltan la labor gremial, representando no sólo a nuestros afiliados sino también a todas las MiPymes del país\n                que se benefician con nuestra gestión.\n            </p>\n            <p class=\"text-justify\">Empresas para el desarrollo social, nombre que enmarca nuestro 66º Congreso Nacional, resaltando el papel\n                dinamizador del segmento MiPyme colombiano, por lo que conservarlo y desarrollarlo es un propósito común.\n                Dar a conocer las acciones que realizan los empresarios frente a los retos de transformación que como país\n                venimos enfrentando será la labor durante estos dos días de Congreso como instrumento de dialogo constructivo.\n            </p>\n            <p class=\"text-justify\">Resaltamos el papel fundamental de la rama legislativa y ejecutiva, así como el de los futuros candidatos\n                presidenciales, en los retos que debemos trabajar a través de diálogos constructivos e incluyentes, donde\n                se establezcan rutas eficaces, cerrando brechas competitivas y sociales.\n            </p>\n            <p class=\"text-justify\">Por esta razón, desde ACOPI presentamos las siguientes propuestas:\n            </p>\n            <p class=\"text-justify\">Reforma Laboral Estructural:\n            </p>\n            <p class=\"text-justify\">Trabajo por unidad de tiempo.</p>\n            <p class=\"text-justify\"> Eliminación del periodo mínimo de cotización para el reconocimiento y pago de incapacidades por enfermedad\n                común.</p>\n            <p class=\"text-justify\">Adopción de un preaviso por parte del trabajador </p>\n            <p class=\"text-justify\">Mayor optimización de los aportes del sector empresarial a las cajas de compensación. Teniendo en cuenta\n                que las cajas de compensación fueron creadas para el beneficio de los empleados, desde el sector empresarial\n                se vería de manera positiva que se destine un porcentaje de los aportes al cumplimiento de ciertas\n                obligaciones que benefician a los trabajadores a cargo del sector empresarial, entre estas: organizar y\n                realizar la jornada denominada día de la familia, espacio creado para que el trabajador pueda compartir\n                mayor tiempo con esta; elaborar y adaptar programas dirigidos a la realización de actividades recreativas,\n                culturales, deportivas o de capacitación; al cierre de brechas de capital humano fortaleciendo competencias\n                tecnológicas, habilidades blandas, readaptación laboral; realización de la valoración anual de los factores\n                de riesgo psicosocial.\n            </p>\n            <p class=\"text-justify\">Pago de prestaciones sociales proporcional al ingreso del trabajador.</p>\n            <p class=\"text-justify\"> 2. Disminuir los costos indirectos a la nómina a través de la exoneración del pago del 4×1000 a las\n                transacciones relacionadas con la contratación y pagos laborales.\n            </p>\n            <p class=\"text-justify\">3. Tarifa diferencial del 33% en el Impuesto de la Renta en la Nueva Reforma Tributaria. Proposición que\n                busca alivianar los efectos generados en la pandemia por el COVID-19.\n            </p>\n            <p class=\"text-justify\">4. Programa Temporal de Empleo de Emergencia, que priorice la contratación de trabajadores no calificados,\n                para el desarrollo de actividades de reparación, recuperación y rehabilitación de infraestructura básica\n                de las zonas rurales o urbanas. Con el fin de disminuir el desempleo.\n            </p>\n            <p class=\"text-justify\">5. Flexibilizar las condiciones para el acceso de las MiPymes a recursos de financiación.\n            </p>\n            <p class=\"text-justify\">El día 26 de agosto, nuestra primera jornada denominada “Constructores de la nueva realidad social” contará\n                con la presencia del Dr. Jairo Pulecio, Presidente de la Junta Nacional de ACOPI; Dr. José O´Meara,\n                Director General de Colombia Comprar Eficiente; la Dra. Lucia Cusmano, Directora de las Pymes de la OCDE;\n                Dr. Aurelio Mejía, Viceministro encargado de Desarrollo Empresarial; Dra. Martha Lucía Ramírez,\n                Vicepresidente de la República de Colombia y Ministra de Relaciones exteriores.\n            </p>\n            <p class=\"text-justify\">La segunda jornada llamada “Experiencias que suman” contará con la presencia del Dr. Andrés García, Director\n                de Ventas del Segmento de Mediana y Pequeñas Empresas; Dra. Lucia Manfredi, Experta Politóloga; Sacerdote\n                Francisco de Roux; Tatyana Orozco, Presidente de Arena del Rio; Dra. Alejandra Botero, Directora DNP;\n                Dr. Mauricio Toro, Presidente Comisión por el Emprendimiento; Dr. Carlos Mario Estrada Molina, Director\n                General SENA; Dr. Guillermo Cáez, Presidente Asociación Nacional de Emprendedores de Colombia; Dr. Camilo\n                Guzmán, Director Ejecutivo Libertank. La cual, tiene como objetivo principal abrir un espacio de diálogo\n                constructivo frente a la nueva realidad que aquejan a las diferentes instituciones.\n            </p>\n            <p class=\"text-justify\">    En nuestro segundo día de congreso se desarrollará el tercer bloque llamado “Retos económicos y sociales”\n                donde nos acompañará el Dr. Ángel Custodio Cabrera, Ministro de Trabajo; Dr. Raúl José Buitrago, Presidente\n                del Fondo Nacional de Garantías; Dr. David Ortiz Díaz, CEO de SIIGO; Dr. Edgar Julián Gálvez, Universidad\n                del Valle – FAEDPYME; Dr. Domingo García, Universidad Politécnica de Cartagena – FAEDPYME. Este último\n                bloque se enfocará en los retos que corresponde asumir para recuperar los indicadores económicos y cerrar\n                las brechas sociales agravadas por el impacto de la pandemia.\n            </p>\n            <p class=\"text-justify\">    Para finalizar nuestro congreso, la clausura estará a cargo del Presidente de la República Dr. Iván\n                Duque Márquez en compañía de la Dra. Rosmery Quintero, Presidente Nacional ACOPI.\n            </p>\n            <p class=\"text-justify\">¡Bienvenidos a nuestro 66º Congreso Nacional: Empresas para el Desarrollo Social en el marco de la\n                celebración de nuestros 70 años!\n            </p>', NULL, 0, '2021-12-05 20:11:28', NULL, NULL);
INSERT INTO `noticias` (`id`, `categoria`, `portada_noticia`, `titulo`, `descripcion_noticia`, `p_claves_noticia`, `ruta_noticia`, `contenido_noticia`, `vistas_noticia`, `destacado`, `fecha_noticia`, `created_at`, `updated_at`) VALUES
(17, 3, 'vistas/images/noticias/7.jpg', 'ACOPI Cesar celebra el festival vallenato 2022', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[\"acopi\", \"congreso\", \"microempresarios\", \"agremiacion\"]', 'noticia-17', '<p class=\"text-justify\">Desde hace 70 años, ACOPI ha sido reconocida como un gremio dinámico, respetuoso y dispuesto a la construcción\n                colectiva. Hoy, seguimos conservando esa posición, donde la sociedad, las instituciones públicas y privadas\n                exaltan la labor gremial, representando no sólo a nuestros afiliados sino también a todas las MiPymes del país\n                que se benefician con nuestra gestión.\n            </p>\n            <p class=\"text-justify\">Empresas para el desarrollo social, nombre que enmarca nuestro 66º Congreso Nacional, resaltando el papel\n                dinamizador del segmento MiPyme colombiano, por lo que conservarlo y desarrollarlo es un propósito común.\n                Dar a conocer las acciones que realizan los empresarios frente a los retos de transformación que como país\n                venimos enfrentando será la labor durante estos dos días de Congreso como instrumento de dialogo constructivo.\n            </p>\n            <p class=\"text-justify\">Resaltamos el papel fundamental de la rama legislativa y ejecutiva, así como el de los futuros candidatos\n                presidenciales, en los retos que debemos trabajar a través de diálogos constructivos e incluyentes, donde\n                se establezcan rutas eficaces, cerrando brechas competitivas y sociales.\n            </p>\n            <p class=\"text-justify\">Por esta razón, desde ACOPI presentamos las siguientes propuestas:\n            </p>\n            <p class=\"text-justify\">Reforma Laboral Estructural:\n            </p>\n            <p class=\"text-justify\">Trabajo por unidad de tiempo.</p>\n            <p class=\"text-justify\"> Eliminación del periodo mínimo de cotización para el reconocimiento y pago de incapacidades por enfermedad\n                común.</p>\n            <p class=\"text-justify\">Adopción de un preaviso por parte del trabajador </p>\n            <p class=\"text-justify\">Mayor optimización de los aportes del sector empresarial a las cajas de compensación. Teniendo en cuenta\n                que las cajas de compensación fueron creadas para el beneficio de los empleados, desde el sector empresarial\n                se vería de manera positiva que se destine un porcentaje de los aportes al cumplimiento de ciertas\n                obligaciones que benefician a los trabajadores a cargo del sector empresarial, entre estas: organizar y\n                realizar la jornada denominada día de la familia, espacio creado para que el trabajador pueda compartir\n                mayor tiempo con esta; elaborar y adaptar programas dirigidos a la realización de actividades recreativas,\n                culturales, deportivas o de capacitación; al cierre de brechas de capital humano fortaleciendo competencias\n                tecnológicas, habilidades blandas, readaptación laboral; realización de la valoración anual de los factores\n                de riesgo psicosocial.\n            </p>\n            <p class=\"text-justify\">Pago de prestaciones sociales proporcional al ingreso del trabajador.</p>\n            <p class=\"text-justify\"> 2. Disminuir los costos indirectos a la nómina a través de la exoneración del pago del 4×1000 a las\n                transacciones relacionadas con la contratación y pagos laborales.\n            </p>\n            <p class=\"text-justify\">3. Tarifa diferencial del 33% en el Impuesto de la Renta en la Nueva Reforma Tributaria. Proposición que\n                busca alivianar los efectos generados en la pandemia por el COVID-19.\n            </p>\n            <p class=\"text-justify\">4. Programa Temporal de Empleo de Emergencia, que priorice la contratación de trabajadores no calificados,\n                para el desarrollo de actividades de reparación, recuperación y rehabilitación de infraestructura básica\n                de las zonas rurales o urbanas. Con el fin de disminuir el desempleo.\n            </p>\n            <p class=\"text-justify\">5. Flexibilizar las condiciones para el acceso de las MiPymes a recursos de financiación.\n            </p>\n            <p class=\"text-justify\">El día 26 de agosto, nuestra primera jornada denominada “Constructores de la nueva realidad social” contará\n                con la presencia del Dr. Jairo Pulecio, Presidente de la Junta Nacional de ACOPI; Dr. José O´Meara,\n                Director General de Colombia Comprar Eficiente; la Dra. Lucia Cusmano, Directora de las Pymes de la OCDE;\n                Dr. Aurelio Mejía, Viceministro encargado de Desarrollo Empresarial; Dra. Martha Lucía Ramírez,\n                Vicepresidente de la República de Colombia y Ministra de Relaciones exteriores.\n            </p>\n            <p class=\"text-justify\">La segunda jornada llamada “Experiencias que suman” contará con la presencia del Dr. Andrés García, Director\n                de Ventas del Segmento de Mediana y Pequeñas Empresas; Dra. Lucia Manfredi, Experta Politóloga; Sacerdote\n                Francisco de Roux; Tatyana Orozco, Presidente de Arena del Rio; Dra. Alejandra Botero, Directora DNP;\n                Dr. Mauricio Toro, Presidente Comisión por el Emprendimiento; Dr. Carlos Mario Estrada Molina, Director\n                General SENA; Dr. Guillermo Cáez, Presidente Asociación Nacional de Emprendedores de Colombia; Dr. Camilo\n                Guzmán, Director Ejecutivo Libertank. La cual, tiene como objetivo principal abrir un espacio de diálogo\n                constructivo frente a la nueva realidad que aquejan a las diferentes instituciones.\n            </p>\n            <p class=\"text-justify\">    En nuestro segundo día de congreso se desarrollará el tercer bloque llamado “Retos económicos y sociales”\n                donde nos acompañará el Dr. Ángel Custodio Cabrera, Ministro de Trabajo; Dr. Raúl José Buitrago, Presidente\n                del Fondo Nacional de Garantías; Dr. David Ortiz Díaz, CEO de SIIGO; Dr. Edgar Julián Gálvez, Universidad\n                del Valle – FAEDPYME; Dr. Domingo García, Universidad Politécnica de Cartagena – FAEDPYME. Este último\n                bloque se enfocará en los retos que corresponde asumir para recuperar los indicadores económicos y cerrar\n                las brechas sociales agravadas por el impacto de la pandemia.\n            </p>\n            <p class=\"text-justify\">    Para finalizar nuestro congreso, la clausura estará a cargo del Presidente de la República Dr. Iván\n                Duque Márquez en compañía de la Dra. Rosmery Quintero, Presidente Nacional ACOPI.\n            </p>\n            <p class=\"text-justify\">¡Bienvenidos a nuestro 66º Congreso Nacional: Empresas para el Desarrollo Social en el marco de la\n                celebración de nuestros 70 años!\n            </p>', NULL, 0, '2022-01-20 20:48:30', NULL, NULL),
(18, 2, 'vistas/images/noticias/8.jpg', 'Congreso regional de microempresarios en Barranquilla - Colombia', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-18', '<p class=\"text-justify\">Desde hace 70 años, ACOPI ha sido reconocida como un gremio dinámico, respetuoso y dispuesto a la construcción\n                colectiva. Hoy, seguimos conservando esa posición, donde la sociedad, las instituciones públicas y privadas\n                exaltan la labor gremial, representando no sólo a nuestros afiliados sino también a todas las MiPymes del país\n                que se benefician con nuestra gestión.\n            </p>\n            <p class=\"text-justify\">Empresas para el desarrollo social, nombre que enmarca nuestro 66º Congreso Nacional, resaltando el papel\n                dinamizador del segmento MiPyme colombiano, por lo que conservarlo y desarrollarlo es un propósito común.\n                Dar a conocer las acciones que realizan los empresarios frente a los retos de transformación que como país\n                venimos enfrentando será la labor durante estos dos días de Congreso como instrumento de dialogo constructivo.\n            </p>\n            <p class=\"text-justify\">Resaltamos el papel fundamental de la rama legislativa y ejecutiva, así como el de los futuros candidatos\n                presidenciales, en los retos que debemos trabajar a través de diálogos constructivos e incluyentes, donde\n                se establezcan rutas eficaces, cerrando brechas competitivas y sociales.\n            </p>\n            <p class=\"text-justify\">Por esta razón, desde ACOPI presentamos las siguientes propuestas:\n            </p>\n            <p class=\"text-justify\">Reforma Laboral Estructural:\n            </p>\n            <p class=\"text-justify\">Trabajo por unidad de tiempo.</p>\n            <p class=\"text-justify\"> Eliminación del periodo mínimo de cotización para el reconocimiento y pago de incapacidades por enfermedad\n                común.</p>\n            <p class=\"text-justify\">Adopción de un preaviso por parte del trabajador </p>\n            <p class=\"text-justify\">Mayor optimización de los aportes del sector empresarial a las cajas de compensación. Teniendo en cuenta\n                que las cajas de compensación fueron creadas para el beneficio de los empleados, desde el sector empresarial\n                se vería de manera positiva que se destine un porcentaje de los aportes al cumplimiento de ciertas\n                obligaciones que benefician a los trabajadores a cargo del sector empresarial, entre estas: organizar y\n                realizar la jornada denominada día de la familia, espacio creado para que el trabajador pueda compartir\n                mayor tiempo con esta; elaborar y adaptar programas dirigidos a la realización de actividades recreativas,\n                culturales, deportivas o de capacitación; al cierre de brechas de capital humano fortaleciendo competencias\n                tecnológicas, habilidades blandas, readaptación laboral; realización de la valoración anual de los factores\n                de riesgo psicosocial.\n            </p>\n            <p class=\"text-justify\">Pago de prestaciones sociales proporcional al ingreso del trabajador.</p>\n            <p class=\"text-justify\"> 2. Disminuir los costos indirectos a la nómina a través de la exoneración del pago del 4×1000 a las\n                transacciones relacionadas con la contratación y pagos laborales.\n            </p>\n            <p class=\"text-justify\">3. Tarifa diferencial del 33% en el Impuesto de la Renta en la Nueva Reforma Tributaria. Proposición que\n                busca alivianar los efectos generados en la pandemia por el COVID-19.\n            </p>\n            <p class=\"text-justify\">4. Programa Temporal de Empleo de Emergencia, que priorice la contratación de trabajadores no calificados,\n                para el desarrollo de actividades de reparación, recuperación y rehabilitación de infraestructura básica\n                de las zonas rurales o urbanas. Con el fin de disminuir el desempleo.\n            </p>\n            <p class=\"text-justify\">5. Flexibilizar las condiciones para el acceso de las MiPymes a recursos de financiación.\n            </p>\n            <p class=\"text-justify\">El día 26 de agosto, nuestra primera jornada denominada “Constructores de la nueva realidad social” contará\n                con la presencia del Dr. Jairo Pulecio, Presidente de la Junta Nacional de ACOPI; Dr. José O´Meara,\n                Director General de Colombia Comprar Eficiente; la Dra. Lucia Cusmano, Directora de las Pymes de la OCDE;\n                Dr. Aurelio Mejía, Viceministro encargado de Desarrollo Empresarial; Dra. Martha Lucía Ramírez,\n                Vicepresidente de la República de Colombia y Ministra de Relaciones exteriores.\n            </p>\n            <p class=\"text-justify\">La segunda jornada llamada “Experiencias que suman” contará con la presencia del Dr. Andrés García, Director\n                de Ventas del Segmento de Mediana y Pequeñas Empresas; Dra. Lucia Manfredi, Experta Politóloga; Sacerdote\n                Francisco de Roux; Tatyana Orozco, Presidente de Arena del Rio; Dra. Alejandra Botero, Directora DNP;\n                Dr. Mauricio Toro, Presidente Comisión por el Emprendimiento; Dr. Carlos Mario Estrada Molina, Director\n                General SENA; Dr. Guillermo Cáez, Presidente Asociación Nacional de Emprendedores de Colombia; Dr. Camilo\n                Guzmán, Director Ejecutivo Libertank. La cual, tiene como objetivo principal abrir un espacio de diálogo\n                constructivo frente a la nueva realidad que aquejan a las diferentes instituciones.\n            </p>\n            <p class=\"text-justify\">    En nuestro segundo día de congreso se desarrollará el tercer bloque llamado “Retos económicos y sociales”\n                donde nos acompañará el Dr. Ángel Custodio Cabrera, Ministro de Trabajo; Dr. Raúl José Buitrago, Presidente\n                del Fondo Nacional de Garantías; Dr. David Ortiz Díaz, CEO de SIIGO; Dr. Edgar Julián Gálvez, Universidad\n                del Valle – FAEDPYME; Dr. Domingo García, Universidad Politécnica de Cartagena – FAEDPYME. Este último\n                bloque se enfocará en los retos que corresponde asumir para recuperar los indicadores económicos y cerrar\n                las brechas sociales agravadas por el impacto de la pandemia.\n            </p>\n            <p class=\"text-justify\">    Para finalizar nuestro congreso, la clausura estará a cargo del Presidente de la República Dr. Iván\n                Duque Márquez en compañía de la Dra. Rosmery Quintero, Presidente Nacional ACOPI.\n            </p>\n            <p class=\"text-justify\">¡Bienvenidos a nuestro 66º Congreso Nacional: Empresas para el Desarrollo Social en el marco de la\n                celebración de nuestros 70 años!\n            </p>', NULL, 0, '2021-12-05 20:12:33', NULL, NULL),
(19, 3, 'vistas/images/noticias/9.jpg', 'Feria de gastronomía local organizada por la Alcaldía de Valledupar', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-19', '<p class=\"text-justify\">Desde hace 70 años, ACOPI ha sido reconocida como un gremio dinámico, respetuoso y dispuesto a la construcción\n                colectiva. Hoy, seguimos conservando esa posición, donde la sociedad, las instituciones públicas y privadas\n                exaltan la labor gremial, representando no sólo a nuestros afiliados sino también a todas las MiPymes del país\n                que se benefician con nuestra gestión.\n            </p>\n            <p class=\"text-justify\">Empresas para el desarrollo social, nombre que enmarca nuestro 66º Congreso Nacional, resaltando el papel\n                dinamizador del segmento MiPyme colombiano, por lo que conservarlo y desarrollarlo es un propósito común.\n                Dar a conocer las acciones que realizan los empresarios frente a los retos de transformación que como país\n                venimos enfrentando será la labor durante estos dos días de Congreso como instrumento de dialogo constructivo.\n            </p>\n            <p class=\"text-justify\">Resaltamos el papel fundamental de la rama legislativa y ejecutiva, así como el de los futuros candidatos\n                presidenciales, en los retos que debemos trabajar a través de diálogos constructivos e incluyentes, donde\n                se establezcan rutas eficaces, cerrando brechas competitivas y sociales.\n            </p>\n            <p class=\"text-justify\">Por esta razón, desde ACOPI presentamos las siguientes propuestas:\n            </p>\n            <p class=\"text-justify\">Reforma Laboral Estructural:\n            </p>\n            <p class=\"text-justify\">Trabajo por unidad de tiempo.</p>\n            <p class=\"text-justify\"> Eliminación del periodo mínimo de cotización para el reconocimiento y pago de incapacidades por enfermedad\n                común.</p>\n            <p class=\"text-justify\">Adopción de un preaviso por parte del trabajador </p>\n            <p class=\"text-justify\">Mayor optimización de los aportes del sector empresarial a las cajas de compensación. Teniendo en cuenta\n                que las cajas de compensación fueron creadas para el beneficio de los empleados, desde el sector empresarial\n                se vería de manera positiva que se destine un porcentaje de los aportes al cumplimiento de ciertas\n                obligaciones que benefician a los trabajadores a cargo del sector empresarial, entre estas: organizar y\n                realizar la jornada denominada día de la familia, espacio creado para que el trabajador pueda compartir\n                mayor tiempo con esta; elaborar y adaptar programas dirigidos a la realización de actividades recreativas,\n                culturales, deportivas o de capacitación; al cierre de brechas de capital humano fortaleciendo competencias\n                tecnológicas, habilidades blandas, readaptación laboral; realización de la valoración anual de los factores\n                de riesgo psicosocial.\n            </p>\n            <p class=\"text-justify\">Pago de prestaciones sociales proporcional al ingreso del trabajador.</p>\n            <p class=\"text-justify\"> 2. Disminuir los costos indirectos a la nómina a través de la exoneración del pago del 4×1000 a las\n                transacciones relacionadas con la contratación y pagos laborales.\n            </p>\n            <p class=\"text-justify\">3. Tarifa diferencial del 33% en el Impuesto de la Renta en la Nueva Reforma Tributaria. Proposición que\n                busca alivianar los efectos generados en la pandemia por el COVID-19.\n            </p>\n            <p class=\"text-justify\">4. Programa Temporal de Empleo de Emergencia, que priorice la contratación de trabajadores no calificados,\n                para el desarrollo de actividades de reparación, recuperación y rehabilitación de infraestructura básica\n                de las zonas rurales o urbanas. Con el fin de disminuir el desempleo.\n            </p>\n            <p class=\"text-justify\">5. Flexibilizar las condiciones para el acceso de las MiPymes a recursos de financiación.\n            </p>\n            <p class=\"text-justify\">El día 26 de agosto, nuestra primera jornada denominada “Constructores de la nueva realidad social” contará\n                con la presencia del Dr. Jairo Pulecio, Presidente de la Junta Nacional de ACOPI; Dr. José O´Meara,\n                Director General de Colombia Comprar Eficiente; la Dra. Lucia Cusmano, Directora de las Pymes de la OCDE;\n                Dr. Aurelio Mejía, Viceministro encargado de Desarrollo Empresarial; Dra. Martha Lucía Ramírez,\n                Vicepresidente de la República de Colombia y Ministra de Relaciones exteriores.\n            </p>\n            <p class=\"text-justify\">La segunda jornada llamada “Experiencias que suman” contará con la presencia del Dr. Andrés García, Director\n                de Ventas del Segmento de Mediana y Pequeñas Empresas; Dra. Lucia Manfredi, Experta Politóloga; Sacerdote\n                Francisco de Roux; Tatyana Orozco, Presidente de Arena del Rio; Dra. Alejandra Botero, Directora DNP;\n                Dr. Mauricio Toro, Presidente Comisión por el Emprendimiento; Dr. Carlos Mario Estrada Molina, Director\n                General SENA; Dr. Guillermo Cáez, Presidente Asociación Nacional de Emprendedores de Colombia; Dr. Camilo\n                Guzmán, Director Ejecutivo Libertank. La cual, tiene como objetivo principal abrir un espacio de diálogo\n                constructivo frente a la nueva realidad que aquejan a las diferentes instituciones.\n            </p>\n            <p class=\"text-justify\">    En nuestro segundo día de congreso se desarrollará el tercer bloque llamado “Retos económicos y sociales”\n                donde nos acompañará el Dr. Ángel Custodio Cabrera, Ministro de Trabajo; Dr. Raúl José Buitrago, Presidente\n                del Fondo Nacional de Garantías; Dr. David Ortiz Díaz, CEO de SIIGO; Dr. Edgar Julián Gálvez, Universidad\n                del Valle – FAEDPYME; Dr. Domingo García, Universidad Politécnica de Cartagena – FAEDPYME. Este último\n                bloque se enfocará en los retos que corresponde asumir para recuperar los indicadores económicos y cerrar\n                las brechas sociales agravadas por el impacto de la pandemia.\n            </p>\n            <p class=\"text-justify\">    Para finalizar nuestro congreso, la clausura estará a cargo del Presidente de la República Dr. Iván\n                Duque Márquez en compañía de la Dra. Rosmery Quintero, Presidente Nacional ACOPI.\n            </p>\n            <p class=\"text-justify\">¡Bienvenidos a nuestro 66º Congreso Nacional: Empresas para el Desarrollo Social en el marco de la\n                celebración de nuestros 70 años!\n            </p>', NULL, 0, '2021-12-05 20:12:49', NULL, NULL),
(20, 1, 'vistas/images/noticias/10.jpg', 'Ponte al día con la cuota de sostenimiento', 'Mauris lobortis magna erat varius enim vestibulum aliquam consequat mauris dliquam ligula faucibus imperdiet tortor. ', '[acopi, congreso, microempresarios, agremiacion]', 'noticia-20', '<p class=\"text-justify\">Desde hace 70 años, ACOPI ha sido reconocida como un gremio dinámico, respetuoso y dispuesto a la construcción\n                colectiva. Hoy, seguimos conservando esa posición, donde la sociedad, las instituciones públicas y privadas\n                exaltan la labor gremial, representando no sólo a nuestros afiliados sino también a todas las MiPymes del país\n                que se benefician con nuestra gestión.\n            </p>\n            <p class=\"text-justify\">Empresas para el desarrollo social, nombre que enmarca nuestro 66º Congreso Nacional, resaltando el papel\n                dinamizador del segmento MiPyme colombiano, por lo que conservarlo y desarrollarlo es un propósito común.\n                Dar a conocer las acciones que realizan los empresarios frente a los retos de transformación que como país\n                venimos enfrentando será la labor durante estos dos días de Congreso como instrumento de dialogo constructivo.\n            </p>\n            <p class=\"text-justify\">Resaltamos el papel fundamental de la rama legislativa y ejecutiva, así como el de los futuros candidatos\n                presidenciales, en los retos que debemos trabajar a través de diálogos constructivos e incluyentes, donde\n                se establezcan rutas eficaces, cerrando brechas competitivas y sociales.\n            </p>\n            <p class=\"text-justify\">Por esta razón, desde ACOPI presentamos las siguientes propuestas:\n            </p>\n            <p class=\"text-justify\">Reforma Laboral Estructural:\n            </p>\n            <p class=\"text-justify\">Trabajo por unidad de tiempo.</p>\n            <p class=\"text-justify\"> Eliminación del periodo mínimo de cotización para el reconocimiento y pago de incapacidades por enfermedad\n                común.</p>\n            <p class=\"text-justify\">Adopción de un preaviso por parte del trabajador </p>\n            <p class=\"text-justify\">Mayor optimización de los aportes del sector empresarial a las cajas de compensación. Teniendo en cuenta\n                que las cajas de compensación fueron creadas para el beneficio de los empleados, desde el sector empresarial\n                se vería de manera positiva que se destine un porcentaje de los aportes al cumplimiento de ciertas\n                obligaciones que benefician a los trabajadores a cargo del sector empresarial, entre estas: organizar y\n                realizar la jornada denominada día de la familia, espacio creado para que el trabajador pueda compartir\n                mayor tiempo con esta; elaborar y adaptar programas dirigidos a la realización de actividades recreativas,\n                culturales, deportivas o de capacitación; al cierre de brechas de capital humano fortaleciendo competencias\n                tecnológicas, habilidades blandas, readaptación laboral; realización de la valoración anual de los factores\n                de riesgo psicosocial.\n            </p>\n            <p class=\"text-justify\">Pago de prestaciones sociales proporcional al ingreso del trabajador.</p>\n            <p class=\"text-justify\"> 2. Disminuir los costos indirectos a la nómina a través de la exoneración del pago del 4×1000 a las\n                transacciones relacionadas con la contratación y pagos laborales.\n            </p>\n            <p class=\"text-justify\">3. Tarifa diferencial del 33% en el Impuesto de la Renta en la Nueva Reforma Tributaria. Proposición que\n                busca alivianar los efectos generados en la pandemia por el COVID-19.\n            </p>\n            <p class=\"text-justify\">4. Programa Temporal de Empleo de Emergencia, que priorice la contratación de trabajadores no calificados,\n                para el desarrollo de actividades de reparación, recuperación y rehabilitación de infraestructura básica\n                de las zonas rurales o urbanas. Con el fin de disminuir el desempleo.\n            </p>\n            <p class=\"text-justify\">5. Flexibilizar las condiciones para el acceso de las MiPymes a recursos de financiación.\n            </p>\n            <p class=\"text-justify\">El día 26 de agosto, nuestra primera jornada denominada “Constructores de la nueva realidad social” contará\n                con la presencia del Dr. Jairo Pulecio, Presidente de la Junta Nacional de ACOPI; Dr. José O´Meara,\n                Director General de Colombia Comprar Eficiente; la Dra. Lucia Cusmano, Directora de las Pymes de la OCDE;\n                Dr. Aurelio Mejía, Viceministro encargado de Desarrollo Empresarial; Dra. Martha Lucía Ramírez,\n                Vicepresidente de la República de Colombia y Ministra de Relaciones exteriores.\n            </p>\n            <p class=\"text-justify\">La segunda jornada llamada “Experiencias que suman” contará con la presencia del Dr. Andrés García, Director\n                de Ventas del Segmento de Mediana y Pequeñas Empresas; Dra. Lucia Manfredi, Experta Politóloga; Sacerdote\n                Francisco de Roux; Tatyana Orozco, Presidente de Arena del Rio; Dra. Alejandra Botero, Directora DNP;\n                Dr. Mauricio Toro, Presidente Comisión por el Emprendimiento; Dr. Carlos Mario Estrada Molina, Director\n                General SENA; Dr. Guillermo Cáez, Presidente Asociación Nacional de Emprendedores de Colombia; Dr. Camilo\n                Guzmán, Director Ejecutivo Libertank. La cual, tiene como objetivo principal abrir un espacio de diálogo\n                constructivo frente a la nueva realidad que aquejan a las diferentes instituciones.\n            </p>\n            <p class=\"text-justify\">    En nuestro segundo día de congreso se desarrollará el tercer bloque llamado “Retos económicos y sociales”\n                donde nos acompañará el Dr. Ángel Custodio Cabrera, Ministro de Trabajo; Dr. Raúl José Buitrago, Presidente\n                del Fondo Nacional de Garantías; Dr. David Ortiz Díaz, CEO de SIIGO; Dr. Edgar Julián Gálvez, Universidad\n                del Valle – FAEDPYME; Dr. Domingo García, Universidad Politécnica de Cartagena – FAEDPYME. Este último\n                bloque se enfocará en los retos que corresponde asumir para recuperar los indicadores económicos y cerrar\n                las brechas sociales agravadas por el impacto de la pandemia.\n            </p>\n            <p class=\"text-justify\">    Para finalizar nuestro congreso, la clausura estará a cargo del Presidente de la República Dr. Iván\n                Duque Márquez en compañía de la Dra. Rosmery Quintero, Presidente Nacional ACOPI.\n            </p>\n            <p class=\"text-justify\">¡Bienvenidos a nuestro 66º Congreso Nacional: Empresas para el Desarrollo Social en el marco de la\n                celebración de nuestros 70 años!\n            </p>', NULL, 0, '2021-12-05 20:13:04', NULL, NULL),
(21, 1, 'vistas/images/noticias/portada/99238.jpg', 'Aumento en el PIB Nacional', 'El producto interno bruto (PIB) es el valor de mercado de todos los bienes y servicios finales producidos usando los factores de producción disponibles dentro de un país en un periodo determinado.', '[\"acopi\",\"PIB\"]', 'aumento-en-el-pib', '<span style=\"font-family: Arial; font-size: 1em; color: rgb(51, 51, 51);\">Cuando se usan los precios actuales (precios corrientes) para calcularlo se habla de PIB nominal, y al usar los precios de un año base (precios constantes) se conoce como PIB real. Este último es una mejor medida de la actividad económica de un país al medir exclusivamente el cambio en la producción de bienes y servicios en la economía (cantidades), dejando de lado el efecto de las variaciones de los precios.</span><div class=\"field field-name-field-definicion-experta field-type-text-with-summary field-label-hidden field-wrapper\" style=\"margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Roboto, Arial, sans-serif;\"><p style=\"margin-right: 0px; margin-bottom: 1.25rem; margin-left: 0px; padding: 0px; font-family: inherit; font-size: 1rem; line-height: 1.6; text-rendering: optimizelegibility;\"><span style=\"font-family: Arial;\">El</span><span style=\"font-family: Arial;\">&nbsp;</span><strong style=\"font-weight: bold; line-height: inherit;\"><span style=\"font-family: Arial;\">PIB</span></strong><span style=\"font-family: Arial;\">&nbsp;</span><span style=\"font-family: Arial;\">visto desde el enfoque de la</span><span style=\"font-family: Arial;\">&nbsp;</span><strong style=\"font-weight: bold; line-height: inherit;\"><span style=\"font-family: Arial;\">producción</span></strong><span style=\"font-family: Arial;\">, es posible desagregarlo por</span><span style=\"font-family: Arial;\">&nbsp;</span><strong style=\"font-weight: bold; line-height: inherit;\"><span style=\"font-family: Arial;\">ramas de actividad económica</span></strong><span style=\"font-family: Arial;\">&nbsp;</span><span style=\"font-family: Arial;\">para analizar sus desempeños o aportes al crecimiento económico del país.</span></p></div>', NULL, 0, '2021-12-05 02:20:34', '2021-12-05 07:20:34', '2021-12-05 07:20:34'),
(22, 1, 'vistas/images/noticias/portada/78484.jpg', 'Aumento en el PIB Nacional', 'El producto interno bruto (PIB) es el valor de mercado de todos los bienes y servicios finales producidos usando los factores de producción disponibles dentro de un país en un periodo determinado.', '[\"acopi\",\"PIB\"]', 'pib-crece', '<div class=\"body field\" style=\"margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Roboto, Arial, sans-serif;\"><p style=\"margin-right: 0px; margin-bottom: 1.25rem; margin-left: 0px; padding: 0px; font-family: inherit; font-size: 1em; line-height: 1.6; text-rendering: optimizelegibility;\">Cuando se usan los precios actuales (precios corrientes) para calcularlo se habla de PIB nominal, y al usar los precios de un año base (precios constantes) se conoce como PIB real. Este último es una mejor medida de la actividad económica de un país al medir exclusivamente el cambio en la producción de bienes y servicios en la economía (cantidades), dejando de lado el efecto de las variaciones de los precios.</p></div><div class=\"field field-name-field-definicion-experta field-type-text-with-summary field-label-hidden field-wrapper\" style=\"margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Roboto, Arial, sans-serif;\"><p style=\"margin-right: 0px; margin-bottom: 1.25rem; margin-left: 0px; padding: 0px; font-family: inherit; font-size: 1rem; line-height: 1.6; text-rendering: optimizelegibility;\">El&nbsp;<strong style=\"font-weight: bold; line-height: inherit;\">PIB</strong>&nbsp;visto desde el enfoque de la&nbsp;<strong style=\"font-weight: bold; line-height: inherit;\">producción</strong>, es posible desagregarlo por&nbsp;<strong style=\"font-weight: bold; line-height: inherit;\">ramas de actividad económica</strong>&nbsp;para analizar sus desempeños o aportes al crecimiento económico del país.</p></div>', NULL, 0, '2021-12-05 02:22:25', '2021-12-05 07:22:24', '2021-12-05 07:22:24'),
(24, 2, 'vistas/images/noticias/portada/96548.jpg', 'Las mejores microempresas de Colombia', 'Top de las mejores microempresas de Colombia', '[\"cesar\",\"microempresas\",\"acopi\",\"colombia\",\"pymes\",\"valledupar\"]', 'top-microempresas-valledupar', '<p style=\"padding: 1rem 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Crimson Text&quot;, times, serif; font-size: 19.2px;\"><img src=\"http://localhost/acopi/administrador/public/vistas/images/noticias/contenido/8b0d268963dd0cfb808aac48a549829f.png\" style=\"width: 25%; float: right;\" class=\"note-float-right\">Debido a la necesidad de utilizar el teléfono celular para realizar múltiples actividades, cada vez son más las personas que usan este aparato móvil mientras está cargando su batería, lo cual puede generar efectos negativos.</p><p style=\"padding: 1rem 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Crimson Text&quot;, times, serif; font-size: 19.2px;\">Según el portal especializado Betech, cuando se conecta el equipo al enchufe, la batería empieza a cargarse y por tanto aumenta la temperatura. Al usarlo, lo que sucede es que realmente no se carga el dispositivo ya que esa batería se la está consumiendo, derivando en una carga más lenta y perjudicial.</p><p style=\"padding: 1rem 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Crimson Text&quot;, times, serif; font-size: 19.2px;\">Expertos indican que es necesario evitar ver videos, jugar videojuegos, descargas archivos, hablar por video con alguien, porque se estará usando funciones que exigen mucho a la batería y al propio procesador, lo que hará que se dispare la temperatura del teléfono.</p><p style=\"padding: 1rem 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Crimson Text&quot;, times, serif; font-size: 19.2px;\">Aunque hay otras actividades de menor impacto, también debería evitarse durante el periodo de carga contestar un par de mensajes o hablar con alguien.</p><p style=\"padding: 1rem 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Crimson Text&quot;, times, serif; font-size: 19.2px;\">Por último, recomiendan no cargar el celular al 100 % ni cargarlo durante toda la noche y, sobre todo, usar cargadores correspondientes y oficiales para su aparato.</p>', NULL, 0, '2021-12-30 17:18:08', '2021-12-06 02:15:30', '2021-12-30 22:18:08'),
(25, 2, 'vistas/images/noticias/portada/61273.jpg', 'Bienvenidos a nuestra agremiación', 'Información acerca del evento de iniciación', '[\"acopi\",\"cesar\",\"inicio\",\"bienvenida\"]', 'evento-de-iniciacion', '<div>Este jueves 2 y el viernes 3 de diciembre la empresa de energía eléctrica Afinia adelantará el plan de mejoras y adecuaciones eléctricas para optimizar progresivamente su servicio en Valledupar y en municipios del Cesar.</div><div><br></div><div style=\"text-align: justify; \"><img src=\"http://localhost/acopi/administrador/public/vistas/images/noticias/contenido/a0f3601dc682036423013a5d965db9aa.jpg\" style=\"width: 25%; float: right;\" class=\"note-float-right\">En ese sentido, en el municipio de San Diego, el personal capacitado de Afinia instalará estructuras, redes y elementos de protección, los cuales harán parte del nuevo circuito San Diego 2. La actividad se llevará a cabo desde las 7:30 a.m. hasta las 4:30 p.m., y durante su desarrollo será suspendido el servicio de energía en el municipio y sectores aledaños.</div><div style=\"text-align: justify; \"><br></div><div style=\"text-align: justify;\">Del mismo modo, en Valledupar la empresa realizará trabajos en el circuito Valledupar 4 desde las 5:30 a.m. hasta las 7:30 a.m., durante la jornada habrá suspensión en el fluido eléctrico en los barrios: 9 de Abril, Las Acacias, Altos de La Nevada, Bello Horizonte, Campo Romero, El Limonar, Futuro de Los Niños, Urbanización Ciudad Tayrona, Villa Algenia, Villa Andrés, Villa Consuelo, Los Guasimales, Brisas de La Popa, Francisco Javier, Altos de Pimienta, Urbanización Bella Vista, Urbanización Ana María y el Conjunto Cerrado Alta Vista.</div><div style=\"text-align: justify;\"><br></div><div style=\"text-align: justify; \">Asimismo, el viernes 3 de diciembre no habrá servicio de energía desde las 7:45 a.m. hasta las 4:30 de la tarde para los habitantes del barrio San Fernando de Valledupar, en el sector comprendido entre las carreras 6 y 6B, desde la calle 45 hasta la calle 47, ya que en el marco de la construcción del nuevo circuito Salguero 5 en Valledupar instalarán nuevos postes y redes.</div>', NULL, 0, '2021-12-07 22:29:23', '2021-12-08 03:29:23', '2021-12-08 03:29:23'),
(28, 4, 'vistas/images/noticias/portada/12841.jpg', 'Llamadas de cobro', 'Fue abandonado por las autoridades de Alemania Oriental y en 1964 la fachada se reconstruyó. Hacia 1970 fue posada para estudiantes y en 1984 demolido.', '[\"hotel\",\"berlin\"]', 'quienes-somos', '<p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px;\">Con la reunificación alemana fue reconstruido y reinaugurado en 1997 como Hotel Adlon Kempinski Berlin.</p><p style=\"margin: 0.5em 0px; color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px;\">En noviembre de 2002, el cantante estadounidense&nbsp;<a href=\"https://es.wikipedia.org/wiki/Michael_Jackson\" title=\"Michael Jackson\" style=\"color: rgb(6, 69, 173); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Michael Jackson</a>&nbsp;mostró a su hijo recién nacido por el balcón de una de las suits, creando una gran polémica.</p>', NULL, 0, '2022-07-07 20:37:12', '2022-07-08 01:37:12', '2022-07-08 01:37:12'),
(29, 4, 'vistas/images/noticias/portada/96629.jpg', 'Septiembre mes de la salud mental', 'Durante este mes estaremos haciendo diferentes campañas acerca de como controlar las malas emociones.', '[\"capacitaci\\u00f3n\",\"septiembre\",\"salud mental\",\"acopi\",\"cesar\"]', 'salud-mental-septiembre', '<p style=\"box-sizing: inherit; line-height: 1.5; margin-bottom: 1em; margin-top: 1em; font-family: &quot;Source Sans Pro&quot;, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 17px;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">Es bastante común escuchar que las personas utilizan estos términos como si fueran sinónimos, sin embargo, salud mental y enfermedad mental son dos cosas muy diferentes. Le explicamos:</span></p><p style=\"box-sizing: inherit; line-height: 1.5; margin-bottom: 1em; margin-top: 1em; font-family: &quot;Source Sans Pro&quot;, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 17px;\"><strong style=\"box-sizing: inherit; font-weight: bold;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">La salud mental</span></strong><span style=\"font-family: &quot;Segoe UI&quot;;\">&nbsp;</span><span style=\"font-family: &quot;Segoe UI&quot;;\">incluye el bienestar emocional, psicológico y social de una persona. También determina cómo un ser humano maneja el estrés, se relaciona con otros y toma decisiones.</span></p><p style=\"box-sizing: inherit; line-height: 1.5; margin-bottom: 1em; margin-top: 1em; font-family: &quot;Source Sans Pro&quot;, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 17px;\"><strong style=\"box-sizing: inherit; font-weight: bold;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">Las enfermedades o trastornos mentales</span></strong><span style=\"font-family: &quot;Segoe UI&quot;;\">&nbsp;</span><span style=\"font-family: &quot;Segoe UI&quot;;\">representan el porcentaje más alto de problemas de salud en Estados Unidos. Alteran</span><span style=\"font-family: &quot;Segoe UI&quot;;\">&nbsp;</span><a href=\"https://medlineplus.gov/spanish/mentaldisorders.html\" style=\"box-sizing: inherit; color: rgb(21, 66, 133); text-decoration-line: underline;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">la forma de pensar de una persona, su comportamiento y su estado de ánimo</span></a><span style=\"font-family: &quot;Segoe UI&quot;;\">. Las más conocidas son la depresión, la esquizofrenia y el trastorno bipolar.</span></p><p style=\"box-sizing: inherit; line-height: 1.5; margin-bottom: 1em; margin-top: 1em; font-family: &quot;Source Sans Pro&quot;, &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 17px;\"><span style=\"font-family: &quot;Segoe UI&quot;;\">Hay condiciones que son pasajeras, mientras que las enfermedades o trastornos mentales son permanentes y afectan la habilidad de funcionar día a día. Puede que la salud mental de una persona esté siendo severamente afectada, pero esto no significa necesariamente que tenga o que vaya a desarrollar una enfermedad mental. Mientras que, por otra parte, puede que una persona que sí tenga una enfermedad mental pueda tener periodos de estabilidad emocional y bienestar social.</span></p>', NULL, 0, '2022-08-11 19:31:27', '2022-08-12 00:31:27', '2022-08-12 00:31:27'),
(30, 1, 'vistas/images/noticias/portada/36899.jpg', 'Programa de FONVISOCIAL para adquirir casas', 'Oportunidad de vivienda ya.', '[\"vivienda\",\"valledupar\"]', 'casas-fonvisocial-ya-valledupar', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; list-style-position: initial; list-style-image: initial; padding-left: 26px; color: rgb(78, 78, 78); font-family: &quot;Source Sans Pro&quot;, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgba(255, 255, 255, 0.85);\"><li style=\"font-family: &quot;Source Sans Pro&quot;; color: rgb(60, 103, 222); font-size: 18px; line-height: 1.6; text-align: left;\"><p class=\"ms-rteElement-P\" style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; color: rgb(104, 104, 104); line-height: 30px; padding: 0px;\">Un subsidio monetario para comprar su vivienda de 30 SMMLV ($30.000.000) o de 20 SMMLV ($20.000.000) dependiendo de tus ingresos.</p></li><li style=\"font-family: &quot;Source Sans Pro&quot;; color: rgb(60, 103, 222); font-size: 18px; line-height: 1.6;\"><p class=\"ms-rteElement-P\" style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; color: rgb(104, 104, 104); line-height: 30px; padding: 0px;\">Recibirás una cobertura a la tasa de interés de 5 puntos porcentuales para viviendas de interés prioritario que no superen los 90 SMMLV ($90.000.000), de 4 puntos porcentuales para viviendas de interés social de hasta 135 SMMLV ($135.000.000) o de hasta 150 SMMLV ($150.000.000) para aglomeraciones urbanas cuya población supere un millón de habitantes.</p></li></ul>', NULL, 0, '2022-08-11 20:22:50', '2022-08-12 01:19:09', '2022-08-12 01:22:50'),
(31, 3, 'vistas/images/noticias/portada/73766.jpg', 'Septiembre el mes del amor y la amistad', 'Integración de nuestro empleados', '[\"septiembre\",\"amor y amistad\",\"acopi\",\"cesar\",\"acopi cesar\"]', 'septiembre-mes-del-amor', '<p>Acopi está presente en las celebraciones especiales del mes de septiembre</p>', NULL, 0, '2022-09-17 12:16:09', '2022-09-17 17:16:09', '2022-09-17 17:16:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina_web`
--

CREATE TABLE `pagina_web` (
  `id` int(11) NOT NULL,
  `dominio` text NOT NULL,
  `servidor` text NOT NULL,
  `titulo_pestana` text NOT NULL,
  `titulo_pagina` text NOT NULL,
  `logo_navegacion` text NOT NULL,
  `logo_pestana` text NOT NULL,
  `titulo_navegacion` text NOT NULL,
  `descripcion` text NOT NULL,
  `palabras_claves` text NOT NULL,
  `carrusel` text NOT NULL,
  `proyectos` text NOT NULL,
  `noticias_intro` text NOT NULL,
  `aliados` text NOT NULL,
  `videos` text NOT NULL,
  `productos` text NOT NULL,
  `redes_sociales` text NOT NULL,
  `contacto` text NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pagina_web`
--

INSERT INTO `pagina_web` (`id`, `dominio`, `servidor`, `titulo_pestana`, `titulo_pagina`, `logo_navegacion`, `logo_pestana`, `titulo_navegacion`, `descripcion`, `palabras_claves`, `carrusel`, `proyectos`, `noticias_intro`, `aliados`, `videos`, `productos`, `redes_sociales`, `contacto`, `updated_at`) VALUES
(1, 'http://localhost/acopi-laravel-9/', 'http://localhost/acopi-laravel-9/administrador/public/', 'ACOPI - CESAR', 'ACOPI - Cesar', 'vistas/images/pagina_web/8804.png', 'vistas/images/pagina_web/7536.png', 'ACOPI - CESAR', 'Página oficial de la asociación de las medianas y pequeñas industrias del Cesar, aquí encontrarás toda la información de nuestra agremiación.', '[\"acopi\",\"cesar\",\"acopicesar\",\"valledupar\",\"agremiacion\",\"agremiados\",\"microempresarios\",\"pymes\",\"colombia\",\"citas\"]', '[{\n	\"categoria\": \"Capacitación\",\n	\"titulo\": \"¡Ya comienza el festival! y es hora de planear.\",\n	\"texto\": \"Capacitación sobre como aprovechar la afluencia masiva de turistas (sector hotelero) y como incrementar las ventas (sector comercial). Dictado por la Doctora Alexandra Márquez.\",\n	\"boton-1-color\": \"bg-primary\",\n	\"boton-1-texto\": \"Inscripción\",\n	\"url-boton-1\": \"https://www.google.com/\",\n	\"boton-2-color\": \"\",\n	\"boton-2-texto\": \"\",\n	\"url-boton-2\": \"\",\n	\"foto-delante\": \"vistas/images/pagina_web/carrusel/2423.jpg\",\n	\"fondo\": \"vistas/images/pagina_web/carrusel/9693.jpg\"\n},{\n	\"categoria\": \"Noticias\",\n	\"titulo\": \"¡EMPIEZA EL AÑO 2022!\",\n	\"texto\": \"Este año tus ingresos crecerán.\",\n	\"boton-1-color\": \"\",\n	\"boton-1-texto\": \"\",\n	\"url-boton-1\": \"https://www.google.com/\",\n	\"boton-2-color\": \"\",\n	\"boton-2-texto\": \"\",\n	\"url-boton-2\": \"\",\n	\"foto-delante\": \"\",\n	\"fondo\": \"vistas/images/pagina_web/carrusel/31551.jpg\"\n},{\n	\"categoria\": \"Noticias\",\n	\"titulo\": \"Descarga la App de la DIAN en Android o iPhone\",\n	\"texto\": \"Invitamos a todos nuestro agremiados a descargar la aplicación de la DIAN en todos sus dispositivos moviles y así matenerse actualizados de todas las novedades tributarias del momento.\",\n	\"boton-1-color\": \"\",\n	\"boton-1-texto\": \"\",\n	\"url-boton-1\": \"https://www.google.com/\",\n	\"boton-2-color\": \"\",\n	\"boton-2-texto\": \"\",\n	\"url-boton-2\": \"https://www.google.com/\",\n	\"foto-delante\": \"vistas/images/pagina_web/carrusel/2703.png\",\n	\"fondo\": \"vistas/images/pagina_web/carrusel/7085.jpg\"\n},{\n	\"categoria\": \"Noticias\",\n	\"titulo\": \"¡LLEGA EL 2022 Y ES MOMENTO DE PONERTE AL DÍA!\",\n	\"texto\": \"Comienza la transformación de los microempresarios en el departamento del Cesar.<b>¡Reactivate de inmediato!</b>\",\n	\"boton-1-color\": \"bg-navy\",\n	\"boton-1-texto\": \"Ver más\",\n	\"url-boton-1\": \"https://www.google.com/\",\n	\"boton-2-color\": \"bg-maroon\",\n	\"boton-2-texto\": \"Información general\",\n	\"url-boton-2\": \"https://www.google.com.co/\",\n	\"foto-delante\": \"\",\n	\"fondo\": \"vistas/images/pagina_web/carrusel/quinta.jpg\"\n},{\n	\"categoria\": \"Capacitación\",\n	\"titulo\": \"¿CÓMO TENER UN PÁGINA WEB?\",\n	\"texto\": \"Capacitación sobre como poner acceder a la sistematización de procesos empresariales.\",\n	\"boton-1-color\": \"\",\n	\"boton-1-texto\": \"\",\n	\"url-boton-1\": \"\",\n	\"boton-2-color\": \"\",\n	\"boton-2-texto\": \"\",\n	\"url-boton-2\": \"\",\n	\"foto-delante\": \"vistas/images/pagina_web/carrusel/89315.png\",\n	\"fondo\": \"vistas/images/pagina_web/carrusel/31967.jpg\"\n},{\n	\"categoria\": \"Noticias\",\n	\"titulo\": \"AUMENTO EN EL PIB NACIONAL\",\n	\"texto\": \"Al final del 2021 se registró un alza del 10% en el PIB del país.\",\n	\"boton-1-color\": \"\",\n	\"boton-1-texto\": \"\",\n	\"url-boton-1\": \"\",\n	\"boton-2-color\": \"\",\n	\"boton-2-texto\": \"\",\n	\"url-boton-2\": \"\",\n	\"foto-delante\": \"\",\n	\"fondo\": \"vistas/images/pagina_web/carrusel/64137.png\"\n},{\n	\"categoria\": \"Otros\",\n	\"titulo\": \"PRUEBA VENDER EN LINEA\",\n	\"texto\": \"A través de las ventas en línea y promoción de productos por medio de las redes sociales puedes atraer nuevos clientes.\",\n	\"boton-1-color\": \"\",\n	\"boton-1-texto\": \"\",\n	\"url-boton-1\": \"\",\n	\"boton-2-color\": \"\",\n	\"boton-2-texto\": \"\",\n	\"url-boton-2\": \"\",\n	\"foto-delante\": \"\",\n	\"fondo\": \"vistas/images/pagina_web/carrusel/97296.jpg\"\n},{\n	\"categoria\": \"undefined\",\n	\"titulo\": \"undefined\",\n	\"texto\": \"undefined\",\n	\"boton-1-color\": \"\",\n	\"boton-1-texto\": \"\",\n	\"url-boton-1\": \"\",\n	\"boton-2-color\": \"\",\n	\"boton-2-texto\": \"\",\n	\"url-boton-2\": \"\",\n	\"foto-delante\": \"\",\n	\"fondo\": \"vistas/images/pagina_web/carrusel/77108.jpg\"\n},{\n	\"categoria\": \"undefined\",\n	\"titulo\": \"undefined\",\n	\"texto\": \"undefined\",\n	\"boton-1-color\": \"\",\n	\"boton-1-texto\": \"\",\n	\"url-boton-1\": \"\",\n	\"boton-2-color\": \"\",\n	\"boton-2-texto\": \"\",\n	\"url-boton-2\": \"\",\n	\"foto-delante\": \"\",\n	\"fondo\": \"vistas/images/pagina_web/carrusel/19974.jpg\"\n},{\n	\"categoria\": \"Capacitación\",\n	\"titulo\": \"Capacitación en herramientas de excel\",\n	\"texto\": \"Capacitación en base de datos con excel\",\n	\"boton-1-color\": \"\",\n	\"boton-1-texto\": \"\",\n	\"url-boton-1\": \"https://www.google.com/?gws_rd=ssl\",\n	\"boton-2-color\": \"\",\n	\"boton-2-texto\": \"\",\n	\"url-boton-2\": \"\",\n	\"foto-delante\": \"\",\n	\"fondo\": \"vistas/images/pagina_web/carrusel/17587.jpg\"\n},{\n	\"categoria\": \"Otros\",\n	\"titulo\": \"El tiempo de descanso es necesario\",\n	\"texto\": \"viajar\",\n	\"boton-1-color\": \"bg-teal\",\n	\"boton-1-texto\": \"Leer mas\",\n	\"url-boton-1\": \"https://www.google.com/?gws_rd=ssl\",\n	\"boton-2-color\": \"bg-maroon\",\n	\"boton-2-texto\": \"Inscripcion\",\n	\"url-boton-2\": \"https://www.google.com/?gws_rd=ssl\",\n	\"foto-delante\": \"\",\n	\"fondo\": \"vistas/images/pagina_web/carrusel/46000.jpg\"\n},{\n	\"categoria\": \"undefined\",\n	\"titulo\": \"undefined\",\n	\"texto\": \"undefined\",\n	\"boton-1-color\": \"\",\n	\"boton-1-texto\": \"\",\n	\"url-boton-1\": \"\",\n	\"boton-2-color\": \"\",\n	\"boton-2-texto\": \"\",\n	\"url-boton-2\": \"\",\n	\"foto-delante\": \"\",\n	\"fondo\": \"vistas/images/pagina_web/carrusel/41082.jpg\"\n},{\n	\"categoria\": \"Capacitación\",\n	\"titulo\": \"JORNADA DE CAPACITACIÓN EN SALUD MENTAL\",\n	\"texto\": \"Septiembre el mes de la salud mental.\",\n	\"boton-1-color\": \"bg-info\",\n	\"boton-1-texto\": \"Más información\",\n	\"url-boton-1\": \"https://www.google.com/\",\n	\"boton-2-color\": \"\",\n	\"boton-2-texto\": \"\",\n	\"url-boton-2\": \"\",\n	\"foto-delante\": \"\",\n	\"fondo\": \"vistas/images/pagina_web/carrusel/37761.jpg\"\n},{\n	\"categoria\": \"Noticias\",\n	\"titulo\": \"Actualización del sistema\",\n	\"texto\": \"Sistema actualizado a una nueva versión.\",\n	\"boton-1-color\": \"bg-olive\",\n	\"boton-1-texto\": \"Ver más\",\n	\"url-boton-1\": \"https://laravel.com/docs/7.x/upgrade\",\n	\"boton-2-color\": \"\",\n	\"boton-2-texto\": \"\",\n	\"url-boton-2\": \"\",\n	\"foto-delante\": \"\",\n	\"fondo\": \"vistas/images/pagina_web/carrusel/76698.jpg\"\n}]', '[{\"imagen\": \"images/proyectos/agromercado.png\", \"fecha_dia\": \"14\", \"fecha_mes\": \"Abril\", \"categoria\": \"Sector Agroindustríal\", \"nombre\": \"AgroMercado\", \"info\": \"Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar.\"\n},{\"imagen\": \"images/proyectos/textiles.png\", \"fecha_dia\": \"15\", \"fecha_mes\": \"Abril\", \"categoria\": \"Sector Comercial\", \"nombre\": \"La Tercera Transformación\", \"info\": \"Proyecto que consiste en la evaluación para la aprobación de creditos, dandole la oportunidad a los microempresarios de crecer y superar la reciente crisis economica. En colaboración con Bancoldex.\"},{\"imagen\": \"images/proyectos/taxes.png\", \"fecha_dia\": \"16\", \"fecha_mes\": \"Abril\", \"categoria\": \"Comunidad en general\", \"nombre\": \"Taxes al día\", \"info\": \"Consiste en asegurarse que todos los microempresarios estén al tanto de cuales son sus compromisos tributarios.\" }]\n', 'En esta sesión encontraras las  noticias más recientes de nuestra agremiación, solo cliquea sobre el recuadro para ver más.', '[{\"nombre\":\"Universidad Popular del Cesar\",\"logo\":\"vistas/images/pagina_web/aliados/4547.png\",\"link\":\"http://www.unicesar.edu.co\"},{\"nombre\":\"Universidad de Santander UDES\",\"logo\":\"vistas/images/pagina_web/aliados/aliados-udes.png\",\"link\":\"http://www.unicesar.edu.co\"},{\"nombre\":\"Fundación Universitaria del Área Andina\",\"logo\":\"vistas/images/pagina_web/aliados/8706.png\",\"link\":\"http://www.unicesar.edu.co\"},{\"nombre\":\"Servicio Nacional de Aprendizaje\",\"logo\":\"vistas/images/pagina_web/aliados/aliados-sena.png\",\"link\":\"http://www.unicesar.edu.co\"},{\"nombre\":\"Gobernación del Cesar\",\"logo\":\"vistas/images/pagina_web/aliados/2788.png\",\"link\":\"http://www.unicesar.edu.co\"}]', '[\"https://www.youtube.com/embed/qJ7Kpfm6DXM\", \"https://www.youtube.com/embed/TYvtmPZ6YS8\", \"https://www.youtube.com/embed/jEVKFNZU4EI\"]', '[{\n	\"num\": \"01.\", \n	\"nombre\": \"Representación y liderazgo gremial.\", \n	\"descripcion\": \"Defendemos los intereses del sector ante las entidades gubernamentales y no gubernamentales, nacionales y/o extranjeras.\"\n},{\n	\"num\": \"02.\", \n	\"nombre\": \"Convenios de cooperación interinstitucional.\", \n	\"descripcion\": \"Suscritos con diversas entidades para desarrollar programas que contribuyan al fomentos de la pequeña y mediana empresa.\"\n},{\n	\"num\": \"03.\", \n	\"nombre\": \"Alianzas estrategicas.\", \n	\"descripcion\": \"Promovemos la asociación entre empresas afines para propocionar la transferencia de bienes y servicios buscando la ampliacion de sus mercados y la disminución de sus costos.\"\n},{\n	\"num\": \"04.\", \n	\"nombre\": \"Capacitación.\", \n	\"descripcion\": \"Programamos conferencias, talleres, cursos y seminarios especializados en diversas áreas administrativas y técnicas, orientadas a resolver las necesidades de capacitación del sector industrial, con tarifas especiales para afiliados.\"\n},{\n	\"num\": \"05.\", \n	\"nombre\": \"Asesorías.\", \n	\"descripcion\": \"Nuestros afiliados pueden obtener asesorías en las siguientes áreas:\"\n},{\n	\"num\": \"06.\", \n	\"nombre\": \"Información y divulgación.\", \n	\"descripcion\": \"Es nuestro interes mantener una cordial y permanente comunicación con nuestro gremio que nos permite hacerle llegar información especializada del sector y conocer sus inquietudes y necesidades.\"\n},{\n	\"num\": \"07.\", \n	\"nombre\": \"Eventos especiales.\", \n	\"descripcion\": \"Con el propósito de promocionar e integrar a nuestro afiliados, buscando ampliar sus horizontes, organizamos y apoyamos la realización de encuentros empresariales, muestras y ferias como Expocesar, Con la participación de entidades como PROEXPORT organizamos misiones a otros países con la intención de establecer contactos para importación y Exportación.\"\n},{\n	\"num\": \"08.\", \n	\"nombre\": \"Eventos institucionales.\", \n	\"descripcion\": \"Asamblea General de Afiliados, Convención Nacional, Congreso Nacional.\"\n},{\n	\"num\": \"09.\", \n	\"nombre\": \"Practicas empresariales.\", \n	\"descripcion\": \"Mediante Convenios con las universidades, estamos en la posibilidad de facilitar a nuestros afiliados practicantes calificados que les apoyen en la implantación de procesos hacia una mayor productividad, para lo cual se ha conformado un COMITÉ INTERDISCIPLINARIO.\"\n},{\n	\"num\": \"10.\", \n	\"nombre\": \"Fortalecimiento y desarrollo Sectorial.\", \n	\"descripcion\": \"A traves de los programas de desarrollo sectorial PRODES, se implementan actividades asociativas, orientadas al mejoramiento de la gestión y competividad con el objetivo final incorporar a las PYMES de la región en la corriente de los negocios internacionales.\"\n},{\n	\"num\": \"11.\", \n	\"nombre\": \"Centros de conciliación y arbitraje.\", \n	\"descripcion\": \"Al servicio de nuestros afiliados para disminuir conflictos por la via de la conciliación.\"\n}]', '[{\"nombre\":\"facebook\",\"logo\":\"fab fa-facebook-f\",\"link\":\"https://www.facebook.com\"},{\"nombre\":\"linkeln\",\"logo\":\"fab fa-linkedin-in\",\"link\":\"https://www.linkeln.com\"},{\"nombre\":\"twitter\",\"logo\":\"fab fa-twitter\",\"link\":\"https://www.twitter.com\"},{\"nombre\":\" tiktok\",\"logo\":\"fab fa-tiktok\",\"link\":\"https://www.tiktok.com\"},{\"nombre\":\" youtube\",\"logo\":\"fab fa-youtube\",\"link\":\"https://www.youtube.com\"},{\"nombre\":\" pinterest\",\"logo\":\"fab fa-pinterest-p\",\"link\":\"https://www.pinterest.com\"},{\"nombre\":\" tiktok\",\"logo\":\"fab fa-tiktok\",\"link\":\"https://www.tiktok.com\"}]', '[\"Calle 15 # 4-33, oficina 401.\",\"574 9216\",\"+57 315 651 6647\",\"acopicesar07@hotmail.com\"]', '2022-09-14 20:20:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(20) NOT NULL,
  `codigo_recibo` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_empresa` int(11) NOT NULL,
  `valor_deuda` int(20) NOT NULL,
  `valor_mes` int(20) NOT NULL,
  `valor_abono` int(20) DEFAULT NULL,
  `valor_recibo` int(20) NOT NULL,
  `mes_recibo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `year_recibo` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_limite` date NOT NULL,
  `estado` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `id_reporta` int(11) DEFAULT NULL,
  `fecha_reporte` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `codigo_recibo`, `id_empresa`, `valor_deuda`, `valor_mes`, `valor_abono`, `valor_recibo`, `mes_recibo`, `year_recibo`, `fecha_limite`, `estado`, `id_reporta`, `fecha_reporte`, `created_at`, `updated_at`) VALUES
(1931, NULL, 1, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'pagado', NULL, NULL, '2022-02-02 01:38:45', '2022-03-22 02:40:58'),
(1932, NULL, 2, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'vencido', NULL, NULL, '2022-02-02 01:38:45', '2022-02-02 01:40:20'),
(1933, NULL, 3, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'negoceado', 1, '2022-06-15 01:07:54', '2022-02-02 01:38:45', '2022-06-15 01:07:54'),
(1934, NULL, 5, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'negoceado', 1, '2022-02-03 01:45:50', '2022-02-02 01:38:46', '2022-02-03 01:45:50'),
(1935, NULL, 9, 0, 80000, NULL, 35000, 'febrero', '2022', '2022-02-11', 'negoceado', 1, '2022-02-03 01:43:31', '2022-02-02 01:38:46', '2022-02-03 01:43:31'),
(1936, NULL, 10, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'negoceado', 1, '2022-02-03 01:42:07', '2022-02-02 01:38:46', '2022-02-03 01:42:07'),
(1937, NULL, 11, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'pagado', 1, '2022-02-02 01:39:28', '2022-02-02 01:38:46', '2022-02-02 01:39:28'),
(1938, NULL, 12, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'pagado', 1, '2022-02-02 01:39:06', '2022-02-02 01:38:46', '2022-02-02 01:39:06'),
(1939, NULL, 13, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'pagado', 1, '2022-02-02 01:39:02', '2022-02-02 01:38:46', '2022-02-02 01:39:02'),
(1940, NULL, 14, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'pagado', 1, '2022-02-02 01:38:58', '2022-02-02 01:38:46', '2022-02-02 01:38:58'),
(1941, NULL, 15, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'negoceado', 1, '2022-02-02 07:56:39', '2022-02-02 01:38:46', '2022-02-02 07:56:39'),
(1942, NULL, 1, 80000, 80000, NULL, 160000, 'febrero', '2022', '2022-02-11', 'negoceado', NULL, NULL, '2022-02-02 01:40:20', '2022-02-02 07:30:12'),
(1943, NULL, 2, 80000, 80000, NULL, 160000, 'febrero', '2022', '2022-02-11', 'vencido', NULL, NULL, '2022-02-02 01:40:20', '2022-02-02 01:41:50'),
(1944, NULL, 3, 80000, 80000, NULL, 160000, 'febrero', '2022', '2022-02-11', 'negoceado', 1, '2022-06-15 01:07:55', '2022-02-02 01:40:20', '2022-06-15 01:07:55'),
(1945, NULL, 5, 80000, 80000, NULL, 160000, 'febrero', '2022', '2022-02-11', 'negoceado', 1, '2022-02-03 01:45:50', '2022-02-02 01:40:20', '2022-02-03 01:45:50'),
(1946, NULL, 9, 35000, 80000, NULL, 56000, 'febrero', '2022', '2022-02-11', 'negoceado', 1, '2022-02-03 01:43:31', '2022-02-02 01:40:21', '2022-02-03 01:43:31'),
(1947, NULL, 10, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'negoceado', 1, '2022-02-03 01:42:07', '2022-02-02 01:40:21', '2022-02-03 01:42:07'),
(1948, NULL, 11, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'pagado', 1, '2022-02-02 01:40:53', '2022-02-02 01:40:21', '2022-02-02 01:40:53'),
(1949, NULL, 12, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'pagado', 1, '2022-02-02 01:40:47', '2022-02-02 01:40:21', '2022-02-02 01:40:47'),
(1950, NULL, 13, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'pagado', 1, '2022-02-02 01:40:43', '2022-02-02 01:40:21', '2022-02-02 01:40:43'),
(1951, NULL, 14, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'pagado', 1, '2022-02-02 01:40:38', '2022-02-02 01:40:21', '2022-02-02 01:40:38'),
(1952, NULL, 15, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'negoceado', 1, '2022-02-02 07:56:39', '2022-02-02 01:40:21', '2022-02-02 07:56:39'),
(1953, NULL, 1, 160000, 80000, NULL, 240000, 'febrero', '2022', '2022-02-11', 'pagado', NULL, NULL, '2022-02-02 01:41:50', '2022-02-02 07:30:12'),
(1954, NULL, 2, 160000, 80000, NULL, 240000, 'febrero', '2022', '2022-02-11', 'pagado', NULL, NULL, '2022-02-02 01:41:50', '2022-02-02 07:17:17'),
(1955, NULL, 3, 160000, 80000, NULL, 240000, 'febrero', '2022', '2022-02-11', 'pagado', NULL, NULL, '2022-02-02 01:41:50', '2022-02-02 07:09:30'),
(1956, NULL, 5, 160000, 80000, NULL, 240000, 'febrero', '2022', '2022-02-11', 'pagado', NULL, NULL, '2022-02-02 01:41:51', '2022-02-02 07:05:37'),
(1957, NULL, 9, 56000, 80000, NULL, 102000, 'febrero', '2022', '2022-02-11', 'pagado', 1, '2022-02-02 01:42:36', '2022-02-02 01:41:51', '2022-02-02 06:57:32'),
(1958, NULL, 10, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'negoceado', 1, '2022-02-03 01:42:07', '2022-02-02 01:41:51', '2022-02-03 01:42:07'),
(1959, NULL, 11, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'pagado', 1, '2022-02-02 01:42:16', '2022-02-02 01:41:51', '2022-02-02 01:42:16'),
(1960, NULL, 12, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'pagado', 1, '2022-02-02 01:42:11', '2022-02-02 01:41:51', '2022-02-02 01:42:11'),
(1961, NULL, 13, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'pagado', 1, '2022-02-02 01:42:07', '2022-02-02 01:41:51', '2022-02-02 01:42:07'),
(1962, NULL, 14, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'pagado', 1, '2022-02-02 01:42:04', '2022-02-02 01:41:51', '2022-02-02 01:42:04'),
(1963, NULL, 15, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'negoceado', 1, '2022-02-02 07:56:39', '2022-02-02 01:41:52', '2022-02-02 07:56:39'),
(1964, NULL, 10, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'negoceado', 1, '2022-02-03 01:42:07', '2022-02-02 01:43:12', '2022-02-03 01:42:07'),
(1965, NULL, 11, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'negoceado', 1, '2022-07-21 02:36:36', '2022-02-02 01:43:12', '2022-07-21 02:36:36'),
(1966, NULL, 12, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'negoceado', 1, '2022-07-26 01:23:58', '2022-02-02 01:43:12', '2022-07-26 01:23:58'),
(1967, NULL, 13, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'vencido', NULL, NULL, '2022-02-02 01:43:12', '2022-02-02 07:56:31'),
(1968, NULL, 14, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'negoceado', 1, '2022-06-17 02:08:50', '2022-02-02 01:43:12', '2022-06-17 02:08:50'),
(1969, NULL, 15, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-11', 'negoceado', 1, '2022-02-02 07:56:39', '2022-02-02 01:43:13', '2022-02-02 07:56:39'),
(1970, NULL, 1, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-12', 'pagado', 1, '2022-06-15 01:08:22', '2022-02-02 07:56:30', '2022-06-15 01:08:22'),
(1971, NULL, 2, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-12', 'vencido', NULL, NULL, '2022-02-02 07:56:30', '2022-06-15 01:08:59'),
(1972, NULL, 3, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-12', 'pagado', 1, '2022-06-15 01:07:53', '2022-02-02 07:56:31', '2022-06-15 01:07:53'),
(1973, NULL, 5, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-12', 'pagado', 1, '2022-02-03 01:45:50', '2022-02-02 07:56:31', '2022-02-03 01:45:50'),
(1974, NULL, 9, 0, 80000, NULL, 80000, 'febrero', '2022', '2022-02-12', 'pagado', 1, '2022-02-03 01:43:31', '2022-02-02 07:56:31', '2022-02-03 01:43:31'),
(1975, NULL, 10, 80000, 80000, NULL, 160000, 'febrero', '2022', '2022-02-12', 'negoceado', 1, '2022-02-03 01:42:07', '2022-02-02 07:56:31', '2022-02-03 01:42:07'),
(1976, NULL, 11, 80000, 80000, NULL, 160000, 'febrero', '2022', '2022-02-12', 'pagado', 1, '2022-02-03 01:41:02', '2022-02-02 07:56:31', '2022-02-03 01:41:02'),
(1977, NULL, 12, 80000, 80000, NULL, 160000, 'febrero', '2022', '2022-02-12', 'pagado', 1, '2022-02-03 01:40:00', '2022-02-02 07:56:31', '2022-02-03 01:40:00'),
(1978, NULL, 13, 80000, 80000, NULL, 160000, 'febrero', '2022', '2022-02-12', 'pagado', 1, '2022-02-02 07:58:50', '2022-02-02 07:56:31', '2022-02-02 07:58:50'),
(1979, NULL, 14, 80000, 80000, NULL, 160000, 'febrero', '2022', '2022-02-12', 'pagado', 1, '2022-02-02 07:58:43', '2022-02-02 07:56:32', '2022-02-02 07:58:43'),
(1980, NULL, 15, 80000, 80000, NULL, 160000, 'febrero', '2022', '2022-02-12', 'negoceado', 1, '2022-02-02 07:56:39', '2022-02-02 07:56:32', '2022-02-02 07:56:39'),
(1981, NULL, 1, 0, 80000, NULL, 80000, 'junio', '2022', '2022-06-24', 'pagado', 1, '2022-07-26 01:12:39', '2022-06-15 01:08:59', '2022-07-26 01:12:39'),
(1982, NULL, 3, 0, 80000, NULL, 80000, 'junio', '2022', '2022-06-24', 'pagado', 1, '2022-07-26 01:13:04', '2022-06-15 01:09:00', '2022-07-26 01:13:04'),
(1983, NULL, 6, 0, 80000, NULL, 80000, 'junio', '2022', '2022-06-24', 'pagado', 1, '2022-07-26 01:13:20', '2022-06-15 01:09:00', '2022-07-26 01:13:20'),
(1984, NULL, 7, 0, 80000, NULL, 80000, 'junio', '2022', '2022-06-24', 'pagado', 1, '2022-07-26 01:13:33', '2022-06-15 01:09:00', '2022-07-26 01:13:33'),
(1985, NULL, 8, 0, 80000, NULL, 80000, 'junio', '2022', '2022-06-24', 'pagado', 1, '2022-07-26 01:13:47', '2022-06-15 01:09:01', '2022-07-26 01:13:47'),
(1986, NULL, 9, 0, 80000, NULL, 80000, 'junio', '2022', '2022-06-24', 'negoceado', 1, '2022-09-30 20:14:55', '2022-06-15 01:09:01', '2022-09-30 20:14:55'),
(1987, NULL, 10, 0, 80000, NULL, 80000, 'junio', '2022', '2022-06-24', 'negoceado', 1, '2022-09-30 20:14:41', '2022-06-15 01:09:01', '2022-09-30 20:14:41'),
(1988, NULL, 11, 0, 80000, NULL, 80000, 'junio', '2022', '2022-06-24', 'pagado', 1, '2022-07-21 02:36:36', '2022-06-15 01:09:02', '2022-07-21 02:36:36'),
(1989, NULL, 12, 0, 80000, NULL, 70000, 'junio', '2022', '2022-06-24', 'negoceado', 1, '2022-07-26 01:23:58', '2022-06-15 01:09:02', '2022-07-26 01:23:58'),
(1990, NULL, 13, 0, 80000, NULL, 80000, 'junio', '2022', '2022-06-24', 'vencido', NULL, NULL, '2022-06-15 01:09:02', '2022-07-26 01:14:20'),
(1991, NULL, 14, 0, 80000, NULL, 80000, 'junio', '2022', '2022-06-24', 'pagado', 1, '2022-06-17 02:08:50', '2022-06-15 01:09:02', '2022-06-17 02:08:50'),
(1992, NULL, 15, 0, 80000, NULL, 80000, 'junio', '2022', '2022-06-24', 'pagado', 1, '2022-06-15 02:42:12', '2022-06-15 01:09:02', '2022-06-15 02:42:12'),
(1993, NULL, 16, 0, 80000, NULL, 80000, 'junio', '2022', '2022-06-24', 'pagado', 1, '2022-06-15 02:42:04', '2022-06-15 01:09:03', '2022-06-15 02:42:04'),
(1994, NULL, 17, 0, 80000, NULL, 35000, 'junio', '2022', '2022-06-24', 'negoceado', 1, '2022-09-30 20:13:40', '2022-06-15 01:09:03', '2022-09-30 20:13:40'),
(1995, NULL, 18, 0, 80000, NULL, 80000, 'junio', '2022', '2022-06-24', 'pagado', 1, '2022-06-15 02:41:06', '2022-06-15 01:09:03', '2022-06-15 02:41:06'),
(1996, NULL, 19, 0, 80000, NULL, 80000, 'junio', '2022', '2022-06-24', 'pagado', 1, '2022-06-15 02:40:58', '2022-06-15 01:09:03', '2022-06-15 02:40:58'),
(1997, NULL, 20, 0, 80000, NULL, 80000, 'junio', '2022', '2022-06-24', 'pagado', 1, '2022-06-15 02:40:50', '2022-06-15 01:09:03', '2022-06-15 02:40:50'),
(1998, NULL, 1, 0, 80000, NULL, 80000, 'julio', '2022', '2022-08-04', 'pagado', 1, '2022-07-26 01:24:12', '2022-07-26 01:14:18', '2022-07-26 01:24:12'),
(1999, NULL, 3, 0, 80000, NULL, 80000, 'julio', '2022', '2022-08-04', 'pagado', 1, '2022-07-26 01:24:22', '2022-07-26 01:14:18', '2022-07-26 01:24:22'),
(2000, NULL, 6, 0, 80000, NULL, 80000, 'julio', '2022', '2022-08-04', 'vencido', NULL, NULL, '2022-07-26 01:14:18', '2022-08-01 20:28:35'),
(2001, NULL, 7, 0, 80000, NULL, 80000, 'julio', '2022', '2022-08-04', 'vencido', NULL, NULL, '2022-07-26 01:14:18', '2022-08-01 20:28:35'),
(2002, NULL, 8, 0, 80000, NULL, 80000, 'julio', '2022', '2022-08-04', 'vencido', NULL, NULL, '2022-07-26 01:14:18', '2022-08-01 20:28:35'),
(2003, NULL, 9, 80000, 80000, NULL, 160000, 'julio', '2022', '2022-08-04', 'negoceado', 1, '2022-09-30 20:14:55', '2022-07-26 01:14:19', '2022-09-30 20:14:55'),
(2004, NULL, 10, 80000, 80000, NULL, 160000, 'julio', '2022', '2022-08-04', 'negoceado', 1, '2022-09-30 20:14:41', '2022-07-26 01:14:19', '2022-09-30 20:14:41'),
(2005, NULL, 11, 0, 80000, NULL, 80000, 'julio', '2022', '2022-08-04', 'negoceado', 1, '2022-09-30 20:14:29', '2022-07-26 01:14:19', '2022-09-30 20:14:29'),
(2006, NULL, 12, 70000, 80000, NULL, 150000, 'julio', '2022', '2022-08-04', 'pagado', 1, '2022-07-26 01:23:58', '2022-07-26 01:14:19', '2022-07-26 01:23:58'),
(2007, NULL, 13, 80000, 80000, NULL, 160000, 'julio', '2022', '2022-08-04', 'no pago', NULL, NULL, '2022-07-26 01:14:20', '2022-08-01 19:47:04'),
(2008, NULL, 14, 0, 80000, NULL, 80000, 'julio', '2022', '2022-08-04', 'pagado', 1, '2022-07-26 01:23:49', '2022-07-26 01:14:20', '2022-07-26 01:23:49'),
(2009, NULL, 15, 0, 80000, NULL, 80000, 'julio', '2022', '2022-08-04', 'pagado', 1, '2022-07-26 01:23:43', '2022-07-26 01:14:20', '2022-07-26 01:23:43'),
(2010, NULL, 16, 0, 80000, NULL, 80000, 'julio', '2022', '2022-08-04', 'pagado', 1, '2022-07-26 01:23:37', '2022-07-26 01:14:20', '2022-07-26 01:23:37'),
(2011, NULL, 17, 35000, 80000, NULL, 115000, 'julio', '2022', '2022-08-04', 'negoceado', 1, '2022-09-30 20:13:40', '2022-07-26 01:14:20', '2022-09-30 20:13:40'),
(2012, NULL, 18, 0, 80000, NULL, 80000, 'julio', '2022', '2022-08-04', 'pagado', 1, '2022-07-26 01:23:28', '2022-07-26 01:14:20', '2022-07-26 01:23:28'),
(2013, NULL, 19, 0, 80000, NULL, 80000, 'julio', '2022', '2022-08-04', 'pagado', 1, '2022-07-26 01:23:23', '2022-07-26 01:14:20', '2022-07-26 01:23:23'),
(2014, NULL, 20, 0, 80000, NULL, 80000, 'julio', '2022', '2022-08-04', 'pagado', 1, '2022-07-26 01:23:18', '2022-07-26 01:14:21', '2022-07-26 01:23:18'),
(2015, NULL, 21, 0, 80000, NULL, 80000, 'julio', '2022', '2022-08-04', 'pagado', 1, '2022-07-26 01:23:13', '2022-07-26 01:14:21', '2022-07-26 01:23:13'),
(2029, NULL, 18, 0, 80000, NULL, 80000, 'agosto', '2022', '2022-08-09', 'negoceado', NULL, NULL, '2022-07-31 00:43:29', '2022-07-31 02:36:33'),
(2030, NULL, 18, 80000, 80000, NULL, 160000, 'septiembre', '2022', '2022-08-09', 'negoceado', NULL, NULL, '2022-07-31 00:49:51', '2022-07-31 02:36:33'),
(2031, NULL, 18, 240000, 80000, NULL, 320000, 'octubre', '2022', '2022-08-09', 'pagado', NULL, NULL, '2022-07-31 00:51:34', '2022-07-31 02:36:33'),
(2037, NULL, 21, 0, 80000, NULL, 30000, 'agosto', '2022', '2022-08-09', 'vencido - abonado', 1, '2022-07-31 01:16:11', '2022-07-31 01:15:48', '2022-08-01 19:47:05'),
(2038, NULL, 21, 30000, 80000, NULL, 110000, 'septiembre', '2022', '2022-08-09', 'vencido', NULL, NULL, '2022-07-31 01:16:45', '2022-07-31 01:29:35'),
(2039, NULL, 21, 110000, 80000, NULL, 190000, 'octubre', '2022', '2022-08-09', 'vencido', NULL, NULL, '2022-07-31 01:17:44', '2022-07-31 01:29:35'),
(2040, NULL, 21, 190000, 80000, NULL, 200000, 'noviembre', '2022', '2022-08-09', 'vencido', 1, '2022-07-31 01:22:31', '2022-07-31 01:18:49', '2022-07-31 01:29:35'),
(2041, NULL, 21, 200000, 80000, NULL, 280000, 'diciembre', '2022', '2022-08-09', 'no pago', NULL, NULL, '2022-07-31 01:29:35', '2022-08-01 19:47:05'),
(2042, NULL, 20, 0, 80000, NULL, 80000, 'agosto', '2022', '2022-08-10', 'vencido', NULL, NULL, '2022-07-31 01:32:34', '2022-07-31 01:45:45'),
(2043, NULL, 20, 80000, 80000, NULL, 160000, 'septiembre', '2022', '2022-09-10', 'vencido', NULL, NULL, '2022-07-31 01:33:31', '2022-07-31 01:45:45'),
(2044, NULL, 20, 160000, 80000, 50000, 190000, 'octubre', '2022', '2022-10-10', 'abonado', 1, '2022-07-31 01:40:42', '2022-07-31 01:34:10', '2022-09-30 20:16:23'),
(2156, NULL, 1, 0, 80000, NULL, 80000, 'agosto', '2022', '2022-08-11', 'pagado', 1, '2022-09-30 20:15:44', '2022-08-01 20:28:34', '2022-09-30 20:15:44'),
(2157, NULL, 3, 0, 80000, NULL, 80000, 'agosto', '2022', '2022-08-11', 'vencido', NULL, NULL, '2022-08-01 20:28:35', '2022-09-30 20:16:20'),
(2158, NULL, 6, 80000, 80000, NULL, 160000, 'agosto', '2022', '2022-08-11', 'vencido', NULL, NULL, '2022-08-01 20:28:35', '2022-09-30 20:16:20'),
(2159, NULL, 7, 80000, 80000, NULL, 160000, 'agosto', '2022', '2022-08-11', 'vencido', NULL, NULL, '2022-08-01 20:28:35', '2022-09-30 20:16:20'),
(2160, NULL, 8, 80000, 80000, 50000, 110000, 'agosto', '2022', '2022-08-11', 'vencido - abonado', 1, '2022-09-30 20:15:21', '2022-08-01 20:28:35', '2022-09-30 20:16:21'),
(2161, NULL, 9, 160000, 80000, NULL, 240000, 'agosto', '2022', '2022-08-11', 'pagado', 1, '2022-09-30 20:14:55', '2022-08-01 20:28:35', '2022-09-30 20:14:55'),
(2162, NULL, 10, 160000, 80000, NULL, 240000, 'agosto', '2022', '2022-08-11', 'pagado', 1, '2022-09-30 20:14:41', '2022-08-01 20:28:36', '2022-09-30 20:14:41'),
(2163, NULL, 11, 80000, 80000, NULL, 160000, 'agosto', '2022', '2022-08-11', 'pagado', 1, '2022-09-30 20:14:29', '2022-08-01 20:28:36', '2022-09-30 20:14:29'),
(2164, NULL, 12, 0, 80000, NULL, 80000, 'agosto', '2022', '2022-08-11', 'pagado', 1, '2022-09-30 20:14:19', '2022-08-01 20:28:37', '2022-09-30 20:14:19'),
(2165, NULL, 14, 0, 80000, NULL, 80000, 'agosto', '2022', '2022-08-11', 'pagado', 1, '2022-09-30 20:14:10', '2022-08-01 20:28:37', '2022-09-30 20:14:10'),
(2166, NULL, 15, 0, 80000, NULL, 80000, 'agosto', '2022', '2022-08-11', 'pagado', 1, '2022-09-30 20:14:01', '2022-08-01 20:28:37', '2022-09-30 20:14:01'),
(2167, NULL, 16, 0, 80000, NULL, 80000, 'agosto', '2022', '2022-08-11', 'pagado', 1, '2022-09-30 20:13:50', '2022-08-01 20:28:37', '2022-09-30 20:13:50'),
(2168, NULL, 17, 115000, 80000, NULL, 195000, 'agosto', '2022', '2022-08-11', 'pagado', 1, '2022-09-30 20:13:40', '2022-08-01 20:28:38', '2022-09-30 20:13:40'),
(2169, NULL, 19, 0, 80000, NULL, 80000, 'agosto', '2022', '2022-08-11', 'pagado', 1, '2022-09-30 20:13:28', '2022-08-01 20:28:38', '2022-09-30 20:13:28'),
(2170, NULL, 26, 0, 80000, 50000, 30000, 'agosto', '2022', '2022-08-17', 'vencido - abonado', 1, '2022-08-11 22:38:10', '2022-08-10 22:34:50', '2022-09-30 20:16:24'),
(2172, NULL, 1, 0, 80000, NULL, 80000, 'septiembre', '2022', '2022-10-10', 'no pago', NULL, NULL, '2022-09-30 20:16:20', '2022-09-30 20:16:20'),
(2173, NULL, 3, 80000, 80000, NULL, 160000, 'septiembre', '2022', '2022-10-10', 'no pago', NULL, NULL, '2022-09-30 20:16:20', '2022-09-30 20:16:20'),
(2174, NULL, 6, 160000, 80000, NULL, 240000, 'septiembre', '2022', '2022-10-10', 'no pago', NULL, NULL, '2022-09-30 20:16:20', '2022-09-30 20:16:20'),
(2175, NULL, 7, 160000, 80000, NULL, 240000, 'septiembre', '2022', '2022-10-10', 'no pago', NULL, NULL, '2022-09-30 20:16:21', '2022-09-30 20:16:21'),
(2176, NULL, 8, 110000, 80000, NULL, 190000, 'septiembre', '2022', '2022-10-10', 'no pago', NULL, NULL, '2022-09-30 20:16:21', '2022-09-30 20:16:21'),
(2177, NULL, 9, 0, 80000, NULL, 80000, 'septiembre', '2022', '2022-10-10', 'no pago', NULL, NULL, '2022-09-30 20:16:21', '2022-09-30 20:16:21'),
(2178, NULL, 10, 0, 80000, NULL, 80000, 'septiembre', '2022', '2022-10-10', 'no pago', NULL, NULL, '2022-09-30 20:16:21', '2022-09-30 20:16:21'),
(2179, NULL, 11, 0, 80000, NULL, 80000, 'septiembre', '2022', '2022-10-10', 'no pago', NULL, NULL, '2022-09-30 20:16:21', '2022-09-30 20:16:21'),
(2180, NULL, 12, 0, 80000, NULL, 80000, 'septiembre', '2022', '2022-10-10', 'no pago', NULL, NULL, '2022-09-30 20:16:22', '2022-09-30 20:16:22'),
(2181, NULL, 14, 0, 80000, NULL, 80000, 'septiembre', '2022', '2022-10-10', 'no pago', NULL, NULL, '2022-09-30 20:16:22', '2022-09-30 20:16:22'),
(2182, NULL, 15, 0, 80000, NULL, 80000, 'septiembre', '2022', '2022-10-10', 'no pago', NULL, NULL, '2022-09-30 20:16:22', '2022-09-30 20:16:22'),
(2183, NULL, 16, 0, 80000, NULL, 80000, 'septiembre', '2022', '2022-10-10', 'no pago', NULL, NULL, '2022-09-30 20:16:22', '2022-09-30 20:16:22'),
(2184, NULL, 17, 0, 80000, NULL, 80000, 'septiembre', '2022', '2022-10-10', 'no pago', NULL, NULL, '2022-09-30 20:16:22', '2022-09-30 20:16:22'),
(2185, NULL, 19, 0, 80000, NULL, 80000, 'septiembre', '2022', '2022-10-10', 'no pago', NULL, NULL, '2022-09-30 20:16:23', '2022-09-30 20:16:23'),
(2186, NULL, 22, 0, 80000, NULL, 80000, 'septiembre', '2022', '2022-10-10', 'no pago', NULL, NULL, '2022-09-30 20:16:23', '2022-09-30 20:16:23'),
(2187, NULL, 23, 0, 80000, NULL, 80000, 'septiembre', '2022', '2022-10-10', 'no pago', NULL, NULL, '2022-09-30 20:16:23', '2022-09-30 20:16:23'),
(2188, NULL, 24, 0, 80000, NULL, 80000, 'septiembre', '2022', '2022-10-10', 'no pago', NULL, NULL, '2022-09-30 20:16:23', '2022-09-30 20:16:23'),
(2189, NULL, 25, 0, 80000, NULL, 80000, 'septiembre', '2022', '2022-10-10', 'no pago', NULL, NULL, '2022-09-30 20:16:23', '2022-09-30 20:16:23'),
(2190, NULL, 26, 30000, 80000, NULL, 110000, 'septiembre', '2022', '2022-10-10', 'pagado', 1, '2022-09-30 21:58:38', '2022-09-30 20:16:24', '2022-09-30 21:58:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_generados`
--

CREATE TABLE `pagos_generados` (
  `id` int(11) NOT NULL,
  `month` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `year` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pagos_generados`
--

INSERT INTO `pagos_generados` (`id`, `month`, `year`, `created_at`, `updated_at`) VALUES
(68, '02', '2022', '2022-02-02 07:56:32', '2022-02-02 07:56:32'),
(69, '06', '2022', '2022-06-15 01:09:04', '2022-06-15 01:09:04'),
(70, '07', '2022', '2022-07-26 01:14:21', '2022-07-26 01:14:21'),
(77, '08', '2022', '2022-08-01 20:28:38', '2022-08-01 20:28:38'),
(78, '09', '2022', '2022-09-30 20:16:24', '2022-09-30 20:16:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_parametros`
--

CREATE TABLE `pagos_parametros` (
  `id` int(11) NOT NULL,
  `valor_cuota` int(11) NOT NULL,
  `periodo_activo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pagos_parametros`
--

INSERT INTO `pagos_parametros` (`id`, `valor_cuota`, `periodo_activo`, `created_at`, `updated_at`) VALUES
(1, 80000, 3, NULL, '2022-02-13 00:56:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('andresalfredosotosuarez@gmail.com', '$2y$10$A.tdC3QVQwGRb8tGR4mEQe1t8IWxrxLg7kx60TNNq06fFivYIavBS', '2021-11-20 03:32:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL,
  `sector_id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(370) COLLATE utf8_spanish_ci NOT NULL,
  `contenido` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen_proyecto` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `sector_id`, `nombre`, `descripcion`, `contenido`, `imagen_proyecto`, `created_at`, `updated_at`) VALUES
(1, 1, 'AgroMercado', 'Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar.', '<p><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\">Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar.&nbsp;</span><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\">Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar.</span></p><p><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\">Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar.</span><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\">Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar.</span></p><p><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\">Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar.</span></p><p><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\">Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar.&nbsp;</span><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\">Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar.&nbsp;</span><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\">Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar.</span></p><p><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\">Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar.</span></p><p><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\">Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar.</span><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\">Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar.</span><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\"><br></span><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\"><br></span><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\"><br></span><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\"><br></span><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\"><br></span><br></p>', '1664464845.jpg', '2022-09-29 20:20:45', '2022-10-02 03:43:49'),
(3, 5, 'La Tercera Transformación', 'Proyecto que consiste en la evaluación para la aprobación de creditos, dandole la oportunidad a los microempresarios de crecer y superar la reciente crisis economica. En colaboración con Bancoldex.', '<p><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\">Proyecto que consiste en la evaluación para la aprobación de creditos, dandole la oportunidad a los microempresarios de crecer y superar la reciente crisis economica. En colaboración con Bancoldex.</span><br></p>', '1664655976.jpg', '2022-10-02 01:26:16', '2022-10-02 03:47:20'),
(4, 2, 'Taxes al día', 'Consiste en asegurarse que todos los micro-empresarios estén al tanto de cuales son sus compromisos tributarios.', '<p><span style=\"text-align: justify;\"><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px;\">Consiste en asegurarse que todos los micro-empresarios&nbsp;estén al tanto de cuales son sus compromisos tributarios.</span></span><br></p>', '1664656073.jpg', '2022-10-02 01:27:53', '2022-10-02 03:47:39'),
(5, 1, 'AgroMercado', 'Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar.', '<p><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\">Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar.&nbsp;</span><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\">Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar.&nbsp;</span><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\">Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar.&nbsp;</span><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\">Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar.&nbsp;</span><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\">Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar.&nbsp;</span><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\">Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar.</span></p><p><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\">Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar.&nbsp;</span><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\">Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar.</span></p><p><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\">Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar.</span></p><p><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\">Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar.</span></p><p><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\">Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar.</span><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\"><br></span><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\"><br></span><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\"><br></span><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; text-align: justify;\"><br></span><br></p>', '1664664337.jpg', '2022-10-02 03:45:38', '2022-10-02 03:45:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representante_empresa`
--

CREATE TABLE `representante_empresa` (
  `id_rprt_legal` int(11) NOT NULL,
  `tipo_documento_rprt` text COLLATE utf8_spanish_ci NOT NULL,
  `cc_rprt_legal` text COLLATE utf8_spanish_ci NOT NULL,
  `primer_nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `segundo_nombre` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `primer_apellido` text COLLATE utf8_spanish_ci NOT NULL,
  `segundo_apellido` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo_rprt` text COLLATE utf8_spanish_ci NOT NULL,
  `email_rprt` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono_rprt` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto_rprt` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto_cedula_rprt` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `representante_empresa`
--

INSERT INTO `representante_empresa` (`id_rprt_legal`, `tipo_documento_rprt`, `cc_rprt_legal`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `fecha_nacimiento`, `sexo_rprt`, `email_rprt`, `telefono_rprt`, `foto_rprt`, `foto_cedula_rprt`, `created_at`, `updated_at`) VALUES
(3, 'cedula', '10658327539', 'Sandra', 'María', 'Gonzalez', 'Pereira', '1981-04-23', 'f', 'mgonzalez@gmail.com', '3004568234', 'vistas/images/afiliados/fotos/14378.jpg', 'vistas/images/afiliados/documentos/49086.jpg', '2022-01-09 07:26:16', '2022-01-10 03:54:13'),
(5, 'cedula', '1065920394', 'Mariana', 'Sofia', 'De Austria', 'y Borbon', '1984-09-07', 'f', 'msdeaustria@gmail.com', '3205483275', 'vistas/images/afiliados/fotos/20133.png', 'vistas/images/afiliados/documentos/13185.png', '2022-01-10 01:03:01', '2022-01-10 21:27:06'),
(6, 'cedula', '1065839234', 'Andrea', 'Martina', 'Ortiz', 'Almaza', '1970-04-04', 'f', 'aortiz@gmail.com', '3048457294', 'vistas/images/afiliados/fotos/46193.jpg', 'vistas/images/afiliados/documentos/27621.png', '2022-01-10 03:51:42', '2022-01-10 21:06:55'),
(7, 'cedula', '1065831073', 'Andrés', 'Alfredo', 'Soto', 'Suárez', '1997-02-13', 'm', 'aasoto@gmail.com', '3045395221', 'vistas/images/afiliados/fotos/62033.jpg', 'vistas/images/afiliados/documentos/36430.png', '2022-01-10 21:21:30', '2022-01-10 21:21:30'),
(8, 'cedula', '1065829462', 'José', 'Martín', 'Pérez', 'Gonzalez', '1990-10-08', 'm', 'jperez@gmail.com', '3125385693', 'vistas/images/afiliados/fotos/18711.jpg', 'vistas/images/afiliados/documentos/42465.png', '2022-01-12 07:23:35', '2022-01-22 07:21:11'),
(9, 'cedula', '1065827495', 'Esteban', 'José', 'Martinez', 'Iguarán', '1996-04-04', 'm', 'emartinez04@gmail.com', '3205395482', 'vistas/images/afiliados/fotos/16404.jpg', 'vistas/images/afiliados/documentos/88338.jpg', '2022-01-26 02:17:42', '2022-01-26 02:17:42'),
(10, 'cedula', '77342950', 'Aleajndra', 'Martina', 'Herrera', 'Marquez', '1978-05-25', 'f', 'amherrara25@gmail.com', '3045394385', 'vistas/images/afiliados/fotos/84349.jpg', 'vistas/images/afiliados/documentos/52931.jpg', '2022-01-26 02:19:34', '2022-01-26 02:19:34'),
(11, 'cedula', '49520439', 'Ignacio', NULL, 'Hernandez', 'Gonzalez', '1980-07-06', 'm', 'ihermandez06@gmail.com', '3149530583', 'vistas/images/afiliados/fotos/44039.jpg', 'vistas/images/afiliados/documentos/99349.jpg', '2022-01-26 02:21:08', '2022-01-26 02:21:08'),
(12, 'cedula', '77324956', 'María', 'Gracia', 'Santos', 'De la cruz', '1988-07-13', 'f', 'mgsantos13@gmail.com', '3205395386', 'vistas/images/afiliados/fotos/10871.jpg', 'vistas/images/afiliados/documentos/49646.jpg', '2022-01-26 02:23:13', '2022-01-26 02:23:13'),
(13, 'cedula', '1065873651', 'Jennie', NULL, 'Lee', 'Wang', '1990-02-04', 'f', 'jlee04@gmail.com', '3117584302', 'vistas/images/afiliados/fotos/69981.jpg', 'vistas/images/afiliados/documentos/29896.jpg', '2022-01-26 02:24:52', '2022-01-26 02:24:52'),
(14, 'cedula', '1065832945', 'Helena', 'Margarita', 'Castillo', 'Perez', '1991-03-31', 'f', 'mhcastillo@gmail.com', '3154350976', 'vistas/images/afiliados/fotos/19288.jpg', 'vistas/images/afiliados/documentos/47540.jpg', '2022-01-26 02:37:56', '2022-01-26 02:37:56'),
(15, 'cedula', '77834932', 'Marciana', 'Ernesta', 'Mendoza', 'Herrera', '1982-07-07', 'f', 'memendoza07@gmail.com', '3167348450', 'vistas/images/afiliados/fotos/57017.jpg', 'vistas/images/afiliados/documentos/54155.jpg', '2022-01-26 02:40:24', '2022-01-26 02:40:24'),
(16, 'cedula', '56439438', 'Jesus', 'David', 'Moscote', 'Cartagena', '1985-09-23', 'm', 'jdmoscote23@gmail.com', '3103459356', 'vistas/images/afiliados/fotos/66761.jpg', 'vistas/images/afiliados/documentos/58862.jpg', '2022-01-26 02:42:16', '2022-01-26 02:42:16'),
(17, 'cedula', '77834943', 'Federica', 'Micaela', 'Holguin', 'Arteaga', '1965-11-01', 'f', 'fmholgin01@gmail.com', '3043195492', 'vistas/images/afiliados/fotos/96564.jpg', 'vistas/images/afiliados/documentos/69474.jpg', '2022-01-26 02:44:12', '2022-01-26 02:44:12'),
(18, 'cedula', '1065832953', 'Tomasita', NULL, 'Torres', 'Duertete', '1979-07-12', 'f', 'ttorres12@gmail.com', '3003258345', 'vistas/images/afiliados/fotos/30155.jpg', 'vistas/images/afiliados/documentos/66157.jpg', '2022-01-26 02:45:44', '2022-01-26 02:45:44'),
(19, 'cedula', '49548329', 'Miguel', 'Angel', 'Santo Domingo', 'y Torres', '1945-08-12', 'm', 'masantodomingo12@gmail.com', '3173249540', 'vistas/images/afiliados/fotos/85126.jpg', 'vistas/images/afiliados/documentos/72404.jpg', '2022-01-26 02:49:25', '2022-01-26 02:49:25'),
(20, 'cedula', '77213845', 'Carla', 'Josefa', 'Epiayu', 'Aguilar', '1990-03-12', 'f', 'cjepiayu12@gmail.com', '3004395412', 'vistas/images/afiliados/fotos/11975.jpg', 'vistas/images/afiliados/documentos/91742.jpg', '2022-01-26 02:54:40', '2022-01-26 02:54:40'),
(21, 'cedula', '77345723', 'Hernan', 'Andrés', 'Mosquera', 'Moscote', '1969-12-31', 'm', 'hamosquera31@gmail.com', '3123284375', 'vistas/images/afiliados/fotos/13161.jpg', 'vistas/images/afiliados/documentos/82375.jpg', '2022-01-26 02:57:16', '2022-01-26 02:57:16'),
(22, 'cedula', '49328431', 'Teobaldo', 'De Jésus', 'Alvarez', 'Villalba', '1950-02-02', 'm', 'tdjalvarez02@gmail.com', '3003215395', 'vistas/images/afiliados/fotos/70843.jpg', 'vistas/images/afiliados/documentos/33608.jpg', '2022-01-26 03:01:01', '2022-01-26 03:01:01'),
(23, 'cedula', '1065856913', 'John', NULL, 'Andrade', 'Castro', '1993-08-06', 'm', 'jandrade06@gmail.com', '3044369783', 'vistas/images/afiliados/fotos/49864.jpg', 'vistas/images/afiliados/documentos/11770.jpg', '2022-01-26 03:02:53', '2022-01-26 03:02:53'),
(24, 'cedula', '65327430', 'Teresita', 'Martina', 'Morales', 'Mieles', '1990-05-08', 'f', 'tmmorales08@gmail.com', '3203295482', 'vistas/images/afiliados/fotos/40523.jpg', 'vistas/images/afiliados/documentos/14730.jpg', '2022-01-26 03:05:13', '2022-01-26 03:05:13'),
(25, 'cedula', '1001438437', 'Jean', 'Michael', 'Park', 'Park', '1974-02-04', 'm', 'jmpark04@gmail.com', '3014384385', 'vistas/images/afiliados/fotos/11799.jpg', 'vistas/images/afiliados/documentos/80597.jpg', '2022-01-26 03:15:53', '2022-01-26 03:15:53'),
(26, 'cedula', '77345213', 'Antoine', 'Paul', 'Satre', 'Foret', '1960-02-12', 'm', 'apsatre12@gmail.com', '3003216384', 'vistas/images/afiliados/fotos/68091.jpg', 'vistas/images/afiliados/documentos/18088.jpg', '2022-01-26 03:18:32', '2022-01-26 03:18:32'),
(27, 'cedula', '1001234758', 'Antonio', 'Miguel', 'Sequeda', 'Hinojosa', '1991-08-07', 'm', 'amsequeda07@gmail.com', '3193284302', 'vistas/images/afiliados/fotos/83781.jpg', 'vistas/images/afiliados/documentos/99056.jpg', '2022-01-26 03:21:04', '2022-01-26 03:21:04'),
(28, 'cedula', '1065723941', 'Claudia', 'Helena', 'De Sanctis', 'Isaza', '1978-06-22', 'f', 'chdesanctis22@gmail.com', '3173247328', 'vistas/images/afiliados/fotos/23559.jpg', 'vistas/images/afiliados/documentos/66967.jpg', '2022-01-26 03:26:44', '2022-01-26 03:26:44'),
(29, 'cedula', '49213754', 'Marcina', 'Enriqueta', 'Costelo', 'Marañon', '1949-06-28', 'f', 'mecostelo28@gmail.com', '3123274385', 'vistas/images/afiliados/fotos/73893.jpg', 'vistas/images/afiliados/documentos/59680.jpg', '2022-01-26 03:28:55', '2022-01-26 03:28:55'),
(30, 'cedula', '49549560', 'Helena', 'Cristina', 'Vega', 'De la Torre', '1985-08-12', 'f', 'hcvega@gmail.com', '3214395497', 'vistas/images/afiliados/fotos/39835.jpg', 'vistas/images/afiliados/documentos/78006.pdf', '2022-03-26 02:26:55', '2022-03-26 04:23:08'),
(31, 'cedula', '77329456', 'Pompilio', 'Armando', 'Herrera', 'Ibañez', '1990-04-04', 'm', 'paherrera@gmail.com', '3123248605', 'vistas/images/afiliados/fotos/38279.jpg', 'vistas/images/afiliados/documentos/61493.jpg', '2022-03-26 02:29:18', '2022-03-26 02:29:18'),
(32, 'cedula', '1100549328', 'Clara', 'Imelda', 'Orozco', 'Peña', '1989-02-22', 'f', 'ciorozco@gmail.com', '3124395604', 'vistas/images/afiliados/fotos/83584.jpg', 'vistas/images/afiliados/documentos/92331.jpg', '2022-08-02 02:09:14', '2022-08-02 02:09:14'),
(33, 'cedula', '1120439549', 'Leopoldo', 'Martín', 'De luna', 'Ibañez', '1980-02-12', 'm', 'lmdeluna@gmail.com', '3046957698', 'vistas/images/afiliados/fotos/91553.jpg', 'vistas/images/afiliados/documentos/61791.jpg', '2022-08-10 22:19:10', '2022-08-10 22:19:10'),
(34, 'cedula', '77540392', 'Catalina', 'Josefa', 'Hernandez', 'Gutiérrez', '1989-08-11', 'f', 'cmheranadez@gmail.com', '3045923953', 'vistas/images/afiliados/fotos/15693.jpg', 'vistas/images/afiliados/documentos/31109.jpg', '2022-08-11 20:11:08', '2022-08-11 20:14:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', NULL, NULL),
(2, 'Director ejecutivo', NULL, NULL),
(3, 'Subdirector administrativo y financiero', NULL, NULL),
(4, 'Subdirector de desarrollo empresarial', NULL, NULL),
(5, 'Subdirector juridico', NULL, NULL),
(6, 'Subdirector de comunicaciones y eventos', NULL, NULL),
(7, 'Asistente de dirección', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector_empresa`
--

CREATE TABLE `sector_empresa` (
  `id_sector` int(11) NOT NULL,
  `nombre_sector` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sector_empresa`
--

INSERT INTO `sector_empresa` (`id_sector`, `nombre_sector`, `created_at`, `updated_at`) VALUES
(1, 'Agroindustrial', NULL, NULL),
(2, 'Prestación de servicios', NULL, NULL),
(4, 'Tecnología', '2022-02-04 04:50:32', '2022-02-04 04:52:53'),
(5, 'Industria Textil', '2022-02-04 04:57:04', '2022-02-04 04:57:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_documentos`
--

CREATE TABLE `tipos_documentos` (
  `id` int(11) NOT NULL,
  `codigo_doc` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_doc` varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipos_documentos`
--

INSERT INTO `tipos_documentos` (`id`, `codigo_doc`, `nombre_doc`) VALUES
(1, 'CC', 'Cédula de ciudadanía'),
(2, 'CE', 'Cédula de Extranjería'),
(3, 'NIP', 'Número de Identificación Personal'),
(4, 'NIT', 'Número de Idenficación Tributaría'),
(5, 'TI', 'Tarjeta de Identidad'),
(6, 'PAP', 'Pasaporte'),
(7, 'O', 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rol` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modo` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Diurno',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `foto`, `rol`, `modo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Andrés Soto', 'andresalfredosotosuarez@gmail.com', NULL, '$2y$10$jPmKrQ9l3Xvt8xN35BHt.OJ.NTYenPs9nHvKxAy6r6ZTKq1.sZln6', 'vistas/images/usuarios/723.jpg', 'Administrador', 'Diurno', NULL, '2021-11-17 01:34:47', '2022-07-28 01:56:23'),
(4, 'Jean Carlos Recio', 'jrecio@gmail.com', NULL, '$2y$10$TqKqyV6QZ5LHB8OO.3nkm.VmkdIuxptHz2e6MgeMCMKeCFIjleBSy', 'vistas/images/usuarios/563.jpg', 'Administrador', 'Nocturno', NULL, '2021-11-30 07:18:38', '2022-01-22 06:41:14'),
(16, 'Pedro José Hurtado Hurtado', 'pjhurtado@gmail.com', NULL, '$2y$10$8G6jVsphdsDJCQBzKzDhuu231RuCKpTQLR9HLrMtJi3LunJHPGqKa', 'vistas/images/usuarios/unknown.png', 'Subdirector de comunicaciones y eventos', 'Diurno', NULL, '2022-04-01 01:16:54', '2022-04-01 01:16:54'),
(17, 'Andrés Alfredo Soto Suárez', 'aasoto@gmail.com', NULL, '$2y$10$tf1ZT7a/uw85xFUe3AGZ7.U4Hwdgl2kUeO1EU.ogudH5dTPr3gbxS', 'vistas/images/usuarios/unknown.png', 'Administrador', 'Diurno', NULL, '2022-04-01 01:23:52', '2022-04-02 01:28:20'),
(18, 'Yekaterina Ivanova Gagarín Yeltsin', 'yigagarin@vk.com', NULL, '$2y$10$ZH4uRSn70nx7/CS7aA4K0eyPkU/ZfXckbdxs6VWRw7vV3mAzkuX3C', 'vistas/images/usuarios/91015.jpg', 'Asistente de dirección', 'Diurno', NULL, '2022-04-02 02:23:13', '2022-04-02 02:28:14'),
(19, 'Adonais  Fuentes Argote', 'afuentes@gmail.com', NULL, '$2y$10$ojq8n72XDXeCAPTZ04cyUO9e4xeUbntTOvYujlFLVsvtl2xe.4ed2', 'vistas/images/usuarios/unknown.png', 'Director ejecutivo', 'Diurno', NULL, '2022-04-03 00:40:39', '2022-04-03 00:46:44'),
(20, 'Hernan Enrique Cuevas Castro', 'hecuervas@gmail.com', NULL, '$2y$10$SybQDoduRQIxVwqzD/OVqOKx7WvCA0kLz7eo5oNEXLEzXOabEmnR2', 'vistas/images/usuarios/74055.jpg', 'Subdirector administrativo y financiero', 'Diurno', NULL, '2022-04-03 00:40:46', '2022-04-03 00:58:03'),
(21, 'Carlota Sofía Manrriquez Orcasita', 'csmartinez@gmail.com', NULL, '$2y$10$4sGCG.P.A2EqSZ0nvoo04.A5LlV1MPPmZGLsAKZ2ct5/4MLYQyP0y', 'vistas/images/usuarios/54607.jpg', 'Subdirector de desarrollo empresarial', 'Diurno', NULL, '2022-04-03 00:40:52', '2022-04-03 00:57:13'),
(22, 'Jeison José Zamora Sotelo', 'jjzamora@gmail.com', NULL, '$2y$10$7bIxe3YOA5ZfmRt6JzPJkuRrN8JUyS.pQHUL2qpHpPMuVQV1gkqMC', 'vistas/images/usuarios/93434.jpg', 'Subdirector juridico', 'Diurno', NULL, '2022-04-03 00:40:58', '2022-04-03 00:56:34'),
(23, 'Margarita Lilomila De Tormes y Alcahazar', 'mldetormes@gmail.com', NULL, '$2y$10$NAwgiMQesy3bxdI0MKKqleV9oZgEleTAzgYVA1JhtzRRTcWObhdkW', 'vistas/images/usuarios/40677.jpg', 'Subdirector de comunicaciones y eventos', 'Diurno', NULL, '2022-04-03 00:41:03', '2022-04-03 00:54:36'),
(24, 'Ernestina María Herrera Gómez', 'emherrara@gmail.com', NULL, '$2y$10$rbmij9BQUnc1dpHHk9gtzuzLB3/Zv0IU7tIZJ4VeyZy50w1h74Dlq', 'vistas/images/usuarios/68122.jpg', 'Subdirector de desarrollo empresarial', 'Diurno', NULL, '2022-04-21 02:08:07', '2022-04-21 02:12:42'),
(25, 'María Clemencia Torres De Alba', 'mctorres@gmail.com', NULL, '$2y$10$h63mSHrZkTJ9D9jGILBIZeQaZgrvP36t14RtmQ47E3EJnWzU9uBX2', 'vistas/images/usuarios/unknown.png', 'Asistente de dirección', 'Diurno', NULL, '2022-07-17 03:02:32', '2022-07-17 03:02:32');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datos_rango`
--
ALTER TABLE `datos_rango`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados_afiliados`
--
ALTER TABLE `empleados_afiliados`
  ADD PRIMARY KEY (`id_empleado_afiliado`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `entrevistas`
--
ALTER TABLE `entrevistas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `interesados`
--
ALTER TABLE `interesados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `meses`
--
ALTER TABLE `meses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `municipios_departamento`
--
ALTER TABLE `municipios_departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagina_web`
--
ALTER TABLE `pagina_web`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos_generados`
--
ALTER TABLE `pagos_generados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos_parametros`
--
ALTER TABLE `pagos_parametros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `representante_empresa`
--
ALTER TABLE `representante_empresa`
  ADD PRIMARY KEY (`id_rprt_legal`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sector_empresa`
--
ALTER TABLE `sector_empresa`
  ADD PRIMARY KEY (`id_sector`);

--
-- Indices de la tabla `tipos_documentos`
--
ALTER TABLE `tipos_documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `datos_rango`
--
ALTER TABLE `datos_rango`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `empleados_afiliados`
--
ALTER TABLE `empleados_afiliados`
  MODIFY `id_empleado_afiliado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `entrevistas`
--
ALTER TABLE `entrevistas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `interesados`
--
ALTER TABLE `interesados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `meses`
--
ALTER TABLE `meses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `municipios_departamento`
--
ALTER TABLE `municipios_departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `pagina_web`
--
ALTER TABLE `pagina_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2191;

--
-- AUTO_INCREMENT de la tabla `pagos_generados`
--
ALTER TABLE `pagos_generados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `pagos_parametros`
--
ALTER TABLE `pagos_parametros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `representante_empresa`
--
ALTER TABLE `representante_empresa`
  MODIFY `id_rprt_legal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `sector_empresa`
--
ALTER TABLE `sector_empresa`
  MODIFY `id_sector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipos_documentos`
--
ALTER TABLE `tipos_documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
