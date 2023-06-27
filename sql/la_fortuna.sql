-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Lug 25, 2022 alle 19:29
-- Versione del server: 10.4.21-MariaDB
-- Versione PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `la_fortuna`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `food_customer`
--

CREATE TABLE `food_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `data_registrazione` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `food_customer`
--

INSERT INTO `food_customer` (`id`, `name`, `email`, `password`, `phone`, `address`, `data_registrazione`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', '0000-00-00'),
(3, 'marta', 'smartis@gmail.com', '202cb962ac59075b964b07152d234b70', '3455', 'via grande', '2022-07-23'),
(4, 'gabri', 'gabri@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '3455', 'via grande', '2022-07-23'),
(5, 'ciao', 'ciao@gmail.com', '202cb962ac59075b964b07152d234b70', '3455', 'via grande', '2022-07-24'),
(6, 'Smartis', 'martabertela@gmail.com', 'b967337235b589f5efcfab968e5fc09e', '123', '123', '2022-07-25'),
(7, 'mirco', 'mirco@gmail.com', '25d55ad283aa400af464c76d713c07ad', '3214567890', 'via risorgimento 32', '2022-07-25'),
(8, 'Aurora', 'aurorabracciotti@libero.it', '99c8ef576f385bc322564d5694df6fc2', '1234567890', 'Via Verdi 17', '2022-07-25'),
(9, 'Alexandro', 'alsga01@hotmail.com', 'e63d7cf745d357d5b161f63d21933406', '0987654321', 'Via magenta 33', '2022-07-25');

-- --------------------------------------------------------

--
-- Struttura della tabella `food_items`
--

CREATE TABLE `food_items` (
  `id` int(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `description` varchar(200) NOT NULL,
  `images` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'ENABLE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `food_items`
--

INSERT INTO `food_items` (`id`, `name`, `price`, `description`, `images`, `status`) VALUES
(1, 'Involtini Primavera', 2, 'Involtini con misto di verdure', '1.jpeg', 'ENABLE'),
(2, 'Nuvolette di drago', 2, 'Croccanti nuvole di drago', '2.jpeg', 'ENABLE'),
(3, 'Ravioli al vapore', 3.5, 'ravioli cinesi fatti a mano con macinato di maiale', '8.jpeg', 'ENABLE'),
(4, 'Ravioli arrosto', 4, 'ravioli cinesi fatti a mano con macinato di maiale e arrostiti alla piastra', '10.jpeg', 'ENABLE'),
(5, 'insalata con gamberi', 4, 'insalata di lattuga con gamberi', '11.jpeg', 'ENABLE'),
(6, 'insalata con salmone', 6, 'insalata di lattuga con salmone crudo', '12.jpeg', 'ENABLE'),
(7, 'zuppa la fortuna', 4, 'zuppa con misto di mare ', '14.jpeg', 'ENABLE'),
(8, 'zuppa agropiccante', 4, 'zuppa con miso di verdure agropiccante ', '16.jpeg', 'ENABLE'),
(9, 'spaghetti saltati con verdure', 3.5, 'spaghetti di farina con misto di verdure', '21.jpeg', 'ENABLE'),
(10, 'spaghetti saltati con misto mare', 5, 'spaghetti di farina con misto di mare', '20.jpeg', 'ENABLE'),
(11, 'spaghetti di soia con verdure', 3.5, 'spaghetti di soia con misto di verdure', '22.jpeg', 'ENABLE'),
(12, 'spaghetti di soia piccanti con carne', 4, 'spaghetti di soia in salsa piccanti con peperoni e carne di maiale', '22a.jpeg', 'ENABLE'),
(13, 'spaghetti di riso con verdure', 4, 'spaghetti di riso saltati con verdure', '23.jpeg', 'ENABLE'),
(14, 'spaghetti di riso con misto mare', 5, 'spaghetti di riso saltati in padella con misto di mare', '23b.jpeg', 'ENABLE'),
(15, 'gnocchi con verdure', 4, 'gnocchi di riso con verdure', '24.jpeg', 'ENABLE'),
(16, 'riso cantonese', 3.5, 'riso saltato con uova, prosciutto cotto e piselli', '25.jpeg', 'ENABLE'),
(17, 'riso saltato con gamberi', 4.5, 'riso saltato con uova, gamberi e verdure miste', '26.jpeg', 'ENABLE'),
(18, 'riso saltato con pollo', 4, 'riso saltato con uovo, pollo e verdure miste', '26a.jpeg', 'ENABLE'),
(20, 'riso saltato al curry', 4, 'riso saltato in salsa curry con zucchine e pollo', '27.jpeg', 'ENABLE'),
(21, 'riso allo stile yang zhou', 5, 'riso saltato in salsa soia con pancetta affumicata e verdure miste', '25a.jpeg', 'ENABLE'),
(22, 'riso bianco', 2, 'riso bianco cotto al vapore', '28.jpeg', 'ENABLE'),
(23, 'pollo alla piastra', 5, 'Pollo saltato alla pistra servito con misto di verdure e salsina', '30.jpeg', 'ENABLE'),
(24, 'pollo in salsa agrodolce', 4.5, 'pollo fritto nella pastella e servito con salsa agrodolce, pomodorini e ananas', '31.jpeg', 'ENABLE'),
(25, 'pollo funghi e bambù', 4.5, 'pollo con salsa funghi e bambù', '32.jpeg', 'ENABLE'),
(26, 'pollo in salsa piccante', 4.5, 'pollo in salsa piccante con misto di merdure e arachidi', '33.jpeg', 'ENABLE'),
(27, 'pollo al curry', 4.5, 'pollo in salsa curry con zucchine', '35.jpeg', 'ENABLE'),
(28, 'pollo fritto', 4.5, 'pollo in pastella fritta', '36.jpeg', 'ENABLE'),
(29, 'anatra alla piastra', 5, 'petto di anatra servito con misto di verdure sulla piastra', '40.jpeg', 'ENABLE'),
(30, 'anatra in salsa agrodolce', 5, 'petto di anatra in salsa agrodolce', '41.jpeg', 'ENABLE'),
(31, 'anatra funghi e bambù', 5, 'petto di anatra con salsa funghi e bambù', '42.jpeg', 'ENABLE'),
(32, 'anatra in salsa piccante', 5, 'petto di anatra in salsa piccante con misto di verdure', '43.jpeg', 'ENABLE'),
(33, 'anatra arrosto', 5, 'petto di anatra arrosto con aromi', '44.jpeg', 'ENABLE'),
(34, 'anatra in salsa di arancia', 5, 'petto di anatra arrosto con salsa di arancia', '45.jpeg', 'ENABLE'),
(35, 'maiale alla piastra', 5, 'maiale alla piastra con verdure', '50.jpeg', 'ENABLE'),
(36, 'maiale in salsa agrodolce', 5, 'maiale fritto in pastella servito con salsa agrodolce', '51.jpeg', 'ENABLE'),
(37, 'maiale funghi e bambù', 5, 'maiale saltato in padella con funghi e bambù', '52.jpeg', 'ENABLE'),
(38, 'maiale in salsa piccante', 5, 'maiale tagliato a fette e servito con salsa piccante e verdure', '53.jpeg', 'ENABLE'),
(40, 'manzo alla piastra ', 5.5, 'manzo alla piastra con misto di verdure', '60.jpeg', 'ENABLE'),
(41, 'manzo con patate ', 6, 'manzo saltato in padella con patate e spezie', '69.jpeg', 'ENABLE'),
(43, 'gamberetti alla piastra', 7, 'gamberetti sgusciati con salsa e verdure miste', '70.jpeg', 'ENABLE'),
(44, 'gamberetti in salsa agrodolce', 6, 'gamberetti sgusciati in salsa agrodolce', '71.jpeg', 'ENABLE'),
(45, 'gamberetti funghi e bambù', 6, 'gamberetti sgusciati con salsa e funghi e bambù', '72.jpeg', 'ENABLE'),
(46, 'spiedini di gambero', 6, 'gamberetti sgusciati in spiedino e spezie', '74.jpeg', 'ENABLE'),
(47, 'nigiri di salmone', 3, 'polpette di riso con fettina di sashimi di salmone', 'j5.jpeg', 'ENABLE'),
(48, 'nigiri di tonno', 4, 'polpette di riso con fettina di sashimi di tonno', 'j6.jpeg', 'ENABLE'),
(49, 'nigiri di gambero', 3, 'polpette di riso con fettina di sashimi di gambero', 'j7.jpeg', 'ENABLE'),
(50, 'uramaki california', 7, ' uramaki con salmone, surimi , avocado e philadelphia', 'j20.jpeg', 'ENABLE'),
(51, 'uramaki shake wakame', 6.5, ' uramaki con salmone e philadelphia', 'j21.jpeg', 'ENABLE'),
(52, 'uramaki maguro', 7, ' uramaki con tonno e philadelphia', 'j22.jpeg', 'ENABLE'),
(53, 'tempura roll', 9, ' uramaki con salmone, tempura di gambero, granella di pistacchio e tempura', 'j24.jpeg', 'ENABLE'),
(54, 'sashimi salmone', 10, ' fettine di salmone crudo', 'j33.jpeg', 'ENABLE'),
(55, 'sashimi misto', 12, ' fettine di salmone, tonno e branzino', 'j35.jpeg', 'ENABLE');

-- --------------------------------------------------------

--
-- Struttura della tabella `food_orders`
--

CREATE TABLE `food_orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `item_id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `order_date` date NOT NULL,
  `customer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `food_orders`
