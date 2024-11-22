-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2024 a las 04:38:32
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
-- Base de datos: `usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(12) NOT NULL,
  `nombre_cat` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_cat`) VALUES
(2, 'carnes'),
(3, 'verduras'),
(4, 'frutas'),
(5, 'bebidas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_usuarios`
--

CREATE TABLE `datos_usuarios` (
  `id` int(20) NOT NULL,
  `usuario` varchar(60) NOT NULL,
  `contra` varchar(60) NOT NULL,
  `fecha_reg` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `datos_usuarios`
--

INSERT INTO `datos_usuarios` (`id`, `usuario`, `contra`, `fecha_reg`) VALUES
(3, 'dasdas', '12321', '08/09/24'),
(4, 'santino', '12345', '08/09/24'),
(18, 'hola', '1234', '19/09/24'),
(19, 'sss', 'sss', '19/09/24'),
(20, 'sss', 'sss', '19/09/24'),
(21, 'sss', 'sss', '19/09/24'),
(22, 'sss', 'sss', '19/09/24'),
(23, 'sss', 'sss', '19/09/24'),
(24, 'sss', 'sss', '19/09/24'),
(25, 'aa', 'ss', '19/09/24'),
(26, 'aa', 'ss', '19/09/24'),
(27, 'aggg', '222', '19/09/24'),
(28, 's', 'aaa', '19/09/24'),
(29, 'hola1', 'sss', '19/09/24'),
(30, 'a', 'a', '19/09/24'),
(31, '2323', '333', '19/09/24'),
(32, 'a', 'a', '19/09/24'),
(33, '235rq23', 'ss', '19/09/24'),
(34, '123', '123', '19/09/24'),
(35, '123', '123', '19/09/24'),
(36, 'hola', '123', '19/09/24'),
(37, 'a', '23', '19/09/24'),
(43, 'hola123', '123', '20/09/24'),
(44, 'hola22', '22', '20/09/24'),
(45, 'ds', 'dssss', '25/09/24'),
(46, 'qqqqq', 'qqqq', '25/09/24'),
(47, 'ss', 'ss', '25/09/24'),
(48, 'ds', 'dsss', '25/09/24'),
(49, 'ss', 'ssss', '25/09/24'),
(50, 'efgte3gt', '3gt3g3', '25/09/24'),
(51, 'dsad', 'ssss', '25/09/24'),
(52, 'hola222', '222', '25/09/24'),
(53, 'hola2332', '2222', '25/09/24'),
(54, '54hbrteh', 'hh', '25/09/24'),
(55, 'sds', 'sss', '25/09/24'),
(56, 'ddd', 'dddd', '25/09/24'),
(57, 'hgooolaaa', '222222', '25/09/24'),
(58, 'aftgkwotq3', 'q235rq235r', '25/09/24'),
(59, 'hola234', '234', '25/09/24'),
(60, '3rwqa', 'asd', '25/09/24'),
(61, 'dsa', 'sd', '26/09/24'),
(62, 'aaaa', '2222222223', '01/11/24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `id_usuario` int(20) NOT NULL,
  `nombre_ingrediente` varchar(45) NOT NULL,
  `fecha_agregado` varchar(10) NOT NULL,
  `cantidad` int(60) NOT NULL,
  `id_ingrediente` int(20) NOT NULL,
  `categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`id_usuario`, `nombre_ingrediente`, `fecha_agregado`, `cantidad`, `id_ingrediente`, `categoria`) VALUES
(34, 'carne', '07/11/24', 86, 12, 'carnes'),
(34, 'papa', '07/11/24', 86, 16, 'verduras'),
(34, 'palta', '08/11/24', 5, 17, 'verduras'),
(34, 'cebolla', '22/11/24', 27, 19, 'verduras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE `recetas` (
  `id_receta` int(15) NOT NULL,
  `id_usuario` int(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `preparacion` varchar(800) NOT NULL,
  `nombre_img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`id_receta`, `id_usuario`, `nombre`, `descripcion`, `preparacion`, `nombre_img`) VALUES
(7, 34, 'Cangrejos al Ajillo', 'Cangrejos frescos cocinados en una deliciosa salsa de ajo, vino blanco, y especias, perfectos para un plato lleno de sabor y mariscos.', '-Cocina los cangrejos: En una olla grande, hierve los cangrejos en agua con sal hasta que estén cocidos (aproximadamente 10 minutos). Sácalos y resérvalos.\r\n-Prepara la salsa: En una sartén grande, derrite mantequilla y añade 4 dientes de ajo picados. Cocina hasta que el ajo esté dorado.\r\nAñade vino y especias: Agrega 1 taza de vino blanco, una pizca de sal, pimienta, y un poco de tomillo. Cocina a fuego medio hasta que la salsa se reduzca ligeramente.\r\n-Mezcla los cangrejos con la salsa: Añade los cangrejos cocidos a la sartén con la salsa y deja que se impregnen bien de los sabores por unos minutos.\r\n-Sirve: Decora con perejil fresco picado y sirve caliente. ¡Listo para disfrutar!', 'img1_banner.jpg'),
(8, 34, 'Arroz con Chorizo', 'Un arroz sabroso y colorido, combinado con trozos de chorizo picante y especias, ideal para acompañar carnes o disfrutar solo.', '-Cocina el chorizo: En una sartén grande, cocina 2 chorizos picados en rodajas hasta que estén dorados y suelten su grasa.\r\n-Añade el arroz: Agrega 1 taza de arroz a la sartén y fríelo con el chorizo durante 2-3 minutos, removiendo para que tome sabor.\r\n-Cocina el arroz: Agrega 2 tazas de caldo de pollo (o agua), una pizca de sal y pimienta, y cocina a fuego medio hasta que el arroz esté listo y haya absorbido el líquido.\r\n-Sirve: Decora con cilantro fresco picado y disfruta de este delicioso arroz con chorizo.', 'img2_banner.jpg'),
(9, 34, 'Churrasco a la Parrilla', 'Carne de res cocinada a la parrilla, sazonada con hierbas y especias, y servida con una guarnición de papas o ensaladas. Un clásico del asado.', '-Prepara la carne: Sazona 1 kg de carne de res (como el lomo o la costilla) con sal, pimienta, ajo en polvo, y hierbas frescas como romero y tomillo.\r\n-Cocina a la parrilla: Precalienta la parrilla a fuego medio-alto. Coloca los trozos de carne en la parrilla y cocina por 4-5 minutos por cada lado, o hasta alcanzar el punto de cocción deseado.\r\n-Acompañamientos: Mientras la carne se cocina, corta papas en rodajas o prepara una ensalada fresca de tu elección.\r\n-Sirve: Una vez cocinado el churrasco, deja reposar la carne unos minutos antes de cortarla. Sirve con las papas o ensalada al lado.', 'img3_banner.jpg'),
(11, 34, 'Sopa con panceta', 'La sopa con panceta es un platillo reconfortante y sabroso, ideal para un día frío. La combinación de panceta crujiente con caldo suave y vegetales crea una deliciosa armonía de sabores. Puedes servir', '-Cocina la panceta: En una cacerola grande, cocina 150 gramos de panceta en trozos pequeños hasta que esté crujiente. ------Retira la panceta y reserva.\r\n-Prepara el caldo: En la misma cacerola, agrega 1 cebolla picada, 1 zanahoria en rodajas y 2 ramas de apio picadas. Sofríe a fuego medio hasta que los vegetales estén tiernos.\r\n-Agrega el caldo: Vierte 1 litro de caldo de pollo o vegetal en la cacerola y lleva a ebullición. Cocina por 10 minutos.\r\n-Incorpora la panceta: Añade la panceta reservada al caldo y mezcla bien. Cocina por otros 5 minutos.\r\n-Ajusta el sazón: Agrega sal, pimienta y hierbas al gusto (como tomillo o laurel). Sirve caliente.', 'img5_banner.jpg'),
(12, 34, 'Arroz con Vegetales', 'El arroz con vegetales es un platillo saludable y colorido, lleno de sabor y perfecto como acompañante o como plato principal. Esta receta es fácil de hacer y puede adaptarse con tus vegetales favorit', '-Cocina el arroz: Enjuaga 1 taza de arroz y cocina en agua con sal hasta que esté tierno. Reserva.\r\n-Sofríe los vegetales: En una sartén, sofríe 1 taza de zanahoria, ½ taza de guisantes y ½ taza de maíz hasta que estén tiernos. ----Agrega 1 diente de ajo picado y cocina por un par de minutos.\r\n-Mezcla todo: Agrega el arroz cocido a los vegetales, revuelve bien y sazona con sal y pimienta al gusto. Sirve caliente.', 'comida-economica-1080x675.jpg'),
(13, 34, 'Ensalada Mediterránea', 'Una ensalada ligera y saludable que combina sabores frescos del Mediterráneo como aceitunas, pepinos y tomates, ideal para acompañar cualquier comida o disfrutar como plato principal.', '-Lava y corta 1 taza de lechuga, ½ taza de tomates cherry a la mitad, ½ pepino en rodajas finas, y ¼ de cebolla roja en tiras delgadas.\r\n-Coloca todos los ingredientes en un bol grande y mezcla suavemente.\r\n-Agrega ¼ de taza de aceitunas negras y 50 gramos de queso feta desmenuzado.\r\n-Rocía con 2 cucharadas de aceite de oliva, 1 cucharada de jugo de limón, sal y pimienta al gusto.\r\n-Remueve nuevamente y sirve inmediatamente.', 'mediterranea.jfif');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos_usuarios`
--
ALTER TABLE `datos_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id_ingrediente`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`id_receta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos_usuarios`
--
ALTER TABLE `datos_usuarios`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id_ingrediente` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `id_receta` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD CONSTRAINT `ingredientes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `datos_usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD CONSTRAINT `recetas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `datos_usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
