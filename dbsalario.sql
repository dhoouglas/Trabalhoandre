-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Abr-2019 às 02:27
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsalario`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dadosusuarios`
--

CREATE TABLE `dadosusuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `categoria_id` varchar(20) NOT NULL,
  `data_nasc` varchar(10) NOT NULL,
  `sal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dadosusuarios`
--

INSERT INTO `dadosusuarios` (`id`, `nome`, `categoria_id`, `data_nasc`, `sal`) VALUES
(67, 'Gabriel Gaspar santos', 'alta', '30/04/1998', 1670.7),
(68, 'Gabriel Oliveira', 'baixa', '10/01/1990', 1330.2),
(69, 'Guilherme', 'baixa', '25/05/1998', 1884.8),
(70, 'Junior', 'alta', '11/08/1999', 1110.01),
(71, 'Estanislau', 'alta', '31/12/1975', 2200),
(72, 'Gustavo', 'media', '20/02/1986', 7400),
(73, 'Douglas Araujo', 'media', '13/05/1992', 5400),
(74, 'Alex', 'baixa', '07/05/1994', 400),
(75, 'Lucas', 'media', '04/081997', 2250),
(76, 'Weberton', 'alta', '05/06/1976', 8500),
(77, 'Pedro', 'baixa', '13/04/1995', 5500),
(78, 'Carlos', 'baixa', '06/08/1986', 1550),
(79, 'Matheus', 'alta', '18/12/1996', 1500),
(80, 'Gabriel Barbosa', 'alta', '14/02/1994', 1550),
(81, 'Rafael', 'baixa', '22/07/1997', 1260),
(82, 'Jean', 'media', '15/05/1996', 6200),
(83, 'Raphaela', 'media', '04/11/1996', 6200),
(84, 'Juliana', 'baixa', '22/04/1996', 4400);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dadosusuarios`
--
ALTER TABLE `dadosusuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dadosusuarios`
--
ALTER TABLE `dadosusuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