--

INSERT INTO `food_orders` (`id`, `order_id`, `item_id`, `name`, `price`, `quantity`, `order_date`, `customer`) VALUES
(7, '268234662903146724', 1, 'Involtini Primavera', 2, 1, '2022-07-25', 6),
(8, '268234662903146724', 3, 'Ravioli al vapore', 3, 1, '2022-07-25', 6),
(9, '268234662903146724', 16, 'riso cantonese', 3, 1, '2022-07-25', 6),
(10, '268234662903146724', 8, 'zuppa agropiccante', 4, 3, '2022-07-25', 6),
(11, '375098375437622122', 3, 'Ravioli al vapore', 3, 1, '2022-07-25', 5),
(12, '375098375437622122', 2, 'Nuvolette di drago', 2, 1, '2022-07-25', 5),
(13, '375098375437622122', 6, 'insalata con salmone', 6, 4, '2022-07-25', 5),
(14, '375098375437622122', 15, 'gnocchi con verdure', 4, 3, '2022-07-25', 5),
(15, '617712478752174984', 3, 'Ravioli al vapore', 3, 1, '2022-07-25', 5),
(16, '617712478752174984', 23, 'pollo alla piastra', 5, 1, '2022-07-25', 5),
(17, '617712478752174984', 4, 'Ravioli arrosto', 4, 1, '2022-07-25', 5),
(18, '617712478752174984', 7, 'zuppa la fortuna', 4, 1, '2022-07-25', 5),
(19, '617712478752174984', 8, 'zuppa agropiccante', 4, 1, '2022-07-25', 5),
(20, '403487495906115885', 3, 'Ravioli al vapore', 3, 6, '2022-07-25', 5),
(21, '613614527304503236', 2, 'Nuvolette di drago', 2, 1, '2022-07-25', 5),
(22, '613614527304503236', 6, 'insalata con salmone', 6, 1, '2022-07-25', 5),
(23, '613614527304503236', 18, 'riso saltato con pollo', 4, 1, '2022-07-25', 5),
(24, '132989999806133608', 15, 'gnocchi con verdure', 4, 1, '2022-07-25', 7),
(25, '132989999806133608', 23, 'pollo alla piastra', 5, 1, '2022-07-25', 7),
(26, '132989999806133608', 54, 'sashimi salmone', 10, 1, '2022-07-25', 7),
(27, '132989999806133608', 53, 'tempura roll', 9, 1, '2022-07-25', 7),
(28, '132989999806133608', 29, 'anatra alla piastra', 5, 1, '2022-07-25', 7),
(29, '132989999806133608', 34, 'anatra in salsa di arancia', 5, 1, '2022-07-25', 7),
(30, '427773705076260376', 25, 'pollo funghi e bambù', 4, 1, '2022-07-25', 7),
(31, '427773705076260376', 27, 'pollo al curry', 4, 1, '2022-07-25', 7),
(32, '427773705076260376', 48, 'nigiri di tonno', 4, 1, '2022-07-25', 7),
(33, '427773705076260376', 52, 'uramaki maguro', 7, 1, '2022-07-25', 7),
(34, '427773705076260376', 29, 'anatra alla piastra', 5, 1, '2022-07-25', 7),
(35, '427773705076260376', 36, 'maiale in salsa agrodolce', 5, 1, '2022-07-25', 7),
(36, '392638895114293363', 2, 'Nuvolette di drago', 2, 1, '2022-07-25', 7),
(37, '392638895114293363', 31, 'anatra funghi e bambù', 5, 8, '2022-07-25', 7),
(38, '392638895114293363', 52, 'uramaki maguro', 7, 2, '2022-07-25', 7),
(39, '392638895114293363', 53, 'tempura roll', 9, 3, '2022-07-25', 7),
(40, '392638895114293363', 7, 'zuppa la fortuna', 4, 1, '2022-07-25', 7),
(41, '439160576819657542', 4, 'Ravioli arrosto', 4, 1, '2022-07-25', 7),
(42, '961499462847116533', 1, 'Involtini Primavera', 2, 1, '2022-07-25', 8),
(43, '961499462847116533', 3, 'Ravioli al vapore', 3, 2, '2022-07-25', 8),
(44, '961499462847116533', 8, 'zuppa agropiccante', 4, 1, '2022-07-25', 8),
(45, '961499462847116533', 16, 'riso cantonese', 3, 1, '2022-07-25', 8),
(46, '961499462847116533', 24, 'pollo in salsa agrodolce', 4, 1, '2022-07-25', 8),
(47, '961499462847116533', 26, 'pollo in salsa piccante', 4, 6, '2022-07-25', 8),
(48, '961499462847116533', 47, 'nigiri di salmone', 3, 10, '2022-07-25', 8),
(49, '107247123885305290', 1, 'Involtini Primavera', 2, 1, '2022-07-25', 9),
(50, '107247123885305290', 2, 'Nuvolette di drago', 2, 11, '2022-07-25', 9),
(51, '107247123885305290', 3, 'Ravioli al vapore', 3, 6, '2022-07-25', 9),
(52, '107247123885305290', 4, 'Ravioli arrosto', 4, 7, '2022-07-25', 9),
(53, '107247123885305290', 7, 'zuppa la fortuna', 4, 6, '2022-07-25', 9),
(54, '107247123885305290', 16, 'riso cantonese', 3, 8, '2022-07-25', 9),
(55, '107247123885305290', 36, 'maiale in salsa agrodolce', 5, 7, '2022-07-25', 9),
(56, '107247123885305290', 49, 'nigiri di gambero', 3, 2, '2022-07-25', 9),
(57, '193115543454329439', 1, 'Involtini Primavera', 2, 1, '2022-07-25', 9),
(58, '193115543454329439', 2, 'Nuvolette di drago', 2, 1, '2022-07-25', 9),
(59, '193115543454329439', 3, 'Ravioli al vapore', 3, 1, '2022-07-25', 9),
(60, '193115543454329439', 4, 'Ravioli arrosto', 4, 1, '2022-07-25', 9),
(61, '193115543454329439', 5, 'insalata con gamberi', 4, 1, '2022-07-25', 9),
(62, '193115543454329439', 28, 'pollo fritto', 4, 1, '2022-07-25', 9),
(63, '193115543454329439', 32, 'anatra in salsa piccante', 5, 1, '2022-07-25', 9),
(64, '193115543454329439', 35, 'maiale alla piastra', 5, 1, '2022-07-25', 9),
(65, '193115543454329439', 50, 'uramaki california', 7, 1, '2022-07-25', 9),
(66, '303519949362416300', 4, 'Ravioli arrosto', 4, 1, '2022-07-25', 9),
(67, '303519949362416300', 22, 'riso bianco', 2, 1, '2022-07-25', 9),
(68, '303519949362416300', 25, 'pollo funghi e bambù', 4, 1, '2022-07-25', 9),
(69, '121694842309618265', 23, 'pollo alla piastra', 5, 5, '2022-07-25', 4),
(70, '121694842309618265', 51, 'uramaki shake wakame', 6, 3, '2022-07-25', 4);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `food_customer`
--
ALTER TABLE `food_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `food_items`
--
ALTER TABLE `food_items`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `food_orders`
--
ALTER TABLE `food_orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `food_customer`
--
ALTER TABLE `food_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `food_items`
--
ALTER TABLE `food_items`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT per la tabella `food_orders`
--
ALTER TABLE `food_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
