-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2020 a las 20:03:36
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `art`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `CodigoCliente` int(10) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellidos` varchar(30) NOT NULL,
  `Domicilio` varchar(40) DEFAULT NULL,
  `Poblacion` varchar(20) NOT NULL,
  `CorreoElectronico` varchar(50) NOT NULL,
  `Telefono` int(9) NOT NULL,
  `Observaciones` text NOT NULL,
  `Peso` decimal(10,2) DEFAULT NULL,
  `Altura` decimal(10,2) NOT NULL,
  `MasaCorporal` int(11) NOT NULL,
  `Edad` int(3) NOT NULL,
  `ActividadFisica` varchar(30) NOT NULL,
  `Lesiones` text NOT NULL,
  `Activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`CodigoCliente`, `Nombre`, `Apellidos`, `Domicilio`, `Poblacion`, `CorreoElectronico`, `Telefono`, `Observaciones`, `Peso`, `Altura`, `MasaCorporal`, `Edad`, `ActividadFisica`, `Lesiones`, `Activo`) VALUES
(6, 'Oscar', 'Ruiz', 'C/Franco', 'lorca', 'oscar@oscar.com', 987654321, 'NO', '23.00', '198.00', 0, 32, 'Principiante', 'NO', 0),
(7, 'Ignatius', 'J. Reilly', 'Farras Street N_43', 'New Orleans', 'diosaFortuna@gmail.com', 634412066, 'Demasiadas', '96.22', '1.92', 0, 32, 'Principiante', 'No', 1),
(8, 'Zeus', 'Jupiter Aguilar', 'Calle Olimpo', 'Murcia', 'animalZeus@gmail.com', 634412066, 'No', '72.12', '2.02', 0, 54, 'Si', 'No', 1),
(10, 'Miller', 'Kazuhira Hasagaska', 'House of the rising sun Nº51', 'Outher Heaven', 'keepyouwaiting@hum.com', 623456788, 'Necesito ganar agilidad y destreza', '67.32', '1.67', 0, 33, 'CQC(judo)', 'Actualmente no', 1),
(11, 'gdfg', 'fgdf', 'fdgd', 'fgd', 'fdgd', 4234234, 'fd', '43.00', '12.00', 0, 23, 'Intermedio', '2342', 0),
(12, 'Maria', 'Martinez', 'lsfalkfl', 'Lorca', 'maria@maria.com', 654321234, 'ninguna', '56.00', '197.00', 0, 22, 'Principiante', 'no', 1),
(14, 'Hola', 'adios', 'Calle', 'kwlsjl', 'ser@ser.com', 654321234, 'Si', '43.00', '21.00', 21, 975, 'Intermedio', 'No', 0),
(16, 'Alex', 'Martinez', 'eaee', 'Lorca', 'alex@alex.com', 654321345, 'No', '54.00', '187.00', 0, 26, 'Intermedio', 'No', 0),
(17, 'Juan', 'Martinez', 'klfjsalj', 'Lorca', 'juan@juan.com', 654567654, 'No', '65.00', '65.00', 0, 43, 'Intermedio', 'No', 0),
(18, 'Lucia', 'Caparros', 'ñlfsañl', 'Lorca', 'lucia@lucia.ocm', 654321345, 'No', '65.00', '176.00', 0, 32, 'Intermedio', 'No', 0),
(19, 'Alturo', 'García', 'opajfoepj', 'Lorca', 'alturo@alturo.com', 675432154, 'No', '43.00', '154.00', 0, 54, 'Principiante', 'No', 0),
(20, 'Angela', 'Diaz', 'kflka', 'Lorca', 'angela24@angela.com', 765438765, 'No', '76.00', '52.00', 0, 24, 'Intermedio', 'No', 0),
(21, 'Pedro', 'Martinez', 'hola', 'el', 'el@el.com', 654321234, 'no', '45.00', '176.00', 0, 22, 'Intermedio', 'No', 1),
(23, 'Juan', 'Martinez', 'jfjpwa', 'psojfpjp', 'juan@juan.com', 678908765, 'No', '65.00', '176.00', 21, 22, 'Intermedio', 'No', 1),
(24, 'Alex', 'Garcia', 'Las lomas 32', 'Lorca', 'alexG@gmail.com', 654321234, 'No', '65.00', '187.00', 19, 54, 'Intermedio', 'No', 1),
(25, 'Ana', 'Garcia', 'La viña', 'Lorca', 'ana@gmail.com', 678987653, 'No', '65.00', '165.00', 24, 21, 'Intermedio', 'No', 1),
(28, 'Pedro', 'Oliver', 'Lorqui', 'Avenida Lorca', 'pedro@gmail.com', 654321345, 'No', '65.00', '154.00', 27, 32, 'Principiante', 'No', 1),
(29, 'Pedro', 'Andujar', 'Lorqui21', 'Lorca', '32a@gmail.com', 654321234, 'No', '43.00', '176.00', 14, 31, 'Principiante', 'No', 1),
(30, 'Maria Dolores', 'Teruel', 'Juan Carlos ', 'Lorca', 'maria@gmail.com', 654321345, 'No', '54.00', '187.00', 15, 54, 'Intermedio', 'No', 1),
(31, 'Paula', 'Martinez', 'san crstobal 20', 'Lorca', 'paula@gmail.com', 654321983, 'No', '54.00', '176.00', 17, 43, 'Principiante', 'No', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensualidades`
--

CREATE TABLE `mensualidades` (
  `CodigoMensualidad` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `DiasSemanas` int(11) NOT NULL,
  `Precio` float NOT NULL,
  `Anio` int(4) NOT NULL,
  `Activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensualidades`
--

INSERT INTO `mensualidades` (`CodigoMensualidad`, `Nombre`, `DiasSemanas`, `Precio`, `Anio`, `Activo`) VALUES
(1, 'Basica', 7, 29.9, 2020, 1),
(2, 'Avanzada', 7, 36.5, 2020, 1),
(3, 'Ultra', 7, 50, 2020, 1),
(4, 'Basica', 7, 20, 2019, 0),
(5, 'Ultra', 7, 54, 2019, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monitores`
--

CREATE TABLE `monitores` (
  `CodigoMonitor` int(100) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `Telefono` int(9) NOT NULL,
  `Salario` int(4) NOT NULL,
  `Activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `monitores`
--

INSERT INTO `monitores` (`CodigoMonitor`, `Nombre`, `Apellidos`, `DNI`, `Telefono`, `Salario`, `Activo`) VALUES
(1, 'Adrian ', 'Martínez', '23121414V', 654321321, 950, 1),
(2, 'Jesús García', 'González Blanco', '23121415V', 678907654, 850, 1),
(3, 'Eva', 'Suarez', '23242526V', 678543123, 98, 1),
(4, 'Juan', 'Martinez', '23456789N', 654321234, 765, 0),
(5, 'Lucia', 'Garcia', '23456785N', 654321567, 654, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `CodigoPago` int(11) NOT NULL,
  `CodigoCliente` int(11) NOT NULL,
  `CodigoMensualidad` int(11) NOT NULL,
  `Mes` varchar(10) NOT NULL,
  `Anio` int(4) NOT NULL,
  `Importe` float NOT NULL,
  `Deuda` float NOT NULL,
  `Pagado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`CodigoPago`, `CodigoCliente`, `CodigoMensualidad`, `Mes`, `Anio`, `Importe`, `Deuda`, `Pagado`) VALUES
(1, 8, 1, 'Junio', 2020, 35, 0, 1),
(2, 10, 3, 'Mayo', 2019, 40, 40, 1),
(3, 11, 2, 'Febrero', 2020, 36, 0, 1),
(4, 12, 1, 'Mayo', 2020, 21, 21, 1),
(5, 10, 1, 'Enero', 2020, 45, 45, 1),
(7, 12, 1, 'Febrero', 2019, 23, 23, 1),
(8, 10, 1, 'Junio', 2020, 25, 25, 1),
(9, 10, 1, 'Junio', 2020, 25, 25, 1),
(10, 10, 1, 'Enero', 2019, 24, 24, 1),
(13, 16, 1, 'Junio', 2020, 44, 21, 1),
(14, 20, 4, 'Junio', 2020, 20, 34, 1),
(15, 16, 2, 'Abril', 2020, 30, 20, 1),
(16, 12, 2, 'Abril', 2020, 20, 20, 1),
(17, 8, 1, 'Abril', 2020, 30, 10, 1),
(18, 10, 3, 'Febrero', 2020, 30, 10, 1),
(19, 16, 1, 'Febrero', 2020, 20, 10, 0),
(20, 12, 2, 'Diciembre', 2020, 20, 10, 1),
(21, 11, 1, 'Diciembre', 2020, 50, 20, 0),
(26, 12, 1, 'Junio', 2021, 29.9, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `CodigoUsuario` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Contrasena` varchar(50) NOT NULL,
  `Email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`CodigoUsuario`, `Nombre`, `Contrasena`, `Email`) VALUES
(1, 'andresete', 'be76e1cab391a5fb0e9d5cc117efa1ad', 'andresdavid@gmail.com'),
(2, 'Maria Jose Teruel', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 'mariajose.teruel2@murciaeduca.es'),
(3, 'sergio', 'c4dd4b38a5ad0febdc1bf42c343a900f', 'sergio2m@gmail.com'),
(4, 'pepe', '926e27eecdbc7a18858b3798ba99bddd', 'pepe@pepe.com'),
(5, 'alfredo', '9450476b384b32d8ad8b758e76c98a69', 'hola@hola.com'),
(6, 'lola', 'fceeb9b9d469401fe558062c4bd25954', 'lola@lola.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`CodigoCliente`);

--
-- Indices de la tabla `mensualidades`
--
ALTER TABLE `mensualidades`
  ADD PRIMARY KEY (`CodigoMensualidad`);

--
-- Indices de la tabla `monitores`
--
ALTER TABLE `monitores`
  ADD PRIMARY KEY (`CodigoMonitor`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`CodigoPago`),
  ADD KEY `idCliente` (`CodigoCliente`),
  ADD KEY `idMensualidades` (`CodigoMensualidad`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`CodigoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `monitores`
--
ALTER TABLE `monitores`
  MODIFY `CodigoMonitor` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `CodigoPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`CodigoCliente`) REFERENCES `clientes` (`CodigoCliente`),
  ADD CONSTRAINT `pagos_ibfk_2` FOREIGN KEY (`CodigoMensualidad`) REFERENCES `mensualidades` (`CodigoMensualidad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
